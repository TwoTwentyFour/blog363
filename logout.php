<?php 

require('includes/utilities.inc.php');

if ($user)
{
    $user = null;
    $_SESSION = array();
    setcookie(session_name(), false, time() - 3600);
    session_destroy();
}

$pageTitle = 'Logout';
include('includes/header.inc.php');
include('views/logout.view.php');
include('includes/footer.inc.php');
