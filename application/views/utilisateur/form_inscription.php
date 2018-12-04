

<h1>Creer votre compte M-Okapi</h1>
<form method="post" action="<?php echo site_url('utilisateur/nouvel_utilisateur') ?>" >
    Nom complet: 
    <input type="" name="nomcomplet" /><br/>
    Email:
    <input type="" name="email" /><br/>
    Login:
    <input type="" name="login" size="50" /><br/>
    Mot de passe:
    <input type="password" name="mdp" size="50" /><br/>
    Confirmation:
    <input type="password" name="mdpconf" /><br/>
    <input type="submit" value="Creer" />
    <a href="<?php echo site_url('utilisateur/form_authentification'); ?>" >J'ai déjà un compte</a>
</form>