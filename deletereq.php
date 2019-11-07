<?php
// include database connection
include 'config/database.php';
 
try {
    // delete query
    $query = "DELETE * FROM tbl_requirements";
    $stmt = $con->prepare($query);
    $stmt->execute();
}
 
// show error
catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}
?>