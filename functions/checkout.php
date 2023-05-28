<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/admin/functions/packages.php";
require_once $_SERVER['DOCUMENT_ROOT'] . '/inc/connection.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/lib/SslCommerzNotification.php";
// require_once $_SERVER['DOCUMENT_ROOT'] . "/db_connection.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/OrderTransaction.php";

use SslCommerz\SslCommerzNotification;


if(isset($_POST['checkout'])){

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

    $sql = "INSERT INTO bookings (user_id, package_id, name, email, phone, pax, price, members_info) VALUES ('$user_id', '$package_id', '$name', '$email', '$phone', '$pax', '$price', '$members_info')";
    $query = mysqli_query($conn, $sql);

    if($query){

        $ap_key='175589388382444820230124030139pmShsZYiQC'; 
        $sender_id='361';
        $mobile_no=$phone;
        $message="Dear $fname sir/maam, Your Booking is successful. Have an amazing trip!";
        $user_email='thenibirahmed@gmail.com';
        sendSMS($ap_key,$sender_id,$mobile_no,$message,$user_email);

        $last_id = $conn->insert_id;
        initiateSSLCommerz($name,$email,$phone,$price,$last_id);

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


function initiateSSLCommerz($name,$email,$phone,$amount,$last_id){
    global $conn;
    # Organize the submitted/inputted data
    $post_data = array();

    $post_data['total_amount'] = $amount;
    $post_data['currency'] = "BDT";
    $post_data['tran_id'] = "SSLCZ_TEST_" . uniqid();

    # CUSTOMER INFORMATION
    $post_data['cus_name'] = $name;
    $post_data['cus_email'] = $email;
    $post_data['cus_add1'] = "Dhaka";
    $post_data['cus_add2'] = "Dhaka";
    $post_data['cus_city'] = "Dhaka";
    $post_data['cus_state'] = "Dhaka";
    $post_data['cus_postcode'] = "1000";
    $post_data['cus_country'] = "Bangladesh";
    $post_data['cus_phone'] = $phone;
    $post_data['cus_fax'] = "01711111111";

    # SHIPMENT INFORMATION
    $post_data["shipping_method"] = "YES";
    $post_data['ship_name'] = "Store Test";
    $post_data['ship_add1'] = "Dhaka";
    $post_data['ship_add2'] = "Dhaka";
    $post_data['ship_city'] = "Dhaka";
    $post_data['ship_state'] = "Dhaka";
    $post_data['ship_postcode'] = "1000";
    $post_data['ship_phone'] = "";
    $post_data['ship_country'] = "Bangladesh";

    $post_data['emi_option'] = "1";
    $post_data["product_category"] = "Electronic";
    $post_data["product_profile"] = "general";
    $post_data["product_name"] = "Computer";
    $post_data["num_of_item"] = "1";

    $query = new OrderTransaction();
    $sql = $query->saveTransactionQuery($post_data);

    if ($conn->query($sql) === TRUE) {
        # Call the Payment Gateway Library
        $sslcomz = new SslCommerzNotification();
        $sslcomz->makePayment($post_data, 'hosted', 'json', $last_id);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}