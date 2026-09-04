<?php

    class ViewHome extends View {

        private string $message = "";
        private ?array $data;

        public function displayMain():self{
        
        ob_start();
?>
        <main>
            <h1>Ajouter un joueur</h1>
            <form action="" method="post">
                <label for="pseudo">Pseudo du joueur :</label>
                <input type="text" name="pseudo" id="pseudo" required>
                <label for="score">Score du joueur :</label>
                <input type="number" name="score" id="score" required>
                <label for="team">Équipe du joueur :</label>
                <select name="team" id="team">
                    <option value="1">Aucune</option>
                    <option value="2">TeamRocket</option>
                    <option value="3">DreamTeam</option>
                </select>
                <input type="submit" value="Ajouter" name="submitInscription">
            </form>
            // Message d'erreur
            <p><?php echo $this->getMessage(); ?></p>
            // Affichage de la liste des joueurs
            <p></p>
        </main>
<?php
        //Récupération du HTML à afficher dans l'Attribur Buffer commun à toutes les Views (voir la class View)
        $this->setBuffer(ob_get_clean());
        //Retour de l'objet entier pour permettre le chaînage de méthode
        return $this;
    }

    public function getData():?array{
        return $this->data;
    }

    public function getMessage():?string{
        return $this->message;
    }

    public function setData(array $newData):self{
        $this->data = $newData;
        return $this;
    }

    public function setMessage(?string $newMessage):self{
        $this->message = $newMessage;
        return $this;
    }


    //Affichage de l'entièreté de la page
    public function displayAll():void{
        $this->displayHeader();
        $this->displayMain();
        $this->displayFooter();
    }
}

?>

