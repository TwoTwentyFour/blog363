<?php 

echo '<form class="form-horizontal" action="edit_page.php" method="post" id="edit_form">
            <input type="hidden" name="id" value="' . $page->getID() . '" />
            <div class="form-group">
                <label for="title">Title</label>
                <input class="form-control" type="text" name="title" id="title" value="' . $page->getTitle() . '"  required/>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control rounded-0" name="content" id="content" rows="25" required>' . $page->getContent() . '</textarea>
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select name="category">
                   <option value="linux">Linux</option> 
                   <option value="apache">Apache</option> 
                   <option value="mysql">MySQL</option> 
                   <option value="php">PHP</option> 
                   <option value="unity">Unity</option> 
                   <option value="godot">Godot</option> 
                   <option value="cpp">C++</option> 
                   <option value="misc">Misc</option> 
                </select>
            </div>
            <input type="submit" name="submit" value="Update" />
      </form>';




