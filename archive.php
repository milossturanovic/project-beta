<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Rekos_Agency
 */

get_header();
?>

<section id="projects-filter">
    <div class="container">
        <h1><?php single_cat_title(); ?></h1>
        <p><?php echo category_description(); ?></p> <!-- Displays the current category's description -->

        <div class="tab-content" id="customTabfilterContent">
            <div class="tab-pane fade show active" id="custom-content0" role="tabpanel" aria-labelledby="custom-tab0">
                <div class="row d-flex align-items-stretch blog-slider-container">
                    <?php
                    // Query posts from the current category
                    $project_query = new WP_Query(array(
                        'post_type'      => 'project',
                        'posts_per_page' => -1, // Fetch all posts
                        'tax_query'      => array(
                            array(
                                'taxonomy' => 'category',
                                'field'    => 'id',
                                'terms'    => get_queried_object_id(), // Get current category ID
                                'operator' => 'IN', // Include posts with multiple categories
                            ),
                        ),
                    ));

                    if ($project_query->have_posts()) :
                        while ($project_query->have_posts()) :
                            $project_query->the_post(); ?>
                            <div class="col-12 col-md-6 col-xl-4 custom-margin">
                                <div class="card h-100">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <img decoding="async" class="card-img-top" src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title_attribute(); ?>">
                                    <?php else : ?>
                                        <img decoding="async" class="card-img-top" src="/path/to/placeholder.jpg" alt="Placeholder image">
                                    <?php endif; ?>
                                    <div class="card-body d-flex flex-column">
                                        <a href="<?php the_permalink(); ?>" class="card-title">
                                            <h3><?php the_title(); ?></h3>
                                        </a>
                                        <p class="card-text"><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>
                                        <a href="<?php the_permalink(); ?>" class="link-arrow">Read more</a>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile;
                    else : ?>
                        <p>No projects found in this category.</p>
                    <?php endif;

                    // Reset post data
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>





<style>

    body{
        background-color: #f5f8ff;
    }

    .dropdown-menu.show{
        border:1px solid #1e3c72;
        background: #f5f8ff !important; 
        border-radius: 16px;
    }

    

    #projects-filter .link-arrow::before,
    #projects-filter .link-arrow::after {
        content: url("<?php echo get_template_directory_uri(); ?>/assets/images/arrow-right.svg");

    }

    #projects-filter .link-arrow:hover::before {
        content: url("<?php echo get_template_directory_uri(); ?>/assets/images/arrow-right-red.svg");
    }


    #customTabfilterContent .link-arrow::before,
    #customTabfilterContent .link-arrow::after {
        content: url("<?php echo get_template_directory_uri(); ?>/assets/images/arrow-right.svg");

    }

    #customTabfilterContent .link-arrow:hover::before {
        content: url("<?php echo get_template_directory_uri(); ?>/assets/images/arrow-right-red.svg");
    }

</style>






<?php

get_footer();






