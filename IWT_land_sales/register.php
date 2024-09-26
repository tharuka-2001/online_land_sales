<?php //connect db
include 'connect.php';
?>

<?php
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['repassword'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];

    // user name status
    $existQuery = "SELECT * FROM user WHERE username = '$username'";
    $existResult = mysqli_query($connect, $existQuery);
    // check password confirmation
    if ($password != $repassword) {
        echo "<script>alert('Password confirmation failed! Please try again.');</script>";
    }
    //check username exixt or not
    elseif (mysqli_num_rows($existResult) > 0) {
        echo "<script>alert('Username already exist! Please try again.');</script>";
    }
    //Insert data
    else {
        $sql = "INSERT INTO user (name,email,phone,username,password) VALUES('$name','$email','$phone','$username','$password');";
        $result = mysqli_query($connect, $sql);
        echo "<script>alert('Registration success!');</script>";

        $logQuary = "SELECT * FROM user WHERE username = '$username';";
        $logResult = mysqli_query($connect, $logQuary);
        $row = mysqli_fetch_assoc($logResult);
        session_start();
        $_SESSION["id"] = $row['id'];
        $_SESSION["username"] = $row['username'];
        $_SESSION["name"] = $row['name'];
        $_SESSION["email"] = $row['email'];
        $_SESSION["phone"] = $row['phone'];

        header("Location:index.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="icon" href="images/webicon.png">
    <link rel="stylesheet" href="styles/loginstyle.css">
</head>

<body>
    <button class="backbtn"><a href="index.php">Go back to home</a></button>
    <center>
        <img src="images/registerHead.gif" alt="" style="width:100px;">
        <h1>Register</h1>
    </center>
    <div>
        <form method="POST" action="">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Your name.." required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Your email.." required>

            <label for="phone">Phone no</label>
            <input type="tel" id="phone" name="phone" placeholder="Your moblile number.." required>

            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Your username.." required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Your password.." pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>

            <label for="repassword">Confirm password</label>
            <input type="password" id="repassword" name="repassword" placeholder="Confirm your password.." required>

            <input type="submit" name="submit" value="Register">
        </form>
    </div>
    <center>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </center>
</body>

</html>

<?php //close connection
mysqli_close($connect);
?>