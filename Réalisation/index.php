<?php
$json = file_get_contents("taches.json");
$taches = json_decode($json, true);
?>

<table border="1">
<tr>
    <th>ID</th>
    <th>Titre</th>
    <th>État</th>
    <th>Action</th>
</tr>

<?php foreach ($taches as $tache): ?>
<tr>
    <td><?php echo $tache["id"]; ?></td>
    <td><?php echo $tache["titre"]; ?></td>
    <td><?php echo $tache["etat"]; ?></td>
    <td>
        <form action="Traitement.php" method="post">
            <input type="hidden" name="id"
                   value="<?=$tache["id"];?>">
            <button type="submit">Changer état</button>
        </form>
    </td>
</tr>
<?php endforeach; ?>

</table>
