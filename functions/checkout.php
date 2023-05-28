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

        $ap_key='175589388382444820230124030139pmShsZYiQC'; 
        $sender_id='361';
        $mobile_no=$phone;
        $message='Your Booking is successful. Have an amazing trip!';
        $user_email='thenibirahmed@gmail.com';
        $reponse = sendSMS($ap_key,$sender_id,$mobile_no,$message,$user_email);

        $_SESSION['success'] = 'Booking successful';
        header('Location: ../index.php');
    }else{
        $_SESSION['errors'][] = 'Failed to book';
        header('Location: ../checkout.php');
    }
}

function sendSMS($ap_key,$sender_id,$mobile_no,$message,$user_email){
	$url = 'https://24bulksms.com/24bulksms/api/api-sms-send';
	$data = array('api_key' => $ap_key,
	 'sender_id' => $sender_id,
	 'message' => $message,
	 'mobile_no' =>$mobile_no,
	 'user_email'=> $user_email		
	 );

	// use key 'http' even if you send the request to https://...
	$curl = curl_init($url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);     
    $output = curl_exec($curl);
    curl_close($curl);
	print_r($output); 
}


