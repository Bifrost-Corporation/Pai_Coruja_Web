<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <title>Home - Secretária</title>

</head>
<body>
    <?php
        include ('sentinela.php');
        include ('globalSecretaria.php');
        include ('../classes/Secretaria.php');
        include ('../classes/Usuario.php');
        include ('../classes/ImagemSecretaria.php');

        $usuario = new Usuario();
        $listaUsuario = $usuario->listar();
                
        $imagemSecretaria = new ImagemSecretaria();
        $listaImagem = $imagemSecretaria->listarImagem($_SESSION['idSecretaria']);
        
        $imagemPerfilsrc = "img/user.png";
        foreach($listaImagem as $linha){
            if($linha['idSecretaria'] == $_SESSION['idSecretaria']){
                foreach($listaUsuario as $linha2){
                    $imagemPerfilsrc = $linha['caminhoImagemPerfilSecretaria'].$linha['nomeImagemPerfilSecretaria'];
                        
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
                        <img src="../<?php echo($imagemPerfilsrc) ?>" alt="">
                    </div>
                </button>

                <div class="dropdown-menu-profile">
                    <div class="profile-details">
                        <img src="../<?php echo($imagemPerfilsrc) ?>" alt="">
                        <div class="name-job">
                            <div class="name-menu"><?php echo $_SESSION['nomeSecretaria'] ?></div>
                            <small class="job-menu">Olá Secretário(a)</small>
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
                            <a href="dashboard.php#ProfileEdit">
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
                            <a href="dashboard.php">
                                <i class="material-icons-round">space_dashboard</i>
                                <span class="links-name tooltip">Dashboard</span>
                            </a>
                        </li>
                        <li class="links-name">
                            <a href="cadastrar-dados.php" class="active-nav">
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
                                <span class="links-name tooltip">Cadastrar Eventos</span>
                            </a>
                        </li>
                        <li class="links-name">
                            <a href="cadastrar-publicacao.php">
                                <i class="material-icons-round">notes</i>
                                <span class="links-name tooltip">Cadastrar Publicação</span>
                            </a>
                        </li>
                        <li class="links-name">
                            <a href="chat-secretaria.php" >
                                <i class="material-icons-round">chat_bubble</i>
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
                <h1>Gerenciador de Dados</h1>
            </div>

            <div class="container-dados-cadastro">


                <div class="abas-container">
                    <button class="aba-cadastro" onclick="openTab(event,'Professor-tab')">
                        <h3>Professor / Disciplina</h3>
                    </button>
                    <button class="aba-cadastro" onclick="openTab(event,'Turma-tab')">
                        <h3>Turma</h3>
                    </button>
                    <button class="aba-cadastro" onclick="openTab(event,'Horario-tab')">
                        <h3>Horário Turma</h3>
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

                                    <form name="formProfessorDisciplina" id="formProfessorDisciplina" class="" method="POST" action="#">

                                        <div class="user-details page-form slidePage">
                                            <div class="btns-link-step-form">
                                                <h2>Como deseja seguir seu cadastro?</h2>
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
                                            <div class="input-box-width100">
                                                <h2>Senha Professor:</h2>
                                                <label class="label-erro" id="label-senha1"></label>
                                                <input name="txtSenhaProfessor" id="txtSenhaProfessor" type="password"
                                                    placeholder="********">
                                            </div>
                                            <div class="input-box-width100">
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
                                                <h2>Como deseja seguir seu cadastro?</h2>
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
                                            <div class="input-box-width100">
                                                <h2>Nome da disciplina:</h2>
                                                <label class="label-erro" id="label-nomeDisciplina"></label>
                                                <input name="txtNomeDisciplina" id="txtNomeDisciplina" type="text"
                                                    placeholder="Insira o nome da disciplina"
                                                    value="<?php echo @$_GET['nomeDisciplina'] ?>">
                                            </div>
                                            <div class="input-box-width100">
                                                <h2>Professor:</h2>
                                                <label class="label-erro" id="label-professor"></label>
                                                <input name="txtProfessorDisciplina" id="txtProfessorDisciplina" type="text"
                                                    placeholder="Insira o professor responsável pela disciplina"
                                                    value="<?php echo @$_GET['nomeProfessor'] ?>">
                                                <div id="retornoPesquisa">

                                                </div>
                                            </div>
                                            <div class="button">
                                                <input type="button" onclick="linkEtapa3()" class="btn-nav-exit"
                                                    value="Voltar">
                                                <input type="submit" id="btn-cadastrar" class="btn-nav-exit" value="Cadastrar">
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                    </section>
                    <section class="conteudo-aba" id="Turma-tab">
                    <div class="container-form-pages">
                                <div class="container-steps-form">

                                    <form id="formTurma" name="formTurma" class="" method="POST" action="../DAO/inserir-turma-planilha.php" enctype="multipart/form-data">

                                        <div class="user-details page-form slidePage-form2">
                                            <div class="btns-link-step-form">
                                                <h2>Como deseja seguir seu cadastro?</h2>
                                                <div>
                                                    <div class="btn-link-step">
                                                        <div class="button">
                                                            <button type="button" onclick="linkEtapa2Form2()" class="btn-nav-exit cadastrar-prof-step" value="Cadastrar Turma">
                                                                <div>
                                                                    <i class="fas fa-user"></i>
                                                                    <span>Cadastrar Uma Turma</span>
                                                                </div>
                                                            </button>
                                                        </div>
                                                        <h5>Ou</h5>
                                                        <div class="button">
                                                            <button type="button" onclick="linkEtapa3Form2()" class="btn-nav-exit cadastrar-prof-step" value="Cadastrar Turma">
                                                                <div>
                                                                    <i class="fas fa-user"></i>
                                                                    <span>Cadastrar Várias Turmas</span>
                                                                </div>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>


                                        <div class="user-details page-form">
                                            <div class="input-box-width100">
                                            <h2>Nome da Turma:</h2>
                                                <label class="label-erro" name="label-nomeTurma" id="label-nomeTurma"></label>
                                                <input name="txtNomeTurma" id="txtNomeTurma" type="text" placeholder="Insira o nome da turma" value="<?php echo @$_GET['nomeTurma'] ?>">
                                                <!--<input name="txtNomeTurma" id="txtNomeTurma" type="text" placeholder="Insira o nome da turma" value="<?php echo @$_GET['nomeTurma'] ?>">-->
                                            </div>
                                            <div class="button">
                                                <input type="button" onclick="linkEtapa1Form2()" class="btn-nav-exit prev-page-1 "
                                                    value="Voltar">
                                                <input type="submit" class="btn-nav-exit next-form-1 btn-page-next"
                                                    value="Cadastrar">
                                            </div>
                                        </div>
                                        
                                        <div class="user-details page-form">
                                            <div class="input-box-width100">
                                                <h2>Baixe aqui o modelo básico da planilha para inserir novas turmas:</h2>
                                                <div class="button aba-cadastro">
                                                    <a href="planilhas/Planilha Modelo Inserir Turma.xml" download class="texto-botao">Baixar Modelo</a>
                                                </div>
                                                <h2>Envie o Arquivo .XML da planilha das turmas:</h2>
                                                <label class="label-erro" name="label-nomeTurma" id="label-nomeTurma"></label>
                                                <div class="input-box-width100">
                                                    <label class="label-erro" id="label-foto"></label>
                                                    <div>
                                                        <label class="carregar-imagem-perfil" for="arquivo">Carregar Planilha Turma</label>
                                                        <input name="arquivo" id="arquivo" type="file">
                                                        <label class="label-erro" id="label-arquivo"></label>
                                                        <span id="nome-arquivo"></span>
                                                    </div>
                                                </div>
                                                    <!--<input name="txtNomeTurma" id="txtNomeTurma" type="text" placeholder="Insira o nome da turma" value="<?php echo @$_GET['nomeTurma'] ?>">-->
                                                </div>
                                                <div class="button">
                                                    <input type="button" onclick="linkEtapa1Form2()" class="btn-nav-exit prev-page-1 "
                                                        value="Voltar">
                                                    <input type="submit" class="btn-nav-exit next-form-1 btn-page-next"
                                                        value="Cadastrar">
                                                </div>
                                        </div>

                                        

                                    </form>
                                </div>
                            </div>
                    </section>
                    <section class="conteudo-aba" id="Horario-tab">
                    <div class="container-form-pages">
                            
                                <div class="container-steps-form">

                                    <form id="formTurmaHorario" name="formTurmaHorario" class="" method="POST" action="../DAO/inserir-planilha-horarioturma.php" enctype="multipart/form-data">
                                        
                                        <div class="user-details page-form slidePage-form4">
                                            <div class="btns-link-step-form">
                                                <h2>Selecione a turma para cadastrar o horário:</h2>
                                                <div class="table-dados">
                                                    <table>
                                                        <thead>
                                                            <tr>
                                                                <td>Turma:</td>
                                                                <td>Selecionar:</td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $turma = new Turma();
                                                            $listaTurma = $turma->contar($_SESSION['idEscola']);
                                                            $listaTurma = $turma->listar($_SESSION['idEscola']);
                                                            $i = 0;
                                                            foreach($listaTurma as $linha){
                                                                $i++;
                                                    ?>
                                                            <tr>
                                                                <td id="turma<?php echo $i ?>"><?php echo $linha['nomeTurma'] ?></td>
                                                                <td>
                                                                    <div>
                                                                        <div class="btn-link-step">
                                                                            <div class="button nextBtn">
                                                                                <button type="button" onclick="linkEtapa2Form4()" class=" btn-nav-exit btn-page-next cadastrar-prof-step" value="Cadastrar Disciplina" id="btn-SelecionarTurma<?php echo $i ?>" name="btn-SelecionarTurma">
                                                                                    <div>
                                                                                        <i class="fas fa-user"></i>
                                                                                        <span>Cadastrar Horário da Turma</span>
                                                                                    </div>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                            }
                                                    ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                
                                            </div>
                                        </div>

                                        <div class="user-details page-form">
                                            <div class="input-box-width100">
                                                <h2>Turma Selecionada:</h2>
                                                <input id="nomeTurmaHorario" name="nomeTurmaHorario" type="text" readonly>
                                                <h2>Baixe aqui o modelo básico da planilha para o horário da turma:</h2>
                                                <div class="button aba-cadastro">
                                                    <a href="planilhas/Planilha Modelo Inserir Horario Turma.xml" download class="texto-botao">Baixar Modelo</a>
                                                </div>
                                                <h2>Envie o Arquivo .XML da planilha do horário:</h2>
                                                <label class="label-erro" name="label-nomeTurma" id="label-nomeTurma"></label>
                                                <div class="input-box-width100">
                                                    <label class="label-erro" id="label-horario"></label>
                                                    <div>
                                                        <label class="carregar-imagem-perfil" for="planilha-horario">Carregar Planilha Horário</label>
                                                        <input name="planilha-horario" id="planilha-horario" type="file">
                                                        <label class="label-erro" id="label-arquivo"></label>
                                                        <span id="nome-arquivo"></span>
                                                    </div>
                                                </div>
                                                    <!--<input name="txtNomeTurma" id="txtNomeTurma" type="text" placeholder="Insira o nome da turma" value="<?php echo @$_GET['nomeTurma'] ?>">-->
                                                </div>
                                                <div class="button">
                                                    <input type="button" onclick="linkEtapa1Form4()" class="btn-nav-exit prev-page-1 "
                                                        value="Voltar">
                                                    <input type="submit" class="btn-nav-exit next-form-1 btn-page-next"
                                                        value="Cadastrar">
                                                </div>
                                    </div>

                                    </form>
                                </div>
                            </div>
                    </section>
                    <section class="conteudo-aba" id="Aluno-tab">
                        <div class="container-form-pages">
                                <div class="progress-bar">

                                    <div class="steps-form3">
                                        <p>Aluno</p>
                                        <div class="bullet-form3">
                                            <span>1</span>
                                        </div>
                                        <div class="bullet-check-form3 fas fa-check">

                                        </div>
                                    </div>
                                    
                                    <div class="steps-form3">
                                        <p>Responsável</p>
                                        <div class="bullet-form3">
                                            <span>2</span>
                                        </div>
                                        <div class="bullet-check-form3 fas fa-check">

                                        </div>
                                    </div>


                                </div>
                                <div class="container-steps-form">

                                    <form id="formAlunoResponsavel" name="formAlunoResponsavel" class="" method="POST" action="../DAO/inserir-aluno-responsavel.php">

                                        <div class="user-details page-form slidePage-form3">
                                            <div class="btns-link-step-form">
                                                <h2>Como deseja seguir seu cadastro?</h2>
                                                <div>
                                                    <div class="btn-link-step">
                                                        <div class="button">
                                                            <button type="button" onclick="linkEtapa2form3()" class="btn-nav-exit cadastrar-prof-step" value="Cadastrar Aluno">
                                                                <div>
                                                                    <i class="fas fa-user"></i>
                                                                    <span>Cadastrar Aluno</span>
                                                                </div>
                                                            </button>
                                                        </div>
                                                        <h5>Ou</h5>
                                                        <div class="input-box-width100 input-link-step">
                                                            <input type="text" placeholder="Procurar Aluno">
                                                            <button type="button" onclick="linkEtapa3form3()" class="btn-nav-exit nextBtnSkipTwo btn-page-next">
                                                                <i class="fas fa-search"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>


                                        <div class="user-details page-form">
                                            <div class="input-box-width100">
                                                <h2>Nome do aluno:</h2>
                                                <label class="label-erro" id="label-nomeAluno"></label>
                                                <input name="txtNomeAluno" id="txtNomeAluno" type="text" placeholder="Insira o nome do aluno" value="<?php echo @$_GET['nomeAluno']; ?>">
                                            </div>
                                            <div class="input-box-width100">
                                                <h2>Data de Nascimento:</h2>
                                                <label class="label-erro" id="label-dataNasc"></label>
                                                <input name="dataNasc" id="dataNasc" type="date" placeholder="Insira a data de nascimento do aluno" value="<?php echo @$_GET['dataNascAluno']; ?>">
                                            </div>
                                            <div class="input-box-width100">
                                                <h2>Turma:</h2>
                                                <label class="label-erro" id="label-turma"></label>
                                                <input name="txtTurmaAluno" id="txtTurmaAluno" type="text" placeholder="Insira a turma do aluno" value="<?php if(isset($_SESSION['turmaInvalida'])){
                                                                                                                                                                                        echo $_SESSION['turmaInvalida'];
                                                                                                                                                                                    }else{
                                                                                                                                                                                        echo @$_GET['nomeTurma'];
                                                                                                                                                                                    } ?>">
                                                <div id="retornoPesquisaTurmaAluno">

                                                </div>
                                            </div>
                                            
                                            <div class="button">
                                                <input type="button" onclick="linkEtapa1form3()" class="btn-nav-exit prev-page-1 "
                                                    value="Voltar">
                                                <input type="button" onclick="linkEtapa3form3()" class="btn-nav-exit next-form-1 btn-page-next"
                                                    value="Proximo">
                                            </div>
                                        </div>
                                        
                                        <div class="user-details page-form">
                                            <div class="btns-link-step-form">
                                                <h2>Como deseja seguir seu cadastro?</h2>
                                                <div>
                                                    <div class="btn-link-step">
                                                        <div class="button nextBtn">
                                                            <button type="button" onclick="linkEtapa4form3()" class=" btn-nav-exit btn-page-next cadastrar-prof-step" value="Cadastrar Responsável">
                                                                <div>
                                                                    <i class="fas fa-user"></i>
                                                                    <span>Cadastrar Responsável</span>
                                                                </div>
                                                            </button>
                                                        </div>
                                                        <h5>Ou</h5>
                                                        <div class="input-box-width100 input-link-step">
                                                            <input type="text" placeholder="Procurar Responsável">
                                                            <button class=" btn-nav-exit btn-page-next">
                                                                <i class="fas fa-search"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="button">
                                                    <input type="button" onclick="linkEtapa1form3()" class="btn-nav-exit  btn-page-prev"
                                                    value="Voltar">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="user-details page-form">
                                            <div class="title-page-form">
                                                <h1>Cadastrar Responsável:</h1>
                                            </div>
                                            <div class="input-box-width100">
                                                <h2>Nome Responsável</h2>
                                                <label class="label-erro" id="label-nomeResponsavel"></label>
                                                <input name="txtNomeResponsavel" id="txtNomeResponsavel" type="text" placeholder="Insira o nome do Responsável" value="<?php echo @$_GET['nomeResponsavel'] ?>">
                                            </div>
                                            <div class="input-box-width100">
                                                <h2>Email Responsável</h2>
                                                <label class="label-erro" id="label-emailResponsavel"></label>
                                                <input name="txtEmailResponsavel" id="txtEmailResponsavel" type="text" placeholder="Insira o email do Responsável" value="<?php if(isset($_SESSION['emailResponsavel'])){
                                                                                                                                                                                                    echo $_SESSION['emailResponsavel'];
                                                                                                                                                                                                }else{
                                                                                                                                                                                                    echo @$_GET['emailResponsavel'];
                                                                                                                                                                                                } ?>">
                                            </div>
                                            <div class="input-box-width100">
                                                <h2>Senha Responsável</h2>
                                                <label class="label-erro" id="label-senha1Responsavel"></label>
                                                <input name="txtSenhaResponsavel" id="txtSenhaResponsavel" type="password" placeholder="********">
                                            </div>
                                            <div class="input-box-width100">
                                                <h2>Confirmar senha:</h2>
                                                <label class="label-erro" id="label-senha2Responsavel"></label>
                                                <input name="txtConfirmaSenhaResponsavel" id="txtConfirmaSenhaResponsavel" type="password" placeholder="********">
                                            </div>
                                            <div class="input-box-width100">
                                                <h2>Telefone do Responsável:</h2>
                                                <label class="label-erro" id="label-telefone"></label>
                                                <input name="txtTelefone" id="txtTelefone" type="tel"
                                                    placeholder="Insira o numero de telefone do Responsável" value="<?php echo @$_GET['telefoneResponsavel']; ?>">
                                            </div>
                                            <div class="input-box-width100">
                                                <h2>CPF Responsável:</h2>
                                                <label class="label-erro" id="label-cpf"></label>
                                                <input name="txtCpf" id="txtCpf" type="tel" placeholder="Insira CPF do Responsável" value="<?php if(isset($_SESSION['cpfResponsavel'])){
                                                                                                                                                                                                echo $_SESSION['cpfResponsavel'];
                                                                                                                                                                                            }else{
                                                                                                                                                                                                echo @$_GET['cpfResponsavel'];
                                                                                                                                                                                            } ?>">
                                            </div>
                                            <div class="input-box-width100">
                                                <h2>CEP:</h2>
                                                <label class="label-erro" id="label-cep"></label>
                                                <input name="txtCep" id="txtCep" type="text"
                                                    placeholder="Insira o CEP do endereço do Reponsável" value="<?php echo @$_GET['cep']; ?>">
                                            </div>
                                            <div class="input-box-width100">
                                                <h2>Rua:</h2>
                                                <label class="label-erro" id="label-rua"></label>
                                                <input name="txtRua" id="txtRua" type="text"
                                                    placeholder="Insira a rua do endereço do Responsável" value="<?php echo @$_GET['rua']; ?>">
                                            </div>
                                            <div class="input-box-width100">
                                                <h2>Número:</h2>
                                                <label class="label-erro" id="label-numero"></label>
                                                <input name="txtNumero" id="txtNumero" type="text" placeholder="Insira o número da residência" value="<?php echo @$_GET['numCasa']; ?>">
                                            </div>
                                            <div class="input-box-width100">
                                                <h2>Complemento:</h2>
                                                <label class="label-erro" id="label-complemento"></label>
                                                <input name="txtComplemento" id="txtComplemento" type="text" placeholder="Insira o complemento" value="<?php echo @$_GET['complemento']; ?>">
                                            </div>
                                            <div class="input-box-width100">
                                                <h2>Bairro:</h2>
                                                <label class="label-erro" id="label-bairro"></label>
                                                <input name="txtBairro" id="txtBairro" type="text" placeholder="Insira o bairro" value="<?php echo @$_GET['bairro']; ?>">
                                            </div>
                                            <div class="input-box-width100">
                                                <h2>Cidade:</h2>
                                                <label class="label-erro" id="label-cidade"></label>
                                                <input name="txtCidade" id="txtCidade" type="text" placeholder="Insira a cidade" value="<?php echo @$_GET['cidade']; ?>">
                                            </div>
                                            <div class="input-box-width100">
                                                <h2>De qual aluno você é responsável:</h2>
                                                <label class="label-erro" id="label-alunoResponsavel"></label>
                                                <input name="txtAlunoResponsavel" id="txtAlunoResponsavel" type="text" placeholder="Insira o nome do aluno"  value="<?php if(isset($_SESSION['nomeAluno'])){
                                                                                                                                                                                        echo $_SESSION['nomeAluno'];
                                                                                                                                                                                    }else{
                                                                                                                                                                                        echo @$_GET['nomeAluno'] ?> <?php echo @$_GET['turma'];
                                                                                                                                                                                    } ?>">
                                                <div id="retornoPesquisaAlunoResponsavel">

                                                </div>
                                            </div>
                                            <div class="button">
                                                <input type="button" onclick="linkEtapa3form3()" class="btn-nav-exit"
                                                    value="Voltar">
                                                <input type="submit" class="btn-nav-exit" value="Cadastrar">
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </section>






                    <section class="main-section" id="Topo">



                    </section>
                </div>
            </div>

        </div>
    </main>

    <div id="modalProfile" class="modal modal-profile">
            
            <!-- Modal content -->
        <div class="modal-content-profile">
            <div class="card-perfil">
                <span class="closeModalProfile"><i class="fas fa-times"></i></span>
                <div class="perfil-modal-body">
                    <img src="../<?php echo($imagemPerfilsrc) ?>" alt="Sua Foto de Perfil" style="align-self: center;box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.063);">
                    <div class="title-perfil-modal">
                        <h1><?php echo $_SESSION['nomeSecretaria'] ?></h1>
                        <small>Secretário(a) Escolar</small>
                        <small>Essa imagem será exibida para todos no Pai Coruja</small>
                    </div>
                    <form name="formImagemPerfil" id="formImagemPerfil" action="../DAO/inserir-imagem-secretaria.php" method="POST" class="botoes-perfil-upload" enctype="multipart/form-data">
                                    <label class="botao-cadastrar-perfil" for="imagemPerfil">Carregar Imagem Perfil</label>
                                    <input name="imagemPerfil" id="imagemPerfil" type="file" accept="image/*">
                                    <label class="label-erro" id="label-arquivo"></label>
                                    <span id="nome-arquivo"></span>
                        <button class="botao-cadastrar-perfil" type="submit" value="Enviar">Enviar</button>
                    </form> 
                </div>
                
            </div>
        </div>

    </div>

    
    <script src="../assets/js/dash-cadastro.js"></script>
    <script src="../assets/js/nav.js"></script>
    <script src="../assets/js/sweetAlert.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="../assets/js/jquery.mask.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.js"></script>
    <script src="../assets/js/carousel.js"></script>
    <script src="../assets/js/formStepsBySteps.js"></script>
    <script src="../assets/js/modalProfile.js"></script>                                                                                                                      

    <script>

            function feedback(type,title,text){
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 5000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                Toast.fire({
                    icon:type,
                    title:title,
                })
            }
        
        //Script Form Disciplina/Professor
        jQuery('#formProfessorDisciplina').on('submit', function (e){
            var nomeDisciplina = $('#txtNomeDisciplina').val();
            var nomeProfessor = $('#txtProfessorDisciplina').val();
            var nomeDisciplinaSemEspaco = nomeDisciplina.trim();
            var nomeProfessorSemEspaco = nomeProfessor.trim();
            if (nomeDisciplina.length == 0 || nomeDisciplinaSemEspaco == '') {
                $('#label-nomeDisciplina').html('Por favor, preencha o campo de nome para a disciplina!');
                $('#txtNomeDisciplina').addClass('erro-form');
                $('#label-nomeDisciplina').show();
                setTimeout(function () {
                    $('#label-nomeDisciplina').fadeOut(1);
                    $('#txtNomeDisciplina').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
            else if (nomeProfessor.length == 0 || nomeProfessorSemEspaco == '') {
                $('#label-professor').html('Por favor, preencha o campo de nome para o professor responsável pela disciplina!');
                $('#txtProfessorDisciplina').addClass('erro-form');
                $('#label-professor').show();
                setTimeout(function () {
                    $('#label-professor').fadeOut(1);
                    $('#txtProfessorDisciplina').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
            else {
                e.preventDefault();
                var dados = {'txtNomeProfessor':jQuery('#txtNomeProfessor').val(),
                            'txtEmailProfessor':jQuery('#txtEmailProfessor').val(),
                            'txtSenhaProfessor':jQuery('#txtSenhaProfessor').val(),
                            'txtNomeDisciplina':jQuery('#txtNomeDisciplina').val(),
                            'idProfessor':jQuery('#idProfessor').val(),
                            'idDisciplina':jQuery('#idDisciplina').val()};
                $.ajax({
                    url: "../DAO/inserir-professor-disciplina.php",
                    data: dados,
                    type: 'POST',
                    sucess: feedback('success','Cadastro do Professor realizado com sucesso!')
                });
            }
        });

        //Script Turma
        $('#txtNomeTurma').mask("0ºS");
        

        jQuery('#formTurma').on('submit', function(e){
            e.preventDefault();
            var nomeTurma = $('#txtNomeTurma').val();
            if (nomeTurma.length != 3) {
                $('#label-nomeTurma').html('Por favor, preencha o campo de nome para a turma corretamente!');
                $('#txtNomeTurma').addClass('erro-form');
                $('#label-nomeTurma').show();
                setTimeout(function () {
                    $('#label-nomeTurma').fadeOut(1);
                    $('#txtNomeTurma').removeClass('erro-form');
                }, 5000);
            }else{
                var dados = {'txtNomeTurma':nomeTurma};
                $.ajax({
                    url: "../DAO/inserir-turma-planilha.php",
                    data: dados,
                    type: 'POST',
                    success: feedback('success', 'Cadastro da turma realizado com sucesso!')
                });
            }
        });

        jQuery('#txtDisciplinaHorario').keyup(function () {
            var textoInserido = $(this).val();
            if (textoInserido != '') {
                $.ajax({
                    url: '../DAO/procurar-disciplina.php',
                    method: 'POST',
                    data: {
                        query: textoInserido
                    },
                    success: function (resposta) {
                        $("#retornoPesquisaDisciplinaHorario").html(resposta);
                    }
                });
            } else {
                $("#retornoPesquisaDisciplinaHorario").html('');
            }
        });

        $(document).on('click', '.opcao-consulta2', function () {
            $("#txtDisciplinaHorario").val($(this).text());
            $("#retornoPesquisaDisciplinaHorario").html("");
        });

        jQuery('#formTurmaHorario').on('submit', function (e) {
            var diaSemana = $('#txtDiaSemana').val();
            var disciplina = $('#txtDisciplinaHorario').val();
            var diaSemanaSemEspaco = diaSemana.trim();
            var disciplinaSemEspaco = disciplina.trim();
            if (diaSemana.length == 0 || diaSemanaSemEspaco == '') {
                $('#label-dia').html('Por favor, preencha o campo de dia da semana!');
                $('#txtDiaSemana').addClass('erro-form');
                $('#label-dia').show();
                setTimeout(function () {
                    $('#label-dia').fadeOut(1);
                    $('#txtDiaSemana').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
            if (disciplina.length == 0 || disciplinaSemEspaco == '') {
                $('#label-disciplina').html('Por favor, preencha o campo de disciplina!');
                $('#txtDisciplinaHorario').addClass('erro-form');
                $('#label-disciplina').show();
                setTimeout(function () {
                    $('#label-disciplina').fadeOut(1);
                    $('#txtDisciplinaHorario').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
        });

        //Script Aluno/Responsável
        jQuery('#txtTurmaAluno').keyup(function () {
            var textoInserido = $(this).val();
            if (textoInserido != '') {
                $.ajax({
                    url: '../DAO/procurar-turma-aluno.php',
                    method: 'POST',
                    data: {
                        query: textoInserido
                    },
                    success: function (resposta) {
                        $("#retornoPesquisaTurmaAluno").html(resposta);
                    }
                });
            } else {
                $("#retornoPesquisaTurmaAluno").html('');
            }
        });

        $(document).on('click', '.opcao-consulta', function () {
            $("#txtTurmaAluno").val($(this).text());
            $("#retornoPesquisaTurmaAluno").html("");
        });

        $('#txtTelefone').keyup(function (){
            if($(this).val().length > 14){
                $('#txtTelefone').mask("(00) 00000-0000");
            } else {
                $('#txtTelefone').mask("(00) 0000-00009");
            }
        });

        $('#txtCpf').mask("000.000.000-00");
        $('#txtCep').mask("00000-000");

        $(document).ready(function() {
            $("#txtCep").keyup(function() {
                var tamanhoCep = $(this).val().length;
                if(tamanhoCep == 9){
                    var cep = $(this).val().replace(/\D/g, '');
                    if (cep != "") {
                        var validacep = /^[0-9]{8}$/;
                        if(validacep.test(cep)) {
                            $("#txtRua").val("...");
                            $("#txtBairro").val("...");
                            $("#txtCidade").val("...");
                            $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
                                if (!("erro" in dados)) {
                                    $("#txtRua").val(dados.logradouro);
                                    $("#txtBairro").val(dados.bairro);
                                    $("#txtCidade").val(dados.localidade);
                                } else {
                                    $('#label-cep').html('CEP inválido!');
                                    $('#txtCep').addClass('erro-form');
                                    $('#label-cep').show();
                                    $('#txtCep').focus();
                                    setTimeout(function () {
                                        $('#label-cep').fadeOut(1);
                                        $('#txtCep').removeClass('erro-form');
                                    }, 5000);
                                    e.preventDefault();
                                } 
                            });
                        }
                        else {
                            $('#label-cep').html('CEP inválido!');
                            $('#txtCep').addClass('erro-form');
                            $('#label-cep').show();
                            $('#txtCep').focus();
                            setTimeout(function () {
                                $('#label-cep').fadeOut(1);
                                $('#txtCep').removeClass('erro-form');
                            }, 5000);
                            e.preventDefault();
                        }
                    }
                }
            });
        });

        jQuery('#formAlunoResponsavel').on('submit', function (e) {
            var nome = $('#txtNomeResponsavel').val();
            var email = $('#txtEmailResponsavel').val();
            var senha1 = $('#txtSenhaResponsavel').val();
            var senha2 = $('#txtConfirmaSenhaResponsavel').val();
            var telefone = $('#txtTelefone').val();
            var cpf = $('#txtCpf').val();
            var cep = $('#txtCep').val();
            var rua = $('#txtRua').val();
            var numero = $('#txtNumero').val();
            var cidade = $('#txtCidade').val();
            var bairro = $('#txtBairro').val();
            var complemento = $('#txtComplemento').val();
            var aluno = $('#txtAlunoResponsavel').val();
            var nomeSemEspaco = nome.trim();
            var emailSemEspaco = email.trim();
            var senha1SemEspaco = senha1.trim();
            var senha2SemEspaco = senha2.trim();
            var ruaSemEspaco = rua.trim();
            var numeroSemEspaco = numero.trim();
            var cidadeSemEspaco = cidade.trim();
            var bairroSemEspaco = bairro.trim();
            var alunoSemEspaco = aluno.trim();

            if (nome.length == 0 || nomeSemEspaco == '') {
                $('#label-nomeResponsavel').html('Por favor, preencha o campo de nome para o responsável!');
                $('#txtNomeResponsavel').addClass('erro-form');
                $('#label-nomeResponsavel').show();
                $('#txtNomeResponsavel').focus();
                setTimeout(function () {
                    $('#label-nomeResponsavel').fadeOut(1);
                    $('#txtNomeResponsavel').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }

            if (email.length == 0 || emailSemEspaco == '') {
                $('#label-emailResponsavel').html('Por favor, preencha o campo de email para o responsável!');
                $('#txtEmailResponsavel').addClass('erro-form');
                $('#label-emailResponsavel').show();
                $('#txtEmailResponsavel').focus();
                setTimeout(function () {
                    $('#label-emailResponsavel').fadeOut(1);
                    $('#txtEmailResponsavel').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            } else {
                var verificaarroba = false;
                var verificaponto = false;
                for (var i = 0; i < email.length; i++) {
                    if (email.charAt(i) == '@' && i + 1 < email.length) {
                        var posicaoarroba = i;
                    }
                    if (email.charAt(i) == '.' && i + 1 < email.length) {
                        var posicaoponto = i;
                    }
                }
                if (posicaoponto > posicaoarroba) {
                    verificaarroba = true;
                    verificaponto = true;
                }
                if (verificaarroba == false || verificaponto == false) {
                    $('#label-emailResponsavel').html('Email inválido!');
                    $('#txtEmailResponsavel').addClass('erro-form');
                    $('#label-emailResponsavel').show();
                    $('#txtEmailResponsavel').focus();
                    setTimeout(function () {
                        $('#label-emailResponsavel').fadeOut(1);
                        $('#txtEmailResponsavel').removeClass('erro-form');
                    }, 5000);
                    e.preventDefault();
                }
            }
            if (senha1.length == 0 || senha1SemEspaco == '') {
                $('#label-senha1Responsavel').html('Por favor, preencha o campo de senha!');
                $('#txtSenhaResponsavel').addClass('erro-form');
                $('#label-senha1Responsavel').show();
                $('#txtSenhaResponsavel').focus();
                setTimeout(function () {
                    $('#label-senha1Responsavel').fadeOut(1);
                    $('#txtSenhaResponsavel').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
            if (senha2.length == 0 || senha2SemEspaco == '') {
                $('#label-senha2Responsavel').html('Por favor, preencha o campo para confirmar a senha!');
                $('#txtConfirmaSenhaResponsavel').addClass('erro-form');
                $('#label-senha2Responsavel').show();
                $('#txtConfirmaSenhaResponsavel').focus();
                setTimeout(function () {
                    $('#label-senha2Responsavel').fadeOut(1);
                    $('#txtConfirmaSenhaResponsavel').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
            if (senha1 != senha2) {
                $('#label-senha1Responsavel').html('Senhas não correspondentes!');
                $('#txtSenhaResponsavel').addClass('erro-form');
                $('#label-senha1Responsavel').show();
                $('#txtSenhaResponsavel').focus();
                $('#label-senha2Responsavel').html('Senhas não correspondentes!');
                $('#txtConfirmaSenhaResponsavel').addClass('erro-form');
                $('#label-senha2Responsavel').show();
                $('#txtConfirmaSenhaResponsavel').focus();
                setTimeout(function () {
                    $('#label-senha1Responsavel').fadeOut(1);
                    $('#txtSenhaResponsavel').removeClass('erro-form');
                    $('#label-senha2Responsavel').fadeOut(1);
                    $('#txtConfirmaSenhaResponsavel').removeClass('erro-form');
                }, 5000);
                e.preventDefault();

            }
            if (telefone.length <= 8) {
                $('#label-telefone').html('Número de telefone inválido!');
                $('#txtTelefone').addClass('erro-form');
                $('#label-telefone').show();
                $('#txtTelefone').focus();
                setTimeout(function () {
                    $('#label-telefone').fadeOut(1);
                    $('#txtTelefone').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
            if (cpf.length != 14) {
                $('#label-cpf').html('CPF inválido!');
                $('#txtCpf').addClass('erro-form');
                $('#label-cpf').show();
                $('#txtCpf').focus();
                setTimeout(function () {
                    $('#label-cpf').fadeOut(1);
                    $('#txtCpf').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            } else {
                var cpfValido = true;
                var arrayCpf = cpf.split("");
                var digito1 = parseInt(arrayCpf[0]);
                var digito2 = parseInt(arrayCpf[1]);
                var digito3 = parseInt(arrayCpf[2]);
                var digito4 = parseInt(arrayCpf[4]);
                var digito5 = parseInt(arrayCpf[5]);
                var digito6 = parseInt(arrayCpf[6]);
                var digito7 = parseInt(arrayCpf[8]);
                var digito8 = parseInt(arrayCpf[9]);
                var digito9 = parseInt(arrayCpf[10]);
                var digito10 = parseInt(arrayCpf[12]);
                var digito11 = parseInt(arrayCpf[13]);
                if(digito1 == digito2 && digito2 == digito3 && digito3 == digito4 && digito4 == digito5 && digito5 == digito6 &&
                digito6 == digito7 && digito7 == digito8 && digito8 == digito9 && digito9 == digito10 && digito10 == digito11){
                    $('#label-cpf').html('CPF inválido!');
                    $('#txtCpf').addClass('erro-form');
                    $('#label-cpf').show();
                    $('#txtCpf').focus();
                    setTimeout(function () {
                        $('#label-cpf').fadeOut(1);
                        $('#txtCpf').removeClass('erro-form');
                    }, 5000);
                        e.preventDefault();
                }else{
                    var teste1 = (digito1 * 10) + (digito2 * 9) + (digito3 * 8) + (digito4 * 7) + (digito5 * 6) + (digito6 * 5) + (digito7 * 4) + (digito8 * 3) + (digito9 * 2);
                    var resto1 = (teste1 * 10) % 11;
                    if(resto1 == 10 || resto1 == 11){
                        resto1 = 0;
                    }
                    if(resto1 != digito10){
                        cpfValido = false;
                    }
                    if(cpfValido != false){
                        var teste2 = (digito1 * 11) + (digito2 * 10) + (digito3 * 9) + (digito4 * 8) + (digito5 * 7) + (digito6 * 6) + (digito7 * 5) + (digito8 * 4) + (digito9 * 3) + (digito10 * 2);
                        var resto2 = (teste2 * 10) % 11;
                        if(resto2 == 10 || resto2 == 11){
                            resto2 = 0;
                        }
                        if(resto2 != digito11){
                            cpfValido = false;
                        }
                    }
                    if(cpfValido == false){
                        $('#label-cpf').html('CPF inválido!');
                        $('#txtCpf').addClass('erro-form');
                        $('#label-cpf').show();
                        $('#txtCpf').focus();
                        setTimeout(function () {
                            $('#label-cpf').fadeOut(1);
                            $('#txtCpf').removeClass('erro-form');
                        }, 5000);
                        e.preventDefault();
                    }
                }
            }
            if (cep.length != 9) {
                $('#label-cep').html('CEP inválido!');
                $('#txtCep').addClass('erro-form');
                $('#label-cep').show();
                $('#txtCep').focus();
                setTimeout(function () {
                    $('#label-cep').fadeOut(1);
                    $('#txtCep').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
            if (rua.length == 0 || ruaSemEspaco == '') {
                $('#label-rua').html('Informe a rua do responsável!');
                $('#txtRua').addClass('erro-form');
                $('#label-rua').show();
                $('#txtRua').focus();
                setTimeout(function () {
                    $('#label-rua').fadeOut(1);
                    $('#txtRua').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
            if (numero.length == 0 || numeroSemEspaco == '') {
                $('#label-numero').html('Informe o número do responsável!');
                $('#txtNumero').addClass('erro-form');
                $('#label-numero').show();
                $('#txtNumero').focus();
                setTimeout(function () {
                    $('#label-numero').fadeOut(1);
                    $('#txtNumero').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
            if (cidade.length == 0 || cidadeSemEspaco == '') {
                $('#label-cidade').html('Informe a cidade do responsável!');
                $('#txtCidade').addClass('erro-form');
                $('#label-cidade').show();
                $('#txtCidade').focus();
                setTimeout(function () {
                    $('#label-cidade').fadeOut(1);
                    $('#txtCidade').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
            if (bairro.length == 0 || bairroSemEspaco == '') {
                $('#label-bairro').html('Informe o bairro do responsável!');
                $('#txtBairro').addClass('erro-form');
                $('#label-bairro').show();
                $('#txtBairro').focus();
                setTimeout(function () {
                    $('#label-bairro').fadeOut(1);
                    $('#txtBairro').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
            if (aluno.length == 0 || alunoSemEspaco == '') {
                $('#label-alunoResponsavel').html('Informe o aluno do responsável!');
                $('#txtAlunoResponsavel').addClass('erro-form');
                $('#label-alunoResponsavel').show();
                $('#txtAlunoResponsavel').focus();
                setTimeout(function () {
                    $('#label-alunoResponsavel').fadeOut(1);
                    $('#txtAlunoResponsavel').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }

        });

        //Passando a turma selecionada para o campo input do horário turma
        <?php
            $i = 0; 
            foreach($listaTurma as $linha){
                $i++;
        ?>
            $("#btn-SelecionarTurma<?php echo $i ?>").on('click', function (){
                var nomeTurma = $("#turma<?php echo $i ?>").text();
                $("#nomeTurmaHorario").val(nomeTurma);
            });
        <?php
            }
        ?>
    </script>


</body>

</html>
