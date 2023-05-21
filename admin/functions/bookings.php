<?php 

require $_SERVER['DOCUMENT_ROOT'] .'/inc/connection.php';

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

    $booking = mysqli_num_rows($result) > 0 ? mysqli_fetch_assoc($result) : null;

    return $booking;
}


