// start the slick slider on the product-page.php

jQuery(document).ready(function ($) {
  var $mainSlider = $(".slick-main");
  var $thumbSlider = $(".slick-thumbs");
  var thumbCount = $thumbSlider.children().length;

  // Initialize Main Slider
  $mainSlider.slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    fade: true,
    infinite: true,
    speed: 500,
  });

  if (thumbCount > 6) {
    // Enable Slick for thumbnails if more than 6 images
    $thumbSlider.slick({
      slidesToShow: 6, // Default 6 thumbnails
      slidesToScroll: 1,
      asNavFor: ".slick-main",
      dots: false,
      centerMode: false,
      focusOnSelect: true,
      arrows: false,
      infinite: true,
      speed: 400,
      swipeToSlide: true,
      variableWidth: false,
      waitForAnimate: false,
      responsive: [
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 4, // Show only 5 thumbnails on mobile
          },
        },
        {
          breakpoint: 360,
          settings: {
            slidesToShow: 3, // Show only 5 thumbnails on mobile
          },
        },
      ],
    });
  } else {
    // If 6 or fewer images, keep thumbnails static but clickable
    $thumbSlider.addClass("static-thumbnails");

    // Clicking a thumbnail updates the main slider
    $thumbSlider.children().on("click", function () {
      var index = $(this).index();
      $mainSlider.slick("slickGoTo", index);
    });
  }

  // 🔥 Fix: Ensure the correct thumbnail is active when changing images
  $mainSlider.on("afterChange", function (event, slick, currentSlide) {
    $thumbSlider.children().removeClass("active-thumb"); // Remove previous highlight
    $thumbSlider.children().eq(currentSlide).addClass("active-thumb"); // Highlight the correct thumbnail

    // If thumbnails are in a slick slider, make sure they scroll to the active one
    if (thumbCount > 6) {
      $thumbSlider.slick("slickGoTo", currentSlide);
    }
  });

  // 🔥 Ensure the first thumbnail starts as active
  $thumbSlider.children().first().addClass("active-thumb");
});





//handle color swatches on the product-page.php

let tooltipTimer;

function startTooltipTimer(element) {
  tooltipTimer = setTimeout(() => showTooltip(element), 500); // 500ms delay
}

function showTooltip(element) {
  const tooltip = document.getElementById('color-tooltip');
  tooltip.innerText = element.getAttribute('data-color-name');
  tooltip.style.display = 'block';

  const rect = element.getBoundingClientRect();
  tooltip.style.top = (rect.top - tooltip.offsetHeight - 5 + window.scrollY) + 'px';
  tooltip.style.left = (rect.left + rect.width / 2 - tooltip.offsetWidth / 2 + window.scrollX) + 'px';
}

function hideTooltip() {
  clearTimeout(tooltipTimer);
  document.getElementById('color-tooltip').style.display = 'none';
}

function selectColor(swatch) {
    document.querySelectorAll('.color-swatch-wrapper').forEach(el => el.classList.remove('selected'));
    swatch.classList.add('selected');
    const colorName = swatch.getAttribute('data-color-name');
    document.getElementById('selectedColor').value = colorName;
}






// starts related product on the product-page.php

jQuery(document).ready(function ($) {
  var $slider = $(".new-products-slider");
  var $scrollThumb = $(".new-products-slider-scroll .scroll-thumb");
  var $scrollContainer = $(".new-products-slider-scroll");

  // Initialize Slick
  $slider.slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      arrows: true,
      infinite: false,
      prevArrow: '<button type="button" class="slick-prev">Previous</button>',
      nextArrow: '<button type="button" class="slick-next">Next</button>',
      responsive: [
          {
              breakpoint: 768,
              settings: { slidesToShow: 2, slidesToScroll: 1 }
          },
          {
              breakpoint: 480,
              settings: { slidesToShow: 1, slidesToScroll: 1 }
          }
      ]
  });

  // Function to update scrollbar
  function updateScrollbar(event, slick, currentSlide) {
      var slidesToShow = slick.options.slidesToShow;
      var totalSlides = slick.slideCount;

      // Calculate max scroll
      var maxScroll = totalSlides - slidesToShow;
      if (maxScroll < 1) maxScroll = 1; // Safety fallback

      // Calculate position
      var scrollPercent = (currentSlide / maxScroll) * 100;
      if (scrollPercent > 100) scrollPercent = 100;

      // Move thumb
      var maxThumbPosition = $scrollContainer.width() - $scrollThumb.width();
      var newLeft = (scrollPercent / 100) * maxThumbPosition;

      $scrollThumb.css("left", `${newLeft}px`);
  }

  // Attach events to slick
  $slider.on("init reInit afterChange", updateScrollbar);

  // Trigger initial position (important after init)
  $slider.slick('slickGoTo', 0, true); // Make sure slider is reset to 0
});
