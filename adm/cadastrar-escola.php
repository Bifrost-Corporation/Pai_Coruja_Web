<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />

    <link rel="stylesheet" type="text/css"  href="../assets/css/style.css">
    <title>Cadastrar Escola</title>


</head>

<body>
    <?php
        include("sentinela.php");
        include("globalAdm.php");
    ?>
<header>
            <nav class="nav-bar">
                <div class="content-logo-btn">
                    <ul class="ul-area-btn">
                        <li class="nav-li"><a class="btn-nav-pc-open"><i class="material-icons-round">menu</i></a></li>
                    </ul>
                    <a href="home-adm.php"><img class="logo-img" src="../img/pai_coruja_branca.png"></a>
                </div>
                <button class="profile">
                    <div class="profile-details" id="openProfile">
                        <img src="../img/paiADM.png" alt="">
                    </div>
                </button>

                <div class="dropdown-menu-profile">
                    <div class="profile-details">
                        <img src="../img/paiADM.png" alt="">
                        <div class="name-job">
                            <div class="name-menu">Administrador</div>
                            <small class="job-menu">Olá Administrador(a)</small>
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
                            <a href="home-adm.php">
                            <i class="material-icons-round">space_dashboard</i>
                                <span class="links-name tooltip">Dashboard</span>
                            </a>
                        </li>
                        <li class="links-name">
                            <a href="cadastrar-escola.php" class="active-nav">
                                <i class="material-icons-round">school</i>
                                <span class="links-name tooltip">Cadastrar Escola</span>
                            </a>
                        </li>
                        <li class="links-name">
                        <a href="visualizar-dados.php">
                                <i class="material-icons-round">view_list</i>
                                <span class="links-name tooltip">Visualizar Dados</span>
                            </a>
                        </li>
                    </div>
                </ul>
                
            </div>
        </header>


        <main class="container-main">
        
        

    <div class="container-dash">


        <div class="ola-nav-dash">
            <h1>Cadastrar Escola</h1>
        </div>


        <section class="container-dados-dash">
            <form name="nomeEscola" class="formulario" method="POST" action="../DAO/inserir-escola-secretaria.php">
                <div class="user-details">
                    <input type="hidden" value="<?php echo @$_GET['idEscola']; ?>" id="idEscola" name="idEscola">
                    <div class="input-box-width100">
                        <h2>Nome da Escola: </h2>
                        <label class="label-erro" id="label-escola"></label>
                        <input name="txtNomeEscola" value="<?php echo @$_GET['nomeEscola'];?>" id="txtNomeEscola" type="text"
                            placeholder="Insira o nome da escola">
                    </div>
                    <input type="hidden" id="idSecretaria" name="idSecretaria" value="<?php echo @$_GET['idSecretaria']; ?>">
                    <div class="input-box-width100">
                        <h2>Nome de usuário da Secretária:</h2>
                        <label class="label-erro" id="label-usuario"></label>
                        <input name="txtUsuarioSecretaria" id="txtUsuarioSecretaria" type="text"
                            placeholder="Insira o nome de usuário para a secretaria" value="<?php echo @$_GET['nomeSecretaria']; ?>">
                    </div>
                    <div class="input-box-width100">
                        <h2>Email Secretária:</h2>
                        <label class="label-erro" id="label-email"></label>
                        <input name="txtEmailSecretaria" id="txtEmailSecretaria" type="text"
                            placeholder="Insira o email da secretaria"
                            value="<?php if(isset($_SESSION['emailSecretaria'])){
                                                                                                                                echo $_SESSION['emailSecretaria'];
                                                                                                                            }else{
                                                                                                                                echo @$_GET['emailSecretaria'];
                                                                                                                            }  ?>">
                    </div>
                    <div class="input-box-width100">
                        <h2>Senha Secretária:</h2>
                        <label class="label-erro" id="label-senha1"></label>
                        <input name="txtSenhaSecretaria" id="txtSenhaSecretaria" type="password" placeholder="********">
                    </div>
                    <div class="input-box-width100">
                        <h2>Confirmar senha:</h2>
                        <label class="label-erro" id="label-senha2"></label>
                        <input name="txtConfirmaSenhaSecretaria" id="txtConfirmaSenhaSecretaria" type="password"
                            placeholder="********">
                    </div>
                    <div class="button">
                        <input type="submit" class="btn-nav-exit" value="Cadastrar">
                    </div>
                </div>
            </form>
        </section>

        
    </div>                                                                                                                    
    </main>

    <script src="../assets/js/nav.js"></script>
    <script src="../assets/js/sweetAlert.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        
        jQuery('form').on('submit', function (e) {

            //Parte Escola
            var nomeEscola = $('#txtNomeEscola').val();
            var nomeEscolaSemEspaco = nomeEscola.trim();
            if (nomeEscolaSemEspaco.length == 0) {
                $('#label-escola').html('Por favor, preencha o campo de nome da escola!');
                $('#txtNomeEscola').addClass('erro-form');
                $('#label-escola').show();
                setTimeout(function () {
                    $('#label-escola').fadeOut(1);
                    $('#txtNomeEscola').removeClass('erro-form');
                    $('#txtNomeEscola').val('');
                }, 5000);
                e.preventDefault();
            }
            
            //Modal de feedback 

            function feedback(type,title,text){
                Swal.fire({
                    icon:type,
                    title:title,
                    text:text,
                    showConfirmButton:false,
                    timer:1500,
                })
            }
            feedback('success','Sucesso!','Cadastro realizado!')

            //Parte Secretaria
            var nome = $('#txtUsuarioSecretaria').val();
            var email = $('#txtEmailSecretaria').val();
            var senha1 = $('#txtSenhaSecretaria').val();
            var senha2 = $('#txtConfirmaSenhaSecretaria').val();
            var nomeSemEspaco = nome.trim();
            var emailSemEspaco = email.trim();
            var senha1SemEspaco = senha1.trim();
            var senha2SemEspaco = senha2.trim();
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
            } else {
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
        });
    </script>
    <script src="../assets/js/showDiv.js">

    </script>

</body>



</html>