<?php
include_once './objet/pizza.php';
include_once './objet/user.php';

class manager {

    // Attributes
    private $bdd;
    
    // Constructor
    public function __construct(PDO $db)
    {
        $this->setBdd($db);
    }

    // Getters

    // Setters
    public function setBdd(PDO $db)
    {
        $this->bdd = $db;
    }

    // Methods
    //Create
    public function create($role, $mail, $password, $nomUser, $prenom, ){
        switch ($role) {
            case 'user' :
                var_dump($role);
                $sql = $this -> bdd -> prepare("INSERT INTO `user` 
                (`nom`, `prenom`, `mail`, `password`) 
                VALUES 
                (:nom, :prenom, :mail, :password)");

                //$sql -> bindValue(":id", $role->getId(),PDO::PARAM_INT);
                $sql -> bindValue(":nom", $nomUser->getNomUser(), PDO::PARAM_STR);
                $sql -> bindValue(":prenom", $prenom->getPrenom(), PDO::PARAM_STR);
                $sql -> bindValue(":mail", $mail-> getMail(), PDO::PARAM_STR);
                $sql -> bindValue(":password", $password-> getPassword(), PDO::PARAM_STR);

                $sql -> execute();
                break;

            case 'pizza' :
                $sql = $this -> bdd -> prepare("INSERT INTO `pizza` 
                (`base`, `nom`) 
                VALUES 
                (:base, :nom)");

                //$sql -> bindValue(":id", $player->getId(),PDO::PARAM_INT);
                $sql -> bindValue(":base", $role->getBase(), PDO::PARAM_STR);
                $sql -> bindValue(":nom", $role->getNom(), PDO::PARAM_STR);
        
                $sql -> execute();
                break;
            
            case 'default' :
                break;
        }
        
    }

    //Read
    public function read($role, $mail){
        switch ($role){
            case 'pizza' :
                $sql = $this -> bdd -> prepare ("SELECT * FROM `pizza`");
                $sql -> execute();
                $pizza = $sql->fetchAll(PDO::FETCH_ASSOC);
                
                return $pizza;
                break;
            case 'ingredients' :
                $sql = $this -> bdd -> prepare ("SELECT * FROM `ingredients`");
                $sql -> execute();
                $ingredients = $sql->fetchAll(PDO::FETCH_ASSOC);
                
                return $ingredients;
                break;
            case 'user' :
                $sql = $this -> bdd -> prepare ("SELECT * FROM `user` WHERE `mail`='$mail'");
                $sql -> execute();
                $user = $sql->fetchAll(PDO::FETCH_ASSOC);                    
                
                return $user;
                break;
            case 'relation' :
                $sql = $this -> bdd -> prepare ("SELECT * FROM `relantionpizzaingredients`");
                $sql -> execute();
                $relation = $sql->fetchAll(PDO::FETCH_ASSOC);                    
                
                return $relation;    ;
                break;
            case 'default' :
                break;
        }
    }

    //Update

    //Delete
}
