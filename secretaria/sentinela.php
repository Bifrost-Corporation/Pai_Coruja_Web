<?php

    session_start();

    if(isset($_SESSION['autorizacaoSecretaria']) == false){
        unset($_SESSION['autorizacaoSecretaria']);
        session_destroy();
        header("location: ../index.php");
    }

?>