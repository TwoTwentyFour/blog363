<!-- <header class="business-header">
    <div class="container">
        <div class="row">
        <div class="col-lg-12">
                <h1 class="display-3 text-center text-white mt-4">Business Name or Tagline</h1>
            </div>
        </div>
    </div>
</header> 
src="http://placehold.it/300x200" -->

<div class="container">
    <?php include('includes/about_blurb.inc.php'); ?>
    <div class="row">
    <?php
        while ($page = $results->fetch())
        { 
            echo '<div class="col-sm-4 my-4">
                <div class="card">
                    <img class="card-img-top" src="images/' . $page->getCategory() . '_logo.png" alt="">
                    <div class="card-body">
                        <h4 class="card-title">' . $page->getTitle() . '</h4>
                        <p class="card-text">' . $page->getIntro() . '</p>
                        </div>
                        <div class="card-footer">
                        <a href="read_page.php?id=' . $page->getID() . '" class="btn btn-primary">read more...</a>
                    </div>
                </div>
            </div>';
        }
    ?>
    </div>
</div>

