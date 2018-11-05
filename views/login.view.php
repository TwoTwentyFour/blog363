<?php

echo '<form style="margin: 300px;" class="form-horizontal" action="login.php" method="post" enctype="multipart/form-data">
            <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" required/>
            </div>
            <div class="form-group col-md-6">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="pass" required/>
            </div>
            <input type="submit" name="submit" value="Login" />
        </form>';
