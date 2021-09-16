<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />

    <title>Cadastrar Secretária</title>


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
                        <a href="home-adm.php">
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
                            <span class="links-name">Administrador</span>
                        </div>
                        <i class="fas fa-caret-down" class="dropdown-icon"></i>
                    </a>
                </li>
                <div class="drop-menu" id="sub-menu-2">
                    <li class="links-name drop-link">
                        <a href="cadastrar-escola.php">
                            <i class="fas fa-school"></i>
                            <span class="links-name">Cadastrar Escola</span>
                        </a>
                    </li>
                    <li class="links-name drop-link">
                        <a href="cadastrar-secretaria.php">
                            <i class="fas fa-school"></i>
                            <span class="links-name">Cadastrar Secretária</span>
                        </a>
                    </li>
                </div>
            </ul>
            <div class="profile-content">
                <div class="profile">
                    <div class="profile-details">
                        <img src="../img/usuario-de-perfil.png" alt="">
                        <div class="name-job">
                            <div class="name-menu">Admin</div>
                            <div class="job-menu">Olá Administrador(a)</div>
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


    <main class="container-main area-cadastro">


        <section class="top-section"  id="Topo">
            <div class="voltar">
                <a href="home-adm.php">
                    <span class="fas fa-arrow-left"></span>
                </a>
            </div>
            <div class="titulo-cadastrar">
                <h2>Cadastrar Secretária:</h2>
            </div>
        </section>


        <section class="main-section">
            <form class="formulario" name="formCadastrarSecretaria" method="POST"
                action="../DAO/inserir-secretaria.php">
                <div class="user-details">
                    <div class="input-box-width100">
                        <h2>Nome de usuário da Secretária:</h2>
                        <label class="label-erro" id="label-usuario"></label>
                        <input name="txtUsuarioSecretaria" id="txtUsuarioSecretaria" type="text"
                            placeholder="Insira o nome de usuário para a secretaria">
                    </div>
                    <div class="input-box-width100">
                        <h2>Email Secretária:</h2>
                        <label class="label-erro" id="label-email"></label>
                        <input name="txtEmailSecretaria" id="txtEmailSecretaria" type="text"
                            placeholder="Insira o email da secretaria" value="<?php if(isset($_SESSION['emailSecretaria'])){
                                                                                                                                echo $_SESSION['emailSecretaria'];
                                                                                                                            } ?>">
                    </div>
                    <div class="input-box">
                        <h2>Senha Secretária:</h2>
                        <label class="label-erro" id="label-senha1"></label>
                        <input name="txtSenhaSecretaria" id="txtSenhaSecretaria" type="password" placeholder="********">
                    </div>
                    <div class="input-box">
                        <h2>Confirmar senha:</h2>
                        <label class="label-erro" id="label-senha2"></label>
                        <input name="txtConfirmaSenhaSecretaria" id="txtConfirmaSenhaSecretaria" type="password"
                            placeholder="********">
                    </div>
                    <div class="input-box-width100">
                        <h2>A qual escola essa conta de secretaria pertence?</h2>
                        <label class="label-erro" id="label-escola"></label>
                        <input name="txtConsultaEscola" id="txtConsultaEscola" type="text"
                            placeholder="Pesquise aqui o nome da escola" value="<?php if(isset($_SESSION['escolaSecretaria'])){
                                                                                                                                echo $_SESSION['escolaSecretaria'];
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
            <div id="btn-show-div-exibir-dados" class="content-card-link1" checked>
                <div class="side-left">
                    <h1>2</h1>
                    <p>Secretárias</p>
                </div>
                <div class="side-right">    
                <a class="btn-ver-dados-tabela"><i class="fas fa-school" aria-hidden="true"></i><p> ver todos</p></a>
                
                </div>

            </div>
            <a href="#Topo" class="content-card-link2">
                <div class="side-left">
                    <h1>+</h1>
                    <p>Adicionar Secretária</p>
                </div>
                <div class="side-right">
                <i class="btn-adicionar-aluno fas fa-school" aria-hidden="true"></i>
                
                </div>
            </a>
            
        </section>
        <div class="container-exibir-dados">
            <h1>Secretárias Cadastradas</h1>
            <div class="dropdown-dados">
                <p>Usuario: Miau <i class="fas fa-caret-down" class="dropdown-icon"></i></p>
                <div class="itens-dropdown-dados">
                <i class="icons-dropdown fas fa-cog" aria-hidden="true"></i>
                <i class="icons-dropdown fas fa-times" aria-hidden="true"></i> 
                </div>
            </div>
            <div class="dropdown-dados-lista">
                dfg
            </div>
        </div>
    </main>

    <script src="../js/nav.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="../js/showDiv.js">
        
        </script>                                                                                                                       
    <script>

        $(document).ready(function(){
            var valueEscola = $('#txtConsultaEscola').val();
            var valueEmail = $('#txtEmailSecretaria').val();
            if(valueEscola.length > 0){
                $('#label-escola').html('Escola inexistente ou já cadastrada!');
                $('#txtConsultaEscola').addClass('erro-form');
                $('#label-escola').show();
                setTimeout(function () {
                    $('#label-escola').fadeOut(1);
                    $('#txtConsultaEscola').removeClass('erro-form');
                    $('#txtConsultaEscola').val('');
                }, 5000);
                <?php
                    unset($_SESSION['escolaSecretaria']);
                ?>
                e.preventDefault();
            }
            if(valueEmail.length > 0){
                $('#label-email').html('Email já cadastrado!');
                $('#txtEmailSecretaria').addClass('erro-form');
                $('#label-email').show();
                setTimeout(function () {
                    $('#label-email').fadeOut(1);
                    $('#txtEmailSecretaria').removeClass('erro-form');
                    $('#txtEmailSecretaria').val('');
                }, 5000);
                <?php
                    unset($_SESSION['emailSecretaria']);
                ?>
                e.preventDefault();
            }
        });

        jQuery('#txtConsultaEscola').keyup(function () {
            var textoInserido = $(this).val();
            if (textoInserido != '') {
                $.ajax({
                    url: '../DAO/procurar-escola.php',
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
            $("#txtConsultaEscola").val($(this).text());
            $("#retornoPesquisa").html("");
        });

        jQuery('form').on('submit', function (e) {
            var nome = $('#txtUsuarioSecretaria').val();
            var email = $('#txtEmailSecretaria').val();
            var senha1 = $('#txtSenhaSecretaria').val();
            var senha2 = $('#txtConfirmaSenhaSecretaria').val();
            var escola = $('#txtConsultaEscola').val();
            var nomeSemEspaco = nome.trim();
            var emailSemEspaco = email.trim();
            var senha1SemEspaco = senha1.trim();
            var senha2SemEspaco = senha2.trim();
            var nomeEscolaSemEspaco = escola.trim();
            if (nomeSemEspaco.length == 0) {
                $('#label-usuario').html('Por favor, preencha o campo de nome para a secretaria!');
                $('#txtUsuarioSecretaria').addClass('erro-form');
                $('#label-usuario').show();
                setTimeout(function () {
                    $('#label-usuario').fadeOut(1);
                    $('#txtUsuarioSecretaria').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
            if (emailSemEspaco.length == 0) {
                $('#label-email').html('Por favor, preencha o campo de email para a secretaria!');
                $('#txtEmailSecretaria').addClass('erro-form');
                $('#label-email').show();
                setTimeout(function () {
                    $('#label-email').fadeOut(1);
                    $('#txtEmailSecretaria').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            } 
            else {
                var verificaarroba = false;
                var verificaponto = false;
                for (var i = 0; i < email.length; i++) {
                    if (email.charAt(i) == '@' && i + 1 < email.length) {
                        var posicaoarroba = i;
                    }
                    if (email.charAt(i) == '.' && i + 1 < email.length) {
                        var posicaoponto = i;
                    }
                }
                if (posicaoponto > posicaoarroba) {
                    verificaarroba = true;
                    verificaponto = true;
                }
                if (verificaarroba == false || verificaponto == false) {
                    $('#label-email').html('Email inválido!');
                    $('#txtEmailSecretaria').addClass('erro-form');
                    $('#label-email').show();
                    setTimeout(function () {
                        $('#label-email').fadeOut(1);
                        $('#txtEmailSecretaria').removeClass('erro-form');
                    }, 5000);
                    e.preventDefault();
                }
            }
            if (senha1SemEspaco.length == 0) {
                $('#label-senha1').html('Por favor, insira uma senha!');
                $('#txtSenhaSecretaria').addClass('erro-form');
                $('#label-senha1').show();
                setTimeout(function () {
                    $('#label-senha1').fadeOut(1);
                    $('#txtSenhaSecretaria').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
            if (senha2SemEspaco.length == 0) {
                $('#label-senha2').html('Por favor, confirme a senha!');
                $('#txtConfirmaSenhaSecretaria').addClass('erro-form');
                $('#label-senha2').show();
                setTimeout(function () {
                    $('#label-senha2').fadeOut(1);
                    $('#txtConfirmaSenhaSecretaria').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
            if (senha1 != senha2) {
                $('#label-senha1').html('As senhas não correspondem!');
                $('#txtSenhaSecretaria').addClass('erro-form');
                $('#label-senha1').show();
                setTimeout(function () {
                    $('#label-senha1').fadeOut(1);
                    $('#txtSenhaSecretaria').removeClass('erro-form');
                }, 5000);
                $('#label-senha2').html('As senhas não correspondem!');
                $('#txtConfirmaSenhaSecretaria').addClass('erro-form');
                $('#label-senha2').show();
                setTimeout(function () {
                    $('#label-senha2').fadeOut(1);
                    $('#txtConfirmaSenhaSecretaria').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
            if (nomeEscolaSemEspaco.length == 0) {
                $('#label-escola').html('Por favor, informe à qual escola essa conta pertence!');
                $('#txtConsultaEscola').addClass('erro-form');
                $('#label-escola').show();
                setTimeout(function () {
                    $('#label-escola').fadeOut(1);
                    $('#txtConsultaEscola').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }

        });
    </script>

</body>



</html>