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
                    <h1>New Task</h1><br>
                    <?php

include_once'connection.php';

if (isset($_POST['newtask']))
{
    $title = $_POST['title'];
    $title = test_input($title);
    $description = $_POST['description'];
    $description = test_input($description);
    //upload image
    $path="images/task/";
   
$target_file = $path . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        die ("File is not an image.");
        $uploadOk = 0;
    }


if (file_exists($target_file)) {
    die ("Sorry, file already exists.");
    $uploadOk = 0;
}



if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    die ("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    die ("Sorry, your file was not uploaded.");
} else {
    if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        die ("Sorry, there was an error uploading your file.");
    } 
}
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $userid = $_POST['user'];
    $date = date('Y-m-d H:i:s');
    
    $newtask = "INSERT INTO tasks (id,title, description, image, start_date, end_date, create_date,user_id, completed) "
            . "values ('','$title','$description', '$target_file', '$start_date', '$end_date', '$date','$userid','NO')";
    $newtaskrun = mysql_query($newtask);
    if ($newtaskrun) {
        echo "Your task has been created.";
        
        ?>
       
        <?php
        }
    else
        die("Something went wrong. Please try again.");
    
}?>
                <form role="form" method="POST" action="" id="newtask" enctype="multipart/form-data">
                     <div class="form-group">
        <label for="title">Title</label>
        <input class="form-control" name="title" required="required" id="title" placeholder="Enter the task's title" type="text"/>
    </div>
                    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" name="description" required="required" id="description" placeholder="Enter Description" ></textarea>
    </div>
                    <div class="form-group">
        <label for="image">Image</label>
        <input class="form-control" name="image" required="required" id="image" type="file"/>
    </div>
    <div class="form-group">
        <label for="start_date">Start Date</label>
        <input class="form-control" name="start_date" required="required" id="start_date"  type="date"/>
    </div>
    <div class="form-group">
        <label for="end_date">End Date</label>
        <input class="form-control" name="end_date" required="required" id="end_date" type="date"/>
    </div>
                    <input type="hidden" name="user"  value="<?php echo $_SESSION['userid']; ?>"/>
    <input class="btn btn-success btn-lg" type="submit" name="newtask" value="Create Task"/>
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