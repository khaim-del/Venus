<?php
require_once('dbconnect.php');
 
if(isset($_POST['updater'])){
    $taskid = $_POST['taskid'];
    $taskname = $_POST['taskname'];
    $taskdate = $_POST['taskdate'];


$sql = "DELETE FROM todo WHERE taskid='$taskid' ";
    
        if ($conn->query($sql) === TRUE) {
            echo "New record DELETED successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    echo '<a href="index.html">Home</a>';
?>