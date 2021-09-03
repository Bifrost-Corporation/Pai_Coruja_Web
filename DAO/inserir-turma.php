<?php

    include ('../secretaria/sentinela.php');
    include ('../classes/Turma.php');

    try{
        header("location: ../secretaria/cadastrar-turma.php");
        $nomeTurma = $_POST['txtNomeTurma'];
        $idEscola = $_SESSION['idEscola'];
        $turma = new Turma();
        $turma->setNomeTurma($nomeTurma);
        $turma->setIdEscola($idEscola);
        echo $turma->cadastrar($turma);
    } catch(Exception $e) {
        echo $e->getMessage();
    }

?>