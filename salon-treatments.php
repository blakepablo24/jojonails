<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>

<div class="main-header">
        <h2>Salon Treatments <i class="fas fa-arrows-alt-h"></i></h2>
        <div>
            <a href="./training-courses.php?source=acrylic-nail-course"><h3>Acrylic Nails</h3></a>
            <a href="./training-courses.php?source=gel-polish-course"><h3>Gel Polish</h3></a>
            <a href="./training-courses.php?source=manicure-and-pedicure-course"><h3>Manicure & Pedicure</h3></a>
            <a href="./training-courses.php?source=nail-art-course"><h3>Nail Art</h3></a>
            <a href="./training-courses.php?source=massage-course"><h3>Massage</h3></a>
            <a href="./training-courses.php?source=spray-tanning-course"><h3>Spray Tanning</h3></a>
            <a href="./training-courses.php?source=waxing-course"><h3>Waxing</h3></a>
            <a href="./training-courses.php?source=dermaplaning-course"><h3>Dermaplaning</h3></a>
            <a href="./training-courses.php?source=microneedling-course"><h3>Microneedling</h3></a>
        </div>
    </div>
    <main>

<?php

if(isset($_GET['source']) && isset($_GET['options'])) {

    include "includes/salon-treatments/single-salon-treatment.php";
    
} else {
    if(isset($_GET['source'])){

        $source = $_GET['source'];
    
        $query = "SELECT * FROM salon_treatment WHERE salon_treatment_db_title = '$source'";
        $db_query = mysqli_query($connection, $query);
        confirm($db_query);
        $db_query_amount = mysqli_num_rows($db_query);
    
    if($db_query_amount > 1){
        include "includes/salon-treatments/salon-treatment-category.php";
    } else {
        include "includes/salon-treatments/all-salon-treatments.php";
    }
    
    } else {
    
        $source = "";
        include "includes/salon-treatments/all-salon-treatments.php";
    
    }
}
?>

</main>

<?php include "includes/footer.php"; ?>