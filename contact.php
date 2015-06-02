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
                <h1>Contact</h1><br>
            <div class="row">
                <div class="col-md-6">
                    
                   
<iframe src="https://www.google.com/maps/d/embed?mid=zexSqh2EFDqY.k6xonFC-3Q_I"  width="480" height="480"></iframe>
                </div>
                <div class="col-md-6">
                    <h3>Contact Form</h3>
                    <?php
                    include_once 'connection.php';
                    if(isset($_POST['contact']))
                    {
                        $name=$_POST['name'];
                        $name = test_input($name);
                        $reg = "/^.+(@)[a-zA-Z]+(.)[a-zA-Z]+$/";
    if (preg_match($reg, $_POST['email']))
            $email = $_POST['email'];
    else
        die("Please insert a valid email. i.e. tasks@tasks.com");
                        $comment=$_POST['comment'];
                        $comment = test_input($comment);
                        $date=  date('Y-m-d H:i:s');
                        
                        $contact = "INSERT INTO contact (id,name,email,comment,create_date) values ('','$name','$email','$comment','$date')";
                        $contactrun = mysql_query($contact);
                        if ($contactrun)
                            echo "<h3>Your inquiry has been successfully sent.</h3>";
                        else
                            echo "<h3>A problem occured, please try again.</h3>";
                    }
                    
                    ?>
                    <form role="form" method="POST" action="">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" required="required" placeholder="Enter your Name" name="name"/>
                        </div>
                        <div class="form-group">
                            <label for="Email">Email</label>
                            <input type="email" class="form-control" required="required" placeholder="Enter your Name" name="email"/>
                        </div>
                        <div class="form-group">
                            <label for="name">Comment</label><br>
                            <textarea rows="10" cols="55" name="comment" required="required" placeholder="Enter your question"></textarea>
                        </div>
                        <input type="submit" name="contact" value="Submit" class="btn btn-success btn-lg"/>
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

                