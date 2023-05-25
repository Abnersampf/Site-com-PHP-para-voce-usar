<?php
  session_start();
  if(!isset($_SESSION['conta-criada']) == true){
    echo "<script>window.location.href='Registrar.php'</script>";
  }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="CSS/Conta criada.css">
  <title>Conta criada</title>
</head>
<body onload="escreverEmail()">
    <div id="principal">
      <h1>Sua conta foi criada, Parabéns!</h1>
        <div id="secundaria">
          <span>Clique no botão "Ir para Login" para poder logar e entrar em sua conta.</span>
          <br><br>
          <img src="Imagens/conta criada.png">
          <br><br>
      </div>
      <a href="Login.php">
        <input type="button" id="irLogin" value="Ir para Login">
      </a>
    </div>
</body>
</html>