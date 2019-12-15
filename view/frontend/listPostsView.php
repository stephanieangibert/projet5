<?php ob_start();?>

<?php if(isset($_SESSION['pseudo'])){
   echo' <p class="ajout"><a href="index.php?action=add">Ajouter une recette <i class="fas fa-pen-nib"></i></a></p>';
    

}

while ($data = $posts->fetch())
{
    ?>
<div class="news" id="chapitres" >
    <div class="pseud">
 
     
  
    <h3 class="titre">
        <?php echo htmlspecialchars($data['title']); ?>     
       
    </h3>
    </div>
            <p class="ingredients">
                
                
             <?php   echo nl2br($data['ingredients']);?> </p>
                
             
           <p>
             <?php                   
                   echo nl2br($data['content']); ?>   
                    </p> 
                  <?php if($data['photo']!=""){
              echo'<div><p class="photoRecette"> <img class="photoRe"src="member/photo/'.$data['photo'].'"></p></div>';
                  } ?>
     
                    <div class="comment" ><a href="index.php?action=post&amp;id=<?php echo $data['id'] ?>">Commentaires</a><a href="index.php?action=love&amp;id=<?php echo$data['id'];?>"><i class="fas fa-thumbs-up"></i></a></div>
             
               

      
</div>

<?php
} 

$posts->closeCursor();?>

<div class="pagination">
<?php
for($i=1;$i<=$allPages;$i++) {
   if($i == $currentPage) {
      echo '<font color="white">'.$i.'</font>';
   } else {
      echo '<a href="index.php?listPosts='.$i.'">'.$i.'</a> ';
   }
}
?> 
 </div>      


<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
                          
                            