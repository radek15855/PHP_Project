<?php
require_once 'config.php';
$title = $_POST['title'];
$text = $_POST['text'];
$query = "INSERT INTO texty (title, text) VALUES ('$title','$text')";
$run = mysqli_query($link, $query);

header("location: welcome.php");
exit;
?>