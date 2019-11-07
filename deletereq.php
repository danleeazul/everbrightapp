<?php
// include database connection
include 'config/database.php';
 
try {
    // delete query
    $query = "DELETE * FROM tbl_requirements";
    $stmt = $con->prepare($query);
    
    if($stmt->execute()){
        header('Location: index.php');
    }else{
        die('Unable to delete record.');
    }
}
 
// show error
catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}
?>