<?php

require_once ("connection/connection.php");
require_once ("manage/category.php");
require_once ("manage/post.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="Rüstəmov Tamerlan">
    <title>ShiftLab </title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="images/favicon.png">

    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Lato:400,700|Adamina' type='text/css' media='all' />

    <link rel="stylesheet" type="text/css" href="css/libs/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/libs/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/libs/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/libs/animate.css">
    <link rel="stylesheet" type="text/css" href="css/libs/magnific-popup.css">
    <link rel="stylesheet" href="css/libs/icomoon.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>

<!-- Header -->
<header id="header" class="header header-v3" >

    <div class="header-top" >
        <div class="container">
            <div class="header-top-inner">
                <!-- Mobile -->
                <div class="menu-mobile">
                    <span class="item item-1"></span>
                    <span class="item item-2"></span>
                    <span class="item item-3"></span>
                </div>
                <!-- End Mobile -->

                <!-- Navigation -->
                <nav class="navigation">
                    <ul class="menu-list">
                        <li class="menu-item menu-item-has-children">
                            <a href="index.php">Home</a>
                        </li>
                        <li class="menu-item">
                            <a href="#">Categories</a>
                            <ul class="sub-menu">
                                <?php callcategores($db); ?>
                            </ul>
                        </li>
                        <li class="menu-item">
                            <a href="about.php">About</a>
                        </li>
                        <li class="menu-item">
                            <a href="contact.php">Contact</a>
                        </li>
                    </ul>
                </nav>
                <!-- End Navigation -->

                <!-- Header Right -->
                <div class="header-right pull-right">
                    <div class="socials">
                        <a href="#" title="Facebook">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="#" title="Google Plus">
                            <i class="fa fa-google-plus"></i>
                        </a>
                        <a href="#" title="Instagram">
                            <i class="fa fa-instagram"></i>
                        </a>
                    </div>
                    <!-- Search... -->
                    <div class="search">
                        <i class="fa fa-search"></i>
                        <div class="box-search">
                            <form class="search-form" action="search.php" method="post">
                                <input type="search" class="search-field" placeholder="Search ..."  title="Search" name="Fsing">
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End Header Right -->

            </div>
        </div>
    </div>
</header>
<!-- End Header -->
