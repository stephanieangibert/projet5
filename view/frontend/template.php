<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width">	
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">  -->
    <link rel="stylesheet" href="public/css/couleur.css">
    <link rel="stylesheet" href="public/css/menu.css"> 
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
		integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <title>Le Blog de cuisine</title>
 
</head>
<body>
 <?php var_dump($_SESSION['admin']);
       var_dump($_SESSION['pseudo']);

 if($_SESSION['admin']==1){
   echo'<nav><ul>
   <li class="accueil"><a href="index.php?action=listPosts">Accueil</a></li>
   <li class="recettes"><a href="index.php?action=add">Recettes</a></li>
   <li class="profil"><a href="index.php?action=profil&amp;id='.($_SESSION['id']).'">Profil</a></li>
   <li class="inscription"><a href="index.php?action=subscribe">Connexion</a></li>
   <li class="admin"><a href="index.php?action=admin">Admin</a></li>
   </ul>
   </nav>';

  }else{
 echo'  <nav><ul>
<li class="accueil"><a href="index.php?action=listPosts">Accueil</a></li>
<li class="recettes"><a href="index.php?action=add">Recettes</a></li>
<li class="profil"><a href="index.php?action=profil&amp;id='.($_SESSION['id']).'">Profil</a></li>
<li class="inscription"><a href="index.php?action=subscribe">Connexion</a></li>
</ul>
</nav>';
  }?>

<h1>Le blog de Joce</h1>
<?= $content?>
  <footer>
    <p class="pdp1">Les données météo de la ville de Nantes</p>
   <div class="meteo">
    <p id="pdp"></p>
    <p id="pdp2"></p>
</div>
    </footer>
   
    <script src="public/js/ajax.js"> </script>
   
</body>
</html>
 


