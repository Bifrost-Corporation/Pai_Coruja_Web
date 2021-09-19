<?php

    include("../secretaria/sentinela.php");
    include("../classes/Disciplina.php");
    include("../classes/Professor.php");

    try{
        header("Location: ../secretaria/cadastrar-disciplina.php");
        $idDisciplina = $_POST['idDisciplina'];
        $nomeDisciplinaInput = $_POST['txtNomeDisciplina'];
        $nomeProfessorInput = $_POST['txtProfessor'];
        $disciplina = new Disciplina();
        $professor = new Professor();
        $listaProfessor = $professor->listar();
        foreach($listaProfessor as $linha){
            if($nomeProfessorInput == $linha['nomeProfessor'] && $_SESSION['idEscola'] == $linha['idEscola']){
                if($idDisciplina > 0){
                    $disciplina->setIdDisciplina($idDisciplina);
                    $disciplina->setNomeDisciplina($nomeDisciplinaInput);
                    $disciplina->setIdProfessor($linha['idProfessor']);
                    $disciplina->setIdEscola($_SESSION['idEscola']);
                    echo $disciplina->atualizar($disciplina);
                }else{
                    $disciplina->setNomeDisciplina($nomeDisciplinaInput);
                    $disciplina->setIdProfessor($linha['idProfessor']);
                    $disciplina->setIdEscola($_SESSION['idEscola']);
                    echo $disciplina->cadastrar($disciplina);
                }
            }
        }
    }catch(Exception $e){
        echo $e->getMessage();
    }

?>