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
                        <div class="col-xs-10">
                            <h1>Gerenciar Organizações</h1>        
                            <hr/>                                        
                        </div>
                        <div class="col-xs-2">
                            <a href="add_Frame.php" class="btnEnfoca btn btn-primary" id="atualizar"> + Incluir Organização</a>    
                        </div>    
                    </div>
                    <div class="row container-fluid">
                        <div class="col-xs-12">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <?php
                                $framesUser = json_decode($frame->framesByUser($dadosUser['idUser']));
                                foreach ($framesUser as $frames_user): ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="<?php echo $frames_user->idFrame ?>">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $frames_user->idFrame ?>" aria-expanded="true" aria-controls="collapse<?php echo $frames_user->idFrame ?>">
                                            <?php echo $frames_user->nameFrame ?>
                                        </a>
                                    </h4>
                                    </div>
                                    <div id="collapse<?php echo $frames_user->idFrame ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="<?php echo $frames_user->idFrame ?>">
                                    <div class="panel-body">
                                        <div class="row container-fluid">
                                            <div class="col-xs-12">
                                                <h6>Organização</h6>
                                                <hr/>
                                                <h2><?php echo $frames_user->nameFrame ?> <small><a href="edit_Frame.php?id=<?php echo $frames_user->idFrame ?>">Editar Organização</a></small></h2><br/>
                                                <small>A organização possui os seguintes Espaços</small>
                                                <?php 
                                                    $selectSpaces = $pdo->prepare("SELECT * FROM space WHERE frame_idFrame = ?");
                                                    $selectSpaces->bindValue(1, $frames_user->idFrame);
                                                    $selectSpaces->execute();
                                                    
                                                    $spacesUser = $selectSpaces->fetchAll(PDO::FETCH_ASSOC);
                                                    $totalSpaces = $selectSpaces->rowCount();
                                                                                                
                                                    if($totalSpaces >= 1){
                                                            foreach($spacesUser as $space_user): ?>
                                                                <h6><strong>Zona:</strong> <?php echo $space_user['zone']; ?> <a href='add_Space.php?idFrame=<?php echo $frames_user->idFrame ?>'>Incluir um espaço</a></h6>
                                                                <h6><strong>Nome:</strong> <?php echo $space_user['nameSpace']; ?><a href='spaces.php?idFrame=<?php echo $frames_user->idFrame ?>'>Editar Espaço</a></h6>
                                                                <hr/>
                                                            <?php endforeach;
                                                    } else {
                                                        echo "
                                                        <div class='row container-fluid'>
                                                            <br/>
                                                            <div class='alert alert-danger'>
                                                                <strong>Seu perfil precisa de atenção!</strong> Você precisa criar um <a href='add_Space.php?idFrame=".$frames_user->idFrame."'>Espaço</a>.
                                                            </div>
                                                        </div>
                                                        ";
                                                    }
                                                ?>
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
            <div class="col-xs-12 products-background-grey">
                <h1>Todos os produtos</h1>
                <hr/>
                <div class="row container-fluid products-list-all">
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

        <footer class="footer products-footer">
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