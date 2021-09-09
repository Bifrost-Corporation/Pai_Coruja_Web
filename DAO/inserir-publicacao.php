<?php

    include("../professor/sentinela.php");
    include("../classes/Publicacao.php");

    try{
        header("location: ../professor/cadastrar-publicacao.php");
        $tituloPublicacao = $_POST['txtTitulo'];
        $descPublicacao = $_POST['txtTexto'];
        $idProfessor = $_SESSION['idProfessor'];
        $publicacao = new Publicacao();
        $publicacao->setTituloPublicacao($tituloPublicacao);
        $publicacao->setDescPublicacao($descPublicacao);
        $publicacao->setIdProfessor($idProfessor);
        echo $publicacao->cadastrar($publicacao);
    }catch(Exception $e){
        echo $e->getMessage();
    }

?>