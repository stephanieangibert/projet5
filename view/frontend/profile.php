<?php ob_start(); ?> 
<p class="ajout">Pour modifier votre profil</p>
<form action="" method="post" id="profil" enctype="multipart/form-data">
    <div>
        <label for="name">Pseudo :</label>
        <input type="text" id="name" name="pseudo">
    </div>
    <div>
        <label for="mail">e-mail :</label>
        <input type="email" id="mail" name="email">
    </div>
    <div>
        <label for="mdp">Mot de passe :</label>
        <input type="password" id="mdp" name="password" placeholder="6 caractères">
        
    </div>
    <div>
        <label for="mdp">Mot de passe :</label>
        <input type="password" id="mdp" name="pass1" placeholder="6 caractères">
        
    </div>
    <div>
    <label for="file" id="ava">Mon avatar:</label>
    <input type="file" name="monfichier" />
    </div>
    <input type="submit" name="submit" value="envoyer" id="submit2">          

 
</form>

<?php $content = ob_get_clean(); ?>
 <?php require('view/frontend/template.php');?>