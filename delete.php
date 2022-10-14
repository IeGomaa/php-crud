<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $id = $_POST['id'];
        $connection = mysqli_connect('localhost','root','','crud');
        mysqli_query($connection,"DELETE FROM `users` WHERE `id` = $id");
        header('Location: table.php');
    }

} else {
    header('Location: index.php');
}