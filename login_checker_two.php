<?php
// login checker for 'customer' access level
 
// if $require_login was set and value is 'true'
    // if user not yet logged in, redirect to login page

    if($_SESSION['access_level']!="Admin"){
        if($_SESSION['access_level']!="Officer"){
            if($_SESSION['access_level']!="Customer"){
                header("Location: {$home_url}login.php?action=not_admin");
            }
        }
    }

else{
    // no problem, stay on current page
}
?>