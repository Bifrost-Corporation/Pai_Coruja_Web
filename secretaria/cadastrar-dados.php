<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <title>Home - Secretária</title>

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

    <main >



        <div class="container-dash">
            <div class="ola-nav-dash">
                <h1>Gerenciador de Dados</h1>
            </div>

            <div class="container-dados-cadastro">


                <div class="abas-container">
                    <button class="aba-cadastro" onclick="openTab(event,'Professor-tab')">
                        <h3>Professor / Diciplina</h3>
                    </button>
                    <button class="aba-cadastro" onclick="openTab(event,'Turma-tab')">
                        <h3>Turma / Horario</h3>
                    </button>
                    <button class="aba-cadastro" onclick="openTab(event,'Aluno-tab')">
                        <h3>Aluno / Responsável</h3>
                    </button>



                </div>
                <div class="forms-cadastro">

                    <section class="conteudo-aba" id="Professor-tab">
                            <div class="container-form-pages">
                                <div class="progress-bar">

                                    <div class="steps">
                                        <p>Professor</p>
                                        <div class="bullet">
                                            <span>1</span>
                                        </div>
                                        <div class="bullet-check fas fa-check">

                                        </div>
                                    </div>
                                    
                                    <div class="steps">
                                        <p>Disciplina</p>
                                        <div class="bullet">
                                            <span>2</span>
                                        </div>
                                        <div class="bullet-check fas fa-check">

                                        </div>
                                    </div>


                                </div>
                                <div class="container-steps-form">

                                    <form class="" method="POST" action="#">

                                        <div class="user-details page-form slidePage">
                                            <div class="btns-link-step-form">
                                                <h2>Deseja seguir o cadastro como?</h2>
                                                <div>
                                                    <div class="btn-link-step">
                                                        <div class="button">
                                                            <button type="button" onclick="linkEtapa2()" class="btn-nav-exit cadastrar-prof-step" value="Cadastrar Professor">
                                                                <div>
                                                                    <i class="fas fa-user"></i>
                                                                    <span>Cadastrar Professor</span>
                                                                </div>
                                                            </button>
                                                        </div>
                                                        <h5>Ou</h5>
                                                        <div class="input-box-width100 input-link-step">
                                                            <input type="text" placeholder="Procurar Professor">
                                                            <button type="button" onclick="linkEtapa3()" class="btn-nav-exit nextBtnSkipTwo btn-page-next">
                                                                <i class="fas fa-search"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>


                                        <div class="user-details page-form">
                                        <input id="idProfessor" name="idProfessor" type="hidden"
                                                value="<?php echo@$_GET['idProfessor'] ?>">
                                            <div class="input-box-width100">
                                                <h2>Nome do Professor:</h2>
                                                <label class="label-erro" id="label-nome"></label>
                                                <input name="txtNomeProfessor" id="txtNomeProfessor" type="text"
                                                    placeholder="Insira o nome do professor"
                                                    value="<?php echo @$_GET['nomeProfessor'] ?>">
                                            </div>
                                            <div class="input-box-width100">
                                                <h2>Email Professor:</h2>
                                                <label class="label-erro" id="label-email"></label>
                                                <input name="txtEmailProfessor" id="txtEmailProfessor" type="email"
                                                    placeholder="Insira o email do professor"
                                                    value="<?php if(isset($_SESSION['emailProfessor'])){
                                                                                                                        echo $_SESSION['emailProfessor'];
                                                                                                                    }else{
                                                                                                                        echo @$_GET['emailProfessor'];
                                                                                                                    } ?>">
                                            </div>
                                            <div class="input-box">
                                                <h2>Senha Professor:</h2>
                                                <label class="label-erro" id="label-senha1"></label>
                                                <input name="txtSenhaProfessor" id="txtSenhaProfessor" type="password"
                                                    placeholder="********">
                                            </div>
                                            <div class="input-box">
                                                <h2>Confirmar senha:</h2>
                                                <label class="label-erro" id="label-senha2"></label>
                                                <input name="txtConfirmarSenhaProfessor" id="txtConfirmarSenhaProfessor"
                                                    type="password" placeholder="********">
                                            </div>
                                            <div class="button">
                                                <input type="button" onclick="linkEtapa1()" class="btn-nav-exit prev-page-1 "
                                                    value="Voltar">
                                                <input type="button" onclick="linkEtapa3()" class="btn-nav-exit next-form-1 btn-page-next"
                                                    value="Proximo">
                                            </div>
                                        </div>
                                        
                                        <div class="user-details page-form">
                                            <div class="btns-link-step-form">
                                                <h2>Deseja seguir o cadastro como?</h2>
                                                <div>
                                                    <div class="btn-link-step">
                                                        <div class="button nextBtn">
                                                            <button type="button" onclick="linkEtapa4()" class=" btn-nav-exit btn-page-next cadastrar-prof-step" value="Cadastrar Disciplina">
                                                                <div>
                                                                    <i class="fas fa-user"></i>
                                                                    <span>Cadastrar Disciplina</span>
                                                                </div>
                                                            </button>
                                                        </div>
                                                        <h5>Ou</h5>
                                                        <div class="input-box-width100 input-link-step">
                                                            <input type="text" placeholder="Procurar Disciplina">
                                                            <button class=" btn-nav-exit btn-page-next">
                                                                <i class="fas fa-search"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="button">
                                                    <input type="button" onclick="linkEtapa1()" class="btn-nav-exit  btn-page-prev"
                                                    value="Voltar">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="user-details page-form">
                                            <div class="title-page-form">
                                                <h1>Cadastrar Disciplina:</h1>
                                            </div>
                                            <input type="hidden" id="idDisciplina" name="idDisciplina"
                                                value="<?php echo @$_GET['idDisciplina'] ?>">
                                            <div class="input-box-width100">
                                                <h2>Nome da disciplina:</h2>
                                                <label class="label-erro" id="label-nome"></label>
                                                <input name="txtNomeDisciplina" id="txtNomeDisciplina" type="text"
                                                    placeholder="Insira o nome da disciplina"
                                                    value="<?php echo @$_GET['nomeDisciplina'] ?>">
                                            </div>
                                            <div class="input-box-width100">
                                                <h2>Professor:</h2>
                                                <label class="label-erro" id="label-professor"></label>
                                                <input name="txtProfessorDisciplina" id="txtProfessor" type="text"
                                                    placeholder="Insira o professor responsável pela disciplina"
                                                    value="<?php echo @$_GET['nomeProfessor'] ?>">
                                                <div id="retornoPesquisa">

                                                </div>
                                            </div>
                                            <div class="button">
                                                <input type="button" onclick="linkEtapa3()" class="btn-nav-exit"
                                                    value="Voltar">
                                                <input type="submit" onclick="linkCadastrar()" class="btn-nav-exit" value="Cadastrar">
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                    </section>
                    <section class="conteudo-aba" id="Turma-tab">
                    <div class="container-form-pages">
                                <div class="progress-bar">

                                    <div class="steps">
                                        <p>Professor</p>
                                        <div class="bullet">
                                            <span>1</span>
                                        </div>
                                        <div class="bullet-check fas fa-check">

                                        </div>
                                    </div>
                                    
                                    <div class="steps">
                                        <p>Disciplina</p>
                                        <div class="bullet">
                                            <span>2</span>
                                        </div>
                                        <div class="bullet-check fas fa-check">

                                        </div>
                                    </div>


                                </div>
                                <div class="container-steps-form">

                                    <form class="" method="POST" action="#">

                                        <div class="user-details page-form slidePage">
                                            <div class="btns-link-step-form">
                                                <h2>Deseja seguir o cadastro como?</h2>
                                                <div>
                                                    <div class="btn-link-step">
                                                        <div class="button">
                                                            <button type="button" onclick="linkEtapa2()" class="btn-nav-exit cadastrar-prof-step" value="Cadastrar Turma">
                                                                <div>
                                                                    <i class="fas fa-user"></i>
                                                                    <span>Cadastrar Turma</span>
                                                                </div>
                                                            </button>
                                                        </div>
                                                        <h5>Ou</h5>
                                                        <div class="input-box-width100 input-link-step">
                                                            <input type="text" placeholder="Procurar Turma">
                                                            <button type="button" onclick="linkEtapa3()" class="btn-nav-exit nextBtnSkipTwo btn-page-next">
                                                                <i class="fas fa-search"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>


                                        <div class="user-details page-form">
                                        <input id="idTurma" name="idTurma" type="hidden"
                                                value="<?php echo@$_GET['idTurma'] ?>">
                                            <div class="input-box-width100">
                                                <h2>Dia da semana</h2>
                                                <label class="label-erro" id="label-dia"></label>
                                                <input name="txtDiaSemana" id="txtDiaSemana" type="text" placeholder="Dia da semana da aula">
                                            </div>
                                            <div class="input-box-width100">
                                            <h2>Nome da Turma</h2>
                        <label class="label-erro" id="label-turma"></label>
                        <input name="txtTurma" id="txtTurma" type="text" placeholder="Nome da turma da aula" value="<?php if(isset($_SESSION['nomeTurma'])){
                                                                                                                                                                echo $_SESSION['nomeTurma'];
                                                                                                                                                            } ?>">
                                            </div>
                                            <div class="input-box">
                                                <h2>Senha Professor:</h2>
                                                <label class="label-erro" id="label-senha1"></label>
                                                <input name="txtSenhaProfessor" id="txtSenhaProfessor" type="password"
                                                    placeholder="********">
                                            </div>
                                            <div class="input-box">
                                                <h2>Confirmar senha:</h2>
                                                <label class="label-erro" id="label-senha2"></label>
                                                <input name="txtConfirmarSenhaProfessor" id="txtConfirmarSenhaProfessor"
                                                    type="password" placeholder="********">
                                            </div>
                                            <div class="button">
                                                <input type="button" onclick="linkEtapa1()" class="btn-nav-exit prev-page-1 "
                                                    value="Voltar">
                                                <input type="button" onclick="linkEtapa3()" class="btn-nav-exit next-form-1 btn-page-next"
                                                    value="Proximo">
                                            </div>
                                        </div>
                                        
                                        <div class="user-details page-form">
                                            <div class="btns-link-step-form">
                                                <h2>Deseja seguir o cadastro como?</h2>
                                                <div>
                                                    <div class="btn-link-step">
                                                        <div class="button nextBtn">
                                                            <button type="button" onclick="linkEtapa4()" class=" btn-nav-exit btn-page-next cadastrar-prof-step" value="Cadastrar Disciplina">
                                                                <div>
                                                                    <i class="fas fa-user"></i>
                                                                    <span>Cadastrar Disciplina</span>
                                                                </div>
                                                            </button>
                                                        </div>
                                                        <h5>Ou</h5>
                                                        <div class="input-box-width100 input-link-step">
                                                            <input type="text" placeholder="Procurar Disciplina">
                                                            <button class=" btn-nav-exit btn-page-next">
                                                                <i class="fas fa-search"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="button">
                                                    <input type="button" onclick="linkEtapa1()" class="btn-nav-exit  btn-page-prev"
                                                    value="Voltar">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="user-details page-form">
                                            <div class="title-page-form">
                                                <h1>Cadastrar Disciplina:</h1>
                                            </div>
                                            <input type="hidden" id="idDisciplina" name="idDisciplina"
                                                value="<?php echo @$_GET['idDisciplina'] ?>">
                                            <div class="input-box-width100">
                                                <h2>Nome da disciplina:</h2>
                                                <label class="label-erro" id="label-nome"></label>
                                                <input name="txtNomeDisciplina" id="txtNomeDisciplina" type="text"
                                                    placeholder="Insira o nome da disciplina"
                                                    value="<?php echo @$_GET['nomeDisciplina'] ?>">
                                            </div>
                                            <div class="input-box-width100">
                                                <h2>Professor:</h2>
                                                <label class="label-erro" id="label-professor"></label>
                                                <input name="txtProfessorDisciplina" id="txtProfessor" type="text"
                                                    placeholder="Insira o professor responsável pela disciplina"
                                                    value="<?php echo @$_GET['nomeProfessor'] ?>">
                                                <div id="retornoPesquisa">

                                                </div>
                                            </div>
                                            <div class="button">
                                                <input type="button" onclick="linkEtapa3()" class="btn-nav-exit"
                                                    value="Voltar">
                                                <input type="submit" onclick="linkCadastrar()" class="btn-nav-exit" value="Cadastrar">
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                    </section>
                    <section class="conteudo-aba" id="Aluno-tab">gdsfgfggegrege</section>






                    <section class="main-section" id="Topo">



                    </section>
                </div>
            </div>

        </div>
    </main>

                                                                                                                            

    <script src="../assets/js/dash-cadastro.js"></script>
    <script src="../assets/js/formStepsBySteps.js"></script>
    <script src="../assets/js/nav.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.js"></script>
    <script src="../assets/js/carousel.js"></script>


</body>

</html>