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

        
        
    
        <?php
            $observacao = new Observacao();
            $aluno = new Aluno();
            $listaObservacoes = $aluno->selecionarObservacoes($_SESSION['idAluno']);
        ?>    

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
                <h1><?php echo $_SESSION['nomeAluno'] ?></h1>
                <?php
                    $listaMediaPontosObservacao = $aluno->mediaObservacoes($_SESSION['idAluno']);
                    foreach($listaMediaPontosObservacao as $linha){
                        $mediaObservacoes = $linha['mediaPontosObservacoes'];
                    }
                    if($mediaObservacoes < 1){
                        $mediaObservacoesEscrita = 'Anotação';
                    }else if($mediaObservacoes > 1 && $mediaObservacoes < 2){
                        $mediaObservacoesEscrita = 'Leve';
                    }else if($mediaObservacoes > 2 && $mediaObservacoes < 3){
                        $mediaObservacoesEscrita = 'Média';
                    }else if($mediaObservacoes > 3 && $mediaObservacoes < 4){
                        $mediaObservacoesEscrita = 'Grave';
                    }else if($mediaObservacoes > 4 && $mediaObservacoes < 5){
                        $mediaObservacoesEscrita = 'Muito Grave';
                    }else if($mediaObservacoes > 5){
                        $mediaObservacoesEscrita = 'Extremamente Grave';
                    }else{
                        $mediaObservacoesEscrita = 'Erro';
                    }
                ?>
                <small>Média de Observações: <?php echo $mediaObservacoesEscrita ?></small>

            </div>
            
        </div>

        <?php
            $listraGravidade0 = $aluno->contarObservacoesGravidade($_SESSION['idAluno'], 0);
            foreach($listraGravidade0 as $linha){
                $qtdeGravidade0 = $linha['qtdeGravidade'];
            }
            $listraGravidade1 = $aluno->contarObservacoesGravidade($_SESSION['idAluno'], 1);
            foreach($listraGravidade1 as $linha){
                $qtdeGravidade1 = $linha['qtdeGravidade'];
            }
            $listraGravidade2 = $aluno->contarObservacoesGravidade($_SESSION['idAluno'], 2);
            foreach($listraGravidade2 as $linha){
                $qtdeGravidade2 = $linha['qtdeGravidade'];
            }
            $listraGravidade3 = $aluno->contarObservacoesGravidade($_SESSION['idAluno'], 3);
            foreach($listraGravidade3 as $linha){
                $qtdeGravidade3 = $linha['qtdeGravidade'];
            }
            $listraGravidade4 = $aluno->contarObservacoesGravidade($_SESSION['idAluno'], 4);
            foreach($listraGravidade4 as $linha){
                $qtdeGravidade4 = $linha['qtdeGravidade'];
            }
            $listraGravidade5 = $aluno->contarObservacoesGravidade($_SESSION['idAluno'], 5);
            foreach($listraGravidade5 as $linha){
                $qtdeGravidade5 = $linha['qtdeGravidade'];
            }
        ?>

        <section class="container-observacao-do-professor">
            
            <div class="header-observacao-professor">
            
                <h2>Total de Observações</h2>
                
            </div>
            <div class="container-total-flags">
                <div class="flag flag-nivel1"> 
                    <i class="material-icons-round">flag</i>
                    <p>Anotação</p>
                    <h2><?php echo $qtdeGravidade0 ?></h2>
                </div>
                <div class="flag flag-nivel2"> 
                    <i class="material-icons-round">flag</i>
                    <p>Leve</p>
                    <h2><?php echo $qtdeGravidade1 ?></h2>
                </div>
                <div class="flag flag-nivel3"> 
                    <i class="material-icons-round">flag</i>
                    <p>Média</p>
                    <h2><?php echo $qtdeGravidade2 ?></h2>
                </div>
                <div class="flag flag-nivel4"> 
                    <i class="material-icons-round">flag</i>
                    <p>Grave</p>
                    <h2><?php echo $qtdeGravidade3 ?></h2>
                </div>
                <div class="flag flag-nivel5"> 
                    <i class="material-icons-round">flag</i>
                    <p>Muito Grave</p>
                    <h2><?php echo $qtdeGravidade4 ?></h2>
                </div>
                <div class="flag flag-nivel6"> 
                    <i class="material-icons-round">flag</i>
                    <p>Extremamente Grave</p>
                    <h2><?php echo $qtdeGravidade5 ?></h2>
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

                                <?php
                                    foreach($listaObservacoes as $linha){
                                        if($linha['qtdePontosObservacao'] == 0){
                                            $gravidade = 'Anotação';
                                            $classeGravidade = '-nivel1';
                                        }else if($linha['qtdePontosObservacao'] == 1){
                                            $gravidade = 'Leve';
                                            $classeGravidade = '-nivel2';
                                        }else if($linha['qtdePontosObservacao'] == 2){
                                            $gravidade = 'Média';
                                            $classeGravidade = '-nivel3';
                                        }else if($linha['qtdePontosObservacao'] == 3){
                                            $gravidade = 'Grave';
                                            $classeGravidade = '-nivel4';
                                        }else if($linha['qtdePontosObservacao'] == 4){
                                            $gravidade = 'Muito Grave';
                                            $classeGravidade = '-nivel5';
                                        }
                                        else if($linha['qtdePontosObservacao'] == 5){
                                            $gravidade = 'Extremamente Grave';
                                            $classeGravidade = '-nivel6';
                                        }else{
                                            $gravidade = 'Inválida!';
                                        }
                                ?>
                                <div class="swiper-slide card-flags">
                                    <div class="header-card">
                                    <div class="profile-details">
                                        <img src="../img/macacopc.gif" alt="">
                                    </div>
                                    <h3>Professor: <?php echo $linha['nomeProfessor'] ?></h3>
                                    </div>
                                    <div class="footer-card-flags">
                                        <div class="content-flag">
                                                <div class="flag flag<?php echo $classeGravidade ?>"> 
                                                    <i class="material-icons-round">flag</i>
                                                    <p><?php echo $gravidade ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="content-card-flags">
                                        
                                        <div class="text-desc-flag">
                                        <h3>Aluno: <?php echo $linha['nomeAluno'] ?></h3>
                                            <p><?php echo $linha['descObservacao'] ?></p>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                <?php
                                    }
                                ?>
                           
                   
                            
                            
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