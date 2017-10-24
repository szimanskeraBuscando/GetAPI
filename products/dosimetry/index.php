<!DOCTYPE html>

<html lang="pt-br">

<head>
    <!-- meta Tags -->

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- Links -->

    <link href="../../assets/css/style2.css" rel="stylesheet">
    <link href="../../assets/css/skunk.css" rel="stylesheet">
    <link href="../../assets/css/dosimetry.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/bootstrap.css"/>
    <!-- FONTAWESOME STYLE CSS -->
    <script src="https://use.fontawesome.com/200c15ffad.js"></script>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>




<body>
    <div class="loader"></div>
        <header class="dosimetry-header">
            <div class="row container-fluid">
                <div class="col-md-12 headerText">
                    <p>Calcule o tempo total de uma pena</p>
                </div>
            </div>
        </header>

        
    
        

        <div class="row">
        <div class="col-xs-12">
            <div class="jumbotron" id="card1"> 
               <h3> card </h3>
            </div>
            <div class="card1_">
                <div class="row">
                    
                </div>
                <div class="bottom">
                    
                  
                </div>
            </div>
            
        </div>
    </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

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