<?php
echo $_POST["name"];
if(isset($_POST["name"])) {
$name = $_POST["name"];
}
if(isset($_POST["message"])) {
$msg = $_POST["message"];
}
if(isset($_POST["email"])){
$contact = $_POST["email"];
}
if(isset($_POST["phone"])){
$phone = $_POST["phone"];
}

$to = "bas.moorkens@gmail.com";
$subject="Eveland.io - contact form";
$body = "On: " . date('Y/m/d H:i:s') .  "\n  " . $name . "\n" . " with email " . $contact . " and phone number " . $phone . " \nFilled in the contact form: " . $msg;
$from="grotepiemel@basmoorkens.be";
$from_name="bas test";

$json = send_mailgun($to, $subject, $body,$from);

function send_mailgun($to, $subject, $body, $from){
 
	$config = array();
 
	$config['api_key'] = "key-86494fe915f4b09e3f5e85efbc679435";
 
	$config['api_url'] = "https://api.mailgun.net/v2/sandbox225421aaa2cc4212aa5088cacf302930.mailgun.org/messages";
 
	$message = array();
 
	$message['from'] = $from;
 
	$message['to'] = $to;
 
 
	$message['subject'] = $subject;
 
	$message['html'] = $body;
 
	$ch = curl_init();
 
	curl_setopt($ch, CURLOPT_URL, $config['api_url']);
 
	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
 
	curl_setopt($ch, CURLOPT_USERPWD, "api:{$config['api_key']}");
 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
 
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
 
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
 
	curl_setopt($ch, CURLOPT_POST, true); 
 
	curl_setopt($ch, CURLOPT_POSTFIELDS,$message);
 
	$result = curl_exec($ch);
 
	curl_close($ch);
 
	return $result;
 
}

?>
