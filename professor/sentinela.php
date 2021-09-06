<?php

    session_start();

    if(isset($_SESSION['autorizacaoProfessor']) == false){
        unset($_SESSION['autorizacaoProfessor']);
        session_destroy();
        header("location: ../index.php");
    }

?>