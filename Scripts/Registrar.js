function valida(){
    var usuario = document.getElementById("usuario").value;
    var senha = document.getElementById("senha").value;
    var email = document.getElementById("email").value;
    var checkbox = document.getElementById("checkbox");

    if(usuario == "") {
        document.getElementById("faltouInformacoes").innerHTML = "O campo 'Usuário' não foi preenchido!";
        return false;
    }
    else if(senha == "") {
        document.getElementById("faltouInformacoes").innerHTML = "O campo 'Senha' não foi preenchido!";
        return false;
    }
    else if(email == "") {
        document.getElementById("faltouInformacoes").innerHTML = "O campo 'E-mail' não foi preenchido!";
        return false;
    }
    else if(!(checkbox.checked)) {
        document.getElementById("faltouInformacoes").innerHTML = "Você não concordou com os termos e condições";
        return false;
    }
}