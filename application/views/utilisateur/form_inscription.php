

<h1>Creer votre compte M-Okapi</h1>
<form method="post" action="<?php echo site_url('utilisateur/nouvel_utilisateur') ?>" >
    Nom complet: 
    <input for="nomcomplet" name="nomcomplet" value="<?= set_value('nomcomplet'); ?>" />
    <?php $this->form_validation->set_rules('nomcomplet','nomcomplet', 'required'); ?>
    <?php echo form_error('nomcomplet'); ?>
    <br/>
    Email:
    <input type="" name="email" value="" /><br/>
    Login:
    <input type="" name="login" value="" size="50" /><br/>
    Mot de passe:
    <input type="password" name="mdp" value="" size="50" /><br/>
    Confirmation:
    <input type="password" value="" name="mdpconf" /><br/>
    <input type="submit" value="Creer" />
    <a href="<?php echo site_url(); ?>" >J'ai déjà un compte</a>
</form>