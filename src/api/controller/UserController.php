<?php
require_once 'model/User.php';
require_once 'config/database.php';

class UserController{
public static function getAdmin(){
    header('Content-Type: application/json');
    $db = connexionDB();
    $data = User::getUser($db);
    echo json_encode($data);
    }
}
?>

