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
    
  
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> 
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
                        <div class="name-menu"><?php echo $_SESSION['nomeResponsavel'] ?></div>
                            <small class="job-menu">Olá Responsavel</small>
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
                            <a href="home-responsavel.php" class="active-nav">
                                <i class="fas fa-calendar"></i>
                                <span class="links-name tooltip">Home</span>
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
                        <a href="agenda.php">
                            <i class="fas fa-calendar"></i>
                                <span class="links-name tooltip">Agenda Escolar</span>
                            </a>
                        </li>
                        <li class="links-name">
                            <a href="chat-responsavel.php" >
                            <i class="fa fa-comment" aria-hidden="true"></i>
                                <span class="links-name tooltip">Pai Coruja Chat</span>
                            </a>
                        </li>
                    </div>
                </ul>
                
            </div>
        </header>

        
    

    <main class="container-main">
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