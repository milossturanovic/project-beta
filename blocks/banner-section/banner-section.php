<?php

/**
 * Banner section template.
 *
 * @param array $block The block settings and attributes.
 * @param bool  $is_preview True during the admin preview.
 */

// Show a preview image in the Gutenberg editor
if (!empty($is_preview)) {
?>





  

<section class="pt-lg-16 pt-14">
    <div class="container container-xxl">
        <div class="row gy-30px gx-30px">
            <div class="col-12 col-md-4">
                <div class="card border-0 rounded-0 hover-zoom-in hover-shine">
                    <img class="lazy-image card-img object-fit-cover lazy-image light-mode-img" src="#" data-src="/assets/images/banner/banner-05.jpg" width="450" height="600" alt="Autumn Skincare">
                    <img class="lazy-image dark-mode-img card-img object-fit-cover lazy-image" src="#" data-src="/assets/images/banner/banner-white-05.jpg" width="450" height="600" alt="Autumn Skincare">
                    <div class="card-img-overlay d-inline-flex flex-column p-8 justify-content-end text-center">
                        <h3 class="card-title text-white lh-45px">Autumn Skincare</h3>
                        <div><a href="#" class="btn btn-link p-0 fw-semibold text-white text-decoration-none">Disvover Now <svg class="icon">
                                    <use xlink:href="#icon-arrow-right"></use>
                                </svg></a></div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card border-0 rounded-0 hover-zoom-in hover-shine">
                    <img class="lazy-image card-img object-fit-cover lazy-image" src="#" data-src="/assets/images/banner/banner-03.jpg" width="450" height="600" alt="Anti-aging Cream">
                    <div class="card-img-overlay d-inline-flex flex-column p-8 justify-content-end text-center">
                        <h3 class="card-title text-white lh-45px">Anti-aging Cream</h3>
                        <div><a href="#" class="btn btn-link p-0 fw-semibold text-white text-decoration-none">Buy 1 get 1 <svg class="icon">
                                    <use xlink:href="#icon-arrow-right"></use>
                                </svg></a></div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card border-0 rounded-0 hover-zoom-in hover-shine">
                    <img class="lazy-image card-img object-fit-cover lazy-image light-mode-img" src="#" data-src="/assets/images/banner/banner-04.jpg" width="450" height="600" alt="Sale Up To 40% Off">
                    <img class="lazy-image dark-mode-img card-img object-fit-cover lazy-image" src="#" data-src="/assets/images/banner/banner-white-04.jpg" width="450" height="600" alt="Sale Up To 40% Off">
                    <div class="card-img-overlay d-inline-flex flex-column p-8 justify-content-end text-center">
                        <h3 class="card-title text-white lh-45px">Sale Up To 40% Off</h3>
                        <div><a href="#" class="btn btn-link p-0 fw-semibold text-white text-decoration-none">Shop Sale <svg class="icon">
                                    <use xlink:href="#icon-arrow-right"></use>
                                </svg></a></div>
                    </div>
                </div>
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




<section class="pt-lg-16 pt-14">
    <div class="container container-xxl">
        <div class="row gy-30px gx-30px">
            <div class="col-12 col-md-4">
                <div class="card border-0 rounded-0 hover-zoom-in hover-shine">
                    <img class="lazy-image card-img object-fit-cover lazy-image light-mode-img" src="#" data-src="/assets/images/banner/banner-05.jpg" width="450" height="600" alt="Autumn Skincare">
                    <img class="lazy-image dark-mode-img card-img object-fit-cover lazy-image" src="#" data-src="/assets/images/banner/banner-white-05.jpg" width="450" height="600" alt="Autumn Skincare">
                    <div class="card-img-overlay d-inline-flex flex-column p-8 justify-content-end text-center">
                        <h3 class="card-title text-white lh-45px">Autumn Skincare</h3>
                        <div><a href="#" class="btn btn-link p-0 fw-semibold text-white text-decoration-none">Disvover Now <svg class="icon">
                                    <use xlink:href="#icon-arrow-right"></use>
                                </svg></a></div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card border-0 rounded-0 hover-zoom-in hover-shine">
                    <img class="lazy-image card-img object-fit-cover lazy-image" src="#" data-src="/assets/images/banner/banner-03.jpg" width="450" height="600" alt="Anti-aging Cream">
                    <div class="card-img-overlay d-inline-flex flex-column p-8 justify-content-end text-center">
                        <h3 class="card-title text-white lh-45px">Anti-aging Cream</h3>
                        <div><a href="#" class="btn btn-link p-0 fw-semibold text-white text-decoration-none">Buy 1 get 1 <svg class="icon">
                                    <use xlink:href="#icon-arrow-right"></use>
                                </svg></a></div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card border-0 rounded-0 hover-zoom-in hover-shine">
                    <img class="lazy-image card-img object-fit-cover lazy-image light-mode-img" src="#" data-src="/assets/images/banner/banner-04.jpg" width="450" height="600" alt="Sale Up To 40% Off">
                    <img class="lazy-image dark-mode-img card-img object-fit-cover lazy-image" src="#" data-src="/assets/images/banner/banner-white-04.jpg" width="450" height="600" alt="Sale Up To 40% Off">
                    <div class="card-img-overlay d-inline-flex flex-column p-8 justify-content-end text-center">
                        <h3 class="card-title text-white lh-45px">Sale Up To 40% Off</h3>
                        <div><a href="#" class="btn btn-link p-0 fw-semibold text-white text-decoration-none">Shop Sale <svg class="icon">
                                    <use xlink:href="#icon-arrow-right"></use>
                                </svg></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>