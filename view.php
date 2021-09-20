<?php
include_once "connection.php";
include_once "header.php";
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table border="1">
    <thead>
       <tr>
       <th>Email</th>
        <th>Contact</th>
        <th>State</th>
        <th>City</th>
       </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM register";
        $res = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($res)){
        ?>
        <tr>
        <td><?php echo $row["email"]?></td>
        <td><?php echo $row["phone"]?></td>
        <td><?php echo $row["state"]?></td>
        <td><?php echo $row["city"]?></td>
        </tr>
        
    </tbody>
    <?php
        }
        ?>
</table>    
</body>
</html>