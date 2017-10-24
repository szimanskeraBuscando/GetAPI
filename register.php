<?php
session_start();

include("class/bd/bd.php");
include("class/user/user.php");

$pdo = connect();

$user = new User();

    if (isset($_POST['action'])) {
        $email = $_POST['email'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $company = $_POST['company'];
        $state = $_POST['state'];
        $whatsapp = $_POST['whatsapp'];
        $password = md5($_POST['password']);
        $infoEmail = $_POST['infoEmail'];
        $infoWhatsapp = $_POST['infoWhatsapp'];


        $user->newAccount($email, $firstName, $lastName, $company, $state, $whatsapp, $password, $infoEmail, $infoWhatsapp);
    }


?>
<!DOCTYPE html>

<html lang="pt-br">

<head>
    <!-- meta Tags -->

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Links -->

    <link href="assets/css/style2.css" rel="stylesheet">
    <link href="assets/css/skunk.css" rel="stylesheet">
    <link href="assets/css/bootstrap.css" rel="stylesheet" />

    <!-- FONTS CDN -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100" rel="stylesheet">

    <!-- FONTAWESOME STYLE CSS -->
    <script src="https://use.fontawesome.com/200c15ffad.js"></script>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>




<body>
    <div class="loader"></div>
    <div class="row">
        <div class="col-md-6 info_logo">
            <div class="col-md-12 inner_logo">
                <div class="row">
                    <div class="col-md-12">
                        <div class="logo_getApi">   
                            <img src="assets/img/logo_orange.png" class="img-responsive" alt="Get API Logo" width="100px" height="50px">                          
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-justify quick_explanation">
                        <p>Inscreva-se para ter acesso a uma biblioteca de API's especialmente desenvolvida para otimizar o seu trabalho e facilitar o seu dia a dia.</p>
                        <h3>EXPERIMENTE GRÁTIS POR 30 DIAS!</h3>
                        <p>Obtenha exatamente os produtos e funções que você deseja! Adicione, remova, combine, modifique, personalize.</p>
                        <p>Utilize a sua inspiração e conhecimento para desenvolver novos produtos personalizados e atinja o mercado com precisão.</p>
                        <p>Pergunte o que quiser ao longo do processo, estamos aqui para atendê-lo! Sua avaliação é é muito importante para nós.</p>
                    </div>
                </div>  
            </div>
        </div>
        <div class="col-md-6 info_login">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 text-right">Já possui uma conta Get API?&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="login.php" class="logIn"> Efetue Login</a></div>
                </div>
                <hr/>
                <div class="row">
                    <div class="col-md-12">
                        <form action="register.php" method="POST">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="email" class="patternLabel text-left">E-mail*</label>
                                    <input type="email" required autofocus autocomplete="off" maxlenght="80" autocorrect="off" autocapitalize="none" id="email" name="email" class="form-control patternForm" />
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="firstName" class="patternLabel text-left">Nome*</label>
                                    <input type="text" required autocomplete="off" maxlenght="80" autocorrect="off" autocapitalize="none" id="firstName" name="firstName" class="form-control patternForm" />
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="lastName" class="patternLabel text-left">Sobrenome*</label>
                                    <input type="text" required autocomplete="off" maxlenght="80" autocorrect="off" autocapitalize="none" id="lastName" name="lastName" class="form-control patternForm" />
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="company" class="patternLabel text-left">Empresa</label>
                                    <input type="text" autocomplete="off" maxlenght="80" autocorrect="off" autocapitalize="none" id="company" name="company" class="form-control patternForm" />
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="state" class="patternLabel text-left">Estado</label>
                                    <input type="text" autocomplete="off" maxlenght="80" autocorrect="off" autocapitalize="none" id="state" name="state" class="form-control patternForm" />
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="whatsapp" class="patternLabel text-left">Whatsapp</label>
                                    <input type="text" autocomplete="off" maxlenght="80" autocorrect="off" autocapitalize="none" id="whatsapp" name="whatsapp" class="form-control patternForm" />
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="password" class="patternLabel text-left">Senha*</label>
                                    <input type="password" required autocomplete="off" maxlenght="80" autocorrect="off" autocapitalize="none" id="password" name="password" class="form-control patternForm" />
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-md-12">
                                    <p>Mantenha-me informado sobre produtos, serviços e ofertas da Get API</p>
                                    <input type="checkbox" name="infoEmail" value="email" checked> Por e-mail<br>
                                    <input type="checkbox" name="infoWhatsapp" value="whatsapp"> Por Whatsapp<br>
                                </div>
                            </div>                          
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" class="btnEnfoca btn-register" name="action" value="Cadastrar" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            
            </div>       
        </div>
    </div>

    <footer class="footer products-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p class="text-muted footerContent">Place sticky footer content here</p>
                    </div>
                </div>
            </div>
        </footer>
</body>

<script type="text/javascript">

    



    $(window).on('load', function(){
        $(".loader").fadeOut("slow");
    });

    $(document).on("click", ".newUserAccount", function(event){
        var action = $("#action").val();
        var email = $("#email").val();
        var firstName = $("#firstName").val();
        var lastName = $("#lastName").val();
        var company = $("#company").val();
        var state = $("#state").val();
        var whatsapp = $("#whatsapp").val();
        var password = $("#password").val();
        var infoEmail = $("#infoEmail").val();
        var infoWhatsapp = $("#infoWhatsapp").val();
        $.ajax({ 
            url: 'register.php',
            data: {action: action, email: email, firstName: firstName, lastName: lastName, company: company, state: state, whatsapp: whatsapp, password: password, infoEmail: infoEmail, infoWhatsapp: infoWhatsapp },
            type: 'post'
        });
    });

</script>

</html>