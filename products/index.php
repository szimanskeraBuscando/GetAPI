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
    $logger->insertLog('Usuário está na página Inicial dos Produtos', $email, $dadosUser['idUser'], $ipAttempt);
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
        <header class="products-topSection">
            <div class-"col-xs-12">
                <div class="products-header-billboard">
                    <h1>Catálogo de APIs</h1>
                </div>
                <div class="products-search-form">
                    <input placeholder="Pesquisar produtos e documentação" type="text" class="products-search-field" name="q" value autocomplete="off" />
                    <i class="fa fa-search fa-2x products-search-image" aria-hidden="true"></i>
                </div>
            </div>
        </header>

        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-4 sidebar_account">
                    <?php include("sidebar.php") ?>
                </div>
                <div class="col-xs-8">
                    <?php 
                        if($frame->returnExistingFrame($dadosUser['idUser']) == true){ ?>
                            <div class="row container-fluid">
                                <br/>
                                <div class="alert alert-danger">    
                                    <strong>Seu perfil precisa de atenção!</strong> Você precisa criar uma <a href="../account/frames.php">Organização</a>.
                                </div>
                            </div>
                <?php  }  ?>
                    
                    <div class="row container-fluid">
                        <div class="col-xs-6 categories_product">
                            <img src="../assets/img/products_developer.png" class="img-responsive center" width="100px" height="100px">
                            <h1>Desenvolva</h1>
                            <h5>Construa aplicações de alta qualidade rapidamente</h5>
                            <p class="descriptionCategories"><small>Complemente. Acrescente. Adicione.</small></p>
                            <button class="btnEnfoca btn_products_develop">Procurar Produtos</button>
                        </div>
                        <div class="col-xs-6 categories_product">
                            <img src="../assets/img/products_grow.png" class="img-responsive center" width="100px" height="100px">
                            <h1>Cresça</h1>
                            <h5>Aumente e retenha uma base de usuários ativa</h5>
                            <p class="descriptionCategories"><small>Drive app discovery and engage the right users at the right time to ensure they keep on coming back.</small></p>
                            <button class="btnEnfoca btn_products_grow">Procurar Produtos</button>
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
        window.location.replace("grow.php");
    });

    $(document).on("click", ".btn_products_develop", function(event){
        window.location.replace("develop.php");
    });

</script>

</html>
<?php 
    }
?>