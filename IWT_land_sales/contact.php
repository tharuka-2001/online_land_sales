<?php
include 'connect.php';
?>

<?php
//create rows
if (isset($_POST['name']) || isset($_POST['phoneNo']) || isset($_POST['Address']) || isset($_POST['email']) || isset($_POST['district']) || isset($_POST['message']) || isset($_POST['submit'])) {
    $name = $_POST['name'];
    $phone = $_POST['phoneNo'];
    $address = $_POST['Address'];
    $email = $_POST['email'];
    $district = $_POST['district'];
    $message = $_POST['message'];
    $status = "Not checked";

    //insert data
    $sql = "INSERT INTO contact (name,phone,address,email,district,message,status) VALUES ('$name','$phone','$address','$email','$district','$message','$status');";
    $result = mysqli_query($connect, $sql);

    header("Location:index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="icon" href="images/webicon.png">
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="styles/contactstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container">
        <!--------header------->
        <header>
            <div class="logo">
                <h1>Dream Property Sales</h1>
            </div>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="aboutus.html">About</a></li>
                <li><a href="lands.php">Property</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="login.php">Register/Login</a></li>
                <li><a href="profile.php">Profile</a></li>
            </ul>
            <div class="menu">Menu</div>
        </header>
    </div>
    <!--------header part end------->

    <center class="contact">
        <h1>Contact Us</h1>

        <p>General Number : +94 11 265 9842</p>
        <p>Hot Line Number : 0112 659 8427</p>
        <p>FAX Number : 83302</p>
        <p>Email : dreamproperties@info.com</p>


        <h1>Head office</h1>
        <p>
            No23/5,<br>
            vihaara Mawatha,<br>
            Malabe,<br>
            Colombo, <br>
        </p>

        <h1>Inquire Now</h1>
    </center>
    <div class="container">
        <form method="POST" action="contact.php">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Your name.." required>

            <label for="phoneNo">Contact No.</label>
            <input type="tel" id="phoneNo" name="phoneNo" placeholder="Your mobile number.." required>

            <label for="Address">Address</label>
            <input type="text" id="Address" name="Address" placeholder="Your address.." required>

            <label for="email">Email</label>
            <input type="text" id="email" name="email" placeholder="Your email.." required>

            <label for="district">District</label>
            <select id="district" name="district">
                <option value="Ampara">Ampara</option>
                <option value="Anuradhapura">Anuradhapura</option>
                <option value="Badulla">Badulla</option>
                <option value="Batticaloa">Batticaloa</option>
                <option value="Colombo">Colombo</option>
                <option value="Galle">Galle</option>
                <option value="Gampaha">Gampaha</option>
                <option value="Hambanthota">Hambanthota</option>
                <option value="Jaffna">Jaffna</option>
                <option value="Kaluthara">Kaluthara</option>
                <option value="Kandy">Kandy</option>
                <option value="Kegalle">Kegalle</option>
                <option value="Kilinochchi">Kilinochchi</option>
                <option value="Mannar">Mannar</option>
                <option value="Matale">Matale</option>
                <option value="Matara">Matara</option>
                <option value="Monaragala">Monaragala</option>
                <option value="Mullaitivu">Mullaitivu</option>
                <option value="Nuwara Eliya">Nuwara Eliya</option>
                <option value="Polonnaruwa">Polonnaruwa</option>
                <option value="Puttalam">Puttalam</option>
                <option value="Ratnapura">Ratnapura</option>
                <option value="Trincomalee">Trincomalee</option>
                <option value="Vavuniya">Vavuniya</option>
            </select>

            <label for="Message">Message</label>
            <textarea id="message" name="message" placeholder="Write something.." style="height:200px"></textarea>

            <input type="submit" name='submit' value="Send">
        </form>
    </div>




    <!--------footer------->
    <footer class="footer-distributed">

        <div class="footer-left">

            <h3>Dream Property<span>Sale</span></h3>

            <p class="footer-links">
                <a href="index.php" class="link-1">Home</a>

                <a href="#">About</a>

                <a href="#">services</a>

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