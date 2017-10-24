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
$idFrame = $_GET['id'];

$ipAttempt = $user->get_client_ip();

$dadosUsuario = $pdo->prepare("SELECT * FROM user WHERE email = ?");
$dadosUsuario->bindValue(1, $email);
$dadosUsuario->execute();

$dadosUser = $dadosUsuario->fetch(PDO::FETCH_ASSOC);

$dadosFrame = $pdo->prepare("SELECT * FROM frame WHERE idFrame = ? AND user_idUser = ?");
$dadosFrame->bindValue(1, $idFrame);
$dadosFrame->bindValue(2, $dadosUser['idUser']);
$dadosFrame->execute();

$dataFrame = $dadosFrame->fetch(PDO::FETCH_ASSOC);



$user->verificaSession();

if(isset($_POST['updateFrame'])){
    $idFrame = $_POST['idFrame'];
    $nameFrame = $_POST['nameFrame'];

    $frame->updateFrame($nameFrame, $idFrame, $dadosUser['idUser']);
}

if($dadosUsuario->rowCount() == 0){
    echo "Ops, não tem um usuário conectado";
} else if($dadosFrame->rowCount() == 0){
    echo "NÃO TEM";
} else {
    $logger->insertLog('Usuário acessou a página para Editar um Frame', $email, $dadosUser['idUser'], $ipAttempt);
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
    <div class-"col-md-12">
        <div class="account-header-billboard">
        <?php include("header.php"); ?>
        </div>
    </div>
</header>

    
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 sidebar_account">
        <ul class="nav nav-pills nav-stacked">
            <?php include("sidebar.php"); ?>
        </ul>
        </div>
        <div class="data">
            <div class="col-md-10">
                <div class="row container-fluid">
                    <div class="col-md-12">
                        <h1>Gerenciar organização <?php echo $dataFrame['nameFrame']; ?></h1>        
                        <hr/>                                        
                    </div>    
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form action="edit_Frame.php" method="POST" class="form-horizontal">
                        <fieldset>
                        <!-- Text input http://getbootstrap.com/css/#forms -->
                        <div class="form-group">
                        <label for="nameFrame" class="control-label col-sm-2">Nome</label>
                        <div class="col-sm-10">
                            <input type="hidden" name="idFrame" value="<?php echo $dataFrame['idFrame']; ?>" />
                            <input type="text" class="form-control" value="<?php echo $dataFrame['nameFrame']; ?>" name="nameFrame" required="">
                        </div>
                        </div>
                        
                        </fieldset>
                        <div class="col-sm-11"></div>
                        <div class="col-sm-1">
                            <input type="submit" name="updateFrame" class="btnEnfoca btn-primary" value="Salvar" />
                        </div>
                        </form>
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