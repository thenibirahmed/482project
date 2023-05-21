<?php 

require $_SERVER['DOCUMENT_ROOT'] .'/inc/connection.php';

if( isset($_GET['delete_id']) ){
    $id = $_GET['delete_id'] ?? '';

    if( $id == '' || ! is_numeric($id) ){
        $errors[] = 'Invalid user id';
    }

    if( empty($errors) ){
        deleteLocation($id);
    }

    $_SESSION['errors'] = $errors;
    header('location: /admin/locations/');
}

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

if( isset($_POST['edit_location']) ){
    $name = $_POST['location_name'] ?? '';
    $id = $_POST['location_id'] ?? '';
    $name = trim($name);

    if( empty($name) ){
        $errors[] = 'Location name is required';
    }

    // Check if location already exists
    $query = "SELECT * FROM locations WHERE name = '$name'";
    $result = mysqli_query($conn, $query);

    if( mysqli_num_rows($result) > 1 ){
        $errors[] = 'Location already exists';
    }

    if( empty($errors) ){

        $query = "UPDATE locations SET name = '$name' WHERE id = $id";
        $result = mysqli_query($conn, $query);

        if( $result ){
            header('location: /admin/locations/');
        }else{
            $errors[] = 'Failed to add location';
        }
    }

    $_SESSION['errors'] = $errors;
    header('location: /admin/locations/');
}

function getLocations(){
    global $conn;

    $query = "SELECT * FROM locations";
    $result = mysqli_query($conn, $query);

    $locations = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $locations;
}

function getSingleLocation($id){
    global $conn;

    $query = "SELECT * FROM locations WHERE id = $id";
    $result = mysqli_query($conn, $query);

    $location = mysqli_num_rows($result) > 0 ? mysqli_fetch_assoc($result) : null;

    return $location;
}

function deleteLocation($id){
    global $conn;

    $query = "DELETE FROM locations WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if( $result ){
        header('location: /admin/locations/');
    }else{
        $errors[] = 'Failed to delete location';
    }

    $_SESSION['errors'] = $errors;
    header('location: ./admin/locations/');
}

