<?php ob_start();?>
<div class="news" id="chapitres">
<p>
<?php echo $postCom['title'];?></p>
<p class="ingredients">               
                
 <?php   echo nl2br($postCom['ingredients']);?> </p>
 <p>
             <?php                   
                   echo nl2br($postCom['content']); ?> 
 </p>
</div>

                
             
           

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>