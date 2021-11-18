<?php

    include("../classes/Usuario.php");

    $usuario = new Usuario();
    $listaUsuario = $usuario->listar();

    foreach($listaUsuario as $linha) {
        if($linha['idUsuario'] == $_POST['idProfessor']){
            echo $linha['idUsuario'];
        }
    }
?>