<?php

    include("../secretaria/sentinela.php");
    include("../classes/Publicacao.php");

    try{
        header("location: ../secretaria/cadastrar-publicacao.php");
        $tituloPublicacao = $_POST['txtNome'];
        $descPublicacao = $_POST['txtDescricao'];
        $idSecretaria = $_SESSION['idSecretaria'];
        $publicacao = new Publicacao();
        $publicacao->setTituloPublicacao($tituloPublicacao);
        $publicacao->setDescPublicacao($descPublicacao);
        $publicacao->setIdSecretaria($idSecretaria);
        echo $publicacao->cadastrar($publicacao);
    }catch(Exception $e){
        echo $e->getMessage();
    }

?>