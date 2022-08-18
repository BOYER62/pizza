<?php
     include_once '../bdd.php';
     //include_once '../../objet/pizza.php';
     include_once '../../objet/manager.php';
?>
<form action="../../index.php?ajouter" method="POST">
    <h1>Ajoute d'une pizza</h1>
    <label  class="col-form-label col-form-label-sm mt-4" for="nom">nom de la pizza</label>
    <input class="col-form-control col-form-label-sm" type="text" name ="nom" id="nom">
    <label  class="col-form-label col-form-label-sm mt-4" for="base">base de la pizza</label>
    <input class="col-form-control col-form-label-sm" type="text" name ="base" id="base">
    <label  class="col-form-label col-form-label-sm mt-4" for="prix">prix de la pizza</label>
    <input class="col-form-control col-form-label-sm" type="text" name ="prix" id="prix">
    <label  class="col-form-label col-form-label-sm mt-4" for="img">image de la pizza</label>
    <input class="col-form-control col-form-label-sm" type="text" name ="img" id="img">
    <?php
        $manager = new manager($db);
        $ingredients = $manager -> read('ingredients', "");
        ?>
        <fieldset class="form-group">
            <legend class="mt-4">Ajouter les ingredients</legend>
            <?php
            foreach($ingredients as $key => $value){
                ?>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="<?php echo $value['ingredient']; ?>" id="ingredients<?php echo $value['id']; ?>" name="ingredients<?php echo $value['id']; ?>">
        <label class="form-check-label" for="ingredients">
                <?php echo $value['ingredient']; ?>
        </label>
      </div>
    <?php
        }
        ?>
    </fieldset>
    <label  class="col-form-label col-form-label-sm mt-4" for="ingredientsManquant">plus d'ingredient</label>
    <input class="col-form-control col-form-label-sm" type="text" name ="ingredientsManquant" id="ingredientsManquant">
    <button type="submit">Valider</button>
</form>