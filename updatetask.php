<?php
    session_start();
    error_reporting(0);
    
    include_once 'includes/escape.php';
?>
<html>
<head>
        <meta charset="utf8">
       
       <link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.css">
       <link type="text/css" href="css/style.css" rel="stylesheet">
       <link rel="stylesheet" type="text/css" href="css/demo.css">
      	<link rel="stylesheet" type="text/css" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
       
            
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

$choose = "SELECT id,title FROM tasks order by title ASC";
$chooserun = mysql_query($choose);

echo "<form role='form' method='POST' action='' id='choosetask'>
        <h1>Choose the task you want to update</h1><br>
        <div class='form-group'>
        <label for='Task'>Task</label>
        <select class='form-control' name='updatetask' onchange='this.form.submit()'><option value='-'>Choose Task</option>";
while ($choosearray = mysql_fetch_assoc($chooserun))
{
    echo "<option value='".$choosearray['id']."'>".$choosearray['title']."</option>";
            
}
echo "</select></div></form>";

if (isset($_POST['updatetask']) || isset($_GET['id']))
{
    ?>
     <script> document.getElementById("choosetask").style.display = "none";</script>
     <script> document.getElementById("change").style.display = "block";</script>
     <?php
    $selecttitle = $_POST['updatetask'];
    if (isset($_GET['id']))
    $selecttitle = $_GET['id'];
    
    $fetch="SELECT id,title,description,start_date,end_date,image,completed,user_id FROM tasks where id LIKE '$selecttitle'";
    $fetchrun = mysql_query($fetch);
    $fetchrows = mysql_num_rows($fetchrun);
    $fetcharray = mysql_fetch_assoc($fetchrun);
    
   if ($fetcharray){
    if ($fetcharray['user_id'] != $_SESSION['userid'])
        die("You are not authorized to update this task.");
    }
    else die ('Task cannot be found');
    
    
    if (fetchrows>1)
        die ("The selected task cannot be updated.");
    else
    {
        ?>
                    <form role="form" method="POST" action="" id="change">
                        <h1>Update Task</h1><br>
                        <div class="form-group">
        <label for="id">ID</label>
        <input class="form-control" name="id" id="id" readonly="readonly" value="<?php echo $fetcharray['id']; ?>"  type="text"/>
    </div>
                     <div class="form-group">
        <label for="title">Title</label>
        <input class="form-control" name="title" id="title" value="<?php echo $fetcharray['title']; ?>" placeholder="Enter the task's title" type="text"/>
    </div>
                    <div class="form-group">
        <label for="description">Description</label>
        <textarea rows='4' class="form-control" name="description" id="description" placeholder="Enter Task's Description" ><?php echo $fetcharray['description']; ?></textarea>
    </div>
                    
    <div class="form-group">
        <label for="start_date">Start Date</label>
        <input class="form-control" name="start_date" value="<?php echo $fetcharray['start_date']; ?>" id="start_date"  type="date"/>
    </div>
    <div class="form-group">
        <label for="end_date">End Date</label>
        <input class="form-control" name="end_date" value="<?php echo $fetcharray['end_date']; ?>" id="end_date" type="date"/>
    </div>
                        <div class="form-group">
        <label for="image">Image</label>
        <input class="form-control" name="image" value="<?php echo $fetcharray['image']; ?>" id="image" type="file"/>
    </div>
                        
        
        <?php if ($fetcharray['completed']=="NO")
        {?>
            <input type="submit" class="btn btn-danger btn-lg" id="completed" name="completed" value="Mark task as completed"/>
        <?php
        }
        else
        {?>
            <input type="submit" class="btn btn-danger btn-lg disabled" id="completed" name="completed" value="The task has already been completed"/>
            <?php
        }
                    
        }
        ?>
        
    
                    
    <input class="btn btn-success btn-lg" id="updateconfirm" type="submit" name="updateconfirm" value="Update Task"/>
</form>
                    <?php
    }


if (isset($_POST['updateconfirm']))
{
    ?>
                    <script> document.getElementById("choosetask").style.display = "none";</script>
                    <script> document.getElementById("change").style.display = "none";</script>
    <?php
    $id = $_POST['id'];
    $title = $_POST['title'];
    $title = test_input($title);
    $description = $_POST['description'];
    $description = test_input($description);
    $path="images/".$_FILES['image']['name'];
    move_uploaded_file($_FILES['photo']['tmp_name'],$path);
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $completed = $_POST['completed'];
    $date = date('Y-m-d H:i:s');
    
    $updatetask = "UPDATE tasks SET title='$title', description='$description', image='$path', start_date='$start_date', end_date='$end_date', create_date='$date' where id LIKE '$id' ";
            
    $updaterun = mysql_query($updatetask);
    
        
    if ($updaterun) {
        
        echo "Your task has been updated.";
       
        
            
                
        }
        
        
        
    else
        die("Something went wrong. Please try again.");
}
    if(isset($_POST['completed']) || isset($_GET['completed']))
    {
        $completed = "YES";
        $id = $_POST['id'];
        if (isset($_GET['completed']))
                $id = $_GET['completed'];
        $complete = "UPDATE tasks SET  completed='$completed' WHERE id LIKE '$id'";
        $completerun = mysql_query($complete);
        
        echo "Congratulations the task has been completed";
            $to = "dallas@9am.gr";
                $subject = "Mini Project";
                $message = "The task with the title '".$title."' has been completed.<br><br>"
                        . "<b><i>Task's Details</i></b><br>"
                        . "<b>Id</b>: ".$id."<br>"
                        . "<b>Title</b>: ".$title."<br>"
                        . "<b>Description</b>: ".$description."<br>"
                        . "<b>Image link</b>: ".$image."<br>"
                        . "<b>Start Date</b> : ".$start_date."<br>"
                        . "<b>End Date</b> : ".$end_date."<br><br>"
                        . "This e-mail was sent by Fotis Tsotras's Mini Project.";
                
                        
                        


                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                $headers .= "From: fotis.tsotras@gmail.com \r\n";
                $x = mail($to,$subject,$message,$headers);
    }
    
?>
                
                </div>
                    </div>
        </div>
           
        
                <div class="footer">
                    <?php include("includes/footer.php"); ?>
                </div>
        </div>
           
    </body>
</html>