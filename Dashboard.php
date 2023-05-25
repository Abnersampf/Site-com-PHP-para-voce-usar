<?php
    session_start();
    if((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true) and (!isset($_SESSION['codigo']) == true)){
        echo "<script>window.location.href='Login.php'</script>";
        unset($_SESSION['codigo']);
        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);
    }
    $logado = $_SESSION['codigo'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/Dashboard.css">
    <script type="text/javascript" src="Scripts/Login.js"></script>
    <title>Dashboard</title>
</head>
<body>
    <header>
        <a href="index.html"><h1 class="logo">&lt/Words></h1></a>
        <nav>
            <ul class="nav-links">
                <li><a href="rank.php">Rank</a></li>
                <li><a href="Minha conta.php">Minha conta</a></li>
                <li><a href="Meus pontos.php">Meus pontos</a></li>
            </ul>
        </nav>
        <a href="sair.php"><button class="sair">Sair</button></a>
    </header>
    <br><br><br><br><br><br><br>
    <h3>M e l h o r e &nbsp;&nbsp;s u a &nbsp;&nbsp;d i g i t a ç ã o &nbsp;&nbsp;j o g a n d o !</h3>
    <br><br><br><br><br>
    <div id="areaJogar">
        <a href="Jogar.php"><button class="jogar">Jogar</button></a>
    </div>
</body>
</html>