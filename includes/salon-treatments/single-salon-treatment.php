<?php include "includes/subheader.php" ?>

<?php if(isset($_GET['source'])){

$source = $_GET['source'];

$query = "SELECT * FROM salon_treatment WHERE salon_treatment_db_title = '$source' LIMIT 1";
$db_query = mysqli_query($connection, $query);
confirm($db_query);
while ($row = mysqli_fetch_assoc($db_query)) {
    $salon_treatment_title = $row['salon_treatment_title'];
}
?>

<div>
        <a href="./training-courses.php?source=acrylic-nail-course"><h3><?php echo $salon_treatment_title ?></h3></a>
    </div>
</div>
<main>

<?php
}
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
    <a href="./salon-treatments.php?source=<?php echo $salon_treatment_db_title ?>"><h5><i class="fas fa-arrow-circle-left"></i> back to all <?php echo $salon_treatment_title ?></h5></a>
</div>

<form class="single-item-container" method="post" action="./selected-treatments.php?source=<?php echo $salon_treatment_db_title; ?>&options=<?php echo $salon_treatment_db_options; ?>&btt=true">
    <input type="hidden" name="treatment_id" value="<?php echo $salon_treatment_id ?>">
    <input type="hidden" name="treatment_title" value="<?php echo $salon_treatment_title ?>">
    <input type="hidden" name="options_title" value="<?php echo $salon_treatment_options ?>">
    <h2 class="single-item-header"><?php echo $salon_treatment_options ?></h2>
    <input type="hidden" name="treatment_image" value="<?php echo $salon_treatment_image ?>">
    <img class="single-item-main-image" src="images/salon-treatments-images/<?php echo $salon_treatment_image ?>" alt="alt">
    <h4 class="item-title">Duration:</h4>
    <h3 class="item-content"><?php echo $salon_treatment_duration ?></h3>
    <h4 class="item-title">Price:</h4>
    <input type="hidden" name="treatment_price" value="<?php echo $salon_treatment_price ?>">
    <h3 class="item-content"><?php echo $salon_treatment_price ?></h3>
    <p class="item-description">This treatment is great because of blah blah blah. Ranger. Celtic. Asont Villa. Batman.</p>
    <input class="book-this-treatment-button" type="submit" name="add_to_cart" Value="Add to basket">
    <img class="single-item-sub-image" src="images/front-page-images/guild-of-beauty-therapists.png" alt="">      
</form>

<?php }
} ?>