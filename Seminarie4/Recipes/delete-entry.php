<?php
session_start();
include "dbh.inc.php";
$var2 = $_SESSION['recipe'];
$id = $_GET['id'];
$sql = "DELETE FROM comments WHERE id='$id'";
$conn->query($sql);
