<?php 

require('includes/utilities.inc.php');

$pageTitle = 'Archive';
include('includes/header.inc.php');

$query = 'SELECT id, title, DATE_FORMAT(dateAdded, "%e %M %Y") AS dateAdded FROM pages ORDER BY dateAdded';
$results = $pdo->query($query);

if ($results && $results->rowCount() > 0)
{
    $results->setFetchMode(PDO::FETCH_CLASS, 'Page');
    include('views/list_pages.view.php');
}
else
{
    ERROR_H::clientMessage('Trip to the data base came back with nothing. Check for spelling errors.');
    ERROR_H::serverMessage('In file list_pages.php: $results was null.');
}

include('includes/footer.inc.php');
