<?php

use common\util\UrlUtils;
use frontend\assets\AppAsset;
use frontend\assets\LibAsset;
use frontend\assets\WebAsset;
use yii\helpers\Html;

AppAsset::register($this);
LibAsset::register($this);
WebAsset::register($this);

$reviewsAvg = isset($this->context->var["reviewsAvg"]) ? $this->context->var["reviewsAvg"] : '';
$reviewsCount = isset($this->context->var["reviewsCount"]) ? $this->context->var["reviewsCount"] : '';
$albums = isset($this->context->var["albums"]) ? $this->context->var["albums"] : '';
$menus = isset($this->context->var["menus"]) ? $this->context->var["menus"] : '';
$home = isset($this->context->var["home"]) ? $this->context->var["home"] : '';
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="<?= $this->context->baseUrl ?>images/favicon.ico" />

        <?= Html::csrfMetaTags() ?>
        <title data-rel="title" ><?= Html::encode($this->title == null || $this->title == "" ? $this->context->title : $this->title) ?></title>
        <meta name="keywords" content= "<?= $this->context->keywrod ?>" />
        <meta name="description" content="<?= $this->context->description ?>" />
        <meta property="og:title" content="<?= $this->context->og['title'] ?>" />
        <meta property="og:site_name" content="<?= $this->context->og['site_name'] ?>"/>
        <meta property="og:url" content="<?= $this->context->og['url'] ?>"/>
        <meta property="og:image" content="<?= $this->context->og['image'] ?>"/>
        <meta property="og:description"  content="<?= $this->context->og['description'] ?>" />
        <link rel="canonical" href="<?= $this->context->canonical ?>" />
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <div class="navigator">
            <div class="container">
                <div class="rating-header">
                    Quality Rating 
                    <?php for ($i = 1; $i <= 5; $i++) { ?>
                        <?php if ($i <= $reviewsAvg) { ?>
                            <i class="fa fa-star yellow"></i>
                        <?php } else { ?>
                            <i class="fa fa-star"></i>
                        <?php } ?>
                    <?php } ?>
                    by <?= $reviewsCount ?> reviews
                </div>
                <div class="tripadvisor-header">
                    <div id="TA_socialButtonBubbles789" class="TA_socialButtonBubbles">
                        <ul id="P3Tgrl" class="TA_links USm6zXvP">
                            <li id="tKRSuMm8" class="LaE2jx9r">
                                <a target="_blank" href="http://www.tripadvisor.com/Hotel_Review-g60745-d258705-Reviews-Hotel_Commonwealth-Boston_Massachusetts.html"><img src="http://www.tripadvisor.com/img/cdsi/img2/branding/socialWidget/20x28_green-21693-2.png"/></a>
                            </li>
                        </ul>
                    </div>
                    <script src="http://www.jscache.com/wejs?wtype=socialButtonBubbles&amp;uniq=789&amp;locationId=258705&amp;color=green&amp;size=rect&amp;lang=en_US&amp;display_version=2"></script>
                </div>
                <ul class="admin-ul">
                    <?php if ((Yii::$app->getSession()->get("customer") == null)) { ?>
                        <li><a href="#">Site map</a></li>
                        <li><a href="<?= $this->context->baseUrl ?>login.html">Login</a></li>
                    <?php } else { ?>
                        <li><a href="<?= $this->context->baseUrl ?>profile.html">Login as <?= Yii::$app->getSession()->get("customer")->firstName . " " . Yii::$app->getSession()->get("customer")->lastName ?></a></li>
                        <li><a href="<?= $this->context->baseUrl ?>logout.html">Logout</a></li>
                    <?php } ?>
                </ul>
                <div class="box-social">
                    <a href="<?= !empty($home) && isset($home['FACEBOOK']) ? $home['FACEBOOK'] : '' ?>"><span class="icon-facebook"></span></a>
                    <a href="<?= !empty($home) && isset($home['TWITTER']) ? $home['TWITTER'] : '' ?>"><span class="icon-twitter"></span></a>
                    <a href="<?= !empty($home) && isset($home['GOOGLE']) ? $home['GOOGLE'] : '' ?>"><span class="icon-googleplus"></span></a>
                    <a href="<?= !empty($home) && isset($home['YOUTUBE']) ? $home['YOUTUBE'] : '' ?>"><span class="icon-youtube"></span></a>
                    <a href="<?= !empty($home) && isset($home['PINTEREST']) ? $home['PINTEREST'] : '' ?>"><span class="icon-pinterest"></span></a>
                    <a href="<?= !empty($home) && isset($home['TUMBLR']) ? $home['TUMBLR'] : '' ?>"><span class="icon-tumblr"></span></a>
                    <a href="<?= !empty($home) && isset($home['LINKIN']) ? $home['LINKIN'] : '' ?>"><span class="icon-linkin"></span></a>
                </div>
            </div><!-- container -->
        </div><!-- navigator -->
        <div class="header">
            <div class="container">
                <div class="logo"><a href="<?= $this->context->baseUrl ?>"><img src="<?= $this->context->baseUrl ?>images/logo.png" alt="logo" /></a></div>
                <div class="menu-expand"><i class="fa fa-bars"></i>Menu</div>
                <div class="menu">
                    <ul>
                        <?php if (!empty($menus)) { ?>
                            <?php foreach ($menus as $menu) { ?>
                                <?php if ($menu->parentId == 0) { ?>
                                    <li class="<?= isset($this->context->var['menuactive']) && $this->context->var['menuactive'] == $menu->link ? 'active' : 'li-submenu' ?>"><a href="<?= $menu->link ?>"><?= $menu->name ?><span class="btn-submenu fa fa-plus"></span></a>
                                        <div class="submenu">
                                            <ul>
                                                <?php foreach ($menus as $submenu) { ?>
                                                    <?php if ($submenu->parentId != 0 && $submenu->parentId == $menu->id) { ?>
                                                        <li>
                                                            <div class="submenu-item">
                                                                <div class="si-thumb"><a href="<?= $submenu->link ?>"><img src="<?= !empty($submenu->images) ? $submenu->images[0] : $this->context->baseUrl . 'images/no-avatar.jpg' ?>" alt="<?= $submenu->link ?>" /></a></div>
                                                                <a class="si-title" href="<?= $submenu->link ?>"><?= $submenu->name ?></a>
                                                            </div>
                                                        </li>
                                                    <?php } ?>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </li>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                </div><!-- menu -->
            </div><!-- container -->
        </div><!-- header -->
        <div class="box-center">
            <div class="box-support">
                <div class="container">
                    <div class="bs-inline">
                        <i class="fa fa-phone"></i>
                        Hot line:<b class="text-danger"><?= !empty($home) && isset($home['HOT_LINE']) ? $home['HOT_LINE'] : '' ?></b>
                    </div>
                    <div class="bs-inline">
                        <i class="fa fa-envelope"></i>
                        Email: <a class="text-primary" href="mailto:<?= !empty($home) && isset($home['EMAIL_INFO']) ? $home['EMAIL_INFO'] : '' ?>"><b><?= !empty($home) && isset($home['EMAIL_INFO']) ? $home['EMAIL_INFO'] : '' ?></b></a>
                    </div>
                    <div class="bs-inline">
                        Chat online:
                        <a href="Skype:<?= !empty($home) && isset($home['SKYPE']) ? $home['SKYPE'] : '' ?>?chat"><i class="fa fa-skype"></i></a>
                        <a href="ymsgr:sendim?<?= !empty($home) && isset($home['YAHOO']) ? $home['YAHOO'] : '' ?>"><img src="http://opi.yahoo.com/online?u=lee_haira&amp;m=g&amp;t=5"></a>
                    </div>
                </div><!-- container -->
            </div><!-- box-support -->
            <div class="container">
                <ol class="breadcrumb">
                    <li>You are here :<a href="<?= $this->context->baseUrl ?>">Panorama</a></li>
                    <?php if (!empty($this->context->var['breadcrumb'])) { ?>
                        <?php foreach ($this->context->var['breadcrumb'] as $key => $value) { ?>
                            <?php if ($key == sizeof($this->context->var['breadcrumb']) - 1) { ?>
                                <li class="active"><?= $value['name'] ?></li>
                            <?php } else { ?>
                                <li><a href="<?= $this->context->baseUrl . $value['link'] ?>"><?= $value['name'] ?></a></li>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                </ol>
            </div><!-- container -->
        </div><!-- box-center -->
        <?= $content ?>
        <div class="footer">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label class="footer-lb">About Us<span class="fa fa-plus"></span></label>
                                    <div class="footer-content">
                                        <ul class="list-ul">
                                            <li><a href="<?= !empty($home) && isset($home['WHY_US']) ? $home['WHY_US'] : '' ?>"><i class="fa fa fa-angle-right"></i>Why us</a></li>
                                            <li><a href="<?= !empty($home) && isset($home['MEET_OUR_TEAM']) ? $home['MEET_OUR_TEAM'] : '' ?>"><i class="fa fa fa-angle-right"></i>Meet our team</a></li>
                                            <li><a href="<?= !empty($home) && isset($home['FOR_AFFILIATES']) ? $home['FOR_AFFILIATES'] : '' ?>"><i class="fa fa fa-angle-right"></i>For Affiliates</a></li>
                                            <li><a href="<?= !empty($home) && isset($home['REQUEST_FORM']) ? $home['REQUEST_FORM'] : '' ?>"><i class="fa fa fa-angle-right"></i>Request Form</a></li>
                                        </ul>   
                                    </div><!-- footer-content -->
                                </div><!-- col -->
                                <div class="col-sm-3">
                                    <label class="footer-lb">Quick Links<span class="fa fa-plus"></span></label>
                                    <div class="footer-content">
                                        <ul class="list-ul">
                                            <li><a href="<?= !empty($home) && isset($home['TERMS_OF_USE']) ? $home['TERMS_OF_USE'] : '' ?>"><i class="fa fa fa-angle-right"></i>Terms of Use</a></li>
                                            <li><a href="<?= !empty($home) && isset($home['PRIVACY_POLICY']) ? $home['PRIVACY_POLICY'] : '' ?>"><i class="fa fa fa-angle-right"></i>Privacy Policy</a></li>
                                            <li><a href="<?= !empty($home) && isset($home['TRAVEL_GUIDES']) ? $home['TRAVEL_GUIDES'] : '' ?>"><i class="fa fa fa-angle-right"></i>Travel Guides</a></li>
                                            <li><a href="<?= !empty($home) && isset($home['CONTACT_US']) ? $home['CONTACT_US'] : '' ?>"><i class="fa fa fa-angle-right"></i>Contact us</a></li>
                                            <li><a href="<?= !empty($home) && isset($home['SITEMAP']) ? $home['SITEMAP'] : '' ?>"><i class="fa fa fa-angle-right"></i>Sitemap</a></li>
                                        </ul>
                                    </div><!-- footer-content -->
                                </div><!-- col -->
                                <div class="col-sm-3">
                                    <label class="footer-lb">Virtual Experience<span class="fa fa-plus"></span></label>
                                    <div class="footer-content">
                                        <ul class="list-ul">
                                            <li><a href="<?= !empty($home) && isset($home['CLIENT_MEMOIRS']) ? $home['CLIENT_MEMOIRS'] : '' ?>"><i class="fa fa fa-angle-right"></i>Client Memoirs</a></li>
                                            <li><a href="<?= !empty($home) && isset($home['WONDERFUL_MOMENTS']) ? $home['WONDERFUL_MOMENTS'] : '' ?>"><i class="fa fa fa-angle-right"></i>Wonderful moments</a></li>
                                            <li><a href="<?= !empty($home) && isset($home['IMPRESSIVE_JOURNEYS']) ? $home['IMPRESSIVE_JOURNEYS'] : '' ?>"><i class="fa fa fa-angle-right"></i>Impressive Journeys</a></li>
                                        </ul>
                                    </div><!-- footer-content -->
                                </div><!-- col -->
                                <div class="col-sm-3">
                                    <label class="footer-lb">Service Improvement<span class="fa fa-plus"></span></label>
                                    <div class="footer-content">
                                        <ul class="list-ul">
                                            <li><a href="<?= !empty($home) && isset($home['SERVICE_REVIEWS']) ? $home['SERVICE_REVIEWS'] : '' ?>"><i class="fa fa fa-angle-right"></i>Service reviews</a></li>
                                            <li><a href="<?= !empty($home) && isset($home['QUESTIONS_ANSWERS']) ? $home['QUESTIONS_ANSWERS'] : '' ?>"><i class="fa fa fa-angle-right"></i>Questions & Answers</a></li>
                                            <li><a href="<?= !empty($home) && isset($home['NEWSLETTER']) ? $home['NEWSLETTER'] : '' ?>"><i class="fa fa fa-angle-right"></i>Newsletter</a></li>
                                        </ul>
                                    </div><!-- footer-content -->
                                </div><!-- col -->
                            </div><!-- row -->
                        </div><!-- col -->
                        <div class="col-md-2">
                            <div id="TA_rated687" class="TA_rated">
                                <ul id="El9M7JVro9lg" class="TA_links KNtt3LI">
                                    <li id="69uGck" class="cogSb3t7S5">
                                        <a target="_blank" href="http://www.tripadvisor.com/"><img src="http://www.tripadvisor.com/img/cdsi/img2/badges/ollie-11424-2.gif" alt="TripAdvisor"/></a>
                                    </li>
                                </ul>
                            </div>
                            <script src="http://www.jscache.com/wejs?wtype=rated&amp;uniq=687&amp;locationId=258705&amp;lang=en_US&amp;display_version=2"></script>
                        </div><!-- col -->
                    </div><!-- row -->
                </div><!-- container -->
            </div><!-- footer-top -->
            <div class="footer-menu">
                <div class="container">
                    <ul>
                        <?php if (!empty($menus)) { ?>
                            <?php foreach ($menus as $menu) { ?>
                                <?php if ($menu->parentId == 0) { ?>
                                    <li class=""><a href="<?= $menu->link ?>"><?= $menu->name ?></a>
                                    </li>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                </div><!-- container -->
            </div><!-- footer-menu -->
            <div class="copyright">
                <div class="container">
                    <p>Vietnam Discovery Tour</p>
                    <p>Address: <?= !empty($home) && isset($home['ADDRESS']) ? $home['ADDRESS'] : '' ?></p>
                    <p>Number of Licence: 01- 420/2014/TCDL-GPLHQT</p>
                    <p>Hotline:<?= !empty($home) && isset($home['HOT_LINE']) ? $home['HOT_LINE'] : '' ?> - Email: <?= !empty($home) && isset($home['EMAIL_INFO']) ? $home['EMAIL_INFO'] : '' ?></p>
                </div><!-- container -->
            </div><!-- copyright -->
        </div><!-- footer -->
        <?php $this->endBody() ?>
        <script type="text/javascript" >
            var account = '<?= Yii::$app->user->getId() ?>';
            var baseUrl = '<?= $this->context->baseUrl; ?>';
<?= $this->context->staticClient; ?>
        </script>
        <script type="text/javascript">
            var __lc = {};
            __lc.license = 6122481;

            (function () {
                var lc = document.createElement('script');
                lc.type = 'text/javascript';
                lc.async = true;
                lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(lc, s);
            })();
        </script>
    </body>
</html>
<?php $this->endPage() ?>
