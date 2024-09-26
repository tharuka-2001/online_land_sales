<?php // connect db
include '../connect.php';
session_start();
?>

<?php
$lId = $_SESSION['editid'];
$query = "SELECT * FROM lands WHERE land_Id = $lId;";
$runQuery = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($runQuery);

$title = $row['title'];
$description = $row['description'];
$city = $row['city'];
$address = $row['address'];
$size = $row['size'];
$price = $row['price'];

?>

<?php
if (isset($_POST['submit'])) {
    $lID = $_SESSION['editLid'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $size = $_POST['size'];
    $price = $_POST['price'];

    //update land details
    $updatequery = "UPDATE lands SET title = '$title', description = '$description', city = '$city', address = '$address' , size = '$size' , price = '$price' WHERE land_Id = $lId;";
    $Update = mysqli_query($connect, $updatequery);
    header('Location:manageland.php');

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User management</title>
    <link rel="icon" href="../images/webicon.png">
    <link rel="stylesheet" href="adminstyle/managelandstyle.css">
    <link rel="stylesheet" href="adminstyle/editland.css">
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
            <h2 cllass="usertitle">Edit Land details</h2>
            <div class="field">
                <form method="POST">
                    <label for="">Title : </label>
                    <input type="text" name="title" value="<?php echo $title; ?>">
                    <br>
                    <label for="">Description : </label>
                    <input type="text" name="description" value="<?php echo $description; ?>">
                    <br>
                    <label for="">City : </label>
                    <input type="text" name="city" value="<?php echo $city; ?>">
                    <br>
                    <label for="">Address : </label>
                    <input type="text" name="address" value="<?php echo $address; ?>">
                    <br>
                    <label for="">Size : </label>
                    <input type="text" name="size" value="<?php echo $size; ?>">
                    <br>
                    <label for="">Price : </label>
                    <input type="text" name="price" value="<?php echo $price; ?>">
                    <br>
                    <input type="submit" name="submit" class="submitbtn" value="Subumit">
                </form>
            </div>
        </center>
    </div>

</body>

</html>

<?php //close connection
mysqli_close($connect);
?>