<?php
include '../connect.php';
session_start();
?>

<?php
$id = $_SESSION['editId'];
$query = "SELECT * FROM user WHERE id = $id;";
$runQuery = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($runQuery);

$name = $row['name'];
$email = $row['email'];
$phone = $row['phone'];
$username = $row['username'];
?>

<?php
if (isset($_POST['submit'])) {
    $id = $_SESSION['editId'];
    $Nname = $_POST['name'];
    $Nemail = $_POST['email'];
    $Nphone = $_POST['phone'];
    $Nusername = $_POST['username'];

    //validate username
    $sql = "SELECT * FROM user WHERE username = '$Nusername';";
    $run = mysqli_query($connect, $sql);

    if (mysqli_num_rows($run) > 1) {
        echo "<script>alert(\"Username already exist!!!\");</script>";
    } else { //Update user
        $updatequery = "UPDATE user SET name = '$Nname', email = '$Nemail', phone = '$Nphone', username = '$Nusername' WHERE id = $id;";
        $Update = mysqli_query($connect, $updatequery);
        header('Location:manageuser.php');
    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User management</title>
    <link rel="icon" href="../images/webicon.png">
    <link rel="stylesheet" href="adminstyle/edituser.css">
    <link rel="stylesheet" href="adminstyle/manageuserstyle.css">
</head>

<body>
    <div class="title">
        <img src="../images/sellerimg.jpg" alt="">
        <h1>Royal Land sale Admin panel</h1>
        <img src="../images/adminlogo.gif" alt="">
    </div>


    <div class="editform">
        <button class="backbtn"><a href="manageuser.php">Back to Dashboard</a></button>
        <center>
            <h2 cllass="usertitle">Edit user details</h2>
            <div class="field">
                <form method="POST">
                    <label for="">Name : </label>
                    <input type="text" name="name" value="<?php echo $name; ?>">
                    <br>
                    <label for="">Email : </label>
                    <input type="text" name="email" value="<?php echo $email; ?>">
                    <br>
                    <label for="">Contact No. : </label>
                    <input type="text" name="phone" value="<?php echo $phone; ?>">
                    <br>
                    <label for="">Username : </label>
                    <input type="text" name="username" value="<?php echo $username; ?>">
                    <br>
                    <input type="submit" name="submit" class="submitbtn" value="Submit">
                </form>
            </div>
        </center>
    </div>

</body>

</html>

<?php //close connection
mysqli_close($connect);
?>