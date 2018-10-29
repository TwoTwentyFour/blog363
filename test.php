<?php 

require('includes/error_handler.inc.php');

echo phpinfo();


$val = null;

if ($val)
{
    echo 'Hello';
}
else
{
    Error_H::clientMessage('Soar-e aboot that.');
    Error_H::serverMessage('val is null in test.php');
}


