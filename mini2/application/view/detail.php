<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Anime Template">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anime | detail</title>

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
                            </ /img src="//img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="header__nav">
                        <nav class="header__menu mobile-menu">
                            <ul>
                                <li><a href="/anime/main">Anime Home</a></li>
                                <li class="active"><a href="/anime/detail">Anime Details</a></li>
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

    <!-- Anime Section Begin -->
    <section class="anime-details spad">
        <div class="container">
            <div class="anime__details__content">
                <div class="row">
                    <?php foreach ($this->animeDetails as $record) { ?>
                        <div class="col-lg-3">
                            <div class="anime__details__pic set-bg" style="background-position: left;" data-setbg="/img/sidebar/<?php echo $record["anime_category"] ?>-<?php echo $record["anime_no"] ?>.jpg">
                                <div class="comment"><i class="fa fa-comments"></i> <?php echo $this->animeCommentCount ?></div>
                                <div class="view"><i class="fa fa-eye"></i> <?php echo $record["views"] ?></div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="anime__details__text">
                                <div class="anime__details__title">
                                    <h3><?php echo $record["anime_name"] ?></h3>
                                </div>
                                <p>
                                    <?php echo $record["anime_description"] ?></p>
                                <div class="anime__details__widget">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <ul>
                                                <li><span>Type:</span> <?php echo $record["anime_type"] ?></li>
                                                <li><span>Studios:</span> <?php echo $record["anime_studios"] ?></li>
                                                <li><span>Date aired:</span> <?php echo $record["anime_date"] ?></li>
                                                <li><span>Status:</span> <?php echo $record["anime_status"] ?></li>
                                                <li><span>Genre:</span> <?php echo $record["anime_genre"] ?></li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <ul>
                                                <li><span>Score :</span> <?php echo $record["anime_scores"] ?> / 10</li>
                                                <li><span>Rating :</span> <?php echo $record["anime_rating"] ?> / 10</li>
                                                <li><span>Duration:</span> <?php echo $record["anime_duration"] ?> min/ep</li>
                                                <li><span>Quality:</span> <?php echo $record["anime_quality"] ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="anime__details__btn">
                                    <a href="#" class="follow-btn"><i class="fa fa-heart-o"></i> Follow</a>
                                    <a href="#" class="watch-btn"><span>Watch Now</span> <i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="anime__details__review">
                        <div class="section-title">
                            <h5>Reviews</h5>
                        </div>
                        <?php foreach ($this->animeComment as $record) { ?>
                            <div class="anime__review__item">
                                <div class="anime__review__item__text">
                                    <h6><?php echo $record["user_name"] ?> - <span><?php echo $record["comment_date"] ?></span></h6>
                                    <p><?php echo $record["comment_content"] ?></p>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="anime__details__form">
                        <div class="section-title">
                            <h5>Your Comment</h5>
                        </div>
                        <form action="/anime/detail" method="post">
                            <input type="hidden" name="anime_no" value="<?php echo isset($_GET["anime_no"]) ? $_GET["anime_no"] : 1;  ?>">
                            <!-- <input type="hidden" name="user_no" value="<?php echo isset($_GET["user_no"]) ? $_GET["user_no"] : 1;  ?>"> -->
                            <textarea placeholder="Your Comment" name="comment_content"></textarea>
                            <button type="submit"><i class="fa fa-location-arrow"></i> Review</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="anime__details__sidebar">
                        <div class="section-title">
                            <h5>you might like...</h5>
                        </div>
                        <?php foreach ($this->animeDetails5 as $record) { ?>
                            <div class="product__sidebar__view__item set-bg mix" data-setbg="/img/sidebar/<?php echo $record["anime_category"] ?>-<?php echo $record["anime_no"] ?>.jpg">
                                <div class="view"><i class="fa fa-eye"></i><?php echo $record["views"] ?></div>
                                <h5><a href="/anime/detail?anime_no=<?php echo $record["anime_no"] ?>"><?php echo $record["anime_name"] ?></a></h5>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Anime Section End -->

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