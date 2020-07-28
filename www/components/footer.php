<?php
require_once ("connection/connection.php");
require_once ("manage/category.php");

?>
<!-- Sidebar -->
<div class="col-md-4 col-xs-12">
    <div class="sidebar">

        <!-- About -->
        <div class="widget kd-about">
            <h2 class="widget-title">Haqqimizda</h2>
            <div class="widget-header clearfix">
                <div class="about-image image" style="background-image: url(images/avatar.jpg);">
                    <img src="images/avatar.jpg" alt="About Me">
                </div>

                <div class="widget-follow-content">
                    <div class="inner clearfix">
                        <a href="#" title="Facebook">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="#" title="Google Plus">
                            <i class="fa fa-google-plus"></i>
                        </a>
                        <a href="#" title="Linkedin">
                            <i class="fa fa-linkedin"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="widget-content">
                <p class="description">ShiftLab, tarafsız bir teknoloji haber portalı olup, içeriklerini kendi yazar kadrosuyla üretmektedir. Ziyaretçilerinin ilgi duyduğu teknoloji alanında makaleler ve videolar ile güncel içerikleri onlara ücretsiz olarak sunmaktadır.</p>
                <h3 class="title">
                    <a href="#">Rustamov Tamerlan</a>
                </h3>
            </div>
        </div>
        <!-- End About -->

        <!-- Mailchimp -->
        <div class="widget kd-mailchimp">
            <h2 class="widget-title"><span>Abunə olun</span></h2>
            <div class="widget-content">
                <form class="kd-subscribe">
                    <div class="form-item form-remove">
                        <input type="email" class="kd-subscribe-email" placeholder="Email adresini daxil et" value="" required />
                    </div>
                    <div class="form-submit icon-message-1">
                        <input type="submit" class="kd-btn kd-subscribe" value="">
                    </div>
                </form>
                <p class="subscribe-status"></p>
            </div>
        </div>
        <!-- End Mailchimp -->

        <!-- Popular Posts -->
        <div class="widget kd-popular-post kd-posts-list">
            <h2 class="widget-title">Most Popular</h2>
            <div class="widget-list">
                <?php mostpopulars($db); ?>
            </div>
        </div>
        <!-- End Popular Posts -->

        <!-- Banner -->
        <div id="kd_banner-2" class="widget kd-banner">
            <div class="widget-banner-content" style="text-align: center;">
                <img src="images/widgets/banner/advertise.jpg" alt="">
            </div>
        </div>
        <!-- End Banner -->

        <!-- Recent Posts -->
        <div class="widget kd-latest-posts kd-posts-list">
            <h2 class="widget-title">Recent Posts</h2>
            <div class="widget-list classic">
                <?php  recentposts($db);  ?>
            </div>
        </div>
        <!-- End Recent Posts -->


        <!-- Instagram -->
        <div class="widget kd-instagram kd-images">
            <h2 class="widget-title">Simple Life Instagram</h2>
                <script src="js/platform.js" defer></script>
                <div  class="elfsight-app-5d4daa0a-d762-4dbc-bc77-0d5fefa779f6"></div>
        </div>
        <!-- End Instagram -->

    </div>
</div>
<!-- End Sidebar -->
</div>
</div>
</div>
<!-- End Main Content -->

<!-- Footer -->
<footer id="footer" class="footer v3">
    <div class="footer-widgets"  style="background: url(images/footer/background.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="widgets-left">
                        <div class="row">

                            <div class="col-md-4 col-sm-12">
                                <!-- Widget Menu -->
                                <div class="widget widget_nav_menu">
                                    <h3 class="widget-title">Life Style</h3>
                                    <ul class="menu">
                                        <li class="menu-item"><a href="#">Diy</a></li>
                                        <li class="menu-item"><a href="#">Outfits</a></li>
                                        <li class="menu-item"><a href="#">Sewing</a></li>
                                        <li class="menu-item"><a href="#">Gym &#038; Heal</a></li>
                                        <li class="menu-item"><a href="#">Hair</a></li>
                                    </ul>
                                </div>
                                <!-- End Widget Menu -->
                            </div>

                            <div class="col-md-4 col-sm-12">
                                <!-- Widget Menu -->
                                <div class="widget widget_nav_menu">
                                    <h3 class="widget-title">Food</h3>
                                    <ul class="menu">
                                        <li class="menu-item"><a href="#">How to cook?</a></li>
                                        <li class="menu-item"><a href="#">Food For Dinner</a></li>
                                        <li class="menu-item"><a href="#">Tip For Kitchen</a></li>
                                    </ul>
                                </div>
                                <!-- End Widget Menu -->
                            </div>

                            <div class="col-md-4 col-sm-12">
                                <!-- Widget Menu -->
                                <div class="widget widget_nav_menu">
                                    <h3 class="widget-title">Useful Links</h3>
                                    <ul class="menu">
                                        <li class="menu-item"><a href="#">Guides</a></li>
                                        <li class="menu-item"><a href="#">Perfecly Packed</a></li>
                                        <li class="menu-item"><a href="#">Traditional Crafts</a></li>
                                        <li class="menu-item"><a href="#">Travel Tip</a></li>
                                    </ul>
                                </div>
                                <!-- End Widget Menu -->
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="widgets-right">
                        <div class="row">

                            <div class="col-md-6 col-sm-12">
                                <!-- Twitter -->
                                <div class="widget kd-twitter">
                                    <h3 class="widget-title">Recent Tweets</h3>
                                    <div class="widget-tweet-content">
                                        <div class="item">
                                            <i class="fa fa-twitter"></i>
                                            <div class="widget-item-content">Sed ut perspiciatis unde omnis iste natus error sit voluptatem</div>
                                        </div>
                                        <div class="item">
                                            <i class="fa fa-twitter"></i>
                                            <div class="widget-item-content">There are many variations of passages of Lorem Ipsum available, but the majority have suffered</div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Twitter -->
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="copyright-text">
                        Designed by Rustemov Tamerlan<i class="fa fa-heart"></i></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="socials">
                        <a href="#" title="Facebook">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="#" title="Google Plus">
                            <i class="fa fa-google-plus"></i>
                        </a>
                        <a href="#" title="Instagram">
                            <i class="fa fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer -->


<!-- Scripts -->
<script type="text/javascript" src="js/libs/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="js/libs/jquery.justifiedGallery.min.js"></script>
<script type="text/javascript" src="js/libs/jquery.magnific-popup.js"></script>
<script type="text/javascript" src="js/libs/masonry.pkgd.js"></script>
<script type="text/javascript" src="js/libs/owl.carousel.js"></script>
<script type="text/javascript" src="js/libs/jquery-scrolltofixed-min.js"></script>
<script type='text/javascript' src='http://maps.googleapis.com/maps/api/js?key=AIzaSyDoIZPT7FOk4dFuAI2n1fu1EYxN92UDrkk&amp;ver=1.0'></script>
<script type="text/javascript" src="js/scripts.js"></script>
<!-- End Scripts -->
</body>
</html>