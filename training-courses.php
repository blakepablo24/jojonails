<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>

<div class="main-header">
        <h2>Training Courses <i class="fas fa-arrows-alt-h"></i></h2>
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

if(isset($_GET['source'])){

    $source = $_GET['source'];

    $query = "SELECT * FROM course_training WHERE course_training_db_title = '$source'";
    $db_query = mysqli_query($connection, $query);
    confirm($db_query);
    $db_query_amount = mysqli_num_rows($db_query);

if($db_query_amount !== 0){

    while ($row = mysqli_fetch_assoc($db_query)) {
        $course_training_id = $row['course_training_id'];
        $course_training_image = $row['course_training_image'];
        $course_training_title = $row['course_training_title'];
        $course_training_db_title = $row['course_training_db_title'];
        $course_training_duration = $row['course_training_duration'];
        $course_training_time_start = $row['course_training_time_start'];
        $course_training_time_end = $row['course_training_time_end'];
        $course_training_teacher_student_ratio = $row['course_training_teacher_student_ratio'];
        $course_training_price = $row['course_training_price'];
        $course_training_extras = $row['course_training_extras'];

    include "includes/training-courses/single-course.php";
    }
} else {
    include "includes/training-courses/all-training-courses.php";
}


} else {

    $source = "";
    include "includes/training-courses/all-training-courses.php";

}
?>

</main>

<?php include "includes/footer.php"; ?>