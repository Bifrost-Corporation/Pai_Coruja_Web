<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../favicon.ico">
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
        include("../classes/Usuario.php");
        include("../classes/Responsavel.php");
        include ('../classes/ImagemResponsavel.php');

        $usuario = new Usuario();
        $responsavel = new Responsavel();
        $aluno = new Aluno();
        $turma = new Turma();

        $listaUsuario = $usuario->listar();
        $listaResponsavel = $responsavel->listarAlternativo();
        $listaAluno = $aluno->listar($_SESSION['idEscola']);
        $listaTurmas = $turma->listar($_SESSION['idEscola']);

        $imagemResponsavel = new ImagemResponsavel();
        $listaImagem = $imagemResponsavel->listarImagem($_SESSION['idResponsavel']);
        $listaMediaObservacoesAluno = $aluno->mediaObservacoes($_SESSION['idAluno']);

        
        $imagemPerfilsrc = "img/user.png";
        foreach($listaImagem as $linha){
            if($linha['idResponsavel'] == $_SESSION['idResponsavel']){
                foreach($listaUsuario as $linha2){
                    $imagemPerfilsrc = $linha['caminhoImagemPerfilResponsavel'].$linha['nomeImagemPerfilResponsavel'];
                }
            }
        }

        foreach($listaResponsavel as $linha){
            if($linha['idResponsavel'] == $_SESSION['idResponsavel']){
                foreach($listaUsuario as $linha2){
                    if($linha['idResponsavel'] == $linha2['idResponsavel']){
                        $idUsuario = $linha2['idUsuario'];
                    }
                }
            }
        }

        foreach($listaMediaObservacoesAluno as $linha){
            $mediaObservacoes = $linha['mediaPontosObservacoes'];
        }

        foreach($listaAluno as $linha){
            if($linha['idAluno'] == $_SESSION['idAluno']){
                foreach($listaTurmas as $linha2){
                    if($linha2['idTurma'] == $linha['idTurma']){
                        $nomeTurma = $linha2['nomeTurma'];
                    }
                }
            }
        }

        if($mediaObservacoes < 1){
            $mediaObservacoesEscrita = 'Anotação';
        }else if($mediaObservacoes > 1 && $mediaObservacoes < 2){
            $mediaObservacoesEscrita = 'Leve';
        }else if($mediaObservacoes > 2 && $mediaObservacoes < 3){
            $mediaObservacoesEscrita = 'Média';
        }else if($mediaObservacoes > 3 && $mediaObservacoes < 4){
            $mediaObservacoesEscrita = 'Grave';
        }else if($mediaObservacoes > 4 && $mediaObservacoes < 5){
            $mediaObservacoesEscrita = 'Muito Grave';
        }else if($mediaObservacoes > 5){
            $mediaObservacoesEscrita = 'Extremamente Grave';
        }else{
            $mediaObservacoesEscrita = 'Erro';
        }


    ?>
        <header>
            <nav class="nav-bar">
                <div class="content-logo-btn">
                    <ul class="ul-area-btn">
                        <li class="nav-li"><a class="btn-nav-pc-open"><i class="material-icons-round">menu</i></a></li>
                    </ul>
                    <a href="home-responsavel.php"><img class="logo-img" src="../img/pai_coruja_branca.png"></a>
                </div>
                <button class="profile">
                    <div class="profile-details" id="openProfile">
                        <img src="../<?php echo $imagemPerfilsrc ?>" alt="">
                    </div>
                </button>

                <div class="dropdown-menu-profile">
                    <div class="profile-details">
                        <img src="../<?php echo $imagemPerfilsrc ?>" alt="">
                        <div class="name-job">
                            <div class="name-menu"><?php echo $_SESSION['nomeResponsavel'] ?></div>
                            <small class="job-menu">Olá Responsável(a)</small>
                        </div>
                    </div>
                    <ul class="opcoes-drop-profile">
                        <!-- <li class="online-li">
                            <label for="">Online</label>
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider round"></span>
                            </label>
                        </li> -->
                        <li class="drop-profile-li" id="alterar-imagem-perfil">
                            <a href="#" onclick='window.history.pushState("object or string", "Title", "home-responsavel.php#ProfileEdit");;location.reload();'>
                                <i class="material-icons-round">manage_accounts</i>
                                <small>Trocar Imagem de Perfil <i class="material-icons-round">open_in_new</i></small>
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
                <h1>Olá <?php echo $_SESSION['nomeResponsavel'] ?></h1>
            </div>

            <div class="conteudo-responsavel">
                <div class="aluno-banner">
                    <div class="aluno-banner-left">
                        <h1><?php echo $_SESSION['nomeAluno'] ?></h1></h1>
                        <h5>Aluno do <?php echo $nomeTurma ?></h5>
                    </div>
                    <div class="aluno-banner-right">
                        <div class="mini-card-observacao">
                            <div>
                                <h3>Gravidade</h3>
                                <h5>Observação</h5>
                            </div>
                            <div>
                                <h2><?php echo $mediaObservacoesEscrita ?></h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="conteudo-container-responsavel">
                    <section class="cards-eventos">
                        <h2>Mural Digital</h2>

                        <div class="swiper carousel-evento-responsavel">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <!-- Slides -->
                                <?php
                                    $evento = new Evento();
                                    $listaEventos = $evento->listarEventosEscola($_SESSION['idEscola']);
                                    foreach($listaEventos as $linha){
                                ?>
                                    <div class="swiper-slide evento-card" id="evento-<?php echo $linha['idEvento'] ?>">
                                        <div class="content-img-evento">
                                        
                                        </div>
                                        <div class="content-evento-card">
                                        <small><i class="material-icons-round">event_note</i>Data: <?php echo date('d/m/Y', strtotime($linha['dataEvento'])) ?></small>
                                        <h1><?php echo $linha['tituloEvento'] ?></h1>
                                            
                                            
                                        </div>
                                        <div class="footer-evento-card">
                                            <button id="btn-modal-evento<?php echo $linha['idEvento'] ?>">Saiba Mais</button>
                                        </div>
                                    </div>
                                <?php
                                    }
                                    $publicacao = new Publicacao();
                                    $listaPublicacao = $publicacao->listarPublicacoes($_SESSION['idAluno'], $_SESSION['idEscola']);
                                    foreach($listaPublicacao as $linha){
                                ?>
                                    <div class="swiper-slide evento-card" id="publicacao-<?php echo $linha['idPublicacao'] ?>">
                                        <div class="content-img-evento">
                                        
                                        </div>
                                        <div class="content-evento-card">
                                            <h1><?php echo $linha['tituloPublicacao'] ?></h1>
                                        </div>
                                        <div class="footer-evento-card">
                                            <button id="btn-modal-publicacao<?php echo $linha['idPublicacao'] ?>">Saiba Mais</button>
                                        </div>
                                    </div>
                                <?php
                                    }
                                ?>


                            
                            </div>
                            <!-- If we need pagination -->
                            <div class="swiper-pagination"></div>

                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>

                            <!-- If we need scrollbar -->
                            <div class="swiper-scrollbar"></div>
                        </div> 

                        </div>
                    </section>
                </div>
            </div>
            
        
    </main>


    <div id="modalReset" class="modal modal-evento">
            
            <!-- Modal content -->
            <div class="modal-content">
                <div class="bg-modal-senha">
                    <div class="div-imagem">
                        <img src="../img/reset_senha.jpg" class="img-card">
                        <div style="padding:1rem; color: var(--cinzafonte)">
                            <h1>RESET SUA SENHA</h1>
                        </div>
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

    <div id="modalProfile" class="modal modal-profile">
            
            <!-- Modal content -->
        <div class="modal-content-profile">
            <div class="card-perfil">
                <span class="closeModalProfile"><i class="fas fa-times"></i></span>
                <div class="perfil-modal-body">
                    <img src="../<?php echo($imagemPerfilsrc) ?>" id="imgPerfilPreview" alt="Sua Foto de Perfil" style="align-self: center;box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.063);">
                    <div class="title-perfil-modal">
                        <h1><?php echo $_SESSION['nomeResponsavel'] ?></h1>
                        <small>Responsavel</small>
                        <small>Essa imagem será exibida para todos no Pai Coruja</small>
                    </div>
                    <form name="formImagemPerfil" id="formImagemPerfil" action="../DAO/inserir-imagem-responsavel.php" method="POST" class="botoes-perfil-upload" enctype="multipart/form-data">
                                    <label class="botao-cadastrar-perfil" for="imagemPerfil">Carregar Imagem Perfil</label>
                                    <input name="imagemPerfil" onchange="onFileSelected(event)" id="imagemPerfil" type="file" accept="image/*">
                                    <label class="label-erro" id="label-arquivo"></label>
                                    <span id="nome-arquivo"></span>
                        <button class="botao-cadastrar-perfil" type="submit" value="Enviar">Enviar</button>
                    </form> 
                </div>
                <script>

                        
                </script>
            </div>
        </div>

    </div>

    <!-- Modal de Evento -->
    <?php
        
        $imagemEvento = new ImagemEvento();
        foreach($listaEventos as $linha){
            $listaImagemEvento = $imagemEvento->selecionarImagemEvento($linha['idEvento']);
            foreach($listaImagemEvento as $linha2){
                $nomeImagemEvento = $linha2['nomeImagemEvento'];
                if($nomeImagemEvento != ""){
                    $caminhoImagemEvento = '../' . $linha2['caminhoImagemEvento'] . $linha2['nomeImagemEvento'];
                }else{
                    //Adicionar Imagem Padrão para os eventos
                    $caminhoImagemEvento = '../img/thumb-1920-941898.jpg';
                }
            }
    ?>
            <div id="modalEvento-<?php echo $linha['idEvento'] ?>" class="modal modal-evento">
                <div class="modal-content">
                        <span class="closeModal" id="fechar-evento<?php echo $linha['idEvento'] ?>"><i class="fas fa-times"></i></span>
                        <div class="bg-modal">
                            <img src="<?php echo $caminhoImagemEvento ?>" class="img-banner-modal-evento" alt="">
                            <div class="title-modal">
                                <h1><?php echo $linha['tituloEvento'] ?></h1>
                            </div>
                        </div>  
                    <div class="modal-text-description">
                        <div class="info-modal">
                            <h5>Data do evento: <?php echo date('d/m/Y', strtotime($linha['dataEvento'])) ?></h5>
                        </div>
                        <h4>Descrição</h4>
                        <p><?php echo $linha['descEvento'] ?></p>
                    </div>
                </div>
            </div>
    <?php
        }
    ?>

    <!-- Modal da Publicação -->
    <?php
        foreach($listaPublicacao as $linha){
    ?>
            <div id="modalPublicacao-<?php echo $linha['idPublicacao'] ?>" class="modal modal-evento">
                <div class="modal-content">
                    <span class="closeModal" id="fechar-publicacao<?php echo $linha['idPublicacao'] ?>"><i class="fas fa-times"></i></span>  
                    <div class="modal-text-description">
                        <div class="info-modal">
                            <h5>Informações da Publicação:</h5>
                        </div>
                        <h4>Descrição</h4>
                        <p><?php echo $linha['descPublicacao'] ?></p>
                    </div>
                </div>
            </div>
    <?php
        }
    ?>
    

    <script src="../assets/js/modalProfile.js"></script>
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

        //Funções dos modais de evento
        <?php
            foreach($listaEventos as $linha){
        ?>
        var modalEvento<?php echo $linha['idEvento'] ?> = document.getElementById("modalEvento-<?php echo $linha['idEvento'] ?>");

        $("#btn-modal-evento<?php echo $linha['idEvento'] ?>").on('click', function(){
            modalEvento<?php echo $linha['idEvento'] ?>.classList.toggle("modal-active");
        });

        $("#fechar-evento<?php echo $linha['idEvento'] ?>").on('click', function(){
            modalEvento<?php echo $linha['idEvento'] ?>.classList.toggle("modal-active");
        });

        window.onclick = function(event) {
            if (event.target == modalEvento<?php echo $linha['idEvento'] ?>) {
                modalEvento<?php echo $linha['idEvento'] ?>.classList.toggle("modal-active");
            }
        }
        <?php
            }
        ?>

        //Funções dos modais de publicação
        <?php
            foreach($listaPublicacao as $linha){
        ?>
        var modalPublicacao<?php echo $linha['idPublicacao'] ?> = document.getElementById("modalPublicacao-<?php echo $linha['idPublicacao'] ?>");
        
        $("#btn-modal-publicacao<?php echo $linha['idPublicacao'] ?>").on('click', function(){
            modalPublicacao<?php echo $linha['idPublicacao'] ?>.classList.toggle("modal-active");
        });

        $("fechar-publicacao<?php echo $linha['idPublicacao'] ?>").on('click', function(){
            modalPublicacao<?php echo $linha['idPublicacao'] ?>.classList.toggle("modal-active");
        });

        window.onclick = function(event) {
            if(event.target == modalPublicacao<?php echo $linha['idPublicacao'] ?>) {
                modalPublicacao<?php echo $linha['idPublicacao'] ?>.classList.toggle("modal-active");
            }
        }
        <?php
            }
        ?>

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
