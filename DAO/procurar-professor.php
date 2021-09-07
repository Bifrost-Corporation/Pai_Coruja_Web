<?php

    require_once ('../classes/Conexao.php');
    include ('../secretaria/sentinela.php');

    $conexao = Conexao::conectar();
    if(isset($_POST['query'])){
        $inputUsuario = $_POST['query'];
        $query = "SELECT nomeProfessor, idEscola FROM tbprofessor WHERE idEscola LIKE '$_SESSION[idEscola]'";
        $resultadoConsulta = $conexao->query($query);
        $lista = $resultadoConsulta->fetchAll();
        if($resultadoConsulta->rowCount() > 0){
            foreach($lista as $linha){
                echo "<div class='opcao-consulta'>";
                    echo "<a href='#' class='link-consulta'>". $linha['nomeProfessor'] . "</a>";
                echo "</div>";
            }
        }
        else {
            echo "<div class='opcao-consulta'>";
                    echo "<p class='texto-consulta'> Professor não encontrado! </p>";
                echo "</div>";
        }
    }

?>