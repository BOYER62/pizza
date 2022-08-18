<?php

class user {
    //attributs
    private $id;
    private $nomUser;
    private $prenom;
    private $mail;
    private $password;


    //constructor
    public function __construct($mail = "Olivier.Olivier@gmail.com", $password = "$1$", $nomUser="", $prenom="")
    {
        // $this -> setId($id);
        $this -> setMail($mail);
        $this -> setPassword($password);
        $this -> setNomUser($nomUser);
        $this -> setPrenom($prenom);
    }

    //getter
    public function getId()
    {
        return $this->id;
    }
    public function getNomUser()
    {
        return $this->nomUser;
    }
    public function getPrenom()
    {
        return $this->prenom;
    }
    public function getMail()
    {
        return $this->mail;
    }
    public function getPassword()
    {
        return $this->password;
    }

    //setter
    public function setId($id)
    {
        $this -> id = $id;
    }
    public function setNomUser($nomUser)
    {
        $this -> nomUser = $nomUser;
    }
    public function setPrenom($prenom)
    {
        $this -> prenom = $prenom;
    }
    public function setMail($mail)
    {
        $this -> mail = $mail;
    }
    public function setPassword($password)
    {
        $this -> password = $password;
    }
}