<?php

    require_once ('../classes/Conexao.php');
    $conexao = Conexao::conectar();
    if(isset($_POST['query'])){
        $inputUsuario = $_POST['query'];
        $query = "SELECT idEscola, nomeEscola, idAdministrador FROM tbescola WHERE nomeEscola LIKE '%$inputUsuario%'";
        $resultadoConsulta = $conexao->query($query);
        $lista = $resultadoConsulta->fetchAll();
        if($resultadoConsulta->rowCount() > 0){
            foreach($lista as $linha){
                /**
                
                <tr>
                    <td><?php echo $linha['nomeEscola'] ?></td>
                    <td><?php echo "<a href='?idEscola={$linha['idEscola']}&nomeEscola={$linha['nomeEscola']}&idAdministrador={$linha['idAdministrador']}'>"?><i class="icons-table fa fa-cog"></i><?php echo "</a>" ?></td>
                    <td><?php echo "<a href='../DAO/excluir-escola.php?idEscola={$linha['idEscola']}'"?> onclick="return confirm('Você está prestes a excluir a escola: <?php echo $linha['nomeEscola'] ?>, tem certeza?')"><i class="icons-table fas fa-times" aria-hidden="true"></i></td>
                          
                </tr>

                */

                echo "<tr>";
                    echo "<td>". $linha['nomeEscola'] . "</td>";
                    echo "<td>". "<a href='?idEscola={$linha['idEscola']}&nomeEscola={$linha['nomeEscola']}&idAdministrador={$linha['idAdministrador']}'><i class='icons-table fa fa-cog'></i></a>" . "</td>";
                    echo "<td>". "<a href='../DAO/excluir-escola.php?idEscola={$linha['idEscola']}'" . "onclick=" . " return confirm('Você está prestes a excluir a escola: {$linha['nomeEscola']}, tem certeza?')" . "><i class='icons-table fas fa-times' aria-hidden='true'></i>" . "</td>";
                echo "</tr>";
            }
        }
        else {
            echo "<div class='opcao-consulta'>";
                    echo "<p class='texto-consulta'> Escola não encontrada! </p>";
                echo "</div>";
        }
    }

?>