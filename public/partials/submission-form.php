<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://webmkit.com
 * @since      1.0.0
 *
 * @package    Book_For_Junk
 * @subpackage Book_For_Junk/public/partials
 */

$errors = [];

if(! isset($_POST['mts_junk_book_checkout'])){
    return;
}{
	if(! wp_verify_nonce($_POST['_wpnonce'], 'mts_new_junk_book_checkout')){
	    wp_die('<div style="color:red;">Are you cheating?</div>');
	}

	$data['waste_type'] = isset($_POST['waste_type']) ? sanitize_text_field($_POST['waste_type']) : '';
	$data['drop_of_type'] = isset($_POST['drop_of_type']) ? sanitize_text_field($_POST['drop_of_type']) : '';
	$data['skip'] = isset($_POST['mts_skip']) ? sanitize_text_field($_POST['mts_skip']) : '';
	$data['drop_off_date'] = isset($_POST['mts_drop_off_date']) ? sanitize_text_field($_POST['mts_drop_off_date']) : '';
	$data['collection_from_date'] = isset($_POST['mts_collection_from_date']) ? sanitize_text_field($_POST['mts_collection_from_date']) : '';


	// billing information
	$data['first_name'] = isset($_POST['mts_first_name']) ? sanitize_text_field($_POST['mts_first_name']) : '';
	$data['last_name'] = isset($_POST['mts_last_name']) ? sanitize_text_field($_POST['mts_last_name']) : '';
	$data['address'] = isset($_POST['mts_address']) ? sanitize_text_field($_POST['mts_address']) : '';
	$data['city'] = isset($_POST['mts_city']) ? sanitize_text_field($_POST['mts_city']) : '';
	$data['postcode'] = isset($_POST['mts_postcode']) ? sanitize_text_field($_POST['mts_postcode']) : '';
	$data['email'] = isset($_POST['mts_email']) ? sanitize_text_field($_POST['mts_email']) : '';
	$data['phone'] = isset($_POST['mts_phone']) ? sanitize_text_field($_POST['mts_phone']) : '';


	if (empty($data['waste_type'])) {
        $errors[] = "Waste Type is required.";
    }

    if( empty($data['drop_of_type']) ){
    	$errors[] = "Drop of type is required.";
    }

    if( empty($data['skip']) ){
    	$errors[] = "Skip is required.";
    }

    if( empty($data['drop_off_date']) ){
    	$errors[] = "Drop of date is required.";
    }

    if( empty($data['collection_from_date']) ){
    	$errors[] = "Collection from date is required.";
    }

    if( empty($data['first_name']) ){
    	$errors[] = "First Name is required.";
    }

    if( empty($data['last_name']) ){
    	$errors[] = "Last Name is required.";
    }

    if( empty($data['address']) ){
    	$errors[] = "Address is required.";
    }

    if( empty($data['city']) ){
    	$errors[] = "City is required.";
    }

    if( empty($data['postcode']) ){
    	$errors[] = "Postcode is required.";
    }

    if( empty($data['email'] ) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL) ){
    	$errors[] = "Valid email is required.";
    }

    if( empty($data['phone']) ){
    	$errors[] = "Phone is required.";
    }

    if (empty($errors)) {
		$order_address = array(
			'first_name' => $data['first_name'],
			'last_name' => $data['last_name'],
			'address' => $data['address'],
			'city' => $data['city'],
			'postcode' => $data['postcode'],
			'email' => $data['email'],
			'phone' => $data['phone'],
		);

		$order_note = "Waste Type: ".$data['waste_type']."\n Drop of type: ".$data['drop_of_type']."\n Drop of Date: ".$data['drop_off_date']."\n Collection from date: ".$data['collection_from_date'];

		$order_data = array(
			'waste_type'=> $data['waste_type'],
			'drop_of_type' => $data['drop_of_type'],
			'drop_of_date' => $data['drop_off_date'],
			'collection_from_date' => $data['collection_from_date']
		);


		$order = wc_create_order();

		$order->set_billing_address($order_address);
		$order->set_shipping_address($order_address);

		$order->add_product(wc_get_product($data['skip']), 1);

		$order->calculate_totals();

		$order->add_order_note($order_note);

		//header( $order->get_checkout_payment_url() );
		echo '<script>window. location. href="'.$order->get_checkout_payment_url().'";</script>';
	    exit;
	}else{
		foreach ($errors as $error) {
            echo "<p style='color:red'>$error</p>";
        }
	}
}


?>

