<?php
$id = $_POST["id"];

$json = file_get_contents("taches.json");
$taches = json_decode($json, true);

foreach ($taches as &$tache) {
    if ($tache["id"] == $id) {
        $tache["etat"] =
            ($tache["etat"] === "a-faire") ? "fait" : "a-faire";
        break;
    }
}

file_put_contents(
    "taches.json",
    json_encode($taches, JSON_PRETTY_PRINT)
);

header("Location: index.php");
exit;
