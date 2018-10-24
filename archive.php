<?php 

require('includes/utilities.inc.php');

$pageTitle = 'Archive';
include('includes/header.inc.php');

try
{
    $query = 'SELECT id, title, DATE_FORMAT(dateAdded, "%e %M %Y") AS dateAdded FROM pages ORDER BY dateAdded';
    $results = $pdo->query($query);

    if ($results && $results->rowCount() > 0)
    {
        $results->setFetchMode(PDO::FETCH_CLASS, 'Page');
        include('views/archive.html');
    }
    else
    {
        throw new Exception('No conent is available to be viewed at this time.');
    }
}
catch (Exception $e)
{
    include('views/error.html');
}

include('includes/footer.inc.php');
