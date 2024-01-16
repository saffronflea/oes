<?php
require("connect.php");

session_start();

// Check if the forgot password form is submitted
if (isset($_POST['forgot_submit'])) {
    $user_email = mysqli_real_escape_string($connection, $_POST['forgot_user_email']);

    // Generate a unique token
    $token = bin2hex(random_bytes(32));

    // Store the token in the database
    $update_query = "UPDATE `user` SET reset_token = '$token' WHERE user_email = '$user_email'";
    mysqli_query($connection, $update_query);

    // Send an email to the user with a link containing the token
    $reset_link = "http://yourwebsite.com/reset_password.php?token=$token";
    // Implement a function to send emails here

    echo "Password reset link sent to your email.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Form</title>
	<link rel="stylesheet" href="./css/forgot.css">
	<!--Bootstrap CDN -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<!--FA CSS CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container" style="margin-top: 10rem;">
        <div class="row justify-content-center">
                <form class="form" action="" method="post">
                    <div class="flex-column">
                        <label>Email:</label>
                    </div>
                    <div class="inputForm">
                        <i class="fa-solid fa-envelope" style="color:black"></i>
                        <input type="email" class="input" placeholder="Enter your Email" name="forgot_user_email" required>
                    </div>
                    <button type="submit" class="button-submit" name="forgot_submit">Reset Password</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
