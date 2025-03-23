// this script should be used only for changing and updatig the Woocommerce functionalities


// Keeps all elements in one row properly 
document.addEventListener("DOMContentLoaded", function () {
    function moveFilterElements() {
        let filterButton = document.querySelector(".wpc-filters-open-button-container"); // Filter Button
        let sortingWrapper = document.querySelector(".woocommerce-ordering"); // Sorting Dropdown
        let resultCount = document.querySelector(".woocommerce-result-count"); // Result Count
        let orderingWrapper = document.querySelector(".custom-ordering-wrapper"); // Target Wrapper

        if (filterButton && sortingWrapper && resultCount && orderingWrapper) {
            // Remove existing button if it was previously added
            let existingFilterButton = orderingWrapper.querySelector(".wpc-filters-open-button-container");
            if (existingFilterButton) {
                existingFilterButton.remove();
            }

            orderingWrapper.prepend(filterButton); // Move Filter Button
            orderingWrapper.appendChild(sortingWrapper); // Move Sorting Dropdown
            orderingWrapper.appendChild(resultCount); // Move Result Count
        }
    }

    // Run function on page load
    moveFilterElements();

    // Use MutationObserver to detect filter updates (AJAX changes)
    let filterContainer = document.querySelector(".widget_wpc_filters_widget"); // The filter widget
    if (filterContainer) {
        let observer = new MutationObserver(function () {
            moveFilterElements(); // Re-run function after filters update
        });

        observer.observe(filterContainer, { childList: true, subtree: true });
    }
});


//changes the name of the default woocommerce filter from 'default sorting' to 'sort by':
document.addEventListener("DOMContentLoaded", function () {
    let defaultOption = document.querySelector('.woocommerce-ordering select option[value="menu_order"]');

    if (defaultOption) {
        defaultOption.textContent = "Sort by";
    }
});




// replace the icon in the filter mobile
document.addEventListener("DOMContentLoaded", function () {
    let iconWrapper = document.querySelector(".wpc-icon-html-wrapper"); // Default icon container

    if (iconWrapper) {
        // Remove default icon (if necessary)
        iconWrapper.innerHTML = "";

        // Inject Custom SVG
        iconWrapper.innerHTML = `
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="12" cy="12" r="10" stroke="black" stroke-width="2"/>
                <line x1="6" y1="12" x2="18" y2="12" stroke="black" stroke-width="2"/>
            </svg>
        `;
    }
});



//add custom plus and minus icons on teh category
jQuery(document).ready(function ($) {
    function addParentCategoryToggle() {
        $('.wc-block-product-categories-list-item').each(function () {
            var $parentItem = $(this);
            var $subList = $parentItem.children('.wc-block-product-categories-list'); // Get subcategories

            if ($subList.length) {
                if ($parentItem.find('.category-toggle').length === 0) {
                    var $toggleBtn = $(`
                        <span class="category-toggle">
                            <svg class="plus-icon" width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 6H0V4H4V0H6V4H10V6H6V10H4V6Z" fill="#5B5B5B"/>
                            </svg>
                            <svg class="minus-icon" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                <rect x="3" y="7" width="10" height="2" fill="#5B5B5B"/>
                            </svg>
                        </span>
                    `); // Create toggle button

                    $parentItem.children('a').before($toggleBtn); // Insert before category name
                    $subList.hide(); // Initially hide subcategories

                    // Click event to toggle subcategories
                    $toggleBtn.on('click', function (e) {
                        e.stopPropagation();
                        $subList.slideToggle(200);
                        $(this).toggleClass('active');

                        if ($(this).hasClass('active')) {
                            $(this).find('.plus-icon').hide();
                            $(this).find('.minus-icon').show();
                        } else {
                            $(this).find('.plus-icon').show();
                            $(this).find('.minus-icon').hide();
                        }
                    });
                }
            }
        });
    }

    // Run the function after the document is ready
    addParentCategoryToggle();

    // Ensure it works after AJAX updates (if applicable)
    $(document).on('wpc-filter-updated', function () {
        addParentCategoryToggle();
    });

    // Remove Bootstrap attributes to prevent interference
    $('.wc-block-product-categories-list').removeAttr('data-bs-toggle data-bs-target');
});






