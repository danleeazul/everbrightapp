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
    $deals_date=htmlspecialchars(strip_tags($_POST['deals_date']));

        // $deals_date = str_replace('/','-',$deals_date);
        // echo $deals_date;
        // $timestamp2 = strtotime($deals_date);
        // echo $deals_date;
        // $deals_date = date('Y-m-d', $timestamp2);
        // echo $deals_date;
        
        echo $deals_date;
        $deals_date = date('Y-m-d', strtotime($deals_date));
        echo $deals_date;

    try{
     
        // insert query
        $query = "INSERT INTO tbl_deals SET name=:name, building=:building, unit_no=:unit_no, type=:type, price=:price, deals_date=:deals_date";
 
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

        
        
         //$stmt->bindParam(':deals_date', $deals_date);
         
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
                    <select class="custom-select d-block w-100" name="name" id="nameimage" onchange="GetSelectedValue()" required>
                      <option value="">Select...</option>
                      <option value="https://www.everbright.com.ph/headshot/EB-Joana.png">Joana Marie Legaspi</option>
                      <option value="https://www.everbright.com.ph/headshot/EB-Aj.png">Aira Joy Lim</option> 
                      <option value="https://www.everbright.com.ph/headshot/EB-Nica.png">Nica Ginez</option>
                      <option value="https://www.everbright.com.ph/headshot/EB-Demi.png">Demi Dela Cruz</option>
                      <option value="https://www.everbright.com.ph/headshot/EB-Bry.png">Bryan Sam Asis</option>
                      <option value="https://www.everbright.com.ph/headshot/EB-Renz.png">Renz Ocampo</option>
                    </select>           
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

          <div class="col-md-4 mb-3">
             <label for="firstName">Date Contract Signed</label>
             <input id="deals_dates" name="deals_date" width="auto" onchange="getDate()" required />
          </div>

       </div>
        <p id="deals_datex"></p> 



         
            <hr class="mb-4">
            <div class="text-right">
            <a href='create.php'><button type="button" href='create.php' class="btn btn-outline-secondary">Cancel</button></a>
            <button type="submit" value='Save'  class="btn btn-primary">Submit</button>
            
            </div>
            

          
</form>
        
    </div> <!-- end .container -->
      
    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; Everbright Web App v0.00</p>
       
      </footer>

      <p id="image" style="visibility: hidden;"  name="image">url</p>     

 <!-- Optional JavaScript -->


 <script>

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
