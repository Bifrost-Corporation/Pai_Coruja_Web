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
                    <div class="logo-name"><a href="home-secretaria.php"><img src="../img/pai_coruja_branca.png"></a>
                    </div>
                    <div class="close-mobile-navbar">
                        <span>Menu Pai Coruja</span>
                        <a class="btn-nav-close"><i class="far fa-window-close"></i></a>
                    </div>
                </div>
            </div>
            <ul class="nav-list">
                <li>
                    <a onclick="openMenu()" id="sub-menu-button">
                        <div>
                            <i class="fas fa-chart-pie"></i>
                            <span class="links-name">Visão Geral</span>
                        </div>
                        <i class="fas fa-caret-down" class="dropdown-icon"></i>
                    </a>
                </li>
                <div class="drop-menu" id="sub-menu">
                    <li class="links-name drop-link">
                        <a href="home-secretaria.php">
                            <i class="fas fa-calendar"></i>
                            <span class="links-name">Mural</span>
                        </a>
                    </li>
                    <li class="links-name drop-link">
                        <a href="#">
                            <i class="fas fa-chalkboard-teacher"></i>
                            <span class="links-name">Avaliação dos Professores</span>
                        </a>
                    </li>
                    <li class="links-name drop-link">
                        <a href="#">
                            <i class="fas fa-calendar-day"></i>
                            <span class="links-name">Eventos Programados</span>
                        </a>
                    </li>
                </div>

                <li>
                    <a onclick="openMenu2()" id="sub-menu-button-2">
                        <div>
                            <i class="fas fa-user-shield"></i>
                            <span class="links-name">Secretaria</span>
                        </div>
                        <i class="fas fa-caret-down" class="dropdown-icon"></i>
                    </a>
                </li>
                <div class="drop-menu" id="sub-menu-2">
                    <li class="links-name drop-link">
                        <a href="cadastrar-aluno.php">
                            <i class="fas fa-school"></i>
                            <span class="links-name">Cadastrar Aluno</span>
                        </a>
                    </li>
                    <li class="links-name drop-link">
                        <a href="cadastrar-professor.php">
                            <i class="fas fa-school"></i>
                            <span class="links-name">Cadastrar Professor</span>
                        </a>
                    </li>
                    <li class="links-name drop-link">
                        <a href="cadastrar-responsavel.php">
                            <i class="fas fa-school"></i>
                            <span class="links-name">Cadastrar Responsável</span>
                        </a>
                    </li>
                    <li class="links-name drop-link">
                        <a href="cadastrar-turma.php">
                            <i class="fas fa-school"></i>
                            <span class="links-name">Cadastrar Turma</span>
                        </a>
                    </li>
                    <li class="links-name drop-link">
                        <a href="cadastrar-disciplina.php">
                            <i class="fas fa-school"></i>
                            <span class="links-name">Cadastrar Disciplina</span>
                        </a>
                    </li>
                    <li class="links-name drop-link">
                        <a href="cadastrar-horario-turma.php">
                            <i class="fas fa-school"></i>
                            <span class="links-name">Cadastrar Horários</span>
                        </a>
                    </li>
                    <li class="links-name drop-link">
                        <a href="cadastrar-evento.php">
                            <i class="fas fa-school"></i>
                            <span class="links-name">Novo Evento</span>
                        </a>
                    </li>
                </div>

            </ul>
            <div class="profile-content">
                <div class="profile">
                    <div class="profile-details">
                        <img src="../img/usuario-de-perfil.png" alt="">
                        <div class="name-job">
                            <div class="name-menu"><?php echo $_SESSION['nomeSecretaria'] ?></div>
                            <div class="job-menu">Olá Secretário(a)</div>
                        </div>
                    </div>
                    <div class="profile-logout">
                        <a href="logout.php">
                            <i class="fas fa-sign-out-alt" id="logout-user"></i></a>
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
                <h2>Cadastrar Responsável:</h2>
            </div>
        </section>


        <section class="main-section">
            <form class="formulario" name="formResponsavel" action="../DAO/inserir-responsavel.php" method="POST">
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
                        <h2>Telefone do Responsável:</h2>
                        <label class="label-erro" id="label-telefone"></label>
                        <input name="txtTelefone" id="txtTelefone" type="tel"
                            placeholder="Insira o numero de telefone do Responsável">
                    </div>
                    <div class="input-box">
                        <h2>CPF Responsável:</h2>
                        <label class="label-erro" id="label-cpf"></label>
                        <input name="txtCpf" id="txtCpf" type="tel" placeholder="Insira CPF do Responsável">
                    </div>
                    <div class="input-box-width100">
                        <h2>CEP:</h2>
                        <label class="label-erro" id="label-cep"></label>
                        <input name="txtCep" id="txtCep" type="text"
                            placeholder="Insira o CEP do endereço do Reponsável">
                    </div>
                    <div class="input-box-width100">
                        <h2>Rua:</h2>
                        <label class="label-erro" id="label-rua"></label>
                        <input name="txtRua" id="txtRua" type="text"
                            placeholder="Insira a rua do endereço do Responsável">
                    </div>
                    <div class="input-box">
                        <h2>Número:</h2>
                        <label class="label-erro" id="label-numero"></label>
                        <input name="txtNumero" id="txtNumero" type="text" placeholder="Insira o número da residência">
                    </div>
                    <div class="input-box">
                        <h2>Complemento:</h2>
                        <label class="label-erro" id="label-complemento"></label>
                        <input name="txtComplemento" id="txtComplemento" type="text" placeholder="Insira o complemento">
                    </div>
                    <div class="input-box">
                        <h2>Bairro:</h2>
                        <label class="label-erro" id="label-bairro"></label>
                        <input name="txtBairro" id="txtBairro" type="text" placeholder="Insira o bairro">
                    </div>
                    <div class="input-box">
                        <h2>Cidade:</h2>
                        <label class="label-erro" id="label-cidade"></label>
                        <input name="txtCidade" id="txtCidade" type="text" placeholder="Insira a cidade">
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
    <script src="../js/jquery.mask.js"></script>

    <script>

        $('#txtTelefone').keyup(function (){
            if($(this).val().length > 14){
                $('#txtTelefone').mask("(00) 00000-0000");
            } else {
                $('#txtTelefone').mask("(00) 0000-00009");
            }
        });

        $('#txtCpf').mask("000.000.000-00");
        $('#txtCep').mask("00000-000");

        $(document).ready(function() {
            $("#txtCep").keyup(function() {
                var tamanhoCep = $(this).val().length;
                if(tamanhoCep == 9){
                    var cep = $(this).val().replace(/\D/g, '');
                    if (cep != "") {
                        var validacep = /^[0-9]{8}$/;
                        if(validacep.test(cep)) {
                            $("#txtRua").val("...");
                            $("#txtBairro").val("...");
                            $("#txtCidade").val("...");
                            $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {
                                if (!("erro" in dados)) {
                                    $("#txtRua").val(dados.logradouro);
                                    $("#txtBairro").val(dados.bairro);
                                    $("#txtCidade").val(dados.localidade);
                                } else {
                                    $('#label-cep').html('CEP inválido!');
                                    $('#txtCep').addClass('erro-form');
                                    $('#label-cep').show();
                                    $('#txtCep').focus();
                                    setTimeout(function () {
                                        $('#label-cep').fadeOut(1);
                                        $('#txtCep').removeClass('erro-form');
                                    }, 5000);
                                    e.preventDefault();
                                } 
                            });
                        }
                        else {
                            $('#label-cep').html('CEP inválido!');
                            $('#txtCep').addClass('erro-form');
                            $('#label-cep').show();
                            $('#txtCep').focus();
                            setTimeout(function () {
                                $('#label-cep').fadeOut(1);
                                $('#txtCep').removeClass('erro-form');
                            }, 5000);
                            e.preventDefault();
                        }
                    }
                }
            });
        });

        jQuery('#txtAluno').keyup(function () {
            var textoInserido = $(this).val();
            if (textoInserido != '') {
                $.ajax({
                    url: '../DAO/procurar-aluno.php',
                    method: 'POST',
                    data: {
                        query: textoInserido
                    },
                    success: function (resposta) {
                        $("#retornoPesquisa").html(resposta);
                    }
                });
            } else {
                $("#retornoPesquisa").html('');
            }
        });

        $(document).on('click', '.opcao-consulta', function () {
            $("#txtAluno").val($(this).text());
            $("#retornoPesquisa").html("");
        });

        jQuery('form').on('submit', function (e) {
            var nome = $('#txtNome').val();
            var email = $('#txtEmail').val();
            var senha1 = $('#txtSenha').val();
            var senha2 = $('#txtConfirmaSenha').val();
            var telefone = $('#txtTelefone').val();
            var cpf = $('#txtCpf').val();
            var cep = $('#txtCep').val();
            var rua = $('#txtRua').val();
            var numero = $('#txtNumero').val();
            var cidade = $('#txtCidade').val();
            var bairro = $('#txtBairro').val();
            var complemento = $('#txtComplemento').val();
            var aluno = $('#txtAluno').val();

            if (nome.length == 0) {
                $('#label-nome').html('Por favor, preencha o campo de nome para o responsável!');
                $('#txtNome').addClass('erro-form');
                $('#label-nome').show();
                $('#txtNome').focus();
                setTimeout(function () {
                    $('#label-nome').fadeOut(1);
                    $('#txtNome').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }

            if (email.length == 0) {
                $('#label-email').html('Por favor, preencha o campo de email para o responsável!');
                $('#txtEmail').addClass('erro-form');
                $('#label-email').show();
                $('#txtEmail').focus();
                setTimeout(function () {
                    $('#label-email').fadeOut(1);
                    $('#txtEmail').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            } else {
                var verificaarroba = false;
                var verificaponto = false;
                for (var i = 0; i < email.length; i++) {
                    if (email.charAt(i) == '@' && i + 1 < email.length) {
                        var posicaoarroba = i;
                    }
                    if (email.charAt(i) == '.' && i + 1 < email.length) {
                        var posicaoponto = i;
                    }
                }
                if (posicaoponto > posicaoarroba) {
                    verificaarroba = true;
                    verificaponto = true;
                }
                if (verificaarroba == false || verificaponto == false) {
                    $('#label-email').html('Email inválido!');
                    $('#txtEmail').addClass('erro-form');
                    $('#label-email').show();
                    $('#txtEmail').focus();
                    setTimeout(function () {
                        $('#label-email').fadeOut(1);
                        $('#txtEmail').removeClass('erro-form');
                    }, 5000);
                    e.preventDefault();
                }
            }
            if (senha1.length == 0) {
                $('#label-senha1').html('Por favor, preencha o campo de senha!');
                $('#txtSenha').addClass('erro-form');
                $('#label-senha1').show();
                $('#txtSenha').focus();
                setTimeout(function () {
                    $('#label-senha1').fadeOut(1);
                    $('#txtSenha').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
            if (senha2.length == 0) {
                $('#label-senha2').html('Por favor, preencha o campo para confirmar a senha!');
                $('#txtConfirmaSenha').addClass('erro-form');
                $('#label-senha2').show();
                $('#txtConfirmaSenha').focus();
                setTimeout(function () {
                    $('#label-senha2').fadeOut(1);
                    $('#txtConfirmaSenha').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
            if (senha1 != senha2) {
                $('#label-senha1').html('Senhas não correspondentes!');
                $('#txtSenha').addClass('erro-form');
                $('#label-senha1').show();
                $('#txtSenha').focus();
                $('#label-senha2').html('Senhas não correspondentes!');
                $('#txtConfirmaSenha').addClass('erro-form');
                $('#label-senha2').show();
                $('#txtConfirmaSenha').focus();
                setTimeout(function () {
                    $('#label-senha1').fadeOut(1);
                    $('#txtSenha').removeClass('erro-form');
                    $('#label-senha2').fadeOut(1);
                    $('#txtConfirmaSenha').removeClass('erro-form');
                }, 5000);
                e.preventDefault();

            }
            if (telefone.length <= 8) {
                $('#label-telefone').html('Número de telefone inválido!');
                $('#txtTelefone').addClass('erro-form');
                $('#label-telefone').show();
                $('#txtTelefone').focus();
                setTimeout(function () {
                    $('#label-telefone').fadeOut(1);
                    $('#txtTelefone').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
            if (cpf.length != 14) {
                $('#label-cpf').html('CPF inválido!');
                $('#txtCpf').addClass('erro-form');
                $('#label-cpf').show();
                $('#txtCpf').focus();
                setTimeout(function () {
                    $('#label-cpf').fadeOut(1);
                    $('#txtCpf').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            } else {
                var cpfValido = true;
                var arrayCpf = cpf.split("");
                var digito1 = parseInt(arrayCpf[0]);
                var digito2 = parseInt(arrayCpf[1]);
                var digito3 = parseInt(arrayCpf[2]);
                var digito4 = parseInt(arrayCpf[4]);
                var digito5 = parseInt(arrayCpf[5]);
                var digito6 = parseInt(arrayCpf[6]);
                var digito7 = parseInt(arrayCpf[8]);
                var digito8 = parseInt(arrayCpf[9]);
                var digito9 = parseInt(arrayCpf[10]);
                var digito10 = parseInt(arrayCpf[12]);
                var digito11 = parseInt(arrayCpf[13]);
                if(digito1 == digito2 && digito2 == digito3 && digito3 == digito4 && digito4 == digito5 && digito5 == digito6 &&
                digito6 == digito7 && digito7 == digito8 && digito8 == digito9 && digito9 == digito10 && digito10 == digito11){
                    $('#label-cpf').html('CPF inválido!');
                    $('#txtCpf').addClass('erro-form');
                    $('#label-cpf').show();
                    $('#txtCpf').focus();
                    setTimeout(function () {
                        $('#label-cpf').fadeOut(1);
                        $('#txtCpf').removeClass('erro-form');
                    }, 5000);
                        e.preventDefault();
                }else{
                    var teste1 = (digito1 * 10) + (digito2 * 9) + (digito3 * 8) + (digito4 * 7) + (digito5 * 6) + (digito6 * 5) + (digito7 * 4) + (digito8 * 3) + (digito9 * 2);
                    var resto1 = (teste1 * 10) % 11;
                    if(resto1 == 10 || resto1 == 11){
                        resto1 = 0;
                    }
                    if(resto1 != digito10){
                        cpfValido = false;
                    }
                    if(cpfValido != false){
                        var teste2 = (digito1 * 11) + (digito2 * 10) + (digito3 * 9) + (digito4 * 8) + (digito5 * 7) + (digito6 * 6) + (digito7 * 5) + (digito8 * 4) + (digito9 * 3) + (digito10 * 2);
                        var resto2 = (teste2 * 10) % 11;
                        if(resto2 == 10 || resto2 == 11){
                            resto2 = 0;
                        }
                        if(resto2 != digito11){
                            cpfValido = false;
                        }
                    }
                    if(cpfValido == false){
                        $('#label-cpf').html('CPF inválido!');
                        $('#txtCpf').addClass('erro-form');
                        $('#label-cpf').show();
                        $('#txtCpf').focus();
                        setTimeout(function () {
                            $('#label-cpf').fadeOut(1);
                            $('#txtCpf').removeClass('erro-form');
                        }, 5000);
                        e.preventDefault();
                    }
                }
            }
            if (cep.length != 9) {
                $('#label-cep').html('CEP inválido!');
                $('#txtCep').addClass('erro-form');
                $('#label-cep').show();
                $('#txtCep').focus();
                setTimeout(function () {
                    $('#label-cep').fadeOut(1);
                    $('#txtCep').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
            if (rua.length == 0) {
                $('#label-rua').html('Informe a rua do responsável!');
                $('#txtRua').addClass('erro-form');
                $('#label-rua').show();
                $('#txtRua').focus();
                setTimeout(function () {
                    $('#label-rua').fadeOut(1);
                    $('#txtRua').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
            if (numero.length == 0) {
                $('#label-numero').html('Informe o número do responsável!');
                $('#txtNumero').addClass('erro-form');
                $('#label-numero').show();
                $('#txtNumero').focus();
                setTimeout(function () {
                    $('#label-numero').fadeOut(1);
                    $('#txtNumero').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
            if (cidade.length == 0) {
                $('#label-cidade').html('Informe a cidade do responsável!');
                $('#txtCidade').addClass('erro-form');
                $('#label-cidade').show();
                $('#txtCidade').focus();
                setTimeout(function () {
                    $('#label-cidade').fadeOut(1);
                    $('#txtCidade').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
            if (bairro.length == 0) {
                $('#label-bairro').html('Informe o bairro do responsável!');
                $('#txtBairro').addClass('erro-form');
                $('#label-bairro').show();
                $('#txtBairro').focus();
                setTimeout(function () {
                    $('#label-bairro').fadeOut(1);
                    $('#txtBairro').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
            /* Complemento não é obrigatório
            if(complemento.length == 0){
                $('#label-complemento').html('Informe o bairro do responsável!');
                $('#txtComplemento').addClass('erro-form');
                $('#label-complemento').show();
                $('#txtComplemento').focus();
                setTimeout(function(){
                    $('#label-complemento').fadeOut(1);
                    $('#txtComplemento').removeClass('erro-form');
                },5000);
                e.preventDefault();
            }
            */
            if (aluno.length == 0) {
                $('#label-aluno').html('Informe o aluno do responsável!');
                $('#txtAluno').addClass('erro-form');
                $('#label-aluno').show();
                $('#txtAluno').focus();
                setTimeout(function () {
                    $('#label-aluno').fadeOut(1);
                    $('#txtAluno').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }

            /* Ainda falta fazer a verificação do CPF */

        });
    </script>

</body>




</html>