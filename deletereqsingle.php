<?php
// include database connection
include 'config/database.php';
 
try {

    $id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');

    // delete query
    $query = "DELETE FROM tbl_requirements WHERE id = ?";
    $stmt = $con->prepare($query);
    $stmt->bindParam(1, $id);

    if($stmt->execute()){
       // header('Location: index.php');
        echo "<script type='text/javascript'> document.location = 'https://www.everbright.com.ph/everbrightapp/indexsample.php'; </script>";
    }else{
        die('Unable to delete record.');
    }
}
 
// show error
catch(PDOException $exception){
    die('ERROR: ' . $exception->getMessage());
}
?>