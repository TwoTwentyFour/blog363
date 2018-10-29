<?php 

require('includes/utilities.inc.php');
require('includes/error_handler.inc.php');

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
    Error_H::clientMessage('Soar-e a-boot dat.');
    Error_H::serverMessage('$results');
}

include('includes/footer.inc.php');
