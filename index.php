<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Rekos_Agency
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		if ( have_posts() ) :

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
		
				/*
				 * Display the content for each post.
				 */
				the_content();
		
			endwhile;
		
		else :
		
			// Display a message if no posts are found
			echo '<p>No content found.</p>';
		
		endif;
		?>

	</main><!-- #main -->

<?php

get_footer();
