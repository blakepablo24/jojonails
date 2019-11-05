<div class="course-heading">
    <h1>Salon Treatments</h1>
</div>

<?php

$query = "SELECT * FROM all_salon_treatments";
$db_query = mysqli_query($connection, $query);
confirm($db_query);
while ($row = mysqli_fetch_assoc($db_query)) {
    $all_salon_treatments_id = $row['all_salon_treatments_id'];
    $all_salon_treatments_title = $row['all_salon_treatments_title'];
    $all_salon_treatments_db_title = $row['all_salon_treatments_db_title'];
    $all_salon_treatments_image = $row['all_salon_treatments_image'];
    
?>

        <a href="./salon-treatments.php?source=<?php echo $all_salon_treatments_db_title ?>">
            <div class="main-section-training-course">
                <img src="images/salon-treatments-images/<?php echo $all_salon_treatments_image ?>" alt="">
                <h3><?php echo $all_salon_treatments_title ?></h3>
            </div>
        </a>

<?php } ?>
