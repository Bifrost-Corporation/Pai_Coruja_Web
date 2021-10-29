<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <title>Home - Secretária</title>

</head>
<body>
    <?php
        include ('sentinela.php');
        include ('globalSecretaria.php');
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
                            <a href="dashboard.php">
                                <i class="fas fa-calendar"></i>
                                <span class="links-name">Dashboard</span>
                            </a>
                        </li>
                        <li class="links-name">
                            <a href="cadastrar-dados.php" class="active-nav">
                                <i class="fas fa-school"></i>
                                <span class="links-name">Cadastrar Dados</span>
                            </a>
                        </li>
                        <li class="links-name">
                            <a href="alterar-dados.php">
                                <i class="fas fa-school"></i>
                                <span class="links-name">Alterar Dados</span>
                            </a>
                        </li>
                        <li class="links-name">
                            <a href="cadastrar-evento.php">
                                <i class="fas fa-school"></i>
                                <span class="links-name">Gerenciar Eventos</span>
                            </a>
                        </li>
                        <li class="links-name">
                            <a href="chat-secretaria.php">
                                <i class="fas fa-school"></i>
                                <span class="links-name">Pai Coruja Chat</span>
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
                        <a href="trocar-foto-perfil.php">
                            <i class="fas fa-user-cog"></i>
                            <span>Foto de perfil</span>
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

    <main >



        <div class="container-dash">
            <div class="ola-nav-dash">
                <h1>Gerenciador de Dados</h1>
            </div>

            <div class="container-dados-cadastro">


                <div class="abas-container">
                    <button class="aba-cadastro" onclick="openTab(event,'Turma-tab')">
                        <h3>Turma / Horario</h3>
                    </button>
                </div>
                <div class="forms-cadastro">

                    <section class="conteudo-aba" id="Turma-tab">
                    <div class="container-form-pages">
                                <div class="progress-bar">

                                    <div class="steps-form2">
                                        <p>Turma</p>
                                        <div class="bullet-form2">
                                            <span>1</span>
                                        </div>
                                        <div class="bullet-check-form2 fas fa-check">

                                        </div>
                                    </div>
                                    
                                    <div class="steps-form2">
                                        <p>Horário da aula</p>
                                        <div class="bullet-form2">
                                            <span>2</span>
                                        </div>
                                        <div class="bullet-check-form2 fas fa-check">

                                        </div>
                                    </div>


                                </div>
                                <div class="container-steps-form">

                                    <form id="formTurmaHorario" name="formTurmaHorario" class="" method="POST" action="#" enctype="multipart/form-data">

                                        <div class="user-details page-form slidePage-form2">
                                            <div class="btns-link-step-form">
                                                <h2>Como deseja seguir seu cadastro?</h2>
                                                <div>
                                                    <div class="btn-link-step">
                                                        <div class="button">
                                                            <button type="button" onclick="linkEtapa2Form2()" class="btn-nav-exit cadastrar-prof-step" value="Cadastrar Turma">
                                                                <div>
                                                                    <i class="fas fa-user"></i>
                                                                    <span>Cadastrar Turma</span>
                                                                </div>
                                                            </button>
                                                        </div>
                                                        <h5>Ou</h5>
                                                        <div class="input-box-width100 input-link-step">
                                                            <input type="text" placeholder="Procurar Turma">
                                                            <button type="button" onclick="linkEtapa3Form2()" class="btn-nav-exit nextBtnSkipTwo btn-page-next">
                                                                <i class="fas fa-search"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>


                                        <div class="user-details page-form">
                                            <div class="input-box-width100">
                                            <h2>Nome da Turma:</h2>
                                                <label class="label-erro" name="label-nomeTurma" id="label-nomeTurma"></label>
                                                <div class="input-box-width100">
                                                    <label class="label-erro" id="label-foto"></label>
                                                    <div>
                                                        <label class="carregar-imagem-perfil" for="arquivo">Carregar Planilha Turma</label>
                                                        <input name="arquivo" id="arquivo" type="file">
                                                        <label class="label-erro" id="label-arquivo"></label>
                                                        <span id="nome-arquivo"></span>
                                                    </div>
                                                </div>
                                                <!--<input name="txtNomeTurma" id="txtNomeTurma" type="text" placeholder="Insira o nome da turma" value="<?php echo @$_GET['nomeTurma'] ?>">-->
                                            </div>
                                            <div class="button">
                                                <input type="button" onclick="linkEtapa1Form2()" class="btn-nav-exit prev-page-1 "
                                                    value="Voltar">
                                                <input type="submit" class="btn-nav-exit next-form-1 btn-page-next"
                                                    value="Cadastrar">
                                            </div>
                                        </div>
                                    </form>
                                    <!--
                                    <form>
                                        
                                        <div class="user-details page-form">
                                            <div class="btns-link-step-form">
                                                <h2>Como deseja seguir seu cadastro?</h2>
                                                <div>
                                                    <div class="btn-link-step">
                                                        <div class="button nextBtn">
                                                            <button type="button" onclick="linkEtapa4Form2()" class=" btn-nav-exit btn-page-next cadastrar-prof-step" value="Cadastrar Disciplina">
                                                                <div>
                                                                    <i class="fas fa-user"></i>
                                                                    <span>Cadastrar Horário da Turma</span>
                                                                </div>
                                                            </button>
                                                        </div>
                                                        <h5>Ou</h5>
                                                        <div class="input-box-width100 input-link-step">
                                                            <input type="text" placeholder="Procurar Horário da Turma">
                                                            <button class=" btn-nav-exit btn-page-next">
                                                                <i class="fas fa-search"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="button">
                                                    <input type="button" onclick="linkEtapa1Form2()" class="btn-nav-exit  btn-page-prev"
                                                    value="Voltar">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="user-details page-form">
                                            <div class="title-page-form">
                                                <h1>Cadastrar Horário da Turma:</h1>
                                            </div>
                                            <input type="hidden" id="idDisciplina" name="idDisciplina"
                                                value="<?php echo @$_GET['idDisciplina'] ?>">
                                            <div class="input-box-width100">
                                                <h2>Dia da semana</h2>
                                                <label class="label-erro" id="label-dia"></label>
                                                <input name="txtDiaSemana" id="txtDiaSemana" type="text" placeholder="Dia da semana da aula">
                                            </div>
                                            <div class="input-box-width100">
                                            <h2>Nome da Disciplina</h2>
                                                <label class="label-erro" id="label-disciplina"></label>
                                                <input name="txtDisciplinaHorario" id="txtDisciplinaHorario" type="text" placeholder="Disciplina a ser dada na aula"  value="<?php if(isset($_SESSION['nomeDisciplina'])){
                                                                                                                                                                                                                echo $_SESSION['nomeDisciplina'];
                                                                                                                                                                                                            } ?>">
                                                <div id="retornoPesquisaDisciplinaHorario">

                                                </div>
                                            </div>
                                            <div class="button">
                                                <input type="button" onclick="linkEtapa3Form2()" class="btn-nav-exit"
                                                    value="Voltar">
                                                <input type="submit" onclick="linkCadastrarForm2()" class="btn-nav-exit" value="Cadastrar">
                                            </div>
                                        </div>

                                    </form>
                                !-->
                                </div>
                            </div>
                    </section>






                    <section class="main-section" id="Topo">



                    </section>
                </div>
            </div>

        </div>
    </main>

                                                                                                                            

    <script src="../assets/js/dash-cadastro.js"></script>
    <script src="../assets/js/nav.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="../assets/js/jquery.mask.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.js"></script>
    <script src="../assets/js/carousel.js"></script>
    <script src="../assets/js/formStepsBySteps.js"></script>

    <script>
        //Script Form Disciplina/Professor
        jQuery('#formProfessorDisciplina').on('submit', function (e){
            var nomeDisciplina = $('#txtNomeDisciplina').val();
            var nomeProfessor = $('#txtProfessorDisciplina').val();
            var nomeDisciplinaSemEspaco = nomeDisciplina.trim();
            var nomeProfessorSemEspaco = nomeProfessor.trim();
            if (nomeDisciplina.length == 0 || nomeDisciplinaSemEspaco == '') {
                $('#label-nomeDisciplina').html('Por favor, preencha o campo de nome para a disciplina!');
                $('#txtNomeDisciplina').addClass('erro-form');
                $('#label-nomeDisciplina').show();
                setTimeout(function () {
                    $('#label-nomeDisciplina').fadeOut(1);
                    $('#txtNomeDisciplina').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
            else if (nomeProfessor.length == 0 || nomeProfessorSemEspaco == '') {
                $('#label-professor').html('Por favor, preencha o campo de nome para o professor responsável pela disciplina!');
                $('#txtProfessorDisciplina').addClass('erro-form');
                $('#label-professor').show();
                setTimeout(function () {
                    $('#label-professor').fadeOut(1);
                    $('#txtProfessorDisciplina').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
        });

        //Script Turma/HorárioTurma
        $('#txtNomeTurma').mask("0ºS");

        jQuery('#txtDisciplinaHorario').keyup(function () {
            var textoInserido = $(this).val();
            if (textoInserido != '') {
                $.ajax({
                    url: '../DAO/procurar-disciplina.php',
                    method: 'POST',
                    data: {
                        query: textoInserido
                    },
                    success: function (resposta) {
                        $("#retornoPesquisaDisciplinaHorario").html(resposta);
                    }
                });
            } else {
                $("#retornoPesquisaDisciplinaHorario").html('');
            }
        });

        $(document).on('click', '.opcao-consulta2', function () {
            $("#txtDisciplinaHorario").val($(this).text());
            $("#retornoPesquisaDisciplinaHorario").html("");
        });

        jQuery('#formTurmaHorario').on('submit', function (e) {
            var diaSemana = $('#txtDiaSemana').val();
            var disciplina = $('#txtDisciplinaHorario').val();
            var diaSemanaSemEspaco = diaSemana.trim();
            var disciplinaSemEspaco = disciplina.trim();
            if (diaSemana.length == 0 || diaSemanaSemEspaco == '') {
                $('#label-dia').html('Por favor, preencha o campo de dia da semana!');
                $('#txtDiaSemana').addClass('erro-form');
                $('#label-dia').show();
                setTimeout(function () {
                    $('#label-dia').fadeOut(1);
                    $('#txtDiaSemana').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
            if (disciplina.length == 0 || disciplinaSemEspaco == '') {
                $('#label-disciplina').html('Por favor, preencha o campo de disciplina!');
                $('#txtDisciplinaHorario').addClass('erro-form');
                $('#label-disciplina').show();
                setTimeout(function () {
                    $('#label-disciplina').fadeOut(1);
                    $('#txtDisciplinaHorario').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
        });

        //Script Aluno/Responsável
        jQuery('#txtTurmaAluno').keyup(function () {
            var textoInserido = $(this).val();
            if (textoInserido != '') {
                $.ajax({
                    url: '../DAO/procurar-turma-aluno.php',
                    method: 'POST',
                    data: {
                        query: textoInserido
                    },
                    success: function (resposta) {
                        $("#retornoPesquisaTurmaAluno").html(resposta);
                    }
                });
            } else {
                $("#retornoPesquisaTurmaAluno").html('');
            }
        });

        $(document).on('click', '.opcao-consulta', function () {
            $("#txtTurmaAluno").val($(this).text());
            $("#retornoPesquisaTurmaAluno").html("");
        });

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

        jQuery('#formAlunoResponsavel').on('submit', function (e) {
            var nome = $('#txtNomeResponsavel').val();
            var email = $('#txtEmailResponsavel').val();
            var senha1 = $('#txtSenhaResponsavel').val();
            var senha2 = $('#txtConfirmaSenhaResponsavel').val();
            var telefone = $('#txtTelefone').val();
            var cpf = $('#txtCpf').val();
            var cep = $('#txtCep').val();
            var rua = $('#txtRua').val();
            var numero = $('#txtNumero').val();
            var cidade = $('#txtCidade').val();
            var bairro = $('#txtBairro').val();
            var complemento = $('#txtComplemento').val();
            var aluno = $('#txtAlunoResponsavel').val();
            var nomeSemEspaco = nome.trim();
            var emailSemEspaco = email.trim();
            var senha1SemEspaco = senha1.trim();
            var senha2SemEspaco = senha2.trim();
            var ruaSemEspaco = rua.trim();
            var numeroSemEspaco = numero.trim();
            var cidadeSemEspaco = cidade.trim();
            var bairroSemEspaco = bairro.trim();
            var alunoSemEspaco = aluno.trim();

            if (nome.length == 0 || nomeSemEspaco == '') {
                $('#label-nomeResponsavel').html('Por favor, preencha o campo de nome para o responsável!');
                $('#txtNomeResponsavel').addClass('erro-form');
                $('#label-nomeResponsavel').show();
                $('#txtNomeResponsavel').focus();
                setTimeout(function () {
                    $('#label-nomeResponsavel').fadeOut(1);
                    $('#txtNomeResponsavel').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }

            if (email.length == 0 || emailSemEspaco == '') {
                $('#label-emailResponsavel').html('Por favor, preencha o campo de email para o responsável!');
                $('#txtEmailResponsavel').addClass('erro-form');
                $('#label-emailResponsavel').show();
                $('#txtEmailResponsavel').focus();
                setTimeout(function () {
                    $('#label-emailResponsavel').fadeOut(1);
                    $('#txtEmailResponsavel').removeClass('erro-form');
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
                    $('#label-emailResponsavel').html('Email inválido!');
                    $('#txtEmailResponsavel').addClass('erro-form');
                    $('#label-emailResponsavel').show();
                    $('#txtEmailResponsavel').focus();
                    setTimeout(function () {
                        $('#label-emailResponsavel').fadeOut(1);
                        $('#txtEmailResponsavel').removeClass('erro-form');
                    }, 5000);
                    e.preventDefault();
                }
            }
            if (senha1.length == 0 || senha1SemEspaco == '') {
                $('#label-senha1Responsavel').html('Por favor, preencha o campo de senha!');
                $('#txtSenhaResponsavel').addClass('erro-form');
                $('#label-senha1Responsavel').show();
                $('#txtSenhaResponsavel').focus();
                setTimeout(function () {
                    $('#label-senha1Responsavel').fadeOut(1);
                    $('#txtSenhaResponsavel').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
            if (senha2.length == 0 || senha2SemEspaco == '') {
                $('#label-senha2Responsavel').html('Por favor, preencha o campo para confirmar a senha!');
                $('#txtConfirmaSenhaResponsavel').addClass('erro-form');
                $('#label-senha2Responsavel').show();
                $('#txtConfirmaSenhaResponsavel').focus();
                setTimeout(function () {
                    $('#label-senha2Responsavel').fadeOut(1);
                    $('#txtConfirmaSenhaResponsavel').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
            if (senha1 != senha2) {
                $('#label-senha1Responsavel').html('Senhas não correspondentes!');
                $('#txtSenhaResponsavel').addClass('erro-form');
                $('#label-senha1Responsavel').show();
                $('#txtSenhaResponsavel').focus();
                $('#label-senha2Responsavel').html('Senhas não correspondentes!');
                $('#txtConfirmaSenhaResponsavel').addClass('erro-form');
                $('#label-senha2Responsavel').show();
                $('#txtConfirmaSenhaResponsavel').focus();
                setTimeout(function () {
                    $('#label-senha1Responsavel').fadeOut(1);
                    $('#txtSenhaResponsavel').removeClass('erro-form');
                    $('#label-senha2Responsavel').fadeOut(1);
                    $('#txtConfirmaSenhaResponsavel').removeClass('erro-form');
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
            if (rua.length == 0 || ruaSemEspaco == '') {
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
            if (numero.length == 0 || numeroSemEspaco == '') {
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
            if (cidade.length == 0 || cidadeSemEspaco == '') {
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
            if (bairro.length == 0 || bairroSemEspaco == '') {
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
            if (aluno.length == 0 || alunoSemEspaco == '') {
                $('#label-alunoResponsavel').html('Informe o aluno do responsável!');
                $('#txtAlunoResponsavel').addClass('erro-form');
                $('#label-alunoResponsavel').show();
                $('#txtAlunoResponsavel').focus();
                setTimeout(function () {
                    $('#label-alunoResponsavel').fadeOut(1);
                    $('#txtAlunoResponsavel').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }

        });
    </script>


</body>

</html>