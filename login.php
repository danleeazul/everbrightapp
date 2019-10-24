<?php
// core configuration
include_once "config/core.php";


// set page title
$page_title = "Login";
 
// include login checker
$require_login=false;
include_once "login_checker.php";
 
// default to false
$access_denied=false;
// post code will be here
// if the login form was submitted
if($_POST){
    // email check will be here
    // include classes
include_once "config/database.php";
include_once "objects/user.php";
 
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
        header("Location: {$home_url}index.php?action=login_success");
    }
}
 
// if username does not exist or password is wrong
else{
    $access_denied=true;
}
}
 
// login form html will be here
// include page header HTML
include_once "layout_head.php";
 
echo "<div class='col-sm-6 col-md-4 col-md-offset-4'>";
 
    // alert messages will be here
    // get 'action' value in url parameter to display corresponding prompt messages
$action=isset($_GET['action']) ? $_GET['action'] : "";
 
// tell the user he is not yet logged in
if($action =='not_yet_logged_in'){
    echo "<div class='alert alert-danger margin-top-40' role='alert'>Please login.</div>";
}
 
// tell the user to login
else if($action=='please_login'){
    echo "<div class='alert alert-info'>
        <strong>Please login to access that page.</strong>
    </div>";
}
 
// tell the user email is verified
else if($action=='email_verified'){
    echo "<div class='alert alert-success'>
        <strong>Your email address have been validated.</strong>
    </div>";
}
 
// tell the user if access denied
if($access_denied){
    echo "<div class='alert alert-danger margin-top-40' role='alert'>
        Access Denied.<br /><br />
        Your username or password maybe incorrect
    </div>";
}
echo "</div>";
?>
 
 <div class='col-sm-6 col-md-4 col-md-offset-4'>

    <div class='account-wall'>
        <div id='my-tab-content' class='tab-content'>
           <div class='tab-pane active' id='login'>
           <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <input type='text' name='email' class='form-control' placeholder='Email' required autofocus />
                    <input type='password' name='password' class='form-control' placeholder='Password' required />
                    <button type="submit" value='Save' class="btn btn-primary">Submit</button>
            </form>
            </div>
       </div>
    </div>
 </div>

<?php 
// footer HTML and JavaScript codes
include_once "layout_foot.php";
?>