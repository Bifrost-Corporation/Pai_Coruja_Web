<?php
    include("../secretaria/sentinela.php");
    include("../classes/Responsavel.php");
    include("../classes/Usuario.php");
    include("../classes/EnderecoResponsavel.php");
    include("../classes/TelefoneResponsavel.php");

    try{
        header("location: ../secretaria/visualizar-dados.php");
        $idResponsavel = $_GET['idResponsavel'];
        $responsavel = new Responsavel();
        $usuario = new Usuario();
        $listaUsuario = $usuario->listar();
        foreach($listaUsuario as $linha){
            if($linha['idResponsavel'] == $idResponsavel){
                $idUsuario = $linha['idUsuario'];
            }
        }
        $usuario->setIdUsuario($idUsuario);
        $usuario->excluir($usuario);
        $endereco = new EnderecoResponsavel();
        $listaEndereco = $endereco->listar();
        foreach($listaEndereco as $linha){
            if($linha['idResponsavel'] == $idResponsavel){
                $idEnderecoResponsavel = $linha['idEnderecoResponsavel'];
            }
        }
        $endereco->setIdEnderecoResponsavel($idEnderecoResponsavel);
        $endereco->excluir($endereco);
        $telefone = new TelefoneResponsavel();
        $listaTelefone = $telefone->listar();
        foreach($listaTelefone as $linha){
            if($linha['idResponsavel'] == $idResponsavel){
                $idTelefoneResponsavel = $linha['idTelefoneResponsavel'];
            }
        }
        $telefone->setIdTelefoneResponsavel($idTelefoneResponsavel);
        $telefone->excluir($telefone);
        $responsavel->setIdResponsavel($idResponsavel);
        $responsavel->excluir($responsavel);
        return 'Responsável excluído com sucesso!';
        
    }catch(Exception $e){
        echo $e->getMessage();
    }
?>