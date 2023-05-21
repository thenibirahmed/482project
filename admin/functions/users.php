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

    $_SESSION['errors'] = $errors;
    header('location: ../users/index.php');
}

if( isset($_POST['edit_user']) ){
    $name = $_POST['name'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $email = $_POST['email'] ?? '';
    $role = $_POST['role'] ?? '';
    $password = $_POST['password'] ?? '';
    $id = $_POST['id'] ?? '';

    if( $id == '' || ! is_numeric($id) ){
        $errors[] = 'Invalid user id';
    }
    
    if( empty($name) || empty($phone) || empty($email) || empty($role) ){
        $errors[] = 'All the fields are required';
    }
    
    // Check if user already exists
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    
    if( mysqli_num_rows($result) > 1 ){
        $errors[] = 'Email already taken';
    }
    // die(print_r($errors).$id);
    
    if( empty($errors) ){
        
        if( $password != '' ){
            $password = md5($password);
            
            $query = "UPDATE users SET name = '$name', phone = '$phone', email = '$email', role = '$role', password = '$password' WHERE id = $id";
        }else{
            $query = "UPDATE users SET name = '$name', phone = '$phone', email = '$email', role = '$role' WHERE id = $id";
        }

        $result = mysqli_query($conn, $query);

        if( $result ){
            header('location: ../users/index.php');
        }else{
            $errors[] = 'Failed to update user';
        }
    }

    $_SESSION['errors'] = $errors;
    header('location: ../users/index.php');
}

if( isset($_GET['delete_id']) ){
    $id = $_GET['delete_id'] ?? '';

    if( $id == '' || ! is_numeric($id) ){
        $errors[] = 'Invalid user id';
    }

    if( empty($errors) ){
        deleteUser($id);
    }

    $_SESSION['errors'] = $errors;
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

    $user = mysqli_num_rows($result) > 0 ? mysqli_fetch_assoc($result) : null;

    return $user;
}

function deleteUser($id){
    global $conn;

    $query = "DELETE FROM users WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if( $result ){
        header('location: ../users/index.php');
    }else{
        $errors[] = 'Failed to delete user';
    }

    $_SESSION['errors'] = $errors;
    header('location: ../users/index.php');
}