<?php
// fichier : traitement.php
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $nom = trim($_GET['nom']);
    $email = trim($_GET['email']);

    if (empty($nom) || empty($email)) {
        echo "Tous les champs sont obligatoires.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Email invalide.";
    } else {
        echo "Bonjour $nom, votre email est $email.";
    }
}
