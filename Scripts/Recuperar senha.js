function validaFormularioRecuperarSenha(){
    var email = document.getElementById("email");

    if(email.value == ""){
        document.getElementById("faltouEmail").innerHTML = "O campo E-MAIL está vazio!";
        email.focus();
    }
    else{
        document.forms["formulario-recuperar_senha"].submit();
        pegarEmail();
        limpaCamposRegistrar();
    }
}
function limpaCamposRegistrar() {
    document.getElementById("email").value = "";
    document.getElementById("email").focus();
}
function pegarEmail(){
    var email = document.getElementById("email").value;
    localStorage.setItem("emailvalue", email);
    return false;
}