<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css"  href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />

    <title>Cadastro Turma</title>


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
                <a href="home-secretaria.php">
                    <i class="fas fa-calendar"></i>
                    <span class="links-name">Mural</span>
                </a>
            </li>
            <li class="links-name">
                <a href="#">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <span class="links-name">Avaliação dos Professores</span>
                </a>
            </li>
            <li class="links-name">
                <a href="#">
                    <i class="fas fa-calendar-day"></i>
                    <span class="links-name">Eventos Programados</span>
                </a>
            </li>
        </div>
        <hr>
        <div class="menu-container">
            <li class="links-name">
                <a href="cadastrar-turma.php">
                    <i class="fas fa-school"></i>
                    <span class="links-name">Cadastrar Turma</span>
                </a>
            </li>
            <li class="links-name">
                <a href="cadastrar-aluno.php">
                    <i class="fas fa-school"></i>
                    <span class="links-name">Cadastrar Aluno</span>
                </a>
            </li>
            <li class="links-name">
                <a href="cadastrar-professor.php">
                    <i class="fas fa-school"></i>
                    <span class="links-name">Cadastrar Professor</span>
                </a>
            </li>
            <li class="links-name">
                <a href="cadastrar-responsavel.php">
                    <i class="fas fa-school"></i>
                    <span class="links-name">Cadastrar Responsável</span>
                </a>
            </li>
            <li class="links-name">
                <a href="cadastrar-disciplina.php">
                    <i class="fas fa-school"></i>
                    <span class="links-name">Cadastrar Disciplina</span>
                </a>
            </li>
            <li class="links-name">
                <a href="cadastrar-horario-turma.php">
                    <i class="fas fa-school"></i>
                    <span class="links-name">Cadastrar Horarios</span>
                </a>
            </li>
            <li class="links-name">
                <a href="cadastrar-evento.php">
                    <i class="fas fa-school"></i>
                    <span class="links-name">Cadastrar Evento</span>
                </a>
            </li>
            <li class="links-name">
                <a href="chat-secretaria.php">
                    <i class="fas fa-calendar-day"></i>
                    <span class="links-name">Chat</span>
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



    <main class="container-main">


        <section class="top-section">
            <div class="voltar">
                <a href="home-secretaria.php">
                    <span class="fas fa-arrow-left"></span>Voltar
                </a>
            </div>
            <div class="titulo-cadastrar">
                <h2></h2>
            </div>
        </section>


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
        <section class="container-controlers">
            <div class="content-card-link1" checked>
                <div class="side-left">
                    <h1>
                        <?php 
                            $turma = new Turma();
                            $listaTurma = $turma->contar($_SESSION['idEscola']);
                            foreach($listaTurma as $linha){
                                echo $linha['qtdeTurma'];
                            }
                        ?>
                    </h1>
                    <p>Turmas</p>
                </div>
                <div class="side-right">    
                <a class="btn-ver-dados-tabela" id="btn-show-div-exibir-dados"><i class="fas fa-users" aria-hidden="true"></i><p> ver todos</p></a>
                
                </div>

            </div>
            <a href="#Topo" class="content-card-link2">
                <div class="side-left">
                    <h1>+</h1>
                    <p>Adicionar Turma</p>
                </div>
                <div class="side-right">
                    <i class="btn-adicionar-aluno fas fa-users" aria-hidden="true"></i>
                </div>
            </a>

        </section>
        <div class="container-exibir-dados">
            <div class="box-titulo-bar-search">
                <h1>Disciplinas Cadastradas</h1>
                <form action="#" class="box-search">
                    <button class="btn-search"><i class="fa fa-search" aria-hidden="true"></i></button>
                    <input type="text" name="search" placeholder="Busque..">
                </form>
            </div>
            <div class="table-dados">
                <table>
                    <thead>
                        <tr>
                            <td>Turma:</td>
                            <td>Alterar</td>
                            <td>Excluir</td>
                        </tr>
                   </thead>
                   <tbody>
                   <?php
                        $listaTurma = $turma->listar();
                        foreach($listaTurma as $linha){
                   ?>
                        <tr>
                            <td><?php echo $linha['nomeTurma'] ?></td>
                            <td><?php echo "<a class'opcao-icone' href='?idTurma={$linha['idTurma']}&nomeTurma={$linha['nomeTurma']}&idEscola={$linha['idEscola']}'>"; ?><i class="icons-table fa fa-cog opcao-icone"></i><?php echo "</a>" ?></td>
                            <td><?php echo "<a href='../DAO/excluir-turma.php?idTurma={$linha['idTurma']}'"?> onclick="return confirm('Você está prestes a excluir a turma: <?php echo $linha['nomeTurma'] ?> da escola, tem certeza?')"><i class="icons-table fas fa-times" aria-hidden="true"></i></td>
                        </tr>
                   <?php
                        }
                   ?>
                   </tbody>
               </table>
            </div>
        </div>
    </main>

    <script src="../assets/js/formStepsBySteps.js"></script>
    <script src="../assets/js/nav.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="../assets/js/jquery.mask.js"></script>
    <script src="../assets/js/showDiv.js"></script>
    <script src="../assets/js/jquery-dropdown.js"></script>

   <!-- <script>
        
        $('#txtNomeTurma').mask("0ºS");

        jQuery('form').on('submit', function (e) {
            var nomeTurma = $('#txtNomeTurma').val();
            if (nomeTurma.length != 3) {
                $('#label-nome').html('Por favor, preencha o campo de nome para a turma corretamente!');
                $('#txtNomeTurma').addClass('erro-form');
                $('#label-nome').show();
                setTimeout(function () {
                    $('#label-nome').fadeOut(1);
                    $('#txtNomeTurma').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
        });
    </script>-->
</body>



</html>