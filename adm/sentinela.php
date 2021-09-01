<?php

    session_start();

    if(isset($_SESSION['autorizacaoAdm']) == false){
        unset($_SESSION['autorizacaoAdm']);
        session_destroy();
        header("location: ../index.php");
    }

?>