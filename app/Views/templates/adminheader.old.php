<!doctype html>
<html>
<head>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
            crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/cf7656ce30.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Style sheet link -->
    <link href="/assets/css/stylesheet.css" type="text/css" rel="stylesheet">
    <!-- Font awesome link -->
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

<!--    <style>-->
<!--        body {-->
<!--            font-family: "Lato", sans-serif;-->
<!--        }-->
<!---->
<!--        .sidenav {-->
<!--            height: 50%;-->
<!--            width: 160px;-->
<!--            position: fixed;-->
<!--            z-index: 1;-->
<!--            top: 0;-->
<!--            left: 0;-->
<!--            background-color: white;-->
<!--            overflow-x: hidden;-->
<!--            margin-top: 10%;-->
<!--        }-->
<!---->
<!--        .sidenav a {-->
<!--            padding: 6px 8px 6px 16px;-->
<!--            text-decoration: none;-->
<!--            font-size: 25px;-->
<!--            color: #818181;-->
<!--            display: block;-->
<!--        }-->
<!---->
<!--        .sidenav a:hover {-->
<!--            color: #f1f1f1;-->
<!--        }-->
<!---->
<!--        .main {-->
<!--            margin-left: 160px; /* Same as the width of the sidenav */-->
<!--            font-size: 28px; /* Increased text to enable scrolling */-->
<!--            padding: 0px 10px;-->
<!--        }-->
<!---->
<!--        @media screen and (max-height: 450px) {-->
<!--            .sidenav {padding-top: 15px;}-->
<!--            .sidenav a {font-size: 18px;}-->
<!--        }-->
<!--    </style>-->

</head>
<body>


<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container">

        <a>
            <?= img("images/logo3.png") ?>
        </a>
        <!--    <div class="container"><a class="navbar-brand" href="#">V.B Fabrications</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>-->
        <div class="collapse navbar-collapse"
             id="navcol-1">
            <ul class="nav navbar-nav mr-auto">
                <li class="nav-item" role="presentation"><a class="nav-link active" href="../home">Home</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="../product">Products</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" href=.."about">About us</a></li>
                <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown"
                                                 aria-expanded="false" href="#">Partners&nbsp;</a>
                    <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation"
                                                              href="#">DeLaval</a><a class="dropdown-item"
                                                                                     role="presentation" href="#">Fullwood</a><a
                                class="dropdown-item" role="presentation" href="#">GEA</a></div>
                </li>
                <li class="nav-item" role="presentation"><a class="nav-link" href="../sub">AI Search</a></li>
            </ul>
            <span class="navbar-text actions"> <a class="login" href="../home">Log Out</a></span>
        </div>
    </div>
    </div>
</nav>



