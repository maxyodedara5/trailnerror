<?php 
$errors = '';
$myemail = 'maxyodedara5@gmail.com';//<-----Put Your email address here.
if(empty($_POST['contactName'])  || 
   empty($_POST['contactEmail']) || 
   empty($_POST['contactMessage']))
{
    $errors .= "\n Error: all fields are required";
}

$name = $_POST['contactName']; 
$email_address = $_POST['contactEmail']; 
$message = $_POST['contactMessage']; 

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
	$to = $myemail; 
	$email_subject = "Contact form submission: $name";
	$email_body = "You have received a new message. ".
	" Here are the details:\n Name: $name \n Email: $email_address \n Message \n $message"; 
	
	$headers = "From: $myemail\n"; 
	$headers .= "Reply-To: $email_address";
	
	$mail = mail($to,$email_subject,$email_body,$headers);
	//redirect to the 'thank you' page

	if ($mail) { echo "OK"; }
	else { echo "Something went wrong"; }
} 
?>
