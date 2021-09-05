<?php

    session_start();
    unset($_SESSION['nomeProfessor']);
    unset($_SESSION['emailProfessor']);
    unset($_SESSION['senhaProfessor']);
    unset($_SESSION['autorizacaoProfessor']);
    session_destroy();
    header("location: ../index.php");

?>