<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />

    <title>cadastrar - Publicação</title>


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
                        <a href="cadastrar-flags.php">
                            <i class="fas fa-school"></i>
                            <span class="links-name">Cadastrar Observação</span>
                        </a>
                    </li>
                    <li class="links-name drop-link">
                        <a href="cadastrar-publicacao.php">
                            <i class="fas fa-school"></i>
                            <span class="links-name">Cadastrar Publicação</span>
                        </a>
                    </li>
                    
                </div>
                
            </ul>
            <div class="profile-content">
                <div class="profile">
                    <div class="profile-details">
                        <img src="../img/usuario-de-perfil.png" alt="">
                        <div class="name-job">
                            <div class="name-menu"><?php echo $_SESSION['nomeProfessor'] ?></div>
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
                <a href="#">
                    <span class="fas fa-arrow-left"></span>Voltar
                </a>
            </div>
            <div class="titulo-cadastrar">
                <h2>Cadastrar Publicação:</h2>
            </div>
        </section>


        <section class="main-section">
            <form class="formulario" action="#" method="#">
                <div class="user-details">
                    <div class="input-box-width100">
                        <h2 class="h2Adicionar">Adicionar imagem<span>
                                <p>Nota: não é obrigatória a imagem na publicação...</p>
                            </span>
                        </h2>
                        <div>
                            <label class="carregar-imagem-pub" for="arquivo">Arquivo</label>
                            <input name="arquivo" id="arquivo" type="file">
                        </div>
                    </div>
                    <div class="input-box-width100">
                        <h2>Nome da Publicação:</h2>
                        <input name="name" type="text" placeholder="Insira o nome da Publicação" required>
                    </div>
                    <div class="input-box-width100">
                        <h2>Descrição da Publicação:</h2>
                        <input name="name" type="text" placeholder="Insira a descrição..." required>
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
</body>



</html>