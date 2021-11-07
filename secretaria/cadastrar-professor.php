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
                            <a href="dashboard.php" class="active-nav">
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
                            <a href="cadastrar-evento.php">
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

        

        <main>
        
        
        
        <div class="container-dash">
            <div class="ola-nav-dash">
                <h1>Gerenciador de Dados</h1>
            </div>

            <div class="container-dados-cadastro">
                <div class="abas-container">
                    <div class="aba-cadastro aba-cadastro-active">
                        <h3>Professor</h3>
                    </div>
                    <div class="aba-cadastro">
                        <h3>fdfgdgdg</h3>
                    </div>
                    <div class="aba-cadastro">
                        <h3>fdfgdgdg</h3>
                    </div>
                    <div class="aba-cadastro">
                        <h3>fdfgdgdg</h3>
                    </div>
                    <div class="aba-cadastro">
                        <h3>fdfgdgdg</h3>
                    </div>
                </div>
                <div class="forms-cadastro">
                <section class="main-section" id="Topo">
            <div class="container-form-pages">
            <div class="progress-bar">
                <div class="steps">
                    <p>Turma</p>
                    <div class="bullet">
                        <span>1</span>
                    </div>
                    <div class="bullet-check fas fa-check">

                    </div>
                </div>
                <div class="steps">
                    <p>Disciplina</p>
                    <div class="bullet">
                        <span><i class=" fas fa-book-open" aria-hidden="true"></i> </span>
                    </div>
                    <div class="bullet-check fas fa-check">

                    </div>
                </div>
                <div class="steps">
                    <p>Horário</p>
                    <div class="bullet">
                        <span>3</span>
                    </div>
                    <div class="bullet-check fas fa-check">

                    </div>
                </div>
                
                
            </div>
                <div class="container-steps-form">
                    <form class="" method="POST" action="#">
                    <div class="user-details page-form slidePage">
                        <div class="title-page-form">
                            <h1>Cadastrar Turma:</h1>
                        </div>
                            <input type="hidden" id="idTurma" name="idTurma" value="<?php echo @$_GET['idTurma'] ?>">
                            <div class="input-box-width100">
                                <h2>Nome da Turma:</h2>
                                <label class="label-erro" id="label-nome"></label>
                                <input name="txtNomeTurma" id="txtNomeTurma" type="text" placeholder="Insira o nome da turma" value="<?php echo @$_GET['nomeTurma'] ?>">
                            </div>
                            <div class="button nextBtn" >
                            <input type="button" class="btn-nav-exit btn-page-next" value="Proximo">
                            </div>
                        </div>
                        <div class="user-details page-form">
                        <div class="title-page-form">
                            <h1>Cadastrar Disciplina:</h1>
                        </div>
                    <input type="hidden" id="idDisciplina" name="idDisciplina" value="<?php echo @$_GET['idDisciplina'] ?>">
                    <div class="input-box-width100">
                        <h2>Nome da disciplina:</h2>
                        <label class="label-erro" id="label-nome"></label>
                        <input name="txtNomeDisciplina" id="txtNomeDisciplina" type="text"
                            placeholder="Insira o nome da disciplina" value="<?php echo @$_GET['nomeDisciplina'] ?>">
                    </div>
                    <div class="input-box-width100">
                        <h2>Professor:</h2>
                        <label class="label-erro" id="label-professor"></label>
                        <input name="txtProfessor" id="txtProfessor" type="text"
                            placeholder="Insira o professor responsável pela disciplina" value="<?php echo @$_GET['nomeProfessor'] ?>">
                        <div id="retornoPesquisa">
                            
                        </div>
                    </div>
                    <div class="button">
                    <input type="button" class="btn-nav-exit prev-page-1 btn-page-prev" value="Voltar">
                    <input type="button" class="btn-nav-exit next-page-1 btn-page-next" value="Proximo">
                    
                    </div>
                </div>
                <div class="user-details page-form">
                <div class="title-page-form">
                            <h1>Cadastrar Horário:</h1>
                        </div>
                    <div class="input-box">
                        <h2>Dia da semana</h2>
                        <label class="label-erro" id="label-dia"></label>
                        <input name="txtDiaSemana" id="txtDiaSemana" type="text" placeholder="Dia da semana da aula">
                    </div>
                    <div class="input-box">
                        <h2>Nome da Turma</h2>
                        <label class="label-erro" id="label-turma"></label>
                        <input name="txtTurma" id="txtTurma" type="text" placeholder="Nome da turma da aula" value="<?php if(isset($_SESSION['nomeTurma'])){
                                                                                                                                                                echo $_SESSION['nomeTurma'];
                                                                                                                                                            } ?>">
                        <div id="retornoPesquisa">

                        </div>
                    </div>
                    <div class="input-box-width100">
                        <h2>Nome da Disciplina</h2>
                        <label class="label-erro" id="label-disciplina"></label>
                        <input name="txtDisciplina" id="txtDisciplina" type="text" placeholder="Disciplina a ser dada na aula"  value="<?php if(isset($_SESSION['nomeDisciplina'])){
                                                                                                                                                                                        echo $_SESSION['nomeDisciplina'];
                                                                                                                                                                                    } ?>">
                        <div id="retornoPesquisa2">

                        </div>
                    </div>
                    <div class="button">
                        <input type="button" class="btn-nav-exit prev-page-2 btn-page-prev" value="Voltar">
                        <input type="submit" class="btn-nav-exit submitBtn" value="Cadastrar">
                    </div>
                </div>
                    </form>
                </div>
            
            </div>
            
            
        </section>
                </div>
            </div>

        </div>
    </main>


    <script src="../assets/js/formStepsBySteps.js"></script>
    <script src="../assets/js/nav.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.js"></script>
    <script src="../assets/js/carousel.js"></script>
</body>

</html>