<?php //connect db
include '../connect.php';
session_start();
?>

<?php

// delete payment
if (isset($_POST['delete'])) {
    $pId = $_POST['delete'];
    $sql = "DELETE FROM payment WHERE id = $pId;";
    $res = mysqli_query($connect, $sql);
    header("Location:manageuser.php");
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
    <title>Payment management</title>
    <link rel="icon" href="../images/webicon.png">
    <link rel="stylesheet" href="adminstyle/managepaymentstyle.css">

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
        <li><a href="manageland.php">Lands</a></li>
        <li><a href="inquire.php">Inqurees</a></li>
        <li><a href="managepayment.php" class="active">Payment</a></li>
    </ul>
    <div class="page">
        <center>
            <h2>Manage Payments</h2>
            <img class="hello" src="../images/payment.gif" alt="">
        </center>
        <table class="users">
            <tr>
                <th>Paynemt ID</th>
                <th>Card holername</th>
                <th>Card number</th>
                <th>Payment method</th>
                <th>Amount</th>
                <th>User ID</th>
                <th></th>
            </tr>
            <?php
            $sql = "SELECT * FROM payment;";
            $result = mysqli_query($connect, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $pid = $row['payment_Id'];
                $holdername = $row['hoderName'];
                $cnumber = $row['cNumber'];
                $method = $row['method'];
                $amount = $row['amount'];
                $userid = $row['UserId'];
                ?>
                <tr>
                    <td>
                        <?php echo $pid; ?>
                    </td>
                    <td>
                        <?php echo $holdername; ?>
                    </td>
                    <td>
                        <?php echo $cnumber; ?>
                    </td>
                    <td>
                        <?php echo $method; ?>
                    </td>
                    <td>
                        <?php echo $amount . ".00 rupees"; ?>
                    </td>
                    <td>
                        <?php echo $userid; ?>
                    </td>
                    <form method="POST">
                        <td><button class="deletebtn" type="submit" name="delete"
                                value="<?php echo $pid; ?>">Delete</button>
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