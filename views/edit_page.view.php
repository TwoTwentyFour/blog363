<?php 

echo '<form class="form-horizontal" action="edit_page.php" method="post" id="edit_form">
            <input type="hidden" name="id" value="' . $page->getID() . '" />
            <div class="form-group">
                <label for="title">Title</label>
                <input class="form-control" type="text" name="title" id="title" value="' . $page->getTitle() . '" />
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control rounded-0" name="content" id="content" rows="25">' . $page->getContent() . '</textarea>
            </div>
            <input type="submit" name="submit" value="Update" />
      </form>';




