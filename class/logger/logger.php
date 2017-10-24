<?php

class Logger {
    public function insertLog($description, $user, $idUser, $ipUser) {
        global $pdo;
        $query = $pdo->prepare("INSERT INTO logger (description, user, user_idUser, ipUser) VALUES (?,?,?,?)");
        $query->bindValue(1, $description);
        $query->bindValue(2, $user);
        $query->bindValue(3, $idUser);
        $query->bindValue(4, $ipUser);
        $query->execute();
    }
}