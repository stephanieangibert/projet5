
document.getElementById("title").addEventListener("focus", function (e) {
    
    if (e.target.value !== 0) {
       
        document.getElementById("signal").style.visibility="hidden";
    }
    
});
   