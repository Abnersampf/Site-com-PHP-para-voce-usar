<?php
    session_start();
    if((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true) and (!isset($_SESSION['codigo']) == true)){
        echo "<script>window.location.href='Login.php'</script>";
        unset($_SESSION['codigo']);
        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);
    }
    $logado = $_SESSION['codigo'];

    include "conexao.php";

    if($conexao == false)
        echo "<script>alert('Erro ao conectar-se ao banco de dados!')</script>";
    else {
        $res = mysqli_query($conexao, "select * from users order by codigo");

        while($row = mysqli_fetch_assoc($res)) {
            if ($row["codigo"] == $logado){
                $pt = $row["pontos"];
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
  <link rel="stylesheet" type="text/css" href="CSS/Meus pontos.css">
  <title>Meus pontos</title>
</head>
<body>
    <div id="principal">
      <h1>Meus pontos</h1>
      <div id="meus_pontos" name="meus_pontos"><?php echo $pt;?></div>
      <br>
      <div id="v"><a href="Dashboard.php"><input type="button" id="voltar" name="voltar" value="Voltar"></a></div>
    </div>
</body>
</html>