<?php ob_start();?>

<form method="post" action="" enctype="multipart/form-data">
<p class="ajout">Le titre</p> 
<input type="text" name="title"></input> 
<br> 
 <select name="category">
    <option value="entree">Entrée</option>
    <option value="plat">Plat</option>
    <option value="dessert">Dessert</option>    
</select> 
<p class="ajout">Donnez-moi vos ingrédients</p>
<textarea type="text" name="ingredients" id="ing" rows="20" cols="50" ></textarea>
<p class="ajout">Donnez-moi votre recette</p>
<textarea type="text" name="content" id="contenu" rows="20" cols="50" ></textarea>
<br>
<label for="file" id="photo">Votre photo:</label> 
<input type="file" name="photo" />
<br>
<input type="submit" id="submit" name="submitAdd" value="envoyer" >
</form>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>