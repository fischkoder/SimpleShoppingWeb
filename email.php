<?php
	session_start();

$email = $_GET['email'];
$firstname = $_GET['lastname'];
$lastname = $_GET['firstname'];
$address = $_GET['address'];

$to = $email;
$subject = "[The mail title you want to put]";
$message = "<html><body>";
$message .= "<h1>[Header inside the mail body]</h1>";
$message .= "<h4>Firstname:".$firstname."</h4>";
$message .= "<h4>lastname:".$lastname."</h4>";
$message .= "<h4>address:".$address."</h4>";

$message .= "<table>";
	foreach ($_SESSION[''] as $a) {	
	$message .= 
	}
$message .="</table>";

$message .="</body></html>";
$from = "";
$headers = "From: [Your Store Name] \r\n";
$headers .= "Content-type: text/html\r\n";
mail($to,$subject,$message,$headers);
echo "Thanks for shopping in our store.";


session_destroy();

?>