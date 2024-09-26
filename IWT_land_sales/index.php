<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="icon" href="images/webicon.png">
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container">
        <!--------header------->
        <header>
            <div class="headln">
                <div class="logo">
                    <h1>Dream Property Sales</h1>
                </div>
                <div class="username">
                    <?php
                    if (isset($_SESSION['id'])) {
                        echo "<h1>Welcome " . $_SESSION['name'] . "</h1>";
                    } else {
                        echo "<h2 style=\"color : red;\">You are not log into system !!!!</h2>";
                    }
                    ?>
                </div>
            </div>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="aboutus.html">About</a></li>
                <li><a href="properties.php">properties</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="login.php">Register/Login</a></li>
                <li><a href="profile.php">Profile</a></li>

            </ul>
            <div class="menu">Menu</div>
        </header>
        <!-----------section----------->
        <section>
            <!------banner------->
            <div class="banner">
                <div class="thumb">
                    <img src="images/banner/bn1.jpg" alt="bn1">
                </div>
                <div class="text">
                    <h2>GET WAYS TO THE PROPERTIES OF DREAMS</h2>
                    <p>AYUBOWAN!</p>
                </div>

            </div>
            <!------about------->
            <div id="about">
                <h2>About Us</h2>
                <div class="content">
                    <div class="text">
                        <h3>Online property sale system</h3>
                        <!--about paragraph (1) -->
                        <p>Welcome to online property selling platform</p>
                        <!--abut paragraph (2)-->
                        <p> Welcome to our Online property Sales System! We are a premier
                            platform that connects buyers and sellers in the real estate industry, offering a convenient
                            and
                            efficient way to buy and sell property online.</p>
                        <a href="adoutus.html">read more...</a>
                    </div>
                    <div class="thumb">
                        <div class="thumb-box">
                            <img src="images/aboutimg1.jpg" alt="">
                            <h3>Trustworthy</h3>
                        </div>
                        <div class="thumb-box">
                            <img src="images/aboutimg2.jpg" alt="">
                            <h3>Friendly Service</h3>
                        </div>
                    </div>
                </div>
                <!-------partners------>
                <div class="partner">
                    <h3>Our Partners</h3>
                    <div class="thumb">
                        <div class="thumb-box">
                            <img src="images/partner1.png" alt="">
                            <h3>Gold partner</h3>
                            <div class="social">
                                <a href="https://www.araliyalands.com/?gclid=CjwKCAjwvpCkBhB4EiwAujULMmsp6jwwbROYQNCp59CCvOnGI_GFMf9V_dXQkggVaNHW-EliKoDAQRoCx64QAvD_BwE"
                                    class="web">Araliya Lands</a>
                            </div>
                            <p>Araliya Lands & Home (pvt) Ltd. is one of largest real estate company in sri lanka.</p>
                            <a id="rmp" href="https://www.araliyalands.com/about_us">Read more</a>
                        </div>
                        <div class="thumb-box">
                            <img src="images/partner2.jpg" alt="">
                            <h3>Sliver partner</h3>
                            <div class="social">
                                <a href="#" class="web">Prime Lands</a>
                            </div>
                            <p>Prime Lands Group (pvt) Ltd. is a oldest company in sri lanka</p>
                            <a id="rmp" href="https://www.primelands.lk/about-us">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
            <!----------lands------------>
            <div id="properties">
                <h2>Populer Properties</h2>
                <div class="content">
                    <div class="box">
                        <img src="images/land1.jpg" alt="">
                        <div class="text">
                            <h3>Land 01</h3>
                            <span>Kgalle</span>
                            <p>paraghraph description</p>
                            <div class="details">
                                <span>Size : </span>
                                <span>Address : </span>
                                <span>Electricity line : </span>
                                <span>Water line : </span>
                            </div>
                            <a href="#">Read more</a>
                        </div>
                    </div>
                    <div class="box">
                        <img src="images/land2.webp" alt="">
                        <div class="text">
                            <h3>Land 02</h3>
                            <span>Matara</span>
                            <p>paraghraph description</p>
                            <div class="details">
                                <span>Size : </span>
                                <span>Address : </span>
                                <span>Electricity line : </span>
                                <span>Water line : </span>
                            </div>
                            <a href="#">Read more</a>
                        </div>
                    </div>
                    <div class="box">
                        <img src="images/land3.webp" alt="">
                        <div class="text">
                            <h3>Land 03</h3>
                            <span>Kalutara</span>
                            <p>paraghraph description</p>
                            <div class="details">
                                <span>Size : </span>
                                <span>Address : </span>
                                <span>Electricity line : </span>
                                <span>Water line : </span>
                            </div>
                            <a href="#">Read more</a>
                        </div>
                    </div>

                </div>
                <a href="lands.php">View All Lands</a>
            </div>
            <!----------service---------->
            <!----------contact---------->
        </section>
    </div>
    <!--------footer------->

    <footer class="footer-distributed">

        <div class="footer-left">

            <h3>Dream property<span>Sale</span></h3>

            <p class="footer-links">
                <a href="index.php" class="link-1">Home</a>

                <a href="aboutus.html">About</a>

                <a href="services.html">services</a>

                <a href="contact.php">Contact</a>
            </p>

            <p class="footer-company-name">Property Sale © 2023</p>
        </div>

        <div class="footer-center">

            <div>
                <i class="fa fa-map-marker"></i>
                <p><span>22/4,vihaara Mawatha</span> Malabe, Colombo</p>
            </div>

            <div>
                <i class="fa fa-phone"></i>
                <p>+94 11 265 9842</p>
            </div>

            <div>
                <i class="fa fa-envelope"></i>
                <p><a href="mailto:@info.com">dreamproperties@info.com</a></p>
            </div>

        </div>

        <div class="footer-right">

            <p class="footer-company-about">
                <span>About the company</span>
                Established in 2017, the trusted name in property sales. Offering premium properties, unrivaled service, and
                expertise for your perfect Sri Lankan investment.
            </p>

            <div class="footer-icons">

                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>

            </div>

        </div>

    </footer>

</body>

</html>