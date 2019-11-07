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

include_once 'config/database.php';
$query = 'SELECT * FROM tbl_deals ORDER BY deals_id DESC';
$stmt = $con->prepare($query);
$stmt->execute();

// this is how to get number of rows returned
$num = $stmt->rowCount();


//  DASHBOARD
echo "<aside  class='mdc-drawer'>";
echo "                      <div id='mySidenav' class='sidenav'>";
echo "                      <div>";
echo "                    </div>";
echo "                    <div style='height: 90%;' class='mdc-drawer__content'>";
                    
echo "                      <nav class='mdc-list'>";
                             

echo "                             <a id='navbutton' class='mdc-list-item'  href='dashboard.php' aria-selected='true'>";
echo "                              <i class='material-icons mdc-list-item__graphic' aria-hidden='true'>dashboard</i>";
echo "                          <span class='mdc-list-item__text'>Dashboard</span>";
echo "                        </a>";
echo "                        <a id='navbutton' class='mdc-list-item mdc-list-item--activated' >";
echo "                          <i class='material-icons mdc-list-item__graphic' aria-hidden='true'>format_list_bulleted</i>";
echo "                          <span class='mdc-list-item__text'>Listing</span>";
echo "                        </a>";
echo "                        <a id='navbutton' class='mdc-list-item' href='login.php' >";
echo "                          <i class='material-icons mdc-list-item__graphic' aria-hidden='true'>exit_to_app</i>";
echo "                          <span class='mdc-list-item__text'>Logout</span>";
echo "                        </a>";  
echo "                        <hr class='mb-4'>";                 
echo "                      </nav>";

// echo "                    </div>";
// echo "                    <div class='textbottom'> ";
// echo "          <table style='border: none; width: 100%;'>                       ";
// echo "                      <tr>";
// echo "                        <td><p style='padding-left:20px;' class='text-muted'>© Everbright v0.0</p></td>";
// echo "                        <td style='padding-right:30px; padding-bottom:20px' class='text-right'><a href='logout.php' class='text-decoration-none'>Log out</a></td>";
// echo "                      </tr>   ";
// echo "                  </table>";
// echo "        </div>";
// echo "                     </div>";
                         
echo "                  </aside>";
       

        
//  HEADER
    echo "<div class='mdc-drawer-app-content'>";
    echo "<header class='mdc-top-app-bar'>";
    echo "  <div class='mdc-top-app-bar__row'>";
    echo "  <section class='mdc-top-app-bar__section mdc-top-app-bar__section--align-start'>";
    echo "   <a type='button' onclick='openNav()' id='sidebarCollapse' class='demo-menu material-icons mdc-top-app-bar__navigation-icon'>menu</a>";
    echo "   <h3 style='margin-left: 15px;'>Listing</h3>";
    echo "  </section>";
    echo " </div>";
    echo " </header>";
// END HEADER

    echo "<main onclick='closeNav()' style='height: 93%;' class='main-content'>";
    echo " <div class='mdc-top-app-bar--fixed-adjust'>";


//  INSERT HERE THE CONTENT
   
echo "<div data-type='AwesomeTableView' data-viewID='-LLD1dgOXU8YdFoS1qxE'></div>";

//  ENDING CONTENT

    include 'footer.php';
    ?>
