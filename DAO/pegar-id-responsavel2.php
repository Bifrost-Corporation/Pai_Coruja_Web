<?php

    include("../classes/Usuario.php");

    $usuario = new Usuario();
    $listaUsuario = $usuario->listar();

    foreach($listaUsuario as $linha) {
        if($linha['idResponsavel'] == $_POST['idResponsavel']){
            echo $linha['idResponsavel'];
        }
    }
?>