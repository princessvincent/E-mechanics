<?php
session_start();
// include_once "header.php";
include_once "connection.php";

if(!isset($_SESSION["logged_in"])){
    header("login.php");
}

$user = (object) $_SESSION["logged_in"];

if($user->role_id == 2){
    include_once "head.php";
}else{
    include_once "header.php";
}


if (isset($_POST['change'])) {
    $o_p = md5($_POST["old_pass"]);
    $n_p = md5($_POST["new_pass"]);



    $o_p_i = $_SESSION["logged_in"]["password"];
    $email = $_SESSION["logged_in"]["email"];
 var_dump($o_p_i);

    if ($o_p == $o_p_i) {
        $sql = "UPDATE register SET password = '$n_p' WHERE email = '$email'";
        $res = mysqli_query($conn, $sql);
        if ($res) {
            echo "Your Password has been Change!";
        } else {
            echo "Unable to change Password!";
        }
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
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
            <input type="password" name="old_pass" placeholder="Password" required><br><br>
            <input type="password" name="new_pass" placeholder="password" required><br><br>
            <button type="submit" name="change">Change Password</button>
        </form>
    </div>
</body>

</html>