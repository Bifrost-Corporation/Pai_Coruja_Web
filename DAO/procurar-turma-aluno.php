<?php

    require_once ('../classes/Conexao.php');
    session_start();
    $conexao = Conexao::conectar();
    if(isset($_POST['query'])){
        $inputUsuario = $_POST['query'];
        $query = "SELECT nomeTurma FROM tbturma WHERE nomeTurma LIKE '%$inputUsuario%' AND idEscola = '$_SESSION[idEscola]'";
        $resultadoConsulta = $conexao->query($query);
        $lista = $resultadoConsulta->fetchAll();
        if($resultadoConsulta->rowCount() > 0){
            foreach($lista as $linha){
                echo "<div class='opcao-consulta'>";
                    echo "<a href='#' class='link-consulta'>". $linha['nomeTurma'] . "</a>";
                echo "</div>";
            }
        }
        else {
            echo "<div class='opcao-consulta2'>";
                    echo "<p class='texto-consulta'> Turma não encontrada! </p>";
                echo "</div>";
        }
    }

?>