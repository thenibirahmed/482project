<?php 

require $_SERVER['DOCUMENT_ROOT'] .'/inc/connection.php';

function getBookings(){
    global $conn;

    $query = "SELECT * FROM bookings";
    $result = mysqli_query($conn, $query);

    $bookings = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $bookings;
}

