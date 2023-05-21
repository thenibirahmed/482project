<?php

if(isset($_POST['checkout'])){
    require_once $_SERVER['DOCUMENT_ROOT'] . "/admin/functions/packages.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/connection.php';

    $fname = $_POST['f_name'] ? trim($_POST['f_name']) : '';
    $lname = $_POST['l_name'] ? trim($_POST['l_name']) : '';
    $email = $_POST['email'] ? trim($_POST['email']) : '';
    $phone = $_POST['phone'] ? trim($_POST['phone']) : '';
    $package_id = $_POST['package_id'] ? trim($_POST['package_id']) : '';
    $user_id = $_POST['user_id'] ? trim($_POST['user_id']) : '';
    $pax = $_POST['pax'] ? trim($_POST['pax']) : '';
    $members_info = $_POST['members_info'] ? trim($_POST['members_info']) : '';

    if(empty($fname) || empty($lname) || empty($email) || empty($phone) || empty($package_id) || empty($user_id) || empty($pax)){
        $_SESSION['errors'][] = 'Please fill all the fields';
        header('Location: ../checkout.php');
    }

    // get price of the package
    $package = getSinglePackage($package_id);

    if($package == null){
        $_SESSION['errors'][] = 'Package not found';
        header('Location: ../checkout.php');
    }

    $price = $package['price'] * $pax;

    $name = $fname . ' ' . $lname;

    $sql = "INSERT INTO bookings (user_id, package_id, name, email, phone, pax, price) VALUES ('$user_id', '$package_id', '$name', '$email', '$phone', '$pax', '$price')";
    $query = mysqli_query($conn, $sql);

    if($query){
        $_SESSION['success'] = 'Booking successful';
        header('Location: ../index.php');
    }else{
        $_SESSION['errors'][] = 'Failed to book';
        header('Location: ../checkout.php');
    }
}


