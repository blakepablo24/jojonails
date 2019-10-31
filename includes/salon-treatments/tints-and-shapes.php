<div class="treatment-heading">
    <h1>Tints & Shapes</h1>
    <img src="images/salon-treatments-images/hi-def-browsl-150x150.jpg" alt="">
</div>

<?php

$query = "SELECT * FROM tints_and_shapes";
$db_query = mysqli_query($connection, $query);
confirm($db_query);
while ($row = mysqli_fetch_assoc($db_query)) {
    $treatment_id = $row['tints_and_shapes_id'];
    $treatment_title = $row['tints_and_shapes_title'];
    $treatment_duration = $row['tints_and_shapes_duration'];
    $treatment_price = $row['tints_and_shapes_price'];
    
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