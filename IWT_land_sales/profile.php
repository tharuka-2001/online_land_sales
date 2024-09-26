<?php
session_start();
?>
<?php
include 'connect.php';
?>


<?php
//read data
if (isset($_SESSION['id'])) {
    $UId = $_SESSION['id'];
    $userQuery = "SELECT * FROM user WHERE id = $UId;";
    $result = mysqli_query($connect, $userQuery);
    $data = mysqli_fetch_assoc($result);

    $username = $data['username'];
    $name = $data['name'];
    $phone = $data['phone'];
    $email = $data['email'];

}
?>

<?php
//logout
if (isset($_POST["logout"])) {
    session_destroy();
    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="icon" href="images/webicon.png">
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="styles/profilestyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container">
        <!--------header------->
        <header>
            <div class="logo">
                <h1>Dream property Sale</h1>
                <!-- wait for php part-->
            </div>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="aboutus.php">About</a></li>
                <li><a href="lands.php">Property</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="login.php">Register/Login</a></li>
                <li><a href="profile.php">Profile</a></li>
            </ul>
            <div class="menu">Menu</div>
        </header>
    </div>
    <!--------header part end------->

    <center>
        <img class="profilehead" src="images/profilePageHead.gif" alt="">
        <?php
        //check login status
        if (isset($_SESSION['id'])) {
            echo "<h1>Details of " . $name . "</h1>";
        } else {
            echo "<script>alert(\"Please log into system\")</script>";
            echo "<h2 style=\"color : red;\">You are not log into system !!!!</h2>";
        }
        ?>

        <div class="container2">
            <div class="container3">


                <center class="headerform">Your information</center>
                <div class="form-style">
                    <div class="form-style-heading">

                    </div>
                    <div class="content">
                        <form action="" method="post">
                            <div class="input">
                                <label for="field1"><span>User ID : </span>
                                    <input type="text" class="input-field" name="field1" value="<?php if (isset($_SESSION['id'])) {
                                        echo $_SESSION['id'];
                                    } ?>" disabled /></label>
                            </div>

                            <div class="input">
                                <label for="field2"><span>Username : </span></span>
                                    <input type="text" class="input-field" name="field2" value="<?php if (isset($username)) {
                                        echo $username;
                                    } ?>" disabled /></label>
                            </div>

                            <div class="input">
                                <label for="field2"><span>Name : </span></span>
                                    <input type="text" class="input-field" name="field3" value="<?php if (isset($name)) {
                                        echo $name;
                                    } ?>" disabled /></label>
                            </div>

                            <div class="input">
                                <label for="field2"><span>Phone number : </span></span>
                                    <input type="text" class="input-field" name="field4" value="<?php if (isset($phone)) {
                                        echo $phone;
                                    } ?>" disabled /></label>
                            </div>

                            <div class="input">
                                <label for="field2"><span>Email : </span></span>
                                    <input type="text" class="input-field" name="field4" value="<?php if (isset($email)) {
                                        echo $email;
                                    } ?> " disabled /></label>
                            </div>
                        </form>

                        <?php
                        if (isset($_SESSION['id'])) {
                            echo "<button class=\"exitbtn\"><a href=\"editprofile.php\">Edit profile</a></button>";
                            echo "<form method = \"POST\">
                            <input type=\"submit\" name=\"logout\" class=\"exitbtn\" value=\"Log out\">
                            </form>";
                        }
                        ?>
                    </div>
                </div>
    </center>
    </div>
    </div>

    <!--------footer------->
    <footer class="footer-distributed">

        <div class="footer-left">

            <h3>Dream property<span>Sale</span></h3>

            <p class="footer-links">
                <a href="index.php" class="link-1">Home</a>

                <a href="aboutsu.html">About</a>

                <a href="services.html">services</a>

                <a href="contact.php">Contact</a>
            </p>

            <p class="footer-company-name">Property Sale © 2023</p>
        </div>

        <div class="footer-center">

            <div>
                <i class="fa fa-map-marker"></i>
                <p><span>22/4,Vihaara Mawatha</span> Malabe, Colombo</p>
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
    <!--------footer end------->
</body>

</html>

<?php //close connection
mysqli_close($connect);
?>