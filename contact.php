<?php 

require('includes/error_handler.inc.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $to = 'dserres@pm.me';

    $name = trim($_POST['name']);
    $name = stripslashes($name);
    $name = htmlspecialchars($name);

    $email = trim($_POST['email']);
    $email = stripslashes($email);
    $email = htmlspecialchars($email);

    $message = trim($_POST['message']);
    $message = stripslashes($message);
    $message = htmlspecialchars($message);

    $subject = $name .' at ' . $email . ' says:';

    $results = mail($to, $subject, $message);

    if ($results)
    {
        include('includes/header.inc.php');
        echo '<p>Your message has been sent. Thank you so much!</p>';
        include('includes/footer.inc.php');
    }
    else
    {
        include('includes/header.inc.php');
        Error_H::clientMessage('Soar-e-aboot dat.');
        Error_H::serverMessage('$results');
        include('includes/footer.inc.php');
    }
}
else
{
    include('includes/header.inc.php');
    include('views/contact.view.php');
    include('includes/footer.inc.php');
}

