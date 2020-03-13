<?php

$profil = new profil();

if (isset($_POST['login'])) {
    $formError = array();
    if (!empty($_POST['mail'])) {
        if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
            $profil->mail = htmlspecialchars($_POST['mail']);
            $profilInfo = $profil->getUserElementForLogin();
        } else {
            $formError['mail'] = 'Veuillez saisir une adresse mail valide';
        }
    } else {
        $formError['mail'] = 'Veuillez insérer une adresse mail';
    }
if (!empty($_POST['password'])) {
    $passwordUser = ($_POST['password']);
        
    } else {
        $formError['password'] = 'Veuillez insérer votre mot de passe';
    }
    if (count($formError) == 0) {
        if (password_verify($passwordUser, $profilInfo->password)) {
        $_SESSION['user']['mail'] = $profilInfo->mail;
        $_SESSION['user']['password'] = $profilInfo->password;
        $_SESSION['user']['firstname'] = $profilInfo->firstname;
        $_SESSION['user']['id'] = $profilInfo->id;
        header('location: membre.php');
        exit();
    }else{
        $formError['password'] = 'Mot de passe incorrect';
    }
}
}