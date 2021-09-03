<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />

    <title>Cadastrar Secretária</title>


</head>

<body>
    <?php
        include("sentinela.php");
    ?>
    <header>

        <nav class="nav-bar">
            <a href=""><img class="logo" src="../images/pai_coruja_3.png"></a>
            <ul class="ul-area-btn">
                <li class="nav-li"><a class="btn-nav-exit" href="#">Sair</a></li>
            </ul>
        </nav>

        <nav class="sidebar">
            <div class="perfil">
                <div class="img-perfil">
                    <img src="../images/usuario-de-perfil.png">
                </div>
                <div class="text-perfil">
                    <p>Olá, Administrador</p>
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
                    <a href="#" onclick="openMenu2()" id="sub-menu-button-2" class="outro-btn">Administrador
                        <span class="fas fa-caret-down second"></span>
                    </a>
                    <ul id="sub-menu-2">
                        <li><a href="cadastrar-escola.php">Cadastrar Escola</a></li>
                        <li><a href="cadastrar-secretaria.php">Cadastrar Secretária</a></li>

                    </ul>
                </li>

            </ul>
        </nav>
    </header>


    <main class="container-main">


        <section class="top-section">
            <div class="voltar">
                <a href="home-adm.php">
                    <span class="fas fa-arrow-left"></span>Voltar
                </a>
            </div>
            <div class="titulo-cadastrar">
                <h2>Cadastrar Secretária:</h2>
            </div>
        </section>


        <section class="main-section">
            <form class="formulario" name="formCadastrarSecretaria" method="POST" action="../DAO/inserir-secretaria.php">
                <div class="user-details">
                    <div class="input-box-width100">
                        <h2>Nome de usuário da Secretária:</h2>
                        <label class="label-erro" id="label-usuario"></label>
                        <input name="txtUsuarioSecretaria" id="txtUsuarioSecretaria" type="text" placeholder="Insira o nome de usuário para a secretaria">
                    </div>
                    <div class="input-box-width100">
                        <h2>Email Secretária:</h2>
                        <label class="label-erro" id="label-email"></label>
                        <input name="txtEmailSecretaria" id="txtEmailSecretaria" type="text" placeholder="Insira o email da secretaria">
                    </div>
                    <div class="input-box">
                        <h2>Senha Secretária:</h2>
                        <label class="label-erro" id="label-senha1"></label>
                        <input name="txtSenhaSecretaria" id="txtSenhaSecretaria" type="password" placeholder="********">
                    </div>
                    <div class="input-box">
                        <h2>Confirmar senha:</h2>
                        <label class="label-erro" id="label-senha2"></label>
                        <input name="txtConfirmaSenhaSecretaria" id="txtConfirmaSenhaSecretaria" type="password" placeholder="********">
                    </div>
                    <div class="input-box-width100">
                        <h2>A qual escola essa conta de secretaria pertence?</h2>
                        <label class="label-erro" id="label-escola"></label>
                        <input name="txtConsultaEscola" id="txtConsultaEscola" type="text" placeholder="Pesquise aqui o nome da escola">
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
        jQuery('#txtConsultaEscola').keyup(function(){
            var textoInserido = $(this).val();
            if(textoInserido != ''){
                $.ajax({
                    url: '../DAO/procurar-escola.php',
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
            $("#txtConsultaEscola").val($(this).text());
            $("#retornoPesquisa").html("");
        });

        jQuery('form').on('submit', function(e){
            var nome = $('#txtUsuarioSecretaria').val(); 
            var email = $('#txtEmailSecretaria').val();
            var senha1 = $('#txtSenhaSecretaria').val();
            var senha2 = $('#txtConfirmaSenhaSecretaria').val();
            var escola = $('#txtConsultaEscola').val();
            if (nome.length == 0) {
                $('#label-usuario').html('Por favor, preencha o campo de nome para a secretaria!');
                $('#txtUsuarioSecretaria').addClass('erro-form');
                $('#label-usuario').show();
                setTimeout(function(){
                    $('#label-usuario').fadeOut(1);
                    $('#txtUsuarioSecretaria').removeClass('erro-form');
                },5000);
                e.preventDefault();
            }
            if (email.length == 0) {
                $('#label-email').html('Por favor, preencha o campo de email para a secretaria!');
                $('#txtEmailSecretaria').addClass('erro-form');
                $('#label-email').show();
                setTimeout(function(){
                    $('#label-email').fadeOut(1);
                    $('#txtEmailSecretaria').removeClass('erro-form');
                },5000);
                e.preventDefault();
            }
            else {
                verificaarroba = false;
                verificaponto = false;
                for(var i = 0; i < email.length; i++){
                    if(email.charAt(i) == '@' && i + 1 < email.length){
                        verificaarroba = true;
                    }
                    if(email.charAt(i) == '.' && i + 1 < email.length){
                        verificaponto = true;
                    }
                }
                if(verificaarroba == false || verificaponto == false){
                    $('#label-email').html('Email inválido!');
                    $('#txtEmailSecretaria').addClass('erro-form');
                    $('#label-email').show();
                    setTimeout(function(){
                        $('#label-email').fadeOut(1);
                        $('#txtEmailSecretaria').removeClass('erro-form');
                    },5000);
                    e.preventDefault();
                }
            }
            if (senha1.length == 0) {
                $('#label-senha1').html('Por favor, insira uma senha!');
                $('#txtSenhaSecretaria').addClass('erro-form');
                $('#label-senha1').show();
                setTimeout(function(){
                    $('#label-senha1').fadeOut(1);
                    $('#txtSenhaSecretaria').removeClass('erro-form');
                },5000);
                e.preventDefault();
            }
            if (senha2.length == 0) {
                $('#label-senha2').html('Por favor, confirme a senha!');
                $('#txtConfirmaSenhaSecretaria').addClass('erro-form');
                $('#label-senha2').show();
                setTimeout(function(){
                    $('#label-senha2').fadeOut(1);
                    $('#txtConfirmaSenhaSecretaria').removeClass('erro-form');
                },5000);
                e.preventDefault();
            }
            if (senha1 != senha2) {
                $('#label-senha1').html('As senhas não correspondem!');
                $('#txtSenhaSecretaria').addClass('erro-form');
                $('#label-senha1').show();
                setTimeout(function(){
                    $('#label-senha1').fadeOut(1);
                    $('#txtSenhaSecretaria').removeClass('erro-form');
                },5000);
                $('#label-senha2').html('As senhas não correspondem!');
                $('#txtConfirmaSenhaSecretaria').addClass('erro-form');
                $('#label-senha2').show();
                setTimeout(function(){
                    $('#label-senha2').fadeOut(1);
                    $('#txtConfirmaSenhaSecretaria').removeClass('erro-form');
                },5000);
                e.preventDefault();
            }
            if (escola.length == 0) {
                $('#label-escola').html('Por favor, informe à qual escola essa conta pertence!');
                $('#txtConsultaEscola').addClass('erro-form');
                $('#label-escola').show();
                setTimeout(function(){
                    $('#label-escola').fadeOut(1);
                    $('#txtConsultaEscola').removeClass('erro-form');
                },5000);
                e.preventDefault();
            }
            
        });
    </script>

</body>



</html>