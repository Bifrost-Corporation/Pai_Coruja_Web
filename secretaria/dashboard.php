<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/grafico.css">
    <link rel="stylesheet" type="text/css"  href="../assets/css/modal.css">



    <title>Dashborard - Secretária</title>


    <?php

        include ('sentinela.php');
        include ('globalSecretaria.php');
        include ('../classes/Secretaria.php');
        include ('../classes/Turma.php');
        include ('../classes/Usuario.php');

        $secretaria = new Secretaria();
        $usuario = new Usuario();

        $turma = new Turma();
        $observacao = new Observacao();
        $qtdeCor = 0;

        $listaSecretaria = $secretaria->listar();
        $listaUsuario = $usuario->listar();

        $listaQtdeAlunos = $secretaria->contarAlunos($_SESSION['idEscola']);
        $listaQtdeProfessores = $secretaria->contarProfessores($_SESSION['idEscola']);
        $listaQtdeTurmas = $secretaria->contarTurmas($_SESSION['idEscola']);
        $listaQtdeResponsaveis = $secretaria->contarResponsaveis($_SESSION['idEscola']);
        $listaMediaObservacoes = $secretaria->mediaObservacoes($_SESSION['idEscola']);
        $listaMediaAlunoTurma = $secretaria->mediaAlunosTurma($_SESSION['idEscola']);
        $listaAlunosTurmas = $turma->contarAlunosTurma($_SESSION['idEscola']);
        $listaQtdePontos0 = $observacao->contarObservacoesPorValor(0, $_SESSION['idEscola']);
        $listaQtdePontos1 = $observacao->contarObservacoesPorValor(1, $_SESSION['idEscola']);
        $listaQtdePontos2 = $observacao->contarObservacoesPorValor(2, $_SESSION['idEscola']);
        $listaQtdePontos3 = $observacao->contarObservacoesPorValor(3, $_SESSION['idEscola']);
        $listaQtdePontos4 = $observacao->contarObservacoesPorValor(4, $_SESSION['idEscola']);
        $listaQtdePontos5 = $observacao->contarObservacoesPorValor(5, $_SESSION['idEscola']);

        foreach($listaSecretaria as $linha){
            if($linha['idSecretaria'] == $_SESSION['idSecretaria']){
                foreach($listaUsuario as $linha2){
                    if($linha['idSecretaria'] == $linha2['idSecretaria']){
                        $idUsuario = $linha2['idUsuario'];
                    }
                }
            }
        }

        foreach($listaQtdeAlunos as $linha){
            $qtdeAlunos = $linha['qtdeAlunos'];
        }

        foreach($listaQtdeProfessores as $linha){
            $qtdeProfessores = $linha['qtdeProfessores'];
        }

        foreach($listaQtdeTurmas as $linha){
            $qtdeTurmas = $linha['qtdeTurmas'];
        }

        foreach($listaQtdeResponsaveis as $linha){
            $qtdeResponsaveis = $linha['qtdeResponsaveis'];
        }

        foreach($listaMediaObservacoes as $linha){
            $mediaObservacoes = $linha['mediaObservacoes'];
        }

        foreach($listaMediaAlunoTurma as $linha){
            $mediaAlunoTurma = $linha['mediaTurma'];
        }

        foreach($listaAlunosTurmas as $linha){
            $qtdeCor += 1;
        }

        foreach($listaQtdePontos0 as $linha){
            $qtdePontos0 = $linha['qtdeObservacao'];
        }

        foreach($listaQtdePontos1 as $linha){
            $qtdePontos1 = $linha['qtdeObservacao'];
        }

        foreach($listaQtdePontos2 as $linha){
            $qtdePontos2 = $linha['qtdeObservacao'];
        }

        foreach($listaQtdePontos3 as $linha){
            $qtdePontos3 = $linha['qtdeObservacao'];
        }

        foreach($listaQtdePontos4 as $linha){
            $qtdePontos4 = $linha['qtdeObservacao'];
        }

        foreach($listaQtdePontos5 as $linha){
            $qtdePontos5 = $linha['qtdeObservacao'];
        }

        $mediaAlunoTurma = number_format($mediaAlunoTurma, 1, '.', '');
        $mediaObservacoes = number_format($mediaObservacoes, 1, '.', '');
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
                            <a href="dashboard.php" class="active-nav">
                                <i class="fas fa-calendar"></i>
                                <span class="links-name">Dashboard</span>
                            </a>
                        </li>
                        <li class="links-name">
                            <a href="cadastrar-dados.php">
                                <i class="fas fa-school"></i>
                                <span class="links-name">Cadastrar Dados</span>
                            </a>
                        </li>
                        <li class="links-name">
                            <a href="visualizar-dados.php">
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

        
    

    <main>
        
        
        
        <div class="container-dash">
            <div class="ola-nav-dash">
                <h1>Dashboard</h1>
            </div>

            <div class="container-dados-dash">
                <div class="acesso-rapido-dash">
                    <h4>Acesso Rápido</h4>
                    <div class="acesso-dash-btns">
                        <a href="cadastrar-dados.php"><button>Cadastrar Dados</button></a>
                        <a href="chat-secretaria.php"><button>Chat Secretaria</button></a>
                        <a href="visualizar-dados.php"><button>Visualizar Dados</button></a>
                    </div>
                </div>
                <div class="dados-escolares-dash">
                    <div class="dados-escolares-container">
                        <div class="dados-escolares-linha">
                            <div class="dado-escolar">
                                <i class="fas fa-user-graduate"></i>
                                <div>
                                    <h3><?php echo $qtdeAlunos ?></h3>
                                    <h5>Alunos Cadastrados</h5>
                                </div> 
                            </div>
                            <div class="dado-escolar">
                                <i class="fas fa-users"></i>
                                <div>
                                    <h3><?php echo $qtdeProfessores ?></h3>
                                    <h5>Professores Cadastradas</h5>
                                </div> 
                            </div> 
                        </div>
                        <div class="dados-escolares-linha">
                            <div class="dado-escolar">
                                <i class="fas fa-users"></i>
                                <div>
                                    <h3><?php echo $qtdeTurmas ?></h3>
                                    <h5>Turmas Cadastradas</h5>
                                </div> 
                            </div>
                            <div class="dado-escolar">
                                <i class="fas fa-users"></i>
                                <div>
                                    <h3><?php echo $qtdeResponsaveis ?></h3>
                                    <h5>Responsáveis Cadastrados</h5>
                                </div> 
                            </div> 
                        </div>
                        <div class="dados-escolares-linha">
                            <div class="dado-escolar">
                                <i class="fas fa-calendar-check"></i>
                                <div>
                                    <h3><?php echo $mediaObservacoes ?></h3>
                                    <h5>Média Observações</h5>
                                </div> 
                            </div>
                            <div class="dado-escolar">
                                <i class="fas fa-user-graduate"></i>
                                <div>
                                    <h3><?php echo $mediaAlunoTurma ?></h3>
                                    <h5>Média de alunos por turma</h5>
                                </div> 
                            </div> 
                        </div>
                        
                    </div>
                </div>
                <div class="msg-chat-dash">
                    <h4>Mensagens do Chat</h4>
                    <!--<img src="../img/macacopc.gif">-->
                </div>
            </div>
            
            <div class="grafico-container-dash">
                <div>
                    <div class="acesso-dash-btns">
                        <a id="botao-grafico1" onclick="gerarGraficoGravidadeObservacao()"><button>Gravidade das Observações</button></a>
                        <a id="botao-grafico2" onclick="gerarGraficoAlunoTurma()"><button>Alunos por Turma</button></a>
                    </div>
                    <div class="grafico">
                        <canvas id="grafico" height="500" responsive></canvas>
                    </div>
                </div>
            </div>
        </div>

        


    </main>

    <div class="nav-footer">
        <ul>
            <li class="active">
                <a href="home-responsavel.php">
                    <i class="fas fa-calendar"></i>
                    <span class="links-name">Mural</span>
                </a>
            </li>
            <li class="">
                <a href="#">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <span class="links-name">Avaliação</span>
                </a>
            </li>
            <li class="">
                <a href="#">
                    <i class="fas fa-calendar-day"></i>
                    <span class="links-name">Eventos</span>
                </a>
            </li>
        </ul>
    </div>

    <div id="modalReset" class="modal modal-evento">
            
            <!-- Modal content -->
            <div class="modal-content">
                <div class="bg-modal-senha">
                    <div class="div-imagem">
                        <img src="../img/reset_senha.jpg" class="img-card">
                    </div>
                    <div class="title-modal">
                        <h1>RESETE SUA SENHA</h1>
                        <!-- <button><i class="fas fa-bookmark"></i> Tenho Interesse</button> -->
                    </div>
                    
                </div>  
            <div class="modal-text-description">
                <div class="info-modal">
                    <h5>Primeiro Acesso ao Pai Coruja?</h5>
                </div>
                <h4>Identificamos que esse é seu primeiro login no nosso sistema, e, por segurança, pedimos para que você modifique sua senha de acesso!</h4>
                <form name="formAttSenha" id="formAttSenha" method="POST" action="../DAO/reset-senha-acesso.php">
                    <div class="user-details slidePage">
                        <input type="hidden" id="idUsuario" name="idUsuario" value="<?php echo $idUsuario ?>">
                        <input type="hidden" value="<?php echo $_SESSION['primeiroAcesso'] ?>">
                        <div class="input-box-width100 divSenha">
                            <h5>Informe sua nova senha:</h5>
                            <label class="label-erro" id="label-senha1"></label>
                            <input type="password" name="txtSenha" id="txtSenha">
                        </div>
                        <div class="input-box-width100 divSenha">
                            <h5>Confirme a senha:</h5>
                            <label class="label-erro" id="label-senha2"></label>
                            <input type="password" name="txtConfirmarSenha" id="txtConfirmarSenha">
                        </div>
                        <div class="input-box-width100 divSenha">
                            <button class="btn-nav-exit nextBtnSkipTwo btn-page-next" type="submit">Trocar Senha</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script src="../assets/js/nav.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.js"></script>
    <script src="../assets/js/carousel.js"></script>
    <script src="../assets/js/modal.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>

        <?php
            
            function randomColorR(){
                $r = mt_rand(0, 200);
                return $r;
            }

            function randomColorG(){
                $g = mt_rand(0, 200);
                return $g;
            }

            function randomColorB(){
                $b = mt_rand(0, 200);
                return $b;
            }

        ?>

        const ctx = document.getElementById('grafico').getContext("2d");
        let grafico = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: [
                        '0',
                        '1',
                        '2',
                        '3',
                        '4',
                        '5'
                    ],
                    datasets: [{
                        label: 'Quantidade de observações por gravidade',
                        data: [
                            <?php echo $qtdePontos0.", ".$qtdePontos1.", ".$qtdePontos2.", ".$qtdePontos3.", ".$qtdePontos4.", ".$qtdePontos5.", " ?>
                        ],
                        backgroundColor: [
                            'rgb(67, 225, 228)',
                            'rgb(86, 229, 76)',
                            'rgb(207, 227, 53)',
                            'rgb(224, 131, 24)',
                            'rgb(226, 38, 38)',
                            'rgb(0, 0, 0)',
                        ],
                        hoverOffset: 4
                    }],
                    options: {
                        plugins: {
                            title: {
                                display: true,
                                text: 'Gravidade das Observações na Escola'
                            }
                        },
                        responsive: true,
                        maintainAspectRatio: false
                    },
                },
            });


        function gerarGraficoGravidadeObservacao(){
            grafico.destroy();
            grafico = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: [
                        '0',
                        '1',
                        '2',
                        '3',
                        '4',
                        '5'
                    ],
                    datasets: [{
                        label: 'Quantidade de observações por gravidade',
                        data: [
                            <?php echo $qtdePontos0.", ".$qtdePontos1.", ".$qtdePontos2.", ".$qtdePontos3.", ".$qtdePontos4.", ".$qtdePontos5.", " ?>
                        ],
                        backgroundColor: [
                            'rgb(67, 225, 228)',
                            'rgb(86, 229, 76)',
                            'rgb(207, 227, 53)',
                            'rgb(224, 131, 24)',
                            'rgb(226, 38, 38)',
                            'rgb(0, 0, 0)',
                        ],
                        hoverOffset: 4
                    }],
                    options: {
                        plugins: {
                            title: {
                                display: true,
                                text: 'Gravidade das Observações na Escola'
                            }
                        },
                        responsive: true,
                        maintainAspectRatio: false
                    },
                },
            });
        }

        function gerarGraficoAlunoTurma(){
            grafico.destroy();
            grafico = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [
                        <?php
                            $i = 1; 
                            foreach($listaAlunosTurmas as $linha){
                        ?>
                        
                        <?php
                                echo "'" . $linha['nomeTurma'] . "'" . ",";
                                $i += 1;
                            }
                        ?>
                    ],
                    datasets: [{
                        label: 'Quantidade de alunos na turma',
                        data: [
                            <?php
                                $i = 1; 
                                foreach($listaAlunosTurmas as $linha){
                            ?>
                            
                            <?php
                                    echo $linha['alunoTurma'] . ",";
                                    $i += 1;
                                }
                            ?>
                        ],
                        backgroundColor: [
                            <?php
                                $i = 1; 
                                foreach($listaAlunosTurmas as $linha){
                            ?>
                            
                            <?php
                                /*
                                    echo "'rgba(".randomColorR().",".randomColorG().",".randomColorB().",1)',";
                                    $i += 1;
                                }
                                */
                                echo "'rgba(13, 37, 145)',";
                                }
                            ?>
                        ]
                    }]
                },
                options: {
                    plugins: {
                        title: {
                            display: true,
                            text: 'Quantidade de alunos por turma'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    responsive: true,
                    maintainAspectRatio: false
                },
            });
        }

        $(document).ready(function(){
            var modal = document.getElementById("modalReset");
            var primeiroAcesso = "<?php echo $_SESSION['primeiroAcesso'] ?>";
            if(primeiroAcesso === "V"){
                modal.classList.toggle("modal-active");
            }else{
                
            }
        });

        /*
        $(document).on('beforeunload', function (){
            var modal = document.getElementById("modalReset");
            var primeiroAcesso = "<?php echo $_SESSION['primeiroAcesso'] ?>";
            if(primeiroAcesso === "V"){
                modal.classList.toggle("modal-active");
                alert('<?php echo $_SESSION['primeiroAcesso'] ?>');
            }else{
                alert('<?php echo $_SESSION['primeiroAcesso'] ?>');
            }
        });
        */

        $('#formAttSenha').on('submit', function(e){
            var senha1 = $('#txtSenha').val();
            var senha2 = $('#txtConfirmarSenha').val();
            var senha1SemEspaco = senha1.trim();
            var senha2SemEspaco = senha2.trim();

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
                $('#txtConfirmarSenha').addClass('erro-form');
                $('#label-senha2').show();
                $('#txtConfirmarSenha').focus();
                setTimeout(function () {
                    $('#label-senha2').fadeOut(1);
                    $('#txtConfirmarSenha').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
            if (senha1 != senha2) {
                $('#label-senha1').html('Senhas não correspondentes!');
                $('#txtSenha').addClass('erro-form');
                $('#label-senha1').show();
                $('#txtSenha').focus();
                $('#label-senha2').html('Senhas não correspondentes!');
                $('#txtConfirmarSenha').addClass('erro-form');
                $('#label-senha2').show();
                $('#txtConfirmarSenha').focus();
                setTimeout(function () {
                    $('#label-senha1').fadeOut(1);
                    $('#txtSenha').removeClass('erro-form');
                    $('#label-senha2').fadeOut(1);
                    $('#txtConfirmarSenha').removeClass('erro-form');
                }, 5000);
                e.preventDefault();

            }
        });
        
    </script>
</body>



</html>