<?php

class ModelPlayer extends Model {

    private ?int $id;
    private ?string $pseudo;
    private ?int $score;
    private ?string $team;
    private ?int $idTeam;

    public function __construct(int $id, string $pseudo, int $score, string $team, int $idTeam){
        
        $this->id = $id;
        $this->pseudo = $pseudo;
        $this->score = $score;
        $this->team = $team;
        $this->idTeam = $idTeam;
    }

    // Method GET

    public function getId():?int{
        return $this->id;
    }

    public function getPseudo():?string{
        return $this->pseudo;
    }

    public function getScore():?int{
        return $this->score;
    }

    public function getTeam():?string{
        return $this->team;
    }

    public function getIdTeam():?int{
        return $this->idTeam;
    }

    // Method SET

    public function setId(int $newId):self{
        $this->id = $newId;
        return $this;
    }

    public function setPseudo(string $newPseudo):self{
        $this->pseudo = $newPseudo;
        return $this;
        }
        
        public function setScore(int $newScore):self{
            $this->score = $newScore;
            return $this;
    }

    public function setTeam(string $newTeam):self{
        $this->team = $newTeam;
        return $this;
        }
        
    public function setIdTeam(int $idTeam):self{
        $this->idTeam = $idTeam;
        return $this;
        }
            
    // Method pour récupérer tous les joueurs de la base de données
                    
    public function findAll():?array{
        try{
            //1. Préparer une requête pour SELECT les utilisateurs
            //On utilise l'objet PDO stocké dans l'attribut bdd de notre model ($this->bdd)
            $req = $this->getBDD()->prepare('SELECT id, pseudo, score, team FROM user');
        
            //2. Exécution de la requête
            $req->execute();
        
            //3. Return des données utilisateurs
                return $req->fetchAll(PDO::FETCH_ASSOC);

                }catch(EXCEPTION $error){
                    die($error->getMessage());
                }
            }

    // Method pour récupérer un joueur par son pseudo
            
    public function findByPseudo():array | bool | null{
        //Try...Catch() permettant ded'envoyer une requête à la BDD pour récupérer les infos d'un compte utilisateur dont l'email a été conservé dans l'objet ModelUSer
        try{
            //1. Preparation de la requête
            $req = $this->getBDD()->prepare('SELECT id, pseudo, score, team FROM user WHERE pseudo = ?');
                    
            //2. Binding Param : relié les ? de la requête à la valeur d'une donnée
            $req->bindParam(1,$this->pseudo,PDO::PARAM_STR);

            //3. Exécuter la requête
            $req->execute();

            //4. Retourner la réponse de la BDD
            return $req->fetch(PDO::FETCH_ASSOC);//fetch => [id : 1, pseudo : "root", ...] : directement le tableau associatif
            //fetchAll => [ [id : 1, pseudo : "root", ...] ] : le tableau associatif se trouve dans un tableau

        }catch(EXCEPTION $error){
            die($error->getMessage());
            }
        }
            
    // Method pour ajouter un joueur 
        
    public function add(){
        try{
            //Preparation de la requête
                $req = $this->getBDD()->prepare('INSERT INTO user (id, pseudo, score, team) VALUES (?,?,?,?)');
        
            //Binding de Param
            $req->bindParam(1,$this->id,PDO::PARAM_INT);
            $req->bindParam(2,$this->pseudo,PDO::PARAM_STR);
            $req->bindParam(3,$this->score,PDO::PARAM_INT);
            $req->bindParam(4,$this->team,PDO::PARAM_STR);
        
            //Exécution de la requête
            $req->execute();
        
        }catch(EXCEPTION $error){
            die($error->getMessage());
            }
        }
    
    // Method pour supprimer un joueur

    public function delete(int $id):void{
        try{
            //1. Préparer la requête pour DELETE l'utilisateur
            $req = $this->getBDD()->prepare('DELETE FROM user WHERE id = ?');

            //2. Binding Param : relié les ? de la requête à la valeur d'une donnée
            $req->bindParam(1,$id,PDO::PARAM_INT);

            //3. Exécuter la requête
            $req->execute();

        }catch(EXCEPTION $error){
            die($error->getMessage());
        }
    }

    // Method pour update un joueur 

    public function update(int $id, string $pseudo, int $score, string $team):void{
        try{
            //1. Préparer la requête pour UPDATE le score de l'utilisateur
            $req = $this->getBDD()->prepare('UPDATE user SET pseudo = ?, score = ?, team = ? WHERE id = ?');

            //2. Binding Param : relié les ? de la requête à la valeur d'une donnée
            $req->bindParam(1,$pseudo,PDO::PARAM_STR);
            $req->bindParam(2,$score,PDO::PARAM_INT);
            $req->bindParam(3,$team,PDO::PARAM_STR);
            $req->bindParam(4,$id,PDO::PARAM_INT);

            //3. Exécuter la requête
            $req->execute();

        }catch(EXCEPTION $error){
            die($error->getMessage());
        }
    }

}