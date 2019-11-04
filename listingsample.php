<!DOCTYPE HTML>
<html>
<head>
    <title>Everbright App</title>
      
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <link href="https://www.everbright.com.ph/everbrightapp//libs/css/form-validation.css" rel="stylesheet" type="text/css"/>


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>

    <!-- container -->
    <div class="container">


   <input type='text' name='listing_id' name='listing_id'  class='form-control' placeholder='Listing ID'>

    
    </div> <!-- end .container -->


<script>

$(document).ready(function()){
  $('#listing_id').keyup(function(){
    var txt = $(this).val();

    if(txt != ''){

    }

    else{
      $('#result').html('');
      $.ajax({
        url:"fetchsample.php",
        method:"post",
        data:{search:txt},
        dataType:"text"
        success:function(data)
        {
          $('#result').html(data);
        }
      })
    }

  });
}


</script>


    <script src="https://everbright.com.ph/everbrightapp//libs/js/form-validation.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>