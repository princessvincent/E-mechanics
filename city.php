<?php
session_start();

include_once "connection.php";
// include_once "header.php";

if(!isset($_SESSION["logged_in"])){
    header("login.php");
}

$user = (object) $_SESSION["logged_in"];

if($user->role_id == 2){
    include_once "head.php";
}else{
    include_once "header.php";
}

$state = $_SESSION["logged_in"]["state_id"];
$id = $_SESSION["logged_in"]["id"];

if(isset($_POST["conti"]) && isset($_POST["cit"])){
    $cit = $_POST["cit"];
    
    // var_dump($state == $sta);

    // if($state == $sta){
    
        $selet  = "SELECT * FROM register WHERE city = '$cit'";
        $re = mysqli_query($conn,$selet);
        // print_r($re);
        while($rows = mysqli_fetch_assoc($re)){
            $image = $rows["images"];
             $email =  $rows["email"];
            $phone = $rows["phone"];
            $state = $rows["state_id"];
            $city = $rows["city"];
            $add = $rows["shop_address"];
?>
<div><img src='images/<?php echo $image ?>' width="200" height="200"></div>
        <span class="form"> <?php echo $email ?></span><br>
        <span class="fo"> <?php echo $state ?></span><br>
        <span class="form"> <?php echo $city ?></span><br>
        <span class="form"> <?php echo $add ?></span><br>
        <a href="tel:$phone" id="for">Contact Mechanic</a>
 <?php       
}

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
 <div>
     <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">
   CITY:  <input type="text" name="cit" placeholder="The city you are Currently In.">
        <button type="submit" name="conti">Continue</button>
     </form>
 </div>   
</body>
</html>