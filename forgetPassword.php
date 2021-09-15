<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="manifest" href="manifest.json">

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Login - Pai Coruja</title>
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
                <p class="label-login">Esqueceu sua senha?</p>
            </div>
            <form name="form-login" method="POST" action="#">
                <section class="caixa-alerta-email">
                    <div>
                        <p class="txt-alerta-email">Login Inválido</p>
                    </div>
                </section>
                <div class="div-titulo2">
                    <input type="email" class="input-email" name="txtEmail" id="txtEmail"
                        placeholder="Digite seu email para recuperar sua conta...">
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

    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script async src="https://cdn.jsdelivr.net/npm/pwacompat@2.0.8/pwacompat.min.js"
        integrity="sha384-uONtBTCBzHKF84F6XvyC8S0gL8HTkAPeCyBNvfLfsqHh+Kd6s/kaS4BdmNQ5ktp1"
        crossorigin="anonymous"></script>

</body>

</html>