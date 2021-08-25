<?php
    //echo 'SUBMITTED';
    require_once('vendor/autoload.php');

    //SERVER-SIDE TEST KEY TOKEN
    \Stripe\Stripe::setApiKey('sk_test_bQfmI7W9ax7fw6ktUdjYGTXF');

    // Sanitize POST Array
    $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
    $email = $POST['email'];
    $token = $POST['stripeToken'];

    // echo $token; //TOKEN CHECK

    // Create Customer In Stripe
    $customer = \Stripe\Customer::create(array(
         "email" => $email,
         "source" => $token
    ));

    //Charge Customer
    $charge = \Stripe\Charge::create(array(
        "amount" => 10,
        "currency" => "LKR",
        "description" => "Book worker",
        "customer" => $customer->id
    ));

    //print array of $charge
    //print_r($charge);

    // Redirect to success
    header('Location: success.php?tid='.$charge->id.'&product='.$charge->description);
