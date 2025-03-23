<?php

/**
 * Hero Block template.
 *
 * @param array $block The block settings and attributes.
 * @param bool  $is_preview True during the admin preview.
 */

// Show a preview image in the Gutenberg editor
if (!empty($is_preview)) {
?>



	<section class="hero-block" style="background-image: url('http://project-beta.local/wp-content/themes/old-theme/assets/images/hero-slider/hero-slider-07.jpg');">
		<div class="row align-items-center hero hero-none mx-0 bg-section-2">
			<div class="col-lg-6 order-1 order-lg-0 text-center py-lg-0 py-16 px-sm-0 px-6">
				<div class="fs-4 fw-semibold text-primary mb-8">Default Heading</div>
				<h2 class="mx-auto hero-540 fs-1 mb-4 px-4">Default Subheading</h2>
				<p class="mx-auto hero-desc fs-18px text-body-calculate">Made using clean, non-toxic ingredients, our products are designed for everyone.</p>
				<a href="shop-page-04.html" class="btn btn-lg btn-dark mt-6 btn-hover-bg-primary btn-hover-border-primary">Shop Now</a>
			</div>
			<div class="col-lg-6 order-0 order-lg-1 px-0">
				<div class="d-block hover-zoom-in hover-shine">
					<img fetchpriority="high" decoding="async" src="http://project-beta.local/wp-content/themes/old-theme/assets/images/hero-slider/hero-slider-07.jpg" class="img-fluid w-100 vh-100 object-fit-cover loaded" alt="slider" width="952" height="770" loading="lazy" data-ll-status="loaded">
				</div>
			</div>
		</div>
	</section>





<?php
	return;
}

// Get ACF fields
$heading = get_field('hero_heading') ?: 'Default Heading';
$subheading = get_field('hero_subheading') ?: 'Default Subheading';
$background = get_field('hero_background') ?: get_template_directory_uri() . "/assets/images/hero-slider/hero-slider-07.jpg";
?>

<section class="hero-block" style="background-image: url('<?php echo esc_url($background); ?>');">
	<div class="row align-items-center hero hero-none mx-0 bg-section-2">
		<div class="col-lg-6 order-1 order-lg-0 text-center py-lg-0 py-16 px-sm-0 px-6">
			<div class="fs-4 fw-semibold text-primary mb-8"><?php echo esc_html($heading); ?></div>
			<h2 class="mx-auto hero-540 fs-1 mb-4 px-4"><?php echo esc_html($subheading); ?></h2>
			<p class="mx-auto hero-desc fs-18px text-body-calculate">Made using clean, non-toxic ingredients, our products are designed for everyone.</p>
			<a href="shop-page-04.html" class="btn btn-lg btn-dark mt-6 btn-hover-bg-primary btn-hover-border-primary">Shop Now</a>
		</div>
		<div class="col-lg-6 order-0 order-lg-1 px-0">
			<div class="d-block hover-zoom-in hover-shine">
				<img src="<?php echo esc_url($background); ?>"
					class="lazy-image img-fluid w-100 vh-100 object-fit-cover"
					alt="slider"
					width="952"
					height="770">
			</div>
		</div>
	</div>
</section>



