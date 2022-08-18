<!DOCTYPE html>
<html>
<?php
session_start();
require 'connection.php';
require 'navbar.php';
$conn = Connect();
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Athiba Car Rentals</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/user.css">
    <link rel="stylesheet" href="assets/w3css/w3.css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700,400italic,700italic" rel="stylesheet"
          type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">





<div class="bgimg-1">
    <header class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h1 class="brand-heading" style="color: black"><strong>Athiba Car Rentals <h2>Make Trips
                                    Better</h2></strong></h1>
                        <p class="intro-text">
                        <h3>Online Car Rental Service</h3>
                        </p>
                        <a href="#sec2" class="btn btn-circle page-scroll blink">
                            <i class="fa fa-angle-double-down animated"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>
<<<<<<< HEAD

<?php
if (isset($_SESSION['login_customer'])) {?>

<div id="sec2" style="color: #777;background-color:white;text-align:center;padding:50px 80px;text-align: justify;">
    <h3 style="text-align:center;">Available Cars</h3>
    <br>
    <section class="menu-content">
        <?php
        $sql1 = "SELECT * FROM cars";
        $result1 = mysqli_query($conn,$sql1);
        $carlist = mysqli_num_rows($result1);

        if (mysqli_num_rows($carlist) > 0) {
            for($i = 0; $i < mysqli_num_rows($carlist); $i++) {
                $row = mysqli_fetch_array($carlist);
                ?>
                <a href="booking.php?id=<?php echo $row['$car_id']?>&admin=atheeq">
                    <div class="sub-menu">
                        <img class="card-img-top" src="<?php echo $row['$car_img']; ?>" alt="Card image cap">
                        <h5><b> <?php echo $row['$car_name']; ?> </b></h5>
                        <h5><b> <?php echo $row['$car_price'] ; ?>  </b></h5>
                    </div>
                </a>
            <?php }}
        else {
            ?>
            <h1> No cars available :( </h1>
=======

<?php
if (isset($_SESSION['login_customer'])) { ?>

    <div id="sec2" style="color: #777;background-color:white;text-align:center;padding:50px 80px;text-align: justify;">
        <h3 style="text-align:center;">Available Cars</h3>
        <br>
        <section class="menu-content">
>>>>>>> origin/main
            <?php
            $query = "SELECT * FROM cars";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
              foreach ($result as $item) {
                             $car_id = $item['car_id'];
                             $car_name = $item["car_name"];
                             $car_img = $item ["car_img"];
                             $car_price = $item["ac_price"];
                    ?>
                    <a href="booking.php?id=<?php echo($car_id) ?>&admin=atheeq">
                        <div class="sub-menu">
                            <img class="card-img-top" src="<?php echo $car_img; ?>" alt="Card image cap">
                            <h5><b> <?php echo $car_name; ?> </b></h5>
                            <h5><b> <?php echo $car_price; ?>  </b></h5>
                        </div>
                    </a>
                <?php }
            } else {
                ?>
                <h1> No cars available :( </h1>
                <?php
            }
            ?>
        </section>

<<<<<<< HEAD
</div>
=======
    </div>
>>>>>>> origin/main
<?php } ?>

<div class="bgimg-2">
    <div class="caption">
        <span class="border" style="background-color:transparent;font-size:25px;color: #f7f7f7;"></span>
    </div>
</div>


<!-- Container (Contact Section) -->
<!-- -->
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

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCuoe93lQkgRaC7FB8fMOr_g1dmMRwKng&callback=myMap"
        type="text/javascript"></script>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<!-- Plugin JavaScript -->
<script src="assets/js/jquery.easing.min.js"></script>
<!-- Custom Theme JavaScript -->
<script src="assets/js/theme.js"></script>
</body>

</html>