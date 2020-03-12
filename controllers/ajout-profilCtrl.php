<?php

$formError = array();
$regexName = '/^[A-Z][a-zéèêàâîôùç\s\-A-Z]+$/';
$regexBirthDathe = '/^((?:19|20)(?:[\d]{2}))-((?:[0][\d])|(?:[1][0-2]))-((?:(0|1|2)[\d])|(?:[3][0-1]))$/';
$regexphone = '/^0[1-79][0-9]{8}$/';

if (isset($_POST['inscription_utilisateur'])) {
    $profil = new profil();
    if (!empty($_POST['lastname'])) {
        if (preg_match($regexName, $_POST['lastname'])) {
            $profil->lastname = htmlspecialchars($_POST['lastname']);
        } else {
            $formError['lastname'] = 'Le Nom doit contenir des lettres majuscules et minuscules, des tirets ou des espaces.';
        }
    } else {
        $formError['lastname'] = 'Veuillez remplir votre Nom.';
    }
    if (!empty($_POST['firstname'])) {
        if (preg_match($regexName, $_POST['firstname'])) {
            $profil->firstname = htmlspecialchars($_POST['firstname']);
        } else {
            $formError['firstname'] = 'Le Prénom doit contenir des lettres majuscules et minuscules, des tirets ou des espaces.';
        }
    } else {
        $formError['firstname'] = 'Veuillez remplir le champ du prénom';
    }
    if (!empty($_POST['birthdate'])) {
        if (preg_match($regexBirthDathe, $_POST['birthdate'])) {
            $profil->birthdate = htmlspecialchars($_POST['birthdate']);
        } else {
            $formError['birthdate'] = 'Veuillez bien verifier le format de votre date de naissance';
        }
    } else {
        $formError['birthdate'] = 'Veuillez remplir le champ de la date de naissance';
    }
    if (!empty($_POST['phoneNumber'])) {
        if (preg_match($regexphone, $_POST['phoneNumber'])) {
            $profil->phone = htmlspecialchars($_POST['phoneNumber']);
        } else {
            $formError['phoneNumber'] = 'Veuillez bien remplir avec des chiffres le champ du numéro de téléphone aucun caractère entre les numéros';
        }
    } else {
        $formError['phoneNumber'] = 'Veuillez remplir le champ du numéro de téléphone';
    }
    if (!empty($_POST['mail'])) {
        if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
            $profil->mail = htmlspecialchars($_POST['mail']);
        } else {
            $formError['mail'] = 'Veuillez remplir le champ du mail par une adresse mail valide ';
        }
    } else {
        $formError['mail'] = 'Veuillez remplir le champ du mail';
    }

      if (!empty($_POST['password'])) {
            $profil->password = htmlspecialchars (password_hash($_POST['password'], PASSWORD_BCRYPT));
        } else {
            $formError['password'] = 'Veuillez remplir le champ mot de passe';
        }
    if (count($formError) == 0) {
        $profil->addProfil();
    }
}
