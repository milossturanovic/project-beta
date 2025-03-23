<?php
get_header(); // Include the header
?>



<section id="single-event">
    <div class="container back-link">
        <div class="d-flex">
            <!-- Back link to previous page -->
            <a href="javascript:history.back()" onclick="if(event.clientY<0) { window.location.href='<?php echo esc_url(home_url('/events')); ?>'; }">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/project-back-arrow.svg" alt="Back Arrow"> Back
            </a>

        </div>
    </div>

    <div class="container">
        <div class="row mr-3 mt-lg-5 custom-gap">
            <!-- Event Image -->
            <div class="col-12 col-lg-5 d-flex justify-content-center">
                <?php if (has_post_thumbnail()) : ?>
                    <img class="img-fluid custom-size" src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>">
                <?php else : ?>
                    <img class="img-fluid custom-size" src="/images/single-event.png" alt="Default Event Image">
                <?php endif; ?>
            </div>

            <div class="col-12 col-lg-6 d-flex flex-column justify-content-center">
                <!-- Event Title -->
                <h2><?php the_title(); ?></h2>
                <hr>

                <!-- Event Details -->
                <div class="row g-0 info-container">
                    <div class="col-12 col-md-5 info-title">Date</div>
                    <div class="col-12 col-md-7 info-data">
                        <?php
                        $start_date = get_post_meta(get_the_ID(), 'event_date', true);
                        $end_date = get_post_meta(get_the_ID(), 'event_end_date', true);
                        echo esc_html(date('F d', strtotime($start_date)));
                        if ($end_date) {
                            echo ' - ' . esc_html(date('d, Y', strtotime($end_date)));
                        } else {
                            echo ', ' . esc_html(date('Y', strtotime($start_date)));
                        }
                        ?>
                    </div>

                    <div class="row g-0 my-3">
                        <div class="col-12 col-md-5 info-title">Location</div>
                        <div class="col-12 col-md-7 info-data">
                            <?php echo esc_html(get_post_meta(get_the_ID(), 'event_location', true)); ?>
                        </div>
                    </div>

                    <div class="row g-0">
                        <div class="col-12 col-md-5 info-title">Booth Location</div>
                        <div class="col-12 col-md-7 info-data">
                            <?php echo esc_html(get_post_meta(get_the_ID(), 'booth_location', true) ?: 'Not specified'); ?>
                        </div>
                    </div>
                </div>

                <hr>

                <!-- Event Content -->
                <article class="post-content">
                    <?php the_content(); ?>
                </article>
            </div>
        </div>
    </div>
</section>




<style>
    #single-event .back-link {
        margin-top: 20px;
        margin-bottom: 20px;
    }

    #single-event .back-link img {
        margin-right: 24px;
        cursor: pointer;
    }

    #single-event .back-link a {
        color: var(--Blue, #1e3c72);
        font-size: 16px;
        font-style: normal;
        font-weight: 600;
        line-height: 24px;
    }

    #single-event .back-link a:hover img {
        content: url("<?php echo get_template_directory_uri(); ?>/assets/images/project-back-arrow-red.svg");
    }

    #single-event .back-link a:hover {
        color: #ca202e;
    }

    #single-event {
        margin-bottom: 80px;
    }

    #single-event .custom-size {
        border-radius: 20px;
        width: 720px;
        height: 480px;
        object-fit: cover;
        /* Ensures the image scales to fill the container without distortion */
        flex-shrink: 0;
    }

    #single-event .custom-gap {
        gap: 64px;
    }

    #single-event h2 {
        color: var(--Blue, #1e3c72);

        /* H5 semibold 36 (AA) */
        font-family: Geologica;
        font-size: 36px;
        font-style: normal;
        font-weight: 600;
        line-height: 40px;
        /* 111.111% */
        text-transform: uppercase;
        margin-bottom: 32px;
    }


    #single-event hr {
        margin: 0px;
    }

    #single-event .info-container {
        margin: 12px 0px;
    }

    #single-event .info-title {
        color: var(--Blue, #1E3C72);
        font-family: Geologica;
        font-size: 16px;
        font-style: normal;
        font-weight: 500;
        line-height: 24px;
        /* 150% */
        letter-spacing: 3.2px;
        text-transform: uppercase;
    }

    #single-event .info-data {

        color: var(--Blue, #1E3C72);

        /* Body regular 16 (Aa) */
        font-family: Geologica;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: 24px;
        /* 150% */
    }


    #single-event .post-content {
        margin-top: 32px;
        color: #1E3C72;
    }



    @media screen and (max-width:992px) {


        #single-event .custom-gap {
            gap: 0px;
        }


        #single-event .custom-size {
            border-radius: 20px;
            height: 100%;
            max-height: 346px;
            width: 100%;
        }


        #single-event h2 {
            margin-top: 32px;

            font-size: 30px;
            font-style: normal;
            font-weight: 600;
            line-height: 36px;
            /* 120% */
            text-transform: uppercase;

        }




    }
</style>




<?php
get_footer(); // Include the footer
