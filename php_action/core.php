<?php 

session_start();

require_once 'db_connect.php';

// echo $_SESSION['userId'];

if(!$_SESSION['userId']) {
	header('location:'.$store_url);	
} 

// Currency formatting function
function formatCurrency($amount) {
	global $currency;
	return $currency . ' ' . number_format($amount, 2);
}

?>