<?php

    include("../classes/Conexao.php");
    include("../responsavel/sentinela.php");
    include("../classes/ImagemResponsavel.php");

    try{
        if($_FILES['imagemPerfil']['name'] != ''){
            header("Location: ../responsavel/home-responsavel.php");
            $nomeImagem = $_FILES['imagemPerfil']['name'];
            $arquivo = $_FILES['imagemPerfil']['tmp_name'];
            $caminhoImagem = "../img/imgResponsavel/";
            move_uploaded_file($arquivo, $caminhoImagem . $nomeImagem);
            $caminhoImagem = "img/imgResponsavel/";
            $imagemResponsavel = new ImagemResponsavel();
            $imagemResponsavel->setNomeImagemResponsael($nomeImagem);
            $imagemResponsavel->setCaminhoImagemResponsavel($caminhoImagem);
            $imagemResponsavel->setIdResponsavel($_SESSION['idResponsavel']);
            echo $imagemResponsavel->cadastrar($imagemResponsavel);
        }
    }catch(Exception $e){
        echo $e->getMessage();
    }

?>