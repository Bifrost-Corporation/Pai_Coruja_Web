<?php

    require_once ('../classes/Conexao.php');
    $conexao = Conexao::conectar();
    if(isset($_POST['query'])){
        $inputUsuario = $_POST['query'];
        $query = "SELECT nomeDisciplina FROM tbdisciplina WHERE nomeDisciplina LIKE '%$inputUsuario%'";
        $resultadoConsulta = $conexao->query($query);
        $lista = $resultadoConsulta->fetchAll();
        if($resultadoConsulta->rowCount() > 0){
            foreach($lista as $linha){
                echo "<div class='opcao-consulta2'>";
                    echo "<a href='#' class='link-consulta'>". $linha['nomeDisciplina'] . "</a>";
                echo "</div>";
            }
        }
        else {
            echo "<div class='opcao-consulta'>";
                    echo "<p class='texto-consulta'> Disciplina não encontrada! </p>";
                echo "</div>";
        }
    }

?>