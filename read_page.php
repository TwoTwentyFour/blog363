<?php 

require('includes/utilities.inc.php');
require_once('includes/error_handler.inc.php');
include('includes/header.inc.php');

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
    $query = 'SELECT id, title, content, DATE_FORMAT(dateAdded, "%e %M %Y") AS dateAdded FROM pages WHERE id=:id';
    $stmt = $pdo->prepare($query);
    $results = $stmt->execute(array(':id' => $_GET['id']));

    if ($results)
    {
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Page');
        $page = $stmt->fetch();

        if ($page)
        {
            $pageTile = $page->getTitle();
            include('views/read_page.view.php');
        }
        else
        {
            Error_H::clientMessage('Soar-e a-boot dat.');
            Error_H::serverMessage('$page');
        }
    }
    else
    {
        Error_H::clientMessage('Soar-e a-boot dat.');
        Error_H::serverMessage('$results');
    }
}

include('includes/footer.inc.php');
