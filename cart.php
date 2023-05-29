<!--=========================================================
    Item Name: Cart.html.
    Author: Manjunathgouda
    Version: 1.0
    Copyright 2021-12-30
 ============================================================-->
<?php
session_start();

require '../lib/api.php';
require '../lib/locale/ja.php';
require 'error.php';

$msg = " ";
$details = '';

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
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
    <link rel="stylesheet" href="../assets/css/cart.css" />


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

<body class="register_page" style="font-family: ヒラギノ角ゴ Pro, Hiragino Kaku Gothic Pro, メイリオ, Meiryo, sans-serif;">
    <div id="ec-overlay"><span class="loader_img"></span></div>

    <!-- Header start  -->
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
                                <li class="ec-breadcrumb-item"><a href="home.php">ホーム</a></li>
                                <?php } else { ?>
                                <li class="ec-breadcrumb-item"><a href="home.php">ホーム</a></li>
                                <?php } ?>

                                <li class="ec-breadcrumb-item active">カート</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <span>
                                <a onclick="window.history.go(-1);"> <img
                                        src="../assets/images2/icons/istockphoto-1385686401-170667a-removebg-preview.png"
                                        width="20" height="20" class="mobilebackbtn" /></a>
                            </span>
                            <h2 class="ec-breadcrumb-title">カート</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec breadcrumb end -->

    <?php

    $data_array = array("visitor_no" => $_SESSION['Visitor_no']);
    $make_call = callAPI('POST', 'view/cartfetch', json_encode($data_array));
    $response = json_decode($make_call, true);

    if (!$response) {
        $msg = "connection failed";
    } else {
        $details = $response['ENTITY_LIST'];
    }
    ?>

    <!-- Ec cart page -->
    <section class="ec-page-content ec-vendor-uploads ec-user-account section-space-p">
        <div class="container">
            <div class="row mt-2">
                <div class="ec-shop-leftside ec-vendor-sidebar col-lg-3 col-md-12">
                    <div class="ec-sidebar-wrap">
                        <!-- Sidebar Category Block -->
                        <div id="sidebar_content"></div>
                    </div>
                </div>

                <div class="ec-pro-rightside ec-common-rightside col-lg-9 col-md-12">
                    <div id="errormsg"></div>
                    <div class="ec-cart-content col-lg-9 col-md-12 " id="contentDiv">

                        <!-- cart content Start -->
                        <div class="ec-cart-content">
                            <div class="ec-cart-inner">

                                <div class="row">
                                    <div class="checkbox-class checkbox-class2">
                                        <p class="chk-lbl">カートに商品を追加した後、６時間経過すると、自動的にカートから削除されますので、ご注意下さい。
                                        </p>

                                    </div>

                                    <form method="POST" id="cartForm">

                                        <div class="table-content cart-table-content hide1">

                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th class="hrlabel">商品</th>
                                                        <th></th>
                                                        <th><span class='pricekeyword'>価格</span><span
                                                                style="font-size:12px;">（税込）</span></th>
                                                        <th></th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $details = is_array($details) ? $details : array($details);

                                                    foreach ($details as $value) {
                                                    ?>
                                                    <tr>
                                                        <td data-label="商品" class="ec-cart-pro-name">
                                                            <a class="imglabel" id="prodImg"
                                                                href="top1.php?regno=<?php echo $value['registerno']; ?>&cond=normal">
                                                                <img class="ec-cart-pro-img mr-4"
                                                                    src="https://kh01.kyoto-happy.co.jp/netkuroku/saiful/<?php echo $value['coverimage'] != '' ? $value['coverimage'] : "no_image.png"; ?>"
                                                                    alt="" />
                                                            </a>
                                                        </td>

                                                        <td data-label="" class="ec-cart-pro-price">
                                                            <div class="amount1" id="nameBrand">
                                                                <?php echo $value['classificationname']; ?> <br />
                                                                <?php echo $value['brand2']; ?> </div>
                                                        </td>

                                                        <td data-label="価格" class="ec-cart-pro-price">
                                                            <div class="amount" id="priceAmount">
                                                                &yen;<?php echo $value['price']; ?>
                                                            </div>
                                                        </td>

                                                        <td data-label="" class="ec-cart-pro-remove">
                                                            <a onclick="remove(<?php echo $value['id']; ?>)"
                                                                class="hide" id="web_remove">
                                                                <i class="ecicon eci-trash-o"><span
                                                                        style="font-size:15px;white-space: nowrap;">
                                                                        削除</span></i>
                                                            </a>
                                                        </td>
                                                        <td data-label="" class="ec-cart-pro-remove">
                                                        <button type="button" class="btn btn-primary btn-cart common_btn"
                                                                id="cart-btn" onclick="pass('<?php echo $value['registerno']; ?>')"> 購入手続きに進む</button>

                                                        </td>
                                                    </tr>
                                                    <?php
                                                    }
                                                    ?>

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="web-hide">
                                            <div class="pro-detail">
                                                <?php
                                                $details = is_array($details) ? $details : array($details);
                                                foreach ($details as $value) {
                                                ?>
                                                <div class="row" id="mob_prod_details">
                                                    <!-- <div class="column class1">
                                                        <p class="radio-class">
                                                            <input type="checkbox"
                                                                id="<?php //echo $value['registerno']; 
                                                                    ?>"
                                                                name="checkitem1" class="radio-btn checkitem1">
                                                        </p>
                                                    </div> -->
                                                    <div class="column class2">
                                                        <a class="imglabel"
                                                            href="top1.php?regno=<?php echo $value['registerno']; ?>&cond=normal">
                                                            <img class="ec-cart-pro-img mr-4"
                                                                src="https://kh01.kyoto-happy.co.jp/netkuroku/saiful/<?php echo $value['coverimage'] != '' ? $value['coverimage'] : "no_image.png"; ?>"
                                                                alt="" />
                                                        </a>
                                                    </div>
                                                    <div class="column class3">
                                                        <div class="amount1"><?php echo $value['classificationname']; ?>
                                                            <br /> <?php echo $value['brand2']; ?>
                                                        </div>
                                                    </div>
                                                    <div class="column class4">
                                                        <div class="amount">&yen;<?php echo $value['price']; ?></div>
                                                    </div>
                                                </div>
                                                <div class="row" id="mob_remove_btn">
                                                    <div class="column_mob">

                                                        <a onclick="remove(<?php echo $value['id']; ?>)" class="hide">
                                                            <i class="ecicon eci-trash-o"><span
                                                                    style="font-size:15px;white-space: nowrap;">
                                                                    削除</span></i>
                                                        </a>
                                                    </div>
                                                    <div class="column_mob">
                                                    <button type="button" class="btn btn-primary btn-cart common_btn"
                                                                onclick="pass('<?php echo $value['registerno']; ?>')" id="cart-btn"> 購入手続きに進む</button>
                                                    </div>


                                                </div>
                                                <?php
                                                }
                                                ?>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="ec-cart-update-bottom">
                                                    <a href="home.php">ショッピングを続ける</a>
                                                    <!-- <button class="btn btn-primary btn-cart common_btn" id="cart-btn">
                                                        購入手続きに進む -->
                                                </div>
                                            </div>
                                        </div>

                                          <!-- Cart Aggrement Modal satrt -->
                                          <div class="modal fade bd-example-modal-sm" id="cart_modal" tabindex="-1"
                                            role="dialog" aria-labelledby="myModal_registerTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-sm modal-dialog-centered " role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header"
                                                        style="background: darkgray; width:90%; margin: auto; margin-top: 25px;">
                                                        <h5 class="modal-title w-100 text-center webshow"
                                                            id="myModal_registerTitle" style="color: white;"><b
                                                                class="modal-txt">ご購入の前に下記項目に同意をお願いします。（購入いただくには下記項目の同意が必要です）</b>
                                                        </h5>
                                                        <h5 class="modal-title w-100 text-center mobshow"
                                                            id="myModal_registerTitle" style="color: white;"><b
                                                                class="modal-txt">ご購入の前に下記項目に同意をお願いします。<br/>（購入いただくには下記項目の同意が必要です）</b>
                                                        </h5>

                                                    </div>
                                                    <div class="modal-body"
                                                        style="background-color: #e7e5e5; color:black;">
                                                            <div class="passage"><b style="white-space:no-wrap; margin-left: 5px;">こんな場合は注文できません</b>
                                                                <ul class ="ulstyle">
                                                                    <li class ="listyle">購入する意思がない</li>
                                                                    <li class ="listyle">転売等の営利目的とした購入</li>
                                                                    <li class ="listyle">いたずら目的</li>
                                                                </ul>
                                                            </div>
                                                            <div class="passage"><b  style="white-space:no-wrap; margin-left: 5px;">出品者の責任（ハッピーは責任を負いかねます）</b>
                                                                <ul class ="ulstyle">
                                                                    <li class ="listyle">出品者の保管 梱包等の不備により、商品に不具合が生じた場合</li>
                                                                    <li class ="listyle">商品説明と実際の商品が違う場合</li>
                                                                <ul>
                                                            </div>

                                                            <div class="passage"><p style="margin-left: 5px">会員は、取引に関し責任を負うものとし、当社は会員同士のトラブルに介入いたしません。</p>
                                                            </div>

                                                            <div class="passage"><b  style="white-space:no-wrap; margin-left: 5px;">シミ汚れなど商品に不満のある場合のお申し出 </b>
                                                                <ul class ="ulstyle">
                                                                    <li class ="listyle">ハッピーへケアメンテのお申し出いただくことはできますが、ケアメンテ代金（送料含む）は、お申し出のあった購入者または出品者の負担となります。</p>
                                                                    <li class ="listyle">新品または同商品の他の中古品と交換することはできません。</li>
                                                                <ul>
                                                            </div>

                                                            <div class="passage"><p style="margin-left: 5px">出品商品の真贋を保証するものではありません。</p></div>

                                                            <button type="button" class="btn btn-primary btn-position1"
                                                            onclick="checkoutscrnbtn('<?php echo $value['registerno']; ?>')">同意します</button>
                                                            <button type="button" class="btn btn-primary btn-position2"
                                                            data-bs-dismiss="modal"
                                                           data-bs-dismiss="modal">同意しません</button>                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--cart content End -->
                    </div>
                    <!-- Sidebar Area Start -->
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Start -->
    <div id="footer"></div>
    <!-- Footer Area End -->

    <div class="ec-cart-float">
        <a href="#ec-side-cart" class="ec-header-btn ec-side-toggle">
            <div class="header-icon"><img src="../assets/images/icons/cart.svg" class="svg_img header_svg" alt="" />
            </div>
            <span class="ec-cart-count cart-count-lable">3</span>
        </a>
    </div>
    <!-- Cart Floating Button end -->

    <div class="modal fade bd-example-modal-sm" id="myModal_register" tabindex="-1" role="dialog"
        aria-labelledby="myModal_registerTitle" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title w-100 text-center" id="myModal_registerTitle"><b>採寸情報</b></h5>

                </div>
                <div class="modal-body">
                    <b>
                        <center><img src="../assets/images2/common/karteafter.jpg" /></center>
                    </b>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">閉じる</button>

                </div>
            </div>
        </div>
    </div>
    <!-- Feature tools end -->

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


    <script>
    $(function() {
        $("#sidebar_content").load("common_sidebar.html");
    });
    </script>
    <script>
    $(function() {
        // Attach Button click event listener
        $(".size").click(function() {
            $('#myModal_register').modal('show');

        });
    });
    </script>

    <script>
        $(document).ready(function() {
            $(".btn-cart").click(function() {
                $('#cart_modal').modal('show');
            });
        });
    </script>
   <script>
   var new_id=0;
        function pass(id) {
            // console.log(id);
            new_id=id;
            $('#cart_modal').modal('show');
        }
    </script>

    <script>
        
    function checkoutscrnbtn(id) {
        event.preventDefault();
        // alert(id);
        window.location.href = 'checkout.php?value=' + new_id;

    }
    </script>
    <script>
    function remove(id) {
        var settings = {
            "url": "https://api.happy-saiful.com/shpml-web/saifuru/view/cart",
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
            if (response.APISTATUS.status == 0) {
                document.getElementsByClassName('cart-count-lable')[0].innerHTML = parseInt(document
                    .getElementsByClassName('cart-count-lable')[0].innerHTML) - 1;
                location.reload();
            }

        });

    }
    </script>
    <script>
    $(function() {
        $(document).ready(function() {
            if ('<?php echo count($details) == 0 ?>') {
                $('.ec-common-rightside').html('<p class="emp-wishlist-msg">カートに商品はありません。</p>');
                $('.emp-wishlist-msg').css('height', '13%');
            }
        });
    });
    </script>

    <script>
    $('#checkall').click(function(event) {
        if (this.checked) {
            // Iterate each checkbox
            $(':checkbox').each(function() {
                this.checked = true;
            });
        } else {
            $(':checkbox').each(function() {
                this.checked = false;
            });
        }
    });

    if (/(android)/i.test(navigator.userAgent)) {
        // console.log(navigator.userAgent);
        $('.chk').attr('class', 'checkbox-class');
        $('.chk').removeClass('checkbox-class1');
    } else {
        $('.chk').attr('class', 'checkbox-class1');
        $('.chk').removeClass('checkbox-class');
        // console.log(navigator.userAgent);
    }
    </script>
    <script>
    $(document).ready(function() {
        <?php if (
                !isset($_SESSION['Login']) &&
                empty($_SESSION['Login'])
            ) { ?>
        window.location.href = "Login.php";

        <?php } ?>

    });
    </script>

    <script>
        $(document).ready(function() {
            <?php if (
                    !isset($_SESSION['Login']) &&
                    empty($_SESSION['Login'])
                ) { ?>
                var href= window.location.href;         
                
                if(href){
                     window.location.href = "Login.php?location=cart";
                }
           
    
            <?php } ?>
        });
    </script>
</body>

</html>