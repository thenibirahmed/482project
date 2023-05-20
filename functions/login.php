<?php 

require_once '../inc/connection.php';

if ( isset( $_POST['login'] ) ) {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (  $email === '' || $password === '' ) {
        $_SESSION['error'] = 'Please fill all the fields';
        header( 'Location: ../login.php' );
    }

    // login user by email and password
    $sql = "SELECT * FROM users WHERE email = '$email'";

    $query = mysqli_query( $conn, $sql);

    $numrows = mysqli_num_rows( $query );

    if( $numrows == 0 ){
        $_SESSION['error'] = 'This email is not registered';
        header( 'Location: ../login.php' );
    }

    $dbUser = mysqli_fetch_assoc( $query );

    if($dbUser['email'] == $email && md5($password) == $dbUser['password']){
        $_SESSION['user'] = $dbUser;
        header( 'Location: /admin' );
    }else{
        $_SESSION['error'] = 'Invalid email or password';
        header( 'Location: ../login.php' );
    }
    

}