<?php 

require('includes/utilities.inc.php');
require_once('includes/error_handler.inc.php');

if ($user == null || !$user->canCreatePages())
{
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $title = trim($_POST['title']);
    $title = stripslashes($title);
    $title = htmlspecialchars($title);
    $content = trim($_POST['content']);
    $content = stripslashes($content);
    $category = $_POST['category'];
    $id = $_POST['id'];

    $query = 'UPDATE pages SET title=:title, content=:content, category=:category, dateUpdated=NOW() WHERE id=:id';
    $stmt = $pdo->prepare($query);
    $results = $stmt->execute([':title' => $title, ':content' => $content, ':category' => $category, ':id' => $id]);

    if ($results)
    {
        header('Location: read_page.php?id=' . $id . '');
        exit();
    }
    else
    {
        include('includes/header.inc.php');
        Error_H::clientMessage('Soar-e a-boot dat.');
        Error_H::serverMessage('$results');
    }
}
else
{
    if (!isset($_GET['id']) || !filter_var($_GET['id'],
                                           FILTER_VALIDATE_INT,
                                           array('min_range' => 1)))
    {
        Error_H::clientMessage('Soar-e a-boot dat.');
        Error_H::serverMessage('$_GET[\'id\']');
    }

    $query = 'SELECT id, creatorid, title, content, category, dateAdded FROM pages WHERE id=:id';
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

        include('includes/header.inc.php');
        include('views/edit_page.view.php');
    }
    else
    {
        Error_H::clientMessage('Soar-e a-boot dat.');
        Error_H::serverMessage('$results');
    }
}

include('includes/footer.inc.php');
