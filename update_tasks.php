<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/project.css" />
</head>
<body>
    
</body>
</html>
<?php
require_once('dbconnect.php');
//MySQL Query to read data
if ( isset($_GET['taskid'])) {
    
    $taskid = $_GET['taskid'];
    
    $query = "SELECT * FROM todo WHERE taskid = '$taskid'";
    $result = $conn->query($query);
       
if ($result = $conn->query($query)) {
    echo '<h1>Update Task </h1>';
    echo 'Please update the appropriate task for: ' . $taskid;
    echo '<hr />';
    echo '<form action="edit_tasks.php" method="post">';
        /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        $taskid = $row['taskid'];
            echo '<input type="text" name="taskid" value="'. $row['taskid'].'" />';
            echo '<input type="text" name="taskname" value="'. $row['taskname'].'" />';
            echo '<input type="text" name="taskdate" value="'. $row['taskdate'].'" />';;
           echo '<button type="submit" name="updater">Update Record</button>';
        echo '</form><br><br>';
        echo '</div>';
        
    }
    /*header("location: success_edit_user.php");
    exit();
    */
    $result->free();
    
}

}

$conn->close();
?>    