<?php
require "data.php";
session_start();
$message = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"] ?? "");
    $password = trim($_POST["password"] ?? "");
if (empty($username) || empty($password))
    {
        echo "username and password are empty ";

    }
else{
foreach ($users as $user) {
        if ($user["name"] === $username && $user["password"] === $password) {
            

            if ($user["active"] === false) {
                $message = "⛔ Compte désactivé";
                break;
            } else {
                $_SESSION["user"] = $user;
                header("Location: dashboard.php");
                exit;
            }
        }
    }

       if (!empty($username) && !empty($password)) {
        $message = "❌ Identifiants incorrects";
    }
    } 
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Authentification</title>
</head>
<body>

<h2>Connexion</h2>

<form method="POST">
    <label>Nom utilisateur :</label><br>
    <input type="text" name="username" required><br><br>

    <label>Mot de passe :</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Se connecter</button>
</form>

<p style="color:red;">
    <?= $message ?>
</p>

</body>
</html>
