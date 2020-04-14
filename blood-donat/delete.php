<?php
// delete the data frome data base
include('connection/connect.php');
$id = $_REQUEST['id'];
$sql = "DELETE FROM blood_data WHERE id=$id";
$delete = mysqli_query($conn, $sql);
header('location: showall.php?ok')
?>