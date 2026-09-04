<?php

    class ControllerHome extends Controller{

        public function displayPlayers():void{
            $players = $this->getModel()->findAll();
            $this->getView()->setData($players)->displayAll();
        }
        
        public function registerPlayer():void {

            if(isset($_POST['submitInscription'])){
            //Vérifier les champs vides
            if(empty($_POST['pseudo']) || empty($_POST['score']) || empty($_POST['team'])){
                $this->getView()->setMessage('Veuillez remplir tous les champs.');
                return;
            }
            }

            //Nettoyer les données
            $pseudo = sanitize($_POST['pseudo']);
            $score = sanitize($_POST['score']);
            $team = sanitize($_POST['team']);

            $this->getModel()->setPseudo($pseudo)->setScore($score)->setTeam($team);

            //Vérifier si le pseudo est libre
            $data = $this->getModel()->findByPseudo();
            if($data){
                $this->getView()->setMessage("Ce pseudo n'est pas disponible.");
                return;
            }

            //Lancement de l'insertion en BDD
            $this->getModel()->add();

            $this->getView()->setMessage("Vous avez bien été enregistré.");
    
        }
    }