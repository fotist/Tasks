<ul>
   

<?php
    if (!isset($_SESSION['login'])){
?>
    <li><a  href="http://localhost/Tasks/index.php">Home</a></li>
 <li><a  href="http://localhost/Tasks/login.php">Sign In</a></li>
 <li><a  href="http://localhost/Tasks/register.php">Register</a></li>
<?php
    }
    else {
?>
 <li><a  href="http://localhost/Tasks/index.php">Home</a></li>
      <li><a  href="#" >Tasks</a>
 <ul>
 
 <li><a  href="http://localhost/Tasks/newtask.php">New Task</a></li>
 <li><a  href="http://localhost/Tasks/updatetask.php">Update Task</a></li>
 <li><a  href="http://localhost/Tasks/deletetask.php">Delete Task</a></li>
</ul>
</li>
 <li><a  href="http://localhost/Tasks/logout.php">Sign Out</a></li>
<?php
    }

?>
 
 <li><a  href="http://localhost/Tasks/contact.php">Contact</a></li>
 
 </ul>
<div class="login" id="ul-login">
    <?php
    if (!isset($_SESSION['login']))
    {
    ?>
    <form class="form-inline" method="POST" action="login.php" role="form">
  <div class="form-group-sm">
    <label for="username">Username:</label>
    <input type="text" name="username" class="form-control" id="loginusername">
  </div>
  <div class="form-group-sm">
    <label for="pwd">Password:</label>
    <input type="password" name="password" class="form-control" id="loginpwd">
  </div>
        <input type="submit" id="menulogin" class="btn btn-success btn-sm" value="Sign In" name="login"/>
</form>
    <?php 
    }
    else
    { echo "Welcome <b><i>".$_SESSION['FULLNAME']."</i></b>"; ?>
    <a class="btn btn-success btn-sm" href="http://localhost/Tasks/logout.php">Sign Out</a>
    <script>document.getElementById("ul-login").style.padding = "0px 0px 0px 500px";</script>
    <?php
    }?>
    
</div>



