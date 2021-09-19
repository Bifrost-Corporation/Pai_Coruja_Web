<?php
    include("../secretaria/sentinela.php");
    include("../classes/Aluno.php");

    try{
        header("location: ../secretaria/cadastrar-aluno.php");
        $idAluno = $_GET['idAluno'];
        $aluno = new Aluno();
        $aluno->setIdAluno($idAluno);
        $aluno->excluir($aluno);
        return 'Escola excluída com sucesso!';
        
    }catch(Exception $e){
        echo $e->getMessage();
    }
?>