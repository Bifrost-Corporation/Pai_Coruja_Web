<?php

    include_once ('../adm/sentinela.php');
    include_once ('../classes/Secretaria.php');
    include_once ('../classes/Escola.php');
    include_once ('../classes/Usuario.php');

    try{
        header('Location: ../adm/cadastrar-secretaria.php');
        unset($_SESSION['emailSecretaria']);
        unset($_SESSION['escolaSecretaria']);
        $idSecretaria = $_POST['idSecretaria'];
        $nomeSecretaria = $_POST['txtUsuarioSecretaria'];
        $emailSecretaria = $_POST['txtEmailSecretaria'];
        $senhaSecretaria = $_POST['txtSenhaSecretaria'];
        $escolaSecretaria = $_POST['txtConsultaEscola'];
        $idAdministrador = $_SESSION['idAdministrador'];
        if($idSecretaria > 0){
            $secretaria = new Secretaria();
            $secretaria->setIdSecretaria($idSecretaria);
            $secretaria->setNomeSecretaria($nomeSecretaria);
            $secretaria->setEmailSecretaria($emailSecretaria);
            $secretaria->setSenhaSecretaria(md5($senhaSecretaria));
            $secretaria->setIdAdministrador($idAdministrador);
            $escola = new Escola();
            $listaescola = $escola->listar();
            foreach($listaescola as $linha){
                if($linha['nomeEscola'] == $escolaSecretaria){
                    $idEscola = $linha['idEscola'];
                }
            }
            $secretaria->setIdEscola($idEscola);
            echo $secretaria->atualizar($secretaria);
            return 'Secretaria atualizada com sucesso!';
        }else {
            $escola = new Escola();
            $secretaria = new Secretaria();
            $listaescola = $escola->listar();
            $listasecretaria = $secretaria->listar();
            $repeteemail = false;
            $repeteescola = false;
            foreach($listasecretaria as $linha){
                if($emailSecretaria == $linha['emailSecretaria']){
                    $repeteemail = true;
                }
            }
            foreach($listaescola as $linha){
                if($escolaSecretaria == $linha['nomeEscola']){
                    foreach($listasecretaria as $linha2){
                        if($linha['idEscola'] == $linha2['idEscola']){
                            $repeteescola = true;
                        }
                    }
                    if($repeteescola == false){
                        $idEscola = $linha['idEscola'];
                    }
                }
            }
            if($repeteemail == false && $repeteescola == false && $idEscola != null) {
                $secretaria->setNomeSecretaria($nomeSecretaria);
                $secretaria->setEmailSecretaria($emailSecretaria);
                $secretaria->setSenhaSecretaria(md5($senhaSecretaria));
                $secretaria->setIdEscola($idEscola);
                $secretaria->setIdAdministrador($idAdministrador);
                echo $secretaria->cadastrar($secretaria);
                $listaSecretaria = $secretaria->selecionarUltimoSecretaria();
                foreach($listaSecretaria as $linha2){
                    $idSecretaria = $linha2['idSecretaria'];
                }
                $usuario = new Usuario();
                $usuario->setIdSecretaria($idSecretaria);
                echo $usuario->cadastrar($usuario);
                return 'Cadastro da secretaria realizado com sucesso!';
            }else if($idEscola != null){
                if($repeteemail == true){
                    $_SESSION['emailSecretaria'] = $emailSecretaria;
                    $_SESSION['repeteEmail'] = true;
                }
                if($repeteescola == true){
                    $_SESSION['escolaSecretaria'] = $escolaSecretaria;
                    $_SESSION['repeteEscola'] = true;
                }
            }else{
                $_SESSION['escolaSecretaria'] = $escolaSecretaria;
                $_SESSION['repeteEscola'] = true;
            }
        }
    }catch(Exception $e){
        echo $e->getMessage();
    }

?>