<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>

<?php

session_start();

if(empty($_SESSION['shopping_cart']) && !isset($_GET['source'])){
    header("Location: index.php");
}

$name_error = $email_error = $contact_number_error = $date_error = $time_error = $extra_notes_error = "";
$success = $name = $email = $contact_number = $date = $time = $extra_notes = "";

if(isset($_POST['book_treatments'])){

    // take in selected treatments if booking treatments

    $selected_treatment_title = $_POST['selected_treatment_title'];
    $selected_treatment_options = $_POST['selected_treatment_options'];
    $selected_treatment_price = $_POST['selected_treatment_price'];

    include "includes/form-val.php";

}

if(isset($_POST['book_course'])){

    // take in selected course if booking a course

    $selected_course_title = $_POST['selected_course_title'];
    $selected_course_duration = $_POST['selected_course_duration'];
    $selected_course_price = $_POST['selected_course_price'];

    include "includes/form-val.php";

}

?>

<!-- Dynamically look for a training course or treatments -->
                <?php
                if(isset($_GET['source'])){?>
                <div class="main-header">
                    <h2>Book Your Course Here</h2>
                    <div>
                        <a href="./training-courses.php?source=acrylic-nail-course"><h3>Some info</h3></a>
                    </div>
                </div>
            <main>

<!-- Training Course Booking Form -->

            <form class="single-item-container" method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                    <?php 
                        if(!empty($success)){
                            echo "<span class='success'>$success</span>";
                        } else{ ?>

                            <h6 class="single-item-header">Your Selected Training Course</h6>

                            <?php
                            $source = $_GET['source'];
                
                            $query = "SELECT * FROM course_training WHERE course_training_db_title = '$source'";
                            $db_query = mysqli_query($connection, $query);
                            confirm($db_query);
                            while ($row = mysqli_fetch_assoc($db_query)) {
                                $course_training_title = $row['course_training_title'];
                                $course_training_duration = $row['course_training_duration'];
                                $course_training_price = $row['course_training_price'];
                    ?>

                    <div class="training-course-to-book">
                        <h2><?php echo $course_training_title ?></h2>
                        <input type="hidden" name="selected_course_title" value="<?php echo $course_training_title ?>">
                        <h3><?php echo $course_training_duration ?></h3>
                        <input type="hidden" name="selected_course_duration" value="<?php echo $course_training_duration ?>">
                        <h3><?php echo $course_training_price ?></h3>
                        <input type="hidden" name="selected_course_price" value="<?php echo $course_training_price ?>">
                    </div>

                        <?php } ?>

                    <div class="booking-form-details">
                        <h3 class="single-item-header">Please enter your details</h3>
                        <input class="booking-form-input" type="text" name="name" value="<?php echo $name ?>" placeholder="Your Name?">
                        <span class="error"><?php echo $name_error; ?></span>
                        <input class="booking-form-input" type="text" name="email" value="<?php echo $email ?>"placeholder="Email Address?">
                        <span class="error"><?php echo $email_error; ?></span>
                        <input class="booking-form-input" type="text" name="contact_number" value="<?php echo $contact_number ?>"placeholder="Contact Number?">
                        <span class="error"><?php echo $contact_number_error; ?></span>
                        <input id="datepicker" class="booking-form-input" type="text" value="<?php echo $date ?>" name="date" placeholder="Preferred Date?" readonly>
                        <span class="error"><?php echo $date_error; ?></span>
                        <span class="error"><?php echo $time_error; ?></span>
                        <textarea class="booking-form-input" name="extra_notes" id="" cols="30" rows="5" value="<?php echo $extra_notes ?>" placeholder="Any other info or special requirments?"></textarea>
                        <a class="booking-form-header" href=""><h6>Privacy Policy</h6></a>
                        <button type="submit" class='book-this-treatment-button' name="book_course">Book Course</button>
                    </div>
                
            </form>

                    <?php }
                    } elseif(!empty($_SESSION['shopping_cart'])) {?>

<!-- Treatments Booking Form -->

            <form class="single-item-container" method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <h6 class="single-item-header">Your Selected Treatments</h6>
                    <div class="treatments-to-book-container">

                    <?php
                    $total = 0;
                    foreach($_SESSION['shopping_cart'] as $keys => $values){
                    ?>

                        <div class="treatments-to-book">
                            <h6 class="single-item-header"><?php echo $values['treatment_title']; ?></h6>    
                            <input type="hidden" name="selected_treatment_title[]" value="<?php echo $values['treatment_title']; ?>">
                            <h6 class="single-item-header"><?php echo $values['treatment_options']; ?></h6>
                            <h6 class="single-item-header"><?php echo $values['treatment_price']; ?></h6>
                            <input type="hidden" name="selected_treatment_options[]" value="<?php echo $values['treatment_options']; ?>">
                            <input type="hidden" name="selected_treatment_price[]" value="<?php echo $values['treatment_price']; ?>">
                            <div></div>
                            <a class="single-item-header" href="selected-treatments.php?action=delete&options_to_delete=<?php echo $values['treatment_db_options']; ?>"><i class="fas fa-times-circle"></i></a>
                        </div>

                        <?php } ?>

                    </div>
                    <div class="booking-form-details">
                        <h3 class="single-item-header">Please enter your details</h3>
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
                        <a class="booking-form-header" href=""><h6>Privacy Policy</h6></a>
                        <button type="submit" class='book-this-treatment-button' name="book_treatments">Book Treatments</button>
                    </div>
                    <?php }
            ?>
                    </form>


</main>

<?php include "includes/footer.php"; ?>