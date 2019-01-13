<?php
session_start();
include "dbh.inc.php";
$var2 = $_SESSION['recipe'];
$var = $_GET['id'];
$sql = "DELETE FROM comments WHERE id='$var'";
$conn->query($sql);
