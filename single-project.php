<?php



function enqueue_custom_product_styles()
{
    wp_enqueue_style('custom-product-styles', get_template_directory_uri() . '/assets/css/single-project.css');
}
add_action('wp_enqueue_scripts', 'enqueue_custom_product_styles');

get_header();


?>




<div class="container back-link">
    <div class="d-flex">
        <a href="javascript:void(0);" onclick="if (document.referrer) { history.back(); } else { window.location.href='/project'; }" id="back-button">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/project-back-arrow.svg" alt="Back Arrow"> Back
        </a>
    </div>

</div>



<section id="single-project">

    <div class="container">

        <div class="row justify-content-between">
            <div class="col-12 col-md-5 order-2 order-md-1 d-flex flex-column justify-content-center">
                <?php if (get_field('hero_section')): ?>
                    <?php $hero = get_field('hero_section'); ?>
                    <?php if (!empty($hero['hero_content_group'])): ?>
                        <?php $content = $hero['hero_content_group']; ?>

                        <!-- Default WordPress Title -->
                        <h2><?php the_title(); ?></h2>

                        <p><?php echo esc_html($content['hero_description']); ?></p>

                        <?php if (!empty($content['hero_primary_link'])): ?>
                            <a href="<?php echo esc_url($content['hero_primary_link']['url']); ?>"
                                class="link-arrow font-reg"
                                target="<?php echo esc_attr($content['hero_primary_link']['target']); ?>">
                                <?php echo esc_html($content['hero_primary_link']['title']); ?>
                            </a>
                        <?php endif; ?>

                        <?php if (!empty($content['hero_secondary_link'])): ?>
                            <a href="<?php echo esc_url($content['hero_secondary_link']['url']); ?>"
                                class="link-arrow font-reg"
                                target="<?php echo esc_attr($content['hero_secondary_link']['target']); ?>">
                                <?php echo esc_html($content['hero_secondary_link']['title']); ?>
                            </a>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endif; ?>
            </div>

            <!-- Image or Video Column -->
            <div class="col-12 custom-gap col-xl-6 d-flex flex-column justify-content-center order-1 order-xl-1 position-relative">
                <?php if (!empty($hero['media_option'])): ?>
                    <?php $media_option = $hero['media_option']; ?>
                    <?php if ($media_option['media_type'] === 'image' && !empty($media_option['hero_image'])): ?>
                        <img class="img-fluid hero-img"
                            src="<?php echo esc_url($media_option['hero_image']['url']); ?>"
                            alt="<?php echo esc_attr($media_option['hero_image']['alt']); ?>"
                            style="border-radius:20px;">
                    <?php elseif ($media_option['media_type'] === 'video' && !empty($media_option['video_url']) && !empty($media_option['video_thumbnail'])): ?>
                        <img class="img-fluid video-thumbnail"
                            src="<?php echo esc_url($media_option['video_thumbnail']['url']); ?>"
                            alt="<?php echo esc_attr($media_option['video_thumbnail']['alt']); ?>"
                            id="video-thumbnail">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/play_circle.svg"
                            alt="Play Button"
                            class="play-icon"
                            id="play-button">
                        <div id="videoModal" class="modal">
                            <div class="modal-content">
                                <span class="close">&times;</span>
                                <div id="youtube-video-container"></div>
                            </div>
                        </div>
                    <?php else: ?>
                        <p>Media not configured properly. Please check fields.</p>
                    <?php endif; ?>
                <?php else: ?>
                    <p>Media options are not set.</p>
                <?php endif; ?>
            </div>


            <!-- Modal for YouTube video -->
            <div id="videoModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <div id="youtube-video-container"></div>
                </div>
            </div>
















        </div>










        <div id="media-gallery" class="row dates-section g-4 align-items-stretch">
            <?php if (have_rows('project_photos_group')): ?>
                <?php while (have_rows('project_photos_group')): the_row(); ?>
                    <?php if (have_rows('project_photos_repeater')): ?>
                        <?php while (have_rows('project_photos_repeater')): the_row(); ?>
                            <?php
                            $media_type = get_sub_field('media_type');
                            $photo_image = get_sub_field('photo_image');
                            $video_url = get_sub_field('video_url');
                            $video_overlay_image = get_sub_field('video_overlay_image');
                            $photo_description = get_sub_field('photo_description');
                            $unique_id = get_row_index(); // Unique ID for each modal
                            ?>

                            <div class="col-12 col-md-6">
                                <div class="image-wrap position-relative">
                                    <?php if ($media_type === 'image' && !empty($photo_image)): ?>
                                        <!-- Display Image -->
                                        <img class="img-fluid"
                                            src="<?php echo esc_url($photo_image['url']); ?>"
                                            alt="<?php echo esc_attr($photo_image['alt']); ?>">
                                    <?php elseif ($media_type === 'video' && !empty($video_url) && !empty($video_overlay_image)): ?>
                                        <!-- Display Video Overlay -->
                                        <div class="video-overlay position-relative" data-video-url="<?php echo esc_url($video_url); ?>">
                                            <img class="img-fluid video-thumbnail"
                                                src="<?php echo esc_url($video_overlay_image['url']); ?>"
                                                alt="<?php echo esc_attr($video_overlay_image['alt']); ?>">
                                            <button class="play-icon" id="play-button-<?php echo $unique_id; ?>">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/play_circle.svg"
                                                    alt="Play Button">
                                            </button>
                                        </div>

                                        <!-- Modal for Video -->
                                        <div id="videoModal-<?php echo $unique_id; ?>" class="modal">
                                            <div class="modal-content">
                                                <span class="close" data-index="<?php echo $unique_id; ?>">&times;</span>
                                                <div id="youtube-video-container-<?php echo $unique_id; ?>"></div>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <p>Media not configured properly. Please check fields.</p>
                                    <?php endif; ?>

                                    <!-- Description -->
                                    <div class="date-format">
                                        <?php if (!empty($photo_description)): ?>
                                            <p><?php echo esc_html($photo_description); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>



        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const mediaGallery = document.getElementById('media-gallery');

                if (!mediaGallery) return; // Ensure #media-gallery exists

                const playButtons = mediaGallery.querySelectorAll('.play-icon');

                playButtons.forEach(function(button) {
                    const uniqueId = button.id.split('-').pop();
                    const modal = document.getElementById('videoModal-' + uniqueId);
                    const closeButton = modal.querySelector('.close');
                    const videoContainer = document.getElementById('youtube-video-container-' + uniqueId);

                    // Get the video URL from the data attribute
                    const youtubeVideoUrl = button.closest('.video-overlay').getAttribute('data-video-url');
                    const embedUrl = youtubeVideoUrl.replace("watch?v=", "embed/") + "?autoplay=1&rel=0";

                    // Show modal and load iframe
                    button.addEventListener('click', function() {
                        modal.style.display = "block";
                        videoContainer.innerHTML = `<iframe width="100%" height="100%" src="${embedUrl}" frameborder="0" allow="autoplay; encrypted-media; fullscreen" allowfullscreen></iframe>`;
                    });

                    // Close modal and clear iframe
                    closeButton.addEventListener('click', function() {
                        modal.style.display = "none";
                        videoContainer.innerHTML = ''; // Clear iframe to stop playback
                    });

                    // Close modal when clicking outside
                    window.addEventListener('click', function(event) {
                        if (event.target === modal) {
                            modal.style.display = "none";
                            videoContainer.innerHTML = ''; // Clear iframe to stop playback
                        }
                    });
                });
            });
        </script>

        <style>
            #media-gallery .play-icon {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                background: none;
                border: none;
                cursor: pointer;
                z-index: 10;
            }

            #media-gallery .modal {
                display: none;
                position: fixed;
                z-index: 1050;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                overflow: auto;
                background-color: rgba(0, 0, 0, 0.8);
            }

            #media-gallery .modal-content {
                position: relative;
                margin: 10% auto;
                padding: 20px;
                width: 80%;
                max-width: 800px;
                background: #fff;
                border-radius: 8px;
            }

            #media-gallery .modal-content iframe {
                width: 100%;
                height: 400px;
            }

            #media-gallery .modal .close {
                position: absolute;
                top: 10px;
                right: 20px;
                font-size: 24px;
                font-weight: bold;
                color: #333;
                cursor: pointer;
            }
        </style>








        <div class="row project-overview">
            <div class="container">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="table-primary">
                            <tr>
                                <th class="custom-background" colspan="2">Project Overview</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (have_rows('project_overview_repeater')): ?>
                                <?php while (have_rows('project_overview_repeater')): the_row(); ?>
                                    <?php
                                    $row_label = get_sub_field('row_label');
                                    $row_value = get_sub_field('row_value');
                                    ?>
                                    <tr>
                                        <td><?php echo esc_html($row_label); ?></td>
                                        <td><?php echo esc_html($row_value); ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="2">No project overview data available.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>




    </div>


