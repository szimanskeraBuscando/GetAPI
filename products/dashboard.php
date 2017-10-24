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
    $logger->insertLog('Usuário logou com sucesso', $email, $dadosUser['idUser'], $ipAttempt);
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
                <div class="col-xs-2 sidebar_account">
                    <?php include("sidebar.php") ?>
                </div>
                <div class="col-xs-10 categories_product">
                    <div class="row">
                        <div class="col-xs-10">
                            <h1>Painel</h1>                    
                        </div>
                        <div class="col-xs-2">
                            <button class="btnEnfoca btn-primary" id="atualizar"> + Criar</button>
                        </div>
                    </div>
                    <div class="row container-fluid">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <td>Nome</td>
                                    <td>Tipo de Serviço</td>
                                    <td>Tipo Catalogo</td>
                                    <td>Ações</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $spaceProducts = $pdo->prepare("SELECT * FROM spaceProduct INNER JOIN space ON spaceProduct.space_idSpace = space.idSpace
                                    INNER JOIN frame ON spaceProduct.frame_idFrame = frame.idFrame INNER JOIN catalog ON spaceProduct.catalog_idCatalog = catalog.idCatalog WHERE space_idSpace = ? AND spaceProduct.frame_idFrame = ? AND user_idUser = ?");
                                    $spaceProducts->bindValue(1, $idSpace);
                                    $spaceProducts->bindValue(2, $idFrame);
                                    $spaceProducts->bindValue(3, $dadosUser['idUser']);
                                    $spaceProducts->execute();
                                
                                    $space_products = $spaceProducts->fetchAll(PDO::FETCH_ASSOC);


                                    foreach ($space_products as $spaceProduct): ?>
                                <tr>
                                    <td><?php echo $spaceProduct['nameProductSpace'] ?></td>
                                    <td><?php echo $spaceProduct['title'] ?></td>
                                    <td><?php echo $spaceProduct['typeCatalog'] ?></td>
                                    <td><a href="dashboard.php?action=delete"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a> <a href="dashboard.php?action=edit"><i class="fa fa-pencil fa-2x" aria-hidden="true"></i></a></td>
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