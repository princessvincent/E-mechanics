<?php
session_start();
include_once "connection.php";
// include_once "header.php";

if(!isset($_SESSION["logged_in"])){
    header("login.php");
}

$user = (object) $_SESSION["logged_in"];

// $user = (object) $_SESSION["logged_in"];

if($user->role_id == 2){
    include_once "head.php";
}else{
    include_once "header.php";
}
//var_dump($user);
?>
<h1>Welcome to My Websit <?php echo $user->username?> </h1>
<div><img src='./images/<?php echo $user->images ?>' width="500" height="400"></div> 
<html lang="en">
<head>
    
    <title>Document</title>
    <style>
div{
    background-color: #333;
    overflow: hidden;
}
div a{
    float: left;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    font-size: 17px;
    text-decoration: none;
}
div a:hover{
    background-color: #ddd;
    color: black;
}
div a.active{
    background-color: #04AA6D;
    color: white;
}
  


    </style>
</head>
<?php
$sql = "SELECT * FROM register";
$res = mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($res)){
    $id = $row["id"];
}

?>
<body>

  <div>
  
      <!-- <a href="contact.php">Contact Us</a>
      <a href="view_mec.php">View Mechanics</a>
      <a href="urgent.php">Urgent</a>
      <a href="upload.php?id=">Upload profile</a>
      <a href="chang_p.php">Change Password</a>
      <a href="setting.php?id=">Settings</a>
      <a href="logout.php">Logout</a> -->
  </div> 
  
</body>
</html>