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
            include('includes/header.inc.php');
            include('views/read_page.html');
        }
        else
        {
            throw new Exception('Fetch of the database returned null.');
        }
    }
    else
    {
        throw new Exception('The results of the database query returned null.');
    }
}
catch (Exception $error)
{
    $pageTitle = 'Error!';
    include('includes/header.inc.php');
    include('views/error.html');
}

include('includes/footer.inc.php');
