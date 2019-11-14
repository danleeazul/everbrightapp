<?php
// login checker for 'customer' access level
 
// if $require_login was set and value is 'true'
if(isset($require_login) && $require_login==true){
    // if user not yet logged in, redirect to login page
    if(!isset($_SESSION['access_level'])){
        header("Location: {$home_url}login.php?action=please_login");
    }
}

 
else{
    // no problem, stay on current page
}
?>