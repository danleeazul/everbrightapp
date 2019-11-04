<?php
include_once 'config/database.php';
    $output = '';
    $sql = "SELECT * FROM tbl_requirements WHERE requirements_id LIKE '%".$_POST["search"]."%'";
    $stmta = $con->prepare($querya);
    $stmta->execute();
    $numa = $stmta->rowCount();

    echo "        <div class='col-md-9 order-md-1'>";
    echo "            <h4 class='d-flex justify-content-between align-items-center mb-3'>";
    echo "                    <span class='text-muted'>Requirements</span>"; 
    echo "           <a href='create_req.php'><button type='button' href='create_req.php' class='btn btn-primary btn-sm'>Add</button></a>"; 
    echo "            </h4>";


    echo "            <ul class='list-group mb-3'>";


    if($numa > 0){

    
            while ($rowa = $stmta->fetch(PDO::FETCH_ASSOC)){

                extract($rowa);
                $output .='hi
                
                ';

            echo "              <li class='list-group-item d-flex justify-content-between lh-condensed'>";

echo "  <table style='border: none;'>";
echo "                     <tr>";
echo "                      <td>";
echo "                  <img  src='' width='50' height='50'>";
echo "                    </td>";
echo "                     <td style='width: 800px; padding-left: 10px; padding-right: 10px;'>";
echo "                  <h6 class='my-0 card-title'>{$building}</h6>";
echo "                  <small>{$city} | {$type}</small>";
echo "                  <br />";
echo "                  <p class='card-text cardtextmin'>{$type}</p>";
echo "                        </td>";
echo "                        <td style='width: 100px;'>";
    
echo "                <span class='text-muted'>{$selling_price}</span>";
echo "                        </td>";
echo "                        </tr>";
echo "                    </table>";

echo "              </li>";
        }




    }
    else{
        echo 'Data not found';
    }
?>