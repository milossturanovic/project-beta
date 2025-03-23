<?php
/*
Template Name: Privacy Policy
*/
get_header();
?>



<section id="privacy-policy-hero">

    <div class="container">

        <!-- Privacy Policy Title -->
        <h1><?php the_title(); ?></h1>

        <!-- Last Updated Date -->
        <div class="time">
            <p>Last Updated on <time datetime="<?php the_modified_date('Y-m-d'); ?>">
                    <?php echo get_the_modified_date('l, d F Y'); ?>
                </time></p>
        </div>

        <!-- Intro/Excerpt -->
        <div class="intro">
            <p><?php echo get_the_excerpt(); ?></p>
        </div>

    </div>

</section>



<section id="privacy-content">
    <div class="container">
        <div class="row">
            <!-- Anchor Tag Column -->
            <div class="d-none d-md-flex col-4 anchor-tag">
                <!-- Links will be dynamically generated here -->
            </div>

            <!-- Privacy Text Content -->
            <div class="col-12 col-md-8 privacy-text px-4 px-md-0">
                <?php
                // Output the content (which contains <h3> elements) 
                while (have_posts()) : the_post();
                    the_content();
                endwhile;
                ?>
            </div>
        </div>
    </div>
</section>









<style>
    #privacy-policy-hero .container {
        border-radius: 30px;
        border: 1px solid var(--Blue, #1e3c72);
        padding: 48px 96px;
        margin-bottom: 96px;
    }

    #privacy-policy-hero h1 {
        color: var(--Blue, #1e3c72);
        font-size: 80px;
        font-style: normal;
        font-weight: 700;
        line-height: 96px;
        /* 120% */
        text-transform: uppercase;
    }

    #privacy-policy-hero .time {
        margin-top: 24px;
        margin-bottom: 64px;
    }

    #privacy-policy-hero p {
        color: var(--Blue, #1e3c72);
        font-size: 18px;
        font-style: normal;
        font-weight: 400;
        line-height: 28px;
        /* 155.556% */
    }

    #privacy-policy-hero .intro {
        width: 72%;
    }

    #privacy-content {
        margin-bottom: 96px;
    }

    #privacy-content .privacy-text h2,
    #privacy-content .privacy-text h3,
    #privacy-content .privacy-text h4,
    #privacy-content .privacy-text h5 {
        color: var(--Blue, #1e3c72);
        font-size: 36px;
        font-style: normal;
        font-weight: 600;
        line-height: 40px;
        /* 111.111% */
        text-transform: uppercase;
        margin-bottom: 24px;
    }



    #privacy-content .privacy-text {
        color: var(--Blue, #1e3c72);
        font-size: 18px;
        font-style: normal;
        font-weight: 400;
        line-height: 28px;
        /* 155.556% */
    }

    #privacy-content .anchor-tag {
        display: flex;
        flex-direction: column;

        position: relative;
        /* Enable absolute positioning for ::before */
    }

    #privacy-content .anchor-tag a {
        padding-left: 16px;
        color: var(--Blue, #1e3c72);
        font-size: 20px;
        font-style: normal;
        font-weight: 500;
        line-height: 28px;
        border-left: 1px solid #bbc5d5;
        padding-top: 10px;
        padding-bottom: 10px;
        transition: 0.5s;
        text-transform: capitalize;
    }

    #privacy-content .anchor-tag a:hover {
        color: #ca202e;
        border-left: 1px solid #1e3c72;
    }

    @media screen and (max-width: 992px) {
        #privacy-policy-hero {
            padding: 0px 24px;
        }

        #privacy-policy-hero .container {
            padding: 24px;
        }

        #privacy-policy-hero .time p {
            font-size: 14px !important;
            font-style: normal;
            font-weight: 400;
            line-height: 20px;
            /* 142.857% */
        }

        #privacy-policy-hero .intro p {

            font-size: 16px;
            font-style: normal;
            font-weight: 400;
            line-height: 24px;
            /* 150% */
        }


        #privacy-policy-hero h1 {
            font-size: 50px;
            font-style: normal;
            font-weight: 600;
            line-height: 130%;
            /* 65px */
            text-transform: uppercase;
        }


        #privacy-content .privacy-text {
            font-size: 16px;
            font-style: normal;
            font-weight: 400;
            line-height: 24px;
            /* 150% */
        }


        #privacy-content .privacy-text h2,
        #privacy-content .privacy-text h3,
        #privacy-content .privacy-text h4,
        #privacy-content .privacy-text h5 {
            font-size: 30px;
            font-style: normal;
            font-weight: 600;
            line-height: 36px;
            /* 120% */
            text-transform: uppercase;
        }

        #privacy-policy-hero .time {
            font-size: 14px;
            font-style: normal;
            font-weight: 400;
            line-height: 20px;
            /* 142.857% */
        }

        #privacy-policy-hero .intro {
            width: 96%;
        }
    }
</style>



<script>
    document.addEventListener("DOMContentLoaded", function() {
        const anchorContainer = document.querySelector('.anchor-tag');
        const headings = document.querySelectorAll('.privacy-text h2, .privacy-text h3, .privacy-text h4, .privacy-text h5');

        headings.forEach((heading, index) => {
            // Assign unique ID to each heading
            const id = `section-${index + 1}`;
            heading.setAttribute('id', id);

            // Create anchor link
            const anchorLink = document.createElement('a');
            anchorLink.href = `#${id}`;
            anchorLink.innerText = heading.innerText;

            // Append anchor link to the sidebar
            anchorContainer.appendChild(anchorLink);
        });
    });
</script>

<?php get_footer(); ?>