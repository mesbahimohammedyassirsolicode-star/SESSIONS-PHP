<?php
$taches = json_decode(file_get_contents("taches.json"), true);
// CHANGE ETAT
if (isset($_POST["id"])) {
    $id = (int) $_POST["id"];

    foreach ($taches as &$tache) {
        if ($tache["id"] === $id) {
            $tache["etat"] =
                ($tache["etat"] === "a-faire") ? "fait" : "a-faire";
            break;
        }
    }
}

// DELETE
if (isset($_POST["delete"])) {
    $del = $_POST["delete"];

    $taches = array_filter($taches, function ($task) use ($del) {
        return $task["id"] !== $del;
    });

    
}

// SAVE JSON 
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    file_put_contents(
        "taches.json",
        json_encode($taches, JSON_PRETTY_PRINT)
    );

    header("Location: index.php");
    exit;
}

// FILTER (GET)
$filter = $_GET["filter"] ?? "all";
$filteredTasks = $taches;

if ($filter !== "all") {
    $filteredTasks = array_filter($taches, function ($t) use ($filter) {
        return $t["etat"] === $filter;
    });
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Task Manager</title>
    <!-- <style>
        table { border-collapse: collapse; width: 70%; }
        th, td { border: 1px solid #ccc; padding: 8px; }
        .fait { color: green; }
        .a-faire { color: orange; }
    </style> -->
</head>
<body>

<h2>Task Manager</h2>

<!-- FILTER -->
<a href="index.php?filter=all">All</a> |
<a href="index.php?filter=a-faire">À faire</a> |
<a href="index.php?filter=fait">Fait</a>

<br><br>

<table>
    <tr>
        <th>ID</th>
        <th>Titre</th>
        <th>État</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($filteredTasks as $tache): ?>
        <tr>
            <td><?= $tache["id"] ?></td>
            <td><?= ($tache["titre"]) ?></td>
            <td class="<?= $tache["etat"] ?>">
                <?= $tache["etat"] ?>
            </td>
            <td>
                <!-- CHANGE ETAT -->
                <form method="post" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $tache["id"] ?>">
                    <button type="submit">Change</button>
                </form>

                <!-- DELETE -->
                <form method="post" style="display:inline;">
                    <input type="hidden" name="delete" value="<?= $tache["id"] ?>">
                    <button type="submit">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
  <a href="add.php">Ajouter une tache</a>

</body>
</html>
