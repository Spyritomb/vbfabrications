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
<!--<<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark h4">-->
<!--    <div class="row">-->
<!--        <div class="col-3"><a href="/" style="float: left"> --><?//= img("images/logo3.png") ?><!--</a></div>-->
<!--          <div class="container"><a class="navbar-brand" href="#">V.B Fabrications</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1">-->
<!--        <span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>-->
<!--        <div class="collapse navbar-collapse col-6 text-center" id="navcol-1">-->
<!--            <ul class="nav navbar-nav mr-auto">-->
<!--                <li class="nav-item text-white" ><a class="nav-link " href="/">Home</a></li>-->
<!--                <li class="nav-item text-white" role="presentation"><a class="nav-link" href="/products">Products</a></li>-->
<!--                <li class="nav-item text-white" role="presentation"><a class="nav-link" href="/about">About us</a></li>-->
<!--                <li class="nav-item dropdown">-->
<!--                    <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Partners&nbsp;</a>-->
<!--                    <div class="dropdown-menu" role="menu">-->
<!--                        <a class="dropdown-item" role="presentation" href="#">DeLaval</a>-->
<!--                        <a class="dropdown-item" role="presentation" href="#">Fullwood</a>-->
<!--                        <a class="dropdown-item" role="presentation" href="#">GEA</a>-->
<!--                    </div>-->
<!--                </li>-->
<!--                <li class="nav-item" role="presentation"><a class="nav-link" href="sub">AI Search</a></li>-->
<!--            </ul>-->
<!--        </div>-->
<!--            <div class="col-3 text-right">-->
<!--                --><?php //if (!$session->get('loggedIn')): ?>
<!--                    <span class="navbar-text actions"> <a class="login" href="/admin/login">Log In</a></span>-->
<!--                --><?php //else: ?>
<!--                    <li class="navbar-text actions "> <a class="login" href="/admin/dashboard">Dashboard&nbsp|</a></li>-->
<!--                    <span class="navbar-text actions"> <a class="login" href="/admin/logout">&nbsp Log Out</a></span>-->
<!--                --><?php //endif; ?>
<!--        </div>-->
<!--    </div>-->
<!--</nav>-->

<nav class="navbar navbar-expand-md navbar-dark bg-dark h4">
    <div class="d-flex order-0">
        <a class="navbar-brand mr-1" href="/"><?= img("images/logo3.png") ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="navbar-collapse collapse justify-content-center order-1" id="collapsingNavbar">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home <span class="sr-only">Home&nbsp;&nbsp;</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/products">Products&nbsp;&nbsp;</a>
            </li>
            <li class="nav-item dropdown active">
                <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">Partners&nbsp;&nbsp;</a>
                <div class="dropdown-menu" role="menu">
                    <a class="dropdown-item" role="presentation" href="#">DeLaval</a>
                    <a class="dropdown-item" role="presentation" href="#">Fullwood</a>
                    <a class="dropdown-item" role="presentation" href="#">GEA</a>
                </div>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/sub">AI&nbsp;Search</a>
            </li>
        </ul>
    </div>
    <div>

    </div>
    <div class="justify-content-center order-2 mr-1 mr-lg-4">
        <ul class="navbar-nav">
            <?php if (!$session->get('loggedIn')): ?>
            <li class="nav-item ">
                <span class="navbar-item mt-1 w-50 text-right order-1 order-md-last whitelink"><a class="whitelink" href="/admin/login">Log In</a></span>
            </li>
            <?php else: ?>
            <li class="nav-item ">
                <span class="nav-item mt w-100 text-right order-1 order-md-last"><a class="whitelink" href="/admin/dashboard">Dashboard&nbsp;</a></span>
            </li>
            |
            <li class="nav-item ">
                <span class="navbar-item  mt-1 w-50 text-right order-1 order-md-last"><a class="whitelink" href="/admin/logout">&nbsp;Log out</a></span>
            </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>