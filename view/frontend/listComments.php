<?php ob_start();?>
<div class="news" id="chapitres">

<p>
<?php echo $postOne['title'];?></p>
<p class="ingredients">               
                
 <?php   echo nl2br($postOne['ingredients']);?> </p>
 <p>
             <?php                   
                   echo nl2br($postOne['content']); ?> 
 </p>
</div>
<?php while($dataCom=$reqCom->fetch()):
   echo'<div class="com"><p class="auteur"><strong>'.$dataCom['id_pseudo'].'</strong> le '.$dataCom['date_comment'].'</p>
   <p class="textcommentaire">'.$dataCom['comment'].'</div>';endwhile;?>
<?php
if(isset($_SESSION['pseudo'])):
 echo'
 <form id="laissercommentaire" action= "index.php?action=comment&amp;id='.$postOne['id'].'" method="POST">
        
       <label for="commentaire" class="commentaires" >Laisser un commentaire</label>
       <br>
       
        <textarea type="text" name="comment" rows="10" cols="60" id="comment"></textarea>
        <br>
        <input type="hidden" name="id_recipe" value="'.$_GET['id'].'"/>
        
      <input type="submit" id="submit3" value="envoyer">

</form>';endif;?>


<div class="ttesLesRecettes"><a href="index.php">Toutes les recettes</a></div>              
             
           

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>