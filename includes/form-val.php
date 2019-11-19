<?php
// validate form inputs

$name = $_POST['name'];
$email = $_POST['email'];
$contact_number = $_POST['contact_number'];
$date = $_POST['date'];
$booking_type = $_POST['booking_type'];

if(!empty($_POST['time'])){
    $time = $_POST['time'];
}

$extra_notes = $_POST['extra_notes'];

if(empty($name)){
    $name_error = "Please Enter Your Name";
} else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z -]*$/",$name)) {
        $name_error = "Please only use letter and spaces";
      }
}
if (empty($email)) {
    $email_error = "Please Enter Your Email Address";
} else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_error = "Please enter a valid Email";
      }
}
if (empty($contact_number)) {
    $contact_number_error = "Please Enter Your Contact Number";
} else {
    $contact_number = test_input($_POST["contact_number"]);
    if (!preg_match("/^[0-9 ]*$/",$contact_number)) {
      $contact_number_error = "Please enter numbers only";
    }
}
if (empty($date)) {
    $date_error = "Please select your preferrred date";
} else {
    $date = test_input($_POST["date"]);
    if (!preg_match("/^[0-9 -]*$/",$date)) {
        $date_error = "Please choose valid Date";
      }
}
if ($time == "Preferred Time?") {
    $time_error = "Please Select Your preferred Time";
} else {
    if(!empty($time)){
        $time = test_input($_POST["time"]);
        if (!preg_match("/^[a-zA-Z ]*$/",$time)) {
        $time_error = "Please select a valid Time";
      }
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
    $_SESSION['shopping_cart'] = [];
    header("Location: tyfye.php?bt=$booking_type");
}

?>