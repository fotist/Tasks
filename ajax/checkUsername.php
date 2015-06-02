<?php

    include 'connection.php';
    $result = mysql_query("select username from members where username='".$_GET['u']."';");
    if (mysql_num_rows($result)==1){
        echo "0";
    }
    else {
        echo "1";
    }
    
?>
