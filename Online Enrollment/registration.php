<?php
require("connect.php");

if(isset($_POST['submit'])){
   $firstname = $_POST['firstname'];
   $middlename = $_POST['middlename'];
   $lastname = $_POST['lastname'];
   $birthdate = $_POST['birthdate'];
   $gender = $_POST['gender'];
   $contact = $_POST['contact'];
   $address = $_POST['address'];
   $guardian = $_POST['guardian'];
   $grade_level = $_POST['grade_level'];
   $strand = $_POST['strand'];
  
  $insert = "INSERT INTO `register`(firstname, middlename, lastname, birthdate, gender, contact, address, guardian, grade_level, strand) VALUES('$firstname','$middlename','$lastname','$birthdate','$gender','$contact','$address','$guardian','$grade_level','$strand')";
  mysqli_query($connection, $insert);
  }
;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/regis.css">
    <!--bootstrap cdn-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Registration Form</title>
</head>
<body>
    <form  action="" method="post">

    <h1 class="h-title">Registration Form</h1>
    <div class="first_line">
    <h3 class="f-title">Personal Information</h3>
    <label >Firstname:</label>
    <input type="text" class="inputForm" name="firstname" required>
    <label >Middlename:</label>
    <input type="text" class="inputForm" name="middlename" required>
    <label >Lastname:</label>
    <input type="text" class="inputForm" name="lastname" required>
</div>
    <div class="first_line">
    <label >Date of Birth:</label>
    <input type="date" class="selectForm" name="birthdate" required>
    <label >Gender:</label>
    <select name="gender" class="selectForm"  required>
      <option value=""></option>
      <option value="Male">Male</option>
      <option value="Female">Female</option>
    </select>
    <label >Contact:</label>
    <input type="number" class="inputForm" name="contact" required>
   </div>
   <div class="first_line">
    <h3 class="f-title1">Academic Information</h3>
    <label >Grade Level:</label>
    <select name="grade_level" class="selectForm">
      <option value=""></option>
      <option value="11">11</option>
      <option value="12">12</option>
    </select>
    <label >Strand:</label>
    <select name="strand" class="selectForm">
      <option value=""></option>
      <option value="ABM">ABM</option>
      <option value="STEM">STEM</option>
      <option value="GAS">GAS</option>
      <option value="TVL">TVL</option>
    </select>
</div>
  <div class="first_line">
    <h3 class="f-title1">Contact Information</h3>
    <label >Guardian:</label>
    <input type="text" class="inputForm" name="guardian" required>
    <label >Address:</label>
    <input type="text" class="inputForm" name="address" required>
</div>
<div class="button_line">
<a href="login.php"><input type="button" class="button-c" value="Cancel"></a>
<button class="button-submit" name="submit">Submit</button>
</div>
</form>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>