<?php 

require('includes/utilities.inc.php');


if (!isset($_GET['id']) ||
    !filter_var($_GET['id'],
                FILTER_VALIDATE_INT,
                array('min_range' => 1)))
{
    echo '<p style="color: red;">The page ID was either null or invalid.</p>';
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
    include('includes/header.inc.php');
    echo '<p style="color: red;">The page could not be deleted. The query returned null.</p>';
}


include('includes/footer.inc.php');
