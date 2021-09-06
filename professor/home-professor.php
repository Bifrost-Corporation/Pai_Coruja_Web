<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />

    <title>Home - Professor</title>


</head>

<body>
    <?php
        include("sentinela.php");
    ?>
    <header>

        <nav class="nav-bar">
            <a href=""><img class="logo" src="../images/teste_branco.png"></a>
            <ul class="ul-area-btn">
                <li class="nav-li"><a class="btn-nav-exit" href="logout.php">Sair</a></li>
            </ul>
        </nav>

        <nav class="sidebar">
            <div class="perfil">
                <div class="img-perfil">
                    <img src="../images/usuario-de-perfil.png">
                </div>
                <div class="text-perfil">
                    <p>Olá, <?php echo $_SESSION['nomeProfessor'] ?></p>
                </div>
            </div>
            <ul class="ul-sidebar-menu">
                <li>
                    <a href="#" onclick="openMenu()" id="sub-menu-button" class="visao-geral-btn">Visão Geral
                        <span class="fas fa-caret-down first"></span>
                    </a>

                    <ul id="sub-menu">
                        <li><a href="#">Mural</a></li>
                        <li><a href="#">Avaliação dos Professores</a></li>
                        <li><a href="#">Eventos Programados</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#" onclick="openMenu2()" id="sub-menu-button-2" class="outro-btn">Professor
                        <span class="fas fa-caret-down second"></span>
                    </a>
                    <ul id="sub-menu-2">
                        <li><a href="cadastrar-flags.html">Cadastrar Observação</a></li>
                        <li><a href="cadastrar-publicacao.html">Cadastrar Publicação</a></li>
                    </ul>
                </li>

            </ul>
        </nav>
    </header>


    <main class="container-main">
        <h1>PROFESSOR</h1>
    </main>

    <script src="../js/nav.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
</body>



</html>