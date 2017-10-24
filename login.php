<?php
session_start();

include("class/bd/bd.php");
include("class/user/user.php");
include("class/logger/logger.php");

$pdo = connect();

$user = new User();
$logger = new Logger();

    if (isset($_POST['logar'])) {
        $ipAttempt = $_POST['ipAttempt'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $idUser = $user->returnIdByEmail($email);

        $logger->insertLog('Usuário está tentando logar', $email, $idUser, $ipAttempt);
        $user->logar($email, $password, $ipAttempt);
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
    <link rel="icon" href="assets/img/favicon.ico" >
    <link href="assets/css/style2.css" rel="stylesheet">
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/skunk.css" rel="stylesheet">

    <!-- FONTAWESOME STYLE CSS -->
    <script src="https://use.fontawesome.com/200c15ffad.js"></script>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>




<body>
    <div class="loader"></div>
    <div class="row">
        <div class="col-xs-12 info_logo">
            <div class="col-xs-12 inner_logo">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="logo_console_getApi">
                            <div class="row">
                                <div class="col-xs-12 text-center">
                                    <h3 class="callingLogin">Logue-se no Get'API</h3>                            
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4"></div>
                                <div class="col-xs-4">
                                    <form action="login.php" method="POST">
                                    <input type="hidden" class="form-control" name="ipAttempt" value="<?php echo $user->get_client_ip(); ?>">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <label for="email" class="usernameLabel text-left"> Email <span class="text-right forgotIdLabel"></span> </label>
                                                <input type="text" autofocus autocomplete="off" maxlenght="80" autocorrect="off" autocapitalize="none" id="email" name="email" class="form-control usernameForm" />
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <label for="password" class="passwordLabel text-left">Senha <span class="text-right forgotPassLabel"></span></label>
                                                <input type="password" autocomplete="off" maxlenght="300" autocorrect="off" id="password" name="password" class="form-control usernameForm" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input type="submit" class="btnEnfoca btn-continue" name="logar" value="Logar" />
                                            </div>
                                        </div>
                                    </form>
                                    <br>
                                    <br>
                                    <div class="row">
                                        <div class="col-xs-12 text-center">
                                            <a href="register.php">Novo no Get API? Crie uma conta agora mesmo!</a>    
                                        </div> 
                                    </div>
                                </div>
                                <div class="col-xs-4"></div>
                            </div>
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
</script>


</html>