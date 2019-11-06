<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>


<?php


if(isset($_GET['source']) && isset($_GET['options']) && isset($_GET['btt'])){

    include "includes/booking-form.php";

} else {

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
}


?>

</main>

<?php include "includes/footer.php"; ?>