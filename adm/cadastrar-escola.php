<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />

    <title>Cadastrar Escola</title>


</head>

<body>
    <?php
        include("sentinela.php");
    ?>
    <header>

<!-- <nav class="nav-bar">
    <a href=""><img class="logo" src="../img/pai_coruja_3.png"></a>
    <ul class="ul-area-btn">
        <li class="nav-li"><a class="btn-nav-exit" href="logout.php">Sair</a></li>
    </ul>
</nav> -->

<div class="sidebar">
    <div class="logo-content">
        <div class="logo">
            <div class="logo-name"><a href=""><img src="../img/pai_coruja_branca.png"></a></div>
        </div>
    </div>
    <ul class="nav-list">
        <li>
            <a onclick="openMenu()" id="sub-menu-button">
                <div>
                    <i class="fas fa-chart-pie"></i>                        
                <span class="links-name">Visão Geral</span>
                </div>
                <i class="fas fa-caret-down" class="dropdown-icon"></i>
            </a>
        </li>
        <div class="drop-menu" id="sub-menu">
            <li class="links-name drop-link">
                <a href="#">
                    <i class="fas fa-calendar"></i>
                    <span class="links-name">Mural</span>
                </a>
            </li>
            <li class="links-name drop-link">
                <a href="#">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <span class="links-name">Avaliação dos Professores</span>
                </a>
            </li>
            <li class="links-name drop-link">
                <a href="#">
                    <i class="fas fa-calendar-day"></i>
                    <span class="links-name">Eventos Programados</span>
                </a>
            </li>
        </div>


        <li>
            <a onclick="openMenu2()" id="sub-menu-button-2">
                <div>
                    <i class="fas fa-user-shield"></i>                      
                <span class="links-name">Administrador</span>
                </div>
                <i class="fas fa-caret-down" class="dropdown-icon"></i>
            </a>
        </li>
        <div class="drop-menu" id="sub-menu-2">
            <li class="links-name drop-link">
                <a href="cadastrar-escola.php">
                    <i class="fas fa-school"></i>
                    <span class="links-name">Cadastrar Escola</span>
                </a>
            </li>
            <li class="links-name drop-link">
                <a href="cadastrar-secretaria.php">
                    <i class="fas fa-school"></i>
                    <span class="links-name">Cadastrar Secretária</span>
                </a>
            </li>
            
        </div>
        
    </ul>
    <div class="profile-content">
        <div class="profile">
            <div class="profile-details">
                <img src="../img/usuario-de-perfil.png" alt="">
                <div class="name-job">
                    <div class="name-menu"><?php echo $_SESSION['nomeSecretaria'] ?></div>
                    <div class="job-menu">Olá Secretário(a)</div>
                </div>
            </div>
            <i class="fas fa-sign-out-alt" id="logout-user"></i>
        </div>
    </div>
</div>

</header>


    <main class="container-main">


        <section class="top-section">
            <div class="voltar">
                <a href="home-adm.php">
                    <span class="fas fa-arrow-left"></span>Voltar
                </a>
            </div>
            <div class="titulo-cadastrar">
                <h2>Cadastrar Escola:</h2>
            </div>
        </section>


        <section class="main-section">
            <form name="nomeEscola" class="formulario" method="POST" action="../DAO/inserir-escola.php">
                <div class="user-details">
                    <div class="input-box-width100">
                        <h2>Nome da Escola: </h2>
                        <label class="label-erro" id="label-escola"></label>
                        <input name="txtNomeEscola" id="txtNomeEscola" type="text" placeholder="Insira o nome da escola">
                    </div>
                    <div class="button">
                        <input type="submit" class="btn-nav-exit" value="Cadastrar">
                    </div>
                </div>
            </form>
        </section>
    </main>

    <script src="../js/nav.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        jQuery('form').on('submit',function (e){
            var nomeEscola = $('#txtNomeEscola').val();
            if(nomeEscola.length == 0){
                $('#label-escola').html('Por favor, preencha o campo de nome da escola!');
                $('#txtNomeEscola').addClass('erro-form');
                $('#label-escola').show();
                e.preventDefault();
            }
        });
    </script>

</body>



</html>