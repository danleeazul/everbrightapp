<!DOCTYPE HTML>
<html>
<head>
<title>Everbright App</title>
      
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     
      <link href="https://www.everbright.com.ph/everbrightapp/libs/css/form-validation.css" rel="stylesheet" type="text/css"/>
  
  
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

          
</head>
<body>
  
    <!-- container -->
    <div class="container">
   
        <div class="page-header">
            <h1>Add new signed deals</h1>
        </div>
      
        <!-- PHP insert code will be here -->
        <?php
if($_POST){
 
    // include database connection
    include 'database.php';
 
    try{
     
        // insert query
        $query = "INSERT INTO tbl_deals SET name=:name, building=:building, unit_no=:unit_no, type=:type, price=:price, date=:date";
 
        // prepare query for execution
        $stmt = $con->prepare($query);
 
        // posted values
        $name=htmlspecialchars(strip_tags($_POST['name']));
        $building=htmlspecialchars(strip_tags($_POST['building']));
        $unit_no=htmlspecialchars(strip_tags($_POST['unit_no']));
        $type=htmlspecialchars(strip_tags($_POST['type']));
        $price=htmlspecialchars(strip_tags($_POST['price']));
        $date=htmlspecialchars(strip_tags($_POST['date']));

 
        // bind the parameters
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':building', $building);
        $stmt->bindParam(':unit_no', $unit_no);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':price', $price);

        // specify when this record was inserted to the database
        $created=date('Y-m-d H:i:s');
        $stmt->bindParam(':created', $created);
         
         
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
               <label for="lastName">Name</label>
                    <select class="custom-select d-block w-100" name="name" onchange="GetSelectedValue()" required>
                      <option value="">Select...</option>
                      <option value="https://www.everbright.com.ph/headshot/EB-Joana.png">Joana Marie Legaspo</option>
                      <option value="https://www.everbright.com.ph/headshot/EB-Aj.png">Aira Joy Lim</option> 
                      <option value="https://www.everbright.com.ph/headshot/EB-Nica.png">Nica Ginez</option>
                      <option value="https://www.everbright.com.ph/headshot/EB-Demi.png">Demi Dela Cruz</option>
                      <option value="https://www.everbright.com.ph/headshot/EB-Bry.png">Bryan Sam Asis</option>
                      <option value="https://www.everbright.com.ph/headshot/EB-Renz.png">Renz Ocampo</option>
                    </select>           
                    <p id="nameimage">as</p>     
               </div>
 
              <div class="col-md-4 mb-3">
                 <label for="firstName">Building</label>
                 <input type="text" class="form-control" name="building" placeholder="" value="" required>  
              </div>
 
             <div class="col-md-4 mb-3">
               <label for="firstName">Unit No</label>
               <input type="text" class="form-control" name="unit_no" placeholder="" value="" required>      
            </div>
 
            <div class="col-md-4 mb-3">
                <label for="lastName">Type</label>
                    <select class="custom-select d-block w-100" name="type" required>
                      <option value="">Select...</option>
                      <option value="Sale">Sale</option> 
                      <option value="Rent">Rent</option>
                    </select>            
           </div>
 
          <div class="col-md-4 mb-3">
             <label for="firstName">Price</label>
             <input type="text" class="form-control" name="price" placeholder="Php" value="" required>           
          </div>
       </div>



         
            <hr class="mb-4">
            <div class="text-right">
            <a href='create.php'><button type="button" href='create.php' class="btn btn-outline-secondary">Cancel</button></a>
            <button type="submit" value='Save' class="btn btn-primary">Submit</button>
            
            </div>
            
          
</form>
        
    </div> <!-- end .container -->
      
    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; Everbright Web App v0.00</p>
       
      </footer>
 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://everbright.com.ph/everbrightapp//libs/js/form-validation.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script>
 function GetSelectedValue(){

(function () {
'use strict'

window.addEventListener('load', function () {
  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.getElementsByClassName('needs-validation')

  // Loop over them and prevent submission
  Array.prototype.filter.call(forms, function (form) {
    form.addEventListener('submit', function (event) {
      if (form.checkValidity() === false) {
        event.preventDefault()
        event.stopPropagation()
      }
      form.classList.add('was-validated')
    }, false)
  })
}, false)
}())

  var e = document.getElementById("name");
  var result = e.options[e.selectedIndex].value;

  var unitcode = result



 document.getElementById("nameimage").innerHTML = unitcode;
}
    </script>
  
</body>
</html>
