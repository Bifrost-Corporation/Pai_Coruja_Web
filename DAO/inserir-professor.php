<?php

    include_once ("../secretaria/sentinela.php");
    include_once ("../classes/Professor.php");
    include_once ("../classes/Usuario.php");

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
        $listaProfessor = $professor->selecionarUltimoProfessor();
        foreach($listaProfessor as $linha){
            $idProfessor = $linha['idProfessor'];
        }
        $usuario = new Usuario();
        $usuario->setIdProfessor($idProfessor);
        echo $usuario->cadastrar($usuario);
    }catch(Exception $e){
        echo $e->getMessage();
    }

?>