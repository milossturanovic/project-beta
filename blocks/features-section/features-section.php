<?php

/**
 * Features section template.
 *
 * @param array $block The block settings and attributes.
 * @param bool  $is_preview True during the admin preview.
 */

// Show a preview image in the Gutenberg editor
if (!empty($is_preview)) {
?>






<section >
    <div class="container container-xxl">
        <div class="text-center pb-11 pb-lg-14">
            <h2 class="fs-3 w-lg-40 w-auto mx-auto pb-7">We strive to live with compassion, kindness and empathy</h2>
            <p class="mw-lg-50 mx-auto">A lot of so-called stretch denim pants out there are just glorified sweatpants – they get baggy and lose their shape. Not cool. Our tightly knitted fabric holds its form after repeated wear. Plus, Aldays dress up or down, no prob. So you can wear them all day. Get it?</p>
        </div>
        <div class="row gy-30px">
            <div class="col-md-4">
                <div>
                    <div class="d-flex justify-content-center">
                        <img class="lazy-image img-fluid light-mode-img" src="#" data-src="/assets/images/image-box/image-box-11.png" width="102" height="118" alt="Guaranteed PURE">
                        <img class="lazy-image dark-mode-img img-fluid" src="#" data-src="/assets/images/image-box/image-box-white-11.png" width="102" height="118" alt="Guaranteed PURE">
                    </div>
                    <div class="card-body text-center pt-7 mt-3">
                        <h3 class="fs-4 mb-6">Guaranteed PURE</h3>
                        <p class="mb-0 px-lg-6">All Grace formulations adhere to strict purity standards and will never contain harsh or toxic ingredients</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div>
                    <div class="d-flex justify-content-center">
                        <img class="lazy-image img-fluid light-mode-img" src="#" data-src="/assets/images/image-box/image-box-02.png" width="102" height="118" alt="Completely Cruelty-Free">
                        <img class="lazy-image dark-mode-img img-fluid" src="#" data-src="/assets/images/image-box/image-box-white-02.png" width="102" height="118" alt="Completely Cruelty-Free">
                    </div>
                    <div class="card-body text-center pt-7 mt-3">
                        <h3 class="fs-4 mb-6">Completely Cruelty-Free</h3>
                        <p class="mb-0 px-lg-6">All Grace formulations adhere to strict purity standards and will never contain harsh or toxic ingredients</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div>
                    <div class="d-flex justify-content-center">
                        <img class="lazy-image img-fluid light-mode-img" src="#" data-src="/assets/images/image-box/image-box-03.png" width="102" height="118" alt="Ingredient Sourcing">
                        <img class="lazy-image dark-mode-img img-fluid" src="#" data-src="/assets/images/image-box/image-box-white-03.png" width="102" height="118" alt="Ingredient Sourcing">
                    </div>
                    <div class="card-body text-center pt-7 mt-3">
                        <h3 class="fs-4 mb-6">Ingredient Sourcing</h3>
                        <p class="mb-0 px-lg-6">All Grace formulations adhere to strict purity standards and will never contain harsh or toxic ingredients</p>
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





<section class=" mt-4 mt-lg-12 py-4 mb-15 mb-lg-18">
    <div class="container container-xxl">
        <div class="text-center pb-11 pb-lg-14">
            <h2 class="fs-3 w-lg-40 w-auto mx-auto pb-7">We strive to live with compassion, kindness and empathy</h2>
            <p class="mw-lg-50 mx-auto">A lot of so-called stretch denim pants out there are just glorified sweatpants – they get baggy and lose their shape. Not cool. Our tightly knitted fabric holds its form after repeated wear. Plus, Aldays dress up or down, no prob. So you can wear them all day. Get it?</p>
        </div>
        <div class="row gy-30px">
            <div class="col-md-4">
                <div>
                    <div class="d-flex justify-content-center">
                        <img class="lazy-image img-fluid light-mode-img" src="#" data-src="/assets/images/image-box/image-box-11.png" width="102" height="118" alt="Guaranteed PURE">
                        <img class="lazy-image dark-mode-img img-fluid" src="#" data-src="/assets/images/image-box/image-box-white-11.png" width="102" height="118" alt="Guaranteed PURE">
                    </div>
                    <div class="card-body text-center pt-7 mt-3">
                        <h3 class="fs-4 mb-6">Guaranteed PURE</h3>
                        <p class="mb-0 px-lg-6">All Grace formulations adhere to strict purity standards and will never contain harsh or toxic ingredients</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div>
                    <div class="d-flex justify-content-center">
                        <img class="lazy-image img-fluid light-mode-img" src="#" data-src="/assets/images/image-box/image-box-02.png" width="102" height="118" alt="Completely Cruelty-Free">
                        <img class="lazy-image dark-mode-img img-fluid" src="#" data-src="/assets/images/image-box/image-box-white-02.png" width="102" height="118" alt="Completely Cruelty-Free">
                    </div>
                    <div class="card-body text-center pt-7 mt-3">
                        <h3 class="fs-4 mb-6">Completely Cruelty-Free</h3>
                        <p class="mb-0 px-lg-6">All Grace formulations adhere to strict purity standards and will never contain harsh or toxic ingredients</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div>
                    <div class="d-flex justify-content-center">
                        <img class="lazy-image img-fluid light-mode-img" src="#" data-src="/assets/images/image-box/image-box-03.png" width="102" height="118" alt="Ingredient Sourcing">
                        <img class="lazy-image dark-mode-img img-fluid" src="#" data-src="/assets/images/image-box/image-box-white-03.png" width="102" height="118" alt="Ingredient Sourcing">
                    </div>
                    <div class="card-body text-center pt-7 mt-3">
                        <h3 class="fs-4 mb-6">Ingredient Sourcing</h3>
                        <p class="mb-0 px-lg-6">All Grace formulations adhere to strict purity standards and will never contain harsh or toxic ingredients</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

