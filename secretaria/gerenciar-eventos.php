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
    <link rel="stylesheet" type="text/css"  href="../assets/css/modal.css">



    <title>Chat - Secretária</title>


</head>

<body>
    <?php
        include ('sentinela.php');
        include ('globalSecretaria.php');
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
                            <div class="name-menu"><?php echo $_SESSION['nomeSecretaria'] ?></div>
                            <small class="job-menu">Olá Secretário(a)</small>
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
                            <a href="dashboard.php">
                                <i class="material-icons-round">space_dashboard</i>
                                <span class="links-name tooltip">Dashboard</span>
                            </a>
                        </li>
                        <li class="links-name">
                            <a href="cadastrar-dados.php">
                                <i class="material-icons-round">app_registration</i>
                                <span class="links-name tooltip">Cadastrar Dados</span>
                            </a>
                        </li>
                        <li class="links-name">
                        <a href="visualizar-dados.php">
                            <i class="material-icons-round">view_list</i>
                                <span class="links-name tooltip">Alterar Dados</span>
                            </a>
                        </li>
                        <li class="links-name">
                            <a href="cadastrar-evento.php" class="active-nav">
                                <i class="material-icons-round">edit_calendar</i>
                                <span class="links-name tooltip">Gerenciar Eventos</span>
                            </a>
                        </li>
                        <li class="links-name">
                            <a href="chat-secretaria.php" >
                                <i class="material-icons-round">chat</i>
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
                <h1>Dashboard</h1>
            </div>
            <div class="gerenciar-eventos">
                <div class="gerenciar-eventos-esquerda">
                    <h4>Cadastrar Evento</h4>
                    <div class="evento-card">
                            <div>
                                <input type="text" placeholder="Titulo">
                                <input type="text" placeholder="data do evento">
                            </div>
                            <div>
                                <a href="#"><button>Saiba Mais</button></a>
                            </div>
                        </div>
                </div>
                <div class="gerenciar-eventos-direita">
                    <h4>Eventos Recentemente Cadastrados</h4>
                    <div>
                        <div class="evento-card">
                            <div>
                                <h1>Evento</h1>
                                <small>Data: 06/06/2006</small>
                            </div>
                            <div>
                                <button id="btnOpenModal">Saiba Mais</button>
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
                </div>
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
    
    <div id="myModal" class="modal modal-evento">
            
            <!-- Modal content -->
        <div class="modal-content">
                <span class="closeModal"><i class="fas fa-times"></i></span>
                <div class="bg-modal">
                    <div class="title-modal">
                        <h1>Um Evento Legal</h1>
                        <!-- <button><i class="fas fa-bookmark"></i> Tenho Interesse</button> -->
                    </div>
                    
                </div>  
            <div class="modal-text-description">
                <div class="info-modal">
                    <h5>Data do Evento: 04/04/2004</h5>
                </div>
                <h4>Descrição</h4>
                <p> 45vy h 5g45y  4 y 5y 5 qe dfweferg rgrgrgegergerg gre re hr her rer t tts ry 45t 45y  fg fgdf gf g ergr gregregrgregrgr eg rgh 54y5y 4h5hky h 5g45y  4 y 5y 5 qe dfweferg rgrgrgegergerg gre re hr her rer t tts ry 45t 45y  fg fgdf gf g ergr gregregrgregrgr eg rgh 54y5y 4h5hky h 5g45y  4 y 5y 5 qe dfweferg rgrgrgegergerg gre re hr her rer t tts ry 45t 45y  fg fgdf gf g ergr gregregrgregrgr eg rgh 54y5y 4h5hky h 5g45y  4 y 5y 5 qe dfweferg rgrgrgegergerg gre re hr her rer t tts ry 45t 45y  fg fgdf gf g ergr gregregrgregrgr eg rgh 54y5y 4h5hky h 5g45y  4 y 5y 5 qe dfweferg rgrgrgegergerg gre re hr her rer t tts ry 45t 45y  fg fgdf gf g ergr gregregrgregrgr eg rgh 54y5y 4h5hkwrj jhrt hsrjg ergçjerlgelrjg elrjg ergerhbg jerg eralgherrg34 g erjg jerh gjer g erg erg reghera a  aeg r grejl gerr gre gerlgjgr jlg jgrj <strong>marcos</strong>  berhgerhgebrglerjbg</p>
            </div>
        </div>

    </div>

    <script src="../assets/js/modal.js"></script>
    <script src="../assets/js/nav.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.js"></script>
    <script src="../assets/js/carousel.js"></script>
</body>



</html>