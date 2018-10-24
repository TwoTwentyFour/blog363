<?php 

require('includes/utilities.inc.php');

try
{
    if (!isset($_GET['id']) ||
        !filter_var($_GET['id'],
                    FILTER_VALIDATE_INT,
                    array('min_range' => 1)))
    {
        throw new Exception('The page ID was either null or invalid.');
    }

    $query = 'DELETE FROM pages WHERE id=:id';
    $stmt = $pdo->prepare($query);
    $results = $stmt->execute(array(':id' => $_GET['id']));

    if ($results)
    {
        include('includes/header.inc.php');
        include('views/delete_page.html');
    }
    else
    {
        throw new Exception('The results of the database query returned null.');
    }
}
catch (Exception $e)
{
    $pageTitle = 'Error!';
    include('includes/header.inc.php');
    include('views/error.html');
}

include('includes/footer.inc.php');
