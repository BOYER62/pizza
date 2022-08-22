<?php

class ingredient extends pizza {
    //attributs
    private $ingredient;


    //constructor
    public function __construct($ingredient = "tomate")
    {
        // $this -> setId($id);
        $this -> setIngredient($ingredient);
    }

    //getter
    public function getIngredient()
    {
        return $this->ingredient;
    }

    

    //setter
    public function setIngredient($ingredient)
    {
        $this -> ingredient = $ingredient;
    }
}