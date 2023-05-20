<?php 

require $_SERVER['DOCUMENT_ROOT'] .'/inc/connection.php';

if( isset($_POST['create_user']) ){
    $name = $_POST['name'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $email = $_POST['email'] ?? '';
    $role = $_POST['role'] ?? '';
    $password = $_POST['password'] ?? '';

    if( empty($name) || empty($phone) || empty($email) || empty($role) || empty($password) ){
        $errors[] = 'All the fields are required';
    }

    // Check if user already exists
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if( mysqli_num_rows($result) > 0 ){
        $errors[] = 'User already exists';
    }

    if( empty($errors) ){

        $password = md5($password);

        $query = "INSERT INTO users (name, phone, email, role, password) VALUES ('$name', '$phone', '$email', '$role', '$password')";
        $result = mysqli_query($conn, $query);

        if( $result ){
            header('location: ../users/index.php');
        }else{
            $errors[] = 'Failed to add user';
        }
    }

    header('location: ../users/index.php');

}

function getUsers(){
    global $conn;

    $query = "SELECT * FROM users";
    $result = mysqli_query($conn, $query);

    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $users;
}

function getSingleUser($id){
    global $conn;

    $query = "SELECT * FROM users WHERE id = $id";
    $result = mysqli_query($conn, $query);

    $user = mysqli_fetch_assoc($result);

    return $user;
}