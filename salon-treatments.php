<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>

<div class="main-header">
        <h2>Salon Treatments <i class="fas fa-arrows-alt-h"></i></h2>
        <div>
            <a href="salon-treatments.php">Nails</a>
            <a href="./salon-treatments.php?source=pedicure-treatments">Pedicures</a>
            <a href="./salon-treatments.php?source=waxing-treatments">Waxing</a>
            <a href="./salon-treatments.php?source=microblading">Microblading</a>
            <a href="./salon-treatments.php?source=tints-and-shapes">Tints and Shapes</a>
            <a href="./salon-treatments.php?source=eyelash-extensions">Eyelash Extensions</a>
            <a href="./salon-treatments.php?source=facial-treatments">Facial Treatments</a>
            <a href="./salon-treatments.php?source=holistics">Holistics</a>
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
    case 'pedicure-treatments';
    include "includes/salon-treatments/pedicure-treatments.php";
    break;
    
    case 'waxing-treatments';
    include "includes/salon-treatments/waxing-treatments.php";
    break;

    case 'microblading';
    include "includes/salon-treatments/microblading.php";
    break;

    case 'tints-and-shapes';
    include "includes/salon-treatments/tints-and-shapes.php";
    break;

    case 'eyelash-extensions';
    include "includes/salon-treatments/eyelash-extensions.php";
    break;

    case 'facial-treatments';
    include "includes/salon-treatments/facial-treatments.php";
    break;

    case 'holistics';
    include "includes/salon-treatments/holistics.php";
    break;

    default:

    include "includes/salon-treatments/nails-treatments.php";

    break;
}

?>

</main>

<?php include "includes/footer.php"; ?>