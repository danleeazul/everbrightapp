<?php
// login checker for 'admin' access level
 
 if($_SESSION['access_level']!="Admin"){
    header("Location: {$home_url}login.php?action=not_admin");
}

elseif($_SESSION['access_level']!="Officer"){
    header("Location: {$home_url}login.php?action=not_officer");
}

else if(isset($require_login) && $require_login==true){
    // if user not yet logged in, redirect to login page
    if(!isset($_SESSION['access_level'])){
        header("Location: {$home_url}login.php?action=please_login");
    }
}
 
else{
    // no problem, stay on current page
    header("Location: {$home_url}admin/dashboard.php");

}
?>

