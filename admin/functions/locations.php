<?php 

require $_SERVER['DOCUMENT_ROOT'] .'/inc/connection.php';

if( isset($_POST['add_location']) ){
    $name = $_POST['location_name'] ?? '';
    $name = trim($name);

    if( empty($name) ){
        $errors[] = 'Location name is required';
    }

    // Check if location already exists
    $query = "SELECT * FROM locations WHERE name = '$name'";
    $result = mysqli_query($conn, $query);

    if( mysqli_num_rows($result) > 0 ){
        $errors[] = 'Location already exists';
    }

    if( empty($errors) ){

        $query = "INSERT INTO locations (name) VALUES ('$name')";
        $result = mysqli_query($conn, $query);

        if( $result ){
            header('location: ../locations/index.php');
        }else{
            $errors[] = 'Failed to add location';
        }
    }

    $_SESSION['errors'] = $errors;
    header('location: ../locations/index.php');
}

function getLocations(){
    global $conn;

    $query = "SELECT * FROM locations";
    $result = mysqli_query($conn, $query);

    $locations = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $locations;
}