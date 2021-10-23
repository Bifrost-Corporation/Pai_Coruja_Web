<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="manifest" href="manifest.json">

    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <title>Nova Senha - Pai Coruja</title>
</head>

<body>
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
                <p class="label-login">Cadastrar nova senha</p>
            </div>
            <form name="form-login" method="POST" action="DAO/atualizar-senha.php">
                <div class="div-titulo3">
                    <input type="hidden" id="idUsuario" name="idUsuario" value="<?php echo $_GET['idUsuario'] ?>">
                    <label class="label-erro" id="label-senha1"></label>
                    <input type="password" class="input-email" name="txtSenha1" id="txtSenha1"
                        placeholder="Digite a nova senha para sua conta">
                    <label class="label-erro" id="label-senha2"></label>
                    <input type="password" class="input-email" name="txtSenha2" id="txtSenha2"
                        placeholder="Confirme a nova senha para sua conta">
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
    <script>

        jQuery('form').on('submit', function(e){
            var senha1 = $('#txtSenha1').val();
            var senha1SemEspaco = senha1.trim();
            var senha2 = $('#txtSenha2').val();
            var senha2SemEspaco = senha2.trim();
            if(senha1.length == 0 || senha1SemEspaco == ''){
                $('#label-senha1').html('Informe uma senha!');
                $('#txtSenha1').addClass('erro-form');
                $('#label-senha1').show();
                setTimeout(function () {
                    $('#label-senha1').fadeOut(1);
                    $('#txtSenha1').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
            else if(senha2.length == 0 || senha2SemEspaco == ''){
                $('#label-senha2').html('Confirme a senha!');
                $('#txtSenha2').addClass('erro-form');
                $('#label-senha2').show();
                setTimeout(function () {
                    $('#label-senha2').fadeOut(1);
                    $('#txtSenha2').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
            else if(senha1 != senha2){
                $('#label-senha1').html('Senhas não correspondem!');
                $('#txtSenha1').addClass('erro-form');
                $('#label-senha1').show();
                setTimeout(function () {
                    $('#label-senha1').fadeOut(1);
                    $('#txtSenha1').removeClass('erro-form');
                }, 5000);
                $('#label-senha2').html('Senhas não correspondem!');
                $('#txtSenha2').addClass('erro-form');
                $('#label-senha2').show();
                setTimeout(function () {
                    $('#label-senha2').fadeOut(1);
                    $('#txtSenha2').removeClass('erro-form');
                }, 5000);
                e.preventDefault();
            }
        });

    </script>

</body>

</html>