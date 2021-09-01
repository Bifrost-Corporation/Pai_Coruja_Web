<?php
    include("../adm/sentinela.php");
    include("../classes/Escola.php");

    try{
        header("location: ../adm/cadastrar-escola.php");
        $nomeEscola = $_POST['txtNomeEscola'];
        $idAdministrador = $_SESSION['idAdministrador'];
        $escola = new Escola();
        $escola->setNomeEscola($nomeEscola);
        $escola->setIdAdministrador($idAdministrador);
        echo $escola->cadastrar($escola);
    }catch(Exception $e){
        echo $e->getMessage();
    }
?>