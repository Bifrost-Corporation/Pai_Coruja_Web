<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.css">
    
    <link rel="stylesheet" type="text/css"  href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css"  href="../assets/css/modal.css">
    
  
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> 
    <title>Agenda - Responsável</title>


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

        $listaUsuario = $usuario->listar();
        $listaResponsavel = $responsavel->listarAlternativo();

        $listaHorarioTurmaSegunda = $responsavel->selecionarHorarioTurma($_SESSION['idResponsavel'], 1);
        $listaHorarioTurmaTerca = $responsavel->selecionarHorarioTurma($_SESSION['idResponsavel'], 2);
        $listaHorarioTurmaQuarta = $responsavel->selecionarHorarioTurma($_SESSION['idResponsavel'], 3);
        $listaHorarioTurmaQuinta = $responsavel->selecionarHorarioTurma($_SESSION['idResponsavel'], 4);
        $listaHorarioTurmaSexta = $responsavel->selecionarHorarioTurma($_SESSION['idResponsavel'], 5);

        foreach($listaResponsavel as $linha){
            if($linha['idResponsavel'] == $_SESSION['idResponsavel']){
                foreach($listaUsuario as $linha2){
                    if($linha['idResponsavel'] == $linha2['idResponsavel']){
                        $idUsuario = $linha2['idUsuario'];
                    }
                }
            }
        }

        $imagemResponsavel = new ImagemResponsavel();
        $listaImagem = $imagemResponsavel->listarImagem($_SESSION['idResponsavel']);

        
        $imagemPerfilsrc = "img/user.png";
        foreach($listaImagem as $linha){
            if($linha['idResponsavel'] == $_SESSION['idResponsavel']){
                foreach($listaUsuario as $linha2){
                    $imagemPerfilsrc = $linha['caminhoImagemPerfilResponsavel'].$linha['nomeImagemPerfilResponsavel'];
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
                            <a href="home-responsavel.php#ProfileEdit">
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
                            <a href="home-responsavel.php">
                                <i class="material-icons-round">home</i>
                                <span class="links-name tooltip">Home</span>
                            </a>
                        </li>
                        <li class="links-name">
                            <a href="agenda.php" class="active-nav">
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
        <section class="content-agenda-calendario">
            
            <div class="container-agenda-large">
                <div class="header-container-agenda-large">
                <i class="material-icons-round">article</i>
                    <h1>Agenda Escolar </h1>
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
                            <?php 
                                foreach($listaHorarioTurmaSegunda as $linha){
                            ?>
                                <td><?php echo $linha['nomeDisciplina'] ?></td>
                            <?php
                                }
                            ?>
                            </tr>
                            <tr>
                            <?php 
                                foreach($listaHorarioTurmaTerca as $linha){
                            ?>
                                <td><?php echo $linha['nomeDisciplina'] ?></td>
                            <?php
                                }
                            ?>
                            </tr>
                            <tr>
                            <?php 
                                foreach($listaHorarioTurmaQuarta as $linha){
                            ?>
                                <td><?php echo $linha['nomeDisciplina'] ?></td>
                            <?php
                                }
                            ?>
                            </tr>
                            <tr>
                            <?php 
                                foreach($listaHorarioTurmaQuinta as $linha){
                            ?>
                                <td><?php echo $linha['nomeDisciplina'] ?></td>
                            <?php
                                }
                            ?>
                            </tr>
                            <tr>
                            <?php 
                                foreach($listaHorarioTurmaSexta as $linha){
                            ?>
                                <td><?php echo $linha['nomeDisciplina'] ?></td>
                            <?php
                                }
                            ?>
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
    </main>


    <div id="modalProfile" class="modal modal-profile">
            
            <!-- Modal content -->
        <div class="modal-content-profile">
            <div class="card-perfil">
                <span class="closeModalProfile"><i class="fas fa-times"></i></span>
                <div class="perfil-modal-body">
                    <img src="../img/usuario-de-perfil.png" alt="Sua Foto de Perfil" style="align-self: center;">
                    <div>
                        <h1><?php echo $_SESSION['nomeSecretaria'] ?></h1>
                        <small>Secretário(a) Escolar</small>
                    </div>
                    <form class="formulario" name="formImagemPerfil" id="formImagemPerfil" action="../DAO/inserir-imagem-secretaria.php" method="POST" enctype="multipart/form-data">
                        <div class="user-details">
                            <div class="input-box-width100">
                                <label class="label-erro" id="label-foto"></label>
                                <div>
                                    <label class="carregar-imagem-perfil" for="arquivo">Carregar Imagem Perfil</label>
                                    <input name="arquivo" id="arquivo" type="file" accept="image/*">
                                    <label class="label-erro" id="label-arquivo"></label>
                                    <span id="nome-arquivo"></span>
                                </div>
                            </div>
                        </div>
                        <br>
                        <input class="btn-nav-exit cadastrar-prof-step" type="submit" value="Enviar">
                    </form> 
                </div>
                
            </div>
        </div>

    </div>


    <script src="../assets/js/nav.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.js"></script>
    <script src="../assets/js/carousel.js"></script>
    <script src="../assets/js/modal.js"></script>

    <script>
        /*$(document).ready(function(){
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