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
    <div class="loader"></div>
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
                <div class="col-md-10 categories_product">
                    <div class="row container-fluid">
                        <div class="col-md-11">
                            <h1>Gerenciar Espaços</h1>        
                            <hr/>                                        
                        </div>
                        <div class="col-md-1">
                            <a href="add_Space.php" class="btnEnfoca btn-primary">+ Incluir Espaço</a>    
                        </div>    
                    </div>
                    <div class="row container-fluid">
                        <div class="col-md-12">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <?php
                                $spacesUser = json_decode($space->spacesByUser($dadosUser['idUser'], $idFrame));
                                foreach ($spacesUser as $spaces_user): ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="<?php echo $spaces_user->idSpace ?>">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $spaces_user->idSpace ?>" aria-expanded="true" aria-controls="collapse<?php echo $frames_user->idFrame ?>">
                                            <?php echo $spaces_user->nameSpace ?>
                                        </a>
                                    </h4>
                                    </div>
                                    <div id="collapse<?php echo $spaces_user->idSpace ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="<?php echo $spaces_user->idSpace ?>">
                                    <div class="panel-body">
                                        <div class="row container-fluid">
                                            <div class="col-md-12">
                                                <h4>Servidor está na zona de <strong><?php echo $spaces_user->zone ?></strong></h4>
                                                <h5><?php 
                                                    if($spaces_user->statusSpace == 0){
                                                        echo 'Espaço Desativado';
                                                    } else {
                                                        echo 'Espaço Ligado';
                                                    }
                                                
                                                ?></h5>
                                                <hr/>
                                                <h2><?php echo $spaces_user->nameSpace ?> <small><a href="edit_Space.php?id=<?php echo $spaces_user->idSpace ?>">Editar Espaço</a></small></h2><br/>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php endforeach; ?>

                                                              
                            </div> 









                                    
                                   
                        </div>    
                    </div>    
                    
                </div>
                
            </div>
        </div>
            <div class="row">
                <div class="col-md-12 account-background-grey">
                    <h1>Todos os produtos</h1>
                    <hr/>
                    <div class="row container-fluid account-list-all">
                        <div class="col-md-4">
                            <p>Actions on getAPI</p>
                            <p>Actions on getAPI</p>
                            <p>Actions on getAPI</p>
                            <p>Actions on getAPI</p>
                            <p>Actions on getAPI</p>
                            <p>Actions on getAPI</p>
                        </div>
                        <div class="col-md-4">
                        <p>Actions on getAPI</p>
                            <p>Actions on getAPI</p>
                            <p>Actions on getAPI</p>
                            <p>Actions on getAPI</p>
                            <p>Actions on getAPI</p>
                            <p>Actions on getAPI</p>
                        </div>
                        <div class="col-md-4">
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