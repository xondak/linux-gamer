<?php
    ob_start();
    session_start();   
?>

<?
   // error_reporting(E_ALL);
   // ini_set("display_errors", 1);
?>
<div id="new" class="content securestuff">
    <div class="container">
        <div class="center">
            <h2>Enter Username and Password</h2> 
            <div class = "container form-signin">
                
                <?php
                $msg = '';
                
                if (isset($_POST['login']) && !empty($_POST['username']) 
                    && !empty($_POST['password'])) {
                    
                    $pwHash = '$2y$10$8zmBhMRxs8pZ8Sgf4loqJ.YT8Y8tbQW7yIMJQnJZH8xwAY9hqNQhS';
                    
                    if ($_POST['username'] == 'linuxgamer' && 
                        password_verify($_POST['password'], $pwHash)) {
                        $_SESSION['valid'] = true;
                        $_SESSION['timeout'] = time();
                        $_SESSION['username'] = 'linuxgamer';
                        $_SESSION['sessionvar'] = 'auth';
                        
                        $URL="/compose";
                        header ("Location: $URL"); 
                    }else {
                        $msg = 'Wrong username or password';
                    }
                }
                ?>
            </div> <!-- /container -->
            <form class = "form-signin" role = "form" 
            action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            ?>" method = "post">
            <h4 class = "form-signin-heading"><?php echo $msg; ?></h4>
            <div class="item">
            <input type = "text" class = "form-control" 
                name = "username" placeholder = "Username" 
                required autofocus>
            </div>
            <div class="item">
            <input type = "password" class = "form-control"
                name = "password" placeholder = "Password" required>
            </div>
            <button class = "btn btn-lg btn-primary btn-block form-button" type = "submit" 
                name = "login">Login</button>
            </form>
            <p>Click here to clean <a href = "logout.php" tite = "Logout">Session.</a></p>
        </div>
    </div>
</div>