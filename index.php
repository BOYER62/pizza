<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Christophe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
    <?php

        include_once './asset/bdd.php';
        include_once './objet/pizza.php';
        include_once './objet/relation.php';
        include_once './objet/user.php';
        include_once './objet/manager.php';
        include_once './asset/function/affichePizza.php';
    
        if(!isset($_GET['entree']) and !isset($_GET['enregistrement']) and !isset($_GET['ajouter'])){
    ?>
        <form action="index.php?entree" method="POST">
            <label  class="col-form-label col-form-label-sm mt-4" for="mail">mail</label>
            <input class="col-form-control col-form-label-sm" type="text" name ="mail" id="mail">
            <label  class="col-form-label col-form-label-sm mt-4" for="password">mot de passe</label>
            <input class="col-form-control col-form-label-sm" type="text" name ="password" id="password">
            <button type="submit">entree</button>
        </form>
    <?php
    }

            if(isset($_GET['entree']) || isset($_GET['entreeEnr'])){
                if(isset($_GET['entree'])){
            $user = new user($_POST['mail'], $_POST['password']);
            $manager = new manager($db);
            $user = $manager->read('user',$_POST['mail']);
                }
            if (!empty($user)) {
                if ($user[0]['password'] != $_POST['password']){
                    header("location:index.php");
                }
                echo 'Bonjour' .' '. $user[0]['prenom'] .' '.$user[0]['nom'];
                if ($user[0]['admin'] == 1){
                    ?>
                    <a type="button" href="asset/include/ajouterPizza.php">Ajouter pizza</a>
                    <?php
                }
            
                $pizza = $manager->read('pizza',"");
                $ingredients = $manager->read('ingredients',"");
                $relation = $manager->read('relation',"");

                foreach ($pizza as $key => $value){
                    affichePizza($key, $value);
                    foreach ($ingredients as $key => $value){
                        afficheIngredients($key, $value);
                    }
                }
                ?>
                <?php
} elseif (!isset($_GET['entreeEnr'])) {
    ?> <h1>Pas d'utilisateur</h1>
    <form action="index.php?enregistrement" method="POST">
            <label  class="col-form-label col-form-label-sm mt-4" for="mail">mail</label>
            <input class="col-form-control col-form-label-sm" type="text" name ="mail" id="mail">
            <label  class="col-form-label col-form-label-sm mt-4" for="password">mot de passe</label>
            <input class="col-form-control col-form-label-sm" type="text" name ="password" id="password">
            <label  class="col-form-label col-form-label-sm mt-4" for="nom">nom</label>
            <input class="col-form-control col-form-label-sm" type="text" name ="nom" id="nom">
            <label  class="col-form-label col-form-label-sm mt-4" for="prenom">prenom</label>
            <input class="col-form-control col-form-label-sm" type="text" name ="prenom" id="prenom">
            <button type="submit">entree</button>
        </form> <?php
}
            }
            if(isset($_GET['enregistrement'])){
                $user = new user($_POST['mail'], $_POST['password'], $_POST['nom'], $_POST['prenom'],0);
                $manager = new manager($db);
                $manager -> create($user);
                
                header("location:index.php?entreeEnr"); 
            }
            if(isset($_GET['ajouter'])){
                var_dump($_POST);
                $pizza = new pizza($_POST['base'], $_POST['nom'], $_POST['prix'], $_POST['img']);
                $manager = new manager($db);
                $manager -> create($pizza);
                $pizza = $manager->read('pizza',"");
                $idPizza = $pizza[(count($pizza))-1]['id'];
                array_pop($_POST);
                array_splice($_POST,0,4);
                print_r($_POST);   
                $i = 1;
                $max = count($_POST);
                var_dump($i);
                while ($i <= $max){
                $relation = new relation($idPizza, $_POST['ingredients'.$i]);
                //$manager = new manager($db);
                $manager -> create($relation);
                $i++;
                }
            }
    ?>
    
</body>
</html>