<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>

<?php

session_start();

$name_error = $email_error = $contact_number_error = $date_error = $time_error = $extra_notes_error = "";
$success = $name = $email = $contact_number = $date = $time = $extra_notes = "";

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact_number = $_POST['contact_number'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $extra_notes = $_POST['extra_notes'];

// take in selected treatments
                
    $selected_treatment_title = $_POST['selected_treatment_title'];
    $selected_treatment_options = $_POST['selected_treatment_options'];
    $selected_treatment_price = $_POST['selected_treatment_price'];

// validate form inputs

    if(empty($name)){
        $name_error = "Please Enter Your Name!";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z -]*$/",$name)) {
            $name_error = "Please only use letter and spaces!";
          }
    }
    if (empty($email)) {
        $email_error = "Please Enter Your Email Address!";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_error = "Please enter a valid Email!";
          }
    }
    if (empty($contact_number)) {
        $contact_number_error = "Please Enter Your Contact Number!";
    } else {
        $contact_number = test_input($_POST["contact_number"]);
        if (!preg_match("/^[0-9 ]*$/",$contact_number)) {
          $contact_number_error = "Please enter numbers only!";
        }
    }
    if (empty($date)) {
        $date_error = "Please select your preferrred date!";
    } else {
        $date = test_input($_POST["date"]);
        if (!preg_match("/^[0-9 -]*$/",$date)) {
            $date_error = "Please choose valid Date!";
          }
    }
    if ($time == "Preferred Time?") {
        $time_error = "Please Select Your preferred Time!";
    } else {
        $time = test_input($_POST["time"]);
        if (!preg_match("/^[a-zA-Z ]*$/",$time)) {
            $time_error = "Please select a valid Time!";
          }
    }
    if(!empty($extra_notes)){
        $extra_notes = test_input($_POST["extra_notes"]);
        if (!preg_match("/^[a-zA-Z -0-9]*$/",$extra_notes)) {
            $extra_notes_error = "Please only enter numbers and letters";
          }
    }

// Check for errors in form

    if(empty($name_error) && empty($email_error) && empty($contact_number_error) && empty($date_error) && empty($time_error) && empty($extra_notes_error)){
        $name = $email = $contact_number = $date = $time = $extra_notes = "";
        $success = "Booking sent successfully JoJo's Nails will get back to you ASAP!";
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

<form class="main-booking-form" method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <h6 class="booking-form-header">Your selected treatments</h6>

        <div class="treatments-to-book">
                <?php
                if(!empty($_SESSION['shopping_cart'])) {
                    $total = 0;
                    foreach($_SESSION['shopping_cart'] as $keys => $values){
                    ?>
                
                    <div class="booking-form-selected-option">
                        <h6 class="booking-form-selected-option-header"><?php echo $values['treatment_title']; ?></h6>    
                        <input type="hidden" name="selected_treatment_title[]" value="<?php echo $values['treatment_title']; ?>">
                        <h6><?php echo $values['treatment_options']; ?>: <?php echo $values['treatment_price']; ?></h6>
                        <input type="hidden" name="selected_treatment_options[]" value="<?php echo $values['treatment_options']; ?>">
                        <input type="hidden" name="selected_treatment_price[]" value="<?php echo $values['treatment_price']; ?>">
                        <div></div>
                        <a href="selected-treatments.php?action=delete&options_to_delete=<?php echo $values['treatment_db_options']; ?>"><i class="fas fa-times-circle"></i></a>
                    </div>
                        <?php }
                    }

            ?>
        </div>
    
        <h4 class="booking-form-header">Your Details</h4>
        <span class="success"><?php echo $success; ?></span>
        <input class="booking-form-input" type="text" name="name" value="<?php echo $name ?>" placeholder="Your Name?">
        <span class="error"><?php echo $name_error; ?></span>
        <input class="booking-form-input" type="text" name="email" value="<?php echo $email ?>"placeholder="Email Address?">
        <span class="error"><?php echo $email_error; ?></span>
        <input class="booking-form-input" type="text" name="contact_number" value="<?php echo $contact_number ?>"placeholder="Contact Number?">
        <span class="error"><?php echo $contact_number_error; ?></span>
        <input id="datepicker" class="booking-form-input" type="text" value="<?php echo $date ?>" name="date" placeholder="Preferred Date?" readonly>
        <span class="error"><?php echo $date_error; ?></span>
        <select class="booking-form-input" name="time" id="">
            <option value="Preferred Time?">Preferred Time?</option>
            <option value="Morning" <?= $time == 'Morning' ? 'selected="selected"' : ''; ?>>Morning</option>
            <option value="Afternoon" <?= $time == 'Afternoon' ? 'selected="selected"' : ''; ?>>Afternoon</option>
            <option value="Evening" <?= $time == 'Evening' ? 'selected="selected"' : ''; ?>>Evening</option>
        </select>
        <span class="error"><?php echo $time_error; ?></span>
        <textarea class="booking-form-input" name="extra_notes" id="" cols="30" rows="5" value="<?php echo $extra_notes ?>" placeholder="Any other info or special requirments?"></textarea>
        <span class="success"><?php echo $extra_notes_error; ?></span>
        <a class="booking-form-header" href=""><h6>Privacy Policy</h6></a>
        <button type="submit" class='book-this-treatment-button' name="submit">Submit Booking Request</button>
            </form>


</main>

<?php include "includes/footer.php"; ?>