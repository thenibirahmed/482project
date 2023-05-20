<?php 

require $_SERVER['DOCUMENT_ROOT'] .'/inc/connection.php';

if( isset($_POST['create_package']) ){
    $name = $_POST['name'] ? trim($_POST['name']) : '';
    $from_id = $_POST['from_id'] ? trim($_POST['from_id']) : '';
    $to_id = $_POST['to_id'] ? trim($_POST['to_id']) : '';
    $price = $_POST['price'] ? trim($_POST['price']) : '';
    $descriptions = $_POST['descriptions'] ? trim($_POST['descriptions']) : '';
    $from_date = $_POST['from_date'] ? trim($_POST['from_date']) : '';
    $to_date = $_POST['to_date'] ? trim($_POST['to_date']) : '';
    $images = $_FILES['images'] ?? '';

    $errors = [];
    // Check any empty value
    if( empty($name) || empty($from_id) || empty($to_id) || empty($price) || empty($descriptions) || empty($from_date) || empty($to_date) ){
        $errors[] = 'All fields are required';
    }

    if( $from_id === $to_id ){
        $errors[] = 'From and To locations should be different';
    }
    
    // Insert package
    if( empty($errors) ){
        // Upload images
        $images = uploadMultipleImages($images);

        $query = "INSERT INTO packages (name, from_id, to_id, price, descriptions, from_date, to_date) VALUES ('$name', '$from_id', '$to_id', '$price', '$descriptions', '$from_date', '$to_date')";
        $result = mysqli_query($conn, $query);

        if( $result ){
            header('location: ../packages/index.php');
        }else{
            $errors[] = 'Failed to add package';
        }
    }

    $_SESSION['errors'] = $errors;
    header('location: ../packages/create.php');
}

function uploadMultipleImages($images){
    // Upload images
    $images = $_FILES['images'] ?? '';    
}

function getPackages(){
    global $conn;

    $query = "SELECT * FROM packages";
    $result = mysqli_query($conn, $query);

    $packages = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $packages;
}

function getSinglePackage($id){
    global $conn;

    $query = "SELECT * FROM packages WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    $package = mysqli_fetch_assoc($result);

    return $package;
}
