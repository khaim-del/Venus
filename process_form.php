<?php 
if($_SERVER["REQUEST_METHOD"] == "POST"){
$name = htmlspecialchars($_POST['username']);
$user = htmlspecialchars($_POST['usermail']);
}
echo 'The username is: ' ,$name;
echo 'The email is: ' ,$user;
?>