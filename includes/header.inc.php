<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title><?php echo (isset($pageTitle)) ? $pageTitle : 'Blog363'; ?></title>
        <!-- Bootstrap core CSS -->
        <link href="startbootstrap/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="startbootstrap/css/business-frontpage.css" rel="stylesheet">
    </head>
    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="index.php">Blog363</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="list_pages.php">Archive</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                            <?php 
                                if ($user)
                                {
                                    echo '<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>';
                                }
                                else
                                {
                                    echo '<li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>';
                                    echo '<li class="nav-item"><a class="nav-link" href="#">Register</a></li>';
                                }

                                if ($user && $user->canCreatePages())
                                {
                                    echo '<li class="nav-item"><a class="nav-link" href="add_page.php">Add Page</a></li>';
                                }
                            ?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            
