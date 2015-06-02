<?php
    session_start();
    error_reporting(0);
    
    include_once 'includes/escape.php';
?>

<html>
    <head>
        <meta charset="utf8">
       <link type="text/css" href="css/style.css" rel="stylesheet">
       <link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/demo.css">
      
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
            <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
            <script src="js/css-pop.js"></script>
            <script src="js/ajax.js"></script>
    </head>
    <body>
        <div class="container-fluid">
            
        <div class="jumbotron">
            <div class="logo">
            <?php include("includes/header.php"); ?>
            </div>
            <div class="menu-box">
            <div class="menu">
                <?php include("includes/menu_1.php"); ?>
            </div>
        </div>
        </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <?php

include_once'connection.php';

if (isset($_POST['login']))
{
   
    $username = $_POST['username'];
    $username = test_input($username);
    $password = $_POST['password'];
    $password = test_input($password);
    $date = date('Y-m-d H:i:s');
    
    $login = "SELECT id,fullname,username,password FROM members where username LIKE '$username' && password LIKE '$password'";
    $loginrun = mysql_query($login);
    $loginrows = mysql_num_rows($loginrun);
    if ($loginrows==1) {
        $loginarray = mysql_fetch_assoc($loginrun);
       
        $_SESSION['USERTYPE']= "2";
        $_SESSION['login']= "1";
        $_SESSION['FULLNAME']= $loginarray['fullname'];
        $_SESSION['userid']=$loginarray['id'];
        
        ?>
        <script type="text/javascript">
            window.location = "index.php";
        </script>
        <?php
    }
    else
        echo "Invalid username and/or password. Please try again.";
}
        ?>
       
        
                        <h1>Sign in and get your tasks done</h1><br>
                <form role="form" method="POST" action="" id="login">
    <div class="form-group">
        <label for="username">Username</label>
        <input class="form-control" name="username" required="required" id="username" placeholder="Enter Username" type="text"/>
    </div>
    <div class="form-group">
        <label for="pwd">Password</label>
        <input class="form-control" name="password" required="required" id="password" placeholder="Enter Password" type="password"/>
    </div>
    <input class="btn btn-success btn-lg" type="submit" name="login" value="Sign In"/>
</form>
                    </div>
        </div>
            </div>
        
                <div class="footer">
                    <?php include("includes/footer.php"); ?>
                </div>
        </div>
           
    </body>
</html>