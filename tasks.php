<?php 
require_once('dbconnect.php');
if (isset($_POST['register'])) {
    $taskid = htmlspecialchars($_POST['taskid']);
    $taskname = htmlspecialchars($_POST['taskname']);
    $taskdate = htmlspecialchars($_POST['taskdate']);

    $sql = "INSERT INTO todo (taskid, taskname, taskdate) VALUES ('$taskid', '$taskname', '$taskdate')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
</head>
<body>

    <form action="tasks.php" method="post">
        <p><input type="number" placeholder="Task ID" required name="taskid" /></p>
        <p><input type="text" placeholder="Task Description" required name="taskname" /></p>
        <p>Date of Task: <input type="date" name="taskdate" /></p>
        <button type="submit" name="register">Save Task</button>
    </form>
</body>
</html>
