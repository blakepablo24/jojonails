<div class="treatment-heading">
    <h1>Holistics</h1>
    <img src="images/salon-treatments-images/Back-massage-000051531822_Medium-150x150.jpg" alt="">
</div>

<?php

$query = "SELECT * FROM holistics";
$db_query = mysqli_query($connection, $query);
confirm($db_query);
while ($row = mysqli_fetch_assoc($db_query)) {
    $treatment_id = $row['holistics_id'];
    $treatment_title = $row['holistics_title'];
    $treatment_duration = $row['holistics_duration'];
    $treatment_price = $row['holistics_price'];
    
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