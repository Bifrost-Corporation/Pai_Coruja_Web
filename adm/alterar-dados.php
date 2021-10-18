<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />

    <link rel="stylesheet" type="text/css"  href="../assets/css/style.css">
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
            <div class="logo-name"><a class="btn-nav-pc-open"><img src="../img/pai_coruja_branca.png"></a>
            <!-- <i class="fas fa-bars">dffg</i> -->
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
                <a href="home-adm.php">
                    <i class="fas fa-calendar"></i>
                    <span class="links-name">Mural</span>
                </a>
            </li>
            <li class="links-name">
                <a href="cadastrar-escola.php" class="active-nav">
                    <i class="fas fa-school"></i>
                    <span class="links-name">Cadastrar Escola</span>
                </a>
            </li>
            <li class="links-name">
                <a href="alterar-dados.php">
                    <i class="fas fa-school"></i>
                    <span class="links-name">Alterar/Visualizar Dados</span>
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

    <main >



        <div class="container-dash">
            <div class="ola-nav-dash">
                <h1>Gerenciador de Dados</h1>
            </div>

            <div class="container-dados-cadastro">


                <!-- <div class="abas-container">
                    <button class="aba-cadastro" onclick="openTab(event,'Professor-tab')">
                        <h3>Professor / Diciplina</h3>
                    </button>
                    <button class="aba-cadastro" onclick="openTab(event,'Turma-tab')">
                        <h3>Turma / Horario</h3>
                    </button>
                    <button class="aba-cadastro" onclick="openTab(event,'Aluno-tab')">
                        <h3>Aluno / Responsável</h3>
                    </button>



                </div> -->
                <div class="forms-cadastro">
                    <div class="container-exiir-dados">
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