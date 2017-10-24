<?php 
class Space {
    public function spacesByUser($idUser, $idFrame){
        global $pdo;
        $query = $pdo->prepare("SELECT * FROM space INNER JOIN frame ON space.frame_idFrame = frame.idFrame WHERE user_idUser = ? AND frame.idFrame = ?");
        $query->bindValue(1, $idUser);
        $query->bindValue(2, $idFrame);
        $query->execute();

        $spaces = $query->fetchAll(PDO::FETCH_ASSOC);
        

        return json_encode($spaces);
    }

    public function insertSpace($zone, $nameFrame, $idFrame){
        global $pdo;

        $query = $pdo->prepare("INSERT INTO space (zone, nameSpace, frame_idFrame) VALUES (?,?,?)");
        $query->bindValue(1, $zone);
        $query->bindValue(2, $nameFrame);
        $query->bindValue(3, $idFrame);
        $query->execute();
        echo 'isso aí';
        header("location: spaces.php?idFrame="+$idFrame);

    }

    public function updateSpace($nameSpace, $idSpace, $idFrame){
        global $pdo;

        $query = $pdo->prepare("UPDATE space SET nameSpace = ? WHERE idSpace = ? AND frame_idFrame = ?");
        $query->bindValue(1, $nameSpace);
        $query->bindValue(2, $idFrame);
        $query->bindValue(3, $idFrame);
        $query->execute();
        echo 'isso aí';

    }

}


?>