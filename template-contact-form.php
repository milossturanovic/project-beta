<?php
/* Template Name: Contact Form */
get_header();

// Get the background image field
$background = get_field('background');
$background_url = $background ? $background['url'] : '';

// Get the title
$title = get_field('title');

// Get the text area
$text_area = get_field('text_area');

// Get the contact link field
$contact_link = get_field('contact_link');
$contact_link_url = $contact_link ? $contact_link['url'] : '';
$contact_link_title = $contact_link ? $contact_link['title'] : '';
$contact_link_target = $contact_link ? $contact_link['target'] : '_self';

// Get the kilometers number
$kilometers_number = get_field('kilometers_number');

$data_text = get_field('data_text');

?>

<section id="hero">
    <div class="container image-background d-flex align-items-center" style="background-image: url('<?php echo esc_url($background_url); ?>'); ">
        <div class="row h-100">
            <!-- Column 1 -->
            <div class="col-12 col-xl-6 d-flex flex-column justify-content-start justify-content-xl-center order-2 order-xl-1"

                data-aos="fade-left" data-aos-easing="linear" data-aos-delay="600">
                <?php if ($title): ?>
                    <h1 class="hero-title"><?php echo esc_html($title); ?></h1>
                <?php endif; ?>
                <p><?php echo esc_html($text_area); ?></p>



                <?php

                if (!empty($contact_link_url) && !empty($contact_link_title)) : ?>
                    <div class="button-wrapper">
                        <a href="<?php echo esc_url($contact_link_url); ?>" class="hexagon-button" target="<?php echo esc_attr($contact_link_target); ?>">
                            <?php echo esc_html($contact_link_title); ?>
                        </a>
                    </div>



                <?php endif; ?>

            </div>

            <!-- Column 2 -->
            <div class="col-12 col-xl-6 d-flex flex-column justify-content-start justify-content-xl-center align-items-start align-items-xl-end order-1 order-xl-2">
                <div class="stats text-end">
                    <div class="d-flex flex-column align-items-start align-items-xl-center">
                        <!-- Display the number or a placeholder if it's empty -->
                        <span class="number"><?php echo !empty($kilometers_number) ? esc_html($kilometers_number) : ''; ?></span>

                        <!-- Only show the <hr> if either of the spans has content -->
                        <?php if (!empty($kilometers_number) || !empty($data_text)) : ?>
                            <hr class="line"> <!-- Adjust the width using Bootstrap class -->
                        <?php endif; ?>

                        <!-- Display the length or a placeholder if it's empty -->
                        <span class="length"><?php echo !empty($data_text) ? esc_html($data_text) : ''; ?></span>
                    </div>
                </div>
            </div>



        </div>
    </div>
</section>


























