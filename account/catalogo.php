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
        <div class="data" id="style-5">
            <div class="col-xs-10">
                <div class="row container-fluid">
                    <div class="col-xs-12">
                        <h1>Catálogo</h1>        
                        <br>
                        <br>
                                
                    </div>    
                </div>
                <div class="row">
                    <div class="col-xs-4">
                        <form action="admin.php" method="POST" class="form-horizontal">
                        <fieldset>
                        <!-- Text input http://getbootstrap.com/css/#forms -->
                        <div class="form-group">
                            <label for="icon" class="control-label_cat col-xs-2">Título</label>
                            <div class="col-xs-10">
                                <div class="form-group">
                                    <input type="text" class="form-control insertedData_cat" name="icon"  required="">
                                </div>  
                            </div>
                        </div>

                        <div class="form-group">    
                            <label for="icon" class="control-label_cat col-xs-2">Subtítulo</label>
                            <div class="col-xs-10">
                                <div class="form-group">
                                    <input type="text" class="form-control insertedData_cat" name="icon"  required="">
                                </div>  
                            </div>
                        </div>
                        <div class="form-group">    
                            <label for="icon" class="control-label_cat col-xs-2">Tipo</label>
                            <div class="col-xs-10">
                                <div class="form-group">
                                    <input type="text" class="form-control insertedData_cat" name="icon"  required="">
                                </div>  
                            </div>
                        </div>
                        <div class="form-group">    
                            <label for="icon" class="control-label_cat col-xs-2">Preço</label>
                            <div class="col-xs-10">
                                <div class="form-group">
                                    <input type="text" class="form-control insertedData_cat" name="icon"  required="">
                                </div>  
                            </div>
                        </div>
                        </form>

                    </div>
                    <div class="col-xs-4"></div>
                    <div class="col-xs-4">
                        <form action="admin.php" method="POST" class="form-horizontal">
                        <div class="form-group">    
                            <label for="icon" class="control-label_cat col-xs-2">Descrição</label>
                            <div class="col-xs-10">

                                <div class="form-group">
                                        <textarea class="form-control" rows="10" cols="8" id="comment_cat"></textarea>
                                  
                                </div>
                            </div>
                        </div>
                        <div class="form-group">    
                            <label for="icon" class="control-label_cat col-xs-2">Recursos</label>
                            <div class="col-xs-10">
                            <div class="form-group">
                                <textarea class="form-control" rows="10" cols="8" id="comment_cat"></textarea>
                                    </div>  
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-6"></div>
                            <div class="col-xs-6">
                                <input type="submit" name="catalogInsert" class="btnEnfoca btn-primary" id="atualizar_catalogo_cat"value="Atualizar" />
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