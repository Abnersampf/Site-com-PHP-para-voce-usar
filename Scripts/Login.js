function valida(){
    var usuario = document.getElementById("usuario").value;
    var senha = document.getElementById("senha").value;
    
    if(usuario == "") {
        document.getElementById("faltouInformacoes").innerHTML = "O campo 'Usuário' não foi preenchido!";
        return false;
    }
    else if(senha == "") {
        document.getElementById("faltouInformacoes").innerHTML = "O campo 'Senha' não foi preenchido!";
        return false;
    }
}