<?php
//fetch.php
include_once 'config/database.php';
$connect = mysqli_connect("localhost", "root", "", "testing");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($con, $_POST["query"]);
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
$result = mysqli_query($con, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>ID</th>
     <th>Name</th>
     <th>Building</th>
     <th>Location Code</th>
     <th>Type</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["requirements_id"].'</td>
    <td>'.$row["name"].'</td>
    <td>'.$row["building"].'</td>
    <td>'.$row["location"].'</td>
    <td>'.$row["type"].'</td>
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>