<?php

    include("../classes/Usuario.php");
    include("../secretaria/sentinela.php");

    $usuario = new Usuario();
    $listaUsuario = $usuario->listar();

    foreach($listaUsuario as $linha) {
        if($linha['idResponsavel'] == $_POST['idResponsavel']){
            echo $linha['idUsuario'];
        }
    }
?>