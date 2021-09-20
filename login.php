<?php
session_start();
// var_dump($_SESSION);
include_once "connection.php";

if(isset($_POST["log"])){
    $email = htmlentities($_POST["email"]);
    $pass = htmlentities(md5($_POST["password"]));

    $sql = "SELECT * FROM register WHERE email= '$email' and password = '$pass'";
    $res = mysqli_query($conn,$sql);
    if(mysqli_num_rows($res)==1){

        $_SESSION["logged_in"] = mysqli_fetch_assoc($res);

        $user = (object) $_SESSION["logged_in"];
        if($user->role_id == 1)
        header("location:client_dash.php");

        if($user->role_id == 2)
        header("location:mech_dash.php");
    }else{
        echo "Invalid password or Email!";
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
         <input type="email" name="email" placeholder="Email" required><br><br>
         <input type="password" name="password" placeholder="Password" required><br><br>
         <button type="submit" name="log">Login</button>
         <a href="forgot_p.php">Forgotten Password</a>
     </form>
     <p><a href="register.php">Register Here</a></p>
 </div>   
</body>
</html>