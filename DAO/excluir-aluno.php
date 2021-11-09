<?php
    include("../secretaria/sentinela.php");
    include("../classes/Aluno.php");

    try{
        header("location: ../secretaria/visualizar-dados.php");
        $idAluno = $_GET['idAluno'];
        $aluno = new Aluno();
        $aluno->setIdAluno($idAluno);
        $aluno->excluir($aluno);
        return 'Aluno excluído com sucesso!';
        
    }catch(Exception $e){
        echo $e->getMessage();
    }
?>