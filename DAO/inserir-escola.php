<?php
    include("../adm/sentinela.php");
    include("../classes/Escola.php");

    try{
        header("location: ../adm/cadastrar-escola.php");
        $idEscola = $_POST['idEscola'];
        $idAdministrador = $_POST['idAdministrador'];
        $nomeEscola = $_POST['txtNomeEscola'];
        $escola = new Escola();
        $escola->setNomeEscola($nomeEscola);
        if($idEscola > 0 && $idAdministrador > 0){
            $escola->setIdEscola($idEscola);
            $escola->setIdAdministrador($idAdministrador);
            echo $escola->atualizar($escola);
            return 'Escola atualizada com sucesso!';
        }else{
            $idAdministrador = $_SESSION['idAdministrador'];
            $escola->setIdAdministrador($idAdministrador);
            echo $escola->cadastrar($escola);
            return 'Escola cadastrada com sucesso!';
        }
    }catch(Exception $e){
        echo $e->getMessage();
    }
?>