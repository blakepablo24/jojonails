<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>
<?php include "includes/subheader.php"; ?>

<?php
require_once __DIR__.'/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::create(__DIR__.'./../');
$dotenv->load();
?>

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
        <p>16 Allfoxton Road, Horfield, Bristol, BS7 9NJ</p>
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
    src="https://maps.googleapis.com/maps/api/js?key=<?PHP echo $_ENV['GAPI_KEY']; ?>&libraries=places&callback=initMap">
    </script>

<?php include "includes/footer.php"; ?>



