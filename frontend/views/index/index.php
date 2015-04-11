<?php 
use common\util\TextUtils;
use common\util\UrlUtils;
?>
<div class="main-slider">
    <div id="heartslider" class="owl-carousel">
        <?php if (!empty($heart)) { ?>
            <?php foreach ($heart as $banner) { ?>
                <div class="h-item">
                    <a href="<?= $banner->link ?>"><img src="<?= (sizeof($banner->images) > 0) ? $banner->images[0] : $this->context->baseUrl . 'data/slider1' ?>" alt="<?= $banner->name ?>" /></a>
                </div><!-- h-item -->
            <?php } ?>
        <?php } ?>
    </div><!-- owl-carousel -->
    <div class="box-support">
        <div class="container">
            <div class="bs-inline">
                <i class="fa fa-phone"></i>
                Hot line: +<b class="text-danger">84 974 88 11 22</b>  +<b class="text-danger">84 905 351 699</b>
            </div>
            <div class="bs-inline">
                <i class="fa fa-envelope"></i>
                Email: <a class="text-primary" href="#"><b>info@vietnamdiscoverytour.com.vn</b></a>
            </div>
            <div class="bs-inline">
                <a class="text-uppercase" href="#"><b>Support Offline</b></a>
            </div>
            <div class="bs-inline">
                Chat online:
                <a href="#"><i class="fa fa-skype"></i></a>
                <a href="ymsgr:sendim?lee_haira"><img src="http://opi.yahoo.com/online?u=lee_haira&amp;m=g&amp;t=5"></a>
            </div>
        </div><!-- container -->
    </div><!-- box-support -->
</div><!-- main-slider -->
<div class="container">
    <div class="home-comment">
        <div class="hc-title">See What Our Clients Say About Us</div>
        <div id="commentslider" class="owl-carousel">
                <div class="grid">
                    <div class="img"><a><img src="data/user.jpg" alt="img" /></a></div>
                    <div class="g-content">
                        <div class="g-row">
                            <span class="g-title" href="#">
                                <i class="fa fa-star yellow"></i>
                                <i class="fa fa-star yellow"></i>
                                <i class="fa fa-star yellow"></i>
                                <i class="fa fa-star yellow"></i>
                                <i class="fa fa-star"></i>
                            </span>
                        </div>
                        <div class="g-row">
                            Great customer service. Max B was helpful with the complicated itinerary. He answered many ...
                        </div>
                        <div class="g-row">
                            <span class="g-from">From: Raleigh - Phnom Penh</span>
                        </div>
                    </div>
                </div><!-- grid -->
            <div class="grid">
                <div class="img"><a><img src="data/user2.jpg" alt="img" /></a></div>
                <div class="g-content">
                    <div class="g-row">
                        <span class="g-title" href="#">
                            Justin McCurry
                            <i class="fa fa-star yellow"></i>
                            <i class="fa fa-star yellow"></i>
                            <i class="fa fa-star yellow"></i>
                            <i class="fa fa-star yellow"></i>
                            <i class="fa fa-star"></i>
                        </span>
                    </div>
                    <div class="g-row">
                        Great customer service. Max B was helpful with the complicated itinerary. He answered many ...
                    </div>
                    <div class="g-row">
                        <span class="g-from">From: Raleigh - Phnom Penh</span>
                    </div>
                </div>
            </div><!-- grid -->
            <div class="grid">
                <div class="img"><a href="#"><img src="data/user.jpg" alt="img" /></a></div>
                <div class="g-content">
                    <div class="g-row">
                        <span class="g-title" href="#">
                            Justin McCurry
                            <i class="fa fa-star yellow"></i>
                            <i class="fa fa-star yellow"></i>
                            <i class="fa fa-star yellow"></i>
                            <i class="fa fa-star yellow"></i>
                            <i class="fa fa-star"></i>
                        </span>
                    </div>
                    <div class="g-row">
                        Great customer service. Max B was helpful with the complicated itinerary. He answered many ...
                    </div>
                    <div class="g-row">
                        <span class="g-from">From: Raleigh - Phnom Penh</span>
                    </div>
                </div>
            </div><!-- grid -->
            <div class="grid">
                <div class="img"><a href="#"><img src="data/user2.jpg" alt="img" /></a></div>
                <div class="g-content">
                    <div class="g-row">
                        <span class="g-title" href="#">
                            Justin McCurry
                            <i class="fa fa-star yellow"></i>
                            <i class="fa fa-star yellow"></i>
                            <i class="fa fa-star yellow"></i>
                            <i class="fa fa-star yellow"></i>
                            <i class="fa fa-star"></i>
                        </span>
                    </div>
                    <div class="g-row">
                        Great customer service. Max B was helpful with the complicated itinerary. He answered many ...
                    </div>
                    <div class="g-row">
                        <span class="g-from">From: Raleigh - Phnom Penh</span>
                    </div>
                </div>
            </div><!-- grid -->
        </div><!-- commentslider -->
    </div><!-- home-comment -->
