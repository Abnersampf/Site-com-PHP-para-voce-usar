<?php
    session_start();
    if((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true) and (!isset($_SESSION['codigo']) == true)){
        echo "<script>window.location.href='Login.php'</script>";
        unset($_SESSION['codigo']);
        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body{
      font-family: Arial, Helvetica, sans-serif;
      background-color: #161616;
      text-align: center;
      color: #8000ff;
    }
    .table-bg{
        background: rgba(0,0,0,0.3);
        border-radius: 15px;
        padding: 50px;
    }
    .m-5{
      text-align: center;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%,-50%);
    }
  </style>
  
  <title>Rank</title>
</head>
<body>
  <div class="m-5">
    <table class="table text-white table-bg">
      <thread>
        <tr>
          <th width="100" scope="col">Rank</th>
          <th width="100" scope="col">Usuário</th>
          <th width="100" scope="col">Pontos</th>
        </tr>
      </thread>
      <tbody>
        <?php
          include "conexao.php";

          if($conexao == false)
            echo "<script>alert('Erro ao conectar-se ao banco de dados!')</script>";
          else {
            $res = mysqli_query($conexao, "select * from users order by pontos desc");
    
            $lugar = 1;
    
            while($row = mysqli_fetch_assoc($res)) {
              echo "<tr>";
              echo "<td>" . $lugar . "</td>";
              echo "<td>" . $row["usuario"] . "</td>";
              echo "<td>" . $row["pontos"] . "</td>";
              echo "</tr>";
              $lugar += 1;
            }
    
            echo "</table>";
          }
        ?>
      </tbody>
  </div>
</body>
</html>