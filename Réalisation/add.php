<?php
$taches = json_decode(file_get_contents("taches.json"), true);
if (isset($_POST['add'])) {
  $titre = $_POST['titre'];

  if (!empty($titre)) {
    $ids = array_column($taches, 'id');
    $newId = empty($ids) ? 1 : max($ids) + 1;

    $taches[] = [
      "id" => $newId,
      "titre" => $titre,
      "etat" => "a-faire"
    ];
    file_put_contents("taches.json", json_encode($taches, JSON_PRETTY_PRINT));
    header("Location: index.php");
    exit;
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add</title>
</head>
<body>
      <form method='POST'>
    <input type='text' name='titre' placeholder='New task' required>
    <button type='submit' name='add'>Ajouter</button>
  </form>
</body>
</html>
