<?php
include_once "connection.php";

 if($_SERVER['REQUEST_METHOD'] == "POST"){
    if($_POST['role'] == 1){
        // client redirect
        header("location:client_register.php");
    }
    else{
        // mechanic redirect
        header("location:register.php");
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
<h1>You are Welcome To our Amazing Website!</h1><br>
<h3><p> Are You Registering as a Mechanic or As a Client Choose Below</p> </h3>
<div>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">
    <select name="role">
        <?php
        $sql = "SELECT * FROM roles";
        $res = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($res)){
        ?>
        <option value="<?php echo $row['id'] ?>"><?php  echo strtoupper($row["name"])?></option>
    <?php
} ?>
    </select>

    <button type="submit">Continue</button>

    </form>
</div>
</body>
</html>