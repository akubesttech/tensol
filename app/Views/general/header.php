<?php
/**
 * Created by PhpStorm.
 * User: EDIRIN PC
 * Date: 8/3/2021
 * Time: 12:23 AM
 */

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Aler Template">
    <meta name="author" content="Akubest Technologies">
    <meta name="keywords" content="Aler, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tenament Solution :: <?= $title; ?></title>
<!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800,900&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="<?php echo BASEURL ; ?>assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo BASEURL ; ?>assets/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo BASEURL ; ?>assets/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?php echo BASEURL ; ?>assets/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo BASEURL ; ?>assets/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="<?php echo BASEURL ; ?>assets/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo BASEURL ; ?>assets/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="<?php echo BASEURL ; ?>assets/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo BASEURL ; ?>assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="<?php echo BASEURL ; ?>assets/css/richtext.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo BASEURL ; ?>assets/css/image-uploader.min.css" type="text/css">
    <style>.thumb{
            margin: 24px 5px 20px 0;
            float: left;
            width: 30%;
        }
        .contimg {
            position: relative;
            width: 50%;
            max-width: 300px;
        }
        .overlaym {
            position: absolute;
            bottom: 0;
            background: rgb(0, 0, 0);
            background: rgba(0, 0, 0, 0.5); /* Black see-through */
            color: #f1f1f1;
            width: 10%;
            transition: .5s ease;
            opacity:0;
            color: white;
            font-size: 20px;
            padding:  2px;
            text-align: center;
            margin: 1px 5px -95px -65px;
        }
        .contimg:hover .overlaym {
            opacity: 1;
        }
        #uploadPreview > .column {
            padding: 0 1px;
            width: 100%;
        }
        .error {
            color: #dc3545;
        }
        #uploadPreview:after {
            content: "";
            display: table;
            clear: both;
        }

    </style>

</head>
<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Offcanvas Menu Wrapper Begin -->
<div class="offcanvas-menu-overlay"></div>
<div class="offcanvas-menu-wrapper">
    <div class="canvas-close">
        <span class="icon_close"></span>
    </div>
    <div class="logo">
        <a href="<?php echo BASEURL; ?>">
            <img src="<?php echo BASEURL; ?>assets/img/logo.png" alt="">
        </a>
    </div>
    <div id="mobile-menu-wrap"></div>
    <div class="om-widget">
        <ul>
            <li><i class="icon_mail_alt"></i> Aler.support@gmail.com </li>
            <li><i class="fa fa-mobile-phone"></i> +2348034360265 <span>+234808934567</span></li>
        </ul>
        <a href="<?php echo base_url('admin')?>" class="hw-btn">Post property</a>
    </div>
    <div class="om-social">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-youtube-play"></i></a>
        <a href="#"><i class="fa fa-instagram"></i></a>
        <a href="#"><i class="fa fa-pinterest-p"></i></a>
    </div>
</div>
<!-- Offcanvas Menu Wrapper End -->

<!-- Header Section Begin -->
<header class="header-section">
    <div class="hs-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="logo">
                        <a href="<?php echo BASEURL; ?>"><img src="<?php echo BASEURL; ?>assets/img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="ht-widget">
                        <ul>
                            <li><i class="icon_mail_alt"></i>team.support@rentflexy.com</li>
                            <li><i class="fa fa-mobile-phone"></i> +2348034360265 <span>+234808934567</span></li>
                        </ul>
                        <a href="<?php echo base_url('Property')?>" class="hw-btn">Post property</a>
                    </div>
                </div>
            </div>
            <div class="canvas-open">
                <span class="icon_menu"></span>
            </div>
        </div>
    </div>
    <div class="hs-nav">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <nav class="nav-menu">
                        <ul>
                            <li class="<?=menu_anchor(base_url()."/", "index")?>"><a href="/">Home</a></li>
                            <li><a href="#">Properties</a>
                                <ul class="dropdown">
                                    <li><a href="#">Sales</a></li>
                                    <li><a href="#">Rent</a></li>
                                    <li><a href="#">Non Building</a></li>

                                </ul>
                            </li>
                            <li class="<?=menu_anchor(base_url()."/Agents", "Agents")?>"><a href="<?php echo base_url('Agents')?>">Agents</a></li>
                            <li><a href="#">Enquiry</a></li>
                            <li class="<?=menu_anchor(base_url()."/welcome/about", "About")?>"><a href="<?php echo BASEURL .'welcome/about'?>">About</a></li>
                            <li><a href="#">Blog</a></li>
                            <li class="<?=menu_anchor(base_url()."/contact", "Contact")?>"><a href="<?php echo BASEURL .'contact'?>">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="hn-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-youtube-play"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-pinterest-p"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header End -->