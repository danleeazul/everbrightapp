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
    echo "   <h3 style='margin-left: 15px;'>Dashboard</h3>";
    echo "  </section>";
    echo "<section class='mdc-top-app-bar__section mdc-top-app-bar__section--align-end' role='toolbar'>";
    echo " <a class='material-icons mdc-top-app-bar__action-item' aria-label='Search' alt='Search'>search</a>";
    echo " </section>";
    echo " </div>";
    echo " </header>";
      
    echo "<main onclick='closeNav()' class='main-content'>";
    echo " <div class='mdc-top-app-bar--fixed-adjust'>";

    if($num>0){



        echo " <div class='row col p-3'>";
        echo "  <div class='container'>";
        echo "      <div class='row'>";
        echo "          <div class='col-md-5 order-md-2 mb-4'>";
        echo "            <h4 class='d-flex justify-content-between align-items-center mb-3'>";
        echo "              <span class='text-muted'>Closed Deals</span>";
        echo "              <span class='badge badge-secondary badge-pill'>{$num}</span>";
        echo "            </h4>";
       echo "            <ul class='list-group mb-3'>";


        // table body will be here
        // retrieve our table contents
    // fetch() is faster than fetchAll()
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['firstname'] to
        // just $firstname only
        extract($row);
         
        // creating new table row per record

        echo "              <li class='list-group-item d-flex justify-content-between lh-condensed'>";
        echo "                      <table style='border: none;'>";
        echo "                     <tr>";
        echo "                      <td>";
        echo "                  <img  src='{$name}' width='50' height='50'>";
        echo "                    </td>";
        echo "                     <td style='width: 400px; padding-left: 10px; padding-right: 10px;'>";

        echo "                  <h6 class='my-0'>{$building} - {$unit_no}</h6>";
        echo "                  <small>{$type}</small>";
        echo "                  <br />";
        echo "                  <small class='text-muted'>{$deals_date}</small>";
        echo "                        </td>";
        echo "                        <td style='width: 100px;'>";
            
        echo "                <span class='text-muted'>₱{$price}</span>";
        echo "                        </td>";
        echo "                        </tr>";
        echo "                    </table>";
        echo "              </li>";
                            
        
    }
     
    
    }
              
           echo "            </ul>";
                  
        echo "          </div>";   
              
    echo "        <div class='col-md-7 order-md-1'>";
    echo "            <h4 class='d-flex justify-content-between align-items-center mb-3'>";
    echo "                    <span class='text-muted'>Requirements</span>"; 
    echo "                   <button type='submit' value='Save' class='btn btn-primary'>Add</button>"; 
    echo "            </h4>";

    echo "            <ul class='list-group mb-3'>";


    

    echo "              <li class='list-group-item d-flex justify-content-between lh-condensed'>";
    echo "                  <img  src='https://www.everbright.com.ph/headshot/EB-Nica.png' width='50' height='50'>";
    echo "                <div class='requirementsleft'>";
    echo "                  <h6 class='my-0'>Legaspi Village</h6>";
    echo "                  <small>Makati | Sale</small>";
    echo "                  <br />";
    echo "                  <small class='text-muted'>1BR | Furnished | Ok for Bank Financing</small>";
    echo "                </div>";
    echo "                <span class='text-muted'>₱8,000,000</span>";

    echo "              </li>";
                      
    echo "            </ul>";
 
    echo "        </div>";



    include 'footer.php';
    ?>
            




