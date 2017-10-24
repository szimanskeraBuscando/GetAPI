<?php 
class Frame {

    public function returnExistingFrame($idUser){
        global $pdo;
        $query = $pdo->prepare("SELECT * FROM frame WHERE user_idUser = ? AND statusFrame = '1'");
        $query->bindValue(1, $idUser);
        $query->execute();

        $totalRow = $query->rowCount();
        

        if($totalRow != 0){
            return false;
        } else {
            return true;
        }
    }

    public function framesByUser($idUser){
        global $pdo;
        $query = $pdo->prepare("SELECT * FROM frame WHERE user_idUser = ?");
        $query->bindValue(1, $idUser);
        $query->execute();

        $frames = $query->fetchAll(PDO::FETCH_ASSOC);
        

        return json_encode($frames);
    }

    public function insertFrame($nameFrame, $idUser){
        global $pdo;

        $query = $pdo->prepare("INSERT INTO frame (nameFrame, user_idUser) VALUES (?,?)");
        $query->bindValue(1, $nameFrame);
        $query->bindValue(2, $idUser);
        $query->execute();
        echo 'isso aí';

    }

    public function updateFrame($nameFrame, $idFrame, $idUser){
        global $pdo;

        $query = $pdo->prepare("UPDATE frame SET nameFrame = ? WHERE idFrame = ? AND user_idUser = ?");
        $query->bindValue(1, $nameFrame);
        $query->bindValue(2, $idFrame);
        $query->bindValue(3, $idUser);
        $query->execute();
        echo 'isso aí';

    }

}


?>