document.getElementById("inscription").addEventListener("submit",function(e){
  var inputs=document.getElementById("inscription").getElementsByTagName("input");
  var erreur="";
  var msg="Formulaire envoyé";
  var mdp=document.getElementById("mdp");
  var mdp1=document.getElementById("mdp1");
  var pseudo=document.getElementById("name");
  var regex=/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{6,}$/;
if (regex.test(mdp.value)) {
    if(mdp.value!=mdp1.value){
        erreur="Les mots de passe ne correspondent pas !";
      }

}
else{
    erreur="Votre mdp doit contenir 6 car avec 1 maj et 1 chiffre";
}  

  for(i=0;i<inputs.length;i++){
      if(!inputs[i].value){
          erreur="veuillez remplir tous les champs !";
          
  }
}

  if(erreur){
    e.preventDefault();
    document.getElementById("erreur").innerHTML = erreur;
    return false;
  }
  else {
   document.getElementById("erreur").innerHTML = "";
   document.getElementById("msg").innerHTML=msg;   
}
});
