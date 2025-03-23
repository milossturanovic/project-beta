<?php

/**
 * The Template for displaying Filters widget bottom controls.
 *
 * This template can be overridden by copying it to yourtheme/filters/bottom-controls.php.
 *
 * $action_url - string, URL to the page with filtering results
 * $found_posts - int|NULL, found posts number
 *
 * @see https://filtereverything.pro/resources/templates-overriding/
 */

if (! defined('ABSPATH')) {
    exit;
}

?>
<div class="wpc-filters-widget-controls-item wpc-filters-widget-controls-one">
    <a class="wpc-filters-close-button" href="<?php echo esc_url($action_url); ?>"><?php
                                                                                    echo esc_html__('Clear Filters', 'filter-everything');
                                                                                    ?>

        <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M5.75 15L15.75 5" stroke="#FF7A06" stroke-width="2" />
            <path d="M15.75 15L5.75 5" stroke="#FF7A06" stroke-width="2" />
        </svg>
    </a>

</div>
<div class="wpc-filters-widget-controls-item wpc-filters-widget-controls-two">


    <a class="wpc-filters-apply-button wpc-posts-loaded" href="<?php echo esc_url($action_url); ?>"><?php
                                                                                                    echo wp_kses(
                                                                                                        sprintf(
                                                                                                            __('View items', 'filter-everything'),
                                                                                                            '<span class="wpc-filters-found-posts-wrapper">(<span class="wpc-filters-found-posts">' . esc_html($found_posts) . '</span>)</span>'
                                                                                                        ),
                                                                                                        array('span' => array('class' => true))
                                                                                                    );
                                                                                                    ?></a>
</div>




<style>
    /*


filter buttons


*/


    .wpc-filters-widget-controls-wrapper {
        background: #F7F7F7;
        gap: 16px;
        margin: 0px;
        padding: 16px 24px;
    }



    .wpc-filters-widget-controls-one .wpc-filters-close-button {
        border-radius: 6px;
        background: #FFF0E3;
        display: flex;
        padding: 0px 12px;
        justify-content: center;
        align-items: center;
        gap: 8px;
        flex: 1 0 0;
        color: var(--Juoda, #000);
        font-family: Poppins;
        font-size: 14px;
        font-style: normal;
        font-weight: 600;
        line-height: 20px;
       
    }


    .wpc-filters-main-wrap .wpc-filters-widget-controls-container a {
        height: 48px;
        align-content: center;
        color: var(--Juoda, #000);

        /* B 14, semi */
        font-family: Poppins;
        font-size: 14px;
        font-style: normal;
        font-weight: 600;
        line-height: 20px;
        /* 142.857% */ border: none;
    }




    .wpc-filters-widget-controls-two a {
        border-radius: 6px;
        background: var(--Yellow, #FFCB00) !important;
        color: var(--Juoda, #000) !important;

        /* B 14, semi */
        font-family: Poppins;
        font-size: 14px;
        font-style: normal;
        font-weight: 600;
        line-height: 20px;
        /* 142.857% */ border: none;
    }
</style>