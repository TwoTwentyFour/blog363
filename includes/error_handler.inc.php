<?php 

class Error_H
{
    public function __construct()
    {
        die('This class is static, leave it alone.');
    }    

    public function clientMessage($message = "Standard Message")
    {
        echo '<p style="color: red;">Error: ' . $message . '</p>';
    }

    public function serverMessage(string $varname)
    {
        $dir = getcwd();
        $file = basename($_SERVER['PHP_SELF']);
        $message = 'Check the value of: ' . $varname . ' in ' . $dir . ' ' . $file;
        error_log($message, 0, 'error.log');
    }
}
