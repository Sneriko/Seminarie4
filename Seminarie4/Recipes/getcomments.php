<?php
require '../Login/dbh.inc.php';
$sql = "SELECT * FROM comments";
$result = mysqli_query($conn, $sql);
$data = array();
$i = 0;
while($row = mysqli_fetch_assoc($result)){
    $data['comment'.$i]['commentid'] = $row['id'];
    $data['comment'.$i]['comment'] = nl2br($row['comment']);
    $data['comment'.$i]['username'] = $row['username'];
    $data['comment'.$i]['recipeid'] = $row['recipe'];

    $i++;
}

echo json_encode($data);


