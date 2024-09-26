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
    $password = $data['password'];
}
?>

<?php
//update data
if (isset($_POST['submit']) && $_SESSION['id'] && $_POST['Nname'] && $_POST['Nphone'] && $_POST['Nemail'] && $_POST['Npassword'] && $_POST['Npassword'] && $_POST['Nrepassword']) {
    $id = $_SESSION['id'];
    $Nname = ($_POST['Nname']);
    $Nphone = ($_POST['Nphone']);
    $Nemail = ($_POST['Nemail']);
    $Npassword = ($_POST['Npassword']);
    $Nrepassword = ($_POST['Nrepassword']);

    if ($Npassword == $Nrepassword) {
        $updateQuery = "UPDATE user SET name ='$Nname' , email ='$Nemail' , phone ='$Nphone' , password ='$Npassword' WHERE id = $id;";
        $update = mysqli_query($connect, $updateQuery);
        if (!mysqli_query($connect, $updateQuery)) {
            echo ("Error : " . mysqli_error($connet));
        }
        header("Location:profile.php");

    } else {
        echo "<script>alert(\"Password mismatch!!!\n Enter again.\")</script>";
    }
}
?>


<?php /*delete account*/
if (isset($_POST['delete'])) {
    $uID = $_SESSION['id'];
    $deletesql = "DELETE FROM user WHERE id = $uID;";
    $rundelete = mysqli_query($connect, $deletesql);
    session_destroy();
    header("Location:register.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/profilestyle.css">
    <title>Edit profile</title>
</head>

<body>

    <button class="exitbtn"><a href="profile.php">Profile</a></button>

    <div class="form-style">

        <div class="container2">
            <div class="container3">

                <center class="headerform">Edit Details</center>
                <form action="" method="POST">
                    <div class="content">

                        <div class="input">
                            <label for="Nnmae">Name : </label>
                            <input type="text" class="input-field" name="Nname" value="<?php if (isset($name)) {
                                echo $name;
                            } ?>" />
                        </div>
                        <div class="input">
                            <label for="Nphone">Phone number : </label>
                            <input type="text" class="input-field" name="Nphone" value="<?php if (isset($phone)) {
                                echo $phone;
                            } ?>" required />
                        </div>
                        <div class="input">
                            <label for="Nemail">Email : </label>
                            <input type="text" class="input-field" name="Nemail" value="<?php if (isset($email)) {
                                echo $email;
                            } ?> " required />
                        </div>
                        <div class="input">
                            <label for="Npassword">New Password : </label>
                            <input type="password" class="input-field" name="Npassword" value="<?php if (isset($password)) {
                                echo $password;
                            } ?> " required />
                        </div>
                        <div class="input">
                            <label for="Nrepassword">Confirm Password : </label>
                            <input type="password" class="input-field" name="Nrepassword" value="<?php if (isset($password)) {
                                echo $password;
                            } ?> " required />
                        </div>
                        <div class="button_container">
                            <center>
                                <input class="savebtn" name="submit" type="submit" value="Save">
                                <input class="deletebtn" name="delete" type="submit" value="Delete Account">
                            </center>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>

</body>

</html>

<?php //close connection
mysqli_close($connect);
?>