<?php
require_once('dbconnect.php');
 
if(isset($_POST['updater'])){
    $taskid = $_POST['taskid'];
    $taskname = $_POST['taskname'];
    $taskdate = $_POST['taskdate'];

    echo 'TASK ID: ' . $taskid;

$sql = "UPDATE todo SET taskid='$taskid', taskname='$taskname', taskdate=$taskid WHERE taskid='$taskid' ";
    
        if ($conn->query($sql) === TRUE) {
            echo "New record EDITED successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>