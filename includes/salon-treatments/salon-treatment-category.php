<div class="main-header">
    <h2>Salon Treatments</h2>
    <div>
        <a href="./training-courses.php?source=acrylic-nail-course"><h3>Deal of the Week: 50% off Something</h3></a>
    </div>
</div>
<main>
<div class="go-back">
    <a href="./salon-treatments.php"><h5><i class="fas fa-arrow-circle-left"></i> back to all salon treatments</h5></a>
</div>

<?php if(isset($_GET['source'])){

    $source = $_GET['source'];

    $query = "SELECT * FROM salon_treatment WHERE salon_treatment_db_title = '$source' LIMIT 1";
    $db_query = mysqli_query($connection, $query);
    confirm($db_query);
    while ($row = mysqli_fetch_assoc($db_query)) {
        $salon_treatment_title = $row['salon_treatment_title'];
    }
?>
  
  <h2 class="salon-treatments-category-header"><?php echo $salon_treatment_title ?></h2>

  <?php
    $query = "SELECT * FROM salon_treatment WHERE salon_treatment_db_title = '$source'";
    $db_query = mysqli_query($connection, $query);
    confirm($db_query);
    while ($row = mysqli_fetch_assoc($db_query)) {
        $salon_treatment_id = $row['salon_treatment_id'];
        $salon_treatment_title = $row['salon_treatment_title'];
        $salon_treatment_db_title = $row['salon_treatment_db_title'];
        $salon_treatment_options = $row['salon_treatment_options'];
        $salon_treatment_db_options = $row['salon_treatment_db_options'];
        $salon_treatment_duration = $row['salon_treatment_duration'];
        $salon_treatment_price = $row['salon_treatment_price'];
        $salon_treatment_image = $row['salon_treatment_image'];
?>

<a href="./salon-treatments.php?source=<?php echo $salon_treatment_db_title ?>&options=<?php echo $salon_treatment_db_options ?>">
    <div class="multiple-item-container">
        <img src="images/salon-treatments-images/<?php echo $salon_treatment_image ?>" alt="">
        <h3><?php echo $salon_treatment_options ?></h3>
    </div>
</a>

<?php }
} ?>
