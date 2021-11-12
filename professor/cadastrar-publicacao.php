<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css"  href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />

    <title>cadastrar - Publicação</title>


</head>

<body>
    <?php
        include("sentinela.php");
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
                            <div class="name-menu"><?php echo $_SESSION['nomeProfessor'] ?></div>
                            <small class="job-menu">Olá Professor(a)</small>
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
                            <a href="home-professor.php">
                                <i class="material-icons-round">space_dashboard</i>
                                <span class="links-name tooltip">Dashboard</span>
                            </a>
                        </li>
                        <li class="links-name">
                            <a href="cadastrar-publicacao.php" class="active-nav">
                                <i class="material-icons-round">notes</i>
                                <span class="links-name tooltip">Cadastrar Publicação</span>
                            </a>
                        </li>
                        <li class="links-name">
                        <a href="cadastrar-flags.php">
                            <i class="material-icons-round">sticky_note_2</i>
                                <span class="links-name tooltip">Cadastrar Observações</span>
                            </a>
                        </li>
                        <li class="links-name">
                            <a href="chat-professor.php" >
                                <i class="material-icons-round">chat_bubble</i>
                                <span class="links-name tooltip">Pai Coruja Chat</span>
                            </a>
                        </li>
                    </div>
                </ul>
                
            </div>
        </header>


    <main class="container-main container-dash">
        
        <div class="ola-nav-dash">
            <h1>Cadastrar Publicação</h1>
        </div>


        <section class="container-dados-dash">
            <form class="formulario" action="../DAO/inserir-publicacao.php" method="POST">
                <div class="user-details">
                    <div class="input-box-width100">
                        <h2>Título da Publicação:</h2>
                        <label class="label-erro" id="label-nome"></label>
                        <input name="txtNome" id="txtNome" type="text" placeholder="Insira o nome da Publicação">
                    </div>
                    <div class="input-box-width100">
                        <h2>Descrição da Publicação:</h2>
                        <label class="label-erro" id="label-descricao"></label>
                        <input name="txtDescricao" id="txtDescricao" type="text" placeholder="Insira a descrição...">
                    </div>

                    <div class="button">
                        <input type="submit" class="btn-nav-exit">
                    </div>
                </div>
            </form>
        </section>
    </main>

    <script src="../assets/js/nav.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

    <script>
        jQuery('form').on('submit', function(e){
            var nome = $('#txtNome').val();
            var descricao = $('#txtDescricao').val();
            var nomeSemEspaco = nome.trim();
            var descricaoSemEspaco = descricao.trim();
            if(nome.length == 0 || nomeSemEspaco == ''){
                $('#label-nome').html('De um título a publicação!');
                $('#txtNome').addClass('erro-form');
                $('#label-nome').show();
                setTimeout(function () {
                    $('#label-nome').fadeOut(1);
                    $('#txtNome').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
            if(descricao.length == 0 || descricaoSemEspaco == ''){
                $('#label-descricao').html('Escreva uma descrição para a publicação!');
                $('#txtDescricao').addClass('erro-form');
                $('#label-descricao').show();
                setTimeout(function () {
                    $('#label-descricao').fadeOut(1);
                    $('#txtDescricao').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
            
        });
    </script>

</body>



</html>