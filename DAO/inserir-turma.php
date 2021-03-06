<?php

    include ('../secretaria/sentinela.php');
    include ('../classes/Turma.php');

    try{
        header("location: ../secretaria/visualizar-dados.php");
        $idTurma = $_POST['idTurma'];
        $nomeTurma = $_POST['txtNomeTurma'];
        $idEscola = $_POST['idEscola'];
        $turma = new Turma();
        $turma->setNomeTurma($nomeTurma);
        $turma->setIdEscola($idEscola);
        if($idTurma > 0){
            $turma->setIdTurma($idTurma);
            echo $turma->atualizar($turma);
        }else{
            echo $turma->cadastrar($turma);
        }
    } catch(Exception $e) {
        echo $e->getMessage();
    }

?>