<?php

if(isset($_GET['source']) && isset($_GET['options'])) {

    $source = $_GET['source'];
    $options = $_GET['options'];

$query = "SELECT * FROM salon_treatment WHERE salon_treatment_db_title = '$source' AND salon_treatment_db_options = '$options'";
$db_query = mysqli_query($connection, $query);
confirm($db_query);
while ($row = mysqli_fetch_assoc($db_query)) {
    $salon_treatment_id = $row['salon_treatment_id'];
    $salon_treatment_title = $row['salon_treatment_title'];
    $salon_treatment_db_title = $row['salon_treatment_db_title'];
    $salon_treatment_options = $row['salon_treatment_options'];
    $salon_treatment_duration = $row['salon_treatment_duration'];
    $salon_treatment_price = $row['salon_treatment_price'];
    $salon_treatment_image = $row['salon_treatment_image'];
    
?>

<div class="go-back">
    <a href="./salon-treatments.php?source=<?php echo $salon_treatment_db_title ?>"><h5><i class="fas fa-arrow-circle-left"></i> back to <?php echo $salon_treatment_title ?></h5></a>
</div>

<div class="main-section-single-course">
    <h2><?php echo $salon_treatment_options ?></h2>
    <img src="images/salon-treatments-images/<?php echo $salon_treatment_image ?>" alt="">
    <h4>Duration:</h4>
    <h3><?php echo $salon_treatment_duration ?></h3>
    <h4>Price:</h4>
    <h3><?php echo $salon_treatment_price ?></h3>
    <h4>Info:</h4>
    <p>Some info</p>
    <img src="images/front-page-images/guild-of-beauty-therapists.png" alt="">      
</div>

<?php }
} ?>