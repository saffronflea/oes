<?php
require('connect.php');

session_start();

if (isset($_POST['submit'])) {
    $user_email = mysqli_real_escape_string($connection, $_POST['user_email']);
    $user_password = md5($_POST['user_password']);

   $select = " SELECT * FROM user WHERE user_email = '$user_email' AND user_password = '$user_password' ";
   $result = mysqli_query($connection, $select);
   if(mysqli_num_rows($result) === 1) {
      $row = mysqli_fetch_assoc($result);
      if($row['user_email'] === $user_email && $row['user_password'] == $user_password){
        header('location:login_success.php');
      } 
   }else{
      $error[] = 'Incorrect email or password!';
   }
  }
;
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Form</title>
	<link rel="stylesheet" href="./css/login.css">
	<!--Bootstrap CDN -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<!--FA CSS CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container" style="margin-top: 4rem;">
	<div class="row justify-content-center">
	<div class="col-lg-5">
    <form class="form" action="" method="post">
		<img class="logo" src="./img/logo.png" alt="" style="width:40%">
		<h3 class="h-title">Online Enrollment System</h3>
		<?php
            if(isset($error)){
               foreach($error as $error){
                  echo '<div class="alert alert-danger">'.$error.'</div>';
               };
            };
            ?>
    <div class="flex-column">
      <label>Email:</label></div>
      <div class="inputForm">
	  <i class="fa-solid fa-envelope" style="color:black"></i>
        <input type="email" class="input"  name="user_email" placeholder="Enter your Email" required>
      </div>
    
    <div class="flex-column">
      <label>Password:</label></div>
      <div class="inputForm">
	  <i class="fa-solid fa-lock" style="color:black"></i>
        <input type="password"  name="user_password" class="input" placeholder="Enter your Password" required>
		<i class="fa-solid fa-eye" style="color:black"></i>
	    </div>
    
    <div class="flex-row">
		<div>
		</div>
		<a href="forgot.php" style="text-decoration:none;"><span class="span">Forgot password?</span></a>
    </div>
    <button class="button-submit" name="submit">Log In</button>
    <p class="p">Don't have an account? <a href="signup.php" style="text-decoration:none;"><span class="span">Sign Up</span></a>
</form>
</div>
</div>
</div>
		<!-- Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>