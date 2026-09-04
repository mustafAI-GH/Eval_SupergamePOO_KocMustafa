<?php

 class Model {

    private PDO $bdd;

    public function __construct(){
        try{
            $this->bdd = new PDO("mysql:host=".BDD_HOST.";dbname=".BDD_NAME, BDD_USERNAME, BDD_PASSWORD);
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    public function getBDD():?PDO{
        return $this->bdd;
    }

    public function setBDD(PDO $bdd):self{
        $this->bdd = $bdd;
        return $this;
    }
 }
?>
