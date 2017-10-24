<!DOCTYPE html>

<html lang="pt-br">

<head>
    <!-- meta Tags -->

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Links -->
    <link rel="icon" href="assets/img/favicon.ico" sizes="32x32">

    <link href="assets/css/style2.css" rel="stylesheet">
    <link href="assets/css/skunk.css" rel="stylesheet">
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- FONTAWESOME STYLE CSS -->
    <script src="https://use.fontawesome.com/200c15ffad.js"></script>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>




<body>
    <div class="loader"></div>
    <div class="row">
        <div class="col-xs-6">
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-xs-4"></div>
                    <div class="col-xs-4">
                        <div class="logo_console_getApi">
                            <img src="assets/img/second_logo.png" class="img-responsive center" width="350px" alt="Quasar GET API">
                        </div>
                    </div>
                    <div class="col-xs-4"></div>
                </div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="row">
                <div class="col-xs-12">
                    <div class="login_console_getApi">
                        <div class="signupSection">
                            Get'API, uma biblioteca de facilitadores jurídicos ao seu alcance. Seja bem vindo e experimente nossos serviços.
                        </div>
                        
                        <input type="button" class="btnEnfoca btn-newAccount registerUser" value="Criar uma conta grátis"/>
                        <input type="button" class="btnEnfoca btn-signin loginUser" value="Efetuar Login" />

                        <div class="contact">
                            <br>
                            <br>
                            <h4> Entre em contato </h4>
                            <a href="#"> <i class="fa fa-facebook-square fa-2x"> </i> </a>
                            <a href="#"> <i class="fa fa-instagram fa-2x"> </i></a>
                            <a href="#"> <i class="fa fa-mail fa-2x"> </i></a>
                        </div>
                    </div>
                </div>  
            </div>
                  
        </div>
    </div>

   
</body>

<script type="text/javascript">
    $(window).on('load', function(){
        $(".loader").fadeOut("slow");
    });

    $(document).on("click", ".loginUser", function(event){
        window.location.replace("login.php");
    });

    $(document).on("click", ".registerUser", function(event){
        window.location.replace("register.php");
    });

</script>

</html>