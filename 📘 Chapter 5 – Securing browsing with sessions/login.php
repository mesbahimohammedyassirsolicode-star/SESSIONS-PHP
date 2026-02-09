<?php
if($_POST){

    $name = trim($_POST['name']);

    // create cookie for 1 day
    setcookie("username", $name, time() + 86400, "/");

    echo "Cookie saved!";
}
?>

<form method="POST">
    <input type="text" name="name" placeholder="Your name">
    <button>Save</button>
</form>
