<?php session_start(); ?>
<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>
<?php include "includes/subheader.php" ?>

        <div>
            <a href="./training-courses.php?source=acrylic-nail-course"><h3>Specializing in only the best treatments</h3></a>
        </div>
    </div>
    <main>

    <!-- Container for the image gallery -->


<!-- Full-width images with number text -->

    <div class="container">
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <div class="mySlides">
                    <div class="main-section">
                        <h3>Salon Treatments</h3>
                        <img src="images/front-page-images/gel-nails3.png" alt="">
                        <p>We offer the very best Beauty Salon treatments and aim to give you the pamper time you deserve, so go on and treat yourself to some wonderful treatments.</p>
                    </div>
                </div>

                <div class="mySlides">
                    <div class="main-section">
                        <h3>Training Courses</h3>
                        <img src="images/front-page-images/acrylic2.png" alt="">
                        <p>Looking for a new career or maybe something different? Why not try a complete Nail Technician course? All our courses are fully accredited by The Guild of Beauty</p>
                    </div>
                </div>
                
                <div class="mySlides">
                    <div class="main-section">
                        <h3>Why not treat yourself?</h3>
                        <img src="images/front-page-images/our-salon.png" alt="">
                        <p>Our purpose-built salon and clinic is fully equipped for your comfort and safety</p>
                    </div>
                </div>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>

        <!-- Image text -->
        <div class="caption-container">
            <p id="caption"></p>
        </div>

            <!-- Thumbnail images -->
        <div class="row">
            <div class="column">
                <img class="demo cursor" src="images/front-page-images/gel-nails3.png" style="width:100%" onclick="currentSlide(1)" alt="">
            </div>
            <div class="column">
                <img class="demo cursor" src="images/front-page-images/acrylic2.png" style="width:100%" onclick="currentSlide(2)" alt="">
            </div>
            <div class="column">
                <img class="demo cursor" src="images/front-page-images/our-salon.png" style="width:100%" onclick="currentSlide(3)" alt="">
            </div>
        </div>

    </div>


    </main>

<?php include "includes/footer.php"; ?>