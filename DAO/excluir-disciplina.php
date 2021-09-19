<?php
    include("../secretaria/sentinela.php");
    include("../classes/Disciplina.php");

    try{
        header("location: ../secretaria/cadastrar-disciplina.php");
        $idDisciplina = $_GET['idDisciplina'];
        $disciplina = new Disciplina();
        $disciplina->setIdDisciplina($idDisciplina);
        $disciplina->excluir($disciplina);
        return 'Disciplina excluída com sucesso!';
        
    }catch(Exception $e){
        echo $e->getMessage();
    }
?>