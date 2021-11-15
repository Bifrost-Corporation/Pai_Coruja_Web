<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css"  href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />

    <title>Nova Publicação</title>


</head>

<body>
    <?php
        include ('sentinela.php');
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
                        <a href="visualizar-dados.php">
                            <i class="material-icons-round">view_list</i>
                                <span class="links-name tooltip">Alterar Dados</span>
                            </a>
                        </li>
                        <li class="links-name">
                            <a href="cadastrar-evento.php" class="active-nav">
                                <i class="material-icons-round">edit_calendar</i>
                                <span class="links-name tooltip">Cadastrar Eventos</span>
                            </a>
                        </li>
                        <li class="links-name">
                            <a href="cadastrar-publicacao.php">
                                <i class="material-icons-round">notes</i>
                                <span class="links-name tooltip">Cadastrar Publicação</span>
                            </a>
                        </li>
                        <li class="links-name">
                            <a href="chat-secretaria.php" >
                                <i class="material-icons-round">chat_bubble</i>
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
            <h1>Cadastrar Evento</h1>
        </div>


        <section class="">
            <form class="formulario" name="formEvento" action="../DAO/inserir-evento.php" method="POST"
                enctype="multipart/form-data">
                <div class="user-details">
                    <div class="input-box-width100">
                        <h2 class="h2Adicionar">Adicionar imagem:</h2>
                        <label class="label-erro" id="label-foto"></label>
                        <div>
                            <label class="carregar-imagem-pub" for="arquivo">Carregar Imagem Evento</label>
                            <input name="arquivo" id="arquivo" type="file" accept="image/*">
                            <label class="label-erro" id="label-arquivo"></label>
                            <span id="nome-arquivo"></span>
                        </div>
                    </div>
                    <div class="input-box-width100">
                        <h2>Nome do evento:</h2>
                        <label class="label-erro" id="label-nome"></label>
                        <input name="txtNomeEvento" id="txtNomeEvento" type="text"
                            placeholder="Insira o nome da Publicação">
                    </div>
                    <div class="input-box-width100">
                        <h2>Descrição do evento:</h2>
                        <label class="label-erro" id="label-descricao"></label>
                        <input name="txtDescricaoEvento" id="txtDescricaoEvento" type="text"
                            placeholder="Insira a descrição...">
                    </div>
                    <div class="input-box-width100">
                        <h2>Data de realização do evento:</h2>
                        <label class="label-erro" id="label-data"></label>
                        <input name="txtData" id="txtData" type="date" placeholder="ex:00/00/00">
                    </div>
                    <div class="button">
                        <input type="submit" class="btn-nav-exit">
                    </div>
                </div>
            </form>
        </section>
    </div>
    </main>


    <div id="modalProfile" class="modal modal-profile">
            
            <!-- Modal content -->
        <div class="modal-content-profile">
            <div class="card-perfil">
                <span class="closeModalProfile"><i class="fas fa-times"></i></span>
                <div class="perfil-modal-body">
                    <img src="../img/usuario-de-perfil.png" alt="Sua Foto de Perfil" style="align-self: center;box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.063);">
                    <div class="title-perfil-modal">
                        <h1><?php echo $_SESSION['nomeSecretaria'] ?></h1>
                        <small>Secretário(a) Escolar</small>
                        <small>Essa imagem será exibida para todos no Pai Coruja</small>
                    </div>
                    <form name="formImagemPerfil" id="formImagemPerfil" action="../DAO/inserir-imagem-secretaria.php" method="POST" class="botoes-perfil-upload" enctype="multipart/form-data">
                                    <label class="botao-cadastrar-perfil" for="imagemPerfil">Carregar Imagem Perfil</label>
                                    <input name="imagemPerfil" id="imagemPerfil" type="file" accept="image/*">
                                    <label class="label-erro" id="label-arquivo"></label>
                                    <span id="nome-arquivo"></span>
                        <button class="botao-cadastrar-perfil" type="submit" value="Enviar">Enviar</button>
                    </form> 
                </div>
                
            </div>
        </div>

    </div>

    <script src="../assets/js/modalProfile.js"></script>
    <script src="../assets/js/nav.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

    <script>

        var $input = document.getElementById('arquivo'),
        $fileName = document.getElementById('nome-arquivo');

        $input.addEventListener('change', function(){
            $fileName.textContent = this.value;
        });

        jQuery('form').on('submit', function (e) {
            var nomeEvento = $('#txtNomeEvento').val();
            var descricaoEvento = $('#txtDescricaoEvento').val();
            var dataEvento = $('#txtData').val();
            var nomeEventoSemEspaco = nomeEvento.trim();
            var descricaoEventoSemEspaco = descricaoEvento.trim();
            var dataEventoSemEspaco = dataEvento.trim();
            if (nomeEvento.length == 0 || nomeEventoSemEspaco == '') {
                $('#label-nome').html('Por favor, preencha o campo de nome para o evento!');
                $('#txtNomeEvento').addClass('erro-form');
                $('#label-nome').show();
                setTimeout(function () {
                    $('#label-nome').fadeOut(1);
                    $('#txtNomeEvento').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
            if (descricaoEvento.length == 0 || descricaoEventoSemEspaco == '') {
                $('#label-descricao').html('Por favor, preencha o campo de descrição para o evento!');
                $('#txtDescricaoEvento').addClass('erro-form');
                $('#label-descricao').show();
                setTimeout(function () {
                    $('#label-descricao').fadeOut(1);
                    $('#txtDescricaoEvento').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
            if (dataEvento.length == 0 || dataEventoSemEspaco == '') {
                $('#label-data').html('Por favor, preencha o campo de data para o evento!');
                $('#txtData').addClass('erro-form');
                $('#label-data').show();
                setTimeout(function () {
                    $('#label-data').fadeOut(1);
                    $('#txtData').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
        });
    </script>

</body>




</html>