<?php
include_once 'config/database.php';
    $output = '';
    $sql = "SELECT * FROM tbl_requirements WHERE requirements_id LIKE '%".$_POST["search"]."%'";
    $result = $con->prepare($sql);


    $stmta = $con->prepare($querya);
    $stmta->execute();    
    $numa = $stmta->rowCount();
    


//     if(mysqli_num_rows($result) > 0){

        
// $output .='<h4>SEARCH</h4>';

//         while($row = mysqli_fetch_array($result)){

//                 $output .='
//                 <p>'.$row['building'].'</p>
                                
//                 ';
            
//         }
//         echo $output;
//     }
//     else{
//         echo 'Data not found';
//     }


if(mysqli_num_rows($result) > 0){

        
    $output .='<h4>SEARCH</h4>';
    
    while($row = mysqli_fetch_array($result)){
        
        extract($row);
    
                    $output .='
                    <p>'.$row['building'].'</p>
                                    
                    ';
                
            }
            echo $output;
        }
        else{
            echo 'Data not found';
        }
?>