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
       <link type="text/css" rel="stylesheet" href="http://datatables.net/release-datatables/media/css/jquery.dataTables.css">
       <link type="text/css" rel="stylesheet" href="http://datatables.net/release-datatables/extensions/TableTools/css/dataTables.tableTools.css">
       <link type="text/css" rel="stylesheet" href="//cdn.datatables.net/responsive/1.0.6/css/dataTables.responsive.css">
      
      
            
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
            <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
            <script src="http://datatables.net/release-datatables/media/js/jquery.js"></script>
              <script src="http://datatables.net/release-datatables/media/js/jquery.dataTables.js"></script>
            <script src="http://datatables.net/release-datatables/extensions/TableTools/js/dataTables.tableTools.js"></script>
            <script src="//cdn.datatables.net/responsive/1.0.6/js/dataTables.responsive.js"></script>
            <script src="js/css-pop.js"></script>
            <script src="js/ajax.js"></script>
            
            <script>$(document).ready(function() {
    $('#tasks').DataTable( {
        responsive: true,
        
         "sDom": 'T<"clear">lfrtip',
        "oTableTools": {
            "sSwfPath": "swf/copy_csv_xls_pdf.swf",
             "sRowSelect": "single",
            "aButtons": [
                {
                    "sExtends": "text",
                    "sButtonText": "New Task",
                    "fnClick": function( nButton, oConfig ) {
			
                    popup('createtask');
                        
                       
                        
		}
                    
                    
                },
                {
                    "sExtends": "text",
                    "sButtonText": "Update Task",
                    "fnClick": function( nButton, oConfig ) {
			
                        var oTT = TableTools.fnGetInstance( 'tasks' );
                        var selected = oTT.fnGetSelectedData();
                        var idarray = selected[0];
                        var id = "updatetask.php?id="+idarray[0];
                        window.location = id;
                        
                       
                        
		}
                    
                    
                },
                {
                    "sExtends": "text",
                    "sButtonText": "Complete",
                    "fnClick": function( nButton, oConfig ) {
			
                        var oTT = TableTools.fnGetInstance( 'tasks' );
                        var selected = oTT.fnGetSelectedData();
                        var idarray = selected[0];
                        var id = "updatetask.php?completed="+idarray[0];
                        window.location = id;
                        
                       
                        
		}
                    
                    
                },
                {
                    "sExtends": "text",
                    "sButtonText": "Delete Task",
                    "fnClick": function( nButton, oConfig ) {
			
                        var oTT = TableTools.fnGetInstance( 'tasks' );
                        var selected = oTT.fnGetSelectedData();
                        var idarray = selected[0];
                        var id = "deletetask.php?id="+idarray[0];
                        window.location = id;
                        
                       
                        
		}
                    
                    
                },
                {
                    "sExtends": "text",
                    "sButtonText": "View Task's Image",
                    "fnClick": function( nButton, oConfig ) {
			
                        var oTT = TableTools.fnGetInstance( 'tasks' );
                        var selected = oTT.fnGetSelectedData();
                        var idarray = selected[0];
                        var id = ""+idarray[5]+"";
                        var id;
                        id = id.split('"',2);
                        
                       
                        window.open(id[1], "_blank", "toolbar=yes, scrollbars=yes, resizable=yes");
                        
                       
                        
		}
                    
                    
                },
                "copy","xls","csv","pdf","print"
            ]
        }
    } );
} );</script>
            
          
    </head>
    <body>
        <div class="container-fluid">
            
        <div class="jumbotron">
            <div class="logo">
            <?php include("includes/header.php"); ?>
            </div>
            <div class="menu-box">
            <div class="menu">
            <?php                include 'includes/menu_1.php';?>
            </div>
            </div>
        </div>
            <div class="content">
                
                
                <?php
                if (!isset($_SESSION['login']))
                    include("includes/guest.php");
                else
                    include 'mytasks.php';
                    ?>
                
        </div>
            
        
                <div class="footer">
                    <?php include("includes/footer.php"); ?>
                </div>
        </div>
        <div id="blanket" style="display:none;"></div>
           <?php
           include 'forms/register.php';
           include 'forms/login.php';
           if (isset($_SESSION['login']))
               include 'forms/createtask.php';
           ?>
    </body>
    
</html>

