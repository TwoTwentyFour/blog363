<?php 

require('includes/utilities.inc.php');

$pageTitle = 'Blog 363';
include('includes/header.inc.php');

try
{
    $query = 'SELECT id, title, content, DATE_FORMAT(dateAdded, "%e %M %Y") AS dateAdded FROM pages ORDER BY dateAdded LIMIT 3';
    $results = $pdo->query($query);

    if ($results && $results->rowCount() > 0)
    {
        $results->setFetchMode(PDO::FETCH_CLASS, 'Page');
        include('views/index.php');
    }
    else
    {
        throw new Exception('No content is available to be viewed at this time.');
    }
}
catch (Exception $e)
{
    include('views/error.html');
}

include('includes/footer.inc.php');
