<?php

class profil {

    public $id = 0;
    public $name = '';
    public $firstname = '';
    public $birthdate = '2000-02-01';
    public $phone = '';
    public $mail = '';
    public $presentation = '';
    public $localisation = '';
    public $password = '';
    public $database = null;

    public function __construct() {
        try {
            $this->database = new PDO('mysql:host=localhost;dbname=Yume;charset=utf8', 'stituor', 'guillaume60');
        } catch (Exception $exc) {
            die('la base de donnée n\'est pas connectée' . $exc->getTraceAsString());
        }
    }

    public function addProfil() {
        $query = 'INSERT INTO `gdfgger_usersInscription` (`lastname`, `firstname`, `birthdate`, `phoneNumber`, `mail`, `password`) '
                . 'VALUES (UPPER(:lastname), :firstname, :birthdate, :phoneNumber, :mail, :password)'; //":" avant les valeurs s'appelle marqueur nominatif
        $queryprepare = $this->database->prepare($query); //prepare ren
        $queryprepare->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $queryprepare->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $queryprepare->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $queryprepare->bindValue(':phoneNumber', $this->phone, PDO::PARAM_STR);
        $queryprepare->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $queryprepare->bindvalue(':password', $this->password, PDO::PARAM_STR);
        return $queryprepare->execute();
    }

    public function checkIfUsersExist() {
        $query = 'SELECT COUNT(`id`) AS `userExists` '
                . ' FROM `gdfgger_usersInscription` '
                . ' WHERE `mail` = :mail'
                . ' AND `phoneNumber` = :phoneNumber ';
        $queryprepare = $this->database->prepare($query);
        $queryprepare->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $queryprepare->bindValue(':phoneNumber', $this->phoneNumber, PDO::PARAM_STR);
        $queryprepare->execute();
        return $queryprepare->fetch(PDO::FETCH_OBJ);
    }

    public function getUserElementForLogin() {
        $query = 'SELECT `id`, `mail`, `lastname`, `firstname`, `password` '
                . ' FROM `gdfgger_usersInscription` '
                . ' WHERE `mail` = :mail ';

        $queryprepare = $this->database->prepare($query);
        $queryprepare->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $queryprepare->execute();
        return $queryprepare->fetch(PDO::FETCH_OBJ);
    }

}
