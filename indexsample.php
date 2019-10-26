<?php
// core configuration
include_once "config/core.php";
 
// set page title
$page_title="Everbright App";
 
// include login checker
// $require_login=true;
// include_once "login_checker.php";
 
// include page header HTML
include_once 'header.php';

echo "<div class='mdc-drawer-app-content'>";



    //       // to prevent undefined index notice
    // $action = isset($_GET['action']) ? $_GET['action'] : "";
 
    // // if login was successful
    // if($action=='login_success'){
    //     echo "<div class='alert alert-info'>";
    //         echo "<strong>Hi " . $_SESSION['firstname'] . ", welcome back!</strong>";
    //     echo "</div>";
    // }


    echo "<header class='mdc-top-app-bar'>";
    echo "  <div class='mdc-top-app-bar__row'>";
                
    echo "  <section class='mdc-top-app-bar__section mdc-top-app-bar__section--align-start'>";

    echo "   <a type='button' onclick='openNav()' id='sidebarCollapse' class='demo-menu material-icons mdc-top-app-bar__navigation-icon'>menu</a>";
    echo "   <h3>Dashboard</h3>";
    echo "  </section>";
    echo "<section class='mdc-top-app-bar__section mdc-top-app-bar__section--align-end' role='toolbar'>";
    echo " <a class='material-icons mdc-top-app-bar__action-item' aria-label='Search' alt='Search'>search</a>";
    echo " </section>";
    echo " </div>";
    echo " </header>";
      
    echo "<main onclick='closeNav()' class='main-content'>";
    echo " <div class='mdc-top-app-bar--fixed-adjust'>";


    include 'layout_foot.php';
    ?>
            




