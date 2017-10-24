<?php
session_start();

include("../class/bd/bd.php");
include("../class/user/user.php");
include("../class/logger/logger.php");
include("../class/frame/frame.php");

$pdo = connect();

$user = new User();
$logger = new Logger();
$frame = new Frame();

$email = $_SESSION['email'];

$ipAttempt = $user->get_client_ip();

$dadosUsuario = $pdo->prepare("SELECT * FROM user WHERE email = ?");
$dadosUsuario->bindValue(1, $email);
$dadosUsuario->execute();

$dadosUser = $dadosUsuario->fetch(PDO::FETCH_ASSOC);

$user->verificaSession();

if(isset($_POST['updateProfile'])){
    $email = $_POST['email'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $company = $_POST['company'];
    $whatsapp = $_POST['whatsapp'];
    $password = md5($_POST['password']);

    $user->updateProfile($email, $firstName, $lastName, $company, $whatsapp, $password);

}

if($dadosUsuario->rowCount() == 0){
    echo "Ops, não tem um usuário conectado";
} else {
    $logger->insertLog('Usuário acessou a página do seu perfil', $email, $dadosUser['idUser'], $ipAttempt);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- meta Tags -->

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- Links -->

    <link href="../assets/css/style2.css" rel="stylesheet">
    <link href="../assets/css/skunk.css" rel="stylesheet">
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />

    <!-- FONTAWESOME STYLE CSS -->
    <script src="https://use.fontawesome.com/200c15ffad.js"></script>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>




<body>
    <div class="loader"></div>
        <header class="account-topSection">
            <div class-"col-xs-12">
                <div class="account-header-billboard">
                <?php include("header.php"); ?>
                </div>
            </div>
        </header>

        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-4 sidebar_account">
                <ul class="nav nav-pills nav-stacked">
                    <?php include("sidebar.php"); ?>
                </ul>
                </div>
                <div class="col-xs-8 categories_product">
                    <div class="row container-fluid">
                        <div class="col-xs-12">
                            <h1>Meu perfil</h1>        
                            <hr/>                                        
                        </div>    
                    </div>
                    <div class="row container-fluid">
                        <div class="col-xs-12">
                            <form action="profile.php" method="POST" class="form-horizontal">
                            <fieldset>
                            <!-- Text input http://getbootstrap.com/css/#forms -->
                            <div class="form-group">
                            <label for="email" class="control-label col-xs-2">E-mail</label>
                            <div class="col-xs-10">
                                <input type="text" class="form-control insertedData" name="email" value="<?php echo $dadosUser['email']; ?>" placeholder="E-mail" required="" readonly="">
                                
                            </div>
                            </div>
                            <!-- Text input http://getbootstrap.com/css/#forms -->
                            <div class="form-group">
                            <label for="firstName" class="control-label col-xs-2">Nome</label>
                            <div class="col-xs-10">
                                <input type="text" class="form-control insertedData" value="<?php echo $dadosUser['firstName']; ?>" name="firstName" placeholder="Nome" required="">
                                
                            </div>
                            </div>
                            <!-- Text input http://getbootstrap.com/css/#forms -->
                            <div class="form-group">
                            <label for="lastName" class="control-label col-xs-2">Sobrenome</label>
                            <div class="col-xs-10">
                                <input type="text" value="<?php echo $dadosUser['lastName']; ?>" class="form-control insertedData" name="lastName" placeholder="Sobrenome" required="">
                                
                            </div>
                            </div>
                            <!-- Text input http://getbootstrap.com/css/#forms -->
                            <div class="form-group">
                            <label for="company" class="control-label col-xs-2">Empresa</label>
                            <div class="col-xs-10">
                                <input type="text" class="form-control insertedData" value="<?php echo $dadosUser['company']; ?>" name="company" placeholder="Empresa">
                                
                            </div>
                            </div>
                            
                            <!-- Text input http://getbootstrap.com/css/#forms -->
                            <div class="form-group">
                            <label for="whatsapp" class="control-label col-xs-2">Whatsapp</label>
                            <div class="col-xs-10">
                                <input type="tel" class="form-control insertedData" value="<?php echo $dadosUser['whatsapp']; ?>" name="whatsapp" placeholder="(xx) xxxxxxxxx">
                                
                            </div>
                            </div>

                            <div class="form-group">
                            <label for="password" class="control-label col-xs-2">Senha</label>
                            <div class="col-xs-10">
                                <input type="password" class="form-control insertedData" name="password" placeholder="Alterar a Senha (não é necessário para alterar o perfil)">
                                
                            </div>
                            </div>
                            </fieldset>
                            <div class="col-xs-10"></div>
                            <div class="col-xs-2">
                                <input type="submit" name="updateProfile" class="btnEnfoca btn-primary" id="atualizar"value="Atualizar" />
                            </div>
                            </form>
                        </div>    
                    </div>    
                    
                </div>
                
            </div>
        </div>
            <div class="row">
                <div class="col-xs-12 account-background-grey">
                    <h1>Todos os produtos</h1>
                    <hr/>
                    <div class="row container-fluid account-list-all">
                        <div class="col-xs-4">
                            <p>Actions on getAPI</p>
                            <p>Actions on getAPI</p>
                            <p>Actions on getAPI</p>
                            <p>Actions on getAPI</p>
                            <p>Actions on getAPI</p>
                            <p>Actions on getAPI</p>
                        </div>
                        <div class="col-xs-4">
                        <p>Actions on getAPI</p>
                            <p>Actions on getAPI</p>
                            <p>Actions on getAPI</p>
                            <p>Actions on getAPI</p>
                            <p>Actions on getAPI</p>
                            <p>Actions on getAPI</p>
                        </div>
                        <div class="col-xs-4">
                        <p>Actions on getAPI</p>
                            <p>Actions on getAPI</p>
                            <p>Actions on getAPI</p>
                            <p>Actions on getAPI</p>
                            <p>Actions on getAPI</p>
                            <p>Actions on getAPI</p>
                        </div>
                    </div>
                </div>
            </div>

        <footer class="footer account-footer">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
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

    $(document).on("click", ".btn_products_grow", function(event){
        window.location.replace("index.php");
    });

    $(document).on("click", ".registerUser", function(event){
        window.location.replace("register.php");
    });

</script>

</html>
<?php 
    }
?>