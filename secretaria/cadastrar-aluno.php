<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />

    <title>Cadastro Aluno</title>


</head>

<body>
    <?php
        include ('sentinela.php');
        include ('globalSecretaria.php');
    ?>
    <header>

        <nav class="nav-bar">
            <a href=""><img class="logo-img" src="../img/pai_coruja_branca.png"></a>
            <ul class="ul-area-btn">
                <li class="nav-li"><a class="btn-nav-open"><i class="fas fa-bars"></i></a></li>
            </ul>
        </nav>

        <div class="sidebar">
            <div class="logo-content">
                <div class="logo">
                    <div class="logo-name"><a href="home-secretaria.php"><img src="../img/pai_coruja_branca.png"></a>
                    </div>
                    <div class="close-mobile-navbar">
                        <span>Menu Pai Coruja</span>
                        <a class="btn-nav-close"><i class="far fa-window-close"></i></a>
                    </div>
                </div>
            </div>
            <ul class="nav-list">
                <li>
                    <a onclick="openMenu()" id="sub-menu-button">
                        <div>
                            <i class="fas fa-chart-pie"></i>
                            <span class="links-name">Visão Geral</span>
                        </div>
                        <i class="fas fa-caret-down" class="dropdown-icon"></i>
                    </a>
                </li>
                <div class="drop-menu" id="sub-menu">
                    <li class="links-name drop-link">
                        <a href="home-secretaria.php">
                            <i class="fas fa-calendar"></i>
                            <span class="links-name">Mural</span>
                        </a>
                    </li>
                    <li class="links-name drop-link">
                        <a href="#">
                            <i class="fas fa-chalkboard-teacher"></i>
                            <span class="links-name">Avaliação dos Professores</span>
                        </a>
                    </li>
                    <li class="links-name drop-link">
                        <a href="#">
                            <i class="fas fa-calendar-day"></i>
                            <span class="links-name">Eventos Programados</span>
                        </a>
                    </li>
                </div>

                <li>
                    <a onclick="openMenu2()" id="sub-menu-button-2">
                        <div>
                            <i class="fas fa-user-shield"></i>
                            <span class="links-name">Secretaria</span>
                        </div>
                        <i class="fas fa-caret-down" class="dropdown-icon"></i>
                    </a>
                </li>
                <div class="drop-menu" id="sub-menu-2">
                    <li class="links-name drop-link">
                        <a href="cadastrar-aluno.php">
                            <i class="fas fa-school"></i>
                            <span class="links-name">Cadastrar Aluno</span>
                        </a>
                    </li>
                    <li class="links-name drop-link">
                        <a href="cadastrar-professor.php">
                            <i class="fas fa-school"></i>
                            <span class="links-name">Cadastrar Professor</span>
                        </a>
                    </li>
                    <li class="links-name drop-link">
                        <a href="cadastrar-responsavel.php">
                            <i class="fas fa-school"></i>
                            <span class="links-name">Cadastrar Responsável</span>
                        </a>
                    </li>
                    <li class="links-name drop-link">
                        <a href="cadastrar-turma.php">
                            <i class="fas fa-school"></i>
                            <span class="links-name">Cadastrar Turma</span>
                        </a>
                    </li>
                    <li class="links-name drop-link">
                        <a href="cadastrar-disciplina.php">
                            <i class="fas fa-school"></i>
                            <span class="links-name">Cadastrar Disciplina</span>
                        </a>
                    </li>
                    <li class="links-name drop-link">
                        <a href="cadastrar-horario-turma.php">
                            <i class="fas fa-school"></i>
                            <span class="links-name">Cadastrar Horários</span>
                        </a>
                    </li>
                    <li class="links-name drop-link">
                        <a href="cadastrar-evento.php">
                            <i class="fas fa-school"></i>
                            <span class="links-name">Novo Evento</span>
                        </a>
                    </li>
                </div>

            </ul>
            <div class="profile-content">
                <div class="profile">
                    <div class="profile-details">
                        <img src="../img/usuario-de-perfil.png" alt="">
                        <div class="name-job">
                            <div class="name-menu"><?php echo $_SESSION['nomeSecretaria'] ?></div>
                            <div class="job-menu">Olá Secretário(a)</div>
                        </div>
                    </div>
                    <div class="profile-logout">
                        <a href="logout.php">
                            <i class="fas fa-sign-out-alt" id="logout-user"></i></a>
                    </div>
                </div>
            </div>
        </div>

    </header>


    <main class="container-main">


        <section class="top-section">
            <div class="voltar">
                <a href="home-secretaria.php">
                    <span class="fas fa-arrow-left"></span>Voltar
                </a>
            </div>
            <div class="titulo-cadastrar">
                <h2>Cadastrar Aluno:</h2>
            </div>
        </section>


        <section class="main-section">
            <form class="formulario" name="formAluno" id="formAluno" action="../DAO/inserir-aluno.php" method="POST">
                <div class="user-details">
                    <input type="hidden" id="idAluno" name="idAluno" value="<?php echo @$_GET['idAluno']; ?>">
                    <div class="input-box-width100">
                        <h2>Nome do aluno:</h2>
                        <label class="label-erro" id="label-nome"></label>
                        <input name="txtNomeAluno" id="txtNomeAluno" type="text" placeholder="Insira o nome do aluno" value="<?php echo @$_GET['nomeAluno']; ?>">
                    </div>
                    <div class="input-box">
                        <h2>Data de Nascimento:</h2>
                        <label class="label-erro" id="label-dataNasc"></label>
                        <input name="dataNasc" id="dataNasc" type="date" placeholder="Insira a data de nascimento do aluno" value="<?php echo @$_GET['dataNascAluno']; ?>">
                    </div>
                    <div class="input-box">
                        <h2>Turma:</h2>
                        <label class="label-erro" id="label-turma"></label>
                        <input name="txtTurma" id="txtTurma" type="text" placeholder="Insira a turma do aluno" value="<?php if(isset($_SESSION['turmaInvalida'])){
                                                                                                                                                                echo $_SESSION['turmaInvalida'];
                                                                                                                                                            }else{
                                                                                                                                                                echo @$_GET['nomeTurma'];
                                                                                                                                                            } ?>">
                        <div id="retornoPesquisa">

                        </div>
                    </div>
                    <div class="button">
                        <input type="submit" class="btn-nav-exit" value="Cadastrar">
                    </div>
                </div>
            </form>
        </section>
        <section class="container-controlers">
            <div class="content-card-link1" checked>
                <div class="side-left">
                    <h1>
                        <?php
                            $aluno = new Aluno();
                            $listaAluno = $aluno->contar($_SESSION['idEscola']);
                            foreach($listaAluno as $linha){
                                echo $linha['qtdeAluno'];
                            }
                        ?>
                    </h1>
                    <p>Alunos</p>
                </div>
                <div class="side-right">    
                <a class="btn-ver-dados-tabela" id="btn-show-div-exibir-dados"><i class="fas fa-user" aria-hidden="true"></i><p> ver todos</p></a>
                
                </div>

            </div>
            <a href="#Topo" class="content-card-link2">
                <div class="side-left">
                    <h1>+</h1>
                    <p>Adicionar Aluno(a)</p>
                </div>
                <div class="side-right">
                    <i class="btn-adicionar-aluno fas fa-user" aria-hidden="true"></i>

                </div>
            </a>

        </section>
        <div class="container-exibir-dados">
            <div class="box-titulo-bar-search">
                <h1>Alunos Cadastrados</h1> 
                <form action="#" class="box-search">
                    <button class="btn-search"><i class="fa fa-search" aria-hidden="true"></i></button>
                    <input type="text" name="search" placeholder="Busque..">
                </form>
            </div>
            <div class="table-dados">
                <table>
                    <thead>
                        <tr>
                            <td>Nome:</td>
                            <td>Data de Nascimento:</td>
                            <td>Turma:</td>
                            <td>Alterar</td>
                            <td>Excluir</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $listaAluno = $aluno->listar();
                        foreach($listaAluno as $linha){
                    ?>
                        <tr>
                          <td><?php echo $linha['nomeAluno'] ?></td>
                          <td><?php echo $linha['dataNascAluno'] ?></td>
                          <td><?php echo $linha['nomeTurma'] ?></td>
                          <td><?php echo "<a class'opcao-icone' href='?idAluno={$linha['idAluno']}&nomeAluno={$linha['nomeAluno']}&dataNascAluno={$linha['dataNascAluno']}&idTurma={$linha['idTurma']}&idEscola={$linha['idEscola']}&nomeTurma={$linha['nomeTurma']}'>"?><i class="icons-table fa fa-cog opcao-icone"></i><?php echo "</a>" ?></td>
                          <td><?php echo "<a href='../DAO/excluir-aluno.php?idAluno={$linha['idAluno']}'"?> onclick="return confirm('Você está prestes a excluir o aluno: <?php echo $linha['nomeAluno'] ?>, da série: <?php echo $linha['nomeTurma'] ?>, tem certeza?')"><i class="icons-table fas fa-times" aria-hidden="true"></i></td>
                        </tr>
                    <?php
                       }
                    ?>
                      
                   </tbody>
               </table>
            </div>
        </div>

        <script src="../js/nav.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script src="../js/showDiv.js"></script>
        <script src="../js/jquery.mask.js"></script>

    </main>

    

    <script>
        $('#dataNasc').mask('0000-00-00');

        $(document).ready(function(){
            var turmaInvalida = "<?php if(isset($_SESSION['turmaInvalida'])){echo true;}else{echo false;} ?>"
            var valueTurma = $('#txtTurma').val();
            if(valueTurma.length > 0 && turmaInvalida == true){
                $('#label-turma').html('Turma inválida!');
                $('#txtTurma').addClass('erro-form');
                $('#label-turma').show();
                setTimeout(function () {
                    $('#label-turma').fadeOut(1);
                    $('#txtTurma').removeClass('erro-form');
                    $('#txtTurma').val('');
                }, 5000);
                <?php
                    unset($_SESSION['nomeTurma']);
                    unset($_SESSION['turmaInvalida']);
                ?>
                e.preventDefault();
            }
        });                                                                                                                                                 

        jQuery('#txtTurma').keyup(function () {
            var textoInserido = $(this).val();
            if (textoInserido != '') {
                $.ajax({
                    url: '../DAO/procurar-turma-aluno.php',
                    method: 'POST',
                    data: {
                        query: textoInserido
                    },
                    success: function (resposta) {
                        $("#retornoPesquisa").html(resposta);
                    }
                });
            } else {
                $("#retornoPesquisa").html('');
            }
        });

        $(document).on('click', '.opcao-consulta', function () {
            $("#txtTurma").val($(this).text());
            $("#retornoPesquisa").html("");
        });

        jQuery('form').on('submit', function (e) {
            var nomeAluno = $('#txtNomeAluno').val();
            var dataNasc = $('#dataNasc').val();
            var turma = $('#txtTurma').val();
            var nomeAlunoSemEspaco = nomeAluno.trim();
            var dataNascSemEspaco = dataNasc.trim();
            var turmaSemEspaco = turma.trim();
            if (nomeAluno.length == 0 || nomeAlunoSemEspaco == '') {
                $('#label-nome').html('Por favor, preencha o campo de nome para o aluno!');
                $('#txtNomeAluno').addClass('erro-form');
                $('#label-nome').show();
                setTimeout(function () {
                    $('#label-nome').fadeOut(1);
                    $('#txtNomeAluno').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
            if (dataNasc.length == 0 || dataNascSemEspaco == '') {
                $('#label-dataNasc').html('Por favor, preencha o campo de data de nascimento!');
                $('#dataNasc').addClass('erro-form');
                $('#label-dataNasc').show();
                setTimeout(function () {
                    $('#label-dataNasc').fadeOut(1);
                    $('#dataNasc').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            } else {
                var dataNasc = $('#dataNasc').val().replace(/-/g, ",");
                var dataFormatada = new Date(dataNasc);
                var ano = dataFormatada.getFullYear();
                var anoAtual = new Date().getFullYear();
                if (ano >= anoAtual) {
                    $('#label-dataNasc').html('Data de nascimento inválida!');
                    $('#dataNasc').addClass('erro-form');
                    $('#label-dataNasc').show();
                    setTimeout(function () {
                        $('#label-dataNasc').fadeOut(1);
                        $('#dataNasc').removeClass('erro-form');
                    }, 5000);
                    e.preventDefault();
                }
            }
            if (turma.length == 0 || turmaSemEspaco == '') {
                $('#label-turma').html('Por favor, preencha o campo de turma do aluno!');
                $('#txtTurma').addClass('erro-form');
                $('#label-turma').show();
                setTimeout(function () {
                    $('#label-turma').fadeOut(1);
                    $('#txtTurma').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
        });
    </script>
</body>



</html>