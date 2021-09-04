<?php

    include_once ("../secretaria/sentinela.php");
    include_once ("../classes/Professor.php");

    try{
        header("Location: ../secretaria/cadastrar-professor.php");
        $nomeProfessor = $_POST['txtNomeProfessor'];
        $emailProfessor = $_POST['txtEmailProfessor'];
        $senhaProfessor = $_POST['txtSenhaProfessor'];
        $idEscola = $_SESSION['idEscola'];
        $professor = new Professor();
        $professor->setNomeProfessor($nomeProfessor);
        $professor->setEmailProfessor($emailProfessor);
        $professor->setSenhaProfessor($senhaProfessor);
        $professor->setIdEscola($idEscola);
        echo $professor->cadastrar($professor);
    }catch(Exception $e){
        echo $e->getMessage();
    }

?>