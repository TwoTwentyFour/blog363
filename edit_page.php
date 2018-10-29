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

    $query = 'UPDATE pages SET title=:title, content=:content, dateUpdated=NOW() WHERE id=:id';
    $stmt = $pdo->prepare($query);
    $results = $stmt->execute([':title' => $title, ':content' => $content, ':id' => $id]);

    if ($results)
    {
        header('Location: read_page.php?id=' . $id . '');
        exit();
    }
    else
    {
        include('includes/header.inc.php');
        ERROR_H::clientMessage('Trip to the data base came back with nothing. Check for spelling errors.');
        ERROR_H::serverMessage('In file edit_page.php: $results was null.');
    }
}
else
{
    if (!isset($_GET['id']) || !filter_var($_GET['id'],
                                           FILTER_VALIDATE_INT,
                                           array('min_range' => 1)))
    {
        ERROR_H::clientMessage('Seems like that page doesn\'t exists :\\');
        ERROR_H::serverMessage('In file edit_page.php: page id wasn\'t valid.');
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

        include('includes/header.inc.php');
        include('views/edit_page.view.php');
    }
    else
    {
        ERROR_H::clientMessage('Trip to the data base came back with nothing. Check for spelling errors.');
        ERROR_H::serverMessage('In file edit_page.php: $results was null.');
    }
}

include('includes/footer.inc.php');
