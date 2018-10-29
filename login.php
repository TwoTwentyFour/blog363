<?php

require('includes/utilities.inc.php');
require('includes/error_handler.inc.php');

set_include_path(get_include_path() . PATH_SEPARATOR . '/usr/local/pear/share/pear');
require('HTML/QuickForm2.php');
$form = new HTML_QuickForm2('loginForm');

$email = $form->addElement('text', 'email');
$email->setLabel('Email Address');
$email->addFilter('trim');
$email->addRule('required', 'Please enter an email address.');
$email->addRule('email', 'Please enter an email address.');

$password = $form->addElement('password','pass');
$password->setLabel('Password');
$password->addFilter('trim');
$password->addRule('required', 'Please enter your password.');

$form->addElement('submit', 'submit', array('value' => 'Login'));

if ($form->validate())
{
    $query = 'SELECT id, userType, username, email FROM users WHERE email=:email AND pass=SHA1(:pass)';
    $stmt = $pdo->prepare($query);
    $results = $stmt->execute(array(':email' => $email->getValue(), ':pass' => $password->getValue()));

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

$pageTitle = 'Login';
include('includes/header.inc.php');
include('views/login.view.php');
include('includes/footer.inc.php');
