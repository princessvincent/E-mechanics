<?php
session_start();
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

if(isset($_POST["sub"])){
    $email = htmlentities($_POST["email"]);
    $sub = htmlentities($_POST["subj"]);
    $mess =htmlentities($_POST["message"]);

    $me =  wordwrap($mess,70);

    if(filter_var("$email, FILTER_VALIDATE_EMAIL")){
        $email_error = "Invalid email";
    }

    $mailto = "priscavincent2018@gmail.com";
    $headers = "From:". $email;
    $txt = "You have receive a mail from".$email. "\n\n". $me;

    if(mail($mailto,$sub,$txt,$headers)){
        echo "Mail has been sent successfully!";
    }else{
        echo "Unabel to send mail!";
    }
}

?>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
<div>
     <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST" class="contact-form">
         <input type="email" name="email" placeholder="Your Email" required><br><br>
         <input type="text" name="subj" placeholder="Subject" required><br><br>
         <input type="text" name="message" placeholder="Message" required><br><br>
         <button type="submit" name="sub">Submit Form</button>
     </form>
 </div>      
</body>
</html>