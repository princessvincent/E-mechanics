<?php
session_start();
include_once "connection.php";

$user = (object) $_SESSION["logged_in"];

if($user->role_id == 2){
    include_once "head.php";
}else{
    include_once "header.php";
}


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 <h1>Search for Mechanic Close to Your Direction Here</h1> 
 
 <p><a href="urgent.php">Search For Mechanics via State</a></p>
 <p><a href="city.php">Search For Mechanics via City</a></p>
 <p><a href="add.php">Search For Mechanics via Address</a></p>
 
</body>
</html>