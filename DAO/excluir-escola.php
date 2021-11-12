<?php
    include("../adm/sentinela.php");
    include("../classes/Escola.php");
    include("../classes/Secretaria.php");
    include("../classes/Usuario.php");

    try{
        header("location: ../adm/visualizar-dados.php");
        $idEscola = $_GET['idEscola'];
        $idSecretaria = $_GET['idSecretaria'];
        $secretaria = new Secretaria();
        $escola = new Escola();
        $usuario = new Usuario();
        $listaUsuario = $usuario->listar();
        foreach($listaUsuario as $linha){
            if($linha['idSecretaria'] == $idSecretaria){
                $usuario->setIdUsuario($linha['idUsuario']);
                $usuario->excluir($usuario);
            }
        }
        $secretaria->setIdSecretaria($idSecretaria);
        $secretaria->excluir($secretaria);
        $escola->setIdEscola($idEscola);
        $escola->excluir($escola);
        return 'Escola e secretaria excluídas com sucesso!';
        
    }catch(Exception $e){
        echo $e->getMessage();
    }
?>