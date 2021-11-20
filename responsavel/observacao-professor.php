<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
    
    <link rel="stylesheet" type="text/css"  href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css"  href="../assets/css/modal.css">
<!--     
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> -->
    <title>Home - Responsável</title>


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
                            <a href="agenda.php">
                                <i class="material-icons-round">article</i>
                                <span class="links-name tooltip">Agenda Escolar</span>
                            </a>
                        </li>
                        <li class="links-name">
                        <a href="observacao-professor.php" class="active-nav">
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
        <div class="aluno-info">
            <div class="alternar-alunos-container">
                <span>Alternar Alunos</span>
                <div class="alternar-alunos-tab-flex">
                    <div class="alternar-alunos-tab" >
                        <img src="../img/Tony_Tony_Chopper_Anime_Pre_Timeskip_Infobox.png" alt="aluno">
                        <div class="alternar-alunos-tab-title">
                            <h5>Aluno 1</h5>
                        </div>
                    </div>
                    <div class="alternar-alunos-tab">
                        <img src="../img/macos.png" alt="aluno">
                        <div class="alternar-alunos-tab-title">
                            <h5>Aluno 2</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div style="text-align:right">
                <h1>Aluno 1</h1>
                <small>Média de Observações: Boa</small>

            </div>
            
        </div>
        <section class="container-observacao-do-professor">
            
            <div class="header-observacao-professor">
            
                <h2>Total de Observações</h2>
                
            </div>
            <div class="container-total-flags">
                <div class="flag flag-good"> 
                    <i class="material-icons-round">flag</i>
                    <p>Bom</p>
                    <h2>1</h2>
                </div>
                <div class="flag flag-medium"> 
                    <i class="material-icons-round">flag</i>
                    <p>Média</p>
                    <h2>1</h2>
                </div>
                <div class="flag flag-bad"> 
                    <i class="material-icons-round">flag</i>
                    <p>Ruim</p>
                    <h2>1</h2>
                </div>
                <div class="flag flag-toobad"> 
                    <i class="material-icons-round">flag</i>
                    <p>Muito Ruim</p>
                    <h2>1</h2>
                </div>
            </div>
        </section>

        <section class="container-observacao-do-professor">
            <div class="header-observacao-professor">
            
            <i class="material-icons-round">grading</i>
                <h2>Observações dos Professores</h2>
                
            </div>
        </section>
    
        <section class="container-observacao-do-professor">
                <div class=" swiper carousel-flags">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper ">
                                <!-- Slides -->
                            <div class="swiper-slide card-flags">
                                <div class="header-card">
                                <div class="profile-details">
                                    <img src="../img/macacopc.gif" alt="">
                                </div>
                                <h3>Claudineyson Pereira</h3>
                                </div>
                                <div class="footer-card-flags">
                                    <div class="content-flag">
                                            <div class="flag flag-good"> 
                                                <i class="material-icons-round">flag</i>
                                                <p>Boa</p>
                                            </div>
                                        </div>
                                    </div>
                                <div class="content-card-flags">
                                    
                                    <div class="text-desc-flag">
                                    <h3>Aluno: Souza</h3>
                                        <p>Ganhou um torneiro de Tênis de mesa</p>
                                    </div>
                                    
                                </div>
                                
                            </div>


                            <div class="swiper-slide card-flags">
                                <div class="header-card">
                                <div class="profile-details">
                                    <img src="../img/Tony_Tony_Chopper_Anime_Pre_Timeskip_Infobox.png" alt="">
                                </div>
                                <h3>Dilma Westbrook</h3>
                                </div>
                                <div class="footer-card-flags">
                                <div class="content-flag">
                                        <div class="flag flag-medium"> 
                                            <i class="material-icons-round">flag</i>
                                            <p>Média</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="content-card-flags">
                                    <div class="text-desc-flag">
                                        <h3>Aluno: Souza</h3>
                                        <p>Bateu no amiguinho enquanto virava um mortal para atrás, enquanto isso planejava em plantar uma bomba no refeitório</p>
                                    </div>
                                    
                                </div>
                                
                            </div>



                            <div class="swiper-slide card-flags">
                                <div class="header-card">
                                <div class="profile-details">
                                    <img src="../img/Tony_Tony_Chopper_Anime_Pre_Timeskip_Infobox.png" alt="">
                                </div>
                                <h3>Anthony Davis</h3>
                                </div>
                                <div class="footer-card-flags">
                                <div class="content-flag">
                                        <div class="flag flag-bad"> 
                                            <i class="material-icons-round">flag</i>
                                            <p>Ruim</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="content-card-flags">
                                    <div class="text-desc-flag">
                                    <h3>Aluno: Souza</h3>
                                        <p>Bateu no amiguinho enquanto virava um mortal para atrás, enquanto isso planejava em plantar uma bomba no refeitório</p>
                                    </div>
                                    
                                </div>
                                
                            </div>


                            <div class="swiper-slide card-flags">
                                <div class="header-card">
                                <div class="profile-details">
                                    <img src="../img/macacopc.gif" alt="">
                                </div>
                                <h3>Allen Iverson</h3>
                                </div>
                                <div class="footer-card-flags">
                                    <div class="content-flag">
                                        <div class="flag flag-toobad"> 
                                            <i class="material-icons-round">flag</i>
                                            <p>Muito Ruim</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="content-card-flags">
                                    <div class="text-desc-flag">
                                    <h3>Aluno: Souza</h3>
                                        <p>Bateu no amiguinho enquanto virava um mortal para atrás, enquanto isso planejava em plantar uma bomba no refeitório</p>
                                    </div>
                                    
                                </div>
                                
                            </div>
                           
                   
                            
                            
                            </div>
                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>

                            
                            </div> 
                    </section>

    </main>

   
  

    <script src="../assets/js/nav.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    

<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    
    <script src="../assets/js/carousel.js"></script>
    <script src="../assets/js/modal.js"></script>

    <script>
        $(document).ready(function(){
            var modal = document.getElementById("modalReset");
            var primeiroAcesso = "<?php echo $_SESSION['primeiroAcesso'] ?>";
            if(primeiroAcesso === "V"){
                modal.classList.toggle("modal-active");
            }else{
                
            }
        });

    </script>
</body>



</html>