<?php 

function connect(){
    
        try{
            $pdo=new PDO("mysql:host=;dbname=","","");
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        return $pdo;
    }
