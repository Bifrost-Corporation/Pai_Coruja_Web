<?php
    include("../adm/sentinela.php");
    include("../classes/Escola.php");
    include("../classes/Secretaria.php");
    include("../classes/Usuario.php");

    try{
        header("location: ../adm/cadastrar-dados.php");
        $nomeEscola = $_POST['txtNomeEscola'];
        unset($_SESSION['emailSecretaria']);
        unset($_SESSION['escolaSecretaria']);
        $nomeSecretaria = $_POST['txtUsuarioSecretaria'];
        $emailSecretaria = $_POST['txtEmailSecretaria'];
        $senhaSecretaria = $_POST['txtSenhaSecretaria'];
        $escola = new Escola();
        $escola->setNomeEscola($nomeEscola);
        $idAdministrador = $_SESSION['idAdministrador'];
        $escola->setIdAdministrador($idAdministrador);
        echo $escola->cadastrar($escola);
        $secretaria = new Secretaria();
        $listaescola = $escola->selecionarUltimaEscola();
        $listasecretaria = $secretaria->listar();
        $repeteemail = false;
        foreach($listasecretaria as $linha){
            if($emailSecretaria == $linha['emailSecretaria']){
                $repeteemail = true;
            }
        }
        foreach($listaescola as $linha){
            $idEscola = $linha['idEscola'];
        }
        echo $idEscola;
        if($repeteemail == false && $idEscola != null) {
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
        
    }catch(Exception $e){
        echo $e->getMessage();
    }
?>