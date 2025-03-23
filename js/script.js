// This script is used as a general script, that should not be used
//  for blocks, single pages




// script used for shortening the title of every product title

jQuery(function($) {
    function trimTitles() {
        $('.product-title').each(function() {
            var $title = $(this);
            var text = $title.data('full-title') || $title.text();
            var isMobile = window.innerWidth <= 768;
            var maxLength = isMobile ? 45 : 70;

            if (!$title.data('full-title')) {
                $title.data('full-title', text);
            }

            if (text.length > maxLength) {
                $title.text(text.substring(0, maxLength) + '...');
            } else {
                $title.text(text);
            }
        });
    }

    $(window).on('resize', trimTitles);
    trimTitles();
});