<!DOCTYPE HTML>
<html>
<head>
<title>Everbright App</title>
      
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

      <link href="https://www.everbright.com.ph/everbrightapp/libs/css/form-validation.css" rel="stylesheet" type="text/css"/>
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

      <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
      <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

      <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
      <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
          
</head>
<body>
  
    <!-- container -->
    <div class="container">
   
    <div class="py-5 text-center">
        <h2>Register User</h2>
    </div>
        <!-- PHP insert code will be here -->
        <?php


if($_POST){
 
    // include database connection
    include 'database.php';

    try{
     
        // insert query
        $query = "INSERT INTO tbl_requirements SET name=:name, building=:building, location=:location, type=:type, requirements=:requirements, price=:price";
 
        // prepare query for execution
        $stmt = $con->prepare($query);
 
        // posted values
        $name=htmlspecialchars(strip_tags($_POST['name']));
        $building=htmlspecialchars(strip_tags($_POST['building']));
        $location=htmlspecialchars(strip_tags($_POST['location']));
        $type=htmlspecialchars(strip_tags($_POST['type']));
        $requirements=htmlspecialchars(strip_tags($_POST['requirements']));
        $price=htmlspecialchars(strip_tags($_POST['price']));




        // bind the parameters
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':building', $building);
        $stmt->bindParam(':location', $location);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':requirements', $requirements);
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
<form class="needs-validation" novalidate action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <!--DEALS-->
      <hr class="mb-4">
       <div class="row">
               <div class="col-md-4 mb-3">
               <label for="lastName">First Name</label>
               <input type="text" class="form-control" name="firstname" placeholder="" value="" required>  
                    <div class="invalid-feedback">
                    Valid First name is required.
                    </div>         
               </div>
 
              <div class="col-md-4 mb-3">
                 <label for="firstName">Middle Name</label>
                 <input type="text" class="form-control" name="middlename" placeholder="" value="" required>  
                 <div class="invalid-feedback">
                    Valid Middle Name is required.
                    </div>  
              </div>

              <div class="col-md-4 mb-3">
                 <label for="firstName">Last Name</label>
                 <input type="text" class="form-control" name="lastname" placeholder="" value="" required>  
                 <div class="invalid-feedback">
                    Valid Last Name is required.
                    </div>  
              </div>
 
              <div class="col-md-12 mb-3">
                 <label for="firstName">Address</label>
                 <input type="text" class="form-control" name="lastname" placeholder="" value="" required>  
                 <div class="invalid-feedback">
                    Valid Address is required.
                    </div>  
              </div>
            </div>
 
            <div class="row">
            <div class="col-md-4 mb-3">
                <label for="lastName">Birthdate</label>
                <input id="deals_dates" class="form-control" name="deals_date" width="auto" onchange="getDate()" required />
                    <div class="invalid-feedback">
                    Valid Birthdate is required.
                    </div>  
           </div>
    
            <div class="col-md-4 mb-3">
            <label for="firstName">Contact No</label>
            <input type="text" class="form-control" name="contact" placeholder="" value="" onkeypress="return isNumberKey(event)"  required>    
             <div class="invalid-feedback">
                    Valid Contact Number
                </div>      
           </div>

           <div class="col-md-4 mb-3">
                 <label for="firstName">Position</label>
                 <input type="text" class="form-control" name="position" placeholder="" value="" required>  
                 <div class="invalid-feedback">
                    Valid Position is required.
                    </div>  
              </div>
           </div> <!--Row -->
 
           <hr class="mb-4">
           <div class="row">
           <div class="col-md-4 mb-3">
                 <label for="firstName">SSS No</label>
                 <input type="text" class="form-control" name="sss" onkeypress="return isNumberKey(event)" placeholder="" value="" required>  
                 <div class="invalid-feedback">
                    Valid SSS is required.
                    </div>  
              </div>
              <div class="col-md-4 mb-3">
                 <label for="firstName">PagIbig No</label>
                 <input type="text" class="form-control" name="pagibig" onkeypress="return isNumberKey(event)" placeholder="" value="" required>  
                 <div class="invalid-feedback">
                    Valid PagIbig No is required.
                    </div>  
              </div>
              <div class="col-md-4 mb-3">
                 <label for="firstName">Tin No</label>
                 <input type="text" class="form-control" name="sss" onkeypress="return isNumberKey(event)" placeholder="" value="" required>  
                 <div class="invalid-feedback">
                    Valid SSS is required.
                    </div>  
              </div>
           
       


       </div>
            <hr class="mb-4">
            <div class="text-right">
            <a href='dashboard.php'><button type="button" href='dashboard.php' class="btn btn-outline-secondary">Cancel</button></a>
            <button type="submit" value='Save'  class="btn btn-primary">Submit</button>
            </div>
            
</div><!--  Row -->
          
</form>
        
    </div> <!-- end .container -->
      
    <p id="image" style="visibility: hidden;"  name="image">url</p>     


 <!-- Optional JavaScript -->


 <script>

function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;

          return true;
       }

$('#deals_dates').datepicker({
            uiLibrary: 'bootstrap4',
            //format: 'yyyy-mm-dd'
        });

 function getDate(){
   var x = document.getElementById("deals_dates").value;
   document.getElementById("deals_datex").innerHTML = x;
 }

function GetSelectedValue(){
  var e = document.getElementById("nameimage");
  var result = e.options[e.selectedIndex].value;
  var unitcode = result

document.getElementById("image").innerHTML = unitcode;
}

    </script>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://everbright.com.ph/everbrightapp//libs/js/form-validation.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

   
  
</body>
</html>