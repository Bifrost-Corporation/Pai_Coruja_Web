<?php
    include("../adm/sentinela.php");
    include("../classes/Escola.php");

    try{
        header("location: ../adm/cadastrar-escola.php");
        $idEscola = $_GET['idEscola'];
        $escola = new Escola();
        $escola->setIdEscola($idEscola);
        $escola->excluir($escola);
        return 'Escola excluída com sucesso!';
        
    }catch(Exception $e){
        echo $e->getMessage();
    }
?>