<section id="buy-page">
    <div class="container">
        <div class="d-block align-items-center">
            <h2>Select all the products you are interested in:</h2>
        </div>
   <form id="emailForm"  method="POST" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
        <div class="row d-flex align-items-stretch custom-margin blog-slider-container">
         
                <input type="hidden" name="action" value="buy_page_form">

                <!-- Product Selection -->
                <?php
                $product_query = new WP_Query([
                    'post_type' => 'product',
                    'posts_per_page' => -1, // Retrieve all products
                ]);

                if ($product_query->have_posts()) :
                    while ($product_query->have_posts()) :
                        $product_query->the_post();

                        $product_id = get_the_ID();
                        $product_title = get_the_title();
                        $product_image = get_the_post_thumbnail_url($product_id, 'full') ?: 'images/bought.png';
                ?>
                        <div class="col-12 col-md-4 col-xl-4 mb-4">
                            <div class="card h-100 position-relative">
                                <input type="checkbox" class="form-check-input form-check-input-lg product-checkbox" name="products[<?php echo $product_id; ?>]" value="<?php echo esc_attr($product_title); ?>" id="checkbox-<?php echo $product_id; ?>">
                                <img decoding="async" class="card-img-top" src="<?php echo esc_url($product_image); ?>" alt="<?php echo esc_attr($product_title); ?>">
                                <div class="card-body d-flex flex-column">
                                    <a href="<?php the_permalink(); ?>" class="card-title"><?php echo esc_html($product_title); ?></a>
                                    <!-- Dropdown -->
                                    <div class="dropdown mt-2">
                                        <button class="btn btn-secondary dropdown-toggle d-flex justify-content-between align-items-center" type="button" id="dropdownMenuButton-<?php echo $product_id; ?>" data-bs-toggle="dropdown" aria-expanded="false">
                                            Selected Option
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton-<?php echo $product_id; ?>">
                                            <li>
                                                <a class="dropdown-item" href="#" data-value="default" onclick="setDropdownValue(<?php echo $product_id; ?>, 'Default Option')">Default Option</a>
                                            </li>
                                            <?php
                                            $hero_content_group = get_field('hero_content_group');
                                            if ($hero_content_group && isset($hero_content_group['brand_new_dropdown']) && is_array($hero_content_group['brand_new_dropdown'])):
                                                foreach ($hero_content_group['brand_new_dropdown'] as $dropdown_item):
                                                    $dropdown_option = $dropdown_item['dropdown_option'];
                                            ?>
                                                    <?php if ($dropdown_option): ?>
                                                        <li>
                                                            <a class="dropdown-item" href="#" data-value="<?php echo esc_attr($dropdown_option); ?>" onclick="setDropdownValue(<?php echo $product_id; ?>, '<?php echo esc_js($dropdown_option); ?>')">
                                                                <?php echo esc_html($dropdown_option); ?>
                                                            </a>
                                                        </li>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <li><span class="dropdown-item">No options available</span></li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                    <!-- Hidden Input for Dropdown -->
                                    <input type="hidden" name="dropdowns[<?php echo $product_id; ?>]" id="dropdown-<?php echo $product_id; ?>" value="Default Option">
                                </div>
                            </div>
                        </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p>No products found.</p>';
                endif;
                ?>

                <!-- Special Checkboxes -->
                <div class="col-12 col-md-4 col-xl-4 mb-4">
                    <div class="d-flex flex-column gap-3 h-100">
                        <div class="card flex-grow-1 position-relative">
                            <input type="checkbox" class="form-check-input form-check-input-lg special-checkbox" name="need_all" id="needAll" value="I need it all">
                            <div class="card-body d-flex flex-column">
                                <a href="#" class="card-title mt-auto">I need it all</a>
                            </div>
                        </div>
                        <div class="card flex-grow-1 position-relative">
                            <input type="checkbox" class="form-check-input form-check-input-lg special-checkbox" name="need_something_else" id="needSomethingElse" value="I need something else">
                            <div class="card-body d-flex flex-column">
                                <a href="#" class="card-title mt-auto">I need something else</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="container mt-4">
                    <h2>Contact Information</h2>

                 

                    <!-- Name Field -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>

                    <!-- Organization Field -->
                    <div class="mb-3">
                        <label for="organization" class="form-label">Organization</label>
                        <input type="text" class="form-control" name="organization" id="organization">
                    </div>

                    <!-- Email Field -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>

                    <!-- Message Field -->
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" name="message" id="message" rows="5" required></textarea>
                    </div>
					
					
					   <!-- Success Message -->
                    <?php if (isset($_GET['success']) && $_GET['success'] == '1'): ?>
                        <div class="alert alert-success" role="alert">
                            Thank you! Your message has been sent successfully.
                        </div>
                    <?php endif; ?>

                    <!-- Privacy Policy -->
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" name="privacy_policy" id="privacyPolicy" value="Accepted" required>
                        <label class="form-check-label" for="privacyPolicy">
                            Accept our <a href="/privacy-policy" target="_blank">Privacy Policy</a>
                        </label>
                    </div>
					

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary hexagon-button">Send</button>
					
					
					
					
                </div>
            </form>
        </div>
    </div>
</section>






<script>
	  // important fro the dropdown
    function setDropdownValue(productId, value) {
        document.getElementById('dropdown-' + productId).value = value;
    }
