<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="manifest" href="manifest.json">

    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <title>Login - Pai Coruja</title>
</head>

<body>
    <?php
        session_start();
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
                <p class="label-login">Esqueceu sua senha?</p>
            </div>
            <form name="form-senha" id="form-senha" method="POST" action="DAO/consulta-email.php">
                <div class="div-titulo3">
                    <label class="label-erro" id="label-email"></label>
                    <div class="input-box">
                    <input type="text" class="input-email" name="txtEmail" id="txtEmail"
                        placeholder="Digite seu email para recuperar sua conta..." value="<?php if(isset($_SESSION['email'])){
                                                                                                                                    echo $_SESSION['email'];
                                                                                                                                } ?>"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                </div>
                <div class="div-login">
                    <button class="btn-login" name="btn-senha" id="btn-senha" type="submit">Enviar</button>
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
    <script>
        $(document).ready(function(){
            var valueEmail = $('#txtEmail').val();
            if(valueEmail.length > 0){
                $('#label-email').html('Email inválido!');
                $('#txtEmail').addClass('erro-form');
                $('#label-email').show();
                setTimeout(function () {
                    $('#label-email').fadeOut(1);
                    $('#txtEmail').removeClass('erro-form');
                    $('#txtEmail').val('');
                }, 5000);
                <?php
                    unset($_SESSION['email']);
                ?>
                e.preventDefault();
            }
        });

        jQuery('form').on('submit', function(e){
            var email = $('#txtEmail').val();
            var emailSemEspaco = email.trim();
            if(email.length == 0 || emailSemEspaco == ''){
                $('#label-email').html('Informe um email!');
                $('#txtEmail').addClass('erro-form');
                $('#label-email').show();
                setTimeout(function () {
                    $('#label-email').fadeOut(1);
                    $('#txtEmail').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
        });
    </script>

</body>

</html>