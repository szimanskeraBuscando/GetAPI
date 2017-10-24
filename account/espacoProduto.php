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
                        <h1>Produto</h1>        
                        <br>  
                        <br>
                        <br>
                                                              
                    </div>    
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <form action="admin.php" method="POST" class="form-horizontal">
                        <fieldset>
                        <!-- Text input http://getbootstrap.com/css/#forms -->
                        <div class="form-group">
                            <label for="icon" class="control-label col-xs-2">Título</label>
                            <div class="col-xs-10">
                                <div class="form-group">    
                                    <select class="form-control" id="sel1">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div> 
                            </div>
                        </div>
                        

                        <div class="form-group">
                            <label for="icon" class="control-label col-xs-2">Catálogo</label>
                            <div class="col-xs-10">
                                <div class="form-group">    
                                    <select class="form-control" id="sel1">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div> 
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="icon" class="control-label col-xs-2">Frame</label>
                            <div class="col-xs-10">
                                <div class="form-group">    
                                    <select class="form-control" id="sel1">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div> 
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="icon" class="control-label col-xs-2">Nome</label>
                            <div class="col-xs-10">
                                <div class="form-group">
                                    <input type="text" class="form-control insertedData" name="icon"  required="">
                                </div>  
                            </div>
                        </div>


                        
                        <div class="row">
                            <div class="col-xs-10"></div>
                            <div class="col-xs-2">
                                <input type="submit" name="catalogInsert" class="btnEnfoca btn-primary" id="atualizar"value="Atualizar" />
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