<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />

    <title>Cadastro Horário Turma</title>


</head>

<body>
    <?php
        include ('sentinela.php');
    ?>
    <header>

        <nav class="nav-bar">
            <a href=""><img class="logo" src="../images/pai_coruja_3.png"></a>
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
                    <p>Olá, <?php echo $_SESSION['nomeSecretaria'] ?></p>
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
                    <a href="#" onclick="openMenu2()" id="sub-menu-button-2" class="outro-btn">Cadastrar
                        <span class="fas fa-caret-down second"></span>
                    </a>
                    <ul id="sub-menu-2">
                        <li><a href="cadastrar-aluno.php">Cadastrar Aluno</a></li>
                        <li><a href="cadastrar-professor.php">Cadastrar Professor</a></li>
                        <li><a href="cadastrar-responsavel.php">Cadastrar Responsável</a></li>
                        <li><a href="cadastrar-turma.php">Cadastrar Turma</a></li>
                        <li><a href="cadastrar-disciplina.php">Cadastrar Disciplina</a></li>
                        <li><a href="cadastrar-horario-turma.php">Cadastrar Horários</a></li>
                        <li><a href="nova-publicacao.html">Nova Publicação</a></li>
                    </ul>
                </li>

            </ul>
        </nav>
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


        <section class="main-section">
            <form class="formulario" name="formDisciplina" id="formDisciplina" action="../DAO/inserir-disciplina.php" method="POST">
                <div class="user-details">
                    <div class="input-box-width100">
                        <h2>Nome da disciplina:</h2>
                        <label class="label-erro" id="label-nome"></label>
                        <input name="txtNomeDisciplina" id="txtNomeDisciplina" type="text" placeholder="Insira o nome da disciplina">
                    </div>
                    <div class="input-box-width100">
                        <h2>Professor:</h2>
                        <label class="label-erro" id="label-professor"></label>
                        <input name="txtProfessor" id="txtProfessor" type="text" placeholder="Insira o professor responsável pela disciplina">
                        <div id="retornoPesquisa">
                            
                        </div>
                    </div>
                    <div class="button">
                        <input type="submit" class="btn-nav-exit" value="Cadastrar">
                    </div>
                </div>
            </form>
        </section>
    </main>

    <script src="../js/nav.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

    <script>
        jQuery('#txtProfessor').keyup(function(){
            var textoInserido = $(this).val();
            if(textoInserido != ''){
                $.ajax({
                    url: '../DAO/procurar-professor.php',
                    method: 'POST',
                    data: {query:textoInserido},
                    success:function(resposta){
                        $("#retornoPesquisa").html(resposta);
                    }
                });
            } 
            else {
                $("#retornoPesquisa").html('');
            }
        });

        $(document).on('click','.opcao-consulta',function(){
            $("#txtProfessor").val($(this).text());
            $("#retornoPesquisa").html("");
        });

        jQuery('form').on('submit', function(e){
            var nomeDisciplina = $('#txtNomeDisciplina').val();
            var nomeProfessor = $('#txtProfessor').val();
            if(nomeDisciplina.length == 0){
                $('#label-nome').html('Por favor, preencha o campo de nome para a disciplina!');
                $('#txtNomeDisciplina').addClass('erro-form');
                $('#label-nome').show();
                setTimeout(function(){
                    $('#label-nome').fadeOut(1);
                    $('#txtNomeDisciplina').removeClass('erro-form');
                },5000);
                e.preventDefault();
            }
            if(nomeProfessor.length == 0){
                $('#label-professor').html('Por favor, preencha o campo de nome para o professor!');
                $('#txtProfessor').addClass('erro-form');
                $('#label-professor').show();
                setTimeout(function(){
                    $('#label-professor').fadeOut(1);
                    $('#txtProfessor').removeClass('erro-form');
                },5000);
                e.preventDefault();
            }
            
        });
    </script>
</body>



</html>