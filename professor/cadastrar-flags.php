<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css"  href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />

    <title>Cadastrar - Flags</title>


</head>

<body>
    <?php
        include("sentinela.php");
    ?>
    <header>
            <nav class="nav-bar">
                <div class="content-logo-btn">
                    <ul class="ul-area-btn">
                        <li class="nav-li"><a class="btn-nav-pc-open"><i class="material-icons-round">menu</i></a></li>
                    </ul>
                    <a href="dashboard.php"><img class="logo-img" src="../img/pai_coruja_branca.png"></a>
                </div>
                <button class="profile">
                    <div class="profile-details" id="openProfile">
                        <img src="../img/macacopc.gif" alt="">
                    </div>
                </button>

                <div class="dropdown-menu-profile">
                    <div class="profile-details">
                        <img src="../img/macacopc.gif" alt="">
                        <div class="name-job">
                            <div class="name-menu"><?php echo $_SESSION['nomeProfessor'] ?></div>
                            <small class="job-menu">Olá Professor(a)</small>
                        </div>
                    </div>
                    <ul class="opcoes-drop-profile">
                        <li class="online-li">
                            <label for="">Online</label>
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider round"></span>
                            </label>
                        </li>
                        <li class="drop-profile-li" id="alterar-imagem-perfil">
                            <a>
                                <i class="material-icons-round">manage_accounts</i>
                                <small>Trocar Imagem de Perfil</small>
                            </a>
                        </li>
                        <li class="drop-profile-li">
                            <a href="logout.php">
                                <i id="logout-user" class="material-icons-round">logout</i>
                                <small>Sair</small>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="sidebar">
                <div class="logo-content">
                    <div class="logo">
                        <div class="logo-name">
                        <i class="fas fa-arrow-left"></i>
                    </div>
                        <div class="close-mobile-navbar">
                            <span>Menu Pai Coruja</span>
                            <a class="btn-nav-close"><i class="far fa-window-close"></i></a>
                        </div>
                    </div>
                </div>
                <ul class="nav-list">
                    <div class="menu-container">
                        <li class="links-name">
                            <a href="home-professor.php">
                                <i class="material-icons-round">space_dashboard</i>
                                <span class="links-name tooltip">Dashboard</span>
                            </a>
                        </li>
                        <li class="links-name">
                            <a href="cadastrar-publicacao.php">
                                <i class="material-icons-round">notes</i>
                                <span class="links-name tooltip">Cadastrar Publicação</span>
                            </a>
                        </li>
                        <li class="links-name">
                        <a href="cadastrar-flags.php" class="active-nav">
                            <i class="material-icons-round">sticky_note_2</i>
                                <span class="links-name tooltip">Cadastrar Observações</span>
                            </a>
                        </li>
                        <li class="links-name">
                            <a href="chat-professor.php" >
                                <i class="material-icons-round">chat_bubble</i>
                                <span class="links-name tooltip">Pai Coruja Chat</span>
                            </a>
                        </li>
                    </div>
                </ul>
                
            </div>
        </header>

    <main class="container-main container-dash">
        <div class="ola-nav-dash">
            <h1>Cadastrar Observação</h1>
        </div>


        <section class="container-dados-dash">
            <form class="formulario" action="../DAO/inserir-observacao.php" method="POST">
                <div class="user-details">
                    <div class="input-box-width100">
                        <h2>Turma do aluno:</h2>
                        <label class="label-erro" id="label-turma"></label>
                        <input name="txtTurma" id="txtTurma" type="text" placeholder="Infome a turma do aluno" value="<?php if(isset($_SESSION['nomeTurma'])){
                                                                                                                                                                    echo $_SESSION['nomeTurma'];
                                                                                                                                                                } ?>">
                        <div id="retornoPesquisaTurma">

                        </div>
                    </div>
                    <div class="input-box-width100">
                        <h2>Nome do aluno:</h2>
                        <label class="label-erro" id="label-aluno"></label>
                        <input name="txtAluno" id="txtAluno" type="text" placeholder="Insira o nome do aluno" value="<?php if(isset($_SESSION['nomeAluno'])){
                                                                                                                                                                echo $_SESSION['nomeAluno'];
                                                                                                                                                            } ?>">
                        <div id="retornoPesquisa">

                        </div>
                    </div>
                    <div class="input-box-width100">
                        <h2>Gravidade do Acontecido:</h2>
                        <label class="label-erro" id="label-gravidade"></label>
                        <input type="range" min="0" max="5" id="range-gravidade" name="range-gravidade">
                        <datalist id="tickmarks">
                            <option value="0" label="0">
                            <option value="1" label="1">
                            <option value="2" label="2">
                            <option value="3" label="3">
                            <option value="4" label="4">
                            <option value="5" label="5">
                        </datalist>
                        <div class="label-do-range">
                            <label for="range-gravidade">Sem Gravidade (deixe 0 para elogios)</label>
                            <!-- <label for="range-gravidade">Leve</label>
                            <label for="range-gravidade">Badaras</label>
                            <label for="range-gravidade">Grave</label>
                            <label for="range-gravidade">Muito Grave</label> -->
                            <label for="range-gravidade">Extremamente Grave</label>
                        </div>
                    </div>
                    <div class="input-box-width100">
                        <h2>Descreva o que aconteceu:</h2>
                        <label class="label-erro" id="label-ocorrido"></label>
                        <input class="text-area" name="txtOcorrido" id="txtOcorrido" type="text" placeholder="...">
                    </div>
                    <div class="button">
                        <input type="submit" class="btn-nav-exit" value="Cadastrar">
                    </div>
                </div>
            </form>
        </section>
    </main>

    <script src="../assets/js/nav.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="../assets/js/jquery.mask.js"></script>

    <script>

        $(document).ready(function(){
            var valueTurma = $('#txtTurma').val();
            var valueAluno = $('#txtAluno').val();
            if(valueTurma.length > 0){
                $('#label-turma').html('Turma inexistente!');
                $('#txtTurma').addClass('erro-form');
                $('#label-turma').show();
                setTimeout(function () {
                    $('#label-turma').fadeOut(1);
                    $('#txtTurma').removeClass('erro-form');
                    $('#txtTurma').val('');
                }, 5000);
                <?php
                    unset($_SESSION['nomeTurma']);
                ?>
                e.preventDefault();
            }
            if(valueAluno.length > 0){
                $('#label-aluno').html('Aluno não encontrado!');
                $('#txtAluno').addClass('erro-form');
                $('#label-aluno').show();
                setTimeout(function () {
                    $('#label-aluno').fadeOut(1);
                    $('#txtAluno').removeClass('erro-form');
                    $('#txtAluno').val('');
                }, 5000);
                <?php
                    unset($_SESSION['nomeAluno']);
                ?>
                e.preventDefault();
            }
        });

        $('#txtGravidade').mask("0");

        jQuery('#txtTurma').keyup(function () {
            var textoInserido = $(this).val();
            if (textoInserido != '') {
                $.ajax({
                    url: '../DAO/procurar-turma-aluno2.php',
                    method: 'POST',
                    data: {
                        query: textoInserido
                    },
                    success: function (resposta) {
                        $("#retornoPesquisaTurma").html(resposta);
                    }
                });
            } else {
                $("#retornoPesquisaTurma").html('');
            }
        });

        $(document).on('click', '.opcao-consulta2', function () {
            $("#txtTurma").val($(this).text());
            $("#retornoPesquisaTurma").html("");
        });

        jQuery('#txtAluno').keyup(function () {
            var textoInserido = $(this).val();
            var turma = $('#txtTurma').val();
            var turmaVazia = turma.trim();
            if(turmaVazia != ''){
                if (textoInserido != '') {
                    textoInserido = textoInserido + ' ' + turma;
                    $.ajax({
                        url: '../DAO/procurar-aluno-turma.php',
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
            } else {
                $('#label-turma').html('Por favor, informe a turma do aluno antes!');
                $('#txtTurma').addClass('erro-form');
                $('#label-turma').show();
                setTimeout(function () {
                    $('#label-turma').fadeOut(1);
                    $('#txtTurma').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
        });

        $(document).on('click', '.opcao-consulta', function () {
            $("#txtAluno").val($(this).text());
            $("#retornoPesquisa").html("");
        });

        jQuery('form').on('submit', function(e){
            var turma = $('#txtTurma').val();
            var nomeAluno = $('#txtAluno').val();
            var gravidade = $('#txtGravidade').val();
            var descricao = $('#txtOcorrido').val();
            var descricaoSemEspaco = descricao.trim();
            var turmaSemEspaco = turma.trim();
            var nomeAlunoSemEspaco = nomeAluno.trim();
            var gravidadeSemEspaco = gravidade.trim();
            if(turma.length == 0 || turmaSemEspaco == ''){
                $('#label-turma').html('Por favor, informe a turma do aluno sobre qual deseja fazer uma observação!');
                $('#txtTurma').addClass('erro-form');
                $('#label-turma').show();
                setTimeout(function () {
                    $('#label-turma').fadeOut(1);
                    $('#txtTurma').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
            if(nomeAluno.length == 0 || nomeAlunoSemEspaco == ''){
                $('#label-aluno').html('Por favor, informe o aluno sobre qual deseja fazer uma observação!');
                $('#txtAluno').addClass('erro-form');
                $('#label-aluno').show();
                setTimeout(function () {
                    $('#label-aluno').fadeOut(1);
                    $('#txtAluno').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
            if(gravidade.length == 0 || gravidadeSemEspaco == ''){
                $('#label-gravidade').html('Por favor, informe a gravidade da observação! (deixe em 0 caso seja apenas uma observação)');
                $('#txtGravidade').addClass('erro-form');
                $('#label-gravidade').show();
                setTimeout(function () {
                    $('#label-gravidade').fadeOut(1);
                    $('#txtGravidade').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
            if(gravidade > 5){
                $('#label-gravidade').html('Limite de gravidade é 5!');
                $('#txtGravidade').addClass('erro-form');
                $('#label-gravidade').show();
                setTimeout(function () {
                    $('#label-gravidade').fadeOut(1);
                    $('#txtGravidade').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
            if(descricao.length == 0 || descricaoSemEspaco == ''){
                $('#label-ocorrido').html('Por favor, informe o que aconteceu!');
                $('#txtOcorrido').addClass('erro-form');
                $('#label-ocorrido').show();
                setTimeout(function () {
                    $('#label-ocorrido').fadeOut(1);
                    $('#txtOcorrido').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
        });
    </script>

</body>



</html>