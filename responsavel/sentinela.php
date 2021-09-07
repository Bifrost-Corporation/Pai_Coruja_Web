<?php

    session_start();

    if(isset($_SESSION['autorizacaoResponsavel']) == false){
        unset($_SESSION['autorizacaoResponsavel']);
        session_destroy();
        header("location: ../index.php");
    }

?>