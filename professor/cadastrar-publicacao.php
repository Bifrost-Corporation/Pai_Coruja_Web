<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css"  href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />

    <title>cadastrar - Publicação</title>


</head>

<body>
    <?php
        include("sentinela.php");
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
        <section class="top-section">
            <div class="voltar">
                <a href="home-professor.php">
                    <span class="fas fa-arrow-left"></span>Voltar
                </a>
            </div>
            <div class="titulo-cadastrar">
                <h2>Cadastrar Publicação:</h2>
            </div>
        </section>


        <section class="main-section">
            <form class="formulario" action="../DAO/inserir-publicacao.php" method="POST">
                <div class="user-details">
                    <div class="input-box-width100">
                        <h2>Título da Publicação:</h2>
                        <label class="label-erro" id="label-nome"></label>
                        <input name="txtNome" id="txtNome" type="text" placeholder="Insira o nome da Publicação">
                    </div>
                    <div class="input-box-width100">
                        <h2>Descrição da Publicação:</h2>
                        <label class="label-erro" id="label-descricao"></label>
                        <input name="txtDescricao" id="txtDescricao" type="text" placeholder="Insira a descrição...">
                    </div>

                    <div class="button">
                        <input type="submit" class="btn-nav-exit">
                    </div>
                </div>
            </form>
        </section>
    </main>

    <script src="../js/nav.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

    <script>
        jQuery('form').on('submit', function(e){
            var nome = $('#txtNome').val();
            var descricao = $('#txtDescricao').val();
            var nomeSemEspaco = nome.trim();
            var descricaoSemEspaco = descricao.trim();
            if(nome.length == 0 || nomeSemEspaco == ''){
                $('#label-nome').html('De um título a publicação!');
                $('#txtNome').addClass('erro-form');
                $('#label-nome').show();
                setTimeout(function () {
                    $('#label-nome').fadeOut(1);
                    $('#txtNome').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
            if(descricao.length == 0 || descricaoSemEspaco == ''){
                $('#label-descricao').html('Escreva uma descrição para a publicação!');
                $('#txtDescricao').addClass('erro-form');
                $('#label-descricao').show();
                setTimeout(function () {
                    $('#label-descricao').fadeOut(1);
                    $('#txtDescricao').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
            
        });
    </script>

</body>



</html>