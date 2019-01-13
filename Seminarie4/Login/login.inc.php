<?php
require 'dbh.inc.php';
$username = $_POST['username'];
$password = $_POST['pwd'];

$data = array();

$sql = "SELECT * FROM registeredusers WHERE usernameUsers=?";
$stmt = mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result  = mysqli_stmt_get_result($stmt);
if($row = mysqli_fetch_assoc($result)){
    if ($password <> $row['pwdUsers']){
        $data['success'] = false;
    }
    else{
        session_start();
        $_SESSION['userid'] = $row['idusers'];
        $_SESSION['username'] = $row['usernameUsers'];
        $data['success'] = true;
        $data['userid'] = $username;
    }
}

echo json_encode($data);
