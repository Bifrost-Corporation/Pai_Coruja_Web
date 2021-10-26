<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />

    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <title>Cadastrar Escola</title>


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
                        <a href="alterar-dados.php" class="active-nav">
                            <i class="fas fa-school"></i>
                            <span class="links-name">Alterar Dados</span>
                        </a>
                    </li>
                    <li class="links-name">
                        <a href="cadastrar-evento.php">
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
                    <a href="trocar-foto-perfil.php">
                        <i class="fas fa-user-cog"></i>
                        <span>Foto de perfil</span>
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
                <h1>Gerenciador de Dados</h1>
            </div>

            <div class="container-dados-cadastro">


                <div class="abas-container">
                    <button class="aba-cadastro" onclick="openTab(event,'Professor-tab')">
                        <h3>Professores</h3>
                    </button>
                    <button class="aba-cadastro" onclick="openTab(event,'Disciplina-tab')">
                        <h3>Diciplinas</h3>
                    </button>
                    <button class="aba-cadastro" onclick="openTab(event,'Turma-tab')">
                        <h3>Turmas</h3>
                    </button>
                    <button class="aba-cadastro" onclick="openTab(event,'Aluno-tab')">
                        <h3>Alunos</h3>
                    </button>
                    <button class="aba-cadastro" onclick="openTab(event,'Responsavel-tab')">
                        <h3>Responsáveis</h3>
                    </button>



                </div>
                <div class="forms-cadastro">


                    <section class="conteudo-aba" id="Professor-tab">
                        <div class="box-titulo-bar-search">
                            <h1>Professores Cadastrados</h1>
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
                                        <td>Email:</td>
                                        <td>Alterar</td>
                                        <td>Excluir</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                $professor = new Professor();
                                $listaProfessor = $professor->contar($_SESSION['idEscola']);
                                $listaProfessor = $professor->listarEscola($_SESSION['idEscola']);
                                foreach($listaProfessor as $linha){
                        ?>
                                    <tr>
                                        <td><?php echo $linha['nomeProfessor'] ?></td>
                                        <td><?php echo $linha['emailProfessor'] ?></td>
                                        <td><?php echo "<a class'opcao-icone' href='?idProfessor={$linha['idProfessor']}&nomeProfessor={$linha['nomeProfessor']}&emailProfessor={$linha['emailProfessor']}&idEscola={$linha['idEscola']}'>"; ?><i
                                                class="icons-table fa fa-cog opcao-icone"></i><?php echo "</a>" ?></td>
                                        <td><?php echo "<a href='../DAO/excluir-professor.php?idProfessor={$linha['idProfessor']}'"?>
                                            onclick="return confirm('Você está prestes a excluir a conta do professor:
                                            <?php echo $linha['nomeProfessor'] ?> da escola, tem certeza?')"><i
                                                class="icons-table fas fa-times" aria-hidden="true"></i></td>
                                    </tr>
                                    <?php
                                }
                        ?>
                                </tbody>
                            </table>
                        </div>
                    </section>


                    <section class="conteudo-aba" id="Disciplina-tab">
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
                                $disciplina = new Disciplina();
                                $listaDisciplina = $disciplina->contar($_SESSION['idEscola']);
                                $listaDisciplina = $disciplina->listar($_SESSION['idEscola']);
                                foreach($listaDisciplina as $linha){
                        ?>
                                    <tr>
                                        <td><?php echo $linha['nomeDisciplina'] ?></td>
                                        <td><?php echo $linha['nomeProfessor'] ?></td>
                                        <td><?php echo "<a class'opcao-icone' href='?idDisciplina={$linha['idDisciplina']}&nomeDisciplina={$linha['nomeDisciplina']}&idProfessor={$linha['idProfessor']}&idEscola={$linha['idEscola']}&nomeProfessor={$linha['nomeProfessor']}'>"; ?><i
                                                class="icons-table fa fa-cog opcao-icone"></i><?php echo "</a>" ?></td>
                                        <td><?php echo "<a href='../DAO/excluir-disciplina.php?idDisciplina={$linha['idDisciplina']}'"?>
                                            onclick="return confirm('Você está prestes a excluir a disciplina:
                                            <?php echo $linha['nomeDisciplina'] ?>, do professor:
                                            <?php echo $linha['nomeProfessor'] ?>, tem certeza?')"><i
                                                class="icons-table fas fa-times" aria-hidden="true"></i></td>
                                    </tr>
                                    <?php
                                }
                        ?>
                                </tbody>
                            </table>
                        </div>
                    </section>

                    <section class="conteudo-aba" id="Turma-tab">
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
                                    $turma = new Turma();
                                    $listaTurma = $turma->contar($_SESSION['idEscola']);
                                    $listaTurma = $turma->listar($_SESSION['idEscola']);
                                    foreach($listaTurma as $linha){
                            ?>
                                    <tr>
                                        <td><?php echo $linha['nomeTurma'] ?></td>
                                        <td><?php echo "<a class'opcao-icone' href='?idTurma={$linha['idTurma']}&nomeTurma={$linha['nomeTurma']}&idEscola={$linha['idEscola']}'>"; ?><i
                                                class="icons-table fa fa-cog opcao-icone"></i><?php echo "</a>" ?></td>
                                        <td><?php echo "<a href='../DAO/excluir-turma.php?idTurma={$linha['idTurma']}'"?>
                                            onclick="return confirm('Você está prestes a excluir a turma:
                                            <?php echo $linha['nomeTurma'] ?> da escola, tem certeza?')"><i
                                                class="icons-table fas fa-times" aria-hidden="true"></i></td>
                                    </tr>
                                    <?php
                                    }
                            ?>
                                </tbody>
                            </table>
                        </div>
                    </section>
                    <section class="conteudo-aba" id="Aluno-tab">
                        <div class="box-titulo-bar-search">
                            <h1>Alunos Cadastrados</h1>
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
                                        <td>Data de Nascimento:</td>
                                        <td>Turma:</td>
                                        <td>Alterar</td>
                                        <td>Excluir</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                $aluno = new Aluno();
                                $listaAluno = $aluno->contar($_SESSION['idEscola']);
                                
                                $listaAluno = $aluno->listar($_SESSION['idEscola']);
                                foreach($listaAluno as $linha){
                            ?>
                                    <tr>
                                        <td><?php echo $linha['nomeAluno'] ?></td>
                                        <td><?php echo $linha['dataNascAluno'] ?></td>
                                        <td><?php echo $linha['nomeTurma'] ?></td>
                                        <td><?php echo "<a class'opcao-icone' href='?idAluno={$linha['idAluno']}&nomeAluno={$linha['nomeAluno']}&dataNascAluno={$linha['dataNascAluno']}&idTurma={$linha['idTurma']}&idEscola={$linha['idEscola']}&nomeTurma={$linha['nomeTurma']}'>"?><i
                                                class="icons-table fa fa-cog opcao-icone"></i><?php echo "</a>" ?></td>
                                        <td><?php echo "<a href='../DAO/excluir-aluno.php?idAluno={$linha['idAluno']}'"?>
                                            onclick="return confirm('Você está prestes a excluir o aluno:
                                            <?php echo $linha['nomeAluno'] ?>, da série:
                                            <?php echo $linha['nomeTurma'] ?>, tem certeza?')"><i
                                                class="icons-table fas fa-times" aria-hidden="true"></i></td>
                                    </tr>
                                    <?php
                            }
                            ?>

                                </tbody>
                            </table>
                        </div>
                    </section>
                    <section class="conteudo-aba" id="Responsavel-tab">
                        <div class="box-titulo-bar-search">
                            <h1>Responsáveis Cadastrados</h1>
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
                                        <td>CPF:</td>
                                        <td>Email:</td>
                                        <td>Aluno:</td>
                                        <td>Alterar</td>
                                        <td>Excluir</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                        $responsavel = new Responsavel();
                        $listaResponsavel = $responsavel->contar($_SESSION['idEscola']);
                        foreach($listaResponsavel as $linha){
                            echo $linha['qtdeResponsavel'];
                        }
                        $listaResponsavel = $responsavel->listar($_SESSION['idEscola']);
                        foreach($listaResponsavel as $linha){
                    ?>
                                    <tr>
                                        <td><?php echo $linha['nomeResponsavel'] ?></td>
                                        <td><?php echo $linha['cpfResponsavel'] ?></td>
                                        <td><?php echo $linha['emailResponsavel'] ?></td>
                                        <td><?php echo $linha['nomeAluno'] ?></td>
                                        <td><?php echo "<a class'opcao-icone btnOpenModal' href='?idResponsavel={$linha['idResponsavel']}&nomeResponsavel={$linha['nomeResponsavel']}&cpfResponsavel={$linha['cpfResponsavel']}&emailResponsavel={$linha['emailResponsavel']}&idAluno={$linha['idAluno']}&nomeAluno={$linha['nomeAluno']}&turma={$linha['turmaAluno']}&telefoneResponsavel={$linha['numTelefoneResponsavel']}&cep={$linha['cepEnderecoResponsavel']}&rua={$linha['logradouroEnderecoResponsavel']}&numCasa={$linha['numCasaEnderecoResponsavel']}&complemento={$linha['complementoEnderecoResponsavel']}&bairro={$linha['bairroEnderecoResponsavel']}&cidade={$linha['cidadeEnderecoResponsavel']}'>"?><i
                                                class="icons-table fa fa-cog opcao-icone"></i><?php echo "</a>" ?></td>
                                        <td><?php echo "<a href='../DAO/excluir-responsavel.php?idResponsavel={$linha['idResponsavel']}'"?>
                                            onclick="return confirm('Você está prestes a excluir a conta do responsável:
                                            <?php echo $linha['nomeResponsavel'] ?>, responsável por:
                                            <?php echo $linha['nomeAluno'] ?>, tem certeza?')"><i
                                                class="icons-table fas fa-times" aria-hidden="true"></i></td>
                                    </tr>
                                    <?php
                       }
                    ?>

                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>
            </div>

        </div>
    </main>

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
    <script>
        let modals = document.getElementById("myModal");
        let url = window.location.href
        if(url.indexOf("?")){
            modals.classList.toggle("modal-active");
        }
        span.onclick = function() {
            modals.classList.toggle("modal-active");
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modals.classList.toggle("modal-active");
            }
        }
    </script>
    <script src="../assets/js/dash-cadastro.js"></script>
    <script src="../assets/js/formStepsBySteps.js"></script>
    <script src="../assets/js/nav.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.js"></script>
    <script src="../assets/js/carousel.js"></script>


</body>

</html>