<?php

require_once '../inc/connection.php';

if ( isset( $_POST['register'] ) ) {

    $fname            = $_POST['fname'] ?? '';
    $lname            = $_POST['lname'] ?? '';
    $phone            = $_POST['phone'] ?? '';
    $email            = $_POST['email'] ?? '';
    $password         = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    if(
        empty( $fname ) ||
        empty( $lname ) ||
        empty( $phone ) ||
        empty( $email ) ||
        empty( $password ) ||
        empty( $confirm_password )
    ){
        $_SESSION['error'] = 'Please fill all the fields';
        header( 'Location: /registration.php' );
    }

    if ( $password !== $confirm_password ) {
        $_SESSION['error'] = 'Password does not match';
        header( 'Location: /registration.php' );
    } 
        
    $password = md5( $password );
    $name = $fname . ' ' . $lname;

    $sql = "INSERT INTO users (name, phone, email, password) VALUES ('$name', '$phone', '$email', '$password')";

    if ( mysqli_query( $conn, $sql ) ) {
        header( 'Location: /admin' );
    } else {
        echo 'Error: ' . $sql . '<br>' . mysqli_error( $conn );
    }
    
}
