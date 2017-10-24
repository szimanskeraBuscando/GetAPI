<?php

class User {

    public function returnIdByEmail($email){
        global $pdo;
        $query = $pdo->prepare("SELECT idUser FROM user WHERE email = ?");
        $query->bindValue(1, $email);
        $query->execute();

        $returnEmail = $query->fetch(PDO::FETCH_ASSOC);

        return $returnEmail['idUser'];
    }

    public function verificaSession(){
        if($_SESSION['email'] != true){
            header('location: ../index.php');
            exit();
        }
    }


    public function newAccount($email, $firstName, $lastName, $company, $state, $whatsapp, $password, $infoEmail, $infoWhatsapp){
        global $pdo;

        if($infoEmail == 'email'){
            $infoEmail = 1;
        } else {
            $infoEmail = 0;
        }

        if($infoWhatsapp == 'whatsapp'){
            $infoWhatsapp = 1;
        } else {
            $infoWhatsapp = 0;
        }

        $query = $pdo->prepare("INSERT INTO user (email, firstName, lastName, company, state, whatsapp, password, infoEmail, infoWhatsapp) VALUES (?,?,?,?,?,?,?,?,?)");
        $query->bindValue(1, $email);
        $query->bindValue(2, $firstName);
        $query->bindValue(3, $lastName);
        $query->bindValue(4, $company);
        $query->bindValue(5, $state);
        $query->bindValue(6, $whatsapp);
        $query->bindValue(7, $password);
        $query->bindValue(8, $infoEmail);
        $query->bindValue(9, $infoWhatsapp);

        $buscarUser = $pdo->prepare("SELECT * FROM user WHERE email = ?");
        $buscarUser->bindValue(1, $email);
        $buscarUser->execute();

        if($buscarUser->rowCount() == 0){
            $query->execute();
            echo "
            <div class='row container-fluid' style='margin-top: 15px'>
                <div class='col-md-12'>
                    <div class='alert alert-success alert-dismissible' role='alert'>
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                        <strong>Seja bem vindo</strong> ao Get API!
                    </div>
                </div>
            </div>             
            ";            
        } else {
            echo "
            <div class='row container-fluid' style='margin-top: 15px'>
                <div class='col-md-12'>
                    <div class='alert alert-danger alert-dismissible' role='alert'>
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                        <strong>Ops</strong> não conseguimos completar seu cadastro!
                    </div>
                </div>
            </div>                       
            ";
        } 
    }

    public function logar($email, $password, $ipAttempt){
        global $pdo;

        $query = $pdo->prepare("SELECT idUser, email, password FROM user WHERE email = ? AND password = ?");
        $query->bindValue(1, $email);
        $query->bindValue(2, $password);
        $query->execute();

        $showUser = $query->fetch(PDO::FETCH_ASSOC);

        if($showUser > 0){
            $_SESSION['email'] = $email;
            header("location: products/index.php");
        } else {
            $attemptLogin = $pdo->prepare("INSERT INTO attempt (action, ipAttempt, email) VALUES (?,?,?)");
            $attemptLogin->bindValue(1, 'login');
            $attemptLogin->bindValue(2, $ipAttempt);
            $attemptLogin->bindValue(3, $email);
            $attemptLogin->execute();
            echo "
            <div class='row container-fluid' style='margin-top: 15px'>
                <div class='col-md-12'>
                    <div class='alert alert-danger alert-dismissible' role='alert'>
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                        <strong>Ops</strong> acho que não encontramos seu usuário!
                    </div>
                </div>
            </div>                       
            ";
        }
    }


    function get_client_ip() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }


    public function updateProfile($email, $firstName, $lastName, $company, $whatsapp, $password){
        global $pdo;
        
        if($password == ''){
            $query = $pdo->prepare("UPDATE user SET email = ?, firstName = ?, lastName = ?, company = ?, whatsapp = ? WHERE email = ?"); 
            $query->bindValue(1, $email);
            $query->bindValue(2, $firstName);
            $query->bindValue(3, $lastName);
            $query->bindValue(4, $company);
            $query->bindValue(5, $whatsapp);
            $query->bindValue(6, $email);
            $query->execute();
        } else {
            $query = $pdo->prepare("UPDATE user SET email = ?, firstName = ?, lastName = ?, company = ?, whatsapp = ?, password = ? WHERE email = ?");
            $query->bindValue(1, $email);
            $query->bindValue(2, $firstName);
            $query->bindValue(3, $lastName);
            $query->bindValue(4, $company);
            $query->bindValue(5, $whatsapp);
            $query->bindValue(6, $password);
            $query->bindValue(7, $email);
            $query->execute();
        }

        if($query->rowCount() != 0){
            echo "
            <div class='row container-fluid' style='margin-top: 15px'>
                <div class='col-md-12'>
                    <div class='alert alert-success alert-dismissible' role='alert'>
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                        <strong>Alterado com Sucesso!</strong>
                    </div>
                </div>
            </div>             
            ";            
        } else {
            echo "
            <div class='row container-fluid' style='margin-top: 15px'>
                <div class='col-md-12'>
                    <div class='alert alert-danger alert-dismissible' role='alert'>
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                        <strong>Ops</strong> algo não foi possível!
                    </div>
                </div>
            </div>                       
            ";
        } 
    }



}