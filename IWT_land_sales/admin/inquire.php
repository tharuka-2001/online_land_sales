<?php //connect db
include '../connect.php';
session_start();
?>

<?php
if (isset($_POST['check'])) {
    $c_Id = $_POST['check'];
    $status = $_POST['status'];
    //update status
    $sql = "UPDATE contact SET status = '$status' WHERE contact_Id = $c_Id;";
    $run = mysqli_query($connect, $sql);

    header('Location:inquire.php');
}

//logout
if (isset($_POST['logout'])) {
    session_destroy();
    header('Location:../index.php');
}

//delete message
if (isset($_POST['delete'])) {
    $c_Id = $_POST['delete'];
    $sql = "DELETE FROM contact WHERE contact_Id = $c_Id;";
    $res = mysqli_query($connect, $sql);
    header("Location:inquire.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inquire</title>
    <link rel="icon" href="../images/webicon.png">
    <link rel="stylesheet" href="adminstyle/inquirestyle.css">

</head>

<body>
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
        <li><a href="manageland.php">Land</a></li>
        <li><a href="inquire.php" class="active">Inqurees</a></li>
        <li><a href="managepayment.php">Payment</a></li>
    </ul>
    <div class="pageInq">
        <center>
            <h2>View Inquires</h2>
            <img class="message" src="../images/message.gif" alt="">
        </center>
        <table class="users">
            <tr>
                <th>Message ID</th>
                <th>Name</th>
                <th>Phone number</th>
                <th>Address</th>
                <th>Email</th>
                <th>District</th>
                <th>Message</th>
                <th>Status</th>
                <th>Check</th>
                <th></th>
                <th></th>
            </tr>
            <?php
            //read 
            $consql = "SELECT * FROM contact;";
            $exe = mysqli_query($connect, $consql);
            while ($row = mysqli_fetch_assoc($exe)) {
                $c_id = $row['contact_Id'];
                $name = $row['name'];
                $phone = $row['phone'];
                $address = $row['address'];
                $email = $row['email'];
                $district = $row['district'];
                $message = $row['message'];
                $status = $row['status'];
                ?>
                <tr>
                    <td>
                        <?php echo $c_id; ?>
                    </td>
                    <td>
                        <?php echo $name; ?>
                    </td>
                    <td>
                        <?php echo $phone; ?>
                    </td>
                    <td>
                        <?php echo $address; ?>
                    </td>
                    <td>
                        <?php echo $email; ?>
                    </td>
                    <td>
                        <?php echo $district; ?>
                    </td>
                    <td>
                        <?php echo $message; ?>
                    </td>
                    <td>
                        <?php echo $status; ?>
                    </td>
                    <form method="POST">
                        <td><input type="checkbox" name="status" value="checked">
                            <label for="checked">checked</label><br>
                        </td>
                        <td><button class="checkbtn" type="submit" name="check" value="<?php echo $c_id; ?>">Submit</button>
                        </td>
                        </td>
                        <td><button class="deletebtn" type="submit" name="delete"
                                value="<?php echo $c_id; ?>">Delete</button>
                        </td>
                    </form>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</body>

</html>

<?php //close connection
mysqli_close($connect);
?>