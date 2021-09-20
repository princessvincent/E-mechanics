<?php
include_once "connection.php";
include_once "header.php";
if(isset($_POST["sub"])){
    $email = htmlentities($_POST["email"]);
    $pas = md5($_POST["pass"]);

    $sql = "UPDATE register SET password = '$pas' WHERE email='$email'";
    $res = mysqli_query($conn,$sql);
    echo($res)? "Your Password is Set!" : "Unable to Set your Password!";
}else{
    echo "error";
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
     <input type="password" name="pass" placeholder="Password" required><br><br>
     <button type="submit" name="sub">Submit</button>
<p><a href="login.php">Login</a></p>
     </form>
 </div>   
</body>
</html>