<?php 

require('includes/utilities.inc.php');


if (!isset($_GET['id']) ||
    !filter_var($_GET['id'],
                FILTER_VALIDATE_INT,
                array('min_range' => 1)))
{
    ERROR_H::clientMessage('Something is wrong here.');
    ERROR_H::serverMessage('In file delete_page.php page id is invalid.');

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
        ERROR_H::clientMessage('Trip to the data base came back with nothing. Check for spelling errors.');
        ERROR_H::serverMessage('In file delete_page.php: $results was null.');
    }
}


include('includes/footer.inc.php');
