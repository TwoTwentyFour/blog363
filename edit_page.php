<?php 

require('includes/utilities.inc.php');

if ($user == null || !$user->canCreatePages())
{
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $title = $_POST['title'];
    $content = $_POST['content'];
    $id = $_POST['id'];

    try
    {
        $query = 'UPDATE pages SET title=:title, content=:content, dateUpdated=NOW() WHERE id=:id';
        $stmt = $pdo->prepare($query);
        $results = $stmt->execute([':title' => $title, ':content' => $content, ':id' => $id]);

        if ($results)
        {
            header('Location: page.php?id=' . $id . '');
            exit();
        }
        else
        {
            include('includes/header.inc.php');
            echo '<p style="color: red;">Unable to update this page.</p>';
        }
    }
    catch (PDOException $e)
    {
        include('includes/header.inc.php');
        echo '<p>Error: ' . $e->getMessage() . '</p>';
    }
}
else
{
    include('includes/header.inc.php');

    try
    {
        if (!isset($_GET['id']) || !filter_var($_GET['id'],
                                               FILTER_VALIDATE_INT,
                                               array('min_range' => 1)))
        {
            throw new Exception('The page ID was either null or invalid.');
        }

        $query = 'SELECT id, creatorid, title, content, dateAdded FROM pages WHERE id=:id';
        $stmt = $pdo->prepare($query);
        $results = $stmt->execute(array(':id' => $_GET['id']));

        if ($results)
        {
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Page');     
            $page = $stmt->fetch();

            if ($user == null || !$user->canEditPages($page))
            {
                header("Location: index.php");
                exit;
            }

            include('views/edit_page.view.php');
        }
        else
        {
            throw new Exception('The results from the database query returned null.');
        }
    }
    catch (Exception $e)
    {
        $pageTitle = 'Error!';
        include('views/error.html');
    }
}

include('includes/footer.inc.php');
