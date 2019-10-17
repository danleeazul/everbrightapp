<?php
      // core configuration
      include_once "core.php";
      
      // set page title
      $page_title = "Login";
      
      // include login checker
      $require_login=false;
      include_once "login_checker.php";
      
      // default to false
      $access_denied=false;
      
      // post code will be here
      
      include_once "layout_head.php";

      // if the login form was submitted
      if($_POST){
            // email check will be here
            // include classes
          include_once "database.php";
          include_once "user.php";
          
          // get database connection
          $database = new Database();
          $db = $database->getConnection();
          
          // initialize objects
          $user = new User($db);
          
          // check if email and password are in the database
          $user->email=$_POST['email'];
          
          // check if email exists, also get user details using this emailExists() method
          $email_exists = $user->emailExists();
          
          // login validation will be here

            // validate login
        if ($email_exists && password_verify($_POST['password'], $user->password) && $user->status==1){
          // if it is, set the session value to true
          $_SESSION['logged_in'] = true;
          $_SESSION['user_id'] = $user->id;
          $_SESSION['access_level'] = $user->access_level;
          $_SESSION['firstname'] = htmlspecialchars($user->firstname, ENT_QUOTES, 'UTF-8') ;
          $_SESSION['lastname'] = $user->lastname;

          // if access level is 'Admin', redirect to admin section
          if($user->access_level=='Admin'){
              header("Location: {$home_url}admin/index.php?action=login_success");
          }//IF

          // else, redirect only to 'Customer' section
          else{
              header("Location: https://www.everbright.com.ph/everbrightapp/index.php?action=login_success");
          }//ELSE
      } //IF

        // if username does not exist or password is wrong
        else{
          $access_denied=true;
          echo "<div class='alert alert-danger margin-top-40' role='alert'>
                        Username not found.
                    </div>";
        }

  }

                echo "<form class='form-signin' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='post'>";
                echo "<img class='mb-4' src='{{ site.baseurl }}/docs/{{ site.docs_version }}/assets/brand/bootstrap-solid.svg' alt='' width='72' height='72'>";
                echo "<h1 class='h3 mb-3 font-weight-normal'>Please sign in</h1>";
                echo "<label for='inputEmail' class='sr-only'>Email address</label>";
                echo "<input type='email' name='email' id='inputEmail' class='form-control' placeholder='Email address' required autofocus>";
                echo "<label for='inputPassword' class='sr-only'>Password</label>";
                echo "<input type='password' name='password' id='inputPassword' class='form-control' placeholder='Password' required>";
                echo "<div class='checkbox mb-3'>";
                echo "<label><input type='checkbox' value='remember-me'> Remember me</label>";
                echo "</div>";
                //echo "<button class='btn btn-lg btn-primary btn-block' type='submit'>Sign in</button>";
                echo "<input type='submit' class='btn btn-lg btn-primary btn-block' value='Log In' />";
              

                // alert messages will be here
                // get 'action' value in url parameter to display corresponding prompt messages
                $action=isset($_GET['action']) ? $_GET['action'] : "";
                
                // tell the user he is not yet logged in
                if($action =='not_yet_logged_in'){
                    echo "<div class='alert alert-danger margin-top-40' role='alert'>Please login.</div>";
                }
            
                // tell the user to login
                else if($action=='please_login'){
                    echo "<div class='alert alert-info'>
                        <strong>Please login.</strong>
                    </div>";
                }
            
                // tell the user email is verified
                else if($action=='email_verified'){
                    echo "<div class='alert alert-success'>
                        <strong>Your email address have been validated.</strong>
                    </div>";
                }
            
                // tell the user if access denied
                if($access_denied){
                    echo "<div class='alert alert-danger margin-top-40' role='alert'>
                        Incorrect username or password.
                    </div>";
                }
                
                // footer HTML and JavaScript codes
                include_once "layout_footer.php";


                echo "</form>";
                      
                
?>
