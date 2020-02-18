<?php
session_start();

$_SESSION['LAST_ACTIVITY'] = date("H:i:s");
//Defines the variables in a more readable way used to connect to the database
define('DB_SERVER', 'localhost');
define('DB_USER', 'hugobomtempo');
define('DB_PASS', '123456');
define('DB_NAME', 'phproject1');

//Connects, and stores the information in a variable
$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

// Check connection
if (!$con) {
    $confirm = 'ERROR';
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
} else {
    $confirm = 'Connected';
}
