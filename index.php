<!DOCTYPE HTML>
<html>
<head>
<title>Everbright App</title>
      
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" href="form-validation.css">
      <script src="form-validation.js"></script>
</head>
<body>
 
    <!-- container -->
    <div class="container">
  
        <div class="page-header">
            <h1>Read Products</h1>
        </div>
     
        <!-- PHP code to read records will be here -->
        <?php
        // include database connection
        include 'config/database.php';
        
        // delete message prompt will be here
        
        // select all data
        $query = "SELECT listing_id, city, building, neighborhood FROM tbl_listings ORDER BY listing_id DESC";
        $stmt = $con->prepare($query);
        $stmt->execute();
        
        // this is how to get number of rows returned
        $num = $stmt->rowCount();
        
        // link to create record form
        echo "<a href='create.php' class='btn btn-primary m-b-1em'>Create New Product</a>";
        
        //check if more than 0 record found
        if($num>0){
        
            // data from database will be here
            echo "<table class='table table-hover table-responsive table-bordered'>";//start table
 
    //creating our table heading
            echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>City</th>";
                echo "<th>Neighborhood</th>";
                echo "<th>Building</th>";
                echo "<th>Action</th>";
            echo "</tr>";
            
            // table body will be here
            // retrieve our table contents
// fetch() is faster than fetchAll()
// http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    // extract row
    // this will make $row['firstname'] to
    // just $firstname only
    extract($row);
     
    // creating new table row per record
    echo "<tr>";
        echo "<td>{$listing_id}</td>";
        echo "<td>{$city}</td>";
        echo "<td>{$neighborhood}</td>";
        echo "<td>&#36;{$building}</td>";
        echo "<td>";
            // read one record 
            echo "<a href='read_one.php?id={$listing_id}' class='btn btn-info m-r-1em'>Read</a>";
             
            // we will use this links on next part of this post
            echo "<a href='update.php?id={$listing_id}' class='btn btn-primary m-r-1em'>Edit</a>";
 
            // we will use this links on next part of this post
            echo "<a href='#' onclick='delete_user({$listing_id});'  class='btn btn-danger'>Delete</a>";
        echo "</td>";
    echo "</tr>";
}
        
        // end table
        echo "</table>";
            
        }
        
        // if no records found
        else{
            echo "<div class='alert alert-danger'>No records found.</div>";
        }
        ?>
         
    </div> <!-- end .container -->
     
    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; Everbright Web App v0.6</p>
       
      </footer>
 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="form-validation.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

 
</body>
</html>