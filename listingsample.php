<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Webslesson Tutorial</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://www.everbright.com.ph/everbrightapp/libs/css/style.css">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

 </head>
 <body class="mdc-typography">

 <aside  class='mdc-drawer'>
                      <div id='mySidenav' class='sidenav'>
                      <div>
                    </div>
                    <div style='height: 90%;' class='mdc-drawer__content'>
                    
                      <nav class='mdc-list'>
                             

                             <a id='navbutton' class='mdc-list-item'  href='indexsample.php' aria-selected='true'>
                              <i class='material-icons mdc-list-item__graphic' aria-hidden='true'>dashboard</i>
                          <span class='mdc-list-item__text'>Dashboard</span>
                        </a>
                        <a id='navbutton' class='mdc-list-item mdc-list-item--activated' >
                          <i class='material-icons mdc-list-item__graphic' aria-hidden='true'>format_list_bulleted</i>
                          <span class='mdc-list-item__text'>Listing</span>
                        </a>
                        <a id='navbutton' class='mdc-list-item' href='#' >
                          <i class='material-icons mdc-list-item__graphic' aria-hidden='true'>person</i>
                          <span class='mdc-list-item__text'>Accounts</span>
                        </a>
                        <hr class='mb-4'>                 
                      </nav>

                    </div>
                    <div class='textbottom'> 
          <table style='border: none; width: 100%;'>                       
                      <tr>
                        <td><p style='padding-left:20px;' class='text-muted'>© Everbright v0.0</p></td>
                        <td style='padding-right:30px; padding-bottom:20px' class='text-right'><a href='logout.php' class='text-decoration-none'>Log out</a></td>
                      </tr>   
                  </table>
        </div>
                     </div>
                         
                  </aside>


  <div class="container">
   <br />
   <h2 >Ajax Live Data Search using Jquery PHP MySql</h2><br />
   <div class="form-group">

    <div class="input-group">
     <span class="input-group-addon">Search</span>
     <input type="text" name="search_text" id="search_text" placeholder="Search by Customer Details" class="form-control" />
    </div>

   </div>

   <br />

   <div id="result"></div>

  </div>
 </body>
</html>


<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
    $.ajax({
              url:"fetchsample.php",
              method:"POST",
              data:{query:query},
              success:function(data)
              {
              $('#result').html(data);
              }
          });
 }

 $('#search_text').keyup(function(){
    var search = $(this).val();
    if(search != ''){
    load_data(search);
    }
    else{
    load_data();
    }
 });
 
});
</script>