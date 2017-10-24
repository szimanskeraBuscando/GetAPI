<?php
session_start();

include("../class/bd/bd.php");
include("../class/user/user.php");
include("../class/logger/logger.php");

$pdo = connect();

$user = new User();
$logger = new Logger();

$email = $_SESSION['email'];

$ipAttempt = $user->get_client_ip();

$dadosUsuario = $pdo->prepare("SELECT * FROM user WHERE email = ?");
$dadosUsuario->bindValue(1, $email);
$dadosUsuario->execute();

$dadosUser = $dadosUsuario->fetch(PDO::FETCH_ASSOC);

$user->verificaSession();

$idSpace = $_GET['idSpace'];
$idFrame = $_GET['idFrame'];

//    foreach ($space_products as $spaceProduct):
if($dadosUsuario->rowCount() == 0){
    echo "Ops, não tem um usuário conectado";
} else {
    $logger->insertLog('Usuário acessou a lista dos seus produtos', $email, $dadosUser['idUser'], $ipAttempt);
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
                <div class="col-xs-8 categories_product">
                    <div class="row">
                        <div class="col-xs-10">
                            <h1>Selecionar Espaço</h1>                    
                        </div>
                        <div class="col-xs-2">
                            <button class="btnEnfoca btn btn-primary" id="atualizar_list">+ Espaço</button>
                            <button class="btnEnfoca btn btn-primary" id="atualizar_list2">+ Organização</button>
                        </div>
                    </div>
                    <div class="row container-fluid">
                        <table class="table table-hover table-responsive">
                            <thead>
                                <tr>
                                    <td>Zona</td>   
                                    <td>Nome</td>
                                    <td>Status</td>
                                    <td>Organização</td>
                                    <td>Ação</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $spacesSession = $pdo->prepare("SELECT * FROM space INNER JOIN frame ON space.frame_idFrame = frame.idFrame WHERE user_idUser = ?");
                                
                                    $spacesSession->bindValue(1, $dadosUser['idUser']);
                                    $spacesSession->execute();
                                
                                    $spaceSession = $spacesSession->fetchAll(PDO::FETCH_ASSOC);

                                    foreach ($spaceSession as $space): ?>
                                <tr>
                                    <td><?php echo $space['zone'] ?></td>
                                    <td><?php echo $space['nameSpace'] ?></td>
                                    <td><?php
                                        if($space['statusSpace'] == 0){
                                            echo 'Desativado';
                                        } else {
                                            echo 'Ligado';
                                        } ?></td>
                                    <td><?php echo $space['nameFrame'] ?></td>
                                    <td><a href="dashboard.php?idSpace=<?php echo $space['idSpace'] ?>&idFrame=<?php echo $space['idFrame'] ?>" class="btnEnfoca btn-primary">Acessar</a></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
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

    $(document).on("click", ".btnAcessarSpaceProduct", function(event){
        window.location.replace("dashboard.php");
    });

    $(document).on("click", ".btn_products_develop", function(event){
        window.location.replace("develop.php");
    });

</script>

</html>
<?php 
    }
?>