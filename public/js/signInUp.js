class Sign{
constructor(){
 document.getElementById("inscrip").style.visibility="visible";
 document.getElementById("connex").style.visibility="visible";
 document.getElementById("bouton").style.visibility="visible";
document.getElementById("inscription").style.visibility="hidden";
document.getElementById("connexion").style.visibility="hidden";
document.getElementById("connex").addEventListener('click', this.connexion.bind(this));
document.getElementById("inscrip").addEventListener('click', this.subscribe.bind(this));


}
connexion(){ 
    document.getElementById("connexion").style.visibility="visible";
    document.getElementById("inscription").style.visibility="hidden";
    this.signVisib= document.getElementById("inscrip").style.visibility="visible";
    this.logVisib= document.getElementById("connex").style.visibility="hidden";
    
}
subscribe(){   
    document.getElementById("inscription").style.visibility="visible";
    document.getElementById("connexion").style.visibility="hidden";
    this.signVisib= document.getElementById("inscrip").style.visibility="hidden";
    this.logVisib= document.getElementById("connex").style.visibility="visible";

}
if (signIn){

}

}
var intro=new Sign();