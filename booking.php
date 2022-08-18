<!DOCTYPE html>
<html>
<?php
require 'navbar.php'; // reference
include('session_customer.php');
if (!isset($_SESSION['login_customer'])) {
    session_destroy();
    header("location: customerlogin.php");
}
?>
<title>Book Car </title>
<head>
    <script type="text/javascript" src="assets/ajs/angular.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="shortcut icon" type="image/png" href="assets/img/p.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/w3css/w3.css">
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/custom.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/clientpage.css"/>
</head>
<body ng-app="">


<div class="container" style="margin-top: 65px;">
    <div class="col-md-7" style="float: none; margin: 0 auto;">
        <div class="form-area">
            <form role="form" action="bookingconfirm.php" method="POST">
                <br style="clear: both">
                <br>

                <?php
                $car_id = $_GET["id"];
                $sql1 = "SELECT * FROM cars WHERE car_id = '$car_id'";
                $result1 = mysqli_query($conn, $sql1);

                if (mysqli_num_rows($result1)) {
                    while ($row1 = mysqli_fetch_assoc($result1)) {
                        $car_name = $row1["car_name"];
                        $car_nameplate = $row1["car_nameplate"];
                        $ac_price = $row1["ac_price"];
                        $non_ac_price = $row1["non_ac_price"];
                        $ac_price_per_day = $row1["ac_price_per_day"];
                        $non_ac_price_per_day = $row1["non_ac_price_per_day"];
                        $car_avl = $row1["car_availability"];
                    }
                }

                ?>
                <h5> Selected Car:&nbsp; <b><?php echo($car_name); ?></b></h5>

<<<<<<< HEAD
                <!-- <div class="form-group"> -->
                <h5> Selected Car:&nbsp;  <b><?php echo($car_name);?></b></h5>
                <h5> Car Availablity :&nbsp; <b><?php echo($car_avl);?></b></h5>
                <h5> Admin Name :&nbsp;  <b><?php echo $_GET['admin'];?></b></h5>
                <!-- </div> -->
=======
                <h5> Car Availablity :&nbsp; <b><?php echo($car_avl); ?></b></h5>

                <h5> Admin Name :&nbsp; <b><?php echo $_GET['admin']; ?></b></h5>

                <h5> Number Plate:&nbsp;<b> <?php echo($car_nameplate); ?></b></h5>
>>>>>>> origin/main

                <?php $today = date("Y-m-d") ?>
                <label><h5>Start Date:</h5></label>
<<<<<<< HEAD
                <input type="date" name="rent_start_date" min="<?php echo(date('Y-m-d', strtotime($today. ' + 3 days')));?>" required="">
                &nbsp;
=======
                <input type="date" name="rent_start_date"
                       min="<?php echo(date('Y-m-d', strtotime($today . ' + 3 days'))); ?>" required="">&nbsp;
>>>>>>> origin/main
                <label><h5>End Date:</h5></label>
                <input type="date" name="rent_end_date" min="<?php echo($today); ?>" required="">

                <h5> Choose your car type: &nbsp;
                    <input onclick="reveal()" type="radio" name="cartype" value="ac" ng-model="myVar"> <b>With AC </b>&nbsp;
                    <input onclick="reveal()" type="radio" name="cartype" value="non_ac" ng-model="myVar"><b>With-Out AC </b>
                    <div ng-switch="myVar">
                        <div ng-switch-default>
                            <h5>Fare: <h5>
                        </div>
                        <div ng-switch-when="ac">
                            <h5>Fare:
                                <b><?php echo("Rs. " . $ac_price . "/km and Rs. " . $ac_price_per_day . "/day"); ?></b>
                                <h5>
                        </div>
                        <div ng-switch-when="non_ac">
                            <h5>Fare:
                                <b><?php echo("Rs. " . $non_ac_price . "/km and Rs. " . $non_ac_price_per_day . "/day"); ?></b>
                                <h5>
                        </div>
                    </div>

                    <h5> Charge type: &nbsp;
                        <input onclick="reveal()" type="radio" name="radio1" value="km"><b> per KM</b> &nbsp;
                        <input onclick="reveal()" type="radio" name="radio1" value="days"><b> per day</b>
                        <br><br>

                        Select a driver: &nbsp;
                        <select name="driver_id_from_dropdown" ng-model="myVar1">
                            <?php
                            $sql2 = "SELECT * FROM driver d WHERE d.driver_availability = 'yes' AND d.client_username IN (SELECT cc.client_username FROM clientcars cc WHERE cc.car_id = '$car_id')";
                            $result2 = mysqli_query($conn, $sql2);
                            if (mysqli_num_rows($result2) > 0) {
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                    $driver_id = $row2["driver_id"];
                                    $driver_name = $row2["driver_name"];
                                    $driver_gender = $row2["driver_gender"];
                                    $driver_phone = $row2["driver_phone"];
                                    $driver_add = $row2["driver_address"];
                                    ?>
                                    <option value="<?php echo($driver_id); ?>">   <?php echo($driver_name); ?> </option>
                                <?php }
                            } else {
                                ?>
                                Sorry! No Drivers are currently available, try again later...
                                <?php
                            }
                            ?>
                        </select>
                        <div ng-switch="myVar1">
                            <?php
                            $sql3 = "SELECT * FROM driver d WHERE d.driver_availability = 'yes' AND d.client_username IN (SELECT cc.client_username FROM clientcars cc WHERE cc.car_id = '$car_id')";
                            $result3 = mysqli_query($conn, $sql3);
                            if (mysqli_num_rows($result3) > 0) {
                                while ($row3 = mysqli_fetch_assoc($result3)) {
                                    $driver_id = $row3["driver_id"];
                                    $driver_name = $row3["driver_name"];
                                    $driver_gender = $row3["driver_gender"];
                                    $driver_phone = $row3["driver_phone"];
                                    $driver_add = $row3["driver_address"];
                                    ?>
                                    <div ng-switch-when="<?php echo($driver_id); ?>">
                                        <h5>Driver Name:&nbsp; <b><?php echo($driver_name); ?></b></h5>
                                        <p>Gender:&nbsp; <b><?php echo($driver_gender); ?></b></p>
                                        <p>Contact:&nbsp; <b><?php echo($driver_phone); ?></b></p>
                                        <p>Address:&nbsp; <b><?php echo($driver_add); ?></b></p>
                                    </div>
                                <?php }
                            } ?>
                        </div>

                        <input type="hidden" name="hidden_carid" value="<?php echo $car_id; ?>">

                        <input type="submit" name="submit" value="Rent Now" class="btn btn-warning pull-right">
            </form>
        </div>
        <div class="col-md-12" style="float: none; margin: 0 auto; text-align: center;">
            <h6><strong>Note:</strong> You will be charged with extra <span class="text-danger">Rs. 500</span> for each
                day after the due date ends.</h6>
        </div>
    </div>
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
