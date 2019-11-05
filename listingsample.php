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
 <body>
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