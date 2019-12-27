<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="public/css/menu.css">	  
    <title>Le Blog de cuisine</title> 
</head>
<body>

<p class="ajout">Hello Admin</p>
<p class="ajout"><a href="index.php">Retour sur le site </a></p>
<table cellpadding="5" cellspacing="10">
<thead>
         <th>Mail</th>
         <th>Pseudo</th>
</thead>  
<tbody>   

<?php while($data= $users->fetch()):
       echo'<tr><td>'.$data['email'].'</td>
                <td>'.$data['pseudo'].'</td>
            </tr>';
endwhile;?>   
         </table>  
         </tbody>
         <table cellpadding="5" cellspacing="10">
<thead>
         <th>Titre</th>
         <th>Ingredients</th>
         <th>Recettes</th>
         <th>Photo</th>
</thead>  
<tbody>   

<?php while($data= $recipes->fetch()):
       echo'<tr><td>'.$data['title'].'</td>
                <td>'.$data['ingredients'].'</td>
                <td>'.$data['content'].'</td>'?>
            <?php    if($data['photo']!=""):
               echo'<td ><img  class="photoBack" src="member/photo/'.$data['photo'].'"></td>';            
                else:
                 echo'<td></td>';
                endif;
            echo '<td class="btn1">
             <a class="btn1" href="index.php?action=delete&amp;id=' . $data['id'] . '">Annuler</a>
             </td> 
             <td class="btn2">';
             if($data['statut']==1):
                echo'<a class="btn2" href="index.php?action=accept&amp;id=' . $data['id'] . '">En ligne</a>';
            
             else:
                echo'<a class="btn3" href="index.php?action=accept&amp;id=' . $data['id'] . '">En attente</a>';
             endif;
             echo'
            
             </td> 
             </tr>';
        endwhile;?>   
         </table>  
         </tbody>
</body>
</html>