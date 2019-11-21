<?php
// validate form inputs

    $sender = "jojosbooking@djbagsofun.co.uk";
    $emailTo = "jojosbookingform@devnewsitetest.djbagsofun.co.uk";
    $headers = "From: ".$sender;
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$name_error = $email_error = $contact_number_error = $date_error = $time_error = $extra_notes_error = "";
$name = $email = $contact_number = $date = $time = $extra_notes = "";

if(isset($_POST['book_treatments'])){

    $subject = "JoJo Nails Treatment(s) Request";

    // take in selected treatments if booking treatments

    $selected_treatment_title = $_POST['selected_treatment_title'];
    $selected_treatment_options = $_POST['selected_treatment_options'];
    $selected_treatment_price = $_POST['selected_treatment_price'];

    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact_number = $_POST['contact_number'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $booking_type = $_POST['booking_type'];
    $extra_notes = $_POST['extra_notes'];
    $total_cost = $_POST['total_cost'];

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
    
    $total_cost = preg_replace('/[^0-9.]+/', '', $total_cost);

    $selected_treatment_title_value = "";
    $selected_treatment_options_value = "";
    $selected_treatment_price_value = "";
    
    foreach ($selected_treatment_title as $key => $value){
        $selected_treatment_title_value .= $value;
        $selected_treatment_title_value.= "\n";
    }
    
    foreach ($selected_treatment_options as $key => $value){
        $selected_treatment_options_value .= $value;
        $selected_treatment_options_value.= "\n";
    }

    foreach ($selected_treatment_price as $key => $value){
        $selected_treatment_price_value .= $value;
        $selected_treatment_price_value = preg_replace('/[^0-9.]+/', '', $selected_treatment_price_value);
        $selected_treatment_price_value.= "\n";
    }

    // Info from booking form
    $body = '<html><body>';
    $body .= '<img width="30%" src="images/front-page-images/jojos-nails-logo-drkr1.png" alt="">';
    "Here is the info from your latest Treatment request: "
    ." "."
    \n\n"
    ."Requested Treatments:
    \n".$selected_treatment_title_value."
    \n".$selected_treatment_options_value."
    \n".$selected_treatment_price_value."
    \n"
    ."Total Cost: ".$total_cost."
    \n"
    ."Preferred Date: ".$date."
    \n"
    ."Preferred Date: ".$time."
    \n"
    ."Customer Name: ".$name."
    \n"
    ."Customer Contact Number: ".$contact_number."
    \n"
    ."Customer Email Address: ".$email."
    \n"
    ."Customer Extra Notes: ".$extra_notes;

    $body .= "</body></html>";

    // email details
      if (mail($emailTo, $subject, $body, $headers)) {

        // Finally reset variable and shopping cart
        $name = $email = $contact_number = $date = $time = $extra_notes = "";
        $_SESSION['shopping_cart'] = [];
        session_unset();
        header("Location: tyfye.php?bt=$booking_type");

      }

    // echo $emailTo;
    // echo $subject;
    // echo $body;
    // echo $headers;

} else {
    $success_fail = "Enquiry not sent, please check your form for any missing information!";
  }

}

if(isset($_POST['book_course'])){

    $subject = "JoJo Nails Training Course Request";

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
        header("Location: tyfye.php?bt=$booking_type");

      }

} else {
    $success_fail = "Enquiry not sent, please check your form for any missing information!";
  }

}

?>