<?php
function getDbConnection() {
    $host = '10.10.51.124';
    $dbname = 'sunpower';
    $username = 'admin';
    $password = 'Is3n_Nantes';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }
}

function request($query) {
    $pdo = getDbConnection();
    $stmt = $query;
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>