<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>
<?php include "includes/subheader.php" ?>
   
    <div>
        <a href=""><h3>Thank you for booking</h3></a>
    </div>
</div>
<main>

<div class="single-item-container">
   <?php

    if(isset($_GET['bt'])){
        $bt = $_GET['bt'];

        if($bt == "training_course"){
            echo "<h3 class='single-item-header'>Thank you for booking your training course with JoJo's Nails.</h3><h4 class='single-item-header'>A response with our availbility will be sent as soon as possible</h4>";
        } else {
            echo "<h3 class='single-item-header'>Thank you for booking your treatments with JoJo's Nails & Beauty Academy.</h3><h4 class='single-item-header'>A response with our availbility will be sent as soon as possible</h4>";
        }

    } else {
        header("Location: index.php");
    }

   ?>         
</div>

</main>

<?php include "includes/footer.php"; ?>