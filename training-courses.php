<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>

<div class="main-header">
        <h2>Training Courses <i class="fas fa-arrows-alt-h"></i></h2>
        <div>
            <a href="training-courses.php"><h3>Acrylic Nails</h3></a>
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

} else {

    $source = "";

}

switch($source) {
    case 'gel-polish-course';
    include "includes/training-courses/gel-polish-course.php";
    break;
    
    case 'manicure-and-pedicure-course';
    include "includes/training-courses/manicure-and-pedicure-course.php";
    break;

    case 'nail-art-course';
    include "includes/training-courses/nail-art-course.php";
    break;

    case 'massage-course';
    include "includes/training-courses/massage-course.php";
    break;

    case 'spray-tanning-course';
    include "includes/training-courses/spray-tanning-course.php";
    break;

    case 'waxing-course';
    include "includes/training-courses/waxing-course.php";
    break;

    case 'dermaplaning-course';
    include "includes/training-courses/dermaplaning-course.php";
    break;

    case 'microneedling-course';
    include "includes/training-courses/microneedling-course.php";
    break;

    default:

    include "includes/training-courses/acrylic-nail-course.php";

    break;
}

?>

</main>

<?php include "includes/footer.php"; ?>