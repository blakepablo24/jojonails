<?php include "includes/subheader.php" ?>
    <div>
        <a href=""><h3>Training Courses from £95.00</h3></a>
    </div>
</div>
<main>

<?php

$query = "SELECT * FROM course_training";
$db_query = mysqli_query($connection, $query);
confirm($db_query);
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
    
?>

        <a href="./training-courses.php?source=<?php echo $course_training_db_title ?>">
            <div class="multiple-item-container">
                <img src="images/training-courses-images/<?php echo $course_training_image ?>" alt="">
                <h3><?php echo $course_training_title ?></h3>
            </div>
        </a>

<?php } ?>
