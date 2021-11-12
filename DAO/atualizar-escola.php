<?php
    include("../adm/sentinela.php");
    include("../classes/Escola.php");
    include("../classes/Secretaria.php");

    try{
        //header("location: ../adm/visualizar-dados.php");
        $idEscola = $_POST['idEscola'];
        $idAdministrador = $_POST['idAdministrador'];
        $nomeEscola = $_POST['txtNomeEscola'];
        $idSecretaria = $_POST['idSecretaria'];
        $nomeSecretaria = $_POST['txtUsuarioSecretaria'];
        $emailSecretaria = $_POST['txtEmailSecretaria'];
        $senhaSecretaria = $_POST['txtSenhaSecretaria'];
        $escola = new Escola();
        $secretaria = new Secretaria();
        $escola->setNomeEscola($nomeEscola);
        $escola->setIdEscola($idEscola);
        $escola->setIdAdministrador($idAdministrador);
        echo $escola->atualizar($escola);
        $secretaria->setIdEscola($idEscola);
        $secretaria->setIdSecretaria($idSecretaria);
        $secretaria->setNomeSecretaria($nomeSecretaria);
        $secretaria->setIdAdministrador($idAdministrador);
        $secretaria->setEmailSecretaria($emailSecretaria);
        $secretaria->setSenhaSecretaria(md5($senhaSecretaria));
        $secretaria->atualizar($secretaria);
        return 'Escola atualizada com sucesso!';
    }catch(Exception $e){
        echo $e->getMessage();
    }
?>