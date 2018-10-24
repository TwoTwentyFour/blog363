<?php  

require('includes/utilities.inc.php');

if ($user == null || !$user->canCreatePages())
{
    header("Location: index.php");
    exit;
}

set_include_path(get_include_path() . PATH_SEPARATOR . '/usr/local/pear/share/pear');
require('HTML/QuickForm2.php');
$form = new HTML_QuickForm2('addPageForm');


$title = $form->addElement('text', 'title');
$title->setLabel('Page Title');
$title->addFilter('strip_tags');
$title->addRule('required', 'Please enter a title.');

$content = $form->addElement('textarea', 'content');
$content->setLabel('Page Content');
$content->addFilter('trim');
$content->addRule('required', 'Please enter page content');

$submit = $form->addElement('submit', 'submit', array('value' => 'Add Page'));

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if ($form->validate())
    {
        $query = 'INSERT INTO pages (creatorID, title, content, dateAdded) VALUES (:creatorID, :title, :content, NOW())';
        $stmt = $pdo->prepare($query);
        $results = $stmt->execute(array(':creatorID' => $user->getID(),
                                        ':title' => $title->getValue(),
                                        ':content' => $content->getValue()));

        if ($results)
        {
            $form->toggleFrozen(true);
            $form->removeChild($submit);
        }
    }
}
else
{
    include('views/add_page.view.php');
}

$pageTitle = 'Add Page';
include('includes/header.inc.php');
include('views/add_page.html');
include('includes/footer.inc.php');
