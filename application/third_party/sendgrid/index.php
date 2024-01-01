<?php
require 'vendor/autoload.php';

$email = new \SendGrid\Mail\Mail();
$email->setFrom("hello@indyverse.in","Ganesh Kangane");
$email->setSubject("Sendgrid Updated First Mail");
$email->addTo("ganeshkangane.4fox@gmail.com","Ganesh K");
$email->addBcc("ganeshkangane11@gmail.com","G K");
$email->addContent("text/plain","its very easy to send email from sendgrid");
$email->addContent("text/html","<strong>its very easy to send email from sendgrid and its fun</strong>");

$sendgrid = new \SendGrid("SG.zsko200RT4Wzt4NcQ7cBDQ.q19xh5wFUF_5BmEUF7FErhb4B4lwtCSRSbizB5_5555");

try{
    $response = $sendgrid->send($email);
    print $response->statusCode(). "\n";
    print_r($response->headers());

}catch(Exception $e){
    echo 'caught exception:'.$e->getMessage(). "\n";
}

?>