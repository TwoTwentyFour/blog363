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

    $query = 'INSERT INTO pages (creatorID, title, content, dateAdded) VALUES (:creatorID, :title, :content, NOW())';
    $stmt = $pdo->prepare($query);
    $results = $stmt->execute(array(':creatorID' => $user->getID(),
                                    ':title' => $title,
                                    ':content' => $content));

    if ($results)
    {
        header('Location: index.php');
        exit();
    }
}
else
{
    include('includes/header.inc.php');
    include('views/add_page.view.php');
    include('includes/footer.inc.php');
}

