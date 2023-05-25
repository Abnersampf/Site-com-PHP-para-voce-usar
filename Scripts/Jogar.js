var palavraGerada = "";
var pts = 0;
document.cookie = "cpts="+pts;

document.getElementById('escreverPalavra').onpaste = false;
function gerarStrings(){
    palavraGerada = Math.random().toString(36).substr(2);
    document.getElementById("palavra").innerHTML = palavraGerada;
} 
function pontos(){
    var palavraDigitada = document.getElementById("escreverPalavra").value;
    if (palavraDigitada == ""){
        document.getElementById("nada").innerHTML = "Você não digitou nada!";
        document.getElementById("incorreta").innerHTML = "";
        return false;
    }
    else {
        if (palavraDigitada == palavraGerada){
            gerarStrings();

            pts += 1;

            document.cookie = "cpts="+pts;

            document.getElementById("pontos").innerHTML = pts;
            document.getElementById("nada").innerHTML = "";
            document.getElementById("incorreta").innerHTML = "";
            document.getElementById("escreverPalavra").value = "";
            document.getElementById("escreverPalavra").focus();
        }
        else{
            document.getElementById("incorreta").innerHTML = "A palavra digitada está incorreta, tente novamente!";
            document.getElementById("nada").innerHTML = "";
            return false;
        }
        return false;
    }
}
