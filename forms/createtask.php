<div id="createtask" style="display:none;">
	<a href="#" class="close" onclick="popup('createtask')" ><img src="images/site/close.png"></a>
		<div id="popupform">
		<h4 id="popuph" style="text-align: center;">New Task</h4>
<form role="form" method="POST" action="newtask.php" id="newtask" enctype="multipart/form-data">
                     <div class="form-group">
        <label for="title">Title</label>
        <input class="form-control" name="title" required="required" id="title" placeholder="Enter the task's title" type="text"/>
    </div>
                    <div class="form-group">
        <label for="description">Description</label>
        <input class="form-control" name="description" required="required" id="description" placeholder="Enter Description" type="textarea"/>
    </div>
                    <div class="form-group">
        <label for="image">Image</label>
        <input class="form-control" name="image" id="image" type="file"/>
    </div>
    <div class="form-group">
        <label for="start_date">Start Date</label>
        <input class="form-control" name="start_date" required="required" id="start_date"  type="date"/>
    </div>
    <div class="form-group">
        <label for="end_date">End Date</label>
        <input class="form-control" name="end_date" required="required" id="end_date" type="date"/>
    </div>
    <input type="hidden" name="user" value="<?php echo $_SESSION['userid'];?>">
                    
    <input class="btn btn-success btn-lg" type="submit" name="newtask" value="Create Task"/>
</form>