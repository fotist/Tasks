<?php
    session_start();
    error_reporting(0);?>

<!doctype html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		
		<title>My Tasks</title>

		<link rel="stylesheet" type="text/css" href="css/demo.css">
			<link rel="stylesheet" type="text/css" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.7/css/jquery.dataTables.css">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/1.0.5/css/dataTables.responsive.css">
                <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/tabletools/2.2.4/css/dataTables.tableTools.css">
		<link rel="stylesheet" type="text/css" href="css/dataTables.editor.css">
                <link rel="stylesheet" type="text/css" href="../css/style2.css">
                 <link type="text/css" rel="stylesheet" href="../bootstrap/css/bootstrap.css">
                
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
            <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
		<script type="text/javascript" charset="utf-8" src="https://code.jquery.com/jquery-1.11.2.js"></script>
			<script type="text/javascript" language="javascript" src="//code.jquery.com/ui/1.11.2/jquery-ui.min.js"></script>
		<script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
                <script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/responsive/1.0.5/js/dataTables.responsive.min.js"></script>
		<script type="text/javascript" charset="utf-8" src="https://cdn.datatables.net/tabletools/2.2.4/js/dataTables.tableTools.min.js"></script>
		<script type="text/javascript" charset="utf-8" src="js/dataTables.editor.min.js"></script>
		<script type="text/javascript" charset="utf-8" src="js/table.tasks.js"></script>
	</head>
	<body>
		<div class="container-fluid">
            
        <div class="jumbotron">
            <div class="logo">
            <?php include("../includes/header.php"); ?>
            </div>
            <div class="menu">
                <?php include("../includes/menu_1.php"); ?>
            </div>
        </div>
            <div class="content">
			<h1>
				My Tasks
			</h1>
			
			<table cellpadding="0" cellspacing="0" border="0" class="display responsive" id="tasks" width="100%">
				<thead>
					<tr>
						<th>Title</th>
						<th>Description</th>
						<th>Start Date</th>
						<th>End Date</th>
						<th>Image</th>
						<th>Completed</th>
					</tr>
				</thead>
			</table>

	</div>
                     <div class="footer">
                    <?php include("includes/footer.php"); ?>
                </div>
        </div>
	</body>
</html>
