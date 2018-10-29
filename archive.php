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
    echo '<p style="color: red;">Error: Query returned null.</p>';
}

include('includes/footer.inc.php');
