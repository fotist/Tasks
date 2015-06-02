<?php
include_once 'connection.php';
$userid=$_SESSION['userid'];
$tasks = "SELECT id, title, description, image, start_date, end_date, completed FROM tasks where user_id LIKE '$userid' ";
$tasksrun = mysql_query($tasks);
$tasksrows = mysql_num_rows($tasksrun);
if (!$tasksrows>0)
    {
    echo "Your tasks list is empty. Click here to create one.";
    }
    
 else {
     
     ?>
<h1>My Tasks</h1>
<table id="tasks" class="display responsive" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>
               id
            </th>
            <th>
                Title
            </th>
            <th>
                Description
            </th>
            <th>
                Start Date
            </th>
            <th>
                End Date
            </th>
            <th>
                Image
            </th>
            
            <th>
                Completed
            </th>
        </tr>
    </thead>
    <tbody>
     <?php
     while ($result = mysql_fetch_assoc($tasksrun))
     {
         ?>
        <tr >
     <?php echo "<td>".$result['id']."</td>"
              . "<td>".$result['title']."</td>"
              . "<td>".$result['description']."</td>"
              . "<td>".$result['start_date']."</td>"
              ."<td>".$result['end_date']."</td>";
        echo "<td>";
        if ($result['image'])
                echo "<img src='".$result['image']."' height=40px; width=40px;/>";
        else 
            echo "No Image available";
        echo "</td>";
         if ($result['completed']=='YES')
             echo  "<td>YES</td></tr>";
         else
             echo  "<td>NO</td></tr>";
     }
     
               echo "</tbody></table></form>";
     }
     ?>
     
