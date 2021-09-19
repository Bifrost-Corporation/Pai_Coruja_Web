<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />

    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>Cadastrar Escola</title>


</head>

<body>
    <?php
        include("sentinela.php");
        include("globalAdm.php");
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
                        <a href="home-adm.php" class="active-nav">
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
                        <a href="cadastrar-escola.php">
                            <i class="fas fa-school"></i>
                            <span class="links-name">Cadastrar Escola</span>
                        </a>
                    </li>
                    <li class="links-name">
                        <a href="cadastrar-secretaria.php">
                            <i class="fas fa-school"></i>
                            <span class="links-name">Cadastrar Secretária</span>
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
                            <div class="name-menu">Admin</div>
                            <div class="job-menu">Olá Administrador(a)</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <main class="container-main area-cadastro">


        <section class="top-section" id="Topo">
            <div class="voltar">
                <a href="home-adm.php">
                    <span class="fas fa-arrow-left"></span>
                </a>
            </div>
            <div class="titulo-cadastrar">
                <h2>Cadastrar Escola:</h2>
            </div>
        </section>


        <section class="main-section">
            <form name="nomeEscola" class="formulario" method="POST" action="../DAO/inserir-escola.php">
                <div class="user-details">
                    <input type="hidden" value="<?php echo @$_GET['idEscola']; ?>" id="idEscola" name="idEscola">
                    <div class="input-box-width100">
                        <h2>Nome da Escola: </h2>
                        <label class="label-erro" id="label-escola"></label>
                        <input name="txtNomeEscola" value="<?php echo @$_GET['nomeEscola'];?>" id="txtNomeEscola" type="text"
                            placeholder="Insira o nome da escola">
                    </div>
                    <input type="hidden" value="<?php echo @$_GET['idAdministrador'] ?>" id="idAdministrador" name="idAdministrador">
                    <div class="button">
                        <input type="submit" class="btn-nav-exit" value="Cadastrar >">
                    </div>
                </div>
            </form>
        </section>
        <section class="container-controlers">
            <div class="content-card-link1" checked>
                <div class="side-left">
                    <h1>
                        <?php
                            $escolaqtde = new Escola();
                            $listaEscolaQtde = $escolaqtde->contar();
                            foreach($listaEscolaQtde as $linha){
                                echo $linha['qtdeEscola'];
                            }
                        ?>
                    </h1>
                    <p>Escolas</p>
                </div>
                <div class="side-right">    
                <a class="btn-ver-dados-tabela" id="btn-show-div-exibir-dados"><i class="fas fa-school" aria-hidden="true"></i><p> ver todos</p></a>
                
                </div>

            </div>
            <a href="#Topo" class="content-card-link2">
                <div class="side-left">
                    <h1>+</h1>
                    <p>Adicionar Escola</p>
                </div>
                <div class="side-right">
                    <i class="btn-adicionar-aluno fas fa-school" aria-hidden="true"></i>

                </div>
            </a>

        </section>
        <div class="container-exibir-dados">
            <div class="box-titulo-bar-search">
                <h1>Escolas Cadastradas</h1> 
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
                            <td>Alterar</td>
                            <td>Excluir</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $escola = new Escola();
                        $listaEscola = $escola->listar();
                        foreach($listaEscola as $linha){
                    ?>
                        <tr>
                          <td><?php echo $linha['nomeEscola'] ?></td>
                          <td><?php echo "<a class'opcao-icone' href='?idEscola={$linha['idEscola']}&nomeEscola={$linha['nomeEscola']}&idAdministrador={$linha['idAdministrador']}'>"?><i class="icons-table fa fa-cog opcao-icone"></i><?php echo "</a>" ?></td>
                          <td><?php echo "<a href='../DAO/excluir-escola.php?idEscola={$linha['idEscola']}'"?> onclick="return confirm('Você está prestes a excluir a escola: <?php echo $linha['nomeEscola'] ?>, tem certeza?')"><i class="icons-table fas fa-times" aria-hidden="true"></i></td>
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
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        jQuery('form').on('submit', function (e) {
            var nomeEscola = $('#txtNomeEscola').val();
            var nomeEscolaSemEspaco = nomeEscola.trim();
            if (nomeEscolaSemEspaco.length == 0) {
                $('#label-escola').html('Por favor, preencha o campo de nome da escola!');
                $('#txtNomeEscola').addClass('erro-form');
                $('#label-escola').show();
                setTimeout(function () {
                    $('#label-escola').fadeOut(1);
                    $('#txtNomeEscola').removeClass('erro-form');
                    $('#txtNomeEscola').val('');
                }, 5000);
                e.preventDefault();
            }
        });
    </script>
    <script src="../js/showDiv.js">

    </script>

</body>



</html>