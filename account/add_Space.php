<?php
session_start();

include("../class/bd/bd.php");
include("../class/user/user.php");
include("../class/logger/logger.php");
include("../class/space/space.php");

$pdo = connect();

$user = new User();
$logger = new Logger();
$space = new Space();

$email = $_SESSION['email'];
$idFrame = $_GET['idFrame'];

$ipAttempt = $user->get_client_ip();

$dadosUsuario = $pdo->prepare("SELECT * FROM user WHERE email = ?");
$dadosUsuario->bindValue(1, $email);
$dadosUsuario->execute();

$dadosUser = $dadosUsuario->fetch(PDO::FETCH_ASSOC);

$user->verificaSession();

if(isset($_POST['insertSpace'])){
    $zone = $_POST['zone'];
    $nameSpace = $_POST['nameSpace'];    
    $idFrame = $_POST['idFrame'];

    $space->insertSpace($zone, $nameSpace, $idFrame);
}

if($dadosUsuario->rowCount() == 0){
    echo "Ops, não tem um usuário conectado";
} else {
    $logger->insertLog('Usuário acessou a página das organizações', $email, $dadosUser['idUser'], $ipAttempt);
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


<header class="account-topSection">
    <div class-"col-xs-12">
        <div class="account-header-billboard">
            <?php include("header.php"); ?>
        </div>
    </div>
</header>

    
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-2 sidebar_account">
        <ul class="nav nav-pills nav-stacked">
            <?php include("sidebar.php"); ?>
        </ul>
        </div>
        <div class="data">
            <div class="col-xs-10">
                <div class="row container-fluid">
                    <div class="col-xs-12">
                        <h1>Espaços de Trabalho</h1>        
                        <hr/>                                        
                    </div>    
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <form action="add_Space.php" method="POST" class="form-horizontal">
                        <fieldset>
                        <!-- Text input http://getbootstrap.com/css/#forms -->
                        <div class="form-group">
                            <label for="icon" class="control-label col-xs-2">Zona</label>
                            <div class="col-xs-10">
                                <div class="form-group">
                                    <input type="text" value="Curitiba" class="form-control insertedData" name="zone" readonly="" required="">
                                </div>  
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="icon" class="control-label col-xs-2">Nome</label>
                            <div class="col-xs-10">
                                <div class="form-group">
                                    <input type="hidden" value="<?php echo $idFrame ?>" name="idFrame" />
                                    <input type="text" class="form-control insertedData" name="nameSpace"  required="">
                                </div>  
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-10"></div>
                            <div class="col-xs-2">
                                <input type="submit" name="insertSpace" class="btnEnfoca btn-primary" id="atualizar"value="Atualizar" />
                            </div>
                        </div>
                        </form>
                        
                        </fieldset>

                        
                    </div>    
                </div>    
                
            </div>
        </div>        
    </div>
</div>
</body>
<?php 
    }
?>