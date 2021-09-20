<?php
include_once "connection.php";

if(isset($_POST["sub"])){
    if(isset($_POST["fullname"]) && isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["phone"])  && isset($_POST["role"]) && isset($_POST["password"])){
        $full = mysqli_real_escape_string($conn,$_POST["fullname"]);
        $user = mysqli_real_escape_string($conn,$_POST["username"]);
        $email = mysqli_real_escape_string($conn,$_POST["email"]);
        $phone = mysqli_real_escape_string($conn,$_POST["phone"]);
        $role = mysqli_real_escape_string($conn,$_POST["role"]);
        $pass = md5(mysqli_real_escape_string($conn,$_POST["password"]));


        $filename = $_FILES["image"]["name"];
    $file_tmp = $_FILES["image"]["tmp_name"];
    $file_size = $_FILES["image"]["size"];
    // $file_type = $_FILES["file"]["type"];
    $file_error= $_FILES["image"]["error"];

    $allow_format = ['jpeg','pdf','png','jpg'];

    $filext = strtolower(pathinfo(basename($filename), PATHINFO_EXTENSION));

//checking if image is jpeg','pdf','png','jpg'
if(!in_array($filext,$allow_format)){
    $error["image"] = "only jpeg,pdf,png,jpg is allowed";
}elseif($file_size > 2000000){
    //check if image is greater than 2mb = 2million
    $error["image"] = "Image should not be more than 2MB";
}
//checking if image is uploaded successfully
if($file_tmp == UPLOAD_ERR_OK){
    //if this is not an image
    if(!getimagesize($filename)){
        $error["image"] = "File you uploaded is not an image";
    }elseif(!move_uploaded_file($file_tmp, "./images/$filename")){
        //if image is unable to store in the folder
        $error["image"] = "Unabel to upload image";
    }
}

        if(filter_var("$email, FILTER_VALIDATE_EMAIL")){
            $email_error = "Invalid Email Address";
        }
        if(filter_var("$phone, FILTER_VALIDATE_INT")){
            $pho_error = "Phone number must be interger!";
        }
$sq2 = "SELECT * FROM register WHERE phone = '$phone'";
$ret = mysqli_query($conn,$sq2);
        $sql = "SELECT * FROM register WHERE email = '$email'";
        $rest = mysqli_query($conn,$sql);
        if(mysqli_num_rows($rest) ==1 ){
            echo "Email Already Exist.....!";
        }elseif(mysqli_num_rows($ret) == 1){
            echo "Phone Number Already Exist....!"; 
        }else{
            $insert = "INSERT INTO register (fullname,username,email,phone,role_id,images,password) VALUES ('$full','$user','$email','$phone','$role','$filename', '$pass')";
            $rest1 = mysqli_query($conn,$insert);
        echo ($rest1) ? "Registration Successful!" : "Unable to Complete Registration!";
        header("location:login.php");
        exit();
        }
    }else{
        echo "error";
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
    <h1>Join Us Today And Have The Best Experience!</h1>
  <div>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST" enctype="multipart/form-data">
     Fullname:  <input type="text" name="fullname" placeholder="Fullname" required><br><br>
      Username: <input type="text" name="username" placeholder="Username" required><br><br>
      Email: <input type="email" name="email" placeholder="Email" required><br><br>
      Tel: <input type="number" name="phone" placeholder="Phone" required><br><br>
      Choose Role: <select name="role" required>
<?php 
$sql1 = "SELECT * from roles";
$res = mysqli_query($conn,$sql1);
while($row = mysqli_fetch_assoc($res)){
?>
<option value="<?php echo $row["id"]?>"><?php echo strtoupper($row["name"]) ?></option>
<?php } ?>
      </select><br><br>
     Upload Profile: <input type="file" name="image"><br><br>
     Password: <input type="password" name="password" placeholder="Password" required><br><br>
      <button type="submit" name="sub">Submit</button><br><br>
      <p><a href="login.php">Login Here</a></p>

      </form>
  </div>  
</body>
</html>