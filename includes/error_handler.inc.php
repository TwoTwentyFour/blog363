<?php 

class Error_H
{
    public function __construct()
    {
        die('This class is static, leav it alone.');
    }    

    public function clientMessage($message)
    {
        echo '<p style="color: red;">Error: ' . $message . '</p>';
    }

    public function serverMessage($message)
    {
        error_log($message, 0, 'error.log');
    }
}
