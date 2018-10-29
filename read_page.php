<?php 

require('includes/utilities.inc.php');
include('includes/header.inc.php');

if (!isset($_GET['id']) ||
    !filter_var($_GET['id'],
                FILTER_VALIDATE_INT,
                array('min_range' => 1)))
{
    ERROR_H::clientMessage('Seems like that page doesn\'t exists :\\');
    ERROR_H::serverMessage('In file read_page.php: page id wasn\'t valid.');
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
            ERROR_H::clientMessage('Sorry, something went wrong.');
            ERROR_H::serverMessage('In file read_page.php: unable to create a page object.');
        }
    }
    else
    {
        ERROR_H::clientMessage('Trip to the data base came back with nothing. Check for spelling errors.');
        ERROR_H::serverMessage('In file read_page.php: $results was null.');

    }
}

include('includes/footer.inc.php');
