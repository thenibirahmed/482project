<?php 

require_once $_SERVER['DOCUMENT_ROOT'] .'/inc/config.php';

// Connect to the database
$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    echo 'Connection error: ' . mysqli_connect_error();
    die;
}

global $conn;

if( session_status() === PHP_SESSION_NONE ){
    session_start();
}
