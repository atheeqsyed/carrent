<!DOCTYPE html>
<html>
<?php
session_start();
require 'connection.php';
require 'navbar.php';
$conn = Connect();
?>
<head>
    <link rel="shortcut icon" type="image/png" href="assets/img/P.png.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/w3css/w3.css">
    <link rel="stylesheet" type="text/css" href="assets/css/customerlogin.css">
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/clientpage.css" />
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

<?php $login_customer = $_SESSION['login_customer'];

$sql1 = "SELECT * FROM rentedcars rc, cars c
    WHERE rc.customer_username='$login_customer' AND c.car_id=rc.car_id AND rc.return_status='R'";
$result1 = $conn->query($sql1);

if (mysqli_num_rows($result1) > 0) {
    ?>
    <div class="container">
        <div class="jumbotron">
            <h2 class="text-center">Your Bookings</h2>
            <p class="text-center"> Hope you enjoyed our service </p>
        </div>
    </div>

    <div class="table-responsive" style="padding-left: 100px; padding-right: 100px;" >
        <table class="table table-striped">
            <thead class="thead-dark">
            <tr>
                <th width="15%">Car</th>
                <th width="15%">Start Date</th>
                <th width="15%">End Date</th>
                <th width="10%">Fare</th>
                <th width="15%">Distance (kms)</th>
                <th width="15%">Number of Days</th>
                <th width="15%">Total Amount</th>
            </tr>
            </thead>
            <?php
            while($row = mysqli_fetch_assoc($result1)) {
                ?>
                <tr>
                    <td><?php echo $row["car_name"]; ?></td>
                    <td><?php echo $row["rent_start_date"] ?></td>
                    <td><?php echo $row["rent_end_date"]; ?></td>
                    <td>Rs.  <?php
                        if($row["charge_type"] == "days"){
                            echo ($row["fare"] . "/day");
                        } else {
                            echo ($row["fare"] . "/km");
                        }
                        ?></td>
                    <td><?php  if($row["charge_type"] == "days"){
                            echo ("-");
                        } else {
                            echo ($row["distance"]);
                        } ?></td>
                    <td><?php echo $row["no_of_days"]; ?> </td>
                    <td>Rs.  <?php echo $row["total_amount"]; ?></td>
                </tr>
            <?php        } ?>
        </table>
    </div>
<?php } else {
    ?>
    <div class="container">
        <div class="jumbotron">
            <h1 class="text-center">You have not rented any cars till now!</h1>
            <p class="text-center"> Please rent cars in order to view your data here. </p>
        </div>
    </div>

    <?php
} ?>

</body>
<footer class="site-footer">
    <div class="container">
        <hr>
        <div class="row">
            <div class="col-sm-6">
                <h5>© <?php echo date("Y"); ?> Car Rentals</h5>
            </div>
        </div>
    </div>
</footer>
</html>