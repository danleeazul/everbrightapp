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
                             

echo "                             <a id='navbutton' class='mdc-list-item'  href='indexsample.php' aria-selected='true'>";
echo "                              <i class='material-icons mdc-list-item__graphic' aria-hidden='true'>dashboard</i>";
echo "                          <span class='mdc-list-item__text'>Dashboard</span>";
echo "                        </a>";
echo "                        <a id='navbutton' class='mdc-list-item mdc-list-item--activated' >";
echo "                          <i class='material-icons mdc-list-item__graphic' aria-hidden='true'>format_list_bulleted</i>";
echo "                          <span class='mdc-list-item__text'>Listing</span>";
echo "                        </a>";
echo "                        <a id='navbutton' class='mdc-list-item' href='#' >";
echo "                          <i class='material-icons mdc-list-item__graphic' aria-hidden='true'>person</i>";
echo "                          <span class='mdc-list-item__text'>Accounts</span>";
echo "                        </a>";
echo "                        <hr class='mb-4'>";                 
echo "                      </nav>";

echo "                    </div>";
echo "                    <div class='textbottom'> ";
echo "          <table style='border: none; width: 100%;'>                       ";
echo "                      <tr>";
echo "                        <td><p style='padding-left:20px;' class='text-muted'>© Everbright v0.0</p></td>";
echo "                        <td style='padding-right:30px; padding-bottom:20px' class='text-right'><a href='logout.php' class='text-decoration-none'>Log out</a></td>";
echo "                      </tr>   ";
echo "                  </table>";
echo "        </div>";
echo "                     </div>";
                         
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

    echo " <div class='row col p-3'>";
    echo "  <div class='container'>";
    echo "      <div class='row'>";
    echo "          <div class='col-md-5 order-md-2 mb-4'>";
    echo "            <h4 class='d-flex justify-content-between align-items-center mb-3'>";
    echo "              <span class='text-muted'>Filter</span>";
    echo "            </h4>";
   echo "            <ul class='list-group mb-3'>";
   echo "       <li class='list-group-item d-flex justify-content-between lh-condensed'>";
   echo "           <div>";
   echo "            <label for='firstName'>Listed By</label>";
   echo "           <input type='text' class='form-control' id='listedby' placeholder='' value=''>  ";
   echo "                <h6 class='my-0'>Product name</h6>";
   echo "               <small class='text-muted'>Brief description</small>";
   echo "           </div>";
   echo "               <span class='text-muted'>$12</span>";
   echo "       </li>";
                        
       echo "            </ul>";   
    echo "          </div>";   


          
echo "        <div class='col-md-7 order-md-1'>";
echo "            <h4 class='d-flex justify-content-between align-items-center mb-3'>";
echo "                    <span class='text-muted'>Requirements</span>"; 
echo "           <a href='create_req.php'><button type='button' href='create_req.php' class='btn btn-primary btn-sm'>Add</button></a>"; 
echo "            </h4>";


echo "            <ul class='list-group mb-3'>";

$querya = 'SELECT * FROM tbl_requirements ORDER BY requirements_id DESC';
$stmta = $con->prepare($querya);
$stmta->execute();

// this is how to get number of rows returned
$numa = $stmta->rowCount();

if($numa>0){
    while ($rowa = $stmta->fetch(PDO::FETCH_ASSOC)){
    
        extract($rowa);
       
       

echo "              <li class='list-group-item d-flex justify-content-between lh-condensed'>";
// echo "                  <img  src='{$name}' width='50' height='50'>";
// echo "                <div class='requirementsleft'>";
// echo "                  <h6 class='my-0'>{$building}</h6>";
// echo "                  <small>{$location} | {$type}</small>";
// echo "                  <br />";
// echo "                  <small class='text-muted'>{$requirements}</small>";
// echo "                </div>";
// echo "                <span class='text-muted'>{$price}</span>";

echo "  <table style='border: none;'>";
echo "                     <tr>";
echo "                      <td>";
echo "                  <img  src='{$name}' width='50' height='50'>";
echo "                    </td>";
echo "                     <td style='width: 800px; padding-left: 10px; padding-right: 10px;'>";
echo "                  <h6 class='my-0 card-title'>{$building}</h6>";
echo "                  <small>{$location} | {$type}</small>";
echo "                  <br />";
echo "                  <p class='card-text cardtextmin'>{$requirements}</p>";
echo "                        </td>";
echo "                        <td style='width: 100px;'>";
    
echo "                <span class='text-muted'>{$price}</span>";
echo "                        </td>";
echo "                        </tr>";
echo "                    </table>";

echo "              </li>";

    }//while
}//IF



                  
echo "            </ul>";

echo "        </div>";




//  ENDING CONTENT

    include 'footer.php';
    ?>