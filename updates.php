<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update | Tasks</title>
    <link rel="stylesheet" href="./assets/css/project.css" />
</head>
<body>
    
</body>
</html>
<?php 
//connect to database
require_once('dbconnect.php');

//prepare SQL statement
$sql = "SELECT * FROM todo";

//prepare query result
$result = mysqli_query($conn, $sql);

if($result = $conn->query($sql)){
    echo '<h1>Task List</h1>';
    echo '<table>';
    echo '<tr>';
    echo '<th>Task Number</th>';
    echo '<th>Task Description</th>';
    echo '<th>Date</th>';  
    echo '<th>Update</th>';
    echo '<th>Delete</th>';
    echo '</tr>';
    while($row = $result->fetch_assoc()){
        $taskid = $row['taskid'];
        echo '<tr>';
        echo '<td>'. $row['taskid'] .'</td>';
        echo '<td>'. $row['taskname'] .'</td>';
        echo '<td>'. $row['taskdate'] .'</td>';
        echo "<td><a href='update_tasks.php?taskid=$taskid'>Update</a></td>";
        echo "<td><a href='delete_tasks.php?taskid=$taskid'>Delete</a></td>";
        echo '</tr>';
    }
    echo '</table>';

    //free the result set
    $result->free();
}
$conn->close();
?>