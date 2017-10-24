<!DOCTYPE html>

<html lang="pt-br">

<head>
    <!-- meta Tags -->

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Links -->

    <link href="../../assets/css/style2.css" rel="stylesheet">
    <link href="../../assets/css/bootstrap.css" rel="stylesheet" />

    <!-- FONTAWESOME STYLE CSS -->
    <script src="https://use.fontawesome.com/200c15ffad.js"></script>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>




<body>
    <div class="header">
        <div class="jumbotron">
            <h2>DOSIMETRIA</h2>
        </div>
    </div>
    <hr>


    <div class="row">
        <div class="col-xs-12">
            <div class="jumbotron" id="still"> 
               <h3> FASE 1 </h3>
            </div>
            <div class="fase1">
                <div class="row">
                    <div class="col-xs-6">
                        <h3> Descrição do Crime </h3>   
                        
                        <input class="form-control"  id="description" type="text" placeholder="Ex: Homicídio">  
                        
                        
                        
                    </div>

                    <div class="col-xs-6">
                        <div class="time">
                        
                            <div class="row" id="min">
                                <h3 id="id_min"> Min </h3>
                                <h3 id="id_max"> Max </h3>
                                <div class="col-xs-4"> 
                                    <input class="form-control" id="minMax" type="number" placeholder="Anos">
                                </div>
                                <div class="col-xs-4"> 
                                    <input class="form-control" id="minMax" type="number" placeholder="Meses">
                                </div>
                                <div class="col-xs-4"> 
                                    <input class="form-control" id="minMax" type="number" placeholder="Dias">
                                </div>
                                
                            </div>

                            <div class="row" id="max">
                                <div class="col-xs-4"> 
                                    <input class="form-control" id="minMax" type="number" placeholder="Anos">
                                </div>
                                <div class="col-xs-4"> 
                                    <input class="form-control" id="minMax" type="number" placeholder="Meses">
                                </div>
                                <div class="col-xs-4"> 
                                    <input class="form-control" id="minMax" type="number" placeholder="Dias">
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="classificacao">
                    <div class="row">
                        <div class="col-xs-6">

                            <table class="table">
                                    <thead class="categoria">
                                        <tr>
                                        
                                        <th> <h3>Circunstâncias</h3></th>
                                        
                                        
                                        </tr>
                                    </thead>
                                    <tbody class="types">
                                        <tr>
                                        
                                        <td>Culpabilidade</td>
                                        <td> 
                                            <div class="checkbox">
                                                <label><input type="checkbox" value=""></label>
                                            </div>
                                        </td>
                                                                    
                                        </tr>
                                        <tr>
                                        
                                        <td>Antecedentes</td>
                                        <td> 
                                            <div class="checkbox">
                                                <label><input type="checkbox" value=""></label>
                                            </div>
                                        </td>
                                        
                                        </tr>

                                        <tr>
                                    
                                        <td>Conduta Social</td>
                                        <td> 
                                            <div class="checkbox">
                                                <label><input type="checkbox" value=""></label>
                                            </div>
                                        </td>
                                        </tr>

                                        <tr>
                                            <td>Personalidade do Agente</td>
                                            <td> 
                                                <div class="checkbox">
                                                    <label><input type="checkbox" value=""></label>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                            </table>
                        </div>
                        <div class="col-xs-6">
                            
                            <table class="table" id="table2">
                                <thead class="categoria">
                                    
                                    <tr>
                                    <td>Motivos do crime</td>
                                    <td> 
                                        <div class="checkbox">
                                            <label><input type="checkbox" value=""></label>
                                        </div>
                                    </td>
                                    </tr>
                                    

                                    <tr>
                                    <td>Circunstância do crime</td>
                                    <td> 
                                        <div class="checkbox">
                                            <label><input type="checkbox" value=""></label>
                                        </div>
                                    </td>
                                    </tr>

                                    <tr>
                                    <td>Consequências do crime</td>
                                    <td> 
                                        <div class="checkbox">
                                            <label><input type="checkbox" value=""></label>
                                        </div>
                                    </td>
                                    </tr>

                                    <tr>
                                    <td>Comportamento da vítima</td>
                                    <td> 
                                        <div class="checkbox">
                                            <label><input type="checkbox" value=""></label>
                                        </div>
                                    </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                           
                    </div>
                </div>
                <div class="bottom">
                    <h3 class="result"> Pena Base </h3>
                    <div class="total1">
                        
                      
                
                    </div>
                    <button class="btn btn-next"  id="done" type="button"> Próximo </button>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12">
            <div class="jumbotron" id="still"> 
               <h3> FASE 2 </h3>
            </div>
            <div class="fase2">
                <div class="row">
                    <div class="col-xs-4">
                    
                        <h4> Agravantes </h4>
                        <input class="form-control" id ="agrav" type="text"> 
                        <button class="btn btn-add"  id="add" type="button"> + </button>
                       
                    </div>

                    <div class="col-xs-4"></div>
                    

                    <div class="col-xs-4">
                        
                        <h4> Atenuantes </h4>
                        <input class="form-control" id ="agrav" type="text"> 
                        <button class="btn btn-add"  id="add" type="button"> + </button>
                    
                    </div>
                </div>
                <div class="bottom">
                    <h4 class="pena2"> Pena Provisória </h4>
                    <div class="total2">

                    </div>
                    <button class="btn btn-next"  id="done" type="button"> Próximo </button> 
                </div>
            </div>
            
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12">
            <div class="jumbotron" id="still"> 
               <h3> FASE 3 </h3>
            </div>
            <div class="fase3">
                <div class="col-md-12">
                   
                        <i class="fa fa-info-circle" id ="ajuda" data-toggle="tooltip" title="Ajuda" aria-hidden="true"></i>
                    
                    <div class="row">
                        
                        <div class="col-md-4">
                            <div class=" majorMinor">                        
                                <h4> Majorante </h4>
                                <input class="form-control" id ="agrav" type="text"> 
                                <input class="form-control" id ="fraction1" type="number" min="0">
                                <input class="form-control" id ="fraction2" type="number" min="0">
                                <button class="btn btn-add2"  sid="add_fraction" type="button"> + </button>
                            </div>
                        
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-4" >
                            <div class="majorMinor">
                                <h4> Minorante </h4>
                                <input class="form-control" id ="agrav" type="text"> 
                                <input class="form-control" id ="fraction1" type="number" min="0">
                                <input class="form-control" id ="fraction2" type="number" min="0">
                                <button class="btn btn-add2"  id="add_fraction" type="button"> + </button>
                            </div>
                        
                        </div>
                        
                    </div>
                    <div class="bottom">
                        <h4 class="pena3"> Pena Definitiva </h4>
                        <div class="total3">

                        </div>
                        <button class="btn btn-next"  id="done" type="button"> Próximo </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    $(function () {
    $('[data-toggle="tooltip"]').tooltip()
    })
</script>
</body>

</html>