jQuery(document).ready(function($) {
    function wrapInAccordion() {
        var categoryWidget = $('.wp-block-woocommerce-product-categories');
        var widgetContainer = $('.widget.widget_wpc_filters_widget');

        if (categoryWidget.length && widgetContainer.length) {
            if (!widgetContainer.find('.category-accordion').length) {
                var accordionWrapper = $('<div class="category-accordion"></div>');
                var accordionHeader = $(`
                <div class="accordion-header">
                    <span class="accordion-title">Categories</span>
                    <span class="wpc-open-icon"></span>
                </div>
            `);

                categoryWidget.wrap(accordionWrapper);
                categoryWidget.before(accordionHeader);

                // Show it now that it's properly wrapped
                categoryWidget.css({
                    'display': 'none',
                    'visibility': 'visible'
                });

                accordionHeader.on('click', function() {
                    categoryWidget.slideToggle();
                    $(this).toggleClass('active');
                });
            }
        }
    }

    wrapInAccordion();
});





// enables the custom mobile ordering popup


jQuery(function($) {
	var $popup = $('.mobile-orderby-popup');

	// Open popup
	$('.mobile-ordering-trigger').on('click', function() {
		$popup.addClass('active');
	});

	// Close when clicking the close button directly
	$(document).on('click', '.close-popup', function() {
		$popup.removeClass('active');
	});

	// Close when clicking outside the popup (but not on the content itself)
	$(document).on('click touchstart', function(e) {
		if ($popup.hasClass('active') &&
			!$(e.target).closest('.mobile-orderby-content').length &&
			!$(e.target).closest('.mobile-ordering-trigger').length) {
			$popup.removeClass('active');
		}
	});

	// Auto-submit when radio is changed
	$('.mobile-orderby-popup input[name="orderby"]').on('change', function() {
		$(this).closest('form').submit();
	});
});
















//initialize slick slider for category page slider | don't delete




jQuery(document).ready(function ($) {
    $(".best-seller-slider").each(function () {
      var $slider = $(this);
      var $scrollBar = $slider.next(".best-seller-slider-scroll");
      var $scrollThumb = $scrollBar.find(".scroll-thumb");
  
      function updateScrollBar(slick, currentSlide) {
        if (window.innerWidth > 922) {
          $scrollBar.hide();
          return;
        }
  
        var slidesToShow = slick.options.slidesToShow;
        var totalSlides = slick.slideCount;
  
        if (totalSlides <= slidesToShow) {
          $scrollBar.hide();
          return;
        }
  
        $scrollBar.show();
  
        var totalScrollable = totalSlides - slidesToShow;
        var thumbWidth = (slidesToShow / totalSlides) * 100;
        var maxScrollPercent = 100 - thumbWidth;
        var scrollPercent = (currentSlide / totalScrollable) * maxScrollPercent;
  
        if (currentSlide >= totalScrollable) {
          scrollPercent = maxScrollPercent;
        }
  
        $scrollThumb.css({
          width: thumbWidth + "%",
          left: scrollPercent + "%",
        });
      }
  
      $slider.slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        arrows: true,
        infinite: false,
        slide: ".slide",
        prevArrow: '<button type="button" class="slick-prev">Previous</button>',
        nextArrow: '<button type="button" class="slick-next">Next</button>',
        responsive: [
          {
            breakpoint: 1200,
            settings: {
              slidesToShow: 4,
              slidesToScroll: 1,
            },
          },
          {
            breakpoint: 992,
            settings: {
              slidesToShow: 4,
              slidesToScroll: 1,
            },
          },
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 1,
            },
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1,
            },
          },
        ],
      });
  
      $slider.on("init afterChange", function (event, slick, currentSlide) {
        updateScrollBar(slick, currentSlide);
      });
  
      $scrollBar.on("click", function (e) {
        if (window.innerWidth > 922) return;
  
        var slick = $slider.slick("getSlick");
        var slidesToShow = slick.options.slidesToShow;
        var totalSlides = slick.slideCount;
        var totalScrollable = totalSlides - slidesToShow;
  
        var offsetX = e.pageX - $scrollBar.offset().left;
        var totalWidth = $scrollBar.width();
        var clickPercent = offsetX / totalWidth;
  
        var targetSlide = Math.round(clickPercent * totalScrollable);
        targetSlide = Math.min(Math.max(0, targetSlide), totalScrollable);
  
        $slider.slick("slickGoTo", targetSlide);
      });
  
      $slider.on("init", function (event, slick) {
        updateScrollBar(slick, 0);
      });
  
      $slider.slick("slickGoTo", 0, true);
    });
  });
  