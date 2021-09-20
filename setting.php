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

if(isset($_GET["id"])){
    $id= $_GET["id"];
// die("id not provided");
$_SESSION["id"] = $id;
}elseif(isset($_SESSION["id"])){
    $id = $_SESSION["id"];
}



//updating details
if(isset($_POST["update"])){
    if(isset($_POST["id"]) && isset($_POST["user"]) && isset($_POST["email"]) && isset($_POST["phone"]) && isset($_POST["city"]) && isset($_POST["add"]) && isset($_POST["state"])){
     
        $ID = $_POST["id"];
        $user = $_POST["user"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $cit = $_POST["city"];
        $add = $_POST["add"];
        $state = $_POST["state"];
        
        $sql = "UPDATE register SET username = '$user', email = '$email', phone = '$phone',  shop_address = '$add', state_id = '$state', city = '$cit' WHERE id = '$ID'";
        $res = mysqli_query($conn,$sql);
        echo($res)? "Details Updated Successfully!" : "Unabel to update Details!";
    }else{
        echo "error";
    }
}


//fetching data from databas
// $id= $_GET["id"];

$q1 = "SELECT * FROM register WHERE id = $id";
$result = $conn->query($q1);
if($result->num_rows !=1){
    die("id not available");
}
$data = $result->fetch_assoc();
// print_r($data);

//$id = $_GET["id"];
 

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <fieldset>
        <div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $data["id"] ?>" ><br><br>
                Update Username: <input type="text" name="user" value="<?php echo $data["username"] ?>" ><br><br>
                Update Email:<input type="email" name="email" value="<?php echo $data["email"] ?>" ><br><br>
                Update Phone:<input type="number" name="phone" value="<?php echo $data["phone"] ?>" ><br><br>
                Update City:<input type="text" name="city"  value="<?php echo $data["city"] ?>"><br><br>
                Update Address:<input type="text" name="add" value="<?php echo $data["shop_address"] ?>"><br><br>
                Update State: <input type="text" name="state" value="<?php echo $data["state_id"] ?>"><br><br>
                Change Profile:<input type="file" name="image" value="<?php echo $data["images"] ?>"><br><br>
                <button type="submit" name="update">Update</button>
            </form>
        </div>
    </fieldset>
</body>

</html>