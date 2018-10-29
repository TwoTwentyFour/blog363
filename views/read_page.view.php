<div class="container container-fluid">
    <article>
        <h1><?php echo $page->getTitle(); ?></h1><small><?php echo $page->getDateAdded(); ?></small><br /><br />
        <p><?php echo $page->getContent(); ?></p>
        <?php
            if ($user)
            {
                if ($user->isAdmin() && $user->canEditPages($page))
                {
                    echo '<p><a href="edit_page.php?id=' . $page->getID() . '">EDIT</a>&nbsp;&nbsp;&nbsp;'; 
                }
                if ($user->isAdmin())
                {
                    echo '<a href="delete_page.php?id=' . $page->getID() . '">DELETE</a></p>'; 
                }
            }
        ?>
    </article>
</div>
