<?php

    require_once ('../classes/Conexao.php');

    $conexao = Conexao::conectar();
    if(isset($_POST['query'])){
        $inputUsuario = $_POST['query'];
        $query = "SELECT nomeAluno, nomeTurma FROM tbaluno INNER JOIN tbturma ON tbaluno.idTurma = tbturma.idTurma WHERE nomeAluno LIKE '%$inputUsuario%' OR nomeTurma LIKE '%$inputUsuario%' ORDER BY nomeAluno";
        $resultadoConsulta = $conexao->query($query);
        $lista = $resultadoConsulta->fetchAll();
        if($resultadoConsulta->rowCount() > 0){
            foreach($lista as $linha){
                echo "<div class='opcao-consulta'>";
                    echo "<a href='#' class='link-consulta'>". $linha['nomeAluno'] . " " . $linha['nomeTurma'] . "</a>";
                echo "</div>";
            }
        }
        else {
            echo "<div class='opcao-consulta'>";
                    echo "<p class='texto-consulta'> Aluno não encontrado! </p>";
                echo "</div>";
        }
    }

?>