<?php

$profil= new profil();

if (isset($_POST['getUserElementForLogin'])) {
    $formError = array();
    if (!empty($_POST['mail'])) {
        if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
            $profil->mail = htmlspecialchars($_POST['mail']);
        } else {
            $formError['mail'] = 'Veuillez saisir une adresse mail valide';
        }
    } else {
        $formError['mail'] = 'Veuillez insérer une adresse mail';
    }
    if (!empty($_POST['password'])) {
        $profil->password = htmlspecialchars($_POST['password']);
    } else {
        $formError['password'] = 'Veuillez insérer votre mot de passe';
    }
    if (count($formError) == 0) {
        $profilInfo = $profil->getUserElementForLogin(); {
                $_SESSION['mail'] = $profilInfo->mail;
                $_SESSION['password'] = $profilInfo->password;
                header('location:index.php');
                exit();
            }
        }
    }