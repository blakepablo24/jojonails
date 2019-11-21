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
                'treatment_options' => $_POST['options_title'],
                'treatment_price' => $_POST['treatment_price'],
                'treatment_image' => $_POST['treatment_image']
            );
            $_SESSION['shopping_cart'][$count] = $treatment_array;
        } else {
            echo "<script>window.location='selected-treatments.php'</script>";
        }
    } else {
        $treatment_array = array(
            'treatment_db_options' => $_GET['options'],
            'treatment_title' => $_POST['treatment_title'],
            'treatment_options' => $_POST['options_title'],
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
                echo "<script>window.location='selected-treatments.php'</script>";
            }
        }
    }
}

    ?>

<?php include "includes/subheader.php" ?>
    <div>
        <a href="./training-courses.php?source=acrylic-nail-course"><h3>Treatments Basket</h3></a>
    </div>
</div>
<main>

<form class="single-item-container" method="post" action="booking-form.php">
    <?php
    if(!empty($_SESSION['shopping_cart'])) {
    $total = 0;
    foreach($_SESSION['shopping_cart'] as $keys => $values){
    ?>

    <div class="selected-treatments">
        <img class="selected-treatments-image" src="images/salon-treatments-images/<?php echo $values['treatment_image']; ?>" alt="img">
        <h6 class="selected-treatments-header"><?php echo $values['treatment_title']; ?></h6>    
        <input type="hidden" name="selected_treatment_title[]" value="<?php echo $values['treatment_title']; ?>">
        <h6 class="selected-treatments-header"><?php echo $values['treatment_options']; ?></h6>
        <h6 class="selected-treatments-header"><?php echo $values['treatment_price']; ?></h6>
        <input type="hidden" name="selected_treatment_options[]" value="<?php echo $values['treatment_options']; ?>">
        <input type="hidden" name="selected_treatment_price[]" value="<?php echo $values['treatment_price']; ?>">
        <div></div>
        <a class="selected-treatments-header" href="selected-treatments.php?action=delete&options_to_delete=<?php echo $values['treatment_db_options']; ?>"><i class="fas fa-times-circle"></i> Remove</a>
    </div>
        <?php } ?>
        <a id="selected-treatments-header-large-screen" class="single-item-header" href="salon-treatments.php"><h3><i class="fas fa-plus-square"></i> Add another Treatment</h3></a>
        <button id="selected-treatments-header-large-screen" class='book-this-treatment-button' name="submit_selected_treatments">Book Treatments</button>
        <?php 
    } else {?>
        <h4 id="selected-treatments-header-large-screen" class="single-item-header">No Treatments selected yet!</h4>
        <a id="selected-treatments-header-large-screen" class="single-item-header" href="salon-treatments.php"><h3><i class="fas fa-plus-square"></i> Add a Treatment</h3></a>
    <?php } ?>
    
</form>


</main>

<?php include "includes/footer.php"; ?>