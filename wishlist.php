    <!--========================================================= 
        Item Name: wishlist.php
        Author: Grishma Thakkar
        Version: 1.0
        date:1/5/2022
    ============================================================-->
    <?php
    session_start();

    require '../lib/api.php';
    require '../lib/locale/ja.php';
    require "../lib/pagination.php";
    require 'Api.php';

    $msg = " ";
    $url = $_SERVER['PHP_SELF'] .'?';
    ?>
    <!DOCTYPE html>
    <html lang="ja">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

        <title>サイフル - ケアメンテで確かな仕上がりを約束する安心のフリマサイト</title>

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
        <link rel="stylesheet" href="../assets/css/jquery.accordion.css" />
        <link rel="stylesheet" href="../assets/css/ladies-main.css" />
        <link rel="stylesheet" href="../assets/css/wishlist.css" />
        <link rel="stylesheet" href="../assets/css/paginate.css" />

        <!-- Background css -->
        <link rel="stylesheet" id="bg-switcher-css" href="../assets/css/backgrounds/bg-4.css">
        <script src="//kitchen.juicer.cc/?color=erYShRjbUok=" async></script>
        <script src="//statics.a8.net/a8sales/a8sales.js"></script>
        <script src="//statics.a8.net/a8sales/a8crossDomain.js"></script>

        <style>
        html, body {
            overflow-x: hidden;
        }
        body {
            position: relative
        }

        @media screen and (max-width:2400px) and (min-width:820px) {
            .image {         
                height: 180px !important;         
            }

        }

        @media screen and (max-width:1800px) and (min-width:820px) {
            .image {           
                height: 155px !important;
            }

        }

        @media screen and (max-width:1400px) and (min-width:820px) {
            .image {      
                height: 125px !important;         
            }

        }

        .main-image {
            object-fit: contain;
            height: 100%;
            width: 100%;
            background-color:#DBDEE0;
        }

        .hover-image {
            object-fit: contain;
            height: 100%;
            width: 100%;
            background-color:#DBDEE0;
        }
        </style>
    </head>

    <body class="shop_page">
        <div id="ec-overlay"><span class="loader_img"></span></div>

        <!-- Header Start  -->
        <div id="header"></div>
        <!-- Header End  -->

        <!-- Ec breadcrumb start -->
        <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="row ec_breadcrumb_inner">
                            <div class="col-md-6 col-sm-12">
                                <!-- ec-breadcrumb-list start -->
                                <ul class="ec-breadcrumb-list">
                                    <?php if (isset($_SESSION['Login']) && !empty($_SESSION['Login'])) { ?>
                                    <li class="ec-breadcrumb-item"><a href="user-profile.html">ホーム</a></li>
                                    <?php } else { ?>
                                    <li class="ec-breadcrumb-item"><a href="home.php">ホーム</a></li>
                                    <?php } ?>
                                    <li class="ec-breadcrumb-item active">お気に入り</li>
                                </ul>
                                <!-- ec-breadcrumb-list end -->
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <span>
                                    <a onclick="window.history.go(-1);"> <img
                                            src="../assets/images2/icons/istockphoto-1385686401-170667a-removebg-preview.png"
                                            width="20" height="20" class="mobilebackbtn" /></a>
                                </span>
                                <h2 class="ec-breadcrumb-title">お気に入り</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ec breadcrumb end -->

        <!-- Back Button Link  -->
        <a href="home.php"> </a>
            <?php
        if (!isset($_SESSION['Login']) && empty($_SESSION['Login'])) {
            header('location:login.php');
        }
        else{

            $pagno= $_GET["pg"];

            if($pagno==""){
                $pagno=1;
            }
            $data_array =  array("visitor_no" => $_SESSION['Visitor_no'],"offset"=>$pagno);
            $make_call = callAPI('POST', 'view/fetchwishlist', json_encode($data_array));
            $response = json_decode($make_call, true);
            if (!$response) {
                $msg = "■ エラーが発生しました。";
            } else {
                $details = $response['ENTITY_LIST'];
                $count= $response['COUNT'];
                if(count($details)==0){
                    $det_cont=0;
                    $pageno=0;

                }
                else{
                $det_cont=count($details) + ($pagno - 1) * 20;       
                $pageno=($pagno - 1) * 20 + 1 ;
                }
            }
                    

        }
        ?>
    
        <div class="text-center">
            <b>
                <span id="error1">
                    <?php if ($msg != "") 
                    {
                        echo $msg;
                    } ?>
                </span>
            </b>
        </div>
        <!--Section start -->
        <section class="ec-page-content ec-vendor-uploads ec-user-account section-space-p">
            <div class="container">
                <div class="row mt-2">
                    <section class="section ec-product-tab section-space-p">
                        <div class="container">
                            <!--product image display start-->
                            <div class="row" style="margin-top: -5%;">
                                <!-- Sidebar Area Start -->
                                <div class="ec-shop-leftside ec-vendor-sidebar col-lg-3 col-md-12">
                                    <div class="ec-sidebar-wrap">
                                        <!-- Sidebar Category Block -->
                                        <div id="sidebar_content"></div>
                                    </div>
                                </div>
                                <div class="ec-shop-rightside col-lg-8 col-md-12">
                                    <!-- Compare Content Start -->
                                    <div class="ec-compare-content">
                                        <div class="ec-compare-inner">
                                            <div class="row margin-minus-b-30 ec-wish-rightside">
                                                <?php
                                                foreach ($details as $value) {
                                                ?>
                                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 mb-6 col-5 pro-gl-content">
                                                    <div class="ec-product-inner">
                                                        <div class="ec-pro-image-outer">
                                                            <div class="ec-pro-image img-style">
                                                                <a href="top1.php?regno=<?php echo $value['registerno']; ?>&cond=normal"
                                                                    class="image">
                                                                    <img class="main-image" src="https://kh01.kyoto-happy.co.jp/netkuroku/saiful/<?php if($value['coverimage']=="" || $value['coverimage']==0){
                                                                            echo 'no_image.png';
                                                                            } else {echo $value['coverimage'];} ?>"
                                                                        alt="Product" />
                                                                </a>
                                                                <span class="ec-com-remove ec-remove-wish"><a
                                                                        onclick="remove(<?php echo $value['id']; ?>)">×</a></span>
                                                                <div class="ec-pro-actions">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="ec-pro-content">
                                                            <h5 class="ec-pro-title">
                                                                <a><b><?php echo $value['brand2']; ?></b></a>
                                                            </h5>
                                                            <h5 class="new-price " style="text-align: center;"><a><b>
                                                                        ¥<?php echo $value['price']; ?></a></b>
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Ec Pagination Start -->
                            <div class="ec-pro-pagination" style="margin-top: 2%;">
                            <?php echo $count;?> 件中 <?php echo $pageno; ?>〜<?php echo $det_cont; ?>件目を表示 
                                </div>
                                    <div id="demoA" class="pagination-inner"></div>                                   
                                </div>
                            <!-- Ec Pagination End -->
                        </div>
                    </section>
                </div>
            </div>
        </section>
        <!--Section end -->

        <!-- Footer Start -->
        <div id="footer"></div>
        <!-- Footer Area End -->

        <!-- Cart Floating Button -->
        <div class="ec-cart-float">
            <a href="#ec-side-cart" class="ec-header-btn ec-side-toggle">
                <div class="header-icon"><img src="../assets/images/icons/cart.svg" class="svg_img header_svg" alt="" />
                </div>
                <span class="ec-cart-count cart-count-lable">3</span>
            </a>
        </div>
        <!-- Cart Floating Button end -->

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
        <script src="../assets/js/callheaderfooter.js"></script>
        <script src="../assets/js/paginate.js"></script>
        <script>
        function remove(id) {
            var settings = {
                "url": "<?php echo $wishlist ; ?>",
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
                // console.log(response);
                if (response.APISTATUS.status == 0) {
                    if (window.innerWidth > 700) {
                        document.getElementById('cnt').innerHTML = parseInt(document.getElementById('cnt')
                            .innerHTML) - 1;
                    } else {
                        document.getElementById('cnt1').innerHTML = parseInt(document.getElementById('cnt1')
                            .innerHTML) - 1;
                    }
                }
            });
        }
        </script>
        <script>
        if ($(".ec-remove-wish").parents(".pro-gl-content").length == 0) {
            $('.ec-wish-rightside').html('<p class="emp-wishlist-msg">お気に入りに商品はありません。</p>');
        }
        </script>

        <script>
            var total_items='<?php echo $count; ?>'; 
            var limit=20;
            var totalPages_pre =Math.ceil(total_items/limit);

            paginator({
            target : document.getElementById("demoA"),
            total : totalPages_pre,
            click : "wishlist.php",
            adj : 4
            
            });

            if(totalPages_pre==0){
            document.getElementById('demoA').style.display = "none";
            }
        
        </script>

        <script>
            $(document).ready(function() {
                <?php if (   !isset($_SESSION['Login']) && empty($_SESSION['Login'])        
                    ) { ?>
                window.location.href = "Login.php";
                <?php } ?>
            });
        </script>
    </body>

    </html>