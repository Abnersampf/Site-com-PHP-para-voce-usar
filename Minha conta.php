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
        echo "<script>window.location.href='Dashboard.php'</script>";
    else {
        $res = mysqli_query($conexao, "select * from users order by codigo");

        while($row = mysqli_fetch_assoc($res)) {
            if ($row["codigo"] == $logado){
                $u = $row["usuario"];
                $e = $row["email"];
                $s = $row["senha"];
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
    <link rel="stylesheet" type="text/css" href="CSS/Minha conta.css">
    <script type="text/javascript" src=""></script>
    <title>Minha conta</title>
</head>
<body>
    <div id="caixa">
        <div id="caixaInterior">
            <img src="Imagens/user.png" id="user">
            <br><br>
            <h2>M i n h a&nbsp;&nbsp;&nbsp;c o n t a</h2>
            <br>
            <div id="borda"></div>
            <br>
            <div id="linha1">
                <div id="nomeUsuário">Nome de usuário:&nbsp;&nbsp;<div id="nomeUsuárioFinal">
                    <?php 
                        echo $u;
                    ?>
                </div></div>
            </div>
            <div id="linha2">
                <div id="email">E-mail:&nbsp;&nbsp;<div id="emailFinal">
                    <?php
                        echo $e;
                    ?>
                </div></div>
            </div>
            <div id="linha3">
                <div id="senha">Senha:&nbsp;&nbsp;<div id="senhaFinal">
                <?php
                    echo $s;
                ?>
                </div></div>
            </div>
        </div>
    </div>
</body>
</html>