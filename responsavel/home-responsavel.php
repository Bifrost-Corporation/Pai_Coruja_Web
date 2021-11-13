<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
    
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
                            <div class="name-menu"><?php echo $_SESSION['nomeResponsavel'] ?></div>
                            <small class="job-menu">Olá Responsável(a)</small>
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
                            <a href="home-responsavel.php" class="active-nav">
                                <i class="material-icons-round">home</i>
                                <span class="links-name tooltip">Home</span>
                            </a>
                        </li>
                        <li class="links-name">
                            <a href="agenda.php">
                                <i class="material-icons-round">article</i>
                                <span class="links-name tooltip">Agenda Escolar</span>
                            </a>
                        </li>
                        <li class="links-name">
                        <a href="observacao-professor.php">
                            <i class="material-icons-round">flag</i>
                                <span class="links-name tooltip">Observações dos Professores</span>
                            </a>
                        </li>
                        <li class="links-name">
                            <a href="chat-responsavel.php" >
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
                <h1>Olá Responsável</h1>
            </div>

            <div class="alternar-alunos-container">
                <span>Alternar Alunos</span>
                <div class="alternar-alunos-tab-flex">
                    <div class="alternar-alunos-tab" >
                        <img src="../img/Tony_Tony_Chopper_Anime_Pre_Timeskip_Infobox.png" alt="aluno">
                        <div class="alternar-alunos-tab-title">
                            <h5>Aluno 1</h5>
                        </div>
                    </div>
                    <div class="alternar-alunos-tab">
                        <img src="../img/macos.png" alt="aluno">
                        <div class="alternar-alunos-tab-title">
                            <h5>Aluno 2</h5>
                        </div>
                    </div>
                </div>
            </div>


            <div class="conteudo-responsavel">
                <div class="aluno-banner">
                    <div class="aluno-banner-left">
                        <h1>Clodoaldo da Silva Ribeiro</h1></h1>
                        <h5>Aluno do 3°a</h5>
                    </div>
                    <div class="aluno-banner-right">
                        <div class="mini-card-observacao">
                            <div>
                                <h3>Gravidade</h3>
                                <h5>Observação</h5>
                            </div>
                            <div>
                                <h2>Boa</h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="conteudo-container-responsavel">
                    <section class="cards-eventos">
                        <h2>Eventos</h2>

                        <div class="swiper carousel-evento-responsavel">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <!-- Slides -->
                            <div class="swiper-slide evento-card">
                                <div>
                                    <h1>Evento</h1>
                                    <small>Data: 06/06/2006</small>
                                </div>
                                <div>
                                    <a href="#"><button>Saiba Mais</button></a>
                                </div>
                            </div>
                            <div class="swiper-slide evento-card">
                                <div>
                                    <h1>Evento</h1>
                                    <small>Data: 06/06/2006</small>
                                </div>
                                <div>
                                    <a href="#"><button>Saiba Mais</button></a>
                                </div>
                            </div>
                            <div class="swiper-slide evento-card">
                                <div>
                                    <h1>Evento</h1>
                                    <small>Data: 06/06/2006</small>
                                </div>
                                <div>
                                    <a href="#"><button>Saiba Mais</button></a>
                                </div>
                            </div>
                            <div class="swiper-slide evento-card">
                                <div>
                                    <h1>Evento</h1>
                                    <small>Data: 06/06/2006</small>
                                </div>
                                <div>
                                    <a href="#"><button>Saiba Mais</button></a>
                                </div>
                            </div>
                            <div class="swiper-slide evento-card">
                                <div>
                                    <h1>Evento</h1>
                                    <small>Data: 06/06/2006</small>
                                </div>
                                <div>
                                    <a href="#"><button>Saiba Mais</button></a>
                                </div>
                            </div>
                            <div class="swiper-slide evento-card">
                                <div>
                                    <h1>Evento</h1>
                                    <small>Data: 06/06/2006</small>
                                </div>
                                <div>
                                    <a href="#"><button>Saiba Mais</button></a>
                                </div>
                            </div>


                            
                            </div>
                            <!-- If we need pagination -->
                            <div class="swiper-pagination"></div>

                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>

                            <!-- If we need scrollbar -->
                            <div class="swiper-scrollbar"></div>
                            </div> 


                        <!--<div class="arrumar-cards carousel-evento">

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
                        </div>-->
                    </section>
                </div>
            </div>
            
        
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
    

<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    
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