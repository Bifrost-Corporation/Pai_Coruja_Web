<?php

    include("../secretaria/sentinela.php");
    include("../classes/Disciplina.php");
    include("../classes/Professor.php");

    try{
        header("Location: ../secretaria/visualizar-dados.php");
        $idDisciplina = $_POST['idDisciplina'];
        $nomeDisciplinaInput = $_POST['txtNomeDisciplina'];
        $nomeProfessorInput = $_POST['txtProfessor'];
        $idEscola = $_POST['idEscola'];
        $disciplina = new Disciplina();
        $professor = new Professor();
        $listaProfessor = $professor->listar();
        foreach($listaProfessor as $linha){
            if($nomeProfessorInput == $linha['nomeProfessor'] && $_SESSION['idEscola'] == $linha['idEscola']){
                if($idDisciplina > 0){
                    $disciplina->setIdDisciplina($idDisciplina);
                    $disciplina->setNomeDisciplina($nomeDisciplinaInput);
                    $disciplina->setIdProfessor($linha['idProfessor']);
                    $disciplina->setIdEscola($idEscola);
                    echo $disciplina->atualizar($disciplina);
                }
            }
        }
    }catch(Exception $e){
        echo $e->getMessage();
    }

?>