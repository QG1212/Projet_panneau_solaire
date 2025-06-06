<?php

class User{
public static function getUser($db){
    $stmt = $db->query("SELECT * FROM `users`");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>