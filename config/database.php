<?php
// used to connect to the database
$host = "162.241.217.198";
$db_name = "megawor3_EBsystem";
$username = "megawor3_appsys";
$password = "Dr8amb15!";
  
try {
    $con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
}
  
// show error
catch(PDOException $exception){
    echo "Connection error: " . $exception->getMessage();
}
?>