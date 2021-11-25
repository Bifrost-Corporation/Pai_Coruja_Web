<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.css">

    <link rel="stylesheet" type="text/css"  href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css"  href="../assets/css/chat.css">

    <title>Home - Responsável</title>


</head>

<body>
    <?php
        include("sentinela.php");
        include("globalResponsavel.php");
        include("../classes/Usuario.php");
        include("../classes/Responsavel.php");
        include ('../classes/ImagemResponsavel.php');

        include("../classes/Professor.php");
        include ('../classes/ImagemProfessor.php');

        $usuario = new Usuario();
        $responsavel = new Responsavel();

        $listaUsuario = $usuario->listar();
        $listaResponsavel = $responsavel->listarAlternativo();

        $imagemResponsavel = new ImagemResponsavel();
        $listaImagem = $imagemResponsavel->listarImagem($_SESSION['idResponsavel']);

        
        $imagemPerfilsrc = "img/user.png";
        foreach($listaImagem as $linha){
            if($linha['idResponsavel'] == $_SESSION['idResponsavel']){
                foreach($listaUsuario as $linha2){
                    $imagemPerfilsrc = $linha['caminhoImagemPerfilResponsavel'].$linha['nomeImagemPerfilResponsavel'];
                }
            }
        }

        foreach($listaResponsavel as $linha){
            if($linha['idResponsavel'] == $_SESSION['idResponsavel']){
                foreach($listaUsuario as $linha2){
                    if($linha['idResponsavel'] == $linha2['idResponsavel']){
                        $idUsuario = $linha2['idUsuario'];
                    }
                }
            }
        }
    ?>
        <header>
            <nav class="nav-bar">
                <div class="content-logo-btn">
                    <ul class="ul-area-btn">
                        <li class="nav-li"><a class="btn-nav-pc-open"><i class="material-icons-round">menu</i></a></li>
                    </ul>
                    <a href="home-responsavel.php"><img class="logo-img" src="../img/pai_coruja_branca.png"></a>
                </div>
                <button class="profile">
                    <div class="profile-details" id="openProfile">
                        <img src="../<?php echo $imagemPerfilsrc ?>" alt="">
                    </div>
                </button>

                <div class="dropdown-menu-profile">
                    <div class="profile-details">
                        <img src="../<?php echo $imagemPerfilsrc ?>" alt="">
                        <div class="name-job">
                            <div class="name-menu"><?php echo $_SESSION['nomeResponsavel'] ?></div>
                            <small class="job-menu">Olá Responsável(a)</small>
                        </div>
                    </div>
                    <ul class="opcoes-drop-profile">
                        <li class="drop-profile-li" id="alterar-imagem-perfil">
                            <a href="home-responsavel.php#ProfileEdit">
                                <i class="material-icons-round">manage_accounts</i>
                                <small>Trocar Imagem de Perfil <i class="material-icons-round">open_in_new</i></small>
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
                            <a href="home-responsavel.php">
                                <i class="material-icons-round">home</i>
                                <span class="links-name tooltip">Home</span>
                            </a>
                        </li>
                        <li class="links-name">
                            <a href="agenda.php">
                                <i class="material-icons-round">article</i>
                                <span class="links-name tooltip">Agenda Escolar</span>
                            </a>
                        </li>
                        <li class="links-name">
                        <a href="observacao-professor.php">
                            <i class="material-icons-round">flag</i>
                                <span class="links-name tooltip">Observações dos Professores</span>
                            </a>
                        </li>
                        <li class="links-name">
                            <a href="chat-responsavel.php"  class="active-nav">
                                <i class="material-icons-round">chat_bubble</i>
                                <span class="links-name tooltip">Pai Coruja Chat</span>
                            </a>
                        </li>
                    </div>
                </ul>
                
            </div>
        </header>



<main class="container-main">

<section class="area-chat">
<div class="menu-lateral">
        <div class="header-menu-lateral-title">
            
                       <h3>Mensagens</h3>
                      
                    </div>
                    <div class="container-area-conversa">
                        <div class="header-container-area-conversa">
                            <h3>Recentes</h3>
                            
                        </div>
                        
        <ul>
        <?php
            $secretaria = new Secretaria();
            $listaSecretaria = $secretaria->selecionarSecretaria($_SESSION['idEscola']);
            $imagemSecretaria = new ImagemSecretaria();
            foreach($listaSecretaria as $linha){
                $listaImagemSecretaria = $imagemSecretaria->listarImagem($linha['idSecretaria']);
                foreach($listaImagemSecretaria as $linha3){
                    $imagemPerfilSecretaria = $linha3['caminhoImagemPerfilSecretaria'].$linha3['nomeImagemPerfilSecretaria'];  
                }
        ?>
            <li id="contato1">
                <div class="area-botao-conversa">
                    <button class="botao-contato"id="<?php echo $linha['idUsuario'] ?>">
                    <div class="profile-details list">
                            <img src="../<?php echo $imagemPerfilSecretaria ?>" alt="">
                        </div>
                    <div class="container-texts-conversa">
                    <div class="title-conversa">
                            <p id="nomeContato1"><?php echo $linha['nomeSecretaria'] ?></p>
                        </div>
                        <div class="text-conversa">
                            <p>Secretária</p>
                        </div>
                    </div>

                    </button>
                </div>
            </li>
        <?php
            }

            $professor = new Professor();
            $qtdeProfessores = $professor->contar($_SESSION['idEscola']);
            foreach($qtdeProfessores as $linha){
                $qtdeProfessores = $linha['qtdeProfessor'];
            }
            $responsavel = new Responsavel();
            $aluno = new Aluno();
            $listaAlunos = $aluno->listar($_SESSION['idEscola']);
            $listaResponsavel = $responsavel->listar($_SESSION['idEscola']);
            foreach($listaResponsavel as $linha){
                if($linha['idResponsavel'] == $_SESSION['idResponsavel']){
                    foreach($listaAlunos as $linha2){
                        if($linha['idAluno'] == $linha2['idAluno']){
                            $idTurma = $linha2['idTurma'];
                        }
                    }
                }
            }
            $listaProfessor = $professor->listarEscola($_SESSION['idEscola']);
            $contaid = 2;
            $imagemProfessor = new ImagemProfessor();
            foreach($listaProfessor as $linha){
                $listaChatProfessor = $professor->selecionarProfessorChat($idTurma, $linha['idProfessor']);
                $listaImagemProfessor = $imagemProfessor->listarImagem($linha['idProfessor']);
                $imagemPerfilProfessor = "img/user.png";
                foreach($listaChatProfessor as $linha2){
                    foreach($listaImagemProfessor as $linha3){
                        $imagemPerfilProfessor = $linha3['caminhoImagemPerfilProfessor'].$linha3['nomeImagemPerfilProfessor'];  
                    }
            ?>
                <li id="contato<?php echo $contaid ?>">
                    <div class="area-botao-conversa">
                        <button class="botao-contato"id="<?php echo $linha2['idUsuario'] ?>">
                        <div class="profile-details list">
                                <img src="../<?php echo $imagemPerfilProfessor ?>" alt="">
                            </div>
                        <div class="container-texts-conversa">
                            <div class="title-conversa">
                                <p id="nomeContato<?php echo $contaid; ?>"><?php echo $linha2['nomeProfessor'] ?></p>
                            </div>
                            <div class="text-conversa">
                                <p>Professor</p>
                            </div>
                        </div>

                        </button>
                    </div>
                </li>
            <?php
                    $contaid = $contaid + 1;
                }
            }
        
            
        ?>
        </ul>
        
        </div>
    </div>
    <div class="caixa-chat ">
    
        <div class="nav-chat">
        <button class="botao-contato-abrir"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>
            <h1 class="name-user-chat" id="nomeContato"></h1>
        </div>
        
        <div class="caixa-mensagens">
            <div id="mensagens">
                <div class="container-no-message">
                    <i class="material-icons-round">question_answer</i>
                    <h3>Selecione uma conversa ou crie uma nova</h3>
                </div>
            </div>
        </div>
        <div class="form-mensagem">
            <form name="form-chat" method="POST" action="../DAO/enviar-mensagem.php">
                <input type="hidden" id="idEnviar" name="idEnviar" value="<?php echo $_SESSION['idResponsavel'] ?>">
                <input type="hidden" id="idReceber" name="idReceber" value="<?php echo $_SESSION['idSecretaria'] ?>">
                <input type="hidden" id="idUserProfessor" name="idUserProfessor" value="#">
                <div class="box-submit-message">
                <input type="text" class="caixa-mensagem" placeholder="Mande sua mensagem.." id="txtMensagem" name="txtMensagem">
                <button class="botao-enviar" id="botao-enviar" name="botao-enviar"><i class="fa fa-paper-plane" aria-hidden="true"></i>
        </button>
           
                </div>
             </form>
        </div>
    </div>
</section>
            
</main>

<div id="modalProfile" class="modal modal-profile">
            
            <!-- Modal content -->
        <div class="modal-content-profile">
            <div class="card-perfil">
                <span class="closeModalProfile"><i class="fas fa-times"></i></span>
                <div class="perfil-modal-body">
                    <img src="../img/usuario-de-perfil.png" alt="Sua Foto de Perfil" style="align-self: center;">
                    <div>
                        <h1><?php echo $_SESSION['nomeSecretaria'] ?></h1>
                        <small>Secretário(a) Escolar</small>
                    </div>
                    <form class="formulario" name="formImagemPerfil" id="formImagemPerfil" action="../DAO/inserir-imagem-secretaria.php" method="POST" enctype="multipart/form-data">
                        <div class="user-details">
                            <div class="input-box-width100">
                                <label class="label-erro" id="label-foto"></label>
                                <div>
                                    <label class="carregar-imagem-perfil" for="arquivo">Carregar Imagem Perfil</label>
                                    <input name="arquivo" id="arquivo" type="file" accept="image/*">
                                    <label class="label-erro" id="label-arquivo"></label>
                                    <span id="nome-arquivo"></span>
                                </div>
                            </div>
                        </div>
                        <br>
                        <input class="btn-nav-exit cadastrar-prof-step" type="submit" value="Enviar">
                    </form> 
                </div>
                
            </div>
        </div>

    </div>

    <script src="../assets/js/nav.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.js"></script>
    <script src="../assets/js/carousel.js"></script>

    <script>
        modalNovaConversa = document.querySelector('.modal-nova-conversa')
        $('.btn-show-modal').click(function(event){
            console.log('UAU')
            
            modalNovaConversa.style.display='block'       
        })
        $('.btn-close-modal-nova').click(function(){
            modalNovaConversa.style.display = 'none'
        })

        $('.btn-mensagem-agrupada').click(function(){
           formGroup = document.querySelector('.form-submit-message-agrupada')
           
               console.log('UAU')
               formGroup.style.display = 'flex'
          
            
        })

        $('.list-turma #option-all').click(function(event){

            if(this.checked){
                $('.ul-checkbox-options li :checkbox').each(function(){
                    this.checked=true
                })
            }
            else{
                $('.ul-checkbox-options li :checkbox').each(function(){
                    this.checked=false
                })
            }
        })


        /* REFORMAS NECESSÁRIAS!!!! */
        jQuery('.botao-contato').on('click', function(){  
             
             $('#idReceber').val(this.id);
             
                 (function attMensagens () {
                     
                     var idResponsavel = $('#idEnviar').val();

                     var idUsuarioResponsavel = <?php
                                                    $usuario = new Usuario();
                                                    $listaUsuario = $usuario->listar();
                                                    foreach($listaUsuario as $linha) {
                                                        if($linha['idResponsavel'] == $_SESSION['idResponsavel']){
                                                            echo $linha['idUsuario'];
                                                        }
                                                    }
                                                ?>;

                    var idDestino = $('#idReceber').val();

                    if(idDestino == 1){
                        var idSecretaria = $('#idReceber').val();

                        var idUsuarioSecretaria = <?php
                                                        foreach($listaUsuario as $linha) {
                                                            if($linha['idSecretaria'] == $_SESSION['idSecretaria']){
                                                                echo $linha['idUsuario'];
                                                            }
                                                        }
                                                    ?>;

                        var query = idUsuarioSecretaria + ' ' + idUsuarioResponsavel + ' ' + 'S';
                                            
                        $.ajax({
                            url: '../DAO/listar-mensagens-responsavel.php',
                            method: 'POST',
                            data: {
                                query: query
                            },
                            success: function(retorno){
                                $("#mensagens").html(retorno);
                            },
                            complete: function () {
                                setTimeout(attMensagens, 1000);
                            }
                        });
                    } else{
                        var idProfessor = $('#idReceber').val();

                        //Pegando o idUsuario quando o destino da mensagem for um professor (continua me parecendo errado...)
                        //alert(idProfessor);
                        
                        $.ajax({
                            url: '../DAO/pegar-id-professor.php',
                            method: 'POST',
                            data: {
                                idProfessor: idProfessor
                            },
                            success: function(retorno){
                                $("#idUserProfessor").val(retorno);
                                var idUsuarioProfessor = $("#idUserProfessor").val();
                        
                                var query = idUsuarioProfessor + ' ' + idUsuarioResponsavel + ' ' + 'P';
                            
                                $.ajax({
                                    url: '../DAO/listar-mensagens-responsavel.php',
                                    method: 'POST',
                                    data: {
                                        query: query
                                    },
                                    success: function(retorno){
                                        $("#mensagens").html(retorno);
                                    },
                                    complete: function () {
                                        setTimeout(attMensagens, 1000);
                                    }
                                });
                            },
                        });
                    }
                     
                 })();
         });

        jQuery('form').on('submit', function(e){
            e.preventDefault();
        });

        jQuery('#botao-enviar').click(function (){
            if($('#txtMensagem').length != 0){
                var dados = {'idEnviar':jQuery('#idEnviar').val(),
                            'idReceber':jQuery('#idReceber').val(),
                            'txtMensagem':jQuery('#txtMensagem').val()};
                var pageurl = '../DAO/enviar-mensagem-responsavel.php';
                jQuery.ajax({
                    url: pageurl,
                    data: dados,
                    type: 'POST',
                    success:function(html){
                        jQuery('html body').animate({scrollTop:9999 },100);
                        jQuery('html #txtMensagem').val('');
                    }
                });
            }
        });

        //Colocando o nome do contato na área do chat COMPLETAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAR
        <?php
        $qtdeContatos = $qtdeProfessores + 1;
        for($i = 1; $i <= $qtdeContatos; $i++){
        ?> 
            $("#contato<?php echo $i ?>").on('click', function(){
                var nomeContato = $("#nomeContato<?php echo $i ?>").text();
                $("#nomeContato").text(nomeContato);
                console.log(nomeContato);
            });
        <?php
        }
        ?>
    </script>
</body>



</html>
