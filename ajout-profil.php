<?php
include_once 'models/profil.php';
include_once 'controllers/ajout-profilCtrl.php';
include_once 'include/header.php';
?>
<h1>Formulaire d'ajouts profil</h1>
<div class="imageAccueil"></div>
<div id="firstimage" class="form-group">
    <div class="form-row"> 
        <form action="#" method="POST">
            <div id="adminName" class="form-group">
                <div class="form-row">
                    <div class="col-md-12">
                        <label for="lastname">Nom : </label>
                        <input class="form-control" id="lastname" type="text" name="lastname" placeholder="Delabre" value="<?= isset($_POST['lastname']) ? $_POST['lastname'] : '' ?>" />
                        <p><?php echo isset($formError['lastname']) ? $formError['lastname'] : '' ?>
                    </div>
                </div>
            </div>
            <div id="firstName" class="form-group">
                <div class="form-row">
                    <div class="col-md-12">
                        <label for="firstname">Prénom : </label>
                        <input class="form-control" id="firstname" type="text" name="firstname" placeholder="Frédéric" value="<?= isset($_POST['firstname']) ? $_POST['firstname'] : '' ?>" />
                        <p><?php echo isset($formError['firstname']) ? $formError['firstname'] : '' ?></p>
                    </div>
                </div>
            </div>
            <div id="Mail" class="form-group">
                <label for="mail">Email : </label>
                <input class="form-control" id="mail" type="email" aria-describedby="mail" name="mail" placeholder="adresse@gmail.com" value="<?= isset($_POST['mail']) ? $_POST['mail'] : '' ?>" />       
                <p><?php echo isset($formError['mail']) ? $formError['mail'] : '' ?></p>
            </div>
            <div id="phone" class="form-group">
                <div class="form-row">
                    <div class="col-md-12">
                        <label for="phoneNumber">Téléphone : </label>
                        <input class="form-control" id="phoneNumber" type="text" name="phoneNumber" placeholder="0601020304" value="<?= isset($_POST['phoneNumber']) ? $_POST['phoneNumber'] : '' ?>" />   
                        <p><?php echo isset($formError['phoneNumber']) ? $formError['phoneNumber'] : '' ?></p>
                    </div>
                </div>
            </div>
            <div id="birthdate" class="form-group">
                <div class="form-row">
                    <div class="col-md-12">
                        <label for="birthdate">Date de naissance : </label>
                        <input class="form-control" id="birthdate" type="date" name="birthdate" value="<?= isset($_POST['birthdate']) ? $_POST['birthdate'] : '' ?>" />
                        <p><?php echo isset($formError['birthdate']) ? $formError['birthdate'] : '' ?></p>
                    </div>
                </div>
            </div>
              <div id="password" class="form-group">
                <div class="form-row">
                    <div class="col-md-12">
                        <label for="password">Mot de passe : </label>
                        <input class="form-control" id="password" type="password" name="password" value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>" />
                        <p><?php echo isset($formError['password']) ? $formError['password'] : '' ?></p>
                    </div>
                </div>
            </div>
            <button type="submit" name="inscription_utilisateur">Inscription</button>
        </form>
    </div>
</div>    
<?php include_once 'include/footer.php'; ?>