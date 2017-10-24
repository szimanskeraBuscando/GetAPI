
<?php
session_start();

include("../class/bd/bd.php");
include("../class/user/user.php");
include("../class/logger/logger.php");
include("../class/frame/frame.php");
include("../class/catalog/catalog.php");

$pdo = connect();

$user = new User();
$logger = new Logger();
$frame = new Frame();
$catalog = new Catalog();

$email = $_SESSION['email'];

$ipAttempt = $user->get_client_ip();

$dadosUsuario = $pdo->prepare("SELECT * FROM user WHERE email = ?");
$dadosUsuario->bindValue(1, $email);
$dadosUsuario->execute();

$dadosUser = $dadosUsuario->fetch(PDO::FETCH_ASSOC);

$user->verificaSession();

if(isset($_POST['catalogInsert'])){
    $icon = $_POST['icon'];
    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $descriptionProduct = $_POST['descriptionProduct'];
    $resources = $_POST['resources'];
    $type = $_POST['type'];
    $category = $_POST['category'];

    $catalog->insertCatalog($icon, $title, $subtitle, $descriptionProduct, $resources, $type, $category);
}

if($dadosUsuario->rowCount() == 0){
    echo "Ops, não tem um usuário conectado";
} else {
    $logger->insertLog('Usuário acessou a Administrativa', $email, $dadosUser['idUser'], $ipAttempt);
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
                        <div class="col-md-12">
                            <h1>Adicionar Produtos ao Catálogo</h1>        
                            <hr/>                                        
                        </div>    
                    </div>
                    <div class="row container-fluid">
                        <div class="col-md-12">
                            <form action="admin.php" method="POST" class="form-horizontal">
                            <fieldset>
                            <!-- Text input http://getbootstrap.com/css/#forms -->
                            <div class="form-group">
                            <label for="icon" class="control-label col-sm-2">Icone</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="icon" placeholder="Link do Ícone" required="">
                                
                            </div>
                            </div>
                            <!-- Text input http://getbootstrap.com/css/#forms -->
                            <div class="form-group">
                            <label for="title" class="control-label col-sm-2">Título</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="title" placeholder="Título" required="">
                                
                            </div>
                            </div>
                            <!-- Text input http://getbootstrap.com/css/#forms -->
                            <div class="form-group">
                            <label for="subtitle" class="control-label col-sm-2">Sub=Título</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="subtitle" placeholder="Sub-Título" required="">
                                
                            </div>
                            </div>
                            <!-- Text input http://getbootstrap.com/css/#forms -->
                            <div class="form-group">
                            <label for="company" class="control-label col-sm-2">Descrição</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="descriptionProduct" placeholder="Descrição">
                                
                            </div>
                            </div>
                            
                            <!-- Text input http://getbootstrap.com/css/#forms -->
                            <div class="form-group">
                            <label for="resources" class="control-label col-sm-2">Recursos</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="resources" placeholder="Recursos">
                                
                            </div>
                            </div>

                            <div class="form-group">
                            <label for="password" class="control-label col-sm-2">Tipo</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="type" placeholder="Tipo">
                                
                            </div>
                            </div>

                            <div class="form-group">
                            <label for="password" class="control-label col-sm-2">Categoria</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="categoria" placeholder="Categoria">
                                
                            </div>
                            </div>
                            </fieldset>
                            <div class="col-sm-11"></div>
                            <div class="col-sm-1">
                                <input type="submit" name="catalogInsert" class="btnEnfoca btn-primary" value="Atualizar" />
                            </div>
                            </form>
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