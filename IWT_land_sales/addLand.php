<?php //connect db
include 'connect.php';
?>

<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Land</title>
    <link rel="icon" href="images/webicon.png">
    <link rel="stylesheet" href="styles/addlandstyle.css">
</head>

<body>
    <button class="backbtn"><a href="lands.php">Go back</a></button>
    <center>
        <h1>Enter land details</h1>
    </center>
    <div>
        <form method="POST" action="" enctype="multipart/form-data">
            <label for="title">Title : </label>
            <input type="text" id="title" name="title" placeholder="Enter land title" required>

            <label for="description">Description : </label>
            <input type="text" id="description" name="description" placeholder="Enter land description" required>

            <label for="city">City</label>
            <select id="city" name="city">
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
            <br>

            <label for="address">Address : </label>
            <input type="text" id="address" name="address" placeholder="Land Address.." required>

            <label for="price">Size (perch) : </label>
            <input type="number" id="size" name="size" placeholder="Size of Land..." required>

            <label for="price">Price for one perch : </label>
            <input type="number" id="price" name="price" placeholder="Land unit area price.." required>

            <label for="image">Land Image : </label>
            <input type="file" id="image" name="image" accept=".jpg , .jpeg , .png" required>

            <input type="submit" name="submit" value="Add">
        </form>
    </div>

</body>

</html>

<?php
if (isset($_POST['submit'])) {
    //Get seller details
    $seller_ID = $_SESSION['id'];
    $sellerQuery = "SELECT * FROM user WHERE id = '$seller_ID';";
    $sellerResult = mysqli_query($connect, $sellerQuery);
    $sRow = mysqli_fetch_assoc($sellerResult);
    //assign seller details
    $sContact = $sRow['phone'];
    $sName = $sRow['name'];

    //assing data from form
    $title = $_POST['title'];
    $description = $_POST['description'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $size = $_POST['size'];
    $price = $_POST['price'];

    //image insertion process
    $fileName = $_FILES['image']['name'];
    $tmpName = $_FILES['image']['tmp_name'];

    $imageExtention = explode('.', $fileName);
    $imageExtention = strtolower(end($imageExtention));

    $newImageName = uniqid();
    $newImageName = $newImageName . '.' . $imageExtention;

    move_uploaded_file($tmpName, 'lands/' . $newImageName);

    $landSql = "INSERT INTO lands(title, description, city, address, size, price, fileName, s_Id) VALUES('$title', '$description', '$city', '$address' , $size , $price, '$newImageName', $seller_ID);";
    //$landResult = mysqli_query($connect, $landSql);
    $_SESSION['addland'] = $landSql;

    header('Location:payment.php');
}

?>
<?php //close connection
mysqli_close($connect);
?>