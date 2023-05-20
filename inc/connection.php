<?php 

// Connect to the database
$conn = mysqli_connect('127.0.0.1', 'root', '', '482lab');

if (!$conn) {
    echo 'Connection error: ' . mysqli_connect_error();
    die;
}

global $conn;

if( session_status() === PHP_SESSION_NONE ){
    session_start();
}
