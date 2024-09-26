<?php //connect db
include '../connect.php';
session_start();
?>

<?php
if (isset($_POST['edit'])) {
    $editid = $_POST['edit'];
    $_SESSION['editid'] = $editid;

    header("Location:admineditland.php");
}

//delete land
if (isset($_POST['delete'])) {
    $land_Id = $_POST['delete'];
    $sql = "DELETE FROM lands WHERE land_Id = $land_Id;";
    $res = mysqli_query($connect, $sql);
    header("Location:manageland.php");
}
//logout
if (isset($_POST['logout'])) {
    session_destroy();
    header('Location:../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Land management</title>
    <link rel="icon" href="../images/webicon.png">
    <link rel="stylesheet" href="adminstyle/managelandstyle.css">

</head>

<div class="head">
    <div class="title">
        <img src="../images/sellerimg.jpg" alt="">
        <h1>Royal Land sale Admin panel</h1>
        <img src="../images/adminlogo.gif" alt="">
    </div>
    <form action="" method="POST">
        <div class="logout"><input type="submit" name="logout" value="logout"></div>
    </form>
</div>
<ul>
    <li><a href="manageuser.php">Users</a></li>
    <li><a href="manageland.php" class="active">Land</a></li>
    <li><a href="inquire.php">Inqurees</a></li>
    <li><a href="managepayment.php">Payment</a></li>
</ul>
<center>
    <h2>Manage Lands</h2>
</center>
<table class="users">
    <tr>
        <th>Land ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>City</th>
        <th>Address</th>
        <th>Size</th>
        <th>Price</th>
        <th>Seller Id</th>
        <th></th>
        <th></th>
    </tr>
    <?php
    //read land details
    $query = "SELECT * FROM lands;";
    $run = mysqli_query($connect, $query);
    while ($row = mysqli_fetch_assoc($run)) {
        $land_id = $row['land_Id'];
        $title = $row['title'];
        $description = $row['description'];
        $city = $row['city'];
        $address = $row['address'];
        $size = $row['size'];
        $price = $row['price'];
        $seller = $row['s_Id'];
        ?>
        <tr>
            <td>
                <?php echo $land_id; ?>
            </td>
            <td>
                <?php echo $title; ?>
            </td>
            <td>
                <?php echo $description; ?>
            </td>
            <td>
                <?php echo $city; ?>
            </td>
            <td>
                <?php echo $address; ?>
            </td>
            <td>
                <?php echo $size; ?>
            </td>
            <td>
                <?php echo $price; ?>
            </td>
            <td>
                <?php echo $seller; ?>
            </td>
            <form method="POST">
                <td><button class="editbtn" type="submit" name="edit" value=" <?php echo $land_id; ?>">Edit</button>
                </td>
                <td><button class="deletebtn" type="submit" name="delete" value="<?php echo $land_id; ?>">Delete</button>
                </td>
            </form>
        </tr>
        <?php
    }
    ?>
</table>

</body>

</html>

<?php //close connection
mysqli_close($connect);
?>