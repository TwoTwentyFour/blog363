<?php 

echo '<form class="form-horizontal" action="contact.php" method="post" id="contact_form">
            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" type="text" name="name" id="name" required/>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" id="email" required/>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control rounded-0" name="message" id="message" rows="25" required></textarea>
            </div>
            <input type="submit" name="submit" value="Send" />
      </form>';


