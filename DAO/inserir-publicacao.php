<?php

    include("../professor/sentinela.php");
    include("../classes/Publicacao.php");
    include("../classes/Conexao.php");

    try{
        header("location: ../professor/cadastrar-publicacao.php");
        $tituloPublicacao = $_POST['txtNome'];
        $descPublicacao = $_POST['txtDescricao'];
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