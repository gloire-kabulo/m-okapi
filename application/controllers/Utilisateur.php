<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Utilisateur extends CI_Controller
    {
        public function form_inscription()
        {
            $this->load->view('utilisateur/form_inscription');
        }

        public function form_authentification()
        {
            $this->load->view('utilisateur/form_authentification');
        }

        public function nouvel_utilisateur()
        {
            
            $this->load->library('form_validation'); //chargement du library form_validation

            if ($this->form_validation->run()) //Ligne Ajouter
            {
                $nomcomplet = $this->input->post('nomcomplet'); 
                $email = $this->input->post('email');
                $login = $this->input->post('login');
                $mdp = $this->input->post('mdp');
                $mdpconf = $this->input->post('mdpconf');

                $data = array(
                    'nomcomplet' => $nomcomplet,
                    'email' => $email,
                    'login' => $login,
                    'mdp' => $mdp,
                    'mdp' => $mdp,
                    'etat' => FALSE
                );

                $this->load->model('UtilisateurModel');
                $this->UtilisateurModel->creer_utilisateur($data);

                $this->load->view('utilisateur/utilisateur_success');
            }
            else
            {
                $this->load->view('utilisateur/form_inscription');
            }
        }

        public function connexion()
        {
            $login = $this->input->post('login');
            $mdp = $this->input->post('mdp');
            $d = array(
                'login' => $login,
                'mdp' => $mdp
            );

            $this->load->model('UtilisateurModel');
            $r = $this->UtilisateurModel->check_authentification($d); //Verifier si l'utilisateur existe

            if (count($r) > 0)
            {
                $user = $r[0];
                $d = array(
                    'id' => $user->id,
                    'nomcomplet' => $user->nomcomplet,
                    'is_connected' => true
                );
                $this->session->set_userdata($d); //creation d'une session
                redirect('utilisateur/accueil');
            }
            else
            {
                $d = array(
                    'error_login' => 'Login ou mot de passe incorrect'
                );

                $this->session->set_flashdata($d); 
                $this->form_authentification();
            }
        }

        public function accueil()
        {
            if ($this->session->is_connected)
            {
                $this->load->view('utilisateur/accueil');
            }
            else
            {
                redirect();
            }
            
        }

        public function deconnexion()
        {
            $this->session->unset_userdata('is_connected');
            redirect();
        }
    }
?>