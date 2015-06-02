<?php
    session_start();
    error_reporting(0);
    
    include_once 'includes/escape.php';
?>
<html>
<head>
    <title>Delete Tasks - Tasks</title>
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
                    
                    <?php

include_once'connection.php';

$choose = "SELECT id,title FROM tasks order by title ASC";
$chooserun = mysql_query($choose);

echo "<form role='form' method='POST' action='' id='choosetask'><h1>Choose the task you want to delete</h1><br>
        <div class='form-group'>
        <label for='Task'>Task</label>
        <select class='form-control' name='deletetask' onchange='this.form.submit()'><option value='-'>Choose Task</option>";
while ($choosearray = mysql_fetch_assoc($chooserun))
{
    echo "<option value='".$choosearray['id']."'>".$choosearray['title']."</option>";
            
}
echo "</select></div></form>";

if (isset($_POST['deletetask']) || isset($_GET['id']))
{
    ?>
     <script> document.getElementById("choosetask").style.display = "none";</script>
     <script> document.getElementById("delete").style.display = "block";</script>
     <?php
    $selecttitle = $_POST['deletetask'];
    if (isset($_GET['id']))
        $selecttitle = $_GET['id'];
    $fetch="SELECT id,title,description,start_date,end_date,image,completed,user_id FROM tasks where id LIKE '$selecttitle'";
    $fetchrun = mysql_query($fetch);
    $fetchrows = mysql_num_rows($fetchrun);
    $fetcharray = mysql_fetch_assoc($fetchrun);
    if ($fetcharray){
    if ($fetcharray['user_id'] != $_SESSION['userid'])
    {
        die("You are not authorized to delete this task.");
    }
    }
    else die ('Task cannot be found');
    
    if (fetchrows>1)
        die ("The selected task cannot be deleted.");
    else
    {
        ?>
                    <form role="form" method="POST" action="" id="delete">
                        <h1>Delete Task</h1><br>
                        <div class="form-group">
        <label for="id">ID</label>
        <input class="form-control" name="id" id="id" readonly="readonly" value="<?php echo $fetcharray['id']; ?>"  type="text"/>
    </div>
                     <div class="form-group">
        <label for="title">Title</label>
        <input class="form-control" name="title" id="title" readonly="readonly" value="<?php echo $fetcharray['title']; ?>" placeholder="Enter the task's title" type="text"/>
    </div>
                    <div class="form-group">
        <label for="description">Description</label>
        <textarea rows='4'  class="form-control" name="description" readonly="readonly" id="description" placeholder="Enter Task's Description" ><?php echo $fetcharray['description']; ?></textarea>
    </div>
                    
    <div class="form-group">
        <label for="start_date">Start Date</label>
        <input class="form-control" name="start_date" readonly="readonly" value="<?php echo $fetcharray['start_date']; ?>" id="start_date"  type="date"/>
    </div>
    <div class="form-group">
        <label for="end_date">End Date</label>
        <input class="form-control" name="end_date" readonly="readonly" value="<?php echo $fetcharray['end_date']; ?>" id="end_date" type="date"/>
    </div>
                        
             
                    
    <input class="btn btn-danger btn-lg" type="submit" name="deleteconfirm" value="Delete Task"/>
</form>
     <?php
            }
        ?>
                    <?php
    }


if (isset($_POST['deleteconfirm']))
{
    ?>
                    <script> document.getElementById("choosetask").style.display = "none";</script>
                    <script> document.getElementById("change").style.display = "none";</script>
    <?php
    $id = $_POST['id'];
    
    
    $deletetask = "DELETE from tasks where id LIKE '$id' ";
            
    $deleterun = mysql_query($deletetask);
    
        
    if ($deleterun) {
        
        echo "Your task has been deleted.";
       
        }
    else
        die("Something went wrong. Please try again.");
    
}?>
                
                </div>
                    </div>
        </div>
           
        
                <div class="footer">
                    <?php include("includes/footer.php"); ?>
                </div>
        </div>
           
    </body>
</html>