<?php
get_header(); ?>




<section id="projects-filter">

    <div class="container">
        <h1>Projects</h1>

        <ul class="nav nav-tabs" id="customTab" role="tablist">
            <?php
            // Fetch all terms associated with the 'project_category' taxonomy
            $categories = get_terms(array(
                'taxonomy'   => 'project_category', // Use the new custom taxonomy
                'hide_empty' => false,
                'orderby'    => 'id', // Sort by term ID (first created will appear first)
                'order'      => 'ASC', // Ascending order
            ));

            $first_tab = true;
            foreach ($categories as $index => $category) : ?>
                <li class="nav-item" role="presentation">
                    <button class="nav-link <?php echo $first_tab ? 'active' : ''; ?>"
                        id="custom-tab<?php echo $index; ?>"
                        data-bs-toggle="tab"
                        data-bs-target="#custom-content<?php echo $index; ?>"
                        type="button"
                        role="tab"
                        aria-controls="custom-content<?php echo $index; ?>"
                        aria-selected="<?php echo $first_tab ? 'true' : 'false'; ?>">
                        <?php echo esc_html($category->name); ?>
                    </button>
                </li>
                <?php $first_tab = false; ?>
            <?php endforeach; ?>
        </ul>

        <!-- Tab content -->
        <div class="tab-content" id="customTabfilterContent">
            <?php
            $first_tab = true;
            foreach ($categories as $index => $category) : ?>
                <div class="tab-pane fade <?php echo $first_tab ? 'show active' : ''; ?>"
                    id="custom-content<?php echo $index; ?>"
                    role="tabpanel"
                    aria-labelledby="custom-tab<?php echo $index; ?>">
                    <div class="row d-flex align-items-stretch blog-slider-container">
                        <?php
                        // Query posts for the current custom taxonomy term
                        $project_query = new WP_Query(array(
                            'post_type'      => 'project',
                            'posts_per_page' => -1,
                            'tax_query'      => array(
                                array(
                                    'taxonomy' => 'project_category', // Use the custom taxonomy
                                    'field'    => 'term_id',          // Match by term ID
                                    'terms'    => $category->term_id, // Current term ID
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
                                            <img decoding="async" class="card-img-top" src="path/to/placeholder/image.jpg" alt="Placeholder image">
                                        <?php endif; ?>
                                        <div class="card-body d-flex flex-column">
                                            <a href="<?php the_permalink(); ?>" class="card-title">
                                                <h3><?php the_title(); ?></h3>
                                            </a>
                                            <p class="card-text"><?php echo custom_excerpt_length(get_the_excerpt(), 110); ?></p>

                                            <a href="<?php the_permalink(); ?>" class="link-arrow">Read more</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile;
                        else : ?>
                            <p>No projects found in this category.</p>
                        <?php
                        endif;

                        // Reset post data
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
                <?php $first_tab = false; ?>
            <?php endforeach; ?>
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
