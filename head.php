
<?php
// session_start();
require_once "connection.php";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
$id = $_SESSION["logged_in"]["id"];
?>
<body>
  <div>
      <a href="contact.php">Contact Us</a>
      <a href="upload.php?id=<?php echo $id?>">Upload profile</a>
      <a href="setting.php?id=<?php echo $id?>">Settings</a>
      <a href="mech_dash.php">Dashboard</a>
      <a href="chang_p.php">Change Password</a>
      <a href="logout.php">Logout</a>
  </div>  
</body>
</html>