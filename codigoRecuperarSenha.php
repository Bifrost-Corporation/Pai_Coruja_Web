<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="manifest" href="manifest.json">

    <link rel="stylesheet" type="text/css" href="assests/css/style.css">
    <title>Código para recuperar a senha - Pai Coruja</title>
</head>

<body>
    <?php
        session_start();
        if($_SESSION['permissao'] != true){
            unset($_SESSION['permissao']);
            unset($_SESSION['idUsuario']);
            unset($_SESSION['codRecuperacao']);
            session_destroy();
            echo 'aq deu ruim';
            //header("Location: index.php");
        }
    ?>
    <main class="bg-login">
        <section class="card-login">
            <div class="ReturnToLogin">
                <a href="index.php">
                    <span class="fas fa-arrow-left"></span>Voltar
                </a>
            </div>
            <!--<div class="content-logoPaiCoruja">
                <img src="img/pai_coruja_3.png" class="logo-login">
            </div>-->
            <div>
                <p class="label-login">Informe o código que foi enviado ao seu email:</p>
            </div>
            <form name="form-login" method="POST" action="DAO/consulta-codigoSenha.php">
                <div class="div-titulo3">
                    <input type="hidden" id="idUsuario" name="idUsuario" value="<?php echo $_SESSION['idUsuario'] ?>">
                    <label class="label-erro" id="label-codigo"></label>
                    <input type="text" class="input-email" name="txtCodigo" id="txtCodigo"
                        placeholder="Informe o código de recuperação">
                </div>
                <div class="div-login">
                    <button class="btn-login" name="btn-login" id="btn-login" type="submit">Enviar</button>
                </div>
            </form>
            <div class="div-login">
                <p class="nota-copy">Pai Coruja - BIFROST @ copyright 2021</p>
            </div>

        </section>
    </main>
    <footer class="div-footer">
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script async src="https://cdn.jsdelivr.net/npm/pwacompat@2.0.8/pwacompat.min.js" integrity="sha384-uONtBTCBzHKF84F6XvyC8S0gL8HTkAPeCyBNvfLfsqHh+Kd6s/kaS4BdmNQ5ktp1" crossorigin="anonymous"></script>
    <script src="js/jquery.mask.js"></script>

    <script>
        $('#txtCodigo').mask("AAAAAAAAAA");

        jQuery('form').on('submit', function(e){
            var codigo = $('#txtCodigo').val();
            var codigoSemEspaco = codigo.trim();
            if(codigoSemEspaco.length != 10){
                $('#label-codigo').html('Código Inválido!');
                $('#txtCodigo').addClass('erro-form');
                $('#label-codigo').show();
                setTimeout(function () {
                    $('#label-codigo').fadeOut(1);
                    $('#txtCodigo').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
        });
    </script>

</body>

</html>