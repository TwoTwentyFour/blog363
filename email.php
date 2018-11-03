<?php 

$to = 'dserres@protonmail.com';
$subject = 'TEST';
$message = 'This is a test of my email function.';

$results = mail($to, $subject, $message);

if ($results)
{
    echo '<p>You\'ve got mail!</p>';
}
