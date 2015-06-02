
	<div id="regform" style="display:none;">
	<a href="#" class="close" onclick="popup('regform')" ><img src="images/site/close.png"></a>
		<div id="popupform">
		<h4 id="popuph" style="text-align: center;">Sing Up</h4>
			<form role="form" method="POST" action="register.php" id="register">
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
        <input class="form-control" name="username" required="required" id="username" placeholder="Enter Username" type="text"/>
    </div>
    <div class="form-group">
        <label for="pwd">Password</label>
        <input class="form-control" name="password" required="required" id="password" placeholder="Enter Password" type="password"/>
    </div>
                    
    <input class="btn btn-success btn-lg" type="submit" name="register" value="Sign Up"/>
</form>
			
		</div>
	</div>