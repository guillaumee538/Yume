<?php
include_once 'include/header.php';
include_once 'models/profil.php';
include_once 'controllers/indexCtrl.php';
?>
        <h1>Connexion</h1>
        <form action="#" method="POST">
            <label for="mail">Adresse mail</label>
            <input type="mail" name="mail" id="mail">
            <p id="mailVerif"><?= isset($formError['mail']) ? $formError['mail'] : '' ?></p>
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" />
            <p><?= isset($formError['password']) ? $formError['password'] : '' ?></p>
            <input type="submit" name="login" value="Se connecter" />
        </form>
    </body>
</html>
