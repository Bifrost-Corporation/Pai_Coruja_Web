<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <title>Cadastro Responsavel</title>


</head>

<body>
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
                    <p>Olá, Secretário</p>
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
                    <a href="#" onclick="openMenu2()" id="sub-menu-button-2" class="outro-btn">Secretária
                        <span class="fas fa-caret-down second"></span>
                    </a>
                    <ul id="sub-menu-2">
                        <li><a href="cadastrar-aluno.html">Cadastrar Aluno</a></li>
                        <li><a href="cadastrar-professor.html">Cadastrar Professor</a></li>
                        <li><a href="cadastrar-responsavel.html">Cadastrar Responsável</a></li>
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
                <h2>Cadastrar Responsável:</h2>
            </div>
        </section>


        <section class="main-section">
            <form class="formulario" name="formResponsavel" action="#" method="#">
                <div class="user-details">
                    <div class="input-box-width100">
                        <h2>Nome Responsável</h2>
                        <label class="label-erro" id="label-nome"></label>
                        <input name="txtNome" id="txtNome" type="text" placeholder="Insira o nome do Responsável">
                    </div>
                    <div class="input-box-width100">
                        <h2>Email Responsável</h2>
                        <label class="label-erro" id="label-email"></label>
                        <input name="txtEmail" id="txtEmail" type="text" placeholder="Insira o email do Responsável">
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
                        <h2>Telefone do Responsável</h2>
                        <label class="label-erro" id="label-telefone"></label>
                        <input name="txtTelefone" id="txtTelefone" type="tel" placeholder="Insira o numero de telefone do Responsável">
                    </div>
                    <div class="input-box">
                        <h2>CEP:</h2>
                        <label class="label-erro" id="label-cep"></label>
                        <input name="txtCep" id="txtCep" type="text" placeholder="Insira o CEP do endereço do Reponsável">
                    </div>
                    <div class="input-box-width100">
                        <h2>Rua:</h2>
                        <label class="label-erro" id="label-rua"></label>
                        <input name="txtRua" id="txtRua" type="text" placeholder="Insira a rua do endereço do Responsável">
                    </div>
                    <div class="input-box">
                        <h2>Número</h2>
                        <label class="label-erro" id="label-numero"></label>
                        <input name="txtNumero" id="txtNumero" type="text" placeholder="Insira o número da residência">
                    </div>
                    <div class="input-box">
                        <h2>Cidade:</h2>
                        <label class="label-erro" id="label-cidade"></label>
                        <input name="txtCidade" id="txtCidade" type="text" placeholder="Insira a cidade">
                    </div>
                    <div class="input-box">
                        <h2>Bairro:</h2>
                        <label class="label-erro" id="label-bairro"></label>
                        <input name="txtBairro" id="txtBairro" type="text" placeholder="Insira o bairro">
                    </div>
                    <div class="input-box">
                        <h2>Complemento:</h2>
                        <label class="label-erro" id="label-complemento"></label>
                        <input name="txtComplemento" id="txtComplemento" type="text" placeholder="Insira o complemento">
                    </div>
                    <div class="input-box-width100">
                        <h2>De qual aluno você é responsável:</h2>
                        <label class="label-erro" id="label-aluno"></label>
                        <input name="txtAluno" id="txtAluno" type="text" placeholder="Insira o nome do aluno">
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
        jQuery('#txtAluno').keyup(function(){
            var textoInserido = $(this).val();
            if(textoInserido != ''){
                $.ajax({
                    url: '../DAO/procurar-aluno.php',
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
            $("#txtAluno").val($(this).text());
            $("#retornoPesquisa").html("");
        });

        jQuery('form').on('submit', function(e){
            var nome = $('#txtNome').val();
            var email = $('#txtEmail').val();
            var senha1 = $('#txtSenha').val();
            var senha2 = $('#txtConfirmaSenha').val();
            var telefone = $('#txtTelefone').val();
            var cep = $('#txtCep').val();
            var rua = $('#txtRua').val();
            var numero = $('#txtNumero').val();
            var cidade = $('#txtCidade').val();
            var bairro = $('#txtBairro').val();
            var complemento = $('#txtComplemento').val();
            var aluno = $('#txtAluno').val();
            
            if(nome.length == 0){
                $('#label-nome').html('Por favor, preencha o campo de nome para o responsável!');
                $('#txtNome').addClass('erro-form');
                $('#label-nome').show();
                $('#txtNome').focus();
                setTimeout(function(){
                    $('#label-nome').fadeOut(1);
                    $('#txtNome').removeClass('erro-form');
                },5000);
                e.preventDefault();
            }

            if(email.length == 0){
                $('#label-email').html('Por favor, preencha o campo de email para o responsável!');
                $('#txtEmail').addClass('erro-form');
                $('#label-email').show();
                $('#txtEmail').focus();
                setTimeout(function(){
                    $('#label-email').fadeOut(1);
                    $('#txtEmail').removeClass('erro-form');
                },5000);
                e.preventDefault();
            } 
            else {
                var verificaarroba = false;
                var verificaponto = false;
                for(var i = 0; i < email.length; i++){
                    if(email.charAt(i) == '@' && i + 1 < email.length){
                        var posicaoarroba = i;
                    }
                    if(email.charAt(i) == '.' && i + 1 < email.length){
                        var posicaoponto = i;
                    }
                }
                if(posicaoponto > posicaoarroba) {
                    verificaarroba = true;
                    verificaponto = true;
                }
                if(verificaarroba == false || verificaponto == false){
                    $('#label-email').html('Email inválido!');
                    $('#txtEmail').addClass('erro-form');
                    $('#label-email').show();
                    $('#txtEmail').focus();
                    setTimeout(function(){
                        $('#label-email').fadeOut(1);
                        $('#txtEmail').removeClass('erro-form');
                    },5000);
                    e.preventDefault();
                }
            }
            if(senha1.length == 0){
                $('#label-senha1').html('Por favor, preencha o campo de senha!');
                $('#txtSenha').addClass('erro-form');
                $('#label-senha1').show();
                $('#txtSenha').focus();
                setTimeout(function(){
                    $('#label-senha1').fadeOut(1);
                    $('#txtSenha').removeClass('erro-form');
                },5000);
                e.preventDefault();
            }
            if(senha2.length == 0){
                $('#label-senha2').html('Por favor, preencha o campo para confirmar a senha!');
                $('#txtConfirmaSenha').addClass('erro-form');
                $('#label-senha2').show();
                $('#txtConfirmaSenha').focus();
                setTimeout(function(){
                    $('#label-senha2').fadeOut(1);
                    $('#txtConfirmaSenha').removeClass('erro-form');
                },5000);
                e.preventDefault();
            }
            if(senha1 != senha2){
                $('#label-senha1').html('Senhas não correspondentes!');
                $('#txtSenha').addClass('erro-form');
                $('#label-senha1').show();
                $('#txtSenha').focus();
                $('#label-senha2').html('Senhas não correspondentes!');
                $('#txtConfirmaSenha').addClass('erro-form');
                $('#label-senha2').show();
                $('#txtConfirmaSenha').focus();
                setTimeout(function(){
                    $('#label-senha1').fadeOut(1);
                    $('#txtSenha').removeClass('erro-form');
                    $('#label-senha2').fadeOut(1);
                    $('#txtConfirmaSenha').removeClass('erro-form');
                },5000);
                e.preventDefault();
                
            }

            /* Continuar amanhã, verificar o restante dos campos e adicionar o campo de CPF*/
            
        });
    </script>

</body>




</html>