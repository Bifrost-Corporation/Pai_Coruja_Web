<?php

    session_start();
    include('../classes/Conexao.php');
    $emailForm = $_POST['txtEmail'];
    $senhaForm = $_POST['txtSenha'];

    try{
        $conexao = Conexao::conectar();
        $verificalogin = false;
        $queryadm = "SELECT idAdministrador, loginAdministrador, senhaAdministrador FROM tbadministrador";
        $querysecretaria = "SELECT idSecretaria, nomeSecretaria, emailSecretaria, senhaSecretaria, primeiroAcessoSecretaria, tbsecretaria.idEscola, tbescola.nomeEscola FROM tbsecretaria INNER JOIN tbescola ON tbsecretaria.idEscola = tbescola.idEscola";
        $queryprofessor = "SELECT idEscola, idProfessor, nomeProfessor, emailProfessor, senhaProfessor, primeiroAcessoProfessor FROM tbprofessor";
        $queryresponsavel = "SELECT tbresponsavel.idResponsavel, nomeResponsavel, emailResponsavel, senhaResponsavel, primeiroAcessoResponsavel, tbsecretaria.idSecretaria, tbescola.idEscola, tbresponsavel.idAluno, tbaluno.nomeAluno FROM tbresponsavel INNER JOIN tbaluno ON tbaluno.idAluno = tbresponsavel.idAluno INNER JOIN tbsecretaria ON tbsecretaria.idEscola = tbaluno.idEscola INNER JOIN tbescola ON tbaluno.idEscola = tbescola.idEscola";
        $resultadoadm = $conexao->query($queryadm);
        $listaadm = $resultadoadm->fetchAll(PDO::FETCH_ASSOC);
        foreach($listaadm as $linha){
            if($linha['loginAdministrador'] == $emailForm && $linha['senhaAdministrador'] == md5($senhaForm)){
                $verificalogin = true;
                $_SESSION['idAdministrador'] = $linha['idAdministrador'];
                $_SESSION['emailAdm'] = $emailForm;
                $_SESSION['senhaAdm'] = $senhaForm;
                $_SESSION['autorizacaoAdm'] = true;
                header('location: ../adm/home-adm.php');
            }
        }
        $resultadosecretaria = $conexao->query($querysecretaria);
        $listasecretaria = $resultadosecretaria->fetchAll(PDO::FETCH_ASSOC);
        foreach($listasecretaria as $linha){
            if($linha['emailSecretaria'] == $emailForm && $linha['senhaSecretaria'] == md5($senhaForm)){
                $verificalogin = true;
                $_SESSION['idSecretaria'] = $linha['idSecretaria'];
                $_SESSION['nomeSecretaria'] = $linha['nomeSecretaria'];
                $_SESSION['emailSecretaria'] = $emailForm;
                $_SESSION['senhaSecretaria'] = $senhaForm;
                $_SESSION['idEscola'] = $linha['idEscola'];
                $_SESSION['nomeEscola'] = $linha['nomeEscola'];
                $_SESSION['primeiroAcesso'] = $linha['primeiroAcessoSecretaria'];
                $_SESSION['autorizacaoSecretaria'] = true;
                header('location: ../secretaria/dashboard.php');
            }
        }
        $resultadoprofessor = $conexao->query($queryprofessor);
        $listaprofessor = $resultadoprofessor->fetchAll(PDO::FETCH_ASSOC);
        foreach($listaprofessor as $linha){
            if($linha['emailProfessor'] == $emailForm && $linha['senhaProfessor'] == md5($senhaForm)){
                $verificalogin = true;
                $_SESSION['idProfessor'] = $linha['idProfessor'];
                $_SESSION['idEscola'] = $linha['idEscola'];
                $_SESSION['nomeProfessor'] = $linha['nomeProfessor'];
                $_SESSION['emailProfessor'] = $emailForm;
                $_SESSION['senhaProfessor'] = $senhaForm;
                $_SESSION['primeiroAcesso'] = $linha['primeiroAcessoProfessor'];
                $_SESSION['autorizacaoProfessor'] = true;
                header('location: ../professor/home-professor.php');
            }
        }
        $resultadoresponsavel = $conexao->query($queryresponsavel);
        $listaresponsavel = $resultadoresponsavel->fetchAll(PDO::FETCH_ASSOC);
        foreach($listaresponsavel as $linha){
            if($linha['emailResponsavel'] == $emailForm && $linha['senhaResponsavel'] == md5($senhaForm)){
                $verificalogin = true;
                $_SESSION['idResponsavel'] = $linha['idResponsavel'];
                $_SESSION['nomeResponsavel'] = $linha['nomeResponsavel'];
                $_SESSION['emailResponsavel'] = $emailForm;
                $_SESSION['senhaResponsavel'] = $senhaForm;
                $_SESSION['idSecretaria'] = $linha['idSecretaria'];
                $_SESSION['primeiroAcesso'] = $linha['primeiroAcessoResponsavel'];
                $_SESSION['idEscola'] = $linha['idEscola'];
                $_SESSION['idAluno'] = $linha['idAluno'];
                $_SESSION['nomeAluno'] = $linha['nomeAluno'];
                $_SESSION['autorizacaoResponsavel'] = true;
                header('location: ../responsavel/home-responsavel.php');
            }
        }
        if($verificalogin == false){
            unset($_SESSION['emailUsuario']);
            unset($_SESSION['senhaUsuario']);
            session_destroy();
            header('location: ../index.php');
        }
        
    }catch(Exception $e){
        echo('Erro: '.$e->getMessage());
    }

?>