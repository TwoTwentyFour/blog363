<?php 

require('includes/error_handler.inc.php');

$var = null;

if ($var)
{
    echo 'Hello';
}
else
{
    ERROR_H::clientMessage('Soar-e a-boot dat.');
    Error_H::serverMessage('$var');
}
