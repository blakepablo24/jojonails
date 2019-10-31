<div class="treatment-heading">
    <h1>Pedicures</h1>
    <img src="images/salon-treatments-images/imagek2-150x150.jpg" alt="">
</div>

<?php

$query = "SELECT * FROM pedicures";
$db_query = mysqli_query($connection, $query);
confirm($db_query);
while ($row = mysqli_fetch_assoc($db_query)) {
    $treatment_id = $row['pedicures_id'];
    $treatment_title = $row['pedicures_title'];
    $treatment_duration = $row['pedicures_duration'];
    $treatment_price = $row['pedicures_price'];
    
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