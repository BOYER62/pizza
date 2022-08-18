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
        include_once './objet/user.php';
        include_once './objet/manager.php';
        include_once './asset/function/affichePizza.php';
    
        if(!isset($_GET['entree']) and !isset($_GET['enregistrement'])){
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

            if(isset($_GET['entree'])){
            $user = new user($_POST['mail'], $_POST['password']);
            $manager = new manager($db);
            $user = $manager->read('user',$_POST['mail']);
            if (!empty($user)) {
                echo 'Bonjour' .' '. $user[0]['prenom'] .' '.$user[0]['nom'];
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
                <!-- <div>
                    <img src="./asset/image/<?php echo $pizza[0]['img'] ?>">
                    <h4>pizza <?php echo $pizza[0]['nom'] ?></h4>
                    <h5>prix : <?php echo $pizza[0]['prix'] ?> €</h5>
                    <h6>ingredients :</h6>
                    <h6><?php echo $ingredients[0]['ingredient'] ?></h6>
                    <h6><?php echo $ingredients[1]['ingredient'] ?></h6>
                    <h6><?php echo $ingredients[2]['ingredient'] ?></h6>
                </div> -->
                <?php
} else {
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
                //$user = new user(12, $_POST['mail'], $_POST['password'], $_POST['nom'], $_POST['prenom']);
                $manager = new manager($db);
                //$manager -> create('user',$_POST['mail'], $_POST['password'], $_POST['nom'], $_POST['prenom']);
                $sql = $db -> prepare("INSERT INTO `user` 
                (`nom`, `prenom`, `mail`, `password`) 
                VALUES 
                (:nom, :prenom, :mail, :password)");

                //$sql -> bindValue(":id", $role->getId(),PDO::PARAM_INT);
                $sql -> bindValue(":nom", $_POST['nom'], PDO::PARAM_STR);
                $sql -> bindValue(":prenom", $_POST['prenom'], PDO::PARAM_STR);
                $sql -> bindValue(":mail", $_POST['mail'], PDO::PARAM_STR);
                $sql -> bindValue(":password", $_POST['password'], PDO::PARAM_STR);

                $sql -> execute();
                header("location:index.php?entree"); 
            }
    ?>
    
</body>
</html>