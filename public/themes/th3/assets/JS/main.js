// document.addEventListener("DOMContentLoaded", function() {
//     const pauseButton = document.querySelector(".pause-button");
//     const playButton = document.querySelector(".play-button");
//     const carousel = new bootstrap.Carousel(document.getElementById("carouselExampleIndicators"), { interval: 4000 });

//     pauseButton.addEventListener("click", function() {
//         carousel.pause();
//     });

//     playButton.addEventListener("click", function() {
//         carousel.cycle();
//     });

//     // Resize images to fit within a maximum height of 350px
//     const images = document.querySelectorAll(".carousel-inner img");
//     images.forEach(function(image) {
//         image.style.maxHeight = "350px";
//         image.style.width = "auto";
//     });
// });


document.addEventListener('DOMContentLoaded', function () {
  // Initialize the carousel
  var carousel = new bootstrap.Carousel(document.querySelector('#carouselExampleIndicators'));

  // Pause button click event
  document.querySelector('#pauseButton').addEventListener('click', function () {
    carousel.pause();
  });

  // Play button click event
  document.querySelector('#playButton').addEventListener('click', function () {
    carousel.cycle();
  });
});



 // search-box open close js code
 let navbar = document.querySelector(".navbar");
 let searchBox = document.querySelector(".search-box .bx-search");
 // let searchBoxCancel = document.querySelector(".search-box .bx-x");

 searchBox.addEventListener("click", () => {
     navbar.classList.toggle("showInput");
     if (navbar.classList.contains("showInput")) {
         searchBox.classList.replace("bx-search", "bx-x");
     } else {
         searchBox.classList.replace("bx-x", "bx-search");
     }
 });

 // sidebar open close js code
 let navLinks = document.querySelector(".nav-links");
 let menuOpenBtn = document.querySelector(".navbar .bx-menu");
 let menuCloseBtn = document.querySelector(".nav-links .bx-x");
 menuOpenBtn.onclick = function () {
     navLinks.style.left = "0";
 }
 menuCloseBtn.onclick = function () {
     navLinks.style.left = "-100%";
 }


 // sidebar submenu open close js code
 let htmlcssArrow = document.querySelector(".htmlcss-arrow");
 htmlcssArrow.onclick = function () {
     navLinks.classList.toggle("show1");
 }
 let moreArrow = document.querySelector(".more-arrow");
 moreArrow.onclick = function () {
     navLinks.classList.toggle("show2");
 }
 let jsArrow = document.querySelector(".js-arrow");
 jsArrow.onclick = function () {
     navLinks.classList.toggle("show3");
 }



//   // JavaScript to toggle the mobile dropdown
//   document.querySelector('.mobile-dropdown1 .dropdown-toggle1').addEventListener('click', function() {
//     var dropdownContent = document.querySelector('.mobile-dropdown1 .dropdown-content1');
//     if (dropdownContent.style.display === 'flex') {
//         dropdownContent.style.display = 'none';
//     } else {
//         dropdownContent.style.display = 'flex';
//     }
// });
//   // JavaScript to toggle the mobile dropdown
//   document.querySelector('.mobile-dropdown2 .dropdown-toggle2').addEventListener('click', function() {
//     var dropdownContent = document.querySelector('.mobile-dropdown2 .dropdown-content2');
//     if (dropdownContent.style.display === 'flex') {
//         dropdownContent.style.display = 'none';
//     } else {
//         dropdownContent.style.display = 'flex';
//     }
// });
//   // JavaScript to toggle the mobile dropdown
//   document.querySelector('.mobile-dropdown3 .dropdown-toggle3').addEventListener('click', function() {
//     var dropdownContent = document.querySelector('.mobile-dropdown3 .dropdown-content3');
//     if (dropdownContent.style.display === 'flex') {
//         dropdownContent.style.display = 'none';
//     } else {
//         dropdownContent.style.display = 'flex';
//     }
// });


