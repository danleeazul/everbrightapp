<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?php echo $home_url; ?>">Everbright</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo $home_url; ?>">Home <span class="sr-only">(current)</span></a>
      </li>
    <?php
            // login and logout options will be here 
            // check if users / customer was logged in
            // if user was logged in, show "Edit Profile", "Orders" and "Logout" options
            if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['access_level']=='Customer'){
                ?>
                
                     <li class="nav-item">  
                           <?php echo $_SESSION['firstname']; ?>
                     </li>   

                     <li class="nav-item">
                                <a href="<?php echo $home_url; ?>logout.php">Logout</a>
                     </li>
                        
                    
                
                <?php
                }
                
                // show login and register options here 
                // if user was not logged in, show the "login" and "register" options
                else{
                    ?>
                    
                    <li class="nav-item">
                            <a href="<?php echo $home_url; ?>login">
                                <span class="glyphicon glyphicon-log-in"></span> Log In
                            </a>
                        </li>
                    
                        <li class="nav-item">
                            <a href="<?php echo $home_url; ?>register">
                                <span class="glyphicon glyphicon-check"></span> Register
                            </a>
                        </li>
                
                    <?php
                    }
            ?>
  </div>
</nav>
