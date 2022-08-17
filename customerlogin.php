<?php
include('login_customer.php'); // Includes Login Script
require 'navbar.php';

if(isset($_SESSION['login_customer'])){
    header("location: index.php"); //Redirecting
}
?>

<!DOCTYPE html>
<html>

<head>
    <title> Customer Login | Car Rental </title>
</head>
<link rel="shortcut icon" type="image/png" href="assets/img/P.png.png">
<link rel="stylesheet" type="text/css" href="assets/css/customerlogin.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
<link rel="stylesheet" href="assets/w3css/w3.css">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700,400italic,700italic" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

<body background="assets/img/blank.png">

<div class="container">
    <div class="jumbotron">
        <h2 class="text-center">Customer Panel </span>
        </h2>

    </div>
</div>

<div class="container" style="margin-top: -2%; margin-bottom: 2%;">
    <div class="col-md-5 col-md-offset-4">
        <label style="margin-left: 5px;color: red;"><span> <?php echo $error;  ?> </span></label>
        <div class="panel panel-primary">
            <div class="panel-heading"> Login </div>
            <div class="panel-body">

                <form action="" method="POST">

                    <div class="row">
                        <div class="form-group col-xs-12">
                            <label for="customer_username"><span class="text-danger" style="margin-right: 5px;">*</span> Username: </label>
                            <div class="input-group">
                                <input class="form-control" id="customer_username" type="text" name="customer_username" placeholder="Username" required="" autofocus="">
                                <span class="input-group-btn">
                <label class="btn btn-primary"><span class="glyphicon glyphicon-user" aria-hidden="true"></label>
            </span>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-xs-12">
                            <label for="customer_password"><span class="text-danger" style="margin-right: 5px;">*</span> Password: </label>
                            <div class="input-group">
                                <input class="form-control" id="customer_password" type="password" name="customer_password" placeholder="Password" required="">
                                <span class="input-group-btn">
                <label class="btn btn-primary"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></label>
                                        </span>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-xs-4">
                            <button class="btn btn-primary" name="submit" type="submit" value=" Login ">Submit</button>

                        </div>

                    </div>
                    <label style="margin-left: 5px;">or</label> <br>
                    <label style="margin-left: 5px;"><a href="customersignup.php">Create a new account.</a></label>
                </form>
            </div>
        </div>
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