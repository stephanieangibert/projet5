var request = new XMLHttpRequest();
request.onreadystatechange = function() {
    if (this.readyState == XMLHttpRequest.DONE && this.status == 200) {
        var response = JSON.parse(this.responseText);
        console.log(response.current_condition.condition);
        console.log(response);
        document.getElementById("pdp").innerHTML=response.current_condition.condition;
        document.getElementById("pdp2").src=response.current_condition.icon;
    }
};
request.open("GET", "https://www.prevision-meteo.ch/services/json/nantes");
request.send();