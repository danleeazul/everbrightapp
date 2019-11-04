<?php
include_once 'config/database.php';
    $output = '';
    $sql = "SELECT * FROM tbl_requirements WHERE requirements_id LIKE '%".$_POST["search"]."%'";
    $result = mysqli_query($connect, $sql);
 

    echo "        <div class='col-md-9 order-md-1'>";
    echo "            <h4 class='d-flex justify-content-between align-items-center mb-3'>";
    echo "                    <span class='text-muted'>Requirements</span>"; 
    echo "           <a href='create_req.php'><button type='button' href='create_req.php' class='btn btn-primary btn-sm'>Add</button></a>"; 
    echo "            </h4>";


    echo "            <ul class='list-group mb-3'>";


    if(mysqli_num_rows($result) > 0){

        


        while($row = mysqli_fetch_array($result)){

                $output .='
                <li class="list-group-item d-flex justify-content-between lh-condensed">

                <table style="border: none;">
                                   <tr>
                                    <td>
                                <img  src="" width="50" height="50">
                                  </td>
                                   <td style="width: 800px; padding-left: 10px; padding-right: 10px;">
                                <h6 class="my-0 card-title">'.$row['building'].'</h6>
                                <small>'.$row['building'].' | '.$row['type'].'</small>
                                <br />
                                <p class="card-text cardtextmin">'.$row['requirements'].'</p>
                                      </td>
                                      <td style="width: 100px;">
                  
                              <span class="text-muted">'.$row['price'].'</span>
                                      </td>
                                      </tr>
                                  </table>
                            </li>
                ';
            
        }
        echo $output;
    }
    else{
        echo 'Data not found';
    }
?>