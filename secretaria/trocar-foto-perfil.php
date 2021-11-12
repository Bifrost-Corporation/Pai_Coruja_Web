<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.css">

    <link rel="stylesheet" type="text/css"  href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css"  href="../assets/css/chat.css">
    <link rel="stylesheet" type="text/css"  href="../assets/css/foto-perfil.css">



    <title>Chat - Secretária</title>


</head>

<body>
    <?php
        include ('sentinela.php');
        include ('globalSecretaria.php');
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
                <a href="dashboard.php">
                    <i class="fas fa-calendar"></i>
                    <span class="links-name">Dashboard</span>
                </a>
            </li>
            <li class="links-name">
                <a href="cadastrar-dados.php">
                    <i class="fas fa-school"></i>
                    <span class="links-name">Cadastrar Dados</span>
                </a>
            </li>
            <li class="links-name">
            <a href="visualizar-dados.php">
                    <i class="fas fa-school"></i>
                    <span class="links-name">Alterar Dados</span>
                </a>
            </li>
            <li class="links-name">
                <a href="cadastrar-evento.php">
                    <i class="fas fa-school"></i>
                    <span class="links-name">Gerenciar Eventos</span>
                </a>
            </li>
            <li class="links-name">
                <a href="chat-secretaria.php">
                    <i class="fas fa-school"></i>
                    <span class="links-name">Pai Coruja Chat</span>
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
            <a href="trocar-foto-perfil.php">
                <i class="fas fa-user-cog"></i>
                <span>Foto de perfil</span>
            </a>
        </div>
        <div class="profile">
            <div class="profile-details">
                <img src="../img/usuario-de-perfil.png" alt="">
                <div class="name-job">
                    <div class="name-menu"><?php echo $_SESSION['nomeSecretaria'] ?></div>
                    <div class="job-menu">Olá Secretário(a)</div>
                </div>
            </div>
        </div>
    </div>
</div>
</header>

        <main class="container-dash">
            <div class="card-perfil">
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

    <script src="../assets/js/nav.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.js"></script>

    <script src="../assets/js/carousel.js"></script>
    <script>

        var $input = document.getElementById('arquivo'),
        $fileName = document.getElementById('nome-arquivo');

        $input.addEventListener('change', function(){
            $fileName.textContent = this.value;
        });

        jQuery('form').on('submit', function(e){
            var nomeArquivo = $('#arquivo').val();
            var nomeArquivoSemEspaco = nomeArquivo.trim();
            if(nomeArquivo.length == 0 || nomeArquivoSemEspaco == ''){
                $('#label-arquivo').html('Selecione um arquivo!');
                $('#arquivo').addClass('erro-form');
                $('#label-arquivo').show();
                setTimeout(function () {
                    $('#label-arquivo').fadeOut(1);
                    $('#arquivo').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
        });
        
    </script>
</body>



</html>