</script>



 
<script>
    // Scroll to the success message if it exists
    document.addEventListener('DOMContentLoaded', function () {
        const successMessage = document.querySelector('.alert.alert-success');
        if (successMessage) {
            successMessage.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    });
</script>






<!-- JavaScript for Select All / Dropdown -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const allCheckbox = document.getElementById('needAll');
        const somethingElseCheckbox = document.getElementById('needSomethingElse');
        const productCheckboxes = document.querySelectorAll('.product-checkbox');

        // Handle "Select All" checkbox
        allCheckbox.addEventListener('change', function () {
            if (this.checked) {
                productCheckboxes.forEach(checkbox => checkbox.checked = true);
                somethingElseCheckbox.checked = false; // Uncheck "Something Else"
            }
        });

        // Handle "Something Else" checkbox
        somethingElseCheckbox.addEventListener('change', function () {
            if (this.checked) {
                productCheckboxes.forEach(checkbox => checkbox.checked = false);
                allCheckbox.checked = false; // Uncheck "Select All"
            }
        });

        // Uncheck "Select All" if any product is manually unchecked
        productCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                if (!this.checked) {
                    allCheckbox.checked = false;
                }
            });
        });
    });
</script>









<style>
    /* our-projects start */
    body {
        background-color: #f5f8ff;
    }


    .dropdown-menu.show {
        border: 1px solid #1e3c72;
    }


    #buy-page {
        padding: 96px;
        margin: auto;
        overflow: hidden;
        position: relative;
        box-sizing: border-box;
    }

    #buy-page h2 {
        color: var(--Blue, #1e3c72);
        font-size: 36px;
        font-style: normal;
        font-weight: 600;
        line-height: 40px;
        /* 111.111% */
        text-transform: uppercase;
		margin-bottom:64px;
    }

    #buy-page .link-arrow {
        display: inline-block;
        flex: 0 auto;
        -webkit-box-flex: 0;
        min-width: 30%;
        position: relative;
        text-align: left;
        text-decoration: none;
        color: var(--Blue, #1e3c72);
        font-size: 16px;
        font-style: normal;
        font-weight: 600;
        line-height: 24px;
        padding-bottom: 14px;
        border-bottom: 1px solid #1e3c72;
    }

    #buy-page .link-arrow:hover {
        color: var(--Red, #ca202e);
        border-bottom: 1px solid var(--Red, #ca202e);
    }

    #buy-page .link-arrow::before,
    #buy-page .link-arrow::after {
        content: url("images/arrow-right.svg");
        display: block;
        font-family: Inter;
        font-size: inherit;
        position: absolute;
        top: 50%;
        right: 0px;
        transform: translate(0%, -50%);
        transition: all 0.5s cubic-bezier(0.25, 0.25, 0.08, 1.08);
    }

    #buy-page .link-arrow:hover::before {
        content: url("images/arrow-right-red.svg");
    }

    #buy-page .link-arrow.font-reg::before,
    #buy-page .link-arrow.font-reg::after {
        font-weight: 300;
    }

    #buy-page .link-arrow::before {
        opacity: 0;
        transform: translate(-100%, -50%);
    }

    #buy-page .link-arrow:hover::before {
        opacity: 1;
        transform: translate(0, -50%);
    }

    #buy-page .link-arrow:hover::after {
        opacity: 0;
        transform: translate(100%, -50%);
    }

    #buy-page .custom-margin {
        margin-top: 48px;
    }

    #buy-page .card {
        border-radius: 20px;
        background-color: white;
        border: none;
        padding: 32px 24px;
    }

    #buy-page .card a {
        color: var(--Blue, #1e3c72);
        font-size: 24px;
        font-style: normal;
        font-weight: 400;
        line-height: 32px;
        /* 133.333% */
        text-transform: capitalize;
        margin-top: 8px;
    }

    #buy-page .card a:hover {
        color: var(--Red, #ca202e);
    }

    #buy-page .card .dropdown-toggle {
        width: 100%;
        border-radius: 8px;
        border: 1px solid var(--Blue, #1e3c72);
        background: var(--White, #fff);
        color: var(--Blue, #1e3c72);
        padding: 12px 16px;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: 24px;
        /* 150% */
    }

    #buy-page .card .dropdown-toggle {
        width: 100%;
    }

    #buy-page .card .dropdown-menu.show li {
        padding: 0px !important;
        border-bottom: 0px;
    }

    #buy-page .dropdown-menu.show {
        width: 100%;
        background-color: white !important;
        padding: inherit;
    }

    #buy-page .dropdown-menu.show a {
        color: var(--Blue, #1e3c72);
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        line-height: 20px;
        /* 142.857% */
    }

    #buy-page .dropdown-menu.show a:active {
        background-color: white;
    }

    #buy-page .card-body {
        padding: 0px;
    }

    #buy-page .form-check-input-lg {
        width: 40px;
        height: 40px;
        margin-bottom: 8px;
        border: 2px solid #1e3c72;
        /* Set border color */
    }

    #buy-page .form-check-input-lg:checked {
        background-color: #1e3c72;
        /* Set background color for the checkmark */
        border-color: #1e3c72;
        /* Maintain the border color when checked */
    }

    #buy-page .form-check-input-lg:checked::before {
        display: block;
        width: 10px;
        height: 10px;
        background-color: #fff;
        /* Optional: white checkmark contrast */
        transform: rotate(45deg) scale(1.2);
        /* Enhance the checkmark appearance */
    }

    #buy-page .card .card-img-top {
        border-radius: 40px !important;
        height: 270px;
        /* Custom height */
        width: 100%;
        /* Ensure it spans the container width */
        object-fit: contain;
        /* Maintains aspect ratio while filling the height */
        object-position: center;
        /* Centers the image within the container */
    }

    #buy-page #emailForm {
        margin-top: 64px;
    }
	
	#buy-page #emailForm .form-check-input[type="checkbox"]{
		border: 3px solid #1e3c72 !important;
	}

    #buy-page #emailForm label {
        color: var(--Blue, #1e3c72);
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: 24px;
        /* 150% */
    }

    #buy-page #emailForm input {
        border: 0px;
    }

    #buy-page #emailForm .form-check .form-check-input {
        border: 2px solid #1e3c72;
        /* Set border color */
    }

    #buy-page #emailForm .form-check .form-check-input:checked {
        background-color: #1e3c72;
        /* Set background color for the checkmark */
        border-color: #1e3c72;
        /* Maintain the border color when checked */
    }

    #buy-page #emailForm .form-check .form-check-label {
        color: var(--Blue, #1e3c72);
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: 24px;
        /* 150% */
        padding-left: 8px;
    }

    #buy-page #emailForm .form-check .form-check-label a {
        color: var(--Blue, #1e3c72);
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: 24px;
        /* 150% */
        text-decoration: underline;
    }

    /* Hexagon button with SVG background */
    #buy-page #emailForm .hexagon-button {
        position: relative;
        display: grid;
        width: 254px;
        height: 54px;
        line-height: 42px !important;
        text-align: center;
        font-size: 12px;
        font-weight: bold;
        color: #1e3c72;
        text-decoration: none;
        text-transform: uppercase;
        font-family: Arial, sans-serif;
        background: url("<?php echo get_template_directory_uri(); ?>/assets/images/hexagon-contact-form-blue.svg") no-repeat center;
        background-size: auto;
        background-size: contain;
        transition: all 0.3s ease;
        z-index: 1;
        box-sizing: border-box;
        border: none;
        color: var(--Blue, #1e3c72);
        /* Mygtuku medium 16 (AA) */
        font-family: Geologica;
        font-size: 16px;
        font-style: normal;
        font-weight: 500;
        line-height: 24px;
        /* 150% */
        letter-spacing: 3.2px;
        text-transform: uppercase;
        margin-top: 32px;
    }

    #buy-page #emailForm .hexagon-button:hover {
        color: var(--Red);
        background: url("<?php echo get_template_directory_uri(); ?>/assets/images/hexagon-contact-form-red.svg") no-repeat center;
        background-size: auto;
        background-size: contain;
        transition: all 0.3s ease;
        z-index: 1;
        box-sizing: border-box;
    }

    /* Adding silver lines */
    #buy-page #emailForm .hexagon-button::before,
    #buy-page #emailForm .hexagon-button::after {
        content: "";
        position: absolute;
        width: 40px;
        /* Adjust the size of the silver lines */
        height: 4px;
        /* Thickness of the silver lines */
        background-color: #f5f8ff;
        /* Silver color */
        z-index: 2;
        /* Ensure they appear above the SVG background */
        transition: all 0.3s ease;
    }

    #buy-page #emailForm .hexagon-button::before {
        top: 0px;
        left: 63%;
        transform: translateX(-50%);
        height: 3px;
        width: 75px;
    }

    #buy-page #emailForm .hexagon-button::after {
        bottom: 0px;
        left: 37%;
        transform: translateX(-50%);
        height: 3px;
        width: 120px;
    }

    #buy-page #emailForm .hexagon-button:hover::before {
        left: 28%;
    }

    #buy-page #emailForm .hexagon-button:hover::after {
        left: 65%;
    }

    @media screen and (max-width: 1200px) {
        #buy-page {
            padding: 80px 0px !important;
            margin: auto;
            overflow: hidden;
            position: relative;
            box-sizing: border-box;
        }




    }

    @media screen and (min-width: 768px) {
        .blog-slider-navigation {
            display: none;
        }
    }

    @media screen and (max-width: 992px) {
        #buy-page {
            padding: 80px 0px !important;
        }

        #buy-page h2 {
            font-size: 30px;
            font-style: normal;
            font-weight: 600;
            line-height: 36px;
            /* 120% */
            text-transform: uppercase;
        }

        #buy-page .link-arrow {
            width: 100%;
            margin-top: 32px;
            margin-bottom: 48px;
        }

        #buy-page .card h5 {
            font-size: 20px;
            font-style: normal;
            font-weight: 500;
            line-height: 28px;
            /* 140% */
        }

        #buy-page .date {
            font-size: 14px;
            font-style: normal;
            font-weight: 400;
            line-height: 20px;
            /* 142.857% */
        }

        #buy-page .link-arrow {
            margin-bottom: 0px !important;
        }

        #buy-page .custom-margin {
            margin-top: 32px;
        }

        #buy-page .form-check-input-lg {
            width: 35px;
            height: 35px;
        }

        #buy-page .card a {
            color: var(--Blue, #1e3c72);
            font-size: 20px;
            font-style: normal;
            font-weight: 400;
            line-height: 28px;
            /* 140% */
        }

        #buy-page .flex-grow-1 {
            display: flex !important;
            flex-direction: row !important;
        }

        #buy-page .flex-grow-1 a {
            margin-left: 16px;
        }

        #buy-page #emailForm {
            margin-top: 32px;
        }
    }

    /* our-projects end */

    /* Our projects end */
