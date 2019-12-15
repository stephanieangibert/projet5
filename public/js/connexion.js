document.getElementById("connexion").addEventListener("submit",function(e){
     var inputs=document.getElementById("connexion").getElementsByTagName("input");
     var erreur2="";
   for(i=0;i<inputs.length;i++){
       if(!inputs[i].value){
           erreur2="Remplir tous les champs !";
       }
   }
   if(erreur2){
    e.preventDefault();
    document.getElementById("erreur2").innerHTML = erreur2;
    return false;
  }
  else {
   document.getElementById("erreur2").innerHTML = "";
  
}
});