<div class="treatment-heading">
    <h1>Facial Treatments</h1>
    <img src="images/salon-treatments-images/microneedling-150x150.jpg" alt="">
</div>

<?php

$query = "SELECT * FROM facial_treatments";
$db_query = mysqli_query($connection, $query);
confirm($db_query);
while ($row = mysqli_fetch_assoc($db_query)) {
    $treatment_id = $row['facial_treatments_id'];
    $treatment_title = $row['facial_treatments_title'];
    $treatment_duration = $row['facial_treatments_duration'];
    $treatment_price = $row['facial_treatments_price'];
    
?>

<div class="main-section-items">
            <h4>Treatment:</h4>
            <h3><?php echo $treatment_title ?></h3>
            <h4>Duration:</h4>
            <h3><?php echo $treatment_duration ?></h3>
            <h4>Price:</h4>
            <h3><?php echo $treatment_price ?></h3>
        </div>

<?php } ?>