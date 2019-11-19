<?php include "includes/subheader.php" ?>
   
<?php

if(isset($_GET['source'])){

    $source = $_GET['source'];

$query = "SELECT * FROM course_training WHERE course_training_db_title = '$source'";
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

<div>
        <a href=""><h3><?php echo $course_training_title ?></h3></a>
    </div>
</div>
<main>

<form class="single-item-container">
            <img class="single-item-main-image" src="images/training-courses-images/<?php echo $course_training_image ?>" alt="">
            <h4 class="item-title">Duration:</h4>
            <h3 class="item-content"><?php echo $course_training_duration ?></h3>
            <h4 class="item-title">Times:</h4>
            <h3 class="item-content"><?php echo $course_training_time_start ?> - <?php echo $course_training_time_end ?></h3>
            <h4 class="item-title">Teacher Student Ratio:</h4>
            <h3 class="item-content"><?php echo $course_training_teacher_student_ratio ?></h3>
            <h4 class="item-title">Price:</h4>
            <h3 class="item-content"><?php echo $course_training_price ?></h3>
            <h4 class="item-curriculum-title">Curriculum:</h4>
            <div class="large-screen-layout">
            <?php

            $query = "SELECT * FROM course_curriculum WHERE course_training_id = $course_training_id";
            $db_query = mysqli_query($connection, $query);
            confirm($db_query);
            while ($row = mysqli_fetch_assoc($db_query)) {
                $course_curriculum_item = $row['course_curriculum_item'];
                echo "<h3 class='item-curriculum-content'>- $course_curriculum_item</h3>";
            }    
            ?>
            </div>
            
            <?php if(!empty($course_training_extras)) {
                echo "<h4 class='item-curriculum-title'>Extra Info:</h4>".
                "<div class='large-screen-layout'><h3 class='item-curriculum-content-extra'>".$course_training_extras."</h3>";
            } ?>
            </div>
            <a href="./booking-form.php?source=<?php echo $course_training_db_title ?>" class="book-this-treatment-button">Book this Course</a>
            <img class="single-item-sub-image" src="images/front-page-images/guild-of-beauty-therapists.png" alt="">
        </form>

<?php }} ?>