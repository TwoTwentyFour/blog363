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

    $query = 'INSERT INTO pages (creatorID, title, content, category, dateAdded) VALUES (:creatorID, :title, :content, :category, NOW())';
    $stmt = $pdo->prepare($query);
    $results = $stmt->execute(array(':creatorID' => $user->getID(),
                                    ':title' => $title,
                                    ':content' => $content,
                                    ':category' => $category));

    if ($results)
    {
        header('Location: index.php');
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
    include('includes/header.inc.php');
    include('views/add_page.view.php');
    include('includes/footer.inc.php');
}

