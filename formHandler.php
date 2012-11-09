<?php
$errors = '';
if(empty($_POST['name'])  ||
   empty($_POST['email']) ||
   empty($_POST['message']))
{
    $errors .= "\n Error: Täytä kaikki kentät";
}
$name = $_POST['name'];
$email_address = $_POST['email'];
$message = $_POST['message'];
if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
$email_address))
{
    $errors .= "\n Error: Väärä sähköposti";
}

if( empty($errors))
{
require_once 'swiftmailer/lib/swift_required.php';

require_once 'includes/config.php';

$transport = Swift_SmtpTransport::newInstance($config['smtp-server'])
  ->setUsername('kayttajanimi')
  ->setPassword('salasana')
  ;

$maileri = Swift_Mailer::newInstance($transport);

$message = Swift_Message::newInstance('Palautetta')
  ->setFrom(array($email_address => $name))
  ->setTo(array($config['feedback-recipient'] => 'Onnenmyyra'))
  ->setBody($message)
  ;

// Send the message
$result = $maileri->send($message);

echo("Palaute lähetetty!");
}


