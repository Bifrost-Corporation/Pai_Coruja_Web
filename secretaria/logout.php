<?php

    session_start();
    unset($_SESSION['emailSecretaria']);
    unset($_SESSION['senhaSecretaria']);
    unset($_SESSION['autorizacaoSecretaria']);
    session_destroy();
    header("location: ../index.php");

?>