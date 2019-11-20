<?php
// validate form inputs

$name_error = $email_error = $contact_number_error = $date_error = $time_error = $extra_notes_error = "";
$name = $email = $contact_number = $date = $time = $extra_notes = "";

if(isset($_POST['book_treatments'])){

    // take in selected treatments if booking treatments

    $selected_treatment_title = $_POST['selected_treatment_title'];
    $selected_treatment_options = $_POST['selected_treatment_options'];
    $selected_treatment_price = $_POST['selected_treatment_price'];

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

    // Info from booking form
    $body =
    "Here is the info from your latest party request: "
    ." "."
    \n\n"
    ."Occasion: ".$age."
    \n"
    ."Preferred Date: ".$date1."
    \n"
    ."Alternative Date: ".$date2."
    \n"
    ."Time Requested: ".$time."
    \n"
    ."Venue or Local Area: ".$venue."
    \n"
    ."Name: ".$name."
    \n"
    ."Contact Number: ".$contactno."
    \n"
    ."Email Address: ".$emailFrom."
    \n"
    ."Where did you hear about me: ".$hearabout;

    if ($venue_error == '' && $name_error == '' && $contactno_error == '' &&
        $emailFrom_error == '' && $hearabout_error == '') {

      if (mail($emailTo, $subject, $body, $headers)) {

        $venue = $name = $contactno = $emailFrom = $hearabout = "";
        header('Location: https://djbagsofun.co.uk/tyfe.php');
        // $success_fail = "Message Sent!";
      }
    }
     else {
      $success_fail = "Enquiry not sent, please check your form for any missing information!";
    }

    // Finally reset varable and shopping cart
    $name = $email = $contact_number = $date = $time = $extra_notes = "";
    $_SESSION['shopping_cart'] = [];
    header("Location: tyfye.php?bt=$booking_type");
}

}

if(isset($_POST['book_course'])){

    $sender = "jojosbooking@djbagsofun.co.uk";
    $emailTo = "jojosbookingform@devnewsitetest.djbagsofun.co.uk";
    $subject = "JoJo Nails Training Course Request";
    $headers = "From: ".$sender;

    // take in selected course if booking a course

    $selected_course_title = $_POST['selected_course_title'];
    $selected_course_duration = $_POST['selected_course_duration'];
    $selected_course_price = $_POST['selected_course_price'];

    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact_number = $_POST['contact_number'];
    $date = $_POST['date'];
    $booking_type = $_POST['booking_type'];
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

if(!empty($extra_notes)){
    $extra_notes = test_input($_POST["extra_notes"]);
    if (!preg_match("/^[a-zA-Z -0-9]*$/",$extra_notes)) {
        $extra_notes_error = "Please only enter numbers and letters";
      }
}

// Check for errors in form

if(empty($name_error) && empty($email_error) && empty($contact_number_error) && empty($date_error) && empty($time_error) && empty($extra_notes_error)){

    // Info from booking form
    $body =
    "Here is the info from your latest Treatment request: "
    ." "."
    \n\n"
    ."Requested Training Course: ".$selected_course_title."
    \n".$selected_course_duration."
    \n".$selected_course_price."
    \n"
    ."Preferred Date: ".$date."
    \n"
    ."Customer Name: ".$name."
    \n"
    ."Customer Contact Number: ".$contact_number."
    \n"
    ."Customer Email Address: ".$email."
    \n"
    ."Customer Extra Notes: ".$extra_notes;

    // email details
      if (mail($emailTo, $subject, $body, $headers)) {

        // Finally reset variable and shopping cart
        $name = $email = $contact_number = $date = $time = $extra_notes = "";
        $_SESSION['shopping_cart'] = [];
        header("Location: tyfye.php?bt=$booking_type");

      }

} else {
    $success_fail = "Enquiry not sent, please check your form for any missing information!";
  }

}

?>