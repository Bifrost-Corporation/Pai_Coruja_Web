<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/modal.css">

    <title>Home - Professor</title>


</head>

<body>
    <?php
        include("sentinela.php");

        include("../classes/Usuario.php");
        include("../classes/Professor.php");

        $usuario = new Usuario();
        $professor = new Professor();

        $listaUsuario = $usuario->listar();
        $listaProfessor = $professor->listar();

        foreach($listaProfessor as $linha){
            if($linha['idProfessor'] == $_SESSION['idProfessor']){
                foreach($listaUsuario as $linha2){
                    if($linha['idProfessor'] == $linha2['idProfessor']){
                        $idUsuario = $linha2['idUsuario'];
                    }
                }
            }
        }
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
        <div class="carousel">
            <div class=" carousel-destaque">
                <div class="destaque-card">
                <div class="esquerda-destaque">
                    <h1>Titulo<!--<?php echo $linha['tituloPublicacao'] ?>--></h1>
                    <small>Subtitulo<!--<?php echo $linha['descPublicacao'] ?>--></small>
                    <p>Para mais detalhes clique abaixo</p>

                    <a href="#"><button class="saiba-mais-btn">Saiba Mais</button></a>
                </div>
                <div class="direita-destaque">

                </div> 
            </div>
            
            <div class="destaque-card">
                <div class="esquerda-destaque">
                    <h1>Titulo<!--<?php echo $linha['tituloPublicacao'] ?>--></h1>
                    <small>Subtitulo<!--<?php echo $linha['descPublicacao'] ?>--></small>
                    <p>Para mais detalhes clique abaixo</p>

                    <a href="#"><button class="saiba-mais-btn">Saiba Mais</button></a>
                </div>
                <div class="direita-destaque">

                </div> 
            </div>
            <div class="destaque-card">
                <div class="esquerda-destaque">
                    <h1>Titulo<!--<?php echo $linha['tituloPublicacao'] ?>--></h1>
                    <small>Subtitulo<!--<?php echo $linha['descPublicacao'] ?>--></small>
                    <p>Para mais detalhes clique abaixo</p>

                    <a href="#"><button class="saiba-mais-btn">Saiba Mais</button></a>
                </div>
                <div class="direita-destaque">
                    
                </div> 
            </div>
            </div>
            <div class="indicadors-bar">
            <i aria-label="Previous" class="fa fa-chevron-left carousel-destaque-prev"></i>
            <div role="tablist" class="carousel-destaque-dots"></div>
            <i aria-label="Next" class="fa fa-chevron-right carousel-destaque-next"></i>
            
            </div>
        </div>
       

        <section class="cards-eventos">
            <h2>Eventos</h2>
            <div class="arrumar-cards carousel-evento">

                <div class="evento-card">
                    <div>
                        <h1>Evento</h1>
                        <small>Data: 06/06/2006</small>
                    </div>
                    <div>
                        <a href="#"><button>Saiba Mais</button></a>
                    </div>
                </div>

                <div class="evento-card">
                    <div>
                        <h1>Evento</h1>
                        <small>Data: 06/06/2006</small>
                    </div>
                    <div>
                        <a href="#"><button>Saiba Mais</button></a>
                    </div>
                </div>
                <div class="evento-card">
                    <div>
                        <h1>Evento</h1>
                        <small>Data: 06/06/2006</small>
                    </div>
                    <div>
                        <a href="#"><button>Saiba Mais</button></a>
                    </div>
                </div>
                <div class="evento-card">
                    <div>
                        <h1>Evento</h1>
                        <small>Data: 06/06/2006</small>
                    </div>
                    <div>
                        <a href="#"><button>Saiba Mais</button></a>
                    </div>
                </div>
                <div class="evento-card">
                    <div>
                        <h1>Evento</h1>
                        <small>Data: 06/06/2006</small>
                    </div>
                    <div>
                        <a href="#"><button>Saiba Mais</button></a>
                    </div>
                </div>


            </div>
            <div class="indicadors-bar">
            <i aria-label="Previous" class="fa fa-chevron-left carousel-evento-prev"></i>
            <div role="tablist" class="carousel-evento-dots"></div>
            <i aria-label="Next" class="fa fa-chevron-right carousel-evento-next"></i>
            </div>
        </section>
    </main>

    <div id="modalReset" class="modal modal-evento">
            
            <!-- Modal content -->
            <div class="modal-content">
                <div class="bg-modal-senha">
                    <div class="div-imagem">
                        <img src="../img/reset_senha.jpg" class="img-card">
                    </div>
                    <div class="title-modal">
                        <h1>RESETE SUA SENHA</h1>
                        <!-- <button><i class="fas fa-bookmark"></i> Tenho Interesse</button> -->
                    </div>
                    
                </div> 
                <div class="modal-text-description">
                    <div class="info-modal">
                        <h5>Primeiro Acesso ao Pai Coruja?</h5>
                    </div>
                    <h4>Identificamos que esse é seu primeiro login no nosso sistema, e, por segurança, pedimos para que você modifique sua senha de acesso!</h4>
                    <form name="formAttSenha" id="formAttSenha" method="POST" action="../DAO/reset-senha-acesso.php">
                        <div class="user-details slidePage">
                            <input type="hidden" id="idUsuario" name="idUsuario" value="<?php echo $idUsuario ?>">
                            <input type="hidden" value="<?php echo $_SESSION['primeiroAcesso'] ?>">
                            <div class="input-box-width100 divSenha">
                                <h5>Informe sua nova senha:</h5>
                                <label class="label-erro" id="label-senha1"></label>
                                <input type="password" name="txtSenha" id="txtSenha">
                            </div>
                            <div class="input-box-width100 divSenha">
                                <h5>Confirme a senha:</h5>
                                <label class="label-erro" id="label-senha2"></label>
                                <input type="password" name="txtConfirmarSenha" id="txtConfirmarSenha">
                            </div>
                            <div class="input-box-width100 divSenha">
                                <button class="btn-nav-exit nextBtnSkipTwo btn-page-next" type="submit">Trocar Senha</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>

    <script src="../assets/js/nav.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.js"></script>
    <script src="../assets/js/carousel.js"></script>
    <script src="../assets/js/modal.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        $(document).ready(function(){
            var modal = document.getElementById("modalReset");
            var primeiroAcesso = "<?php echo $_SESSION['primeiroAcesso'] ?>";
            if(primeiroAcesso === "V"){
                modal.classList.toggle("modal-active");
            }else{
                
            }
        });

        /*
        $(document).on('beforeunload', function (){
            var modal = document.getElementById("modalReset");
            var primeiroAcesso = "<?php echo $_SESSION['primeiroAcesso'] ?>";
            if(primeiroAcesso === "V"){
                modal.classList.toggle("modal-active");
                alert('<?php echo $_SESSION['primeiroAcesso'] ?>');
            }else{
                alert('<?php echo $_SESSION['primeiroAcesso'] ?>');
            }
        });
        */

        $('#formAttSenha').on('submit', function(e){
            var senha1 = $('#txtSenha').val();
            var senha2 = $('#txtConfirmarSenha').val();
            var senha1SemEspaco = senha1.trim();
            var senha2SemEspaco = senha2.trim();

            if (senha1.length == 0 || senha1SemEspaco == '') {
                $('#label-senha1').html('Por favor, preencha o campo de senha!');
                $('#txtSenha').addClass('erro-form');
                $('#label-senha1').show();
                $('#txtSenha').focus();
                setTimeout(function () {
                    $('#label-senha1').fadeOut(1);
                    $('#txtSenha').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
            if (senha2.length == 0 || senha2SemEspaco == '') {
                $('#label-senha2').html('Por favor, preencha o campo para confirmar a senha!');
                $('#txtConfirmarSenha').addClass('erro-form');
                $('#label-senha2').show();
                $('#txtConfirmarSenha').focus();
                setTimeout(function () {
                    $('#label-senha2').fadeOut(1);
                    $('#txtConfirmarSenha').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
            if (senha1 != senha2) {
                $('#label-senha1').html('Senhas não correspondentes!');
                $('#txtSenha').addClass('erro-form');
                $('#label-senha1').show();
                $('#txtSenha').focus();
                $('#label-senha2').html('Senhas não correspondentes!');
                $('#txtConfirmarSenha').addClass('erro-form');
                $('#label-senha2').show();
                $('#txtConfirmarSenha').focus();
                setTimeout(function () {
                    $('#label-senha1').fadeOut(1);
                    $('#txtSenha').removeClass('erro-form');
                    $('#label-senha2').fadeOut(1);
                    $('#txtConfirmarSenha').removeClass('erro-form');
                }, 5000);
                e.preventDefault();

            }
        });
    </script>

</body>



</html>