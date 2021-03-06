<?php

    include("../classes/Conexao.php");
    include("../secretaria/sentinela.php");
    include("../classes/ImagemSecretaria.php");
    include("../classes/ImagemResponsavel.php");

    try{
        if($_FILES['imagemPerfil']['name'] != ''){
            header("Location: ../secretaria/dashboard.php");
            $nomeImagem = $_FILES['imagemPerfil']['name'];
            $arquivo = $_FILES['imagemPerfil']['tmp_name'];
            $caminhoImagem = "../img/imgSecretaria/";
            move_uploaded_file($arquivo, $caminhoImagem . $nomeImagem);
            $caminhoImagem = "img/imgSecretaria/";
            $imagemSecretaria = new ImagemSecretaria();
            $imagemSecretaria->setNomeImagemSecretaria($nomeImagem);
            $imagemSecretaria->setCaminhoImagemSecretaria($caminhoImagem);
            $imagemSecretaria->setIdSecretaria($_SESSION['idSecretaria']);
            echo $imagemSecretaria->cadastrar($imagemSecretaria);
            
        }
    }catch(Exception $e){
        echo $e->getMessage();
    }

?>