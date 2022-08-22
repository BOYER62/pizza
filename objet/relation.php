<?php

class relation {
    //attributs
    private $relationPizza;
    private $relationIngredient;


    //constructor
    public function __construct($relationPizza = 100, $relationIngredient = 100)
    {
        // $this -> setId($id);
        $this -> setRelationPizza($relationPizza);
        $this -> setRelationIngredient($relationIngredient);
    }

    //getter
    public function getRelationPizza()
    {
        return $this->relationPizza;
    }
    public function getRelationIngredient()
    {
        return $this->relationIngredient;
    }

    

    //setter
    public function setRelationIngredient($relationIngredient)
    {
        $this -> relationIngredient = $relationIngredient;
    }
    public function setRelationpizza($relationPizza)
    {
        $this -> relationPizza = $relationPizza;
    }
}