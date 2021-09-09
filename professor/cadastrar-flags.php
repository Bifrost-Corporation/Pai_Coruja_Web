<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />

    <title>Cadastrar - Flags</title>


</head>

<body>
    <?php
        include("sentinela.php");
    ?>
    <header>

        <!-- <nav class="nav-bar">
            <a href=""><img class="logo" src="../img/pai_coruja_3.png"></a>
            <ul class="ul-area-btn">
                <li class="nav-li"><a class="btn-nav-exit" href="logout.php">Sair</a></li>
            </ul>
        </nav> -->

        <div class="sidebar">
            <div class="logo-content">
                <div class="logo">
                    <div class="logo-name"><a href=""><img src="../img/pai_coruja_branca.png"></a></div>
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
                        <a href="#">
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
                        <span class="links-name">Cadastrar</span>
                        </div>
                        <i class="fas fa-caret-down" class="dropdown-icon"></i>
                    </a>
                </li>
                <div class="drop-menu" id="sub-menu-2">
                    <li class="links-name drop-link">
                        <a href="cadastrar-flags.php">
                            <i class="fas fa-school"></i>
                            <span class="links-name">Cadastrar Observação</span>
                        </a>
                    </li>
                    <li class="links-name drop-link">
                        <a href="cadastrar-publicacao.php">
                            <i class="fas fa-school"></i>
                            <span class="links-name">Cadastrar Publicação</span>
                        </a>
                    </li>
                    <li class="links-name drop-link">
                        <a href="cadastrar-imagem-perfil.php">
                            <i class="fas fa-school"></i>
                            <span class="links-name">Alterar Imagem Perfil</span>
                        </a>
                    </li>
                    
                </div>
                
            </ul>
            <div class="profile-content">
                <div class="profile">
                    <div class="profile-details">
                        <img src="../img/usuario-de-perfil.png" alt="">
                        <div class="name-job">
                            <div class="name-menu"><?php echo $_SESSION['nomeProfessor'] ?></div>
                            <div class="job-menu">Olá Secretário(a)</div>
                        </div>
                    </div>
                    <i class="fas fa-sign-out-alt" id="logout-user"></i>
                </div>
            </div>
        </div>

    </header>


    
    <main class="container-main">
        <section class="top-section">
            <div class="voltar">
                <a href="#">
                    <span class="fas fa-arrow-left"></span>Voltar
                </a>
            </div>
            <div class="titulo-cadastrar">
                <h2>Cadastrar Observação ao aluno:</h2>
            </div>
        </section>


        <section class="main-section">
            <form class="formulario" name="formFlag" action="../DAO/inserir-observacao.php" method="POST">
                <div class="user-details">
                    <div class="input-box-width100">
                        <h2>Nome do aluno:</h2>
                        <label class="label-erro" id="label-aluno"></label>
                        <input name="txtAluno" id="txtAluno" type="text" placeholder="Insira o nome do aluno">
                        <div id="retornoPesquisa">

                        </div>
                    </div>
                    <div class="input-box-width100">
                        <h2>Dê uma nota ao acontecido:</h2>
                        <label class="label-erro" id="label-gravidade"></label>
                        <input name="txtGravidade" id="txtGravidade" type="number" placeholder="de 0 a 5, quão grave foi o que aconteceu ?">
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
    <script>
        jQuery('#txtAluno').keyup(function () {
            var textoInserido = $(this).val();
            if (textoInserido != '') {
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
        });

        $(document).on('click', '.opcao-consulta', function () {
            $("#txtAluno").val($(this).text());
            $("#retornoPesquisa").html("");
        });

        jQuery('form').on('submit', function(e){
            var nomeAluno = $('#txtAluno').val();
            var gravidade = $('#txtGravidade').val();
            var descricao = $('#txtOcorrido').val();
            if(nomeAluno.length == 0){
                $('#label-aluno').html('Por favor, informe o aluno sobre qual deseja fazer uma observação!');
                $('#txtAluno').addClass('erro-form');
                $('#label-aluno').show();
                setTimeout(function () {
                    $('#label-aluno').fadeOut(1);
                    $('#txtAluno').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
            if(gravidade.length == 0){
                $('#label-gravidade').html('Por favor, informe a gravidade da observação! (deixe em 0 caso seja apenas uma observação)');
                $('#txtGravidade').addClass('erro-form');
                $('#label-gravidade').show();
                setTimeout(function () {
                    $('#label-gravidade').fadeOut(1);
                    $('#txtGravidade').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
            if(descricao.length == 0){
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