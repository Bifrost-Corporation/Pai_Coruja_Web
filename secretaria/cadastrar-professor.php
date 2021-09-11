<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />

    <title>Cadastro Professor</title>


</head>

<body>
    <?php
        include ('sentinela.php');
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
                <h2>Cadastrar Professor:</h2>
            </div>
        </section>


        <section class="main-section">
            <form class="formulario" name="form-professor" action="../DAO/inserir-professor.php" method="POST">
                <div class="user-details">
                    <div class="input-box-width100">
                        <h2>Nome do Professor:</h2>
                        <label class="label-erro" id="label-nome"></label>
                        <input name="txtNomeProfessor" id="txtNomeProfessor" type="text"
                            placeholder="Insira o nome do professor">
                    </div>
                    <div class="input-box-width100">
                        <h2>Email Professor:</h2>
                        <label class="label-erro" id="label-email"></label>
                        <input name="txtEmailProfessor" id="txtEmailProfessor" type="email"
                            placeholder="Insira o email do professor">
                    </div>
                    <div class="input-box">
                        <h2>Senha Professor:</h2>
                        <label class="label-erro" id="label-senha1"></label>
                        <input name="txtSenhaProfessor" id="txtSenhaProfessor" type="password" placeholder="********">
                    </div>
                    <div class="input-box">
                        <h2>Confirmar senha:</h2>
                        <label class="label-erro" id="label-senha2"></label>
                        <input name="txtConfirmarSenhaProfessor" id="txtConfirmarSenhaProfessor" type="password"
                            placeholder="********">
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
        jQuery('form').on('submit', function (e) {
            var nome = $('#txtNomeProfessor').val();
            var email = $('#txtEmailProfessor').val();
            var senha1 = $('#txtSenhaProfessor').val();
            var senha2 = $('#txtConfirmarSenhaProfessor').val();
            if (nome.length == 0) {
                $('#label-nome').html('Por favor, preencha o campo de nome para o professor!');
                $('#txtNomeProfessor').addClass('erro-form');
                $('#label-nome').show();
                setTimeout(function () {
                    $('#label-nome').fadeOut(1);
                    $('#txtNomeProfessor').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
            if (email.length == 0) {
                $('#label-email').html('Por favor, preencha o campo de email para o professor!');
                $('#txtEmailProfessor').addClass('erro-form');
                $('#label-email').show();
                setTimeout(function () {
                    $('#label-email').fadeOut(1);
                    $('#txtEmailProfessor').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            } else {
                verificaarroba = false;
                verificaponto = false;
                for (var i = 0; i < email.length; i++) {
                    if (email.charAt(i) == '@' && i + 1 < email.length) {
                        posicaoarroba = i;
                    }
                    if (email.charAt(i) == '.' && i + 1 < email.length) {
                        posicaoponto = i;
                    }
                }
                if (posicaoponto > posicaoarroba) {
                    verificaarroba = true;
                    verificaponto = true;
                }
                if (verificaarroba == false || verificaponto == false) {
                    $('#label-email').html('Email inválido!');
                    $('#txtEmailProfessor').addClass('erro-form');
                    $('#label-email').show();
                    setTimeout(function () {
                        $('#label-email').fadeOut(1);
                        $('#txtEmailProfessor').removeClass('erro-form');
                    }, 5000);
                    e.preventDefault();
                }
            }
            if (senha1.length == 0) {
                $('#label-senha1').html('Por favor, preencha o campo de senha!');
                $('#txtSenhaProfessor').addClass('erro-form');
                $('#label-senha1').show();
                setTimeout(function () {
                    $('#label-senha1').fadeOut(1);
                    $('#txtSenhaProfessor').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
            if (senha2.length == 0) {
                $('#label-senha2').html('Por favor, confirme a senha!');
                $('#txtConfirmarSenhaProfessor').addClass('erro-form');
                $('#label-senha2').show();
                setTimeout(function () {
                    $('#label-senha2').fadeOut(1);
                    $('#txtConfirmarSenhaProfessor').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
            if (senha1 != senha2) {
                $('#label-senha1').html('As senhas não correspondem!');
                $('#txtSenhaProfessor').addClass('erro-form');
                $('#label-senha1').show();
                setTimeout(function () {
                    $('#label-senha1').fadeOut(1);
                    $('#txtSenhaProfessor').removeClass('erro-form');
                }, 5000);
                $('#label-senha2').html('As senhas não correspondem!');
                $('#txtConfirmarSenhaProfessor').addClass('erro-form');
                $('#label-senha2').show();
                setTimeout(function () {
                    $('#label-senha2').fadeOut(1);
                    $('#txtConfirmarSenhaProfessor').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
        });
    </script>

</body>



</html>