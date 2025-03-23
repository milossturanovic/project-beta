//custom animation for the mobile toggle | don't delete

// Select the toggle button
const navbarToggler = document.querySelector(".custom-toggler");

// Add a click event listener
navbarToggler.addEventListener("click", () => {
  // Toggle the 'expanded' class on click
  navbarToggler.classList.toggle("expanded");
});

document.addEventListener("DOMContentLoaded", function () {
  const dropdownToggles = document.querySelectorAll(".dropdown-toggle");

  dropdownToggles.forEach((toggle) => {
    toggle.addEventListener("click", function () {
      setTimeout(() => {
        // Check if the dropdown is open
        const isExpanded = this.nextElementSibling.classList.contains("show");
        this.setAttribute("aria-expanded", isExpanded);
      }, 10); // Delay to allow Bootstrap to toggle dropdown
    });
  });
});




//initialize slick slider | don't delete

// $(document).ready(function () {
//   // Initialize Slick Slider
//   const $slider = $(".myslider").slick({
//     slidesToShow: 1,
//     slidesToScroll: 1,
//     dots: true,
//     arrows: false,
//     autoplay: true, // Automatically transition slides
//     autoplaySpeed: 5000, // 5 seconds per slide
//     speed: 1000, // Smooth slide transition speed
//     vertical: true,
//     verticalSwiping: true,
//     draggable: true,
//     infinite: true, // Loop through slides infinitely
//     pauseOnHover: false, // Prevent pausing when mouse hovers over the slider
//     pauseOnFocus: false, // Prevent pausing when focused (keyboard or mouse)
//   });

//   // Handle first slide on page load
//   const $firstSlide = $(".slick-current");
//   startScale($firstSlide);

//   // Handle slide transitions
//   $slider.on("beforeChange", function (event, slick, currentSlide) {
//     const $outgoingSlide = $(slick.$slides[currentSlide]);

//     // Keep the outgoing slide at its current scale
//     keepScale($outgoingSlide);
//   });

//   $slider.on("afterChange", function (event, slick, currentSlide) {
//     const $currentSlide = $(slick.$slides[currentSlide]);

//     // Reset scaling of all slides except the current one
//     slick.$slides.each((index, slide) => {
//       if (index !== currentSlide) {
//         $(slide).css({
//           transform: "scale(1)", // Reset to default size
//           transition: "none", // Prevent visual resets off-screen
//         });
//       }
//     });

//     // Start scaling effect on the new slide
//     startScale($currentSlide);

//     // Ensure autoplay resumes after any manual interaction
//     $slider.slick("slickPlay");
//   });

//   // Ensure autoplay resumes after swiping
//   $slider.on("swipe", function () {
//     $slider.slick("slickPlay");
//   });

//   // Ensure autoplay resumes after clicking dots
//   $(".slick-dots").on("click", function () {
//     $slider.slick("slickPlay");
//   });

//   // Ensure autoplay resumes after any manual action (focus/blur on slider)
//   $slider.on("mouseenter focusin", function () {
//     $slider.slick("slickPlay");
//   });
// });

// document.addEventListener("DOMContentLoaded", () => {
//   const dropdownToggles = document.querySelectorAll(".dropdown-toggle");
//   dropdownToggles.forEach((toggle) => {
//     toggle.addEventListener("click", (e) => {
//       e.preventDefault();
//       const dropdownMenu = toggle.nextElementSibling;
//       dropdownMenu.classList.toggle("show");
//     });
//   });
// });











// Best seller section slider | don't delete

// $(document).ready(function () {
//   $(".best-seller-slider").slick({
//     slidesToShow: 4,
//     slidesToScroll: 1,
//     arrows: true,
//     prevArrow: '<button type="button" class="slick-prev">Previous</button>',
//     nextArrow: '<button type="button" class="slick-next">Next</button>',
//     responsive: [
//       {
//         breakpoint: 768,
//         settings: {
//           slidesToShow: 2,
//           slidesToScroll: 1,
//         },
//       },
//       {
//         breakpoint: 480,
//         settings: {
//           slidesToShow: 1,
//           slidesToScroll: 1,
//         },
//       },
//     ],
//   });
// });


