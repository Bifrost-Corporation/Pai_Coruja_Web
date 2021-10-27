<?php

    include_once("../classes/Conexao.php");
    include_once("../classes/Professor.php");
    include_once("../classes/Secretaria.php");
    include_once("../classes/Responsavel.php");
    include_once("../classes/Usuario.php");

    session_start();

    try{
        $idUsuario = $_POST['idUsuario'];
        $senha = $_POST['txtSenha'];
        $usuario = new Usuario();
        $listaUsuario = $usuario->listar();
        foreach($listaUsuario as $linha){
            if($linha['idUsuario'] == $idUsuario){
                if(isset($linha['idProfessor'])){
                    $professor = new Professor();
                    $listaProfessor = $professor->listar();
                    foreach($listaProfessor as $linha2){
                        if($linha['idProfessor'] == $linha2['idProfessor']){
                            $professor->setIdProfessor($linha2['idProfessor']);
                            $professor->setSenhaProfessor(md5($senha));
                            $professor->setPrimeiroAcessoProfessor('F');
                            $_SESSION['primeiroAcesso'] = 'F';
                            echo $_SESSION['primeiroAcesso'];
                            echo $professor->updateSenha($professor);
                            header("Location: ../professor/home-professor.php");
                        }
                    }
                }
                if(isset($linha['idResponsavel'])){
                    $responsavel = new Responsavel();
                    $listaResponsavel = $responsavel->listarAlternativo();
                    foreach($listaResponsavel as $linha2){
                        if($linha['idResponsavel'] == $linha2['idResponsavel']){
                            $responsavel->setIdResponsavel($linha2['idResponsavel']);
                            $responsavel->setSenhaResponsavel(md5($senha));
                            $responsavel->setPrimeiroAcessoResponsavel('F');
                            $_SESSION['primeiroAcesso'] = 'F';
                            echo $_SESSION['primeiroAcesso'];
                            echo $responsavel->updateSenha($responsavel);
                            header("Location: ../responsavel/home-responsavel.php");
                        }
                    }
                }
                if(isset($linha['idSecretaria'])){
                    $secretaria = new Secretaria();
                    $listaSecretaria = $secretaria->listar();
                    foreach($listaSecretaria as $linha2){
                        if($linha['idSecretaria'] == $linha2['idSecretaria']){
                            $secretaria->setIdSecretaria($linha2['idSecretaria']);
                            $secretaria->setSenhaSecretaria(md5($senha));
                            $secretaria->setPrimeiroAcessoSecretaria('F');
                            $_SESSION['primeiroAcesso'] = 'F';
                            echo $_SESSION['primeiroAcesso'];
                            echo $secretaria->updateSenha($secretaria);
                            header("Location: ../secretaria/dashboard.php");
                        }
                    }
                }
            }
        }
    }catch(Exception $e){
        echo $e->getMessage();
    }

?>