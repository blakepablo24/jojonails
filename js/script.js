// Mobile Nav Menu 
function openNav() {
    document.getElementById("myNavExt").style.width = "0%";
    document.getElementById("myNav").style.width = "100%";
  }
  
  function closeNav() {
    document.getElementById("myNav").style.width = "0%";
  }
  
  function openNavMenuExt() {
    document.getElementById("myNav").style.width = "0%";
    document.getElementById("myNavExt").style.width = "100%";
  }
  
  function closeNavMenuExt() {
    document.getElementById("myNavExt").style.width = "0%";
  }
  
  // Large Nav Menu
  
  /* When the user clicks on the button, 
  toggle between hiding and showing the dropdown content */
  function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
  }
  
  // Close the dropdown if the user clicks outside of it
  window.onclick = function(e) {
    if (!e.target.matches('.dropbtn')) {
    var myDropdown = document.getElementById("myDropdown");
      if (myDropdown.classList.contains('show')) {
        myDropdown.classList.remove('show');
      }
    }
  }