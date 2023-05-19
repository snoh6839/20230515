<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Anime Template">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anime | setting</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/css/plyr.css" type="text/css">
    <link rel="stylesheet" href="/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="/css/style.css" type="text/css">
</head>

<body>

    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header__logo">
                        <a href="/anime/main">
                            <img src="/img/logo.png" style="height: 24px;" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="header__nav">
                        <nav class="header__menu mobile-menu">
                            <ul>
                                <li><a href="/anime/main">Anime Home</a></li>
                                <li><a href="/anime/detail">Anime Details</a></li>
                                <!-- <li><a href="/anime/watching">Anime Watching</a></li> -->
                                <?php if (isset($_SESSION[_STR_LOGIN_ID])) { ?>
                                    <li><a href="/user/logout">Logout</a></li>
                                    <li><a href="/user/setting">Account setting</a></li>
                                    <!-- <button id="logout" onclick="redirectLogout();">Logout</button>
                                <script>
                                    function redirectLogout() {
                                        location.href = "/user/logout"
                                    }
                                </script> -->
                                <?php } else { ?>
                                    <li><a href="/user/signup">Sign Up</a></li>
                                    <li><a href="/user/login">Login</a></li>
                                <?php } ?>
                            </ul>
                        </nav>
                    </div>
                </div>

            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="/anime/main"><i class="fa fa-home"></i> Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Signup Section Begin -->
    <section class="signup spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">

                    <div class="login__form">
                        <h3>Chang Account Setting <span style="color:#917FB3"><?php echo isset($this->errMsg) ? $this->errMsg : ""; ?></span> </h3>

                        <form action="/user/setting" method="post">
                            <div class="input__item">
                                <input type="text" value="<?php echo isset($this->existingUser) ? $this->existingUser[0]["user_name"] : $_POST["name"] ?>" name="name" id="name" required>
                                <span class="icon_profile"></span>
                            </div>
                            <div class="input__item">
                                <input type="text" value="<?php echo isset($this->existingUser) ? $this->existingUser[0]["user_id"] : $_POST["id"] ?>" name="id" id="id" required>
                                <span class="icon_mail"></span>
                            </div>
                            <div class="input__item">
                                <input type="Password" placeholder="Password 8~20" name="pw" id="pw" required>
                                <span class="icon_lock"></span>
                            </div>
                            <div class="input__item">
                                <input type="Password" placeholder="Password Check" name="pwchk" id="pwchk" required>
                                <span class="icon_lock"></span>
                            </div>
                            <button type="submit" class="site-btn">Chang Account</button>
                        </form>
                        <!-- <h5>Already have an account? <a href="/user/login">Log In!</a></h5> -->
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login__social__links">
                        <h3>Today's Recommendation:</h3>
                        <div id="recom" class="hidden">
                            <div class="recom-img">
                                <img>
                            </div>
                            <br>
                            <button type="button" class="recom-btn site-btn">
                                다른 추천 보기[click]
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Signup Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer__logo">
                        <a href="./index.html"></ /img src="//img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This template
                        is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank"> Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->


    <!-- Js Plugins -->
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/player.js"></script>
    <script src="/js/jquery.nice-select.min.js"></script>
    <script src="/js/mixitup.min.js"></script>
    <script src="/js/jquery.slicknav.js"></script>
    <script src="/js/owl.carousel.min.js"></script>
    <script src="/js/main.js"></script>

</body>

</html>