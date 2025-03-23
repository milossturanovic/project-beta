<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Rekos_Agency
 */

get_header();
?>



<div class="container back-link">
	<div class="d-flex">
		<a href="javascript:void(0);" onclick="if (document.referrer) { history.back(); } else { window.location.href='/'; }">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/project-back-arrow.svg" alt="Back Arrow"> Back
		</a>
	</div>

</div>

<section id="article">
	<div class="container">
		<div class="row">
			<!-- Post Title -->
			<h2><?php the_title(); ?></h2>

			<!-- Featured Image -->
			<?php if (has_post_thumbnail()) : ?>
				<img class="img-fluid featured-img" src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title_attribute(); ?>">
			<?php else : ?>
				<img class="img-fluid featured-img" src="/path/to/placeholder.jpg" alt="Placeholder image">
			<?php endif; ?>
		</div>

		<div class="row gx-5">
			<div class="col-12 col-lg-8 gx-5">
				<hr>

				<!-- Post Excerpt -->
				<span class="post-excerpt">
					<?php echo esc_html(get_the_excerpt()); ?>
				</span>

				<hr>

				<!-- Post Content -->
				<span class="content"><?php the_content(); ?></span>

				<hr>

				<!-- Share Section -->
				<div class="d-none d-md-flex share-meta" style="gap: 32px !important;">
					<span class="d-flex flex-row align-items-center">Share</span>
					<div class="social-icons d-flex justify-content-center mt-2 mt-md-0 order-2 order-md-3">
						<!-- LinkedIn Share -->
						<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_permalink()); ?>" target="_blank">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/linkedin-blue.svg" alt="LinkedIn">
						</a>

						<!-- Facebook Share -->
						<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/instagram-blue.svg" alt="Facebook">
						</a>
					</div>



					<hr>
				</div>
			</div>

			<div class="col-12 col-lg-4 gx-5">


				<!-- Post Meta -->
				<div class="post-meta">
					<div class="row mb-2">
						<div class="d-flex">
							<span class="date d-block w-100">Date:</span>
							<span class="date-full d-block w-100 text-end"><?php echo get_the_date('F j, Y'); ?></span>
						</div>
					</div>
					<div class="row">
						<div class="d-flex">
							<?php
							$author_id = get_post_field('post_author', get_the_ID());
							$author_name = get_the_author_meta('display_name', $author_id);
							?>

							<span class="author d-block w-100">Author:</span>
							<span class="author-name d-block w-100 text-end"><?php echo esc_html($author_name); ?></span>



						</div>
					</div>
				</div>

				<hr>

				<!-- Categories -->
				<h5 class="category-meta-title">Category</h5>
				<div class="category-meta">
					<?php
					$categories = get_the_category();
					if (!empty($categories)) {
						foreach ($categories as $category) {
							echo '<span>' . esc_html($category->name) . '</span>';
						}
					}
					?>
				</div>

				<div class="share-meta">
					<hr>
					<div class="d-flex flex-md-row justify-content-between">
						<span class="d-flex flex-row align-items-center">Share</span>
						<div class="social-icons d-flex justify-content-center mt-2 mt-md-0 order-2 order-md-3">
							<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_permalink()); ?>" target="_blank">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/linkedin-blue.svg" alt="LinkedIn">
							</a>
							<a href="https://www.instagram.com/" target="_blank">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/instagram-blue.svg" alt="Instagram">
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>



<section id="news">
	<div class="container">
		<div class="d-block d-md-flex align-items-center justify-content-between">
			<!-- Dynamic Section Title -->
			<h2>Other News & Events</h2>

			<!-- Dynamic Link -->
			<?php
			// Retrieve the custom link from ACF; fallback to the default link if not set
			$link_url = get_field('specific_link') ?: home_url('/newsroom/');
			$link_title = get_field('specific_link_title') ?: 'View All News ans Events'; // Optional title fallback
			$link_target = get_field('specific_link_target') ?: '_self'; // Default target
			?>
			<a href="<?php echo esc_url($link_url); ?>" class="link-arrow font-reg" target="<?php echo esc_attr($link_target); ?>">
				<?php echo esc_html($link_title); ?> <span class="arrow"></span>
			</a>


		</div>

		<div class="row d-flex align-items-stretch custom-margin blog-slider-container">
			<?php
			// Query for the latest three posts
			$latest_posts_query = new WP_Query(array(
				'post_type'      => 'post',
				'posts_per_page' => 3,
				'order'          => 'DESC',
				'orderby'        => 'date',
			));

			if ($latest_posts_query->have_posts()) :
				while ($latest_posts_query->have_posts()) :
					$latest_posts_query->the_post();
			?>
					<div class="col-12 col-md-4 col-xl-4 mb-4 mb-md-0">
						<div class="card h-100">
							<?php if (has_post_thumbnail()) : ?>
								<img class="card-img-top" src="<?php the_post_thumbnail_url('medium_large'); ?>" alt="<?php the_title_attribute(); ?>">
							<?php else : ?>
								<img class="card-img-top" src="/path/to/placeholder.jpg" alt="Placeholder image">
							<?php endif; ?>
							<div class="card-body d-flex flex-column">
								<a href="<?php the_permalink(); ?>" class="card-title"><?php the_title(); ?></a>
								<div class="mt-auto">
									<span class="date"><?php echo get_the_date('F j, Y'); ?></span>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile;
			else : ?>
				<p>No recent posts available.</p>
			<?php endif;
			wp_reset_postdata(); ?>
		</div>


	</div>
