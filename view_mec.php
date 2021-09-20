<?php
session_start();
if(!isset($_SESSION["logged_in"])){
    header("login.php");
}

$user = (object) $_SESSION["logged_in"];

if($user->role_id == 2){
    include_once "head.php";
}else{
    include_once "header.php";
}

// include_once "header.php";
include_once "connection.php";


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 
    <?php
    $sql = "SELECT username,email,phone,shop_address,state_id,city,images FROM register WHERE role_id ='2'";
    $rest = mysqli_query($conn,$sql);
    print_r(mysqli_error_list($conn));
    while($row = mysqli_fetch_assoc($rest)){
        $image = $row["images"];
        $user = $row["username"];
        $email =  $row["email"];
       $phone = $row["phone"];
       $state = $row["state_id"];
       $city = $row["city"];
       $add = $row["shop_address"];
    ?>
    
    <div><img src='images/<?php echo $image ?>' width="500" height="400"></div>
        <span class="form"> <?php echo  $user ?></span><br>
        <span class="fo"> <?php echo  $email?></span><br>
        <span class="form"> <?php echo $state ?></span><br>
        <span class="form"> <?php echo  $city?></span><br>
        <span class="form"> <?php echo  $add ?></span><br>
        <a href="tel:$phone" id="for">Contact Mechanic</a>
    <?php  

} 
?>
  
</body>
</html>