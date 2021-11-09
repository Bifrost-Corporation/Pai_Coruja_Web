<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />

    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <title>Cadastrar Escola</title>


    <style>
        form{
            display:none;
        }
    </style>

</head>

<body>
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
                            <a href="dashboard.php">
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
                        <a href="visualizar-dados.php" class="active-nav">
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

        
        
    

    <main class="container-main">
        
        



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
                                            onclick="return confirm('Você está prestes a excluir a conta do professor: <?php echo $linha['nomeProfessor'] ?> da escola, tem certeza?')"><i
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
                                            onclick="return confirm('Você está prestes a excluir a disciplina: <?php echo $linha['nomeDisciplina'] ?>, do professor: <?php echo $linha['nomeProfessor'] ?>, tem certeza?')"><i
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
                                            onclick="return confirm('Você está prestes a excluir a turma: <?php echo $linha['nomeTurma'] ?> da escola, tem certeza?')"><i
                                                class="icons-table fas fa-times" aria-hidden="true"></i><a/></td>
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
                                            onclick="return confirm('Você está prestes a excluir o aluno: <?php echo $linha['nomeAluno'] ?>, da série: <?php echo $linha['nomeTurma'] ?>, tem certeza?')"><i
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
        <form class="formulario" name="formProfessor" id="formProfessor" action="../DAO/inserir-professor.php" method="POST">
                <div class="user-details">
                    <input id="idProfessor" name="idProfessor" type="hidden" value="<?php echo@$_GET['idProfessor'] ?>">
                    <input id="idEscola" name="idEscola" type="hidden" value="<?php echo @$_GET['idEscola'] ?>">
                    <div class="input-box-width100">
                        <h2>Nome do Professor:</h2>
                        <label class="label-erro" id="label-nome"></label>
                        <input name="txtNomeProfessor" id="txtNomeProfessor" type="text"
                            placeholder="Insira o nome do professor" value="<?php echo @$_GET['nomeProfessor'] ?>">
                    </div>
                    <div class="input-box-width100">
                        <h2>Email Professor:</h2>
                        <label class="label-erro" id="label-email"></label>
                        <input name="txtEmailProfessor" id="txtEmailProfessor" type="email"
                            placeholder="Insira o email do professor" value="<?php if(isset($_SESSION['emailProfessor'])){
                                                                                                                        echo $_SESSION['emailProfessor'];
                                                                                                                    }else{
                                                                                                                        echo @$_GET['emailProfessor'];
                                                                                                                    } ?>">
                    </div>
                    <div class="input-box">
                        <h2>Senha Professor:</h2>
                        <label class="label-erro" id="label-senha1"></label>
                        <input name="txtSenhaProfessor" id="txtSenhaProfessor" type="password" placeholder="********">
                    </div>
                    <div class="input-box">
                        <h2>Confirmar senha:</h2>
                        <label class="label-erro" id="label-senha2"></label>
                        <input name="txtConfirmarSenhaProfessor" id="txtConfirmarSenhaProfessor" type="password"
                            placeholder="********">
                    </div>
                    <div class="button">
                        <input type="submit" class="btn-nav-exit" value="Cadastrar">
                    </div>
                </div>
            </form>


            <form class="formulario" name="formDisciplina" id="formDisciplina" action="../DAO/inserir-disciplina.php"
                method="POST">
                <div class="user-details">
                    <input type="hidden" id="idDisciplina" name="idDisciplina" value="<?php echo @$_GET['idDisciplina'] ?>">
                    <input type="hidden" id="idEscola" name="idEscola" value="<?php echo @$_GET['idEscola'] ?>">
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


            
            
            
            <form name="nomeTurma" class="formulario" id="formTurma" method="POST" action="../DAO/inserir-turma.php">
                <div class="user-details">
                    <input type="hidden" id="idTurma" name="idTurma" value="<?php echo @$_GET['idTurma'] ?>">
                    <input type="hidden" id="idEscola" name="idEscola" value="<?php echo @$_GET['idEscola'] ?>">
                    <div class="input-box-width100">
                        <h2>Nome da Turma:</h2>
                        <label class="label-erro" id="label-nome"></label>
                        <input name="txtNomeTurma" id="txtNomeTurma" type="text" placeholder="Insira o nome da turma" value="<?php echo @$_GET['nomeTurma'] ?>">
                    </div>
                    <div class="button">
                        <input type="submit" class="btn-nav-exit" value="Cadastrar">
                    </div>
                </div>
            </form>

            <form class="formulario" name="formAluno" id="formAluno" action="../DAO/inserir-aluno.php" method="POST">
                <div class="user-details">
                    <input type="hidden" id="idAluno" name="idAluno" value="<?php echo @$_GET['idAluno']; ?>">
                    <input type="hidden" id="idEscola" name="idEscola" value="<?php echo @$_GET['idEscola']; ?>">
                    <div class="input-box-width100">
                        <h2>Nome do aluno:</h2>
                        <label class="label-erro" id="label-nomeAluno"></label>
                        <input name="txtNomeAluno" id="txtNomeAluno" type="text" placeholder="Insira o nome do aluno" value="<?php echo @$_GET['nomeAluno']; ?>">
                    </div>
                    <div class="input-box">
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
                        <div id="retornoPesquisa2">

                        </div>
                    </div>
                    <div class="button">
                        <input type="submit" class="btn-nav-exit" value="Cadastrar">
                    </div>
                </div>
            </form>

            <form class="formulario" name="formResponsavel" id="formResponsavel" action="../DAO/inserir-responsavel.php" method="POST">
                <div class="user-details">
                    <input type="hidden" id="idResponsavel" name="idResponsavel" value="<?php echo @$_GET['idResponsavel']; ?>">
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
                        <input type="submit" class="btn-nav-exit" value="Cadastrar">
                    </div>
                </div>
            </form>
    </div>



    
    <script src="../assets/js/modal.js"></script>
    <script src="../assets/js/alterar-dados.js"></script>
    <script src="../assets/js/dash-cadastro.js"></script>
    <script src="../assets/js/formStepsBySteps.js"></script>
    <script src="../assets/js/nav.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.js"></script>
    <script src="../assets/js/carousel.js"></script>

    <script>
        jQuery('#formProfessor').on('submit', function (e){
            var nomeProfessor = $('#txtNomeProfessor').val();
            var email = $('#txtEmailProfessor').val();
            var senha1 = $('#txtSenhaProfessor').val();
            var senha2 = $('#txtConfirmarSenhaProfessor').val();
            var nomeProfessorSemEspaco = nomeProfessor.trim();
            var emailSemEspaco = email.trim();
            var senha1SemEspaco = senha1.trim();
            var senha2SemEspaco = senha2.trim();
            if (nomeProfessor.length == 0 || nomeProfessorSemEspaco == '') {
                $('#label-nome').html('Por favor, preencha o campo de nome para o professor!');
                $('#txtNomeProfessor').addClass('erro-form');
                $('#label-nome').show();
                setTimeout(function () {
                    $('#label-nome').fadeOut(1);
                    $('#txtNomeProfessor').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
            if (email.length == 0 || emailSemEspaco == '') {
                $('#label-email').html('Por favor, preencha o campo de email para o professor!');
                $('#txtEmailProfessor').addClass('erro-form');
                $('#label-email').show();
                setTimeout(function () {
                    $('#label-email').fadeOut(1);
                    $('#txtEmailProfessor').removeClass('erro-form');
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
                    var verificaarroba = true;
                    var verificaponto = true;
                }
                if (verificaarroba == false || verificaponto == false) {
                    $('#label-email').html('Email inválido!');
                    $('#txtEmailProfessor').addClass('erro-form');
                    $('#label-email').show();
                    setTimeout(function () {
                        $('#label-email').fadeOut(1);
                        $('#txtEmailProfessor').removeClass('erro-form');
                    }, 5000);
                    e.preventDefault();
                }
            }
            if (senha1.length == 0 || senha1SemEspaco == ''){
                $('#label-senha1').html('Por favor, preencha o campo de senha para o professor!');
                $('#txtSenhaProfessor').addClass('erro-form');
                $('#label-senha1').show();
                setTimeout(function () {
                    $('#label-senha1').fadeOut(1);
                    $('#txtSenhaProfessor').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
            if (senha2.length == 0 || senha2SemEspaco == ''){
                $('#label-senha2').html('Por favor, preencha o campo de senha para o professor!');
                $('#txtConfirmarSenhaProfessor').addClass('erro-form');
                $('#label-senha2').show();
                setTimeout(function () {
                    $('#label-senha2').fadeOut(1);
                    $('#txtConfirmarSenhaProfessor').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
            if (senha1 != senha2){
                $('#label-senha1').html('Senhas não correspondem!');
                $('#txtSenhaProfessor').addClass('erro-form');
                $('#label-senha1').show();
                $('#label-senha2').html('Senhas não correspondem!');
                $('#txtConfirmarSenhaProfessor').addClass('erro-form');
                $('#label-senha2').show();
                setTimeout(function () {
                    $('#label-senha1').fadeOut(1);
                    $('#txtSenhaProfessor').removeClass('erro-form');
                    $('#label-senha2').fadeOut(1);
                    $('#txtConfirmarSenhaProfessor').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
        });

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

        jQuery('#formDisciplina').on('submit', function (e) {
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

        jQuery('#txtTurma').keyup(function () {
            var textoInserido = $(this).val();
            if (textoInserido != '') {
                $.ajax({
                    url: '../DAO/procurar-turma-aluno.php',
                    method: 'POST',
                    data: {
                        query: textoInserido
                    },
                    success: function (resposta) {
                        $("#retornoPesquisa2").html(resposta);
                    }
                });
            } else {
                $("#retornoPesquisa2").html('');
            }
        });

        $(document).on('click', '.opcao-consulta', function () {
            $("#txtTurma").val($(this).text());
            $("#retornoPesquisa2").html("");
        });

        jQuery('#formAluno').on('submit', function (e) {
            var nomeAluno = $('#txtNomeAluno').val();
            var dataNasc = $('#dataNasc').val();
            var turma = $('#txtTurma').val();
            var nomeAlunoSemEspaco = nomeAluno.trim();
            var dataNascSemEspaco = dataNasc.trim();
            var turmaSemEspaco = turma.trim();
            if (nomeAluno.length == 0 || nomeAlunoSemEspaco == '') {
                $('#label-nomeAluno').html('Por favor, preencha o campo de nome para o aluno!');
                $('#txtNomeAluno').addClass('erro-form');
                $('#label-nomeAluno').show();
                setTimeout(function () {
                    $('#label-nomeAluno').fadeOut(1);
                    $('#txtNomeAluno').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
            if (dataNasc.length == 0 || dataNascSemEspaco == '') {
                $('#label-dataNasc').html('Por favor, preencha o campo de data de nascimento!');
                $('#dataNasc').addClass('erro-form');
                $('#label-dataNasc').show();
                setTimeout(function () {
                    $('#label-dataNasc').fadeOut(1);
                    $('#dataNasc').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            } else {
                var dataNasc = $('#dataNasc').val().replace(/-/g, ",");
                var dataFormatada = new Date(dataNasc);
                var ano = dataFormatada.getFullYear();
                var anoAtual = new Date().getFullYear();
                if (ano >= anoAtual) {
                    $('#label-dataNasc').html('Data de nascimento inválida!');
                    $('#dataNasc').addClass('erro-form');
                    $('#label-dataNasc').show();
                    setTimeout(function () {
                        $('#label-dataNasc').fadeOut(1);
                        $('#dataNasc').removeClass('erro-form');
                    }, 5000);
                    e.preventDefault();
                }
            }
            if (turma.length == 0 || turmaSemEspaco == '') {
                $('#label-turma').html('Por favor, preencha o campo de turma do aluno!');
                $('#txtTurma').addClass('erro-form');
                $('#label-turma').show();
                setTimeout(function () {
                    $('#label-turma').fadeOut(1);
                    $('#txtTurma').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
        });

        
    </script>


</body>

</html>