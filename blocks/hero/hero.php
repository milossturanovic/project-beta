<?php

/**
 * Hero Block template.
 *
 * @param array $block The block settings and attributes.
 * @param bool  $is_preview True during the admin preview.
 */

// Show a preview image in the Gutenberg editor only
if (!empty($is_preview)) :
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
					<img src="http://project-beta.local/wp-content/themes/old-theme/assets/images/hero-slider/hero-slider-07.jpg"
						class="img-fluid w-100 vh-100 object-fit-cover loaded"
						alt="slider" width="952" height="770" loading="lazy">
				</div>
			</div>
		</div>
	</section>

<?php
	return;
endif;
?>





<?php
// Bail if accessed directly
if (!defined('ABSPATH')) {
	return;
}

// Get ACF groups
$content    = get_field('hero_content');
$background = get_field('hero_background');

// Get content values
$heading     = $content['heading'] ?? 'Default Heading';
$subheading  = $content['subheading'] ?? 'Default Subheading';
$paragraph   = $content['paragraph'] ?? 'Default paragraph text here.';
$button      = $content['button'] ?? null;

// Get button values
$button_label  = $button['title'] ?? '';
$button_url    = $button['url'] ?? '';
$button_target = $button['target'] ?? '_self';

// Get background image
$image           = $background['background_url'] ?? null;
$background_url  = !empty($image['url']) ? $image['url'] : null;
$image_alt       = !empty($image['alt']) ? $image['alt'] : 'Hero background';
?>

<section class="hero-block" <?php if ($background_url): ?> style="background-image: url('<?php echo esc_url($background_url); ?>');"<?php endif; ?>>
	<div class="row align-items-center hero hero-none mx-0 bg-section-2">
		<div class="col-lg-6 order-1 order-lg-0 text-center py-lg-0 py-16 px-sm-0 px-6">
			<div class="fs-4 fw-semibold text-primary mb-8"><?php echo esc_html($heading); ?></div>
			<h1 class="mx-auto hero-540 fs-1 mb-4 px-4"><?php echo esc_html($subheading); ?></h1>
			<p class="mx-auto hero-desc fs-18px text-body-calculate">
				<?php echo esc_html($paragraph); ?>
			</p>
			<?php if ($button_url && $button_label): ?>
				<a href="<?php echo esc_url($button_url); ?>"
				   target="<?php echo esc_attr($button_target); ?>"
				   class="btn btn-lg btn-dark mt-6 btn-hover-bg-primary btn-hover-border-primary">
					<?php echo esc_html($button_label); ?>
				</a>
			<?php endif; ?>
		</div>
		<div class="col-lg-6 order-0 order-lg-1 px-0">
			<?php if ($background_url): ?>
				<div class="d-block hover-zoom-in hover-shine">
					<img src="<?php echo esc_url($background_url); ?>"
						class="img-fluid w-100 object-fit-cover loaded"
						alt="<?php echo esc_attr($image_alt); ?>">
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
