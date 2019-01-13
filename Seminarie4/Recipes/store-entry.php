<?php
include 'dbh.inc.php';
session_start();

$var = $_SESSION['recipe'];
$var2 = $_SESSION['username'];
$comment = $_POST['comment'];

$sql = "INSERT INTO comments (recipe, username, comment) VALUES ('$var', '$var2', '$comment')";
$conn->query($sql);



