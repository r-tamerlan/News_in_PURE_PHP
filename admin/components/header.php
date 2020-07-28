<?php session_start();

if (!isset($_SESSION["email"]) ):
    header("Location: http://localhost/x-Blog/login/index.php");
    return;
endif;

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>ShiftLab Dashboard </title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico"/>
    <link href="assets/css/loader.css" rel="stylesheet" type="text/css"/>
    <script src="assets/js/loader.js"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="assets/css/dashboard/dash_1.css" rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <!-- BEGIN PAGE LEVEL 2 PLUGINS/CUSTOM STYLES -->
    <link href="plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="assets/css/dashboard/dash_1.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="plugins/editors/quill/quill.snow.css">
    <link rel="stylesheet" type="text/css" href="assets/css/forms/switches.css">
    <!-- END PAGE LEVEL 2 PLUGINS/CUSTOM STYLES -->
    <!-- BEGIN PAGE LEVEL 3 PLUGINS/CUSTOM STYLES -->
    <link href="plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
    <link href="assets/css/dashboard/dash_1.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="plugins/editors/quill/quill.snow.css">
    <link rel="stylesheet" type="text/css" href="assets/css/forms/switches.css">
    <!-- END PAGE LEVEL 3 PLUGINS/CUSTOM STYLES -->
    <!-- BEGIN PAGE LEVEL 3 CUSTOM STYLES -->
    <link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="assets/css/forms/theme-checkbox-radio.css">
    <link href="assets/css/tables/table-basic.css" rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL 3 CUSTOM STYLES -->

</head>

<body>
<!-- BEGIN LOADER -->
<div id="load_screen">
    <div class="loader">
        <div class="loader-content">
            <div class="spinner-grow align-self-center"></div>
        </div>
    </div>
</div>
<!--  END LOADER -->

<!--  BEGIN NAVBAR  -->
<div class="header-container fixed-top">
    <header class="header navbar navbar-expand-sm">

        <ul class="navbar-item theme-brand flex-row  text-center">
            <li class="nav-item theme-logo">
                <a href="#">
                    <img src="assets/img/logoadmin.png" class="navbar-logo" alt="logo">
                </a>
            </li>
            <li class="nav-item theme-text">
                <a href="#"  class="nav-link"> ShiftLab </a>
            </li>
        </ul>

        <ul class="navbar-item flex-row ml-md-auto">
            <li class="nav-item dropdown user-profile-dropdown">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <img src="assets/img/f.jpg" alt="avatar">
                </a>
            </li>
        </ul>
    </header>
</div>
<!--  END NAVBAR  -->

<!--  BEGIN NAVBAR  -->
<div class="sub-header-container">
    <header class="header navbar navbar-expand-sm">
        <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 class="feather feather-menu">
                <line x1="3" y1="12" x2="21" y2="12"></line>
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>
        </a>

        <ul class="navbar-nav flex-row">
            <li>
                <div class="page-header">

                    <nav class="breadcrumb-one" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><span>Statistics</span></li>
                        </ol>
                    </nav>

                </div>
            </li>
        </ul>
        <ul class="navbar-nav flex-row ml-auto ">
            <li class="nav-item more-dropdown">
                <div class="dropdown  custom-dropdown-icon">
                    <a href="http://localhost/x-Blog/login/index.php" class="btn btn-info">Hesabdan çıx</a>
                    <a href="http://localhost/x-Blog/login/index.php?get=delete" class="btn btn-secondary">Hesabı bağla</a>
                </div>
            </li>
        </ul>
    </header>
</div>
<!--  END NAVBAR  -->

<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">

    <div class="overlay"></div>
    <div class="search-overlay"></div>

    <!--  BEGIN SIDEBAR  -->
    <div class="sidebar-wrapper sidebar-theme">

        <nav id="sidebar">
            <div class="shadow-bottom"></div>
            <ul class="list-unstyled menu-categories" id="accordionExample">

                <li class="menu">
                    <a href="index.php" aria-expanded="false" class="dropdown-toggle  btn btn-light">
                        <div class="">
                            <img src="plugins/icons/das.svg" width="24" height="24">
                            <span>Dashboard</span>
                        </div>
                    </a>
                </li>

                <li class="menu">
                    <a href="category.php?page=list" aria-expanded="false" class="dropdown-toggle btn btn-light">
                        <div class="">
                            <img src="plugins/icons/layers.svg" width="24" height="24">
                            <span>Categories</span>
                        </div>
                    </a>
                </li>

                <li class="menu">
                    <a href="post.php?page=list" aria-expanded="false" class="dropdown-toggle btn btn-light">
                        <div class="">
                            <img src="plugins/icons/file-text.svg" width="24" height="24">
                            <span>Posts</span>
                        </div>
                    </a>
                </li>

            </ul>
        </nav>

    </div>
    <!--  END SIDEBAR  -->

    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">