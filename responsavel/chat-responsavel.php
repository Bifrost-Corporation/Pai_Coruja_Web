<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.css">

    <link rel="stylesheet" type="text/css"  href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css"  href="../assets/css/chat.css">

    <title>Home - Responsável</title>


</head>

<body>
    <?php
        include("sentinela.php");
        include("globalResponsavel.php");
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
            <div class="logo-name"><a href="home-responsavel.php"><img src="../img/pai_coruja_branca.png"></a>
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
                <a href="home-responsavel.php">
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
            <li class="links-name">
                <a href="chat-responsavel.php">
                    <i class="fas fa-calendar-day"></i>
                    <span class="links-name">Chat</span>
                </a>
            </li>
        </div>
        <hr>
        <div class="menu-container">
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
                    <div class="name-menu"><?php echo $_SESSION['nomeResponsavel'] ?></div>
                    <div class="job-menu">Olá Professor(a)</div>
                </div>
            </div>
        </div>
    </div>
</div>
</header>



<main class="container-main">
<div class="nav-chat">
                        <h1 class="name-user-chat"><!--<i class="fa fa-arrow-left" aria-hidden="true"></i>-->Chat</h1>
                    </div>
            <section class="area-chat">
            
                <div class="caixa-chat2">
                    <div class="caixa-mensagens">
                        <div id="mensagens">

                        </div>
                    </div>
                    <div class="form-mensagem">
                        <form name="form-chat" method="POST" action="../DAO/enviar-mensagem-responsavel.php">
                            <input type="hidden" id="idEnviar" name="idEnviar" value="<?php echo $_SESSION['idResponsavel'] ?>">
                            <input type="hidden" id="idReceber" name="idReceber" value="<?php echo $_SESSION['idSecretaria'] ?>">
                            <div class="box-submit-message">
                            <input type="text" class="caixa-mensagem" placeholder="Converse com a Secretária" id="txtMensagem" name="txtMensagem">
                            <button class="botao-enviar" id="botao-enviar" name="botao-enviar"><i class="fa fa-paper-plane" aria-hidden="true"></i>
</button>
</div>
                        </form>
                    </div>
                </div>
            </section>

        </main>

    <!--<div class="nav-footer">
        <ul>
            <li class="active">
                <a href="home-responsavel.php">
                    <i class="fas fa-calendar"></i>
                    <span class="links-name">Mural</span>
                </a>
            </li>
            <li class="">
                <a href="#">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <span class="links-name">Avaliação</span>
                </a>
            </li>
            <li class="">
                <a href="#">
                    <i class="fas fa-calendar-day"></i>
                    <span class="links-name">Eventos</span>
                </a>
            </li>
        </ul>
    </div>-->

    <script src="../assets/js/nav.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.js"></script>
    <script src="../assets/js/carousel.js"></script>

    <script>
        $(document).ready(function(){
            var idSecretaria = $('#idReceber').val();
            var idResponsavel = $('#idEnviar').val();

            var query = idSecretaria + ' ' + idResponsavel;

            (function attMensagens () {
                $.ajax({
                url: '../DAO/listar-mensagens-responsavel.php',
                method: 'POST',
                data: {
                    query: query
                },
                success: function(retorno){
                        $("#mensagens").html(retorno);
                },
                complete: function () {
                    setTimeout(attMensagens, 1000);
                }
                });
            })();
            
        });

        jQuery('form').on('submit', function(e){
            e.preventDefault();
        });

        jQuery('#botao-enviar').click(function (){
            if($('#txtMensagem').length != 0){
                var dados = {'idEnviar':jQuery('#idEnviar').val(),
                            'idReceber':jQuery('#idReceber').val(),
                            'txtMensagem':jQuery('#txtMensagem').val()};
                var pageurl = '../DAO/enviar-mensagem-responsavel.php';
                jQuery.ajax({
                    url: pageurl,
                    data: dados,
                    type: 'POST',
                    success:function(html){
                        jQuery('html body').animate({scrollbottom:0},100);
                        jQuery('html #txtMensagem').val('');
                    }
                });
            }
        });
    </script>
</body>



</html>