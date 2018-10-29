<?php

require('includes/utilities.inc.php');
require_once('includes/error_handler.inc.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $email = $_POST['email'];
    $password = $_POST['pass'];
    
    $query = 'SELECT id, userType, username, email FROM users WHERE email=:email AND pass=SHA1(:pass)';
    $stmt = $pdo->prepare($query);
    $results = $stmt->execute(array(':email' => $email,
                                    ':pass' => $password));

    if ($results)
    {
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $user = $stmt->fetch();
    }
    else
    {
        Error_H::clientMessage('Soar-e a-boot dat.');
        Error_H::serverMessage('$results');
    }

    if ($user)
    {
        $_SESSION['user'] = $user;
        header("Location: index.php");
        exit;
    }
}
else
{
    $pageTitle = 'Login';
    include('includes/header.inc.php');
    include('views/login.view.php');
    include('includes/footer.inc.php');
}
