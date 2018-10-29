<section class="threeColumns">
    <article class="twoThirds">
        <h1>Login In</h1>

        <?php
            if ($form->isSubmitted() && $form->validate())
            {
                echo '<p class="error">Invalid credentials.</p>';
            }
        ?>

        <?php echo $form; ?>
    </article>
</section>
