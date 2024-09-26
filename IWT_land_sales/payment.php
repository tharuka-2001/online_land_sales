<?php
session_start();
?>
<?php
include 'connect.php';
?>

<?php
$uId = $_SESSION['id'];
$addlandquery = $_SESSION['addland'];

if (isset($_POST['pay'])) {
    $ownername = $_POST['ownername'];
    $cvv = $_POST['cvv'];
    $cnumber = $_POST['cnumber'];
    $month = $_POST['months'];
    $year = $_POST['years'];
    $method = $_POST['method'];
    $amount = $_POST['amount'];

    $exp = $year . "/" . $month;

    $addpayment = "INSERT INTO payment(hoderName,cNumber,cvv,exp,method,amount,UserId) VALUES('$ownername','$cnumber','$cvv','$exp','$method','$amount',$uId);";
    $runpayment = mysqli_query($connect, $addpayment);
    //add land to DB
    $runland = mysqli_query($connect, $addlandquery);

    header('Location:lands.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Payment Form</title>
    <link rel="stylesheet" href="styles/payment.css">
</head>

<body>
    <form action="" method="POST">
        <div class="container">
            <h1>Confirm Your Payment</h1>
            <div class="first-row">
                <div class="owner">
                    <h3>Owner</h3>
                    <div class="input-field">
                        <input type="text" name="ownername">
                    </div>
                </div>
                <div class="cvv">
                    <h3>CVV</h3>
                    <div class="input-field">
                        <input type="password" name="cvv">
                    </div>
                </div>
            </div>
            <div class="second-row">
                <div class="card-number">
                    <h3>Card Number</h3>
                    <div class="input-field">
                        <input type="text" name="cnumber">
                    </div>
                </div>
            </div>
            <div class="third-row">
                <h3>Expire Date</h3>
                <div class="selection">
                    <div class="date">
                        <select name="months" id="months">
                            <option value="Jan">Jan</option>
                            <option value="Feb">Feb</option>
                            <option value="Mar">Mar</option>
                            <option value="Apr">Apr</option>
                            <option value="May">May</option>
                            <option value="Jun">Jun</option>
                            <option value="Jul">Jul</option>
                            <option value="Aug">Aug</option>
                            <option value="Sep">Sep</option>
                            <option value="Oct">Oct</option>
                            <option value="Nov">Nov</option>
                            <option value="Dec">Dec</option>
                        </select>
                        <select name="years" id="years">
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                            <option value="2027">2027</option>
                            <option value="2028">2028</option>
                        </select>

                    </div>
                    <div class="cards">
                        <img src="images/mc.png" alt="">
                        <img src="images/vi.png" alt="">
                        <img src="images/pp.png" alt="">
                    </div>
                </div>
                <div class="methods">
                    <h3>Select card option</h3>
                    <div class="bank">
                        <label for="">PayPal</label>
                        <input type="radio" name="method" id="" value="Paypal">
                    </div>
                    <div class="bank">
                        <label for="">VISA</label>
                        <input type="radio" name="method" id="" value="VISA">
                    </div>
                    <div class="bank">
                        <label for="">Master</label>
                        <input type="radio" name="method" id="" value="Master" checked>
                    </div>
                </div>
            </div>
            <div class="fourth-row">
                <div class="Amount">
                    <h3>Days : </h3>
                    <div class="input-field">
                        <input type="number" name="amount" id="day">
                    </div>
                    <button id="cal" type="button" onclick="calAmmount()">Calculate</button>
                </div>
            </div>
            <div class="fifth-row">
                <div class="Amoun">
                    <h3>Amount : </h3>
                    <h4>100.00 rupees for one day</h4>
                    <div class="input-field">
                        <input type="number" name="amount" id="ammount" step="100" min="100" diabled required>
                    </div>
                </div>
            </div>

            <button type="submit" name="pay" value="submit">Confirm</button>
    </form>
    </div>
    <script src="script/script.js"></script>
</body>

</html>

<?php //close connection
mysqli_close($connect);
?>