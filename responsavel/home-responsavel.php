<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.css">
    
    <link rel="stylesheet" type="text/css"  href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css"  href="../assets/css/modal.css">
<!--     
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> -->
    <title>Home - Responsável</title>


</head>

<body>
    <?php
        include("sentinela.php");
        include("globalResponsavel.php");

        $usuario = new Usuario();
        $responsavel = new Responsavel();

        $listaUsuario = $usuario->listar();
        $listaResponsavel = $responsavel->listarAlternativo();

        foreach($listaResponsavel as $linha){
            if($linha['idResponsavel'] == $_SESSION['idResponsavel']){
                foreach($listaUsuario as $linha2){
                    if($linha['idResponsavel'] == $linha2['idResponsavel']){
                        $idUsuario = $linha2['idUsuario'];
                    }
                }
            }
        }
    ?>
        <header>
            <nav class="nav-bar">
                <div class="content-logo-btn">
                    <ul class="ul-area-btn">
                        <li class="nav-li"><a class="btn-nav-pc-open"><i class="fas fa-bars"></i></a></li>
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
                            <div class="name-menu"><?php echo $_SESSION['nomeSecretaria'] ?></div>
                            <small class="job-menu">Olá Secretário(a)</small>
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
                                <i class="fas fa-user-cog"></i>
                                <small>Trocar Imagem de Perfil</small>
                            </a>
                        </li>
                        <li class="drop-profile-li">
                            <a href="logout.php">
                                <i class="fas fa-sign-out-alt" id="logout-user"></i>
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
                            <a href="dashboard.php" class="active-nav">
                                <i class="fas fa-calendar"></i>
                                <span class="links-name tooltip">Dashboard</span>
                            </a>
                        </li>
                        <li class="links-name">
                            <a href="cadastrar-dados.php">
                                <i class="fas fa-school "></i>
                                <span class="links-name tooltip">Cadastrar Dados</span>
                            </a>
                        </li>
                        <li class="links-name">
                        <a href="visualizar-dados.php">
                                <i class="fas fa-school"></i>
                                <span class="links-name tooltip">Alterar Dados</span>
                            </a>
                        </li>
                        <li class="links-name">
                            <a href="cadastrar-evento.php">
                                <i class="fas fa-school"></i>
                                <span class="links-name tooltip">Gerenciar Eventos</span>
                            </a>
                        </li>
                        <li class="links-name">
                            <a href="chat-secretaria.php" >
                            <i class="fa fa-comment" aria-hidden="true"></i>
                                <span class="links-name tooltip">Pai Coruja Chat</span>
                            </a>
                        </li>
                    </div>
                </ul>
                
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

    <div class="nav-footer">
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
    </div>

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