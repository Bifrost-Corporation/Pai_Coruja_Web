<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />

    <title>Home - Responsável</title>


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

        <div class="profile-content">
                <div class="profile">
                    <div class="close-mobile-navbar">
                        <a class="btn-nav-close"><i class="fas fa-arrow-left"></i></a>
                    </div>
                    <div class="profile-img">
                        <img src="../img/macos.png" alt="">
                    </div>
                    
                </div>
                <div class="profile-details">
                    <div class="name-job">
                        <div class="name-menu"><?php echo $_SESSION['nomeResponsavel'] ?></div>
                        <div class="job-menu">Olá Responsável</div>
                    </div>
                    <div class="profile-buttons">
                        <div class="profile-logout">
                            <a href="logout.php">
                                <i class="fas fa-sign-out-alt" id="logout-user"></i>
                            </a>
                            <a href="cadastrar-imagem-perfil.php">
                                <i class="fas fa-camera"></i>
                            </a>

                        </div>
                    </div>
                </div>
                
            </div>

            <div class="logo-content web-pc">
                <div class="logo">
                    <div class="logo-name "><a href="home-responsavel.php"><img src="../img/pai_coruja_branca.png"></a>
                    </div>
                    
                </div>
            </div>
            <ul class="nav-list web-pc">
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
                        <a href="home-responsavel.php">
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
            </ul>
            <ul class="nav-list web-pc">  
                <li>
                    <a onclick="openMenu2()" id="sub-menu-button-2">
                        <div>
                            <i class="fas fa-user-shield"></i>
                            <span class="links-name">Outras Opções</span>
                        </div>
                        <i class="fas fa-caret-down" class="dropdown-icon"></i>
                    </a>
                </li>
                <div class="drop-menu" id="sub-menu-2">
                    <li class="links-name drop-link">
                        <a href="cadastrar-imagem-perfil.php">
                            <i class="fas fa-school"></i>
                            <span class="links-name">Alterar Imagem Perfil</span>
                        </a>
                    </li>
                </div>

            </ul>
            <div class="user-details-menu">
                <h5>Responsável por:</h5>
                <p>Vinciso mararal</p>
                <p>Douglas Nascimento</p>

                <h5>Email:</h5>
                <p>pai@gmail.com</p>

                <h5>Endereço</h5>
                <p>papapapapp rua dos og 777</p>
            </div>
        </div>
       
    </div>

    </header>


    <main class="container-main">
        <section class="destaque-card">
            <div class="esquerda-destaque">
                <h1>Novidade 1</h1>
                <small>Subtítulo</small>
                <p>Para mais detalhes clique abaixo</p>

                <a href="#"><button class="saiba-mais-btn">Saiba Mais</button></a>
            </div>
            <div class="direita-destaque">

            </div>
        </section>

        <section class="cards-eventos">
            <h2>Eventos</h2>
            <div class="arrumar-cards">

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

    <script src="../js/nav.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
</body>



</html>