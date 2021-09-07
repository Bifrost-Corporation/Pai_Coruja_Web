<?php

    session_start();
    unset($_SESSION['nomeResponsavel']);
    unset($_SESSION['emailResponsavel']);
    unset($_SESSION['senhaResponsavel']);
    unset($_SESSION['autorizacaoAdm']);
    session_destroy();
    header("location: ../index.php");

?>