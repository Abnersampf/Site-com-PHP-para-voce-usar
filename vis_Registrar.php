<!DOCTYPE html>
<html>
  <head>
    <title>Visualizar registros</title>
    <meta charset="utf-8">
  </head>
  <body>
<?php
      include "conexao.php";

      if($conexao == false)
        echo "<h3>Erro ao conectar o banco de dados ...</h3>";
      else {
        $res = mysqli_query($conexao, "select * from users order by codigo");

        echo "<table border=1>";
        echo "<tr>";
        echo "<th width='80'>Código</th>";
        echo "<th width='200'>Usuario</th>";
        echo "<th width='80'>Senha</th>";
        echo "<th width='80'>Email</th>";
        echo "<th width='80'>Pontos</th>";
        echo "</tr>";

        while($row = mysqli_fetch_assoc($res)) {
          echo "<tr>";
          echo "<td>" . $row["codigo"] . "</td>";
          echo "<td>" . utf8_encode($row["usuario"]) . "</td>";
          echo "<td>" . $row["senha"] . "</td>";
          echo "<td>" . $row["email"] . "</td>";
          echo "<td>" . $row["pontos"] . "</td>";
          echo "</tr>";
        }

        echo "</table>";
      }

      mysqli_close($conexao);
    ?>

    
    <br><br>
  </body>
</html>
