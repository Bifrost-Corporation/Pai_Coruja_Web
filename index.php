<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="manifest" href="manifest.json">
    <title>Login - Pai Coruja</title>
</head>

<body>
    <main class="bg-login">
        <section class="card-login">
            <div style="text-align: center;">
                <img src="images/pai_coruja_3.png" class="logo-login">
            </div>
            <div class="div-titulo">
                <p class="label-login">Login</p>
            </div>
            <form name="form-login" method="POST" action="DAO/consulta-login.php">
                <div class="input-box">
                    <label class="label-erro" id="label-email"></label>
                    <input type="text" class="input-email" name="txtEmail" id="txtEmail" placeholder="Digite seu email">
                </div>
                <div class="input-box">
                    <label class="label-erro" id="label-senha"></label>
                    <input type="password" class="input-senha" name="txtSenha" id="txtSenha" placeholder="Digite sua senha">
                </div>
                <div class="div-login">
                    <input type="checkbox" name="checkbox" id="checkbox" class="cb-conectado">
                    <label for="checkbox" class="label-conectado">Manter-me Conectado</label>
                </div>
                <div class="div-login">
                    <button class="btn-esqueci">Esqueci</button>
                    <button class="btn-login" name="btn-login" id="btn-login" type="submit">Entrar</button>
                </div>
            </form>
            <div class="div-login">
                <p class="nota-copy">Pai Coruja - BIFROST @ copyright 2021</p>
            </div>

        </section>
    </main>
    <footer>
        <div class="div-footer">
            <p style="color: var(--azulnavbar);">Bifrost - Conectando Mundos</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script async src="https://cdn.jsdelivr.net/npm/pwacompat@2.0.8/pwacompat.min.js"
            integrity="sha384-uONtBTCBzHKF84F6XvyC8S0gL8HTkAPeCyBNvfLfsqHh+Kd6s/kaS4BdmNQ5ktp1"
            crossorigin="anonymous"></script>
    <script>
        jQuery('form').on('submit',function(e){
            var email = $('#txtEmail').val();
            var senha = $('#txtSenha').val();
            if (email.length == 0) {
                $('#label-email').html('Informe um email!');
                    $('#txtEmail').addClass('erro-form');
                    $('#label-email').show();
                    setTimeout(function(){
                        $('#label-email').fadeOut(1);
                        $('#txtEmail').removeClass('erro-form');
                    },5000);
                    e.preventDefault();
            } 
            else {
                verificaarroba = false;
                verificaponto = false;
                for(var i = 0; i < email.length; i++){
                    if(email.charAt(i) == '@' && i + 1 < email.length){
                        posicaoarroba = i;
                    }
                    if(email.charAt(i) == '.' && i + 1 < email.length){
                        posicaoponto = i;
                    }
                }
                if(posicaoponto > posicaoarroba) {
                    verificaarroba = true;
                    verificaponto = true;
                }
                if(verificaarroba == false || verificaponto == false){
                    $('#label-email').html('Email inválido!');
                    $('#txtEmail').addClass('erro-form');
                    $('#label-email').show();
                    setTimeout(function(){
                        $('#label-email').fadeOut(1);
                        $('#txtEmail').removeClass('erro-form');
                    },5000);
                    e.preventDefault();
                }
            }
            if (senha.length == 0) {
                $('#label-senha').html('Informe uma senha!');
                    $('#txtSenha').addClass('erro-form');
                    $('#label-senha').show();
                    setTimeout(function(){
                        $('#label-senha').fadeOut(1);
                        $('#txtSenha').removeClass('erro-form');
                    },5000);
                    e.preventDefault();
                
            }
        });
    </script>

    <script>
               if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('service-worker.js')
            // ('/service-worker.js')
            .then(function (registration) {
                console.log("success load");
                console.log(registration);
            })
            .catch(function (err) {
                console.log(err);
            });
    }


    
        </script>
</body>

</html>