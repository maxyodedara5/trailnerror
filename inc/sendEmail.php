<?php
if(!empty($_POST["send"])) {
	$name = $_POST["contactName"];
	$email = $_POST["contactEmail"];
	$subject = $_POST["contactSubject"];
	$content = $_POST["contactMessage"];

	$toEmail = 'maxyodedara5@gmail.com';
	$mailHeaders = "From: " . $name . "<". $email .">\r\n";
	if(mail($toEmail, $subject, $content, $mailHeaders)) {
	    $message = "Your contact information is received successfully.";
	    $type = "success";
	}else{
		echo "Something went wrong. Please try again.";
	}
}
require_once "contact-view.php";
?>