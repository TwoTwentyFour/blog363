<?php 

require('includes/utilities.inc.php');

$pageTitle = 'Blog 363';
include('includes/header.inc.php');

$query = 'SELECT id, title, content, DATE_FORMAT(dateAdded, "%e %M %Y") AS dateAdded FROM pages ORDER BY dateAdded LIMIT 3';
$results = $pdo->query($query);

if ($results && $results->rowCount() > 0)
{
    $results->setFetchMode(PDO::FETCH_CLASS, 'Page');
    include('views/index.php');
}
else
{
    ERROR_H::clientMessage('Trip to the data base came back with nothing. Check for spelling errors.');
    ERROR_H::serverMessage('In file index.php: $results was null.');
}

include('includes/footer.inc.php');
