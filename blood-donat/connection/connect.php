<?php

$db_host = 'localhost';
$db_user = 'loginSys';
$db_pass = 'skshakil';
$db_nam = 'blood_db';

$conn = mysqli_connect($db_host,$db_user,$db_pass,$db_nam);

if($conn === false){
    echo "have error".mysqli_connect_error($conn);
}

?>