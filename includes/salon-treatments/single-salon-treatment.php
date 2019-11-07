<div class="main-header">
    <h2>Salon Treatments</h2>
    <div>
        <a href="./training-courses.php?source=acrylic-nail-course"><h3>Deal of the Week: 50% off Something</h3></a>
    </div>
</div>
<main>

<?php

if(isset($_GET['source']) && isset($_GET['options'])) {

    $source = escape($_GET['source']);
    $options = escape($_GET['options']);

$query = "SELECT * FROM salon_treatment WHERE salon_treatment_db_title = '$source' AND salon_treatment_db_options = '$options'";
$db_query = mysqli_query($connection, $query);
confirm($db_query);
while ($row = mysqli_fetch_assoc($db_query)) {
    $salon_treatment_id = escape($row['salon_treatment_id']);
    $salon_treatment_title = escape($row['salon_treatment_title']);
    $salon_treatment_db_title = escape($row['salon_treatment_db_title']);
    $salon_treatment_options = escape($row['salon_treatment_options']);
    $salon_treatment_db_options = escape($row['salon_treatment_db_options']);
    $salon_treatment_duration = escape($row['salon_treatment_duration']);
    $salon_treatment_price = escape($row['salon_treatment_price']);
    $salon_treatment_image = escape($row['salon_treatment_image']);
    
?>

<div class="go-back">
    <a href="./salon-treatments.php?source=<?php echo $salon_treatment_db_title ?>"><h5><i class="fas fa-arrow-circle-left"></i> back to <?php echo $salon_treatment_title ?></h5></a>
</div>

<form class="main-section-single-course" method="post" action="./booking-form.php?source=<?php echo $salon_treatment_db_title; ?>&options=<?php echo $salon_treatment_db_options; ?>&btt=true">
    <input type="hidden" name="treatment_id" value="<?php echo $salon_treatment_id ?>">
    <input type="hidden" name="treatment_title" value="<?php echo $salon_treatment_options ?>">
    <h2><?php echo $salon_treatment_options ?></h2>
    <input type="hidden" name="treatment_image" value="<?php echo $salon_treatment_image ?>">
    <img src="images/salon-treatments-images/<?php echo $salon_treatment_image ?>" alt="alt">
    <h4>Duration:</h4>
    <h3><?php echo $salon_treatment_duration ?></h3>
    <h4>Price:</h4>
    <input type="hidden" name="treatment_price" value="<?php echo $salon_treatment_price ?>">
    <h3><?php echo $salon_treatment_price ?></h3>
    <h4>Info:</h4>
    <p>Some info</p>
    <input class="book-this-treatment-button" type="submit" name="add_to_cart" Value="Add to basket">
    <img src="images/front-page-images/guild-of-beauty-therapists.png" alt="">      
</form>

<?php }
} ?>