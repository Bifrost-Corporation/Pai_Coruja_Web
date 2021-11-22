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
        include ('../classes/ImagemProfessor.php');

        $usuario = new Usuario();
        $professor = new Professor();

        $listaUsuario = $usuario->listar();
        $listaProfessor = $professor->listar();

        $imagemProfessor = new ImagemProfessor();
        $listaImagem = $imagemProfessor->listarImagem($_SESSION['idProfessor']);

        
        $imagemPerfilsrc = "img/user.png";
        foreach($listaImagem as $linha){
            if($linha['idProfessor'] == $_SESSION['idProfessor']){
                foreach($listaUsuario as $linha2){
                    $imagemPerfilsrc = $linha['caminhoImagemPerfilProfessor'].$linha['nomeImagemPerfilProfessor'];
                }
            }
        }
        
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
            <div class="content-logo-btn">
                    <ul class="ul-area-btn">
                        <li class="nav-li"><a class="btn-nav-pc-open"><i class="material-icons-round">menu</i></a></li>
                    </ul>
                    <a href="dashboard.php"><img class="logo-img" src="../img/pai_coruja_branca.png"></a>
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
                            <div class="name-menu"><?php echo $_SESSION['nomeProfessor'] ?></div>
                            <small class="job-menu">Olá Professor(a)</small>
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
                            <a href="#" onclick='window.history.pushState("object or string", "Title", "home-professor.php#ProfileEdit");;location.reload();'>
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
                            <a href="home-professor.php" class="active-nav">
                                <i class="material-icons-round">space_dashboard</i>
                                <span class="links-name tooltip">Dashboard</span>
                            </a>
                        </li>
                        <li class="links-name">
                            <a href="cadastrar-publicacao.php">
                                <i class="material-icons-round">notes</i>
                                <span class="links-name tooltip">Cadastrar Publicação</span>
                            </a>
                        </li>
                        <li class="links-name">
                        <a href="cadastrar-flags.php">
                            <i class="material-icons-round">sticky_note_2</i>
                                <span class="links-name tooltip">Cadastrar Observações</span>
                            </a>
                        </li>
                        <li class="links-name">
                            <a href="chat-professor.php" >
                                <i class="material-icons-round">chat_bubble</i>
                                <span class="links-name tooltip">Pai Coruja Chat</span>
                            </a>
                        </li>
                    </div>
                </ul>
                
            </div>
        </header>


    <main class="container-main">
    <div class="container-dash">
            <div class="ola-nav-dash">
                <h1>Olá Professor</h1>
            </div>



                <div class="conteudo-container-professor">
                    <div class="informacoes-professor">
                        <div class="mini-perfil-professor">
                            <img src="../<?php echo $imagemPerfilsrc ?>" alt="">
                        </div>
                        <div class="detalhes-professor">
                            <div>
                                <h2><?php echo $_SESSION['nomeProfessor'] ?></h2>
                                <small>Bem Vindo de Volta!</small>
                            </div>
                            <p><strong>Nome: </strong><?php echo $_SESSION['nomeProfessor'] ?></p>
                            <p><strong>Email: </strong><?php echo $_SESSION['emailProfessor'] ?></p>
                            <p><strong>Escola: </strong>Escolinha do clodo</p>
                        </div>
                        <!-- <small>Para alterar algum dado entre em contatocom a secretaria</small> -->
                    </div>

                    <section class="agenda-professor">
                        
                        <div class="container-agenda-large">
                            <div class="header-container-agenda-large">
                            <i class="material-icons-round">article</i>
                                <h1>Sua Agenda Escolar </h1>
                            </div>
                            <div class="content-agenda-large">
                                <table>
                                    <thead>
                                        <tr>
                                            <td>Segunda-Feira</td>
                                            <td>Terça-Feira</td>
                                            <td>Quarta-Feira</td>
                                            <td>Quinta-Feira</td>
                                            <td>Sexta-Feira</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Matematica</td>
                                            <td>Português</td>
                                            <td>Ciências</td>
                                            <td>Filosofia</td>
                                            <td>Naruto</td>
                                        </tr>
                                        <tr>
                                            <td>Matematica</td>
                                            <td>Português</td>
                                            <td>Ciências</td>
                                            <td>Filosofia</td>
                                            <td>Naruto</td>
                                        </tr>
                                        <tr>
                                            <td>Matematica</td>
                                            <td>Português</td>
                                            <td>Ciências</td>
                                            <td>Filosofia</td>
                                            <td>Naruto</td>
                                        </tr>
                                        <tr>
                                            <td>Matematica</td>
                                            <td>Português</td>
                                            <td>Ciências</td>
                                            <td>Filosofia</td>
                                            <td>Naruto</td>
                                        </tr>
                                        <tr>
                                            <td>Matematica</td>
                                            <td>Português</td>
                                            <td>Ciências</td>
                                            <td>Filosofia</td>
                                            <td>Naruto</td>
                                        </tr>
                                        <tr>
                                            <td>Matematica</td>
                                            <td>Português</td>
                                            <td>Ciências</td>
                                            <td>Filosofia</td>
                                            <td>Naruto</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>




                        <div class="container-agenda">
                            <div class="header-container-agenda">
                            <i class="material-icons-round">article</i> 
                            <h2>Agenda Escolar</h2>
                            </div>
                            <div class="content-ul-agenda">
                                <ul>
                                    <div class="title-day">
                                    <p>Segunda-feira</p><i class="material-icons-round">unfold_more</i>
                                    </div>
                                    <li><p>Matematica</p>Aula 1</li>
                                    <li><p>Matematica</p>Aula 2</li>
                                    <li><p>Matematica</p>Aula 3</li>
                                    <li><p>Matematica</p>Aula 4</li>
                                    <li><p>Matematica</p>Aula 5</li>
                                    <li><p>Matematica</p>Aula 6</li>
                                </ul>
                                <ul>
                                    <div class="title-day">
                                    <p>Terça-feira</p><i class="material-icons-round">unfold_more</i>
                                    </div>
                                    <li><p>Matematica</p>Aula 1</li>
                                    <li><p>Matematica</p>Aula 2</li>
                                    <li><p>Matematica</p>Aula 3</li>
                                    <li><p>Matematica</p>Aula 4</li>
                                    <li><p>Matematica</p>Aula 5</li>
                                    <li><p>Matematica</p>Aula 6</li>
                                </ul>
                                <ul>
                                    <div class="title-day">
                                    <p>Quarta-feira</p><i class="material-icons-round">unfold_more</i>
                                    </div>
                                    <li><p>Matematica</p>Aula 1</li>
                                    <li><p>Matematica</p>Aula 2</li>
                                    <li><p>Matematica</p>Aula 3</li>
                                    <li><p>Matematica</p>Aula 4</li>
                                    <li><p>Matematica</p>Aula 5</li>
                                    <li><p>Matematica</p>Aula 6</li>
                                </ul>
                                <ul>
                                    <div class="title-day">
                                    <p>Quinta-feira</p><i class="material-icons-round">unfold_more</i>
                                    </div>
                                    <li><p>Matematica</p>Aula 1</li>
                                    <li><p>Matematica</p>Aula 2</li>
                                    <li><p>Matematica</p>Aula 3</li>
                                    <li><p>Matematica</p>Aula 4</li>
                                    <li><p>Matematica</p>Aula 5</li>
                                    <li><p>Matematica</p>Aula 6</li>
                                </ul>
                                <ul>
                                    <div class="title-day">
                                    <p>Sexta-feira</p><i class="material-icons-round">unfold_more</i>
                                    </div>
                                    <li><p>Matematica</p>Aula 1</li>
                                    <li><p>Matematica</p>Aula 2</li>
                                    <li><p>Matematica</p>Aula 3</li>
                                    <li><p>Matematica</p>Aula 4</li>
                                    <li><p>Matematica</p>Aula 5</li>
                                    <li><p>Matematica</p>Aula 6</li>
                                </ul>
                                
                                
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            
        </div>
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


    <div id="modalProfile" class="modal modal-profile">
            
            <!-- Modal content -->
        <div class="modal-content-profile">
            <div class="card-perfil">
                <span class="closeModalProfile"><i class="fas fa-times"></i></span>
                <div class="perfil-modal-body">
                    <img src="../<?php echo($imagemPerfilsrc) ?>" id="imgPerfilPreview" alt="Sua Foto de Perfil" style="align-self: center;box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.063);">
                    <div class="title-perfil-modal">
                        <h1><?php echo $_SESSION['nomeProfessor'] ?></h1>
                        <small>Professor(a)</small>
                        <small>Essa imagem será exibida para todos no Pai Coruja</small>
                    </div>
                    <form name="formImagemPerfil" id="formImagemPerfil" action="../DAO/inserir-imagem-professor.php" method="POST" class="botoes-perfil-upload" enctype="multipart/form-data">
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

    <script src="../assets/js/modalProfile.js"></script>
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