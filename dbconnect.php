<?php
 //Create a database connection

 $server = "localhost";
 $username = "root";
 $password = "";
 $dbname = "tasks";

 $conn = new mysqli($server, $username, $password, $dbname);

 if($conn->connect_error){
     die("Could not connect to database" .$conn->connect_error);

 }
 
 ?>