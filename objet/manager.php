<?php
//include_once './objet/pizza.php';
//include_once './objet/relation.php';
//include_once './objet/user.php';

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
    public function create($role) { //, $mail, $password, $nomUser, $prenom, ){
        switch (get_class($role)) {
            case 'user' :
                var_dump($role);
                $sql = $this -> bdd -> prepare("INSERT INTO `user` 
                (`nom`, `prenom`, `mail`, `password`, `admin`) 
                VALUES 
                (:nom, :prenom, :mail, :password, :admin)");

                //$sql -> bindValue(":id", $role->getId(),PDO::PARAM_INT);
                $sql -> bindValue(":nom", $role->getNomUser(), PDO::PARAM_STR);
                $sql -> bindValue(":prenom", $role->getPrenom(), PDO::PARAM_STR);
                $sql -> bindValue(":mail", $role-> getMail(), PDO::PARAM_STR);
                $sql -> bindValue(":password", $role-> getPassword(), PDO::PARAM_STR);
                $sql -> bindValue(":admin", $role->getAdmin(), PDO::PARAM_INT);

                $sql -> execute();
                break;

            case 'pizza' :
                $sql = $this -> bdd -> prepare("INSERT INTO `pizza` 
                (`base`, `nom`, `prix`, `img`) 
                VALUES 
                (:base, :nom, :prix, :img)");
                echo $role->getBase();
                //$sql -> bindValue(":id", $player->getId(),PDO::PARAM_INT);
                $sql -> bindValue(":base", $role->getBase(), PDO::PARAM_STR);
                $sql -> bindValue(":nom", $role->getNom(), PDO::PARAM_STR);
                $sql -> bindValue(":prix", $role->getPrix(), PDO::PARAM_INT);
                $sql -> bindValue(":img", $role->getImg(), PDO::PARAM_STR);
                $sql -> execute();
                break;

            case 'relation' :
                $sql = $this -> bdd -> prepare("INSERT INTO `relantionpizzaingredients`
                (`id_pizza`, `id_ingredients`)
                VALUES
                (:idPizza, :idIngredients)");
                
                $sql -> bindValue(":idPizza", $role->getRelationPizza(),PDO::PARAM_STR);
                $sql -> bindValue(":idIngredients", $role->getRelationIngredient(),PDO::PARAM_STR);
                
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