</div><!-- container -->
<div class="bg-gray home-content">
    <div class="container">
        <div class="top-featured">
            <div class="grid">
                <div class="img"><a href="#"><img src="data/top-featured.jpg" alt="img" /></a></div>
                <div class="g-content">
                    <div class="g-row">
                        <a class="g-title" href="#">1 way motorbike rental from Hue – Hoi An</a>
                    </div>
                    <div class="g-row">
                        We take pride to offer you an exclusive way to discover the Mekong delta region, one of the most-wanted destination in Vietnam. Let’s come and join the Mekong day tour to live the river life of the hospitable and friendly Mekong residents as well as to learn more about their unique culture, surely you won’t be regret! 
                    </div>
                    <div class="g-row">
                        <a class="btn btn-primary" href="#">View more</a>
                    </div>
                </div>
            </div><!-- grid -->
        </div><!-- top-featured -->
        <div class="bg-white big-list">
            <ul>
                <li>
                    <div class="grid">
                        <div class="g-row">
                            <a class="g-title" href="#">Vietnam Discovery</a>
                        </div>
                        <div class="img"><a href="#"><img src="data/home1.jpg" alt="img" /></a></div>
                        <div class="g-content">
                            <div class="g-row g-desc">
                                Vietnam Discovery Travel, the owner of Cityinsight.vn, is proud to offer you not only special discovery tours in big cities, but also package holidays throughout Vietnam and even from Vietnam to Southeast Asia countries through its main online portal www.vietnamdiscovery.com. Let’s enjoy the most fascinating trips at favorable rates! 
                            </div>
                            <div class="g-row">
                                <a class="btn btn-primary" href="#">View more</a>
                            </div>
                        </div>
                    </div><!-- grid -->
                </li>
                <li>
                    <div class="grid">
                        <div class="g-row">
                            <a class="g-title" href="#">Travel Journals</a>
                        </div>
                        <div class="img"><a href="#"><img src="data/home2.jpg" alt="img" /></a></div>
                        <div class="g-content">
                            <div class="g-row g-desc">
                                Every post in the TRAVEL JOURNALS told by foreign travelers about their real trips in Vietnam is surely a new adventure to you. Finding out yourself exciting day-by-day itineraries or even little memories of unforgettable Vietnam excursions with us...
                            </div>
                            <div class="g-row">
                                <a class="btn btn-primary" href="#">View more</a>
                            </div>
                        </div>
                    </div><!-- grid -->
                </li>
                <li>
                    <div class="grid">
                        <div class="g-row">
                            <a class="g-title" href="#">Culture Stories</a>
                        </div>
                        <div class="img"><a href="#"><img src="data/home3.jpg" alt="img" /></a></div>
                        <div class="g-content">
                            <div class="g-row g-desc">
                                Not only offering pure travel services to foreign travelers to Vietnam, City Insight always desires to introduce in-depth perspectives on the culture and people of Vietnam to friends all over the world through the unique multi-dimensional VIETNAM CULTURESTORIES in this cityinsight.vn. Let visit and discover! 
                            </div>
                            <div class="g-row">
                                <a class="btn btn-primary" href="#">View more</a>
                            </div>
                        </div>
                    </div><!-- grid -->
                </li>
            </ul>
            <div class="clearfix"></div>
        </div><!-- big-list -->
        <div class="small-list">
            <ul>
                <?php foreach ($tourFeatures as $tour) { ?>
                <li>
                    <div class="grid">
                        <div class="img"><a href="#"><img src="data/image1.jpg" alt="img" /></a></div>
                        <div class="g-content">
                            <div class="g-row">
                                <a class="g-title" href="<?= $this->context->baseUrl . UrlUtils::item($tour->title, $tour->id) ?>"><?= $tour->title?></a>
                            </div>
                            <div class="g-row"><span class="g-time"><?= TextUtils::convertTime($tour->create_time) ?> by <?=$tour->author->username ?>  </span></div>
                            <div class="g-row">
                                In Spring, Nha Trang is always a fascinating destination for both domestic and international guests. In Nha Trang, with a hired motorbike or…
                            </div>
                            <div class="g-row"><a class="g-more" href="<?= $this->context->baseUrl . UrlUtils::item($tour->title, $tour->id) ?>"><i class="fa fa-arrow-right"></i>View more</a></div>
                        </div>
                    </div><!-- grid -->
                </li>
                <?php } ?>
            </ul>
            <div class="clearfix"></div>
        </div><!-- small-list -->
    </div><!-- container -->
</div><!-- bg-gray -->