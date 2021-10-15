<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.css">

    <link rel="stylesheet" type="text/css"  href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css"  href="../assets/css/grafico.css">



    <title>Home - Secretária</title>


    <?php
        include ('sentinela.php');
        include ('globalSecretaria.php');
        include ('../classes/Secretaria.php');
        include ('../classes/Turma.php');

        $secretaria = new Secretaria();
        $turma = new Turma();
        $qtdeCor = 0;

        $listaQtdeAlunos = $secretaria->contarAlunos($_SESSION['idEscola']);
        $listaQtdeProfessores = $secretaria->contarProfessores($_SESSION['idEscola']);
        $listaQtdeTurmas = $secretaria->contarTurmas($_SESSION['idEscola']);
        $listaQtdeResponsaveis = $secretaria->contarResponsaveis($_SESSION['idEscola']);
        $listaMediaObservacoes = $secretaria->mediaObservacoes($_SESSION['idEscola']);
        $listaMediaAlunoTurma = $secretaria->mediaAlunosTurma($_SESSION['idEscola']);
        $listaAlunosTurmas = $turma->contarAlunosTurma($_SESSION['idEscola']);

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
                            <a href="cadastrar-dados.php">
                                <i class="fas fa-school"></i>
                                <span class="links-name">Cadastrar Dados</span>
                            </a>
                        </li>
                        <li class="links-name">
                            <a href="cadastrar-d.php">
                                <i class="fas fa-school"></i>
                                <span class="links-name">Alterar Dados</span>
                            </a>
                        </li>
                        <li class="links-name">
                            <a href="cadastrar-turma.php">
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
                        <a href=""><button>Cadastrar Dados</button></a>
                        <a href=""><button>Cadastrar Dados</button></a>
                    </div>
                </div>
                <div class="dados-escolares-dash">
                    <h4>Dados Escolares - <?php echo $_SESSION['nomeEscola'] ?></h4>
                    <div class="dados-escolares-container">
                        <div class="dados-escolares-linha">
                            <div class="dado-escolar">
                                <i class="fas fa-school"></i>
                                <div>
                                    <h3><?php echo $qtdeAlunos ?></h3>
                                    <h5>Alunos Cadastrados</h5>
                                </div> 
                            </div>
                            <div class="dado-escolar">
                                <i class="fas fa-school"></i>
                                <div>
                                    <h3><?php echo $qtdeProfessores ?></h3>
                                    <h5>Professores Cadastradas</h5>
                                </div> 
                            </div> 
                        </div>
                        <div class="dados-escolares-linha">
                            <div class="dado-escolar">
                                <i class="fas fa-school"></i>
                                <div>
                                    <h3><?php echo $qtdeTurmas ?></h3>
                                    <h5>Turmas Cadastradas</h5>
                                </div> 
                            </div>
                            <div class="dado-escolar">
                                <i class="fas fa-school"></i>
                                <div>
                                    <h3><?php echo $qtdeResponsaveis ?></h3>
                                    <h5>Responsáveis Cadastrados</h5>
                                </div> 
                            </div> 
                        </div>
                        <div class="dados-escolares-linha">
                            <div class="dado-escolar">
                                <i class="fas fa-school"></i>
                                <div>
                                    <h3><?php echo $mediaObservacoes ?></h3>
                                    <h5>Média Observações</h5>
                                </div> 
                            </div>
                            <div class="dado-escolar">
                                <i class="fas fa-school"></i>
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
                </div>
            </div>
            
            <div class="grafico-container-dash">
                <div>
                    <div class="acesso-dash-btns">
                        <a href=""><button>Cadastrar Dados</button></a>
                        <a href="" id="botao-grafico2"><button>Cadastrar Dados</button></a>
                    </div>
                    <div class="grafico">
                        <canvas id="grafico" width="50" height="50" responsive></canvas>
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

    <script src="../assets/js/nav.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.js"></script>
    <script src="../assets/js/carousel.js"></script>
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

        const ctx = document.getElementById('grafico');
        const grafico = new Chart(ctx, {
            /*
                type: 'bar',
                data: data,
                options: {
                    scales: {
                    y: {
                        beginAtZero: true
                    }
                    }
                },
            */
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
                                echo "'rgba(".randomColorR().",".randomColorG().",".randomColorB().",1)',";
                                $i += 1;
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
    </script>
</body>



</html>