<?php 

function connect(){
    
        try{
            $pdo=new PDO("mysql:host=72.55.182.87;dbname=getapi_homolog","getapi","getapi2@D017");
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        return $pdo;
    }