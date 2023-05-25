<?php

    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
    $email = $_POST["email"];

    $temUsuario;
    $temEmail;

    $conexao = mysqli_connect("localhost", "root", "root", "informacoes");

      if($conexao == false)
        echo "<h3>Erro ao conectar o banco de dados ...</h3>";
      else {
        echo "<h3>Conexão efetuada com sucesso!</h3>";
        $res = mysqli_query($conexao, "select * from usuarios order by codigo");
        
        while($row = mysqli_fetch_assoc($res)) {
            
            if ((utf8_encode($row["usuario"]) == $usuario)){
                $temUsuario = true;
            }
            if (utf8_encode($row["email"]) == $email){
                $temEmail = true;
            }
        }
        if ($temUsuario == true || $temEmail == true){
            echo "<script>document.getElementById('faltouInformacoes').innerHTML = 'Nome de usuário e/ou email já cadastrado(s)!';</script>";
        }
        else{
            mysqli_query($conexao, "insert into usuarios values (null, '" . utf8_decode($usuario) . "', '" . $senha . "', '" . utf8_decode($email) . "')");

            echo "Usuario: <b>" . $usuario . "</b>";
            echo "<br>Senha: <b>" . $senha . "</b>";
            echo "<br>E-mail: <b>" . $email . "</b>";
        }
      }
      mysqli_close($conexao);

?>