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
    <a href=""><img class="logo-img" src="../img/pai_coruja_branca.png"></a>
    <ul class="ul-area-btn">
        <li class="nav-li"><a class="btn-nav-open"><i class="fas fa-bars"></i></a></li>
    </ul>
</nav>

<div class="sidebar">
    <div class="logo-content">
        <div class="logo">
            <div class="logo-name"><a class="btn-nav-pc-open"><img src="../img/pai_coruja_branca.png"></a>
            <!-- <i class="fas fa-bars">dffg</i> -->
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
                <a href="home-adm.php">
                    <i class="fas fa-calendar"></i>
                    <span class="links-name">Mural</span>
                </a>
            </li>
            <li class="links-name">
                <a href="cadastrar-escola.php" class="active-nav">
                    <i class="fas fa-school"></i>
                    <span class="links-name">Cadastrar Escola</span>
                </a>
            </li>
            <li class="links-name">
                <a href="cadastrar-escola.php">
                    <i class="fas fa-school"></i>
                    <span class="links-name">Alterar/Visualizar Dados</span>
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
                    <div class="name-menu">Admin</div>
                    <div class="job-menu">Olá Administrador(a)</div>
                </div>
            </div>
        </div>
    </div>
</div>
</header>


    <main class="container-dash">


        <div class="ola-nav-dash">
            <h1>Cadastrar Escola</h1>
        </div>


        <section class="container-dados-dash">
            <form name="nomeEscola" class="formulario" method="POST" action="../DAO/inserir-escola.php">
                <div class="user-details">
                    <input type="hidden" value="<?php echo @$_GET['idEscola']; ?>" id="idEscola" name="idEscola">
                    <div class="input-box-width100">
                        <h2>Nome da Escola: </h2>
                        <label class="label-erro" id="label-escola"></label>
                        <input name="txtNomeEscola" value="<?php echo @$_GET['nomeEscola'];?>" id="txtNomeEscola" type="text"
                            placeholder="Insira o nome da escola">
                    </div>
                    <input type="hidden" value="<?php echo @$_GET['idAdministrador'] ?>" id="idAdministrador" name="idAdministrador">
                    

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
                </div>
            </form>
        </section>

        

    </main>

    <script src="../assets/js/nav.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        jQuery('form').on('submit', function (e) {
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
        });
    </script>
    <script src="../assets/js/showDiv.js">

    </script>

</body>



</html>