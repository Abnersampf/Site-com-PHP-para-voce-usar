<?php
  if(isset($_POST["usuario"]) && isset($_POST["senha"]) && isset($_POST["email"])) {
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
    $email = $_POST["email"];

    $temUsuario = false;
    $temEmail = false;

    include "conexao.php";

      if($conexao == false)
        echo "<script>alert('Erro ao conectar-se ao banco de dados!')</script>";
      else { 
        $res = mysqli_query($conexao, "select * from users order by codigo");
        
        while($row = mysqli_fetch_assoc($res)) {
            if (utf8_encode($row["usuario"]) == $usuario){
                $temUsuario = true;
            }
            if ($row["email"] == $email){
                $temEmail = true;
            }
        }
        if ($temUsuario == true || $temEmail == true){
            echo "<script>alert('Nome de usuário e/ou email já cadastrado(s)');</script>";
        }
        else{
          mysqli_query($conexao, "insert into users values (null, '" . utf8_decode($usuario) . "', '" . $senha . "', '" . $email . "', '" . 0 . "')");
          echo "<script>window.location.href='Conta criada.php'</script>";
          session_start();
          $_SESSION['conta-criada'] = "sim";
        }
      }
      mysqli_close($conexao);
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="CSS/Registrar.css">
  <title>Registrar</title>
  <style>
    #faltouInformacoes{
      font-size: 15px;
      color: red;
    }
  </style>
  <script src="Scripts/Registrar.js"></script>
</head>
<body>
  <form id="formulario" name="formulario" method="post" action="Registrar.php" onsubmit="return valida()">
    <div id="principal">
      <h1>Registrar</h1>
      <br>
      <input type="text" placeholder="Nome de Usuário" id="usuario" name="usuario">
      &nbsp;
      &nbsp;
      <input type="password" placeholder="Senha de acesso" id="senha" name="senha">
      <br><br>
      <input type="text" placeholder="E-mail" id="email" name="email">
      <br><br>
      <div id="faltouInformacoes"></div>
      <br>
      <input type="checkbox" id="checkbox"><label>Eu li e concordo com os </label><a href="Termos e condições.html" id="termos" target="_blank">Termos e condições</a>
      <br><br><br>
      <input type="submit" id="criar-conta" name="criar-conta" value="Criar conta">
      <br><br>
      <a href="Login.php" id="jaTenhoConta">Já tenho uma conta</a>
    </div>
  </form>
</body>
</html>