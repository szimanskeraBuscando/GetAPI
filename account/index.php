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
                    <img src="../assets/img/products_grow.png" class="img-responsive center" width="100px" height="100px">
                    <h1>Cresça</h1>
                    <h5>Aumente e retenha uma base de usuários ativa</h5>
                    <p class="descriptionCategories"><small>Drive app discovery and engage the right users at the right time to ensure they keep on coming back.</small></p>
                    <button class="btnEnfoca btn_account_grow">Voltar às Categorias</button>
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