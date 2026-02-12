<?php

if (!isset($_SESSION["user"])) {
    require_once  " login.php";
    exit;
}

$user = $_SESSION["user"];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Espace sécurisé</title>
</head>
<body>

<h2>
<?php
if ($user["role"] === "administrateur") {
    echo "👑 Administrateur : " . $user["name"];
} elseif ($user["role"] === "formateur") {
    echo "📘 Formateur : " . $user["name"];
} else {
    echo "🎓 Apprenant : " . $user["name"];
}
?>
</h2>

<form action="login.php" method="get">
    <button type="submit">Se déconnecter</button>
</form>

</body>
</html>
