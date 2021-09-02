<?php

    session_start();
    unset($_SESSION['idAdministrador']);
    unset($_SESSION['emailAdm']);
    unset($_SESSION['senhaAdm']);
    unset($_SESSION['autorizacaoAdm']);
    session_destroy();
    header("location: ../index.php");

?>