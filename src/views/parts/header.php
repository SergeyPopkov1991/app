<?php

use app\View;

/** @var $this View */
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>App</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="<?php echo  PATH . '/assets/'; ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo  PATH . '/assets/'; ?>css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo  PATH . '/assets/'; ?>css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo  PATH . '/assets/'; ?>css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo  PATH . '/assets/'; ?>css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo  PATH . '/assets/'; ?>css/nice-select.css">
    <link rel="stylesheet" href="<?php echo  PATH . '/assets/'; ?>css/flaticon.css">
    <link rel="stylesheet" href="<?php echo  PATH . '/assets/'; ?>css/gijgo.css">
    <link rel="stylesheet" href="<?php echo  PATH . '/assets/'; ?>css/animate.css">
    <link rel="stylesheet" href="<?php echo  PATH . '/assets/'; ?>css/slicknav.css">
    <link rel="stylesheet" href="<?php echo  PATH . '/assets/'; ?>css/style.css">
    <!-- <link rel="stylesheet" href="<?php echo  PATH . '/assets/'; ?>css/responsive.css"> -->
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12" style="padding: 20px 0;">
                            <div class="header_wrap d-flex justify-content-between align-items-center">
                                <div class="header_left">
                                    <div class="logo">
                                        <a href="/app">
                                            <img src="<?php echo  PATH . 'assets/'; ?>img/logo.png" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="header_right d-flex align-items-center">
                                    <div class="main-menu  d-none d-lg-block">
                                    </div>
                                    <div class="Appointment">
                                        <div class="book_btn d-none d-lg-block">
                                            <a href="/app/admin">Admin Login</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->
