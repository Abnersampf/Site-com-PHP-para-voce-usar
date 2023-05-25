<?php
  if(isset($_POST["usuario"]) && isset($_POST["senha"])) {
    
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    include "conexao.php";

    if($conexao == false)
      echo "<script>alert('Erro ao conectar-se ao banco de dados!')</script>";
    else {
      $sql = "SELECT * FROM users WHERE usuario = '$usuario' and senha = '$senha'";
      $result = $conexao->query($sql);

      if (mysqli_num_rows($result) < 1){
        echo "<script>alert('Usuário e/ou senha incorreto(s)!');</script>";
        if(isset($_SESSION["usuario"]) && isset($_SESSION["senha"]) && isset($_SESSION["codigo"])) {
          unset($_SESSION['codigo']);
          unset($_SESSION['usuario']);
          unset($_SESSION['senha']);
        }
      }
      else{
        $cod = "SELECT codigo FROM users WHERE usuario = '$usuario' and senha = '$senha'";
        $resultado = $conexao->query($cod);
        $row = mysqli_fetch_assoc($resultado);
        $codigo = $row["codigo"];

        session_start();
        $_SESSION['codigo'] = $codigo;
        $_SESSION['usuario'] = $usuario;
        $_SESSION['senha'] = $senha;
        
        echo "<script>window.location.href='Dashboard.php'</script>";
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="CSS/Login.css">
  <style>
    #faltouInformacoes{
      font-size: 12px;
      color: red;
    }
  </style>
  <script>
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
  </script>
  <title>Login</title>
</head>
<body>
  <form id="formulario" name="formulario" method="post" action="Login.php" onsubmit="return valida()">
    <div id="principal">
      <h1>Login</h1>
      <input type="text" placeholder="Nome de Usuário" id="usuario" name="usuario">
      <br><br>
      <input type="password" placeholder="Senha de acesso" id="senha" name="senha">
      <br><br>
      <div id="faltouInformacoes"></div>
      <br>
      <input type="submit" id="entrar" name="entrar" value="Entrar">
      <br><br><br>
      <a href="Recuperar senha.html">Esqueci minha senha</a>
      <br><br>
      <a href="Registrar.php">Não tenho uma conta</a>
    </div>
  </form>
</body>
</html>