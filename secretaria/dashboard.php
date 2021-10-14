<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.css">

    <link rel="stylesheet" type="text/css"  href="../assets/css/style.css">



    <title>Home - Secretária</title>


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
                            <a href="cadastrar-d.php">
                                <i class="fas fa-school"></i>
                                <span class="links-name">Alterar Dados</span>
                            </a>
                        </li>
                        <li class="links-name">
                            <a href="cadastrar-turma.php">
                                <i class="fas fa-school"></i>
                                <span class="links-name">Gerenciar Eventos</span>
                            </a>
                        </li>
                        <li class="links-name">
                            <a href="cadastrar-turma.php">
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
                        <a href="#">
                            <i class="fas fa-user-cog"></i>
                            <span>Configurações</span>
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

        
    

    <main>
        
        
        
        <div class="container-dash">
            <div class="ola-nav-dash">
                <h1>Dashboard</h1>
            </div>

            <div class="container-dados-dash">
                <div class="acesso-rapido-dash">
                    <h4>Acesso Rápido</h4>
                    <div class="acesso-dash-btns">
                        <a href=""><button>Cadastrar Dados</button></a>
                        <a href=""><button>Cadastrar Dados</button></a>
                        <a href=""><button>Cadastrar Dados</button></a>
                        <a href=""><button>Cadastrar Dados</button></a>
                    </div>
                </div>
                <div class="dados-escolares-dash">
                    <h4>Dados Escolares</h4>
                    <div class="dados-escolares-container">
                        <div class="dados-escolares-linha">
                            <div class="dado-escolar">
                                <i class="fas fa-school"></i>
                                <div>
                                    <h3>888888</h3>
                                    <h5>Escolas Cadastradas</h5>
                                </div> 
                            </div>
                            <div class="dado-escolar">
                                <i class="fas fa-school"></i>
                                <div>
                                    <h3>8888</h3>
                                    <h5>Escolas Cadastradas</h5>
                                </div> 
                            </div> 
                        </div>
                        <div class="dados-escolares-linha">
                            <div class="dado-escolar">
                                <i class="fas fa-school"></i>
                                <div>
                                    <h3>8888</h3>
                                    <h5>Escolas Cadastradas</h5>
                                </div> 
                            </div>
                            <div class="dado-escolar">
                                <i class="fas fa-school"></i>
                                <div>
                                    <h3>8888</h3>
                                    <h5>Escolas Cadastradas</h5>
                                </div> 
                            </div> 
                        </div>
                        <div class="dados-escolares-linha">
                            <div class="dado-escolar">
                                <i class="fas fa-school"></i>
                                <div>
                                    <h3>8888</h3>
                                    <h5>Escolas Cadastradas</h5>
                                </div> 
                            </div>
                            <div class="dado-escolar">
                                <i class="fas fa-school"></i>
                                <div>
                                    <h3>8888</h3>
                                    <h5>Escolas Cadastradas</h5>
                                </div> 
                            </div> 
                        </div>
                        
                    </div>
                </div>
                <div class="msg-chat-dash">
                    <h4>Mensagens do Chat</h4>
                </div>
            </div>
            
            <div class="grafico-container-dash">
                dfgdfdfgdf
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

    <script src="../assets/js/nav.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.js"></script>
    <script src="../assets/js/carousel.js"></script>
</body>



</html>