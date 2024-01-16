<?php

$connection = mysqli_connect('localhost', 'root', '', 'enrollment');

if (mysqli_connect_errno()) {
    echo "failed to connect to MySql Server" .
    mysqli_connect_errno();
} else {
    echo "";
}