</section>


<section id="contact-us" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/blue-background-circle.svg');">
    <div class="container">
        <!-- Section Title -->
        <h2><?php echo esc_html(get_field('contact_section_title')); ?></h2>

        <div class="row justify-content-end">
            <!-- Learn More Link -->
            <?php $contact_learn_more_link = get_field('contact_learn_more_link'); ?>
            <?php if ($contact_learn_more_link): ?>
                <a href="<?php echo esc_url($contact_learn_more_link['url']); ?>" class="link-arrow font-reg mt-auto" target="<?php echo esc_attr($contact_learn_more_link['target']); ?>">
                    <?php echo esc_html($contact_learn_more_link['title']); ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>




<style>
    .dropdown-menu.show {
        border: 1px solid #1e3c72;
    }





    .back-link a:hover img {
        content: url("<?php echo get_template_directory_uri(); ?>/assets/images/project-back-arrow-red.svg");
    }




    #single-project .link-arrow::before,
    #single-project .link-arrow::after {
        content: url("<?php echo get_template_directory_uri(); ?>/assets/images/arrow-right.svg");

    }

    #single-project .link-arrow:hover::before {
        content: url("<?php echo get_template_directory_uri(); ?>/assets/images/arrow-right-red.svg");
    }




    #contact-us .link-arrow::before,
    #contact-us .link-arrow::after {
        content: url('<?php echo get_template_directory_uri(); ?>/assets/images/arrow-right-white.svg');
    }


    #contact-us .link-arrow:hover::before {
        content: url('<?php echo get_template_directory_uri(); ?>/assets/images/arrow-right-red.svg');
    }

    
    /* Ensure parent container is positioned */
    #single-project .position-relative {
        position: relative;
    }

    /* Style for the video thumbnail */
    #single-project .video-thumbnail {
        display: block;
        width: 100%;
        height: auto;
        border-radius: 20px;
    }

    /* Style for the play button */
    #single-project .play-icon {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 60px;
        /* Adjust size as needed */
        height: 60px;
        /* Adjust size as needed */
        cursor: pointer;
        padding: 0px;
    }


    #single-project .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        z-index: 1050;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.8);
    }

    #single-project #youtube-video-container iframe {
        width: 100%;
        height: 100%;
    }


    #single-project .modal-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 80%;
        max-width: 1063px;
        height: 800px;
        background-color: transparent;
    }








