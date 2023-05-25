<?php
    include "conexao.php";
    error_reporting(0);

    session_start();
    if((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true) and (!isset($_SESSION['codigo']) == true)){
        echo "<script>window.location.href='Login.php'</script>";
        unset($_SESSION['codigo']);
        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);
    }
    $logado = $_SESSION['codigo'];

    $points = $_COOKIE['cpts'];
    //echo "<script>alert('$points');</script>";

    if($conexao == false)
        echo "<script>alert('Erro ao conectar-se ao banco de dados!')</script>";
    else {
        $res = mysqli_query($conexao, "select * from users order by codigo");
        $alt = "UPDATE users SET pontos = pontos + '$points' WHERE codigo = '$logado'";
        while($row = mysqli_fetch_assoc($res)) {
            if ($row["codigo"] == $logado){
                //echo "linha = " . $row["codigo"] . " | logado = " . $logado;
                mysqli_query($conexao, $alt);
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
    <link rel="stylesheet" type="text/css" href="CSS/Jogar.css">
    <script type="text/javascript" src="Scripts/Jogar.js"></script>
    <style>
        #conferir{
            background-color: #6300c5;
            border: none;
            padding: 15px;
            width: 100px;
            border-radius: 5px;
            color: white;
            font-size: 15px;
            transition: all 0.3s ease 0s;
        }
        #conferir:hover{
            background-color: #8000ff;
            cursor: pointer;
        }
        #enviar{
            padding: 10px;
            width: 80px;
            background-color: white;
            color: #6300c5;
            font-weight: bold;
            border-radius: 15px;
            transition: all 0.3s ease 0s;
        }
        #enviar:hover{
            background-color: rgb(223, 223, 223);
            color: #962eff;
            cursor: pointer;
        }
        #finalizar{
            text-align: center;
        }
        #v{
            text-align: center;
        }
        #voltar{
            padding: 10px;
            width: 180px;
            background-color: white;
            color: #6300c5;
            font-weight: bold;
            border-radius: 15px;
            transition: all 0.3s ease 0s;
        }
        #voltar:hover{
            background-color: rgb(223, 223, 223);
            color: #962eff;
            cursor: pointer;
        }
    </style>
    <title>Jogar</title>
</head>
<body onload="gerarStrings()" oncopy="return false;" oncut="return false;" onpaste="return false;" oncontextmenu="return false;">
    <form id="jogar" name="jogar" method="post" action="Jogar.php">
        <div id="caixa">
            <div id="itens-palavra">
                <div id="palavra"></div>
                <br><br><br><br><br>
                <div id="entradaDeDados">
                    <input type="text" id="escreverPalavra" placeholder="Digite a palavra acima">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="button" id="conferir" name="conferir" value="Conferir" onclick="pontos()">
                </div>
                <br>
                <div id="incorreta"></div>
                <div id="nada"></div>
                <div id="pontosPai">
                    <h3>Pontos:</h3>&nbsp;&nbsp;
                    <div id="pontos" name="pontos"></div>
                </div>
                <div id="finalizar"><input type="submit" id="enviar" name="enviar" value="Enviar"></div>
                <br><br>
                <div id="v" name="v"><a href="Dashboard.php"><input type="button" id="voltar" name="voltar" value="Voltar ao Dashboard"></a></div>
            </div>
        </div>
    </form>
</body>
</html>