</style>







<script>
    // Dropdown Menu Script
    document.querySelectorAll('#buy-page .dropdown').forEach(dropdown => {
        const dropdownMenuButton = dropdown.querySelector('.dropdown-toggle');
        const dropdownItems = dropdown.querySelectorAll('.dropdown-item');

        dropdownItems.forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault(); // Prevent default link behavior
                dropdownMenuButton.textContent = this.textContent; // Update the button text
            });
        });
    });

    // Checkboxes Script
    document.addEventListener('DOMContentLoaded', function() {
        // Only scope checkboxes inside the #buy-page section
        const buyPage = document.getElementById('buy-page');
        if (!buyPage) return;

        const allCheckbox = buyPage.querySelector('#needAll');
        const somethingElseCheckbox = buyPage.querySelector('#needSomethingElse');
        const productCheckboxes = buyPage.querySelectorAll('.product-checkbox');

        // Handle "I need it all" checkbox
        allCheckbox?.addEventListener('change', function() {
            if (this.checked) {
                productCheckboxes.forEach(checkbox => {
                    checkbox.checked = true;
                });
                somethingElseCheckbox.checked = false; // Uncheck "I need something else"
            }
        });

        // Handle "I need something else" checkbox
        somethingElseCheckbox?.addEventListener('change', function() {
            if (this.checked) {
                productCheckboxes.forEach(checkbox => {
                    checkbox.checked = false;
                });
                allCheckbox.checked = false; // Uncheck "I need it all"
            }
        });

        // Ensure "I need it all" gets unchecked if any product checkbox is manually unchecked
        productCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                if (!this.checked) {
                    allCheckbox.checked = false;
                }
            });
        });
    });

    // Form Submission Script
    document.querySelector('#emailForm').addEventListener('submit', function(e) {
        const selectedProducts = Array.from(document.querySelectorAll('#buy-page .product-checkbox:checked'))
            .map(checkbox => checkbox.nextElementSibling.alt) // Assuming the `alt` attribute contains product names
            .join(', ');

        document.getElementById('selectedProducts').value = selectedProducts || 'No products selected';
    });
</script>

<?php get_footer(); ?>
