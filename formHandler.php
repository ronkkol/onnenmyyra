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
require_once 'lib/swift_required.php';


$transport = Swift_SmtpTransport::newInstance('ssmtp-serveri', smtp-portti)
  ->setUsername('kayttajanimi')
  ->setPassword('salasana')
  ;

$maileri = Swift_Mailer::newInstance($transport);

$message = Swift_Message::newInstance('Palautetta')
  ->setFrom(array('$email' => '$name'))
  ->setTo(array('paivakotionnenmyyra@gmail.com' => 'Onnenmyyra'))
  ->setBody('$message')
  ;

// Send the message
$result = $maileri->send($message);
}

?>