</style>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Element references
        const modal = document.getElementById('videoModal');
        const playButton = document.getElementById('play-button');
        const closeButton = modal.querySelector('.close');
        const videoContainer = document.getElementById('youtube-video-container');

        // Check if the play button and modal exist
        if (!playButton || !modal || !closeButton || !videoContainer) {
            console.error("Modal or associated elements are missing in the DOM.");
            return;
        }

        // Get YouTube video link dynamically
        const youtubeVideoUrl = "<?php echo esc_js($media_option['video_url'] ?? ''); ?>";

        if (!youtubeVideoUrl) {
            console.error("YouTube video URL is not defined or missing in the backend.");
            return;
        }

        // Convert the YouTube link to the embed format
        const embedUrl = youtubeVideoUrl.replace("watch?v=", "embed/") + "?autoplay=1&rel=0";

        // Show the modal and load the iframe when the play button is clicked
        playButton.addEventListener('click', function() {
            console.log("Play button clicked, displaying modal with video.");
            modal.style.display = "block";
            videoContainer.innerHTML = `
                <iframe width="100%" height="100%" 
                        src="${embedUrl}" 
                        frameborder="0" 
                        allow="autoplay; encrypted-media; fullscreen" 
                        allowfullscreen>
                </iframe>`;
        });

        // Close the modal and remove the iframe when 'X' is clicked
        closeButton.addEventListener('click', function() {
            console.log("Close button clicked, hiding modal.");
            modal.style.display = "none";
            videoContainer.innerHTML = ''; // Clear the iframe
        });

        // Close the modal when clicking outside the modal content
        window.addEventListener('click', function(event) {
            if (event.target === modal) {
                console.log("Click outside modal content, hiding modal.");
                modal.style.display = "none";
                videoContainer.innerHTML = ''; // Clear the iframe
            }
        });
    });
</script>



<?php
get_footer();
?>