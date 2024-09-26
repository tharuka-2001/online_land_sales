<?php
session_start();
?>
<?php
include 'connect.php';
//lad detail read query
$sql = "SELECT * FROM Properties;";
$all_lands = mysqli_query($connect, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>property</title>
    <link rel="icon" href="images/webicon.png">
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="styles/landstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container">
        <!--------header------->
        <header>
            <div class="headln">
                <div class="logo">
                    <h1>Property Sales</h1>
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
                <li><a href="property.php">Property</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="login.php">Register/Login</a></li>
                <li><a href="profile.php">Profile</a></li>
            </ul>
            <div class="menu">Menu</div>
        </header>
    </div>
    <!--------header part end------->
    <div>
        <?php
        if (isset($_SESSION['id'])) {
            echo "<button class=\"addbtn\"><a href=\"addLand.php\">Add Land</a></button>";
        }
        ?>
    </div>

    <main>
        <?php
        while ($row = mysqli_fetch_assoc($all_lands)) {
            ?>
        <div class="card">
            <div class="image">
                <img src="<?php echo "properties/" . $row["fileName"] ?>" alt="">
            </div>
            <div class="caption"></div>
            <p class="property name"><span><b>Land number:</b></span>
                <?php echo $row["property_Id"] ?>
            </p>
            <p><span><b>property title :</b></span>
                <?php echo $row["title"] ?>
            </p>
            <p><span><b>Description :</b></span>
                <?php echo $row["description"] ?>
            </p>
            <p><span><b>City :</b></span>
                <?php echo $row["city"] ?>
            </p>
            <p><span><b>Seller contact No. :</b></span>
                <?php $id = $row['s_Id'];
                $sql1 = "SELECT * FROM user WHERE id = $id;";
                $result = mysqli_query($connect, $sql1);
                $row1 = mysqli_fetch_assoc($result);
                echo $row1["phone"]; ?>
            </p>


            <p class="price"><span><b>Price per perch :</b></span>
                <?php echo $row['price']; ?>.00 rupees
            </p>

            <p class="size"><span><b>Area of land :</b></span>
                <?php echo $row['size'] . " perch"; ?>
            </p>
        </div>
        <?php
        }
        ?>
    </main>


    <!--------footer------->
    <footer class="footer-distributed">

        <div class="footer-left">

            <h3>Dream Property<span>Sale</span></h3>

            <p class="footer-links">
                <a href="index.php" class="link-1">Home</a>

                <a href="aboutus.html">About Us</a>

                <a href="services.html">services</a>

                <a href="contact.php">Contact</a>
            </p>

            <p class="footer-company-name">Property Sale © 2023</p>
        </div>

        <div class="footer-center">

            <div>
                <i class="fa fa-map-marker"></i>
                <p><span>22/4,Vihara Mawaatha</span> Malabe, Colombo</p>
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
                Established in 2018, the trusted name in property sales. Offering premium properties, unrivaled service, and
                expertise for your perfect Sri Lankan investment.
            </p>

            <div class="footer-icons">

                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>

            </div>

        </div>

    </footer>
    <!--------footer end------->
</body>

</html>

<?php //close connection
mysqli_close($connect);
?>