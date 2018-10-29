<?php

echo '<form class="form-horizontal" action="login.php" method="post">
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" required/>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="pass" required/>
            </div>
            <input type="submit" name="submit" value="Login" />
        </form>';
