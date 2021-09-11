<?php

    session_start();
    unset($_SESSION['idSecretaria']);
    unset($_SESSION['idEscola']);
    unset($_SESSION['nomeSecretaria']);
    unset($_SESSION['emailSecretaria']);
    unset($_SESSION['senhaSecretaria']);
    unset($_SESSION['autorizacaoSecretaria']);
    session_destroy();
    header("location: ../index.php");

?>