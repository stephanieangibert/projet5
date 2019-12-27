<?php ob_start(); ?> 

<p class="ajout">Pour modifier votre profil</p>
<?php while($data=$Prof->fetch()): 
    echo'
    <form action="index.php?action=change&amp;id='.$data['id'].'" method="post" id="profil" enctype="multipart/form-data">
    <div>
    <div><p class="photoRond"> <img class="photo"src="member/avatars/'.$data['avatar'].'"></p></div>
        <label for="name" >Pseudo :</label>
        <input type="text" id="name" name="pseudo" value="'.$data['pseudo'].'">
    </div>
    <div>
        <label for="mail">e-mail :</label>
        <input type="email" id="mail" name="email" value="'.$data['email'].'" >
    </div>
    <div>
        <label for="mdp">Mot de passe :</label>
        <input type="password" id="mdp" name="password" value="6 caractères">
        
    </div>
    <div>
        <label for="mdp">Mot de passe :</label>
        <input type="password" id="mdp" name="pass1" placeholder="6 caractères">
        
    </div>
    </br>
    if(isset($msg)){
        <font color="white">'. $msg.'</font>;  }
    <div>
    <label for="file" id="ava">Mon avatar:</label>
    <input type="file" name="avatar" />
    </div>  
    <input type="submit" name="submit" value="envoyer" id="submit2">          
   
 
</form>
';
 endwhile;?>


<?php $content = ob_get_clean(); ?>
 <?php require('view/frontend/template.php');?>