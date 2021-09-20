<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />

    <title>Cadastro Professor</title>


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


        <section class="top-section" id="Topo">
            <div class="voltar">
                <a href="home-secretaria.php">
                    <span class="fas fa-arrow-left"></span>Voltar
                </a>
            </div>
            <div class="titulo-cadastrar">
                <h2>Cadastrar Professor:</h2>
            </div>
        </section>


        <section class="main-section">
            <form class="formulario" name="form-professor" action="../DAO/inserir-professor.php" method="POST">
                <div class="user-details">
                    <input id="idProfessor" name="idProfessor" type="hidden" value="<?php echo@$_GET['idProfessor'] ?>">
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
        </section>
        <section class="container-controlers">
            <div class="content-card-link1" checked>
                <div class="side-left">
                    <h1>
                        <?php 
                            $professor = new Professor();
                            $listaProfessor = $professor->contar($_SESSION['idEscola']);
                            foreach($listaProfessor as $linha){
                                echo $linha['qtdeProfessor'];
                            }
                        ?>
                    </h1>
                    <p>Professores</p>
                </div>
                <div class="side-right">    
                <a class="btn-ver-dados-tabela" id="btn-show-div-exibir-dados"><i class="fas fa-chalkboard-teacher" aria-hidden="true"></i><p> ver todos</p></a>
                
                </div>

            </div>
            <a href="#Topo" class="content-card-link2">
                <div class="side-left">
                    <h1>+</h1>
                    <p>Adicionar Professor(a)</p>
                </div>
                <div class="side-right">
                    <i class="btn-adicionar-aluno fas fa-chalkboard-teacher" aria-hidden="true"></i>
                </div>
            </a>

        </section>
        <div class="container-exibir-dados">
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
                        $listaProfessor = $professor->listarEscola($_SESSION['idEscola']);
                        foreach($listaProfessor as $linha){
                   ?>
                        <tr>
                            <td><?php echo $linha['nomeProfessor'] ?></td>
                            <td><?php echo $linha['emailProfessor'] ?></td>
                            <td><?php echo "<a class'opcao-icone' href='?idProfessor={$linha['idProfessor']}&nomeProfessor={$linha['nomeProfessor']}&emailProfessor={$linha['emailProfessor']}&idEscola={$linha['idEscola']}'>"; ?><i class="icons-table fa fa-cog opcao-icone"></i><?php echo "</a>" ?></td>
                            <td><?php echo "<a href='../DAO/excluir-professor.php?idProfessor={$linha['idProfessor']}'"?> onclick="return confirm('Você está prestes a excluir a conta do professor: <?php echo $linha['nomeProfessor'] ?> da escola, tem certeza?')"><i class="icons-table fas fa-times" aria-hidden="true"></i></td>
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
        $(document).ready(function(){
            var repeteEmail = "<?php if(isset($_SESSION['repeteEmail'])){echo true;}else{echo false;} ?>" 
            var valueEmail = $('#txtEmailProfessor').val();
            if(valueEmail.length > 0 && repeteEmail == true){
                $('#label-email').html('Email já cadastrado!');
                $('#txtEmailProfessor').addClass('erro-form');
                $('#label-email').show();
                setTimeout(function () {
                    $('#label-email').fadeOut(1);
                    $('#txtEmailProfessor').removeClass('erro-form');
                    $('#txtEmailProfessor').val('');
                }, 5000);
                <?php
                    unset($_SESSION['emailProfessor']);
                    unset($_SERVER['repeteEmail']);
                ?>
                e.preventDefault();
            }
        });

        jQuery('form').on('submit', function (e) {
            var nome = $('#txtNomeProfessor').val();
            var email = $('#txtEmailProfessor').val();
            var senha1 = $('#txtSenhaProfessor').val();
            var senha2 = $('#txtConfirmarSenhaProfessor').val();
            var nomeSemEspaco = nome.trim();
            var emailSemEspaco = email.trim();
            var senha1SemEspaco = senha1.trim();
            var senha2SemEspaco = senha2.trim();
            if (nome.length == 0 || nomeSemEspaco == '') {
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
                verificaarroba = false;
                verificaponto = false;
                for (var i = 0; i < email.length; i++) {
                    if (email.charAt(i) == '@' && i + 1 < email.length) {
                        posicaoarroba = i;
                    }
                    if (email.charAt(i) == '.' && i + 1 < email.length) {
                        posicaoponto = i;
                    }
                }
                if (posicaoponto > posicaoarroba) {
                    verificaarroba = true;
                    verificaponto = true;
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
            if (senha1.length == 0 || senha1SemEspaco == '') {
                $('#label-senha1').html('Por favor, preencha o campo de senha!');
                $('#txtSenhaProfessor').addClass('erro-form');
                $('#label-senha1').show();
                setTimeout(function () {
                    $('#label-senha1').fadeOut(1);
                    $('#txtSenhaProfessor').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
            if (senha2.length == 0 || senha2SemEspaco == '') {
                $('#label-senha2').html('Por favor, confirme a senha!');
                $('#txtConfirmarSenhaProfessor').addClass('erro-form');
                $('#label-senha2').show();
                setTimeout(function () {
                    $('#label-senha2').fadeOut(1);
                    $('#txtConfirmarSenhaProfessor').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
            if (senha1 != senha2) {
                $('#label-senha1').html('As senhas não correspondem!');
                $('#txtSenhaProfessor').addClass('erro-form');
                $('#label-senha1').show();
                setTimeout(function () {
                    $('#label-senha1').fadeOut(1);
                    $('#txtSenhaProfessor').removeClass('erro-form');
                }, 5000);
                $('#label-senha2').html('As senhas não correspondem!');
                $('#txtConfirmarSenhaProfessor').addClass('erro-form');
                $('#label-senha2').show();
                setTimeout(function () {
                    $('#label-senha2').fadeOut(1);
                    $('#txtConfirmarSenhaProfessor').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
        });
    </script>

</body>



</html>