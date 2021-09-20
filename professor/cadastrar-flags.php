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
    <a href=""><img class="logo-img" src="../img/pai_coruja_branca.png"></a>
    <ul class="ul-area-btn">
        <li class="nav-li"><a class="btn-nav-open"><i class="fas fa-bars"></i></a></li>
    </ul>
</nav>

<div class="sidebar">
    <div class="logo-content">
        <div class="logo">
            <div class="logo-name"><a href="home-adm.php"><img src="../img/pai_coruja_branca.png"></a>
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
            <!-- <span>fernfjk</span> -->
            <li class="links-name">
                <a href="home-professor.php">
                    <i class="fas fa-calendar"></i>
                    <span class="links-name">Mural</span>
                </a>
            </li>
            <li class="links-name">
                <a href="#">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <span class="links-name">Avaliação dos Professores</span>
                </a>
            </li>
            <li class="links-name">
                <a href="#">
                    <i class="fas fa-calendar-day"></i>
                    <span class="links-name">Eventos Programados</span>
                </a>
            </li>
        </div>
        <hr>
        <div class="menu-container">
            <li class="links-name">
                <a href="cadastrar-flags.php">
                    <i class="fas fa-school"></i>
                    <span class="links-name">Cadastrar Avaliação</span>
                </a>
            </li>
            <li class="links-name">
                <a href="cadastrar-imagem-perfil.php">
                    <i class="fas fa-school"></i>
                    <span class="links-name">Cadastrar imagem de perfil</span>
                </a>
            </li>
        </div>
    </ul>
    <div class="profile-content">
        <div class="profile-menu">
            <a href="logout.php">
                <i class="fas fa-sign-out-alt" id="logout-user"></i>
                <span>Logout</span>
            </a>
            <a href="#">
                <i class="fas fa-user-cog"></i>
                <span>Configurações</span>
            </a>
        </div>
        <div class="profile">
            <div class="profile-details">
                <img src="../img/usuario-de-perfil.png" alt="">
                <div class="name-job">
                    <div class="name-menu"><?php echo $_SESSION['nomeProfessor'] ?></div>
                    <div class="job-menu">Olá Professor(a)</div>
                </div>
            </div>
        </div>
    </div>
</div>
</header>
    <main class="container-main">
        <section class="top-section">
            <div class="voltar">
                <a href="home-professor.php">
                    <span class="fas fa-arrow-left"></span>Voltar
                </a>
            </div>
            <div class="titulo-cadastrar">
                <h2>Cadastrar Observação ao aluno:</h2>
            </div>
        </section>


        <section class="main-section">
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
                        <h2>Dê uma nota ao acontecido:</h2>
                        <label class="label-erro" id="label-gravidade"></label>
                        <input name="txtGravidade" id="txtGravidade" type="number" placeholder="de 0 a 5, quão grave foi o que aconteceu? Deixe 0 para apenas uma observação">
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

    <script src="../js/nav.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="../js/jquery.mask.js"></script>

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