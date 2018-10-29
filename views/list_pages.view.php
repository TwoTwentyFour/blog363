<?php
    /*while ($page = $results->fetch())
    {
        echo "<article>
            <h3>{$page->getTitle()}</h3><small>{$page->getDateAdded()}</small>
            <p><a href=\"read_page.php?id={$page->getID()}\">read more here...</a></p>
        </article>";
    }*/

    echo '
        <div class="container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Date Posted</th>
                        <th>Link</th>
                    </tr>
                </thead>
                <tbody>';

    while ($page = $results->fetch())
    {
        echo'
                    <tr>
                        <td>' . $page->getTitle() . '</td>
                        <td>' . $page->getCreatorID() . '</td>
                        <td>' . $page->getDateAdded() . '</td>
                        <td><a href="\read_page.php?id={$page->getID()}">read here...</a></td>
                    </tr>
            
        ';
    }
    echo '
                </tbody>
            </table>
        </div>
    ';
?> 
