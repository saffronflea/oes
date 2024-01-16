<?php

require("connect.php");

session_start();
session_unset();
session_destroy();

header('location:logout_success.php');

?>
