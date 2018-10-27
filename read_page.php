<?php 

require('includes/utilities.inc.php');
include('includes/header.inc.php');

if (!isset($_GET['id']) ||
    !filter_var($_GET['id'],
                FILTER_VALIDATE_INT,
                array('min_range' => 1)))
{
    echo '<p style="color: red;">Error: Page ID was invalid.</p>';
}
else
{
    $query = 'SELECT id, title, content, DATE_FORMAT(dateAdded, "%e %M %Y") AS dateAdded FROM pages WHERE id=:id';
    $stmt = $pdo->prepare($query);
    $results = $stmt->execute(array(':id' => $_GET['id']));

    if ($results)
    {
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Page');
        $page = $stmt->fetch();

        if ($page)
        {
            $pageTile = $page->getTitle();
            include('views/read_page.html');
        }
        else
        {
            echo '<p style="color: red;">Error: Unable to create Page object.</p>';
        }
    }
    else
    {
        echo '<p style="color: red;">Error: Query returned null.</p>';
    }
}

include('includes/footer.inc.php');
