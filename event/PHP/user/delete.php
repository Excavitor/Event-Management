<?php
session_start();
include '../connection.php';

$delete = $_GET['delete'];

$di = "
DELETE concert, people, service FROM concert INNER JOIN people INNER JOIN service
WHERE concert.cid = {$delete} AND people.cid = {$delete} AND service.cid = {$delete}
";

if(mysqli_query($db, $di)){
    echo ("<script>
    window.alert('Information Removed');
    window.location.href='r_b_user_account.php';
    </script>");
}
else{
    echo "Failed to delete" . mysqli_error($db) ;
}

?>