<?php

    require_once ('../classes/Conexao.php');
    include ('../professor/sentinela.php');

    $conexao = Conexao::conectar();
    if(isset($_POST['query'])){
        $inputUsuario = $_POST['query'];
        $nomeAluno = $inputUsuario;
        $idEscola = $_SESSION['idEscola'];
        $arrayInput = str_split($inputUsuario);
        $turma = 0;
        for($i = 0; $i < strlen($inputUsuario); $i++){
            if($arrayInput[$i] == '1' || $arrayInput[$i] == '2' || $arrayInput[$i] == '3' || $arrayInput[$i] == '4' || $arrayInput[$i] == '5' || 
            $arrayInput[$i] == '6' || $arrayInput[$i] == '7' || $arrayInput[$i] == '8' || $arrayInput[$i] == '9'){
                $turma = substr($inputUsuario, -$i-1);
                $nomeAluno = substr($nomeAluno, 0, strlen($nomeAluno) - 5);
            }else{
                $_SESSION['turmaAluno'] = 'Turma inválida!';
            }
        }
        $query = "SELECT nomeAluno, nomeTurma FROM tbaluno INNER JOIN tbturma ON tbaluno.idTurma = tbturma.idTurma WHERE tbaluno.nomeAluno LIKE '%$nomeAluno%' AND tbaluno.idEscola LIKE '%$idEscola%' AND tbturma.nomeTurma LIKE '%$turma%' ORDER BY tbaluno.nomeAluno";
        $resultadoConsulta = $conexao->query($query);
        $lista = $resultadoConsulta->fetchAll(PDO::FETCH_ASSOC);
        if($resultadoConsulta->rowCount() > 0){
            foreach($lista as $linha){
                echo "<div class='opcao-consulta'>";
                    echo "<a href='#' class='link-consulta'>". $linha['nomeAluno'] . "</a>";
                echo "</div>";
            }
        }
        else {
            echo "<div class='opcao-consulta'>";
                    echo "<p class='texto-consulta'> Aluno não encontrado!</p>";
                echo "</div>";
        }
    }

?>