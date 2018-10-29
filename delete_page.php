<?php 

require('includes/utilities.inc.php');
require('includes/error_handler.inc.php');


if (!isset($_GET['id']) ||
    !filter_var($_GET['id'],
                FILTER_VALIDATE_INT,
                array('min_range' => 1)))
{
    
    Error_H::clientMessage('Soar-e a-boot dat.');
    Error_H::serverMessage('$_GET[\'id\']');
}
else
{
    $query = 'DELETE FROM pages WHERE id=:id';
    $stmt = $pdo->prepare($query);
    $results = $stmt->execute(array(':id' => $_GET['id']));

    include('includes/header.inc.php');

    if ($results)
    {
        include('views/delete_page.view.php');
    }
    else
    {
        Error_H::clientMessage('Soar-e a-boot dat.');
        Error_H::serverMessage('$results');
    }
}


include('includes/footer.inc.php');
