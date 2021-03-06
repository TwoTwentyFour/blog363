<?php 

require('includes/utilities.inc.php');
require_once('includes/error_handler.inc.php');

$pageTitle = 'Archive';
include('includes/header.inc.php');

$query = 'SELECT id, title, DATE_FORMAT(dateAdded, "%m-%e-%Y") AS dateAdded FROM pages ORDER BY dateAdded DESC';
$results = $pdo->query($query);

if ($results && $results->rowCount() > 0)
{
    $results->setFetchMode(PDO::FETCH_CLASS, 'Page');
    include('views/list_pages.view.php');
}
else
{
    Error_H::clientMessage('There are no posts to display.');
    Error_H::serverMessage('$results');

}

include('includes/footer.inc.php');
