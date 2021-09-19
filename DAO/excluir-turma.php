<?php
    include("../secretaria/sentinela.php");
    include("../classes/Turma.php");

    try{
        header("location: ../secretaria/cadastrar-turma.php");
        $idTurma = $_GET['idTurma'];
        $turma = new Turma();
        $turma->setIdTurma($idTurma);
        $turma->excluir($turma);
        return 'Turma excluída com sucesso!';
        
    }catch(Exception $e){
        echo $e->getMessage();
    }
?>