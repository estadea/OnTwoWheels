<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- for mobile devices-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Ecommerce Website Design </title>

    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bitter&family=Roboto&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/c7cad4103c.js" crossorigin="anonymous"></script>

</head>

<body>

    <?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/onTheWheel/constant.php');

    //  <!-- navigation menu -->
    include ROOTDIR . '/components/header.php';

    ?>

    <!-- slide show -->

    <div class="container slider">
        <img class="mySlides" src="images/banner1.jpg" style="width:100%">
        <img class="mySlides" src="images/banner2.jpg" style="width:100%">
        <img class="mySlides" src="images/banner3.jpg" style="width:100%">
    </div>

    <!-- Offers Overlay -->

    <div class="offer">

        <h2>Special Offers</h2>
        <div class="row">

            <div class="col-2">
                <img src="images/sale2.jpg" class="offer-img">
            </div>

            <div class="col-2">
                <div id="overlay" onclick="off()">
                    <div id="text">Special Offers
                        <img src="images/sale1.jpg" alt="">
                    </div>
                </div>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. <br>
                    A exercitationem veritatis consequuntur atque numquam ex.
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                    <br>Ea, libero?</p>
                <div id="overlay" onclick="off()"></div>
                <div style="padding:20px">
                    <button onclick="on()" class="btn">Discover Now</button>
                </div>
            </div>
        </div>

    </div>


    <div class="offer2">
        <h2>Selected Products</h2>
        <div class="row">
            <div class="col-4">
                <img src="images/products/product-1.jpg">
                <h4>T-Shirt</h4>
                <p>15,00€</p>
            </div>
            <div class="col-4">
                <img src="images/products/product-2.jpg">
                <h4>Jacket</h4>
                <p>150,00€</p>
            </div>
            <div class="col-4">
                <img src="images/products/product-3.jpg">
                <h4>Pants</h4>
                <p>35,00€</p>
            </div>
            <div class="col-4">
                <img src="images/products/product-4.jpg">
                <h4>Shoes</h4>

                <p>75,00€</p>
            </div>
        </div>
    </div>


    <button onclick="topFunction()" id="myBtn" title="Go to top">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <!-- we need different sized columns here -->
                <div class="footer-col-1">
                    <h3>Download Our App</h3>
                    <p>
                        Download App for Android and IOS Mobile Phone
                    </p>
                    <div class="app-logo">
                        <img src="images/play-store.png">
                        <img src="images/app-store.png">
                    </div>
                </div>
                <div class="footer-col-2">

                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus, magni!
                    </p>
                </div>
                <div class="footer-col-3">
                    <h3>useful links:</h3>
                    <ul>
                        <li>Privacy Page</li>
                        <li>Terms and Services</li>
                        <li>FAQ</li>
                    </ul>

                </div>
                <div class="footer-col-4">
                    <h3>Follow us:</h3>
                    <ul>
                        <li>Facebook</li>
                        <li>Twitter</li>
                        <li>Instagram</li>
                        <li>YouTube</li>
                    </ul>

                </div>
            </div>
            <hr> <!-- horizontal line -->
            <p class="copyright">Copyright 2020 Qwerty</p>
        </div>
    </div>

    <script src="app.js"></script>

    <!-- js for scrolling up button -->
    <script>
        //Get the button:
        mybutton = document.getElementById("myBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        }
    </script>

    <!-- js for overlay -->
    <script>
        function on() {
            document.getElementById("overlay").style.display = "block";
        }

        function off() {
            document.getElementById("overlay").style.display = "none";
        }
    </script>

    <!-- js for slider -->
    <script>
        var myIndex = 0;
        carousel();

        function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            myIndex++;
            if (myIndex > x.length) {
                myIndex = 1
            }
            x[myIndex - 1].style.display = "block";
            setTimeout(carousel, 2000); // Change image every 2 seconds
        }
    </script>




</body>