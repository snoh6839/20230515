<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Anime Template">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anime | main</title>

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
                            </img src="/img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="header__nav">
                        <nav class="header__menu mobile-menu">
                            <ul>
                                <li class="active"><a href="/anime/main">Anime Home</a></li>
                                <li><a href="/anime/detail">Anime Details</a></li>
                                <li><a href="/anime/watching">Anime Watching</a></li>
                                <?php if (isset($_SESSION[_STR_LOGIN_ID])) { ?>
                                    <li><a href="/user/logout">Logout</a></li>
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

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="hero__slider owl-carousel">
                <?php foreach ($this->animeDetails as $record) { ?>
                    <div class="hero__items set-bg" data-setbg="/img/hero/hero-<?php echo $record["anime_no"] ?>.jpg">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="hero__text">
                                    <h2><?php echo $record["anime_name"] ?></h2>
                                    <p><?php echo $record["anime_description"] ?></p>
                                    <a href="/anime/detail?anime_no=<?php echo $record["anime_no"] ?>"><span>View Detail</span> <i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="trending__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>Trending Now</h4>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php foreach ($this->animeDetails2 as $record) { ?>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg" data-setbg="/img/trending/trend-<?php echo $record["anime_no"] ?>.jpg">

                                            <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                            <div class="view"><i class="fa fa-eye"></i><?php echo $record["views"] ?></div>
                                        </div>
                                        <div class="product__item__text">
                                            <h5><a href="/anime/detail?anime_no=<?php echo $record["anime_no"] ?>"><?php echo $record["anime_name"] ?></a></h5>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="popular__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>Popular Shows</h4>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php foreach ($this->animeDetails3 as $record) { ?>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg" data-setbg="/img/popular/popular-<?php echo $record["anime_no"] ?>.jpg">

                                            <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                            <div class="view"><i class="fa fa-eye"></i><?php echo $record["views"] ?></div>
                                        </div>
                                        <div class="product__item__text">
                                            <h5><a href="/anime/detail?anime_no=<?php echo $record["anime_no"] ?>"><?php echo $record["anime_name"] ?></a></h5>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="recent__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>Recently Added Shows</h4>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php foreach ($this->animeDetails4 as $record) { ?>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg" data-setbg="/img/recent/recent-<?php echo $record["anime_no"] ?>.jpg">

                                            <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                            <div class="view"><i class="fa fa-eye"></i><?php echo $record["views"] ?></div>
                                        </div>
                                        <div class="product__item__text">
                                            <h5><a href="/anime/detail?anime_no=<?php echo $record["anime_no"] ?>"><?php echo $record["anime_name"] ?></a></h5>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="product__sidebar">
                        <div class="product__sidebar__view">
                            <div class="section-title">
                                <h5>Top Views</h5>
                            </div>
                            <div class="filter__gallery">
                                <?php foreach ($this->animeDetails5 as $record) { ?>
                                    <div class="product__sidebar__view__item set-bg mix" data-setbg="/img/sidebar/<?php echo $record["anime_category"] ?>-<?php echo $record["anime_no"] ?>.jpg">
                                        <div class="view"><i class="fa fa-eye"></i><?php echo $record["views"] ?></div>
                                        <h5><a href="/anime/detail?anime_no=<?php echo $record["anime_no"] ?>"><?php echo $record["anime_name"] ?></a></h5>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="product__sidebar__comment">
                            <div class="section-title">
                                <h5>New Comment</h5>
                            </div>
                            <div class="product__sidebar__comment__item">
                                <div class="product__sidebar__comment__item__pic">
                                    </img src="/img/sidebar/comment-1.jpg" alt="">
                                </div>
                                <div class="product__sidebar__comment__item__text">
                                    <h5><a href="#">The Seven Deadly Sins: Wrath of the Gods</a></h5>
                                    <span><i class="fa fa-eye"></i> 19.141 Viewes</span>
                                </div>
                            </div>
                            <div class="product__sidebar__comment__item">
                                <div class="product__sidebar__comment__item__pic">
                                    </img src="/img/sidebar/comment-2.jpg" alt="">
                                </div>
                                <div class="product__sidebar__comment__item__text">
                                    <h5><a href="#">Shirogane Tamashii hen Kouhan sen</a></h5>
                                    <span><i class="fa fa-eye"></i> 19.141 Viewes</span>
                                </div>
                            </div>
                            <div class="product__sidebar__comment__item">
                                <div class="product__sidebar__comment__item__pic">
                                    </img src="/img/sidebar/comment-3.jpg" alt="">
                                </div>
                                <div class="product__sidebar__comment__item__text">
                                    <h5><a href="#">Kizumonogatari III: Reiket su-hen</a></h5>
                                    <span><i class="fa fa-eye"></i> 19.141 Viewes</span>
                                </div>
                            </div>
                            <div class="product__sidebar__comment__item">
                                <div class="product__sidebar__comment__item__pic">
                                    </img src="/img/sidebar/comment-4.jpg" alt="">
                                </div>
                                <div class="product__sidebar__comment__item__text">
                                    <h5><a href="#">Monogatari Series: Second Season</a></h5>
                                    <span><i class="fa fa-eye"></i> 19.141 Viewes</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer__logo">
                        <a href="./index.html"></img src="/img/logo.png" alt=""></a>
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