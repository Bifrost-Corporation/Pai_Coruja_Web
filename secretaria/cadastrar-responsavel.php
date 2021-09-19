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
                <a href="home-adm.php">
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
                <h2>Cadastrar Responsável:</h2>
            </div>
        </section>


        <section class="main-section">
            <form class="formulario" name="formResponsavel" action="../DAO/inserir-responsavel.php" method="POST">
                <div class="user-details">
                    <input type="hidden" id="idResponsavel" name="idResponsavel" value="<?php echo @$_GET['idResponsavel']; ?>">
                    <div class="input-box-width100">
                        <h2>Nome Responsável</h2>
                        <label class="label-erro" id="label-nome"></label>
                        <input name="txtNome" id="txtNome" type="text" placeholder="Insira o nome do Responsável" value="<?php echo @$_GET['nomeResponsavel'] ?>">
                    </div>
                    <div class="input-box-width100">
                        <h2>Email Responsável</h2>
                        <label class="label-erro" id="label-email"></label>
                        <input name="txtEmail" id="txtEmail" type="text" placeholder="Insira o email do Responsável" value="<?php if(isset($_SESSION['emailResponsavel'])){
                                                                                                                                                                            echo $_SESSION['emailResponsavel'];
                                                                                                                                                                        }else{
                                                                                                                                                                            echo @$_GET['emailResponsavel'];
                                                                                                                                                                        } ?>">
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
                            placeholder="Insira o numero de telefone do Responsável" value="<?php echo @$_GET['telefoneResponsavel']; ?>">
                    </div>
                    <div class="input-box">
                        <h2>CPF Responsável:</h2>
                        <label class="label-erro" id="label-cpf"></label>
                        <input name="txtCpf" id="txtCpf" type="tel" placeholder="Insira CPF do Responsável" value="<?php if(isset($_SESSION['cpfResponsavel'])){
                                                                                                                                                                        echo $_SESSION['cpfResponsavel'];
                                                                                                                                                                    }else{
                                                                                                                                                                        echo @$_GET['cpfResponsavel'];
                                                                                                                                                                    } ?>">
                    </div>
                    <div class="input-box-width100">
                        <h2>CEP:</h2>
                        <label class="label-erro" id="label-cep"></label>
                        <input name="txtCep" id="txtCep" type="text"
                            placeholder="Insira o CEP do endereço do Reponsável" value="<?php echo @$_GET['cep']; ?>">
                    </div>
                    <div class="input-box-width100">
                        <h2>Rua:</h2>
                        <label class="label-erro" id="label-rua"></label>
                        <input name="txtRua" id="txtRua" type="text"
                            placeholder="Insira a rua do endereço do Responsável" value="<?php echo @$_GET['rua']; ?>">
                    </div>
                    <div class="input-box">
                        <h2>Número:</h2>
                        <label class="label-erro" id="label-numero"></label>
                        <input name="txtNumero" id="txtNumero" type="text" placeholder="Insira o número da residência" value="<?php echo @$_GET['numCasa']; ?>">
                    </div>
                    <div class="input-box">
                        <h2>Complemento:</h2>
                        <label class="label-erro" id="label-complemento"></label>
                        <input name="txtComplemento" id="txtComplemento" type="text" placeholder="Insira o complemento" value="<?php echo @$_GET['complemento']; ?>">
                    </div>
                    <div class="input-box">
                        <h2>Bairro:</h2>
                        <label class="label-erro" id="label-bairro"></label>
                        <input name="txtBairro" id="txtBairro" type="text" placeholder="Insira o bairro" value="<?php echo @$_GET['bairro']; ?>">
                    </div>
                    <div class="input-box">
                        <h2>Cidade:</h2>
                        <label class="label-erro" id="label-cidade"></label>
                        <input name="txtCidade" id="txtCidade" type="text" placeholder="Insira a cidade" value="<?php echo @$_GET['cidade']; ?>">
                    </div>
                    <div class="input-box-width100">
                        <h2>De qual aluno você é responsável:</h2>
                        <label class="label-erro" id="label-aluno"></label>
                        <input name="txtAluno" id="txtAluno" type="text" placeholder="Insira o nome do aluno"  value="<?php if(isset($_SESSION['nomeAluno'])){
                                                                                                                                                                echo $_SESSION['nomeAluno'];
                                                                                                                                                            }else{
                                                                                                                                                                echo @$_GET['nomeAluno'] ?> <?php echo @$_GET['turma'];
                                                                                                                                                            } ?>">
                        <div id="retornoPesquisa">

                        </div>
                    </div>
                    <div class="button">
                        <input type="submit" class="btn-nav-exit" value="Cadastrar">
                    </div>
                </div>
            </form>
        </section>
        <section class="container-controlers">
            <div class="content-card-link1" checked>
                <div class="side-left">
                    <h1>
                        <?php
                            $responsavel = new Responsavel();
                            $listaResponsavel = $responsavel->contar($_SESSION['idEscola']);
                            foreach($listaResponsavel as $linha){
                                echo $linha['qtdeResponsavel'];
                            }
                        ?>
                    </h1>
                    <p>Responsáveis</p>
                </div>
                <div class="side-right">    
                <a class="btn-ver-dados-tabela" id="btn-show-div-exibir-dados"><i class="fas fa-user-tie" aria-hidden="true"></i><p> ver todos</p></a>
                
                </div>

            </div>
            <a href="#Topo" class="content-card-link2">
                <div class="side-left">
                    <h1>+</h1>
                    <p>Adicionar Responsável</p>
                </div>
                <div class="side-right">
                    <i class="btn-adicionar-aluno fas fa-user-tie" aria-hidden="true"></i>
                </div>
            </a>

        </section>
        <div class="container-exibir-dados">
            <div class="box-titulo-bar-search">
                <h1>Responsáveis Cadastrados</h1> 
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
                            <td>CPF:</td>
                            <td>Email:</td>
                            <td>Aluno:</td>
                            <td>Alterar</td>
                            <td>Excluir</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $listaResponsavel = $responsavel->listar();
                        foreach($listaResponsavel as $linha){
                    ?>
                        <tr>
                          <td><?php echo $linha['nomeResponsavel'] ?></td>
                          <td><?php echo $linha['cpfResponsavel'] ?></td>
                          <td><?php echo $linha['emailResponsavel'] ?></td>
                          <td><?php echo $linha['nomeAluno'] ?></td>
                          <td><?php echo "<a class'opcao-icone' href='?idResponsavel={$linha['idResponsavel']}&nomeResponsavel={$linha['nomeResponsavel']}&cpfResponsavel={$linha['cpfResponsavel']}&emailResponsavel={$linha['emailResponsavel']}&idAluno={$linha['idAluno']}&nomeAluno={$linha['nomeAluno']}&turma={$linha['turmaAluno']}&telefoneResponsavel={$linha['numTelefoneResponsavel']}&cep={$linha['cepEnderecoResponsavel']}&rua={$linha['logradouroEnderecoResponsavel']}&numCasa={$linha['numCasaEnderecoResponsavel']}&complemento={$linha['complementoEnderecoResponsavel']}&bairro={$linha['bairroEnderecoResponsavel']}&cidade={$linha['cidadeEnderecoResponsavel']}'>"?><i class="icons-table fa fa-cog opcao-icone"></i><?php echo "</a>" ?></td>
                          <td><?php echo "<a href='../DAO/excluir-responsavel.php?idResponsavel={$linha['idResponsavel']}'"?> onclick="return confirm('Você está prestes a excluir a conta do responsável: <?php echo $linha['nomeResponsavel'] ?>, responsável por: <?php echo $linha['nomeAluno'] ?>, tem certeza?')"><i class="icons-table fas fa-times" aria-hidden="true"></i></td>
                        </tr>
                    <?php
                       }
                    ?>
                      
                   </tbody>
               </table>
            </div>
        </div>
    </main>

    <script src="../js/nav.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="../js/showDiv.js"></script>
    <script src="../js/jquery.mask.js"></script>

    <script>

        
        $(document).ready(function(){
            var repeteEmail = "<?php if(isset($_SESSION['emailResponsavel'])){echo 'true';}else{echo 'false';} ?>";
            var valueEmail = $('#txtEmail').val();
            var valueCpf = $('#txtCpf').val();
            var repeteCpf = "<?php if(isset($_SESSION['cpfResponsavel'])){echo 'true';}else{echo 'false';} ?>";
            var valueAluno = $('#txtAluno').val();
            var repeteAluno = "<?php if(isset($_SESSION['nomeAluno'])){echo 'true';}else{echo 'false';} ?>";
            if(valueEmail.length > 0 && repeteEmail == 'true'){
                $('#label-email').html('Email já cadastrado!');
                $('#txtEmail').addClass('erro-form');
                $('#label-email').show();
                setTimeout(function () {
                    $('#label-email').fadeOut(1);
                    $('#txtEmail').removeClass('erro-form');
                    $('#txtEmail').val('');
                }, 5000);
                <?php
                    unset($_SESSION['emailResponsavel']);
                ?>
                e.preventDefault();
            }
            if(valueCpf.length > 0 && repeteCpf == 'true'){
                $('#label-cpf').html('CPF já cadastrado!');
                $('#txtCpf').addClass('erro-form');
                $('#label-cpf').show();
                setTimeout(function () {
                    $('#label-cpf').fadeOut(1);
                    $('#txtCpf').removeClass('erro-form');
                    $('#txtCpf').val('');
                }, 5000);
                <?php
                    unset($_SESSION['cpfResponsavel']);
                ?>
                e.preventDefault();
            }
            if(valueAluno.length > 0 && repeteAluno == 'true'){
                $('#label-aluno').html('Aluno já tem responsável cadastrado!');
                $('#txtAluno').addClass('erro-form');
                $('#label-aluno').show();
                setTimeout(function () {
                    $('#label-aluno').fadeOut(1);
                    $('#txtAluno').removeClass('erro-form');
                    $('#txtAluno').val('');
                }, 5000);
                <?php
                    unset($_SESSION['nomeAluno']);
                ?>
                e.preventDefault();
            }
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

            if (email.length == 0 || emailSemEspaco == '') {
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
            if (senha1.length == 0 || senha1SemEspaco == '') {
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
            if (senha2.length == 0 || senha2SemEspaco == '') {
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

        });
    </script>

</body>




</html>