</section>





<style>
	.back-link {
		margin-top: 20px;
		margin-bottom: 20px;
	}

	.back-link img {
		margin-right: 24px;
		cursor: pointer;
	}

	.back-link a {
		color: var(--Blue, #1e3c72);
		font-size: 16px;
		font-style: normal;
		font-weight: 600;
		line-height: 24px;
	}

	.back-link a:hover img {
		content: url("<?php echo get_template_directory_uri(); ?>/assets/images/project-back-arrow-red.svg");
	}

	.back-link a:hover {
		color: #ca202e;
	}



	#article h2 {
		color: var(--Blue, #1e3c72);
		font-size: 48px;
		font-style: normal;
		font-weight: 600;
		line-height: 130%;
		/* 62.4px */
		text-transform: uppercase;
		margin-bottom: 40px;
	}

	#article .featured-img {
		border-radius: 50px;
		margin-bottom: 25px;
	}

	#article hr {
		margin-top: 16px;
		margin-bottom: 16px;
	}

	#article .post-excerpt {
		color: var(--Blue, #1e3c72);

		font-size: 24px;
		font-style: normal;
		font-weight: 400;
		line-height: 32px;
		/* 133.333% */
		text-transform: capitalize;
		margin-top: 16px;
		margin-bottom: 16px;
	}

	#article .post-meta {
		margin-top: 16px;
		margin-bottom: 16px;
	}

	#article .post-meta .date,
	.author {
		color: var(--Blue, #1e3c72);

		/* Body medium 14 (AA) */
		font-family: Geologica;
		font-size: 14px;
		font-style: normal;
		font-weight: 500;
		line-height: 20px;
		/* 142.857% */
		letter-spacing: 4.2px;
		text-transform: uppercase;
	}

	#article .post-meta .date-full {
		color: var(--Blue, #1e3c72);

		/* Body regular 14 (aa) */
		font-family: Geologica;
		font-size: 14px;
		font-style: normal;
		font-weight: 400;
		line-height: 20px;
		/* 142.857% */
	}

	#article .post-meta .author-name {
		color: var(--Blue, #1e3c72);

		/* Body regular 14 (aa) */
		font-family: Geologica;
		font-size: 14px;
		font-style: normal;
		font-weight: 400;
		line-height: 20px;
		/* 142.857% */
	}

	#article .category-meta-title {
		color: var(--Blue, #1e3c72);

		/* Body medium 14 (AA) */
		font-family: Geologica;
		font-size: 14px;
		font-style: normal;
		font-weight: 500;
		line-height: 20px;
		/* 142.857% */
		letter-spacing: 4.2px;
		text-transform: uppercase;
		margin-bottom: 12px;
	}

	#article .category-meta {
		display: flex;
		flex-wrap: wrap;
		/* Allows items to wrap to a new line */
		gap: 8px;
		/* Adds spacing between items */
	}

	#article .category-meta span {
		border: 1px solid var(--Blue, #1e3c72);
		padding: 6px 16px 8px 16px;
		border-radius: 50px;
		color: var(--Blue, #1e3c72);
		font-family: Geologica;
		font-size: 14px;
		font-style: normal;
		font-weight: 400;
		line-height: 20px;
		/* 142.857% */
	}

	#article .share-meta span {
		color: var(--Blue, #1e3c72);
		text-align: center;
		font-family: Geologica;
		font-size: 14px;
		font-style: normal;
		font-weight: 500;
		line-height: 20px;
		/* 142.857% */
		letter-spacing: 4.2px;
		text-transform: uppercase;

	}


	@media screen and (max-width:767px) {

		#article h2 {
			font-size: 36px;
			font-style: normal;
			font-weight: 600;
			line-height: 40px;
			text-transform: uppercase;
		}



	}







	/* article style */

	#article .content {
		color: #1e3c72;
	}
</style>




<?php

get_footer();
