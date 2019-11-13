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
        <h2>Update User</h2>
    </div>
        <!-- PHP insert code will be here -->
        <?php

$id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
 
    // include database connection
    include 'database.php';

    try{
    
        // insert query
        $query = "SELECT  firstname, middlename, lastname, position, email, contact_number, birthdate, address, password, sss, pagibig, tin, access_level, status, image FROM tbl_users WHERE id = ? LIMIT 0,1";
        
        // prepare query for execution
        $stmt = $con->prepare($query);

        // this is the first question mark
        $stmt->bindParam(1, $id);
        
        // execute our query
        $stmt->execute();

        // store retrieved row to a variable
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // values to fill up our form
        $firstname = $row['firstname'];
        $middlename = $row['middlename'];
        $price = $row['price'];
        $lastname = $row['lastname'];
        $position = $row['position'];
        $email = $row['email'];
        $price = $row['price'];
        $contact_number = $row['contact_number'];
        $address = $row['address'];
        $password = $row['password'];
        $sss = $row['sss'];
        $pagibig = $row['pagibig'];
        $tin = $row['tin'];

    }
     
    // show error
    catch(PDOException $exception){
        die('ERROR: ' . $exception->getMessage());
    }



?>
 
<!-- html form here where the product information will be entered -->
<form class="needs-validation" novalidate action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
      <!--DEALS-->
      <hr class="mb-4">
      <h4 class="mb-3">Employee Information</h4>
       <div class="row">
               <div class="col-md-4 mb-3">
               <label for="lastName">First Name</label>
               <input type="text" class="form-control" name="firstname" placeholder="" value="<?php echo htmlspecialchars($firstname, ENT_QUOTES);  ?>" required>  
                    <div class="invalid-feedback">
                    Valid First name is required.
                    </div>         
               </div>
 
              <div class="col-md-4 mb-3">
                 <label for="firstName">Middle Name</label>
                 <input type="text" class="form-control" name="middlename" placeholder="" value="<?php echo htmlspecialchars($middlename, ENT_QUOTES);  ?>" required>  
                 <div class="invalid-feedback">
                    Valid Middle Name is required.
                    </div>  
              </div>

              <div class="col-md-4 mb-3">
                 <label for="firstName">Last Name</label>
                 <input type="text" class="form-control" name="lastname" placeholder="" value="<?php echo htmlspecialchars($lastname, ENT_QUOTES);  ?>" required>  
                 <div class="invalid-feedback">
                    Valid Last Name is required.
                    </div>  
              </div>
 
              <div class="col-md-12 mb-3">
                 <label for="firstName">Address</label>
                 <input type="text" class="form-control" name="address" placeholder="" value="<?php echo htmlspecialchars($address, ENT_QUOTES);  ?>" required>  
                 <div class="invalid-feedback">
                    Valid Address is required.
                    </div>  
              </div>
            </div>
 
            <div class="row">
            <div class="col-md-4 mb-3">
                <label for="lastName">Birthdate</label>
                <input id="birthdate" class="form-control" name="birthdate" width="auto" value="<?php echo htmlspecialchars($birthdate, ENT_QUOTES);  ?>" onchange="getDate()" required />
                    <div class="invalid-feedback">
                    Valid Birthdate is required.
                    </div>  
           </div>
    
            <div class="col-md-4 mb-3">
            <label for="firstName">Contact No</label>
            <input type="text" class="form-control" name="contact_number" placeholder="" value="<?php echo htmlspecialchars($contact_number, ENT_QUOTES);  ?>"onkeypress="return isNumberKey(event)"  required>    
             <div class="invalid-feedback">
                    Valid Contact Number
                </div>      
           </div>

           <div class="col-md-4 mb-3">
                 <label for="firstName">Position</label>
                 <input type="text" class="form-control" name="position" placeholder="" value="<?php echo htmlspecialchars($position, ENT_QUOTES);  ?>" required>  
                 <div class="invalid-feedback">
                    Valid Position is required.
                    </div>  
              </div>

              <div class="col-md-4 mb-3">
              <label for="firstName">Picture</label>
              <input type="file" class="form-control" name="image">  

                 <div class="invalid-feedback">
                    Valid Photo is required.
                    </div>  
              </div>

              <input name="status" value="0" style="visibility: hidden;">
              <input name="access_level" value="Customer" style="visibility: hidden;">
           </div> <!--Row -->

           <h4 class="mb-3">Login Credentials</h4>
           <div class="row">
           <div class="col-md-4 mb-3">
                 <label for="firstName">Username</label>
                 <input type="text" class="form-control" name="email" placeholder="" value="<?php echo htmlspecialchars($email, ENT_QUOTES);  ?>" required>  
                 <div class="invalid-feedback">
                    Valid username is required.
                 </div>  
              </div>

              <div class="col-md-4 mb-3">
                 <label for="firstName">Password</label>
                 <input type="password" class="form-control" name="password" placeholder="" value="" required>  
                 <div class="invalid-feedback">
                    Valid Password is required.
                    </div>  
              </div>
             </div> <!-- ROW -->
 
           <h4 class="mb-3">Government ID's</h4>
           <div class="row">
           <div class="col-md-4 mb-3">
                 <label for="firstName">SSS No</label>
                 <input type="text" class="form-control" name="sss" onkeypress="return isNumberKey(event)" placeholder="" value="<?php echo htmlspecialchars($sss, ENT_QUOTES);  ?>">  
                  
              </div>
              <div class="col-md-4 mb-3">
                 <label for="firstName">PagIbig No</label>
                 <input type="text" class="form-control" name="pagibig" onkeypress="return isNumberKey(event)" placeholder="" value="<?php echo htmlspecialchars($pagibig, ENT_QUOTES);  ?>">  
                 
              </div>
              <div class="col-md-4 mb-3">
                 <label for="firstName">Tin No</label>
                 <input type="text" class="form-control" name="tin" onkeypress="return isNumberKey(event)" placeholder="" value="<?php echo htmlspecialchars($tin, ENT_QUOTES);  ?>">  
                 
              </div>

              <h4 class="mb-3">Access Level</h4>
           <div class="row">
           <div class="col-md-4 mb-3">
                 <label for="firstName">Status</label>
                 <select class="custom-select d-block w-100" name="status" id="status" onchange="GetSelectedValue()">
                 <option value="">Select...</option>
                      <option value="https://www.everbright.com.ph/headshot/EB-MsPatty.png">Active</option>
                      <option value="https://www.everbright.com.ph/headshot/EB-SirAlvin.png">Pending</option>
                 </select>  
                  
              </div>
              <div class="col-md-4 mb-3">
                 <label for="firstName">Access level</label>
                 <select class="custom-select d-block w-100" name="access-level" id="access-level">
                 <option value="">Select...</option>
                      <option value="Admin">Admin</option>
                      <option value="Agent">Agent</option>
                 </select>                
              </div>
           
       


       </div>
            <hr class="mb-4">
            <div class="text-right">
            <a href='/everbrightapp/admin/users.php'><button type="button" class="btn btn-outline-secondary">Cancel</button></a>
            <button type="submit" value='Save'  class="btn btn-primary">Update</button>
            <br />
            <br />
            </div>
            
</div><!--  Row -->
          
</form>
        
    </div> <!-- end .container -->
      
    <!-- <p id="image" style="visibility: hidden;"  name="image">url</p>      -->


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

$('#birthdate').datepicker({
            uiLibrary: 'bootstrap4',
            //format: 'yyyy-mm-dd'
        });

 function getDate(){
   var x = document.getElementById("birthdate").value;
   document.getElementById("deals_datex").innerHTML = x;
 }


    </script>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://everbright.com.ph/everbrightapp//libs/js/form-validation.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

   
  
</body>
</html>
