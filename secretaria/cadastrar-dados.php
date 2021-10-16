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

                                    <form name="formProfessorDisciplina" id="formProfessorDisciplina" class="" method="POST" action="../DAO/inserir-professor-disciplina.php" onsubmit="return linkCadastrar()">

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
                                                <input type="submit" onclick="linkCadastrar()" id="btn-cadastrar" class="btn-nav-exit" value="Cadastrar">
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                    </section>
                    <section class="conteudo-aba" id="Turma-tab">
                    <div class="container-form-pages">
                                <div class="progress-bar">

                                    <div class="steps-form2">
                                        <p>Turma</p>
                                        <div class="bullet-form2">
                                            <span>1</span>
                                        </div>
                                        <div class="bullet-check-form2 fas fa-check">

                                        </div>
                                    </div>
                                    
                                    <div class="steps-form2">
                                        <p>Horário da aula</p>
                                        <div class="bullet-form2">
                                            <span>2</span>
                                        </div>
                                        <div class="bullet-check-form2 fas fa-check">

                                        </div>
                                    </div>


                                </div>
                                <div class="container-steps-form">

                                    <form class="" method="POST" action="#">

                                        <div class="user-details page-form slidePage-form2">
                                            <div class="btns-link-step-form">
                                                <h2>Como deseja seguir seu cadastro?</h2>
                                                <div>
                                                    <div class="btn-link-step">
                                                        <div class="button">
                                                            <button type="button" onclick="linkEtapa2Form2()" class="btn-nav-exit cadastrar-prof-step" value="Cadastrar Turma">
                                                                <div>
                                                                    <i class="fas fa-user"></i>
                                                                    <span>Cadastrar Turma</span>
                                                                </div>
                                                            </button>
                                                        </div>
                                                        <h5>Ou</h5>
                                                        <div class="input-box-width100 input-link-step">
                                                            <input type="text" placeholder="Procurar Turma">
                                                            <button type="button" onclick="linkEtapa3Form2()" class="btn-nav-exit nextBtnSkipTwo btn-page-next">
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
                                            <h2>Nome da Turma:</h2>
                                                <label class="label-erro" id="label-nome"></label>
                                                <input name="txtNomeTurma" id="txtNomeTurma" type="text" placeholder="Insira o nome da turma" value="<?php echo @$_GET['nomeTurma'] ?>">
                                            </div>
                                            <div class="button">
                                                <input type="button" onclick="linkEtapa1Form2()" class="btn-nav-exit prev-page-1 "
                                                    value="Voltar">
                                                <input type="button" onclick="linkEtapa3Form2()" class="btn-nav-exit next-form-1 btn-page-next"
                                                    value="Proximo">
                                            </div>
                                        </div>
                                        
                                        <div class="user-details page-form">
                                            <div class="btns-link-step-form">
                                                <h2>Como deseja seguir seu cadastro?</h2>
                                                <div>
                                                    <div class="btn-link-step">
                                                        <div class="button nextBtn">
                                                            <button type="button" onclick="linkEtapa4Form2()" class=" btn-nav-exit btn-page-next cadastrar-prof-step" value="Cadastrar Disciplina">
                                                                <div>
                                                                    <i class="fas fa-user"></i>
                                                                    <span>Cadastrar Horário da Turma</span>
                                                                </div>
                                                            </button>
                                                        </div>
                                                        <h5>Ou</h5>
                                                        <div class="input-box-width100 input-link-step">
                                                            <input type="text" placeholder="Procurar Horário da Turma">
                                                            <button class=" btn-nav-exit btn-page-next">
                                                                <i class="fas fa-search"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="button">
                                                    <input type="button" onclick="linkEtapa1Form2()" class="btn-nav-exit  btn-page-prev"
                                                    value="Voltar">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="user-details page-form">
                                            <div class="title-page-form">
                                                <h1>Cadastrar Horário da Turma:</h1>
                                            </div>
                                            <input type="hidden" id="idDisciplina" name="idDisciplina"
                                                value="<?php echo @$_GET['idDisciplina'] ?>">
                                            <div class="input-box-width100">
                                                <h2>Dia da semana</h2>
                                                <label class="label-erro" id="label-dia"></label>
                                                <input name="txtDiaSemana" id="txtDiaSemana" type="text" placeholder="Dia da semana da aula">
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
                                                <input type="button" onclick="linkEtapa3Form2()" class="btn-nav-exit"
                                                    value="Voltar">
                                                <input type="submit" onclick="linkCadastrarForm2()" class="btn-nav-exit" value="Cadastrar">
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

                                    <form class="" method="POST" action="#">

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
                                        <input id="idTurma" name="idTurma" type="hidden"
                                                value="<?php echo@$_GET['idTurma'] ?>">
                                            <div class="input-box-width100">
                                                <h2>Nome do aluno:</h2>
                                                <label class="label-erro" id="label-nome"></label>
                                                <input name="txtNomeAluno" id="txtNomeAluno" type="text" placeholder="Insira o nome do aluno" value="<?php echo @$_GET['nomeAluno']; ?>">
                                            </div>
                                            <div class="input-box-width100">
                                                <h2>Data de Nascimento:</h2>
                                                <label class="label-erro" id="label-dataNasc"></label>
                                                <input name="dataNasc" id="dataNasc" type="date" placeholder="Insira a data de nascimento do aluno" value="<?php echo @$_GET['dataNascAluno']; ?>">
                                            </div>
                                            <div class="input-box">
                                                <h2>Turma:</h2>
                                                <label class="label-erro" id="label-turma"></label>
                                                <input name="txtTurma" id="txtTurma" type="text" placeholder="Insira a turma do aluno" value="<?php if(isset($_SESSION['turmaInvalida'])){
                                                                                                                                                                                        echo $_SESSION['turmaInvalida'];
                                                                                                                                                                                    }else{
                                                                                                                                                                                        echo @$_GET['nomeTurma'];
                                                                                                                                                                                    } ?>">
                                                <div id="retornoPesquisa">

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
                                                <label class="label-erro" id="label-nome"></label>
                                                <input name="txtNome" id="txtNome" type="text" placeholder="Insira o nome do Responsável" value="<?php echo @$_GET['nomeResponsavel'] ?>">
                                            </div>
                                            <div class="input-box-width100">
                                                <h2>Email Responsável</h2>
                                                <label class="label-erro" id="label-email"></label>
                                                <input name="txtEmail" id="txtEmail" type="text" placeholder="Insira o email do Responsável" value="<?php if(isset($_SESSION['emailResponsavel'])){
                                                                                                                                                                                                    echo $_SESSION['emailResponsavel'];
                                                                                                                                                                                                }else{
                                                                                                                                                                                                    echo @$_GET['emailResponsavel'];
                                                                                                                                                                                                } ?>">
                                            </div>
                                            <div class="input-box">
                                                <h2>Senha Responsável</h2>
                                                <label class="label-erro" id="label-senha1"></label>
                                                <input name="txtSenha" id="txtSenha" type="password" placeholder="********">
                                            </div>
                                            <div class="input-box">
                                                <h2>Confirmar senha:</h2>
                                                <label class="label-erro" id="label-senha2"></label>
                                                <input name="txtConfirmaSenha" id="txtConfirmaSenha" type="password" placeholder="********">
                                            </div>
                                            <div class="input-box">
                                                <h2>Telefone do Responsável:</h2>
                                                <label class="label-erro" id="label-telefone"></label>
                                                <input name="txtTelefone" id="txtTelefone" type="tel"
                                                    placeholder="Insira o numero de telefone do Responsável" value="<?php echo @$_GET['telefoneResponsavel']; ?>">
                                            </div>
                                            <div class="input-box">
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
                                            <div class="input-box">
                                                <h2>Número:</h2>
                                                <label class="label-erro" id="label-numero"></label>
                                                <input name="txtNumero" id="txtNumero" type="text" placeholder="Insira o número da residência" value="<?php echo @$_GET['numCasa']; ?>">
                                            </div>
                                            <div class="input-box">
                                                <h2>Complemento:</h2>
                                                <label class="label-erro" id="label-complemento"></label>
                                                <input name="txtComplemento" id="txtComplemento" type="text" placeholder="Insira o complemento" value="<?php echo @$_GET['complemento']; ?>">
                                            </div>
                                            <div class="input-box">
                                                <h2>Bairro:</h2>
                                                <label class="label-erro" id="label-bairro"></label>
                                                <input name="txtBairro" id="txtBairro" type="text" placeholder="Insira o bairro" value="<?php echo @$_GET['bairro']; ?>">
                                            </div>
                                            <div class="input-box">
                                                <h2>Cidade:</h2>
                                                <label class="label-erro" id="label-cidade"></label>
                                                <input name="txtCidade" id="txtCidade" type="text" placeholder="Insira a cidade" value="<?php echo @$_GET['cidade']; ?>">
                                            </div>
                                            <div class="input-box-width100">
                                                <h2>De qual aluno você é responsável:</h2>
                                                <label class="label-erro" id="label-aluno"></label>
                                                <input name="txtAluno" id="txtAluno" type="text" placeholder="Insira o nome do aluno"  value="<?php if(isset($_SESSION['nomeAluno'])){
                                                                                                                                                                                        echo $_SESSION['nomeAluno'];
                                                                                                                                                                                    }else{
                                                                                                                                                                                        echo @$_GET['nomeAluno'] ?> <?php echo @$_GET['turma'];
                                                                                                                                                                                    } ?>">
                                                <div id="retornoPesquisa">

                                                </div>
                                            </div>
                                            <div class="button">
                                                <input type="button" onclick="linkEtapa3form3()" class="btn-nav-exit"
                                                    value="Voltar">
                                                <input type="submit" onclick="linkCadastrarform3()" class="btn-nav-exit" value="Cadastrar">
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

                                                                                                                            

    <script src="../assets/js/dash-cadastro.js"></script>
    <script src="../assets/js/formStepsBySteps.js"></script>
    <script src="../assets/js/nav.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.js"></script>
    <script src="../assets/js/carousel.js"></script>


</body>

</html>