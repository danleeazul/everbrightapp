<?php
// login checker for 'customer' access level

if(isset($require_login) && $require_login==true){
    // if user not yet logged in, redirect to login page
    if($_SESSION['access_level']=="Officer") {
        header("Location: {$home_url}admin/dashboard.php");
    }
    elseif ($_SESSION['access_level']=="Admin") {
        header("Location: {$home_url}admin/dashboard.php");
    }
    else {
        header("Location: {$home_url}login.php?action=please_login");
    }
}
 
// if access level was not 'Admin', redirect him to login page
elseif(isset($_SESSION['access_level']) && $_SESSION['access_level']=="Admin"){
    header("Location: {$home_url}admin/dashboard.php");
}

elseif(isset($_SESSION['access_level']) && $_SESSION['access_level']=="Officer"){
    header("Location: {$home_url}admin/dashboard.php");
}
 
// if $require_login was set and value is 'true'

 
// if it was the 'login' or 'register' or 'sign up' page but the customer was already logged in
else if(isset($page_title) && ($page_title=="Login" || $page_title=="Sign Up")){
    // if user not yet logged in, redirect to login page
    if(isset($_SESSION['access_level']) && $_SESSION['access_level']=="Customer"){
        header("Location: {$home_url}dashboard.php?action=already_logged_in");
    }
}
 
else{
    // no problem, stay on current page
}
?>