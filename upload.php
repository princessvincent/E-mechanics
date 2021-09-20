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

if(isset($_GET["id"])){
    $id = $_GET["id"];
    // echo $id;
    $_SESSION["id"] = $id;;
}

if(isset($_POST["up"])){
    $ID = $_POST["id"];
    $filename = $_FILES["image"]["name"];
    $file_tmp = $_FILES["image"]["tmp_name"];
    $file_size = $_FILES["image"]["size"];
    // $file_type = $_FILES["file"]["type"];
    $file_error= $_FILES["image"]["error"];

    $allow_format = ['jpeg','png','jpg'];

    $filext = strtolower(pathinfo(basename($filename), PATHINFO_EXTENSION));

    if(in_array($filext,$allow_format)){
        if($file_size > 2000000){
            echo "Image should not be greater than 2mb";
        }
                }else{
                    echo "Only jpeg,jpg,png file is allowed";
                }
                if($file_error  == 0){
        if(getimagesize($file_tmp)){

        if(move_uploaded_file($file_tmp, "./images/$filename")){
            //$sq = "DELETE FROM register WHERE id = '$id'";
            //$re = mysqli_query($conn,$sq);
        }else{
            echo "unable to upload your file";
        }
        }else{
            echo "this is not an image";
        }
                }else{
                    echo "there was an error uploading your profile";
                }

                
    $insert = "UPDATE register SET images = '$filename' WHERE id = '$id'";

    $res = mysqli_query($conn,$insert);

    // print_r(mysqli_error_list($conn));

    if($res){
        echo "sucess";
    }else{
        echo "no";
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
     <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST" enctype="multipart/form-data">
     <input type="hidden" name="id"><br><br>
     <input type="file" name="image"><br><br>
         <button type="submit" name="up">Upload</button>
     </form>
 </div>   
</body>
</html>