<?php

class pizza {
    //attributs
    private $id;
    private $base;
    private $nom;
    private $prix;
    private $img;


    //constructor
    public function __construct($base = "tomate", $nom = "reine", $prix = 10, $img ="default.jpg")
    {
        // $this -> setId($id);
        $this -> setBase($base);
        $this -> setNom($nom);
        $this -> setPrix($prix);
        $this -> setImg($img);
    }

    //getter
    public function getId()
    {
        return $this->id;
    }

    public function getBase()
    {
        return $this->base;
    }
    public function getNom()
    {
        return $this->nom;
    }
    public function getPrix()
    {
        return $this->prix;
    }
    public function getImg()
    {
        return $this->img;
    }

    //setter
    public function setId($id)
    {
        $this -> id = $id;
    }
    public function setBase($base)
    {
        $this -> base = $base;
    }
    public function setNom($nom)
    {
        $this -> nom = $nom;
    }
    public function setPrix($prix)
    {
        $this -> prix = $prix;
    }
    public function setImg($img)
    {
        $this -> img = $img;
    }
}