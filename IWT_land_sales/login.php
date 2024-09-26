<?php //connect database
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="images/webicon.png">
    <link rel="stylesheet" href="styles/loginstyle.css">
    <script src="script/script.js"></script>
</head>

<body>
    <button class="backbtn"><a href="index.php">Go back to home</a></button>
    <center>
        <img src="images/loginHead.gif" alt="" style="width:100px;">
        <h1>Login</h1>
    </center>
    <div>
        <form method="POST" action="">
            <label for="Username">Username</label>
            <input type="text" id="username" name="username" placeholder="Your username.." required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Your password.." required>
            <div class="check"><label for="">Show Password</label><input class="tik" type="checkbox"
                    onclick="showPassword()"></div>

            <input type="submit" name="submit" value="Login">
        </form>
    </div>
    </form>
    <center>
        <p>Are you new user? <a href="register.php">Register now</a></p>
    </center>
</body>

</html>


<?php
if (isset($_POST["submit"])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    //admin login data
    $adminUsername = "admin123";
    $adminPassword = "admin123";

    //read data 
    $logQuary = "SELECT * FROM user WHERE username = '$username';";
    $logResult = mysqli_query($connect, $logQuary);

    //admin login
    if ($username == $adminUsername && $password == $adminPassword) {
        header('Location:admin/manageuser.php');

        //common user login
    } elseif (mysqli_num_rows($logResult) == 1) {
        $row = mysqli_fetch_assoc($logResult);
        //check password
        if ($password == $row['password']) {
            session_start();
            $_SESSION["id"] = $row['id'];
            $_SESSION["username"] = $row['username'];
            $_SESSION["name"] = $row['name'];
            $_SESSION["email"] = $row['email'];
            $_SESSION["phone"] = $row['phone'];
            header("Location:index.php");
        } else {
            echo "<script>alert('Invalid password! Please try again.');</script>";
        }
    } else {
        echo "<script>alert('Invalid username! Please try again.');</script>";
    }
}
?>

<?php //close db connection
mysqli_close($connect);
?>