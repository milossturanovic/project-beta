<?php

/**
 * The template for displaying all pages
 *
 * @package Rekos_Agency
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php
    while (have_posts()) :
        the_post();

        // Display only the page content without the title
        the_content();

    endwhile; // End of the loop.
    ?>

</main><!-- #main -->

<?php get_footer(); ?>

</body>

</html>