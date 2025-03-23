<?php

/**
 * Blog section template.
 *
 * @param array $block The block settings and attributes.
 * @param bool  $is_preview True during the admin preview.
 */

// Show a preview image in the Gutenberg editor
if (!empty($is_preview)) {
?>







<section id="from_our_blog">
    <div class="pt-14 pb-15 py-lg-18 mb-3 mt-1">
        <div class="container">
            <div class="text-center" >
                <h2 class="mb-6">From Our Blog</h2>
                <p class="fs-18px mb-0 mw-xl-50 mw-lg-75 ms-auto me-auto">Our bundles were designed to conveniently package your tanning essentials while saving you money.</p>
            </div>
        </div>
        <div class="container container-xxl mt-12 pt-3">
            <div class="slick-slider" style="display: flex;" data-slick-options='{&#34;arrows&#34;:false,&#34;dots&#34;:false,&#34;responsive&#34;:[{&#34;breakpoint&#34;:1200,&#34;settings&#34;:{&#34;slidesToShow&#34;:3}},{&#34;breakpoint&#34;:992,&#34;settings&#34;:{&#34;dots&#34;:true,&#34;slidesToShow&#34;:2}},{&#34;breakpoint&#34;:768,&#34;settings&#34;:{&#34;dots&#34;:true,&#34;slidesToShow&#34;:1}}],&#34;slidesToShow&#34;:3}'>
             
                    <article class="card card-post-grid-3 bg-transparent border-0" >
                        <figure class="card-img-top mb-8 position-relative"><a href="#" class="hover-shine hover-zoom-in d-block" title="How to Plop Hair for Bouncy, Beautiful Curls">
                                <img data-src="/assets/images/blog/post-01-450x290.jpg" class="img-fluid lazy-image w-100" alt="How to Plop Hair for Bouncy, Beautiful Curls" width="450" height="290" src="#">
                            </a></figure>
                        <div class="card-body p-0">
                            <ul class="post-meta list-inline lh-1 d-flex flex-wrap fs-13px text-uppercase ls-1 fw-semibold m-0">
                                <li class="list-inline-item"><a class="text-reset text-decoration-none text-primary-hover" href="#" title="Life style">Life style</a></li>
                                <li class="border-start ps-5 ms-5 list-inline-item">Jan 19th, 2021</li>
                            </ul>
                            <h4 class="card-title lh-base mt-5 pt-2 mb-0">
                                <a class="text-decoration-none" href="../blog/details-01.html" title="How to Plop Hair for Bouncy, Beautiful Curls">How to Plop Hair for Bouncy, Beautiful Curls</a>
                            </h4>
                        </div>
                    </article>
           
               
                    <article class="card card-post-grid-3 bg-transparent border-0" >
                        <figure class="card-img-top mb-8 position-relative"><a href="#" class="hover-shine hover-zoom-in d-block" title="Which foundation formula is right for your skin?">
                                <img data-src="/assets/images/blog/post-05-450x290.jpg" class="img-fluid lazy-image w-100" alt="Which foundation formula is right for your skin?" width="450" height="290" src="#">
                            </a></figure>
                        <div class="card-body p-0">
                            <ul class="post-meta list-inline lh-1 d-flex flex-wrap fs-13px text-uppercase ls-1 fw-semibold m-0">
                                <li class="list-inline-item"><a class="text-reset text-decoration-none text-primary-hover" href="#" title="Life style">Life style</a></li>
                                <li class="border-start ps-5 ms-5 list-inline-item">Jan 19th, 2021</li>
                            </ul>
                            <h4 class="card-title lh-base mt-5 pt-2 mb-0">
                                <a class="text-decoration-none" href="../blog/details-01.html" title="Which foundation formula is right for your skin?">Which foundation formula is right for your skin?</a>
                            </h4>
                        </div>
                    </article>
            
            
                    <article class="card card-post-grid-3 bg-transparent border-0" >
                        <figure class="card-img-top mb-8 position-relative"><a href="#" class="hover-shine hover-zoom-in d-block" title="How To Choose The Right Sofa for your home">
                                <img data-src="/assets/images/blog/post-06-450x290.jpg" class="img-fluid lazy-image w-100" alt="How To Choose The Right Sofa for your home" width="450" height="290" src="#">
                            </a></figure>
                        <div class="card-body p-0">
                            <ul class="post-meta list-inline lh-1 d-flex flex-wrap fs-13px text-uppercase ls-1 fw-semibold m-0">
                                <li class="list-inline-item"><a class="text-reset text-decoration-none text-primary-hover" href="#" title="Life style">Life style</a></li>
                                <li class="border-start ps-5 ms-5 list-inline-item">Jan 19th, 2021</li>
                            </ul>
                            <h4 class="card-title lh-base mt-5 pt-2 mb-0">
                                <a class="text-decoration-none" href="../blog/details-01.html" title="How To Choose The Right Sofa for your home">How To Choose The Right Sofa for your home</a>
                            </h4>
                        </div>
                    </article>
             
            </div>
            <div class="text-center pt-2">
                <a href="#" class="mt-12 btn btn-outline-dark">View All Posts</a>
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







<section id="from_our_blog">
    <div class="pt-14 pb-15 py-lg-18 mb-3 mt-1">
        <div class="container">
            <div class="text-center" data-animate="fadeInUp">
                <h2 class="mb-6">From Our Blog</h2>
                <p class="fs-18px mb-0 mw-xl-50 mw-lg-75 ms-auto me-auto">Our bundles were designed to conveniently package your tanning essentials while saving you money.</p>
            </div>
        </div>
        <div class="container container-xxl mt-12 pt-3">
            <div class="slick-slider" data-slick-options='{&#34;arrows&#34;:false,&#34;dots&#34;:false,&#34;responsive&#34;:[{&#34;breakpoint&#34;:1200,&#34;settings&#34;:{&#34;slidesToShow&#34;:3}},{&#34;breakpoint&#34;:992,&#34;settings&#34;:{&#34;dots&#34;:true,&#34;slidesToShow&#34;:2}},{&#34;breakpoint&#34;:768,&#34;settings&#34;:{&#34;dots&#34;:true,&#34;slidesToShow&#34;:1}}],&#34;slidesToShow&#34;:3}'>
                <div>
                    <article class="card card-post-grid-3 bg-transparent border-0" data-animate="fadeInUp">
                        <figure class="card-img-top mb-8 position-relative"><a href="#" class="hover-shine hover-zoom-in d-block" title="How to Plop Hair for Bouncy, Beautiful Curls">
                                <img data-src="/assets/images/blog/post-01-450x290.jpg" class="img-fluid lazy-image w-100" alt="How to Plop Hair for Bouncy, Beautiful Curls" width="450" height="290" src="#">
                            </a></figure>
                        <div class="card-body p-0">
                            <ul class="post-meta list-inline lh-1 d-flex flex-wrap fs-13px text-uppercase ls-1 fw-semibold m-0">
                                <li class="list-inline-item"><a class="text-reset text-decoration-none text-primary-hover" href="#" title="Life style">Life style</a></li>
                                <li class="border-start ps-5 ms-5 list-inline-item">Jan 19th, 2021</li>
                            </ul>
                            <h4 class="card-title lh-base mt-5 pt-2 mb-0">
                                <a class="text-decoration-none" href="../blog/details-01.html" title="How to Plop Hair for Bouncy, Beautiful Curls">How to Plop Hair for Bouncy, Beautiful Curls</a>
                            </h4>
                        </div>
                    </article>
                </div>
                <div>
                    <article class="card card-post-grid-3 bg-transparent border-0" data-animate="fadeInUp">
                        <figure class="card-img-top mb-8 position-relative"><a href="#" class="hover-shine hover-zoom-in d-block" title="Which foundation formula is right for your skin?">
                                <img data-src="/assets/images/blog/post-05-450x290.jpg" class="img-fluid lazy-image w-100" alt="Which foundation formula is right for your skin?" width="450" height="290" src="#">
                            </a></figure>
                        <div class="card-body p-0">
                            <ul class="post-meta list-inline lh-1 d-flex flex-wrap fs-13px text-uppercase ls-1 fw-semibold m-0">
                                <li class="list-inline-item"><a class="text-reset text-decoration-none text-primary-hover" href="#" title="Life style">Life style</a></li>
                                <li class="border-start ps-5 ms-5 list-inline-item">Jan 19th, 2021</li>
                            </ul>
                            <h4 class="card-title lh-base mt-5 pt-2 mb-0">
                                <a class="text-decoration-none" href="../blog/details-01.html" title="Which foundation formula is right for your skin?">Which foundation formula is right for your skin?</a>
                            </h4>
                        </div>
                    </article>
                </div>
                <div>
                    <article class="card card-post-grid-3 bg-transparent border-0" data-animate="fadeInUp">
                        <figure class="card-img-top mb-8 position-relative"><a href="#" class="hover-shine hover-zoom-in d-block" title="How To Choose The Right Sofa for your home">
                                <img data-src="/assets/images/blog/post-06-450x290.jpg" class="img-fluid lazy-image w-100" alt="How To Choose The Right Sofa for your home" width="450" height="290" src="#">
                            </a></figure>
                        <div class="card-body p-0">
                            <ul class="post-meta list-inline lh-1 d-flex flex-wrap fs-13px text-uppercase ls-1 fw-semibold m-0">
                                <li class="list-inline-item"><a class="text-reset text-decoration-none text-primary-hover" href="#" title="Life style">Life style</a></li>
                                <li class="border-start ps-5 ms-5 list-inline-item">Jan 19th, 2021</li>
                            </ul>
                            <h4 class="card-title lh-base mt-5 pt-2 mb-0">
                                <a class="text-decoration-none" href="../blog/details-01.html" title="How To Choose The Right Sofa for your home">How To Choose The Right Sofa for your home</a>
                            </h4>
                        </div>
                    </article>
                </div>
            </div>
            <div class="text-center pt-2" data-animate="fadeInUp">
                <a href="#" class="mt-12 btn btn-outline-dark">View All Posts</a>
            </div>
        </div>
    </div>
</section>
