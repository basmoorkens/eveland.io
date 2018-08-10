<?php
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

$to = "garthwells4@gmail.com";
$subject="Eveland.io - contact form";
$body = "<html><head></head><body>On: " . date('Y/m/d H:i:s') .
        "\n<br /> Name:  " . $name .
        "\n<br />" . "Email: " . $contact .
        "\n<br /> Phone number: " . $phone .
        "\n<br /> Filled in the contact form: <br />" . $msg .
        "</body></html>";
$from="contactform@eveland.io";
$from_name="Eveland.IO contactform";

$json = send_mailgun($to, $subject, $body,$from);
function send_mailgun($to, $subject, $body, $from){

        $config = array();

        $config['api_key'] = "YOUR KEY";

$config['api_url'] = "https://api.mailgun.net/v3/sandbox225421aaa2cc4212aa5088cacf302930.mailgun.org/messages";

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

