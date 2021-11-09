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



    <title>Chat - Secretária</title>


</head>

<body>
    <?php
        include ('sentinela.php');
        include ('globalSecretaria.php');
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
                        <img src="../img/macacopc.gif" alt="">
                    </div>
                </button>

                <div class="dropdown-menu-profile">
                    <div class="profile-details">
                        <img src="../img/macacopc.gif" alt="">
                        <div class="name-job">
                            <div class="name-menu"><?php echo $_SESSION['nomeSecretaria'] ?></div>
                            <small class="job-menu">Olá Secretário(a)</small>
                        </div>
                    </div>
                    <ul class="opcoes-drop-profile">
                        <li class="online-li">
                            <label for="">Online</label>
                            <label class="switch">
                                <input type="checkbox" checked>
                                <span class="slider round"></span>
                            </label>
                        </li>
                        <li class="drop-profile-li" id="alterar-imagem-perfil">
                            <a>
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
                            <a href="dashboard.php">
                                <i class="material-icons-round">space_dashboard</i>
                                <span class="links-name tooltip">Dashboard</span>
                            </a>
                        </li>
                        <li class="links-name">
                            <a href="cadastrar-dados.php">
                                <i class="material-icons-round">app_registration</i>
                                <span class="links-name tooltip">Cadastrar Dados</span>
                            </a>
                        </li>
                        <li class="links-name">
                        <a href="visualizar-dados.php">
                            <i class="material-icons-round">view_list</i>
                                <span class="links-name tooltip">Alterar Dados</span>
                            </a>
                        </li>
                        <li class="links-name">
                            <a href="cadastrar-evento.php">
                                <i class="material-icons-round">edit_calendar</i>
                                <span class="links-name tooltip">Gerenciar Eventos</span>
                            </a>
                        </li>
                        <li class="links-name">
                            <a href="chat-secretaria.php"  class="active-nav">
                                <i class="material-icons-round">chat</i>
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
                        <!--<div class="container-box-search">
                            <form action="">
                                <input type="text" placeholder="Buscar..">
                                <button><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>
                        </div>-->

                    </div>
                    <div class="container-area-conversa">
                        <div class="header-container-area-conversa">
                         
                        </div>
                        
                    <ul>
                    <?php
                        $secretaria = new Secretaria();
                        $listaContatos = $secretaria->listarResponsaveis($_SESSION['idEscola']);
                        foreach($listaContatos as $linha){
                    ?>
                        <li><div class="area-botao-conversa">
                        <button class="botao-contato"id="<?php echo $linha['idResponsavel'] ?>">
                        <div class="profile-details list">
                                <img src="../img/macacopc.gif" alt="">
                            </div>
                        <div class="container-texts-conversa">
                        <div class="title-conversa">
                                <?php echo $linha['nomeResponsavel'] ?>
                            </div>
                            <div class="text-conversa">
                                <p>mingau ajsak ajshja jajshj ahsjh</p>

                            </div>
                        </div>

                        </button>
                    </div></li>
                    <?php
                        }
                    ?>
                    </ul>
                    
                    </div>
                    <div class="footer-area-conversa">
                        <button class="btn-show-modal" href=""><h4><i class="material-icons-round">ios_share</i>  Nova Conversa</h4></button>
                    </div>
                </div>
                <div class="caixa-chat ">
                
                    <div class="nav-chat">
                    <button class="botao-contato-abrir"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>
                        <h1 class="name-user-chat"><?php echo $linha['nomeResponsavel'] ?></h1>
                    </div>
                    
                    <div class="caixa-mensagens">
                        <div id="mensagens">
                            <div class="mensagem-nao-tem-mensagem">
                                <h3>Selecione uma conversa ou crie uma nova</h3>
                            </div>
                        </div>
                    </div>
                    <div class="form-mensagem">
                        <form name="form-chat" method="POST" action="../DAO/enviar-mensagem.php">
                            <input type="hidden" id="idEnviar" name="idEnviar" value="<?php echo $_SESSION['idSecretaria'] ?>">
                            <input type="hidden" id="idReceber" name="idReceber" value="#">
                            <div class="box-submit-message">
                            <input type="text" class="caixa-mensagem" placeholder="Converse com @<?php echo $linha['nomeResponsavel'] ?>" id="txtMensagem" name="txtMensagem">
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
                    <ul class="list-turma">
                        <input type="checkbox" class="check-options-all"name="" id="option-all">
                        <label for="option-all">1° A</label>
                        <ul class="ul-checkbox-options">
                            <li>
                            <div class="profile-details list">
                                <img src="../img/macacopc.gif" alt="">
                                <label for="check-options">Robertin</label>
                            </div>
                            <input class="check-options" type="checkbox" name="" id="check-options">
                            </li>
                            <li>
                            <div class="profile-details list">
                                <img src="../img/macos.png" alt="">
                                <label for="check-options">Claudin</label>
                            </div>
                            <input class="check-options" type="checkbox" name="" id="check-options">
                            </li>
                            <li>
                            <div class="profile-details list">
                                <img src="../img/pai.png" alt="">
                                <label for="check-options">JUbiscleiton</label>
                            </div>
                            <input class="check-options" type="checkbox" name="" id="check-options">
                            </li>
                            
                        </ul>
                    </ul>
                    <ul class="list-turma">
                        <input type="checkbox" class="check-options-all"name="" id="option-all">
                        <label for="option-all">1° B</label>
                        <ul class="ul-checkbox-options">
                            <li>
                            <div class="profile-details list">
                                <img src="../img/macacopc.gif" alt="">
                                <label for="check-options">Osvaldo</label>
                            </div>
                            <input class="check-options" type="checkbox" name="" id="check-options">
                            </li>
                            <li>
                            <div class="profile-details list">
                                <img src="../img/macos.png" alt="">
                                <label for="check-options">Orivalda</label>
                            </div>
                            <input class="check-options" type="checkbox" name="" id="check-options">
                            </li>
                            <li>
                            <div class="profile-details list">
                                <img src="../img/pai.png" alt="">
                                <label for="check-options">Claudin</label>
                            </div>
                            <input class="check-options" type="checkbox" name="" id="check-options">
                            </li>
                            
                        </ul>
                    </ul>
                </div>
                <div class="footer-modal-nova-conversa">
                    <button class="btn-mensagem-agrupada"href="" actived>Comunicado</button>
                    <form class="form-submit-message-agrupada">
                        <input type="text" placeholder="Mande sua mensagem" id="txtMensagem" name="txtMensagem">
                        <button id="botao-enviar" name="botao-enviar"><i class="fa fa-paper-plane" aria-hidden="true"></i>
                        </button>
                    </form>
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




       
        jQuery('.botao-contato').on('click', function(){  
             
            $('#idReceber').val(this.id);
            
                (function attMensagens () {
                    var idSecretaria = $('#idEnviar').val();
                    var idResponsavel = $('#idReceber').val();
                    
                    var query = idSecretaria + ' ' + idResponsavel;
                    
                
                    $.ajax({
                    url: '../DAO/listar-mensagens-secretaria.php',
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
                var pageurl = '../DAO/enviar-mensagem.php';
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
            const botaoContato = document.querySelectorAll(".botao-contato")

            /*botaoContato.addEventListener("click", function() {
                
                console.log("SE APARECER O MARCOS É GUEI")
            });*/
            
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
        


        /*
        $(document).ready(function() {
            var idSecretaria = $('#idEnviar').val();
            var idResponsavel = $('#idReceber').val();

            var query = idSecretaria + ' ' + idResponsavel;

            (function attMensagens () {
                $.ajax({
                url: '../DAO/listar-mensagens-secretaria.php',
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
            })();
        });
        */
    </script>
</body>



</html>