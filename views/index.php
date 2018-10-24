<header class="business-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="display-3 text-center text-white mt-4">Business Name or Tagline</h1>
            </div>
        </div>
    </div>
</header>
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <h2 class="mt-4">What We Do</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A deserunt neque tempore recusandae animi soluta quasi? Asperiores rem dolore eaque vel, porro, soluta unde debitis aliquam laboriosam. Repellat explicabo, maiores!</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis optio neque consectetur consequatur magni in nisi, natus beatae quidem quam odit commodi ducimus totam eum, alias, adipisci nesciunt voluptate. Voluptatum.</p>
            <p>
                <a class="btn btn-primary btn-lg" href="#">Call to Action &raquo;</a>
            </p>
        </div>
        <div class="col-sm-4">
            <h2 class="mt-4">Contact Us</h2>
            <address>
                <strong>Start Bootstrap</strong>
                <br>3481 Melrose Place
                <br>Beverly Hills, CA 90210
                <br>
            </address>
            <address>
                <abbr title="Phone">P:</abbr>
                (123) 456-7890
                <br>
                <abbr title="Email">E:</abbr>
                <a href="mailto:#">name@example.com</a>
            </address>
        </div>
    </div>
    <div class="row">
    <?php
        while ($page = $results->fetch())
        { 
            echo '<div class="col-sm-4 my-4">
                <div class="card">
                    <img class="card-img-top" src="http://placehold.it/300x200" alt="">
                    <div class="card-body">
                        <h4 class="card-title">' . $page->getTitle() . '</h4>
                        <p class="card-text">' . $page->getIntro() . '</p>
                        </div>
                        <div class="card-footer">
                        <a href="page.php?id=' . $page->getID() . '" class="btn btn-primary">read more...</a>
                    </div>
                </div>
            </div>';
        }
    ?>
    </div>
</div>

