<?php

    include_once ("../secretaria/sentinela.php");
    include_once ("../classes/Professor.php");
    include_once ("../classes/Usuario.php");

    try{
        header("Location: ../secretaria/cadastrar-professor.php");
        unset($_SESSION['repeteEmail']);
        unset($_SESSION['emailProfessor']);
        $idProfessor = $_POST['idProfessor'];
        $nomeProfessor = $_POST['txtNomeProfessor'];
        $emailProfessor = $_POST['txtEmailProfessor'];
        $senhaProfessor = $_POST['txtSenhaProfessor'];
        $idEscola = $_SESSION['idEscola'];
        $professor = new Professor();
        $verificaEmail = false;
        $listaProfessor = $professor->listar();
        if($idProfessor > 0){
            $professor->setIdProfessor($idProfessor);
            $professor->setNomeProfessor($nomeProfessor);
            $professor->setEmailProfessor($emailProfessor);
            $professor->setSenhaProfessor($senhaProfessor);
            $professor->setIdEscola($idEscola);
            echo $professor->atualizar($professor);
        }else{
            foreach($listaProfessor as $linha){
                if($linha['emailProfessor'] == $emailProfessor){
                    $verificaEmail = true;
                }
            }
            if($verificaEmail == false){
                $professor->setNomeProfessor($nomeProfessor);
                $professor->setEmailProfessor($emailProfessor);
                $professor->setSenhaProfessor(md5($senhaProfessor));
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
                $_SESSION['repeteEmail'] = true;
            }
        }
        
    }catch(Exception $e){
        echo $e->getMessage();
    }

?>