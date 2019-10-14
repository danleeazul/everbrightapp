<!DOCTYPE HTML>
<html>
<head>
    <title>PDO - Create a Record - PHP CRUD Tutorial</title>
      
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
          
</head>
<body>
  
    <!-- container -->
    <div class="container">
   
        <div class="page-header">
            <h1>Create Product</h1>
        </div>
      
        <!-- PHP insert code will be here -->
        <?php
if($_POST){
 
    // include database connection
    include 'config/database.php';
 
    try{
     
        // insert query
        $query = "INSERT INTO tbl_deals SET name=:name, building=:building, unit_no=:unit_no, type=:type, price=:price";
 
        // prepare query for execution
        $stmt = $con->prepare($query);
 
        // posted values
        $name=htmlspecialchars(strip_tags($_POST['name']));
        $building=htmlspecialchars(strip_tags($_POST['building']));
        $unit_no=htmlspecialchars(strip_tags($_POST['unit_no']));
        $type=htmlspecialchars(strip_tags($_POST['type']));
        $price=htmlspecialchars(strip_tags($_POST['price']));

 
        // bind the parameters
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':building', $building);
        $stmt->bindParam(':unit_no', $unit_no);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':price', $price);
         
         
        // Execute the query
        if($stmt->execute()){
            echo "<div class='alert alert-success'>Record was saved.</div>";
        }else{
            echo "<div class='alert alert-danger'>Unable to save record.</div>";
        }
         
    }
     
    // show error
    catch(PDOException $exception){
        die('ERROR: ' . $exception->getMessage());
    }
}
?>
 
<!-- html form here where the product information will be entered -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <!--DEALS-->
      <hr class="mb-4">
       <div class="row">
               <div class="col-md-4 mb-3">
                   <label for="firstName">Name</label>
                   <input type="text" class="form-control" id="owner" placeholder="" value="" required>  
                               
               </div>
 
              <div class="col-md-4 mb-3">
                 <label for="firstName">Building</label>
                 <input type="text" class="form-control" id="owner" placeholder="" value="" required>  
              </div>
 
             <div class="col-md-4 mb-3">
               <label for="firstName">Unit No</label>
               <input type="text" class="form-control" id="broker" placeholder="" value="" required>      
            </div>
 
            <div class="col-md-4 mb-3">
                <label for="lastName">Type</label>
                    <select class="custom-select d-block w-100" id="unittype" required>
                      <option value="">Select...</option>
                      <option value="S">Sale</option> 
                      <option value="R">Rent</option>
                    </select>            
           </div>
 
          <div class="col-md-4 mb-3">
             <label for="firstName">Price</label>
             <input type="text" class="form-control" id="source" placeholder="Php" value="" required>           
          </div>
       </div>



         
            <hr class="mb-4">
            <div class="text-right">
              <button type="button" class="btn btn-outline-secondary">Cancel</button>

            <button type="submit" class="btn btn-primary">Submit</button>
            
            </div>
            
          
</form>
        
    </div> <!-- end .container -->
      
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
</body>
</html>
