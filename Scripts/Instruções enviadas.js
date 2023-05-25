function escreverEmail(){
    var email = localStorage.getItem("emailvalue");
    var comprimento = email.length;
    var novoEmail = "";
    var arroba = email.indexOf("@");
    var _80porcento = parseInt((70 * (arroba - 1)) / 100);
    for (var c = 0; c < comprimento; c++){
        if (c <= _80porcento){
            novoEmail += "*";
        }
        else{
            novoEmail += email[c];
        }
    }
    document.getElementById("escrevaAqui").innerHTML = "" + novoEmail;
}