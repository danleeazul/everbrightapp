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
 

// login form html will be here
// include page header HTML
include_once "layout_head.php";
 
echo "<div class='col-sm-6 col-md-4 col-md-offset-4'>";
 
    // alert messages will be here
 
    // actual HTML login form
 
echo "</div>";

echo "<form class='form-signin' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='post'>";
echo " <div class='text-center mb-4'>";
echo "   <img class='mb-4' src='{{ site.baseurl }}/docs/{{ site.docs_version }}/assets/brand/bootstrap-solid.svg' alt='' width='72' height='72'>";
echo "    <h1 class='h3 mb-3 font-weight-normal'>Floating labels</h1>";
echo "   <p>Build form controls with floating labels via the <code>:placeholder-shown</code> pseudo-element. <a href='https://caniuse.com/#feat=css-placeholder-shown'>Works in latest Chrome, Safari, and Firefox.</a></p>";
    echo " </div>";

    echo "  <div class='form-label-group'>";
    echo " <input type='email' id='inputEmail' class='form-control' placeholder='Email address' required autofocus>";
    echo "  <label for='inputEmail'>Email address</label>";
    echo " </div>";

    echo " <div class='form-label-group'>";
    echo " <input type='password' id='inputPassword' class='form-control' placeholder='Password' required>";
    echo "  <label for='inputPassword'>Password</label>";
    echo " </div>";

  echo " <div class='checkbox mb-3'>";
  echo "   <label>";
    echo "     <input type='checkbox' value='remember-me'> Remember me </label>";
    echo " </div>";
  echo " <button class='btn btn-lg btn-primary btn-block' type='submit'>Sign in</button>";
  echo " <p class='mt-5 mb-3 text-muted text-center'>&copy; 2017-{{ site.time | date: '%Y' }}</p>";
  echo "</form>";
 
// footer HTML and JavaScript codes
include_once "layout_foot.php";
?>