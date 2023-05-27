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
            header('location: /admin/packages/');
        }else{
            $errors[] = 'Failed to add package';
        }
    }

    $_SESSION['errors'] = $errors;
    header('location: ../packages/create.php');
}

if( isset($_POST['edit_package']) ){
    $name = $_POST['name'] ? trim($_POST['name']) : '';
    $from_id = $_POST['from_id'] ? trim($_POST['from_id']) : '';
    $to_id = $_POST['to_id'] ? trim($_POST['to_id']) : '';
    $price = $_POST['price'] ? trim($_POST['price']) : '';
    $descriptions = $_POST['descriptions'] ? trim($_POST['descriptions']) : '';
    $from_date = $_POST['from_date'] ? trim($_POST['from_date']) : '';
    $to_date = $_POST['to_date'] ? trim($_POST['to_date']) : '';
    $images = $_FILES['images'] ?? '';
    $id = $_POST['id'] ?? '';

    $errors = [];
    // Check any empty value
    if( empty($name) || empty($from_id) || empty($to_id) || empty($price) || empty($from_date) || empty($to_date) ){
        $errors[] = 'All fields are required';
    }

    if( $from_id === $to_id ){
        $errors[] = 'From and To locations should be different';
    }
    
    // Insert package
    if( empty($errors) ){
        // Upload images
        $images = uploadMultipleImages($images);

        $query = "UPDATE packages SET name = '$name', from_id = '$from_id', to_id = '$to_id', price = '$price', descriptions = '$descriptions', from_date = '$from_date', to_date = '$to_date' WHERE id = '$id'";
        $result = mysqli_query($conn, $query);

        if( $result ){
            header('location: /admin/packages/');
        }else{
            $errors[] = 'Failed to add package';
        }
    }

    $_SESSION['errors'] = $errors;
    header('location: ../packages/edit.php?id='. $id);
}

if( isset($_GET['delete_id']) ){
    $id = $_GET['delete_id'] ?? '';

    if( $id == '' || ! is_numeric($id) ){
        $errors[] = 'Invalid user id';
    }

    if( empty($errors) ){
        deletePackage($id);
    }

    $_SESSION['errors'] = $errors;
    header('location: /admin/packages/');
}

function uploadImage($image, $dir = '/images/'){

    // Get reference to uploaded image
    $image_file = $image;

    // Exit if no file uploaded
    if (!isset($image_file)) {
        die('No file uploaded.');
    }

    // Exit if is not a valid image file
    $image_type = exif_imagetype($image_file["tmp_name"]);
    if (!$image_type) {
        die('Uploaded file is not an image.');
    }

    // Move the temp image file to the images/ directory
    move_uploaded_file(
        // Temp image location
        $image_file["tmp_name"],

        // New image location
        $_SERVER['DOCUMENT_ROOT'] . $dir . $image_file["name"]
    );    
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

    $package = mysqli_num_rows($result) > 0 ? mysqli_fetch_assoc($result) : null;

    return $package;
}

function deletePackage($id){
    global $conn;

    $query = "DELETE FROM packages WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if( $result ){
        header('location: /admin/packages/');
    }else{
        $errors[] = 'Failed to delete package';
    }
}

function searchPackages($from_id, $to_id, $name){

    $from_id = $from_id ? trim($from_id) : '';
    $to_id = $to_id ? trim($to_id) : '';
    $name = $name ? trim($name) : '';

    // Initialize query
    $query = "SELECT * FROM packages WHERE 1 = 1 AND ";

    // filter query with from_id 
    $query .= $from_id ? "from_id = '$from_id' OR " : '';

    // filter query with to_id
    $query .= $to_id ? "to_id = '$to_id' OR " : '';

    // filter query with name
    $query .= $name ? "name LIKE '%$name%' OR " : '';

    
    // Remove the last OR and AND
    $query = rtrim($query, 'OR ');
    $query = rtrim($query, 'AND ');

    // die($query);

    global $conn;
    
    // Execute query
    $result = mysqli_query($conn, $query);

    $packages = mysqli_num_rows($result) > 0 ? mysqli_fetch_all($result, MYSQLI_ASSOC) : null;

    return $packages;

}