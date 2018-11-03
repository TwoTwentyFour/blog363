<?php 

$to = 'dserres@protonmail.com';
$subject = 'TEST';
$message = 'This is a test of my email function.';

mail($to, $subject, $message);

