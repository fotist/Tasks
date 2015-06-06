<?php
    session_start();
    error_reporting(0);
    
    include_once 'includes/escape.php';
?>
<html>
<head>
    <title>Register - Tasks</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
                    <h2>Create an account in just a few seconds.</h2><br><br>
                    <?php

include_once'connection.php';

if (isset($_POST['register']))
{
    $firstname = $_POST['firstname'];
    $firstname = test_input($firstname);
    $lastname = $_POST['lastname'];
    $lastname = test_input($lastname);
    $fullname = $firstname." ".$lastname;
    $reg = "/^.+(@)[a-zA-Z]+(.)[a-zA-Z]+$/";
    if (preg_match($reg, $_POST['email']))
            $email = $_POST['email'];
    else
        die("Please insert a valid email. i.e. tasks@tasks.com");
    
    $username = $_POST['username'];
    $username = test_input($username);
    
    $usercheck = mysql_query("SELECT username FROM members where username LIKE '$username'");
    $usercheckrows = mysql_num_rows($usercheck);
    
    if ($usercheckrows == 1)
    {
            die("<h2>There is already a member with the submited username.</h2>");
    }
    $password = $_POST['password'];
    $password = test_input($password);
    $date = date('Y-m-d H:i:s');
    
    $register = "INSERT INTO members (id,fullname, email, username, password, register_date) "
            . "values ('','$fullname', '$email', '$username', '$password', '$date')";
    $registerrun = mysql_query($register);
    if ($registerrun) {
        echo "Your account has been created. You can sign in with your username and password.";
        
        ?>
       
        <?php
        }
    else
        die("error");
    
}?>
                <form role="form" method="POST" action="" id="register">
                     <div class="form-group">
        <label for="firstname">First Name</label>
        <input class="form-control" name="firstname" required="required" id="firstname" placeholder="Enter First Name" type="text"/>
    </div>
                    <div class="form-group">
        <label for="lastname">Last Name</label>
        <input class="form-control" name="lastname" required="required" id="lastname" placeholder="Enter Last Name" type="text"/>
    </div>
                    <div class="form-group">
        <label for="email">Email</label>
        <input class="form-control" name="email" required="required" id="email" placeholder="Enter E-mail" type="email"/>
    </div>
    <div class="form-group">
        <label for="username">Username</label>
        <input class="form-control" name="username"  required="required" id="username" placeholder="Enter Username" type="text"/>
        <div id="result"></div>
    </div>
    <div class="form-group">
        <label for="pwd">Password</label>
        <input class="form-control" name="password" required="required" id="password" placeholder="Enter Password" type="password"/>
    </div>
                    
    <input class="btn btn-success btn-lg" type="submit" name="register" value="Sign In"/>
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


