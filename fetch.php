<?php
//fetch.php
include_once 'config/database.php';
$output = '';




if(isset($_POST["query"]))
{
 $search=htmlspecialchars(strip_tags($_POST['query']));
 $query = "
  SELECT * FROM tbl_requirements 
  WHERE requirements_id LIKE '%".$search."%'
  OR name LIKE '%".$search."%' 
  OR building LIKE '%".$search."%' 
  OR location LIKE '%".$search."%' 
  OR type LIKE '%".$search."%'
 ";
}
else
{
 $query = "
  SELECT * FROM tbl_requirements ORDER BY requirements_id
 ";
}
$result = $con->prepare($query);
$result->execute();

$numa = $result->rowCount();

echo "<div class='col-md-9 order-md-1'>";
echo "<h4 class='d-flex justify-content-between align-items-center mb-3'>";
echo "<span class='text-muted'>Requirements</span>";
echo "<a href='create_req.php'><button type='button' href='create_req.php' class='btn btn-primary btn-sm'>Add</button></a>";
echo "</h4>";

echo "<ul class='list-group mb-3'>";

if($numa>0)
{
 $output .= '
   <li class="list-group-item d-flex justify-content-between lh-condensed">
   <table style="border: none;">

 ';
 while ($row = $result->fetch(PDO::FETCH_ASSOC))
 {
  $output .= '

                      <tr>
                       <td>
                   <img  src="'.$row["name"].'" width="50" height="50">
                     </td>
                      <td style="width: 800px; padding-left: 10px; padding-right: 10px;">
                   <h6 class="my-0 card-title">'.$row["building"].'</h6>
                   <small>'.$row["location"].' | '.$row["type"].'</small>
                   <br />
                   <p class="card-text cardtextmin">'.$row["requirements"].'</p>
                         </td>
                         <td style="width: 100px;">
     
                 <span class="text-muted">'.$row["price"].'</span>
                         </td>
                         </tr>
  ';
 }
 echo "</table>";
 echo "</li>";
 echo "</ul>";
 echo "</div>";
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>