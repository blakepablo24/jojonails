<div class="course-heading">
    <h1>Microneedling Course</h1>
    <img src="images/training-courses-images/microneedling-300x150.jpg" alt="">
</div>

<?php

$query = "SELECT * FROM course_training WHERE course_training_title = 'Microneedling Course'";
$db_query = mysqli_query($connection, $query);
confirm($db_query);
while ($row = mysqli_fetch_assoc($db_query)) {
    $course_training_id = $row['course_training_id'];
    $course_training_title = $row['course_training_title'];
    $course_training_duration = $row['course_training_duration'];
    $course_training_time_start = $row['course_training_time_start'];
    $course_training_time_end = $row['course_training_time_end'];
    $course_training_teacher_student_ratio = $row['course_training_teacher_student_ratio'];
    $course_training_price = $row['course_training_price'];
    $course_training_extras = $row['course_training_extras'];
    
?>

<div class="main-section-training-course">
            <h4>Course:</h4>
            <h3><?php echo $course_training_title ?></h3>
            <h4>Duration:</h4>
            <h3><?php echo $course_training_duration ?></h3>
            <h4>Times:</h4>
            <h3><?php echo $course_training_time_start ?> - <?php echo $course_training_time_end ?></h3>
            <h4>Teacher Student Ratio:</h4>
            <h3><?php echo $course_training_teacher_student_ratio ?></h3>
            <h4>Price:</h4>
            <h3><?php echo $course_training_price ?></h3>
            <h4>Curriculum:</h4>
            <div>
            <?php

            $query = "SELECT * FROM course_curriculum WHERE course_training_id = $course_training_id";
            $db_query = mysqli_query($connection, $query);
            confirm($db_query);
            while ($row = mysqli_fetch_assoc($db_query)) {
                $course_curriculum_item = $row['course_curriculum_item'];
                echo "<h3>$course_curriculum_item</h3>";
            }    
            ?>
            </div>
            <?php if(!empty($course_training_extras)) {
                echo "<h4>Extra Info:</h4>".
                "<h3>".$course_training_extras."</h3>";
            } ?>
        </div>

<?php } ?>