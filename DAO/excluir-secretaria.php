<?php
    include("../adm/sentinela.php");
    include("../classes/Secretaria.php");
    include("../classes/Usuario.php");

    try{
        header("location: ../adm/cadastrar-secretaria.php");
        $idSecretaria = $_GET['idSecretaria'];
        $secretaria = new Secretaria();
        $usuario = new Usuario();
        $listaUsuario = $usuario->listar();
        foreach($listaUsuario as $linha){
            if($linha['idSecretaria'] == $idSecretaria){
                $idUsuario = $linha['idUsuario'];
            }
        }
        $usuario->setIdUsuario($idUsuario);
        $usuario->excluir($usuario);
        $secretaria->setIdSecretaria($idSecretaria);
        $secretaria->excluir($secretaria);
        return 'Secretaria excluída com sucesso!';
    }catch(Exception $e){
        echo $e->getMessage();
    }
?>