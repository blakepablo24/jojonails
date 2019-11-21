<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>
<?php include "includes/subheader.php" ?>

    <div>
        <a href=""><h3>About JoJo's Nails</h3></a>
    </div>
</div>
<main>

<div class="single-item-container">
    <h3 class="single-item-header">Where to find us</h3>
    <div id="map"></div>
    <div class="about-me-content">
        <h3>JoJo's Nails and Beauty Academy</h3>
        <p>16 Allfoxton Road</p>
        <p>Horfield</p>
        <p>Bristol</p>
        <p>BS7 9NJ</p>
    </div>

    <h3 class="single-item-header">About Us</h3>

    <div class="about-me-image-container">
        <img class="about-me-image" src="images/about-images/the-salon.jpg" alt="">
        <div class="about-me-image-caption-container">
            <p class="about-me-image-caption">The Salon</p>
        </div>
    </div>
    <div class="about-me-content">
        <h3>Certifications</h3>
        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
    </div>
    <div class="about-me-content">
        <h3>Some other info</h3>
        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>
    </div>
    <div class="about-me-image-container">
        <img class="about-me-image" src="images/about-images/jojo.jpg" alt="">
        <div class="about-me-image-caption-container">
            <p class="about-me-image-caption">Joanna - Owner and Trainer</p>
        </div>
    </div>
    <div class="about-me-content">
        <h3>Some other info</h3>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
    </div>
        
</div>

</main>

<script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 51.475960, lng: -2.572160},
          zoom: 15
        });

        var request = {
          placeId: 'ChIJzeFeR-iNcUgRptSx4FbGpo4',
          fields: ['name', 'formatted_address', 'place_id', 'geometry']
        };

        var infowindow = new google.maps.InfoWindow();
        var service = new google.maps.places.PlacesService(map);

        service.getDetails(request, function(place, status) {
          if (status === google.maps.places.PlacesServiceStatus.OK) {
            var marker = new google.maps.Marker({
              map: map,
              position: place.geometry.location
            });
            google.maps.event.addListener(marker, 'click', function() {
              infowindow.setContent('<div><strong>' + place.name + '</strong><br>' +
                place.formatted_address + '</div>');
              infowindow.open(map, this);
            });
          }
        });
      }
    </script>

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDt5M4mdy9QpwKPyLrqMU4VceAeYzdTtxE&libraries=places&callback=initMap">
    </script>

<?php include "includes/footer.php"; ?>



