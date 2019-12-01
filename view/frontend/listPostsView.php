<?php ob_start();?>
<p class="ajout"><a href="index.php?action=add">Ajouter une recette <i class="fas fa-pen-nib"></i></a></p>
<?php
while ($data = $posts->fetch())
{
    ?>
<div class="news" id="chapitres">
    <h3 class="titre">
        <?php echo htmlspecialchars($data['title']); ?>
        <em>le <?php echo htmlspecialchars($data['date_content']); ?></em>
       
    </h3>
            <p class="ingredients">
                
                
             <?php   echo nl2br($data['ingredients']);?> </p>
                
             
           <p>
             <?php                   
                   echo nl2br($data['content']); ?>     
  
                    <div class="comment" ><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a><a><i class="fas fa-thumbs-up"></i></a></div>
            </p>               
     
      
</div>
<?php
} 

$posts->closeCursor();
 
?>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
                          
                            