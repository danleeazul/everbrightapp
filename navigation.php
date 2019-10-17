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
    </ul>
    <?php
            // login and logout options will be here 
            // check if users / customer was logged in
            // if user was logged in, show "Edit Profile", "Orders" and "Logout" options
            if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['access_level']=='Customer'){
                ?>
                <ul class="nav navbar-nav navbar-right">
                    <li <?php echo $page_title=="Edit Profile" ? "class='active'" : ""; ?>>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            &nbsp;&nbsp;<?php echo $_SESSION['firstname']; ?>
                            &nbsp;&nbsp;<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="<?php echo $home_url; ?>logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
                <?php
                }
                
                // show login and register options here 
                // if user was not logged in, show the "login" and "register" options
                else{
                    ?>
                    <ul class="nav navbar-nav navbar-right">
                        <li <?php echo $page_title=="Login" ? "class='active'" : ""; ?>>
                            <a href="<?php echo $home_url; ?>login">
                                <span class="glyphicon glyphicon-log-in"></span> Log In
                            </a>
                        </li>
                    
                        <li <?php echo $page_title=="Register" ? "class='active'" : ""; ?>>
                            <a href="<?php echo $home_url; ?>register">
                                <span class="glyphicon glyphicon-check"></span> Register
                            </a>
                        </li>
                    </ul>
                    <?php
                    }
            ?>
  </div>
</nav>
