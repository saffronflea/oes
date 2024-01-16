<?php
require("connect.php");

if(isset($_POST['submit'])){
   $user_firstname = mysqli_real_escape_string($connection, $_POST['firstname']);
   $user_lastname = mysqli_real_escape_string($connection, $_POST['lastname']);
   $user_email = $_POST['user_email'];
   $user_password = md5($_POST['password']);
   $cpassword = md5($_POST['cpassword']);

   $select = " SELECT * FROM `user` WHERE user_email = '$user_email' ";
   $result = mysqli_query($connection, $select);
   if(mysqli_num_rows($result) > 0){
      $error[] = 'There is already a user with that email!';
   }else{
      if($user_password != $cpassword){
         $error[] = 'password not matched!';
      }
      else{
         $insert = "INSERT INTO `user`(user_firstname, user_lastname, user_email, user_password) VALUES('$user_firstname','$user_lastname','$user_email','$user_password')";
         mysqli_query($connection, $insert);
         header('location:login.php');
      }
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sign Up Form</title>
	<link rel="stylesheet" href="./css/signup.css">
	<!--Bootstrap CDN -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<!--FA CSS CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container" style="margin-top: 0.9rem;">
	<div class="row justify-content-center">
	<div class="col-lg-5">
    <form class="form" action="" method="post">
		<img class="logo" src="./img/logo.png" alt="" style="width:40%">
		<h3 class="h-title">Online Enrollment System</h3>
        <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>

    <div class="flex-column">
      <label>Firstname:</label></div>
      <div class="inputForm">
	  <i class="fa-solid fa-user" style="color:black;"></i>
        <input type="text" class="input" name="firstname" placeholder="Enter your Firstname" required>
      </div>    
    <div class="flex-column">
      <label>Lastname:</label></div>
      <div class="inputForm">
	  <i class="fa-solid fa-user" style="color:black;"></i>
        <input type="text" class="input" name="lastname" placeholder="Enter your Lastname" required>
      </div>

    <div class="flex-column">
      <label>Email:</label></div>
      <div class="inputForm">
      <i class="fa-solid fa-envelope" style="color:black"></i>
        <input type="email" class="input" name="user_email" placeholder="Enter your Email" required>
      </div>
    
    <div class="flex-column">
      <label>Password: </label></div>
      <div class="inputForm">
	  <i class="fa-solid fa-lock" style="color:black;"></i>
        <input type="password" class="input" name="password" placeholder="Enter your Password" required>
      </div>

      <div class="flex-column">
      <label> Confirm Password:</label></div>
      <div class="inputForm">
	  <i class="fa-solid fa-lock" style="color:black;"></i>
        <input type="password" class="input" name="cpassword" placeholder="Confirm your Password" required>
      </div>
      <div class="flex-row">
    </div>
    <button class="button-submit" name="submit">Sign Up</button>
    <p class="p">Already have an account? <a href="login.php" style="text-decoration:none;"><span class="span">Log In</span></a>
</form>
</div>
</div>
</div>
		<!-- Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>