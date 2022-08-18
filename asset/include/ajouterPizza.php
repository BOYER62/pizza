<form action="index.php" method="POST">
    <h1>Ajoute d'une pizza</h1>
    <label  class="col-form-label col-form-label-sm mt-4" for="nom">nom de la pizza</label>
    <input class="col-form-control col-form-label-sm" type="text" name ="nom" id="nom">
    <label  class="col-form-label col-form-label-sm mt-4" for="base">base de la pizza</label>
    <input class="col-form-control col-form-label-sm" type="text" name ="base" id="base">
    <label  class="col-form-label col-form-label-sm mt-4" for="prix">prix de la pizza</label>
    <input class="col-form-control col-form-label-sm" type="text" name ="prix" id="prix">
    <label  class="col-form-label col-form-label-sm mt-4" for="img">image de la pizza</label>
    <input class="col-form-control col-form-label-sm" type="text" name ="img" id="img">
    <fieldset class="form-group">
      <legend class="mt-4">Ajouter les ingredients</legend>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="ingredients">
        <label class="form-check-label" for="ingredients">
          Case à cocher par défaut
        </label>
      </div>
    </fieldset>
</form>