<?php ob_start();?>
<?php 
         if(isset($erreur)):
            echo '<div id="signal" ><font color="white">'. $erreur.'</font></div>';endif;?> 

<form method="post" action="" enctype="multipart/form-data" id="recipes">
<p class="ajout">Le titre</p> 
<input type="text" name="title" id="title"></input> 
<br> 
 
<p class="ajout">Donnez-moi vos ingrédients</p>
<textarea type="text" name="ingredients" id="ing" rows="20" cols="50" ></textarea>
<p class="ajout">Donnez-moi votre recette</p>
<textarea type="text" name="content" id="content" rows="20" cols="50" ></textarea>
<br>
<label for="file" id="photo">Votre photo:</label> 
<input type="file" name="photo" />
<br>
<input type="submit" id="submit" name="submitAdd" value="envoyer" >
</form>


<script src="public/js/registrationRecipe.js"> </script>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>