<?php
    function affichePizza($key,$value){
        ?>
        <div>
            <img src="./asset/image/<?php echo $value['img'] ?>">
            <h4>pizza <?php echo $value['nom'] ?></h4>
            <h5>prix : <?php echo $value['prix'] ?> €</h5>
        </div>
        <?php
    }

    function afficheIngredients($key,$value){
        ?>
        <div>
            <h6>ingredients :</h6>
            <h6><?php echo $value['ingredient'] ?></h6>
        </div>
        <?php
    }