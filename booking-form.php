<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>

<?php

session_start();

if(isset($_POST['add_to_cart'])){
    if(isset($_SESSION['shopping_cart'])){
        $treatment_array_id = array_column($_SESSION['shopping_cart'], "treatment_db_options");
        if(!in_array($_GET['options'], $treatment_array_id)){
            $count = count($_SESSION['shopping_cart']);
            $treatment_array = array(
                'treatment_db_options' => $_GET['options'],
                'treatment_title' => $_POST['treatment_title'],
                'treatment_price' => $_POST['treatment_price'],
                'treatment_image' => $_POST['treatment_image']
            );
            $_SESSION['shopping_cart'][$count] = $treatment_array;
        } else {
            echo "<script>alert('Treatment Already Added')</script>";
            echo "<script>window.location='booking-form.php'</script>";
        }
    } else {
        $treatment_array = array(
            'treatment_db_options' => $_GET['options'],
            'treatment_title' => $_POST['treatment_title'],
            'treatment_price' => $_POST['treatment_price'],
            'treatment_image' => $_POST['treatment_image']
        );
        $_SESSION['shopping_cart'][0] = $treatment_array;
    }
}

if(isset($_GET['action'])){
    if($_GET['action'] == "delete"){
        foreach($_SESSION['shopping_cart'] as $keys => $values){
            if($values['treatment_db_options'] == $_GET['options_to_delete']){
                unset($_SESSION['shopping_cart'][$keys]);
                echo "<script>alert('Treatment Removed')</script>";
                echo "<script>window.location='booking-form.php'</script>";
            }
        }
    }
}

    ?>

<div class="main-header">
    <h2>Salon treatments booking form</h2>
    <div>
        <a href="./training-courses.php?source=acrylic-nail-course"><h3>Some info</h3></a>
    </div>
</div>
<main>

<div class="booking-form">
    <h3 class="booking-form-header">Selected Treatments</h3>
    <?php

    if(!empty($_SESSION['shopping_cart'])) {
    $total = 0;
    foreach($_SESSION['shopping_cart'] as $keys => $values){
    ?>

    <div class="booking-form-selected-option">
        <img width="30%" src="images/salon-treatments-images/<?php echo $values['treatment_image']; ?>" alt="img">    
        <h6><?php echo $values['treatment_title']; ?>: <?php echo $values['treatment_price']; ?></h6>
        <div></div>
        <a href="booking-form.php?action=delete&options_to_delete=<?php echo $values['treatment_db_options']; ?>"><i class="fas fa-times-circle"></i></a>
    </div>
        <?php }
    } else {?>
        <h4 class="booking-form-header">No Treatments selected yet!</h4>
    <?php } ?>
    <a class="booking-form-header" href="salon-treatments.php"><h3><i class="fas fa-plus-square"></i> Add another Treatment</h3></a>
    <button onclick="displayHiddenForm()" id="book-treatments-button" class='book-this-treatment-button'>Book Treatments</button>
    <div id="hidden-details-form">
        <h3 class="booking-form-header">Your Details</h3>
        <input class="booking-form-input" type="text" name="name" placeholder="Your Name?">
        <input class="booking-form-input" type="text" name="email" placeholder="Email Address?">
        <input class="booking-form-input" type="text" name="contact_number" placeholder="Contact Number?">
        <select class="booking-form-input" name="" id="">
            <option value="">Preferred Time?</option>   
            <option value="">Morning</option>
            <option value="">Afternoon</option>
            <option value="">Evening</option>
        </select>
        <textarea class="booking-form-input" name="extra_notes" id="" cols="30" rows="5" placeholder="Any other info or special requirments?"></textarea>
        <a class="booking-form-header" href=""><h6>Privacy Policy</h6></a>
        <button class='book-this-treatment-button'>Submit Booking Request</button>
    </div>
</div>


</main>

<?php include "includes/footer.php"; ?>