<?php
$session = \Config\Services::session();
?>
<!doctype html>
<html>
<head>
    <title><?= esc($title); ?></title>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/cf7656ce30.js" crossorigin="anonymous"></script>
    <script src="script.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB01l78V1Or3129Z97o30Xxx_Pnt-5FIl8&map_ids=Mfd1c0ea27b4e4e02&callback=initMap"></script>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="/assets/css/stylesheet.css" type="text/css" rel="stylesheet">

    <!-- Font awesome link -->
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

</head>
<body>

<!-- <nav class="navbar navbar-dark bg-primary navbar-expand-md navigation-clean-button navbar-fixed-top"> -->
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark h4">
    <div>
        <a href="/" style="float: left"> <?= img("images/logo3.png") ?></a>
        <!--    <div class="container"><a class="navbar-brand" href="#">V.B Fabrications</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>-->
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav mr-auto">
                <li class="nav-item text-white" ><a class="nav-link " href="/">Home</a></li>
                <li class="nav-item text-white" role="presentation"><a class="nav-link" href="/products">Products</a></li>
                <li class="nav-item text-white" role="presentation"><a class="nav-link" href="/about">About us</a></li>
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Partners&nbsp;</a>
                    <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item" role="presentation" href="#">DeLaval</a>
                        <a class="dropdown-item" role="presentation" href="#">Fullwood</a>
                        <a class="dropdown-item" role="presentation" href="#">GEA</a>
                    </div>
                </li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="sub">AI Search</a></li>
            </ul>
            <div style="text-align: right">
                <?php if (!$session->get('loggedIn')): ?>
                    <span class="navbar-text actions"> <a class="login" href="/admin/login">Log In</a></span>
                <?php else: ?>
                    <li class="navbar-text actions "> <a class="login" href="/admin/dashboard">Dashboard&nbsp|</a></li>
                    <span class="navbar-text actions"> <a class="login" href="/admin/logout">&nbsp Log Out</a></span>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>