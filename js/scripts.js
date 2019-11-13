$(function() {
  $("#datepicker").datepicker({
    minDate: "dateToday",
    dateFormat: "dd-mm-yy",
    ignoreReadonly: true,
    allowInputToggle: true
  });
  });

// Mobile Nav Menu
function openNav() {
    document.getElementById("myNav").style.width = "100%";
  }
  
  function closeNav() {
    document.getElementById("myNav").style.width = "0%";
  }

  // function displayHiddenForm(){
  //   document.getElementById("hidden-details-form").style.display = "grid";
  //   document.getElementById("book-treatments-button").style.display = "none";
  //   var elmnt = document.getElementById("hidden-details-form");
  //   elmnt.scrollIntoView();
  // }

  var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}