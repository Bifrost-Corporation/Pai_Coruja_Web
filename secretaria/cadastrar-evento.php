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
                <h2>Novo Evento:</h2>
            </div>
        </section>


        <section class="main-section">
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
    </main>

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