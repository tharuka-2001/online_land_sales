<?php //connect db
include '../connect.php';
session_start();
?>

<?php
// redirect to edit user page
if (isset($_POST['edit'])) {
    $editId = $_POST['edit'];
    $_SESSION['editId'] = $editId;

    header("Location:adminedituser.php");
}
//logout
if (isset($_POST['logout'])) {
    session_destroy();
    header('Location:../index.php');
}


// delete user
if (isset($_POST['delete'])) {
    $editId = $_POST['delete'];
    $sql = "DELETE FROM user WHERE id = $editId;";
    $res = mysqli_query($connect, $sql);
    header("Location:manageuser.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User management</title>
    <link rel="icon" href="../images/webicon.png">
    <link rel="stylesheet" href="adminstyle/manageuserstyle.css">

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
        <li><a href="manageuser.php" class="active">Users</a></li>
        <li><a href="manageland.php">Land</a></li>
        <li><a href="inquire.php">Inqurees</a></li>
        <li><a href="managepayment.php">Payment</a></li>
    </ul>
    <div class="page">
        <center>
            <h2>Manage Users</h2>
            <img class="hello" src="../images/helloUser.gif" alt="">
        </center>
        <table class="users">
            <tr>
                <th>User ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact No.</th>
                <th>Username</th>
                <th></th>
                <th></th>
            </tr>
            <?php
            $sql = "SELECT * FROM user;";
            $result = mysqli_query($connect, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $name = $row['name'];
                $email = $row['email'];
                $phone = $row['phone'];
                $username = $row['username'];
                ?>
                <tr>
                    <td>
                        <?php echo $id; ?>
                    </td>
                    <td>
                        <?php echo $name; ?>
                    </td>
                    <td>
                        <?php echo $email; ?>
                    </td>
                    <td>
                        <?php echo $phone; ?>
                    </td>
                    <td>
                        <?php echo $username; ?>
                    </td>
                    <form method="POST">
                        <td><button class="editbtn" type="submit" name="edit" value=" <?php echo $id; ?>">Edit</button></td>
                        <td><button class="deletebtn" type="submit" name="delete" value="<?php echo $id; ?>">Delete</button>
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