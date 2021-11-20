<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1/glider.min.css">

    <link rel="stylesheet" type="text/css"  href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css"  href="../assets/css/chat.css">



    <title>Chat - Professor</title>


</head>

<body>
    <?php
        include ('sentinela.php');
        include ('globalProfessor.php');
        include("../classes/Usuario.php");
        include("../classes/Professor.php");
        include ('../classes/ImagemProfessor.php');

        $usuario = new Usuario();
        $professor = new Professor();

        $listaUsuario = $usuario->listar();
        $listaProfessor = $professor->listar();

        $imagemProfessor = new ImagemProfessor();
        $listaImagem = $imagemProfessor->listarImagem($_SESSION['idProfessor']);

        
        $imagemPerfilsrc = "img/user.png";
        foreach($listaImagem as $linha){
            if($linha['idProfessor'] == $_SESSION['idProfessor']){
                foreach($listaUsuario as $linha2){
                    $imagemPerfilsrc = $linha['caminhoImagemPerfilProfessor'].$linha['nomeImagemPerfilProfessor'];
                }
            }
        }
        
        foreach($listaProfessor as $linha){
            if($linha['idProfessor'] == $_SESSION['idProfessor']){
                foreach($listaUsuario as $linha2){
                    if($linha['idProfessor'] == $linha2['idProfessor']){
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
                    <a href="dashboard.php"><img class="logo-img" src="../img/pai_coruja_branca.png"></a>
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
                            <div class="name-menu"><?php echo $_SESSION['nomeProfessor'] ?></div>
                            <small class="job-menu">Olá Professor(a)</small>
                        </div>
                    </div>
                    <ul class="opcoes-drop-profile">
                        <!-- <li class="online-li">
                            <label for="">Online</label>
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider round"></span>
                            </label>
                        </li> -->
                        <li class="drop-profile-li" id="alterar-imagem-perfil">
                            <a href="home-professor.php#ProfileEdit">
                                <i class="material-icons-round">manage_accounts</i>
                                <small>Trocar Imagem de Perfil</small>
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
                            <a href="home-professor.php">
                                <i class="material-icons-round">space_dashboard</i>
                                <span class="links-name tooltip">Dashboard</span>
                            </a>
                        </li>
                        <li class="links-name">
                            <a href="cadastrar-publicacao.php">
                                <i class="material-icons-round">notes</i>
                                <span class="links-name tooltip">Cadastrar Publicação</span>
                            </a>
                        </li>
                        <li class="links-name">
                        <a href="cadastrar-flags.php">
                            <i class="material-icons-round">sticky_note_2</i>
                                <span class="links-name tooltip">Cadastrar Observações</span>
                            </a>
                        </li>
                        <li class="links-name">
                            <a href="chat-professor.php"  class="active-nav">
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
                        $responsavel = new Responsavel();
                        $listaContatos = $responsavel->selecionarResponsavelChat($_SESSION['idProfessor']);
                        $qtdeResponsaveis = $responsavel->contar($_SESSION['idEscola']);
                        foreach($qtdeResponsaveis as $linha){
                            $qtdeResponsaveis = $linha['qtdeResponsavel'];
                        }
                        $contaid = 1;
                        foreach($listaContatos as $linha){
                    ?>
                        <li id="contato<?php echo $contaid; ?>">
                            <div class="area-botao-conversa">
                                <button class="botao-contato"id="<?php echo $linha['idResponsavel'] ?>">
                                <div class="profile-details list">
                                        <img src="../img/macacopc.gif" alt="">
                                    </div>
                                <div class="container-texts-conversa">
                                    <div class="title-conversa">
                                        <p id="nomeContato<?php echo $contaid; ?>"><?php echo $linha['nomeResponsavel'] ?></p>
                                    </div>
                                    <div class="text-conversa">
                                        <p>Responável</p>

                                    </div>
                                </div>

                                </button>
                            </div>
                        </li>
                    <?php
                            $contaid++;
                        }
                    ?>
                    </ul>
                    
                    </div>
                    <div class="footer-area-conversa">
                        <button class="btn-show-modal" href=""><h4><i class="fa fa-plus" aria-hidden="true"></i></h4></button>
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
                        <form name="form-chat" method="POST" action="../DAO/enviar-mensagem-professor.php">
                            <input type="hidden" id="idEnviar" name="idEnviar" value="<?php echo $_SESSION['idProfessor'] ?>">
                            <input type="hidden" id="idReceber" name="idReceber" value="#">
                            <input type="hidden" id="idUserResponsavel" name="idUserResponsavel" value="#">
                            <div class="box-submit-message">
                            <input type="text" class="caixa-mensagem" placeholder="Mande sua mensagem.." id="txtMensagem" name="txtMensagem">
                            <button class="botao-enviar" id="botao-enviar" name="botao-enviar"><i class="fa fa-paper-plane" aria-hidden="true"></i>
                    </button>
                       
                            </div>
                         </form>
                    </div>
                </div>
            </section>
            <section class="modal-nova-conversa">
                <div class="header-modal-nova-conversa">
                    <h3><button class="btn-close-modal-nova"><i class="fa fa-arrow-left" aria-hidden="true"></button></i> Selecione os Contatos</h3>
                    <small>Você pode selecionar responsáveis ou professores</small>
                </div>
                <div class="container-checklist">
                    <?php
                        $turma = new Turma();
                        $listaTurma = $turma->listar($_SESSION['idEscola']);
                        foreach($listaTurma as $linha){
                    ?>
                        <ul class="list-turma">
                            <input type="checkbox" class="check-options-all" name="option-all" id="option-all-<?php echo $linha['idTurma']; ?>">
                            <label for="option-all"><?php echo $linha['nomeTurma'] ?></label>
                            <ul class="ul-checkbox-options" id="ul-checkbox-options-<?php echo $linha['idTurma'] ?>">
                                <?php
                                    $responsavel = new Responsavel();
                                    $listaResponsavel = $responsavel->listar($_SESSION['idEscola']);
                                    foreach($listaResponsavel as $linha2){
                                        if($linha2['idTurma'] == $linha['idTurma']){
                                ?>
                                <li>
                                    <div class="profile-details list">
                                        <img src="../img/macacopc.gif" alt="">
                                        <label for="check-options"><?php echo $linha2['nomeResponsavel'] ?></label>
                                    </div>
                                    <input class="check-options" type="checkbox" name="check-options-<?php echo $linha2['idResponsavel'] ?>" id="check-options-<?php echo $linha2['idResponsavel'] ?>">
                                </li>
                                <?php
                                        }
                                    }
                                ?>
                                
                            </ul>
                        </ul>
                    <?php
                        }
                    ?>
                    
                </div>
                <div class="footer-modal-nova-conversa">
                    <button class="btn-mensagem-agrupada" href="" actived>Comunicado</button>
                    <form class="form-submit-message-agrupada" id="formMensagemAgrupada" name="formMensagemAgrupada">
                        <input type="text" placeholder="Mande sua mensagem" id="txtMensagemAgrupada" name="txtMensagemAgrupada">
                        <button id="botao-enviar-agrupado" name="botao-enviar-agrupado"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                    </form>
                </div>
            </section>   
        </main>
        
       



    <script src="../assets/js/modalProfile.js"></script>
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

        <?php
            foreach($listaTurma as $linha){
        ?>
            $('.list-turma #option-all-<?php echo $linha['idTurma']; ?>').click(function(event){

            if(this.checked){
                $('#ul-checkbox-options-<?php echo $linha['idTurma'] ?> li :checkbox').each(function(){
                    this.checked=true
                })
            }
            else{
                $('#ul-checkbox-options-<?php echo $linha['idTurma'] ?> li :checkbox').each(function(){
                    this.checked=false
                })
            }
            })
        <?php
            }
        ?>




       
        jQuery('.botao-contato').on('click', function(){  
             
            $('#idReceber').val(this.id);
            
                (function attMensagens () {
                    var idProfessor = $('#idEnviar').val();
                    var idResponsavel = $('#idReceber').val();

                    var idUsuarioProfessor = <?php 
                                                    $usuario = new Usuario();
                                                    $listaUsuario = $usuario->listar();
                                                    foreach($listaUsuario as $linha){
                                                        if($linha['idProfessor'] == $_SESSION['idProfessor']){
                                                            echo $linha['idUsuario'];
                                                        }
                                                    }
                                                ?>

                    $.ajax({
                        url: '../DAO/pegar-id-responsavel.php',
                        method: 'POST',
                        data: {
                            idResponsavel: idResponsavel
                        },
                        success: function(retorno){
                            $("#idUserResponsavel").val(retorno);
                            var idUsuarioResponsavel = $("#idUserResponsavel").val();
                     
                            var query = idUsuarioProfessor + ' ' + idUsuarioResponsavel;

                            $.ajax({
                                url: '../DAO/listar-mensagens.php',
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
                var pageurl = '../DAO/enviar-mensagem-professor.php';
                jQuery.ajax({
                    url: pageurl,
                    data: dados,
                    type: 'POST',
                    success:function(html){
                        jQuery('html body').animate({scrollbottom:0},100);
                        jQuery('html #txtMensagem').val('');
                    }
                });
            }
        });
        if(window.innerWidth > 720){
            const botaoContato = document.querySelectorAll(".botao-contato");
            
        }else{
            const botaoContato = document.querySelectorAll(".botao-contato")
            const botaoContatoAbrir = document.querySelector(".botao-contato-abrir")
            const menuLateralChat = document.querySelector('.menu-lateral')
            const containerChat = document.querySelector('.caixa-chat')
            
            for(i of botaoContato){
        
                i.addEventListener("click", function() {
        setTimeout(()=> {
                console.log("Abriu")
                menuLateralChat.classList.toggle("menu-lateral-active")
        },600)
            });
            botaoContatoAbrir.addEventListener("click", function() {
                console.log("Fechou")
                menuLateralChat.classList.remove("menu-lateral-active")
            });
            }     

        }

        //Colocando o nome do contato na área do chat
        <?php
        for($i = 1; $i <= $qtdeResponsaveis; $i++){
        ?> 
            $("#contato<?php echo $i ?>").on('click', function(){
                var nomeContato = $("#nomeContato<?php echo $i ?>").text();
                $("#nomeContato").text(nomeContato);
            });
        <?php
        }
        ?>

        //Mandar Mensagens para vários contatos
        $('#botao-enviar-agrupado').on('click', function (){
            var mensagem = $('#txtMensagemAgrupada').val();
            var mensagemSemEspaco = mensagem.trim();
            if(mensagem.length > 0 && mensagemSemEspaco.length > 0){
                <?php 
                    foreach($listaTurma as $linha){

                        foreach($listaResponsavel as $linha2){
                            if($linha2['idTurma'] == $linha['idTurma']){
                ?>
                                if($('#check-options-<?php echo $linha2['idResponsavel'] ?>').is(":checked")){
                                    $("#idReceber").val(<?php echo $linha2['idResponsavel'] ?>)
                                    var dados = {'idEnviar':jQuery('#idEnviar').val(),
                                                'idReceber':jQuery('#idReceber').val(),
                                                'txtMensagem':jQuery('#txtMensagemAgrupada').val()};
                                    var pageurl = '../DAO/enviar-mensagem-professor.php';
                                    jQuery.ajax({
                                        url: pageurl,
                                        data: dados,
                                        type: 'POST',
                                        success:function(html){
                                            $('#txtMensagemAgrupada').val('');
                                            var modalNovaConversa = document.querySelector('.modal-nova-conversa');
                                            modalNovaConversa.style.display = 'none';
                                        }
                                    });
                                }
                <?php
                            }
                        }
                    }    
                ?>
            }else{
                
            }
        });
        

    </script>
</body>



</html>
