<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MOkapi extends CI_Controller
{
    public function index()
    {
        if ($this->session->is_connected)
        {
            redirect('utilisateur/accueil');
        }
        $this->load->helper(array('form', 'url')); //chargement du tableau helper

        $this->load->library('form_validation'); //chargement du library form_validation

        $this->form_validation->set_rules('nomcomplet', 'required'); //verifier l'obligation d'entrer
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]'); //verifier si l'email est valide et unique

        $this->form_validation->set_rules(
            'login', 'Username', 
            'required|min_length[8]|max_length[16]|is_unique[users.login]',
            array(
                'required' => 'You have not provide %s.',
                'is_unique' => 'this %s already exist.'
            )); //verifier l'obligation d'entrer le login, definition da la taille min à 8, rendre le login unique

        $this->form_validation->set_rules('mdp', 'Password', 'required|min_length[8]',
                array('required' => 'You must provide a %s.'));// verifier l'obligation d'entrer le mot de passe

        $this->form_validation->set_rules('mdpconf', 'Password Confirmation', 'required|matches[mdp]');//Virification de la coherence

        if ($this->form_validation->run() == FALSE) //Ligne Ajouter
        {
            $this->load->view('mokapi_home');
        }
        else
        {
            $this->load->view('utilisateur/utilisateur_success');//Ligne Ajouter
        }
    }
}