<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />

    <title>Cadastro Disciplina</title>


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
                <h2>Cadastrar Disciplina:</h2>
            </div>
        </section>


        <section class="main-section" id="Topo">
            
            <form class="formulario" name="formDisciplina" id="formDisciplina" action="../DAO/inserir-disciplina.php"
                method="POST">
                <div class="user-details">
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
                        <input type="submit" class="btn-nav-exit" value="Cadastrar">
                    </div>
                </div>
            </form>
        </section>
        <section class="container-controlers">
            <div class="content-card-link1" checked>
                <div class="side-left">
                    <h1>
                        <?php 
                            $disciplina = new Disciplina();
                            $listaDisciplina = $disciplina->contar($_SESSION['idEscola']);
                            foreach($listaDisciplina as $linha){
                                echo $linha['qtdeDisciplina'];
                            }
                        ?>
                    </h1>
                    <p>Disciplinas</p>
                </div>
                <div class="side-right">    
                <a class="btn-ver-dados-tabela" id="btn-show-div-exibir-dados"><i class="fas fa-book-open" aria-hidden="true"></i></i><p> ver todos</p></a>
                
                </div>

            </div>
            <a href="#Topo" class="content-card-link2">
                <div class="side-left">
                    <h1>+</h1>
                    <p>Adicionar Disciplina</p>
                </div>
                <div class="side-right">
                    <i class="btn-adicionar-aluno fas fa-book-open" aria-hidden="true"></i> 
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
                            <td>Nome:</td>
                            <td>Professor:</td>
                            <td>Alterar</td>
                            <td>Excluir</td>
                        </tr>
                   </thead>
                   <tbody>
                   <?php
                        $listaDisciplina = $disciplina->listar();
                        foreach($listaDisciplina as $linha){
                   ?>
                        <tr>
                            <td><?php echo $linha['nomeDisciplina'] ?></td>
                            <td><?php echo $linha['nomeProfessor'] ?></td>
                            <td><?php echo "<a class'opcao-icone' href='?idDisciplina={$linha['idDisciplina']}&nomeDisciplina={$linha['nomeDisciplina']}&idProfessor={$linha['idProfessor']}&idEscola={$linha['idEscola']}&nomeProfessor={$linha['nomeProfessor']}'>"; ?><i class="icons-table fa fa-cog opcao-icone"></i><?php echo "</a>" ?></td>
                            <td><?php echo "<a href='../DAO/excluir-disciplina.php?idDisciplina={$linha['idDisciplina']}'"?> onclick="return confirm('Você está prestes a excluir a disciplina: <?php echo $linha['nomeDisciplina'] ?>, do professor: <?php echo $linha['nomeProfessor'] ?>, tem certeza?')"><i class="icons-table fas fa-times" aria-hidden="true"></i></td>
                        </tr>
                   <?php
                        }
                   ?>
                   </tbody>
               </table>
            </div>
        </div>
    </main>

    <script src="../js/nav.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="../js/showDiv.js"></script>
    <script src="../js/jquery-dropdown.js"></script>

    <script>
        jQuery('#txtProfessor').keyup(function () {
            var textoInserido = $(this).val();
            if (textoInserido != '') {
                $.ajax({
                    url: '../DAO/procurar-professor.php',
                    method: 'POST',
                    data: {
                        query: textoInserido
                    },
                    success: function (resposta) {
                        $("#retornoPesquisa").html(resposta);
                    }
                });
            } else {
                $("#retornoPesquisa").html('');
            }
        });

        $(document).on('click', '.opcao-consulta', function () {
            $("#txtProfessor").val($(this).text());
            $("#retornoPesquisa").html("");
        });

        jQuery('form').on('submit', function (e) {
            var nomeDisciplina = $('#txtNomeDisciplina').val();
            var nomeProfessor = $('#txtProfessor').val();
            var nomeDisciplinaSemEspaco = nomeDisciplina.trim();
            var nomeProfessorSemEspaco = nomeProfessor.trim();
            if (nomeDisciplina.length == 0 || nomeDisciplinaSemEspaco == '') {
                $('#label-nome').html('Por favor, preencha o campo de nome para a disciplina!');
                $('#txtNomeDisciplina').addClass('erro-form');
                $('#label-nome').show();
                setTimeout(function () {
                    $('#label-nome').fadeOut(1);
                    $('#txtNomeDisciplina').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
            if (nomeProfessor.length == 0 || nomeProfessorSemEspaco == '') {
                $('#label-professor').html('Por favor, preencha o campo de nome para o professor responsável pela disciplina!');
                $('#txtProfessor').addClass('erro-form');
                $('#label-professor').show();
                setTimeout(function () {
                    $('#label-professor').fadeOut(1);
                    $('#txtProfessor').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }

        });
    </script>
</body>



</html>