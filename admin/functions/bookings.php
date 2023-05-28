<?php 

require $_SERVER['DOCUMENT_ROOT'] .'/inc/connection.php';

if(isset($_GET['mark_as_paid'])){
    $id = $_GET['mark_as_paid'] ?? '';
    
    if( $id != '' || $id != null ){
        markBookingAsPaid($id);
    }
}

if(isset($_GET['mark_as_unpaid'])){
    $id = $_GET['mark_as_unpaid'] ?? '';
    
    if( $id != '' || $id != null ){
        markBookingAsUnpaid($id);
    }
}

if( isset($_POST['update_booking']) ){

    $name = $_POST['name'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $email = $_POST['email'] ?? '';
    $address = $_POST['address'] ?? '';
    $user_id = $_POST['user_id'] ?? '';
    $package_id = $_POST['package_id'] ?? '';
    $is_paid = $_POST['is_paid'] ?? 0;
    $members_info = $_POST['members_info'] ?? '';
    $pax = $_POST['pax'] ?? '';
    $id = $_POST['id'] ?? '';

    if(empty($name) || empty($phone) || empty($email) || empty($address) || empty($user_id) || empty($package_id) || empty($members_info) || empty($pax)){
        $_SESSION['errors'][] = 'Please fill all the fields';
    }

    if( empty($errors) ){
        $sql = "UPDATE bookings SET name = '$name', phone = '$phone', email = '$email', address = '$address', user_id = '$user_id', package_id = '$package_id', is_paid = '$is_paid', members_info = '$members_info', pax = '$pax' WHERE id = '$id'";
        $query = mysqli_query($conn, $sql);
    }
    
    header('Location: /admin/bookings/edit.php?id=' . $id);
}

if( isset($_GET['delete_id']) ){
    $id = $_GET['delete_id'] ?? '';

    if( $id == '' || ! is_numeric($id) ){
        $errors[] = 'Invalid booking id';
    }

    if( empty($errors) ){
        deleteBooking($id);
    }

    $_SESSION['errors'] = $errors;
    header('location: /admin/');
}

function getBookings(){
    global $conn;

    $query = "SELECT * FROM bookings";
    $result = mysqli_query($conn, $query);

    $bookings = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $bookings;
}

function getSingleBooking($id){
    global $conn;

    $query = "SELECT * FROM bookings WHERE id = $id";
    $result = mysqli_query($conn, $query);

    $booking = mysqli_num_rows($result) > 0 ? mysqli_fetch_assoc($result) : null;

    return $booking;
}

function getSingleUsersBooking($id){
    global $conn;

    $query = "SELECT * FROM bookings WHERE user_id = $id";
    $result = mysqli_query($conn, $query);

    $bookings = mysqli_num_rows($result) > 0 ? mysqli_fetch_all($result, MYSQLI_ASSOC) : null;

    return $bookings;
}

function deleteBooking($id){
    global $conn;

    $query = "DELETE FROM bookings WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if( $result ){
        header('location: ../bookings/index.php');
    }else{
        $errors[] = 'Failed to delete booking';
    }

    $_SESSION['errors'] = $errors;
    header('location: ../bookings/index.php');
}

function getPackageBookings($id){
    global $conn;

    $query = "SELECT * FROM bookings WHERE package_id = $id";
    $result = mysqli_query($conn, $query);

    $bookings = mysqli_num_rows($result) > 0 ? mysqli_fetch_all($result, MYSQLI_ASSOC) : null;

    return $bookings;
}

function getPackageBookingsRevenue($id){
    global $conn;

    $query = "SELECT SUM(price) AS revenue FROM bookings WHERE is_paid = 1 AND package_id = $id";
    $result = mysqli_query($conn, $query);

    $revenue = mysqli_num_rows($result) > 0 ? mysqli_fetch_assoc($result) : null;

    return $revenue;
}

function getPackageBookingsDue($id){
    global $conn;

    $query = "SELECT SUM(price) AS due FROM bookings WHERE is_paid = 0 AND package_id = $id";
    $result = mysqli_query($conn, $query);

    $revenue = mysqli_num_rows($result) > 0 ? mysqli_fetch_assoc($result) : null;

    return $revenue;
}

function markBookingAsPaid($id){
    global $conn;

    $query = "UPDATE bookings SET is_paid = 1 WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if( $result ){
        header('location: /admin');
    }else{
        $errors[] = 'Failed to mark booking as paid';
    }

    $_SESSION['errors'] = $errors;
    header('location: /admin');
}

function markBookingAsUnpaid($id){
    global $conn;

    $query = "UPDATE bookings SET is_paid = 0 WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if( $result ){
        header('location: /admin');
    }else{
        $errors[] = 'Failed to mark booking as paid';
    }

    $_SESSION['errors'] = $errors;
    header('location: /admin');
}