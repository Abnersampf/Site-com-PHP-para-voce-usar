<?php
    session_start();
    unset($_SESSION["usuario"]);
    unset($_SESSION["senha"]);
    unset($_SESSION["codigo"]);
    echo "<script>window.location.href='Login.php'</script>";
?>