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
        $verificaEmail = false;
        $listaProfessor = $professor->listar();
        foreach($listaProfessor as $linha){
            if($linha['emailProfessor'] == $emailProfessor){
                $verificaEmail = true;
            }
        }
        if($verificaEmail == false){
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
        }
        else{
            $_SESSION['emailProfessor'] = $emailProfessor;
        }
        
        
    }catch(Exception $e){
        echo $e->getMessage();
    }

?>