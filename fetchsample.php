<?php
include_once 'config/database.php';
    $output = '';
    $sql = "SELECT * FROM tbl_requirements WHERE requirements_id LIKE '%".$_POST["search"]."%'";
    $result = mysqli_query($con, $sql);


    $stmta = $con->prepare($sql);
    $stmta->execute();
    $numa = $stmta->rowCount();
    


    if($numa>0){

        
$output .='<h4>SEARCH</h4>';

while ($rowa = $stmta->fetch(PDO::FETCH_ASSOC)){
    
    extract($rowa);

                $output .='
                <p>'.$rowa['building'].'</p>
                                
                ';
            
        }
        echo $output;
    }
    else{
        echo 'Data not found';
    }
?>