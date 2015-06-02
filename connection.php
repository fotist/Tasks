<?php

$dberror = 'Error connecting to mysql';
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'tasks';

if(@mysql_connect($dbhost, $dbuser, $dbpass))
	{
		if (@mysql_select_db($dbname))
		{
			
		}
		else
		{
			echo 'Πρόβλημα επικοινωνίας με τη βάση δεδομένων';
		}
	}

else
{
	echo 'Πρόβλημα επικοινωνίας με τον χρήστη της βάσης δεδομένων';
}
?>
