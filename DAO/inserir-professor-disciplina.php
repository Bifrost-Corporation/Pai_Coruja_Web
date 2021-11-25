<?php

    include_once ("../secretaria/sentinela.php");
    include_once ("../classes/Professor.php");
    include_once ("../classes/Disciplina.php");
    include_once ("../classes/Usuario.php");

    try{
        //header("Location: ../secretaria/cadastrar-dados.php");
        unset($_SESSION['repeteEmail']);
        unset($_SESSION['emailProfessor']);
        $idProfessor = $_POST['idProfessor'];
        $nomeProfessor = $_POST['txtNomeProfessor'];
        $emailProfessor = $_POST['txtEmailProfessor'];
        $senhaProfessor = $_POST['txtSenhaProfessor'];
        $idDisciplina = $_POST['idDisciplina'];
        $nomeDisciplinaInput = $_POST['txtNomeDisciplina'];
        $idEscola = $_SESSION['idEscola'];
        $professor = new Professor();
        $disciplina = new Disciplina();
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
            $professor->setSenhaProfessor(md5($senhaProfessor));
            $professor->setPrimeiroAcessoProfessor('V');
            $professor->setIdEscola($idEscola);
            echo $professor->cadastrar($professor);
            $listaProfessor = $professor->selecionarUltimoProfessor();
            foreach($listaProfessor as $linha){
                $idProfessor = $linha['idProfessor'];
            }
            $usuario = new Usuario();
            $usuario->setIdProfessor($idProfessor);
            echo $usuario->cadastrar($usuario);
            $disciplina->setNomeDisciplina($nomeDisciplinaInput);
            $disciplina->setIdProfessor($idProfessor);
            $disciplina->setIdEscola($idEscola);
            echo $disciplina->cadastrar($disciplina);
        }
        else{
                $_SESSION['emailProfessor'] = $emailProfessor;
                $_SESSION['repeteEmail'] = true;
            }
        /*
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
        */
        
    }catch(Exception $e){
        echo $e->getMessage();
    }

?>