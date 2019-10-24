<!DOCTYPE HTML>
<html>
<head>
<title>Everbright App</title>
      
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     
      <link href="https://www.everbright.com.ph/everbrightapp/form-validation.css" rel="stylesheet" type="text/css"/>
  
  
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <script src="form-validation.js"></script>
      <link rel="stylesheet" src="form-validation.css" type="text/css">
          
</head>
<body>
  
    <!-- container -->
    <div class="container">
   
        <div class="page-header">
            <h1>Add new signed deals</h1>
        </div>
      
        <!-- PHP insert code will be here -->
        <?php

include_once "core.php";
     
// include login checker
$require_login=false;
include_once "login_checker.php";
$access_denied=false;

    if($_POST){
 
    

    try{
        include_once "database.php";
        include_once "user.php";

        // get database connection
        $database = new Database();
        $db = $database->getConnection();
        
        // initialize objects
        $user = new User($db);
        
        // check if email and password are in the database
        $user->email=$_POST['email'];
        // check if email exists, also get user details using this emailExists() method
        $email_exists = $user->emailExists();
 
            // login validation will be here
            // validate login
            if ($email_exists && password_verify($_POST['password'], $user->password) && $user->status==1){
            
                // if it is, set the session value to true
                $_SESSION['logged_in'] = true;
                $_SESSION['user_id'] = $user->id;
                $_SESSION['access_level'] = $user->access_level;
                $_SESSION['firstname'] = htmlspecialchars($user->firstname, ENT_QUOTES, 'UTF-8') ;
                $_SESSION['lastname'] = $user->lastname;
            
                // if access level is 'Admin', redirect to admin section
                if($user->access_level=='Admin'){
                    header("Location: {$home_url}admin/index.php?action=login_success");
                }
            
                // else, redirect only to 'Customer' section
                else{
                    // header("Location: {$home_url}index.php?action=login_success");
                    echo "WORKING";
                }
            }
 
            // if username does not exist or password is wrong
            else{
                $access_denied=true;
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
                   <label for="firstName">Email</label>
                   <input type="text" class="form-control" name="email" placeholder="" value="" required>  
                               
               </div>
 
              <div class="col-md-4 mb-3">
                 <label for="firstName">Password</label>
                 <input type="password" class="form-control" name="password" placeholder="" value="" required>  
              </div>
 
       </div>

            <hr class="mb-4">
            <div class="text-right">
            <button type="submit" value='Save' class="btn btn-primary">Submit</button>
            
            </div>
            
          
</form>
        
    </div> <!-- end .container -->
      
    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; Everbright Web App v0.00</p>
       
      </footer>
 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://everbright.com.ph/everbrightapp/form-validation.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  
</body>
</html>
