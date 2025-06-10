<?php
require_once './api/config/database.php';

$db = connexionDB();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $db->prepare("SELECT * FROM user WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {

        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['nom'];
        $_SESSION['user_surname'] = $user['prenom'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_telephone'] = $user['telephone'];
        header('Location: back/admin.php');
        exit();
    } else {
        $messages = "<p style='color:red; text-align:center;'>Email ou mot de passe incorrect.</p>";
    }
}
?>

<!DOCTYPE>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sunpower - Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style/login.css">
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
<div id="login" class="card p-4" style="width: 350px;">
    <a href="index.html" class="back-link">&larr; Retour à l'accueil</a>
    <h2 class="text-center">Connexion</h2>
    <form method="POST" action="login.php">
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Votre email" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Mot de passe</label>
            <input type="password" name="password" class="form-control" placeholder="Votre mot de passe" required>
        </div>
        <div class="text-center">
            <button type="submit" class="login">Se connecter</button>
        </div>
        <div class="error">
        </div>
    </form>
</div>
</body>
</html>
