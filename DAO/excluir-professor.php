<?php
    include("../secretaria/sentinela.php");
    include("../classes/Professor.php");
    include("../classes/Usuario.php");

    try{
        header("location: ../secretaria/visualizar-dados.php");
        $idProfessor = $_GET['idProfessor'];
        $professor = new Professor();
        $usuario = new Usuario();
        $listaUsuario = $usuario->listar();
        foreach($listaUsuario as $linha){
            if($linha['idProfessor'] == $idProfessor){
                $idUsuario = $linha['idUsuario'];
            }
        }
        $usuario->setIdUsuario($idUsuario);
        $usuario->excluir($usuario);
        $professor->setIdProfessor($idProfessor);
        $professor->excluir($professor);
        return 'Professor excluído com sucesso!';
        
    }catch(Exception $e){
        echo $e->getMessage();
    }
?>