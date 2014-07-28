<?php
require '_require.php';

Stripe::setApiKey(STRIPE_SECRET);
try {
	$stripe_charge=Stripe_Charge::create(array(
		'amount'=>$_POST['pay']*100,
		'currency'=>$_POST['currency'],
		'card'=>$_POST['stripe'],
		'description'=>'Single payment',
	));
}
catch (Exception $e){
	die('Unfortunately something has gone wrong. No payment has been taken. The Stripe payment gateway reported: '.$e->getMessage());
	log_file(print_r($e,true),'Pay',DIR.'logs/stripe-errors.log');
}
log_file(print_r($stripe_charge,true),'Pay',DIR.'logs/stripe.log');
try {
	$stripe_charge=$stripe_charge->capture();
	// if this fails the card has already been charged
}
catch (Exception $e){
	log_file(print_r($e,true),'Charge',DIR.'logs/stripe-errors.log');
}
redirect('index.php?paid='.$_POST['pay']);