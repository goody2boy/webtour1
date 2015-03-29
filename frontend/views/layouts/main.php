<?php

use common\util\UrlUtils;
use frontend\assets\AppAsset;
use frontend\assets\LibAsset;
use frontend\assets\WebAsset;
use yii\helpers\Html;

AppAsset::register($this);
LibAsset::register($this);
WebAsset::register($this);

$reviews = isset($this->context->var["reviews"]) ? $this->context->var["reviews"] : '';
$albums = isset($this->context->var["albums"]) ? $this->context->var["albums"] : '';
$menus = isset($this->context->var["menus"]) ? $this->context->var["menus"] : '';
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
                <a class="logo" href="<?= $this->context->baseUrl ?>"></a>
                <div class="sologan"><?= $this->context->var['home']->slogan ?></div>
                <div class="hotline">
                    <i class="fa fa-phone"></i>
                    <?= $this->context->var['home']->hotline ?>
                </div>
                <div class="social-icons">
                    <a target="_blank" href="<?= $this->context->var['home']->facebook ?>"><i class="fa fa-facebook"></i></a>
                    <a target="_blank" href="<?= $this->context->var['home']->twitter ?>"><i class="fa fa-twitter"></i></a>
                    <a target="_blank" href="<?= $this->context->var['home']->youtube ?>"><i class="fa fa-youtube"></i></a>
                    <!--<a href="#"><i class="fa fa-pinterest"></i></a>-->
                </div>
            </div><!-- container -->
        </div><!-- navigator -->
        <div class="navbar navbar-default"> 	
            <div class="navbar-header">
                <div class="container">
                    <a class="navbar-brand" href="<?= $this->context->baseUrl ?>"></a>
                    <div class="sologan"></div>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#airocide-navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="header-right">
                        <div class="header-logo">
                            <ul>
                                <li><a href="#"><img src="<?= $this->context->baseUrl ?>images/logo1.png" alt="logo" /></a></li>
                                <li><a href="#"><img src="<?= $this->context->baseUrl ?>images/logo2.png" alt="logo" /></a></li>
                                <li><a href="#"><img src="<?= $this->context->baseUrl ?>images/logo3.png" alt="logo" /></a></li>
                                <li><a href="#"><img src="<?= $this->context->baseUrl ?>images/logo4.png" alt="logo" /></a></li>
                            </ul>
                        </div><!-- header-logo -->
                        <div class="hotline">
                            <i class="fa fa-phone"></i>
                            <label>Hotline:&nbsp;</label>0912.838.198 
                        </div><!-- hotline -->
                    </div><!-- header-right -->
                </div><!-- container -->
            </div><!-- navbar-header -->
            <div class="collapse navbar-collapse" id="airocide-navbar">
                <div class="container">
                    <ul class="nav navbar-nav">
                        <?php if (!empty($menus)) { ?>
                            <?php foreach ($menus as $menu) { ?>
                                <?php if ($menu->parentId == 0) { ?>
                                    <?php
                                    $z = 0;
                                    foreach ($menus as $submenu) {
                                        ?>
                                        <?php
                                        if ($submenu->parentId != 0 && $submenu->parentId == $menu->id) {
                                            $z++
                                            ?>
                                        <?php } ?>
                                    <?php } ?>
                                    <li class="<?= ($z > 0) ? 'dropdown ' : '' ?><?= isset($this->context->var['menuactive']) && $this->context->var['menuactive'] == $menu->link ? 'active' : '' ?>">
                                        <a href="<?= $menu->link ?>"><?= $menu->name ?> <?php if ($z > 0) { ?><span class="caret"></span><span class="btn-submenu fa fa-plus"></span><?php } ?></a>
                                        <?php if ($z > 0) { ?>
                                            <ul class="dropdown-menu">
                                                <?php foreach ($menus as $submenu) { ?>
                                                    <?php if ($submenu->parentId != 0 && $submenu->parentId == $menu->id) { ?>
                                                        <li><a href="<?= $submenu->link ?>"><?= $submenu->name ?></a></li>
                                                    <?php } ?>
                                                <?php } ?>
                                            </ul>
                                        <?php } ?>
                                    </li>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                        <li class="li-order"><a href="<?= $this->context->baseUrl . UrlUtils::checkout() ?>">Đặt mua</a></li>
                    </ul>
                </div>
            </div><!-- /.navbar-collapse -->
        </div><!-- navbar -->
        <?= $content ?>
        <div class="footer">
            <div class="container">
                <div class="row md-reset-5">
                    <div class="col-md-4 padding-all-5">
                        <div class="logo-footer"><a href="<?= $this->context->baseUrl ?>"><img src="<?= $this->context->baseUrl ?>images/logo-footer.png" alt="logo" /></a></div>
                        <p class="fad-p">Công ty cổ phần Airocide Việt Nam</p>
                        <ul class="fad-ul">
                            <li>
                                <span class="fad-icon"><i class="fa fa-map-marker"></i></span>
                                P801 Tòa CTM (B) - 299 Cầu Giấy - Hà Nội.
                            </li>
                            <li>
                                <span class="fad-icon"><i class="fa fa-phone"></i></span>
                                <?= $this->context->var['home']->phone ?>
                            </li>
                            <li>
                                <span class="fad-icon"><i class="fa fa-envelope"></i></span>
                                <?= $this->context->var['home']->emailcontact ?>
                            </li>
                            <li>
                                <span class="fad-icon"><i class="fa fa-envelope"></i></span>
                                <?= $this->context->var['home']->emailceo ?>
                            </li>
                        </ul>
                        <div class="footer-order"><a href="<?= $this->context->baseUrl . UrlUtils::checkout() ?>">Đặt mua</a></div>
                        <div class="footer-social">
                            <a target="_blank" href="<?= $this->context->var['home']->facebook ?>"><i class="fa fa-facebook"></i></a>
                            <a target="_blank" href="<?= $this->context->var['home']->twitter ?>"><i class="fa fa-twitter"></i></a>
                            <a target="_blank" href="<?= $this->context->var['home']->youtube ?>"><i class="fa fa-youtube"></i></a>
                            <!--<a href="#"><i class="fa fa-pinterest"></i></a>-->
                        </div>
                    </div><!-- col -->
                    <div class="col-md-4 padding-all-5 ipad-hidden">
                        <div class="box">
                            <div class="box-title">
                                <div class="lb-name">Ý kiến khách hàng</div>
                                <div class="lb-desc">Những ý kiến nhiều người quan tâm nhất</div>
                            </div><!-- box-title -->
                            <div class="box-content">
                                <div class="home-comment">
                                    <?php if (is_array($reviews)) { ?>
                                        <?php foreach ($reviews as $review) { ?>
                                            <?php if ($review->active == 1 && $review->home == 1) { ?>
                                                <div class="grid">
                                                    <div class="img"><img src="<?= (isset($review->images[0]) ? $review->images[0] : $this->context->baseUrl . 'images/no_avatar.png') ?>" alt="<?= $review->name ?>" /></div>
                                                    <div class="g-content">
                                                        <div class="g-row">
                                                            <span class="g-title"><?= $review->name ?></span>
                                                        </div>
                                                        <div class="g-row">
                                                            <i class="fa fa-quote-left"></i>
                                                            <?= $review->description ?>
                                                            <i class="fa fa-quote-right"></i>
                                                        </div>
                                                    </div>
                                                </div><!-- grid -->
                                            <?php } ?>
                                        <?php } ?>
                                    <?php } ?>
                                </div><!-- home-comment -->
                                <div class="footer-more"><a href="<?= $this->context->baseUrl . UrlUtils::reviews() ?>">Chia sẻ của bạn về Airocide<i class="fa fa-angle-double-right"></i></a></div>
                            </div><!-- box-content -->
                        </div><!-- box -->
                    </div><!-- col -->
                    <div class="col-md-4 padding-all-5 ipad-hidden">
                        <div class="box">
                            <div class="box-title">
                                <div class="lb-name">Thư viện hình ảnh</div>
                                <?php if (is_array($albums)) { ?>
                                    <?php foreach ($albums as $album) { ?>
                                        <?php if ($album->active == 1 && $album->home == 1) { ?>
                                            <div class="lb-desc"><?= $album->name ?></div>
                                        </div><!-- box-title -->
                                        <div class="box-content">
                                            <div class="home-gallery">
                                                <?php if (is_array($album->images) && !empty($album->images)) { ?>
                                                    <?php for ($i = 0; $i < count($album->images); $i++) { ?>
                                                        <a class="gallery-group" rel="footer-group" href="<?= $this->context->baseUrl . isset($album->images[$i]) ? $album->images[$i] : 'images/no_avatar.png' ?>">
                                                            <img src="<?= $this->context->baseUrl . isset($album->images[$i]) ? $album->images[$i] : 'images/no_avatar.png' ?>" alt="img" />
                                                            <i class="fa fa-search-plus"></i>
                                                        </a>
                                                        <?php
                                                        if ($i == 5) {
                                                            break;
                                                        }
                                                        ?>
                                                    <?php } ?>
                                                <?php } ?>
                                            </div>
                                            <div class="footer-more"><a href="<?= $this->context->baseUrl . UrlUtils::album() ?>">Xem thêm thư viện hình ảnh<i class="fa fa-angle-double-right"></i></a></div>
                                        </div><!-- box-content -->
                                    <?php } ?>
                                <?php } ?>
                            <?php } ?>
                        </div><!-- box -->
                    </div><!-- col -->
                </div><!-- row -->
            </div><!-- container -->
        </div><!-- footer -->
        <div class="menu-footer">
            <div class="container">
                <ul>
                    <?php if (!empty($menus)) { ?>
                        <?php foreach ($menus as $menu) { ?>
                            <?php if ($menu->parentId == 0) { ?>
                                <li><a href="<?= $menu->link ?>"><?= $menu->name ?></a></li>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                </ul>
                <div class="copyright">
                    © Copyright 2014 Airocide.JSC, All rights reserved
                </div>
            </div><!-- container -->
        </div><!-- menu-footer -->
        <?php if (isset($this->context->var["left"]) && $this->context->var["left"] == 1) { ?>
            <div class="menu-sidebar">
                <ul>
                    <li><a href="#about-id"><i class="fa fa-info"></i><span class="ms-name">Giới thiệu</span></a></li>
                    <li><a href="#video-id"><i class="fa fa-video-camera"></i><span class="ms-name">Video</span></a></li>
                    <li><a href="#product-id"><i class="fa fa-cube"></i><span class="ms-name">Sản phẩm</span></a></li>
                    <li><a href="#app-id"><i class="fa fa-asterisk"></i><span class="ms-name">Ứng dụng</span></a></li>
                    <li><a href="#news-id"><i class="fa fa-file-text"></i><span class="ms-name">Tin tức</span></a></li>
                    <li><a href="#guest-id"><i class="fa fa-users"></i><span class="ms-name">Khách hàng</span></a></li>
                </ul>
            </div>
        <?php } ?>
        <?php $this->endBody() ?>
        <script type="text/javascript" >
            $(document).ready(function() {

                $('#layerslider').layerSlider({
                    autoStart: true,
                    pauseOnHover: false,
                    autoPlayVideos: false,
                    skinsPath: '/skins/',
                    responsive: false,
                    responsiveUnder: 1280,
                    layersContainer: 1280,
                });

            });

            var account = '<?= Yii::$app->user->getId() ?>';
            var baseUrl = '<?= $this->context->baseUrl; ?>';
<?= $this->context->staticClient; ?>
        </script>
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=721254621281061&version=v2.0";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
//            $(document).keydown(function(ev) {
//                ev = ev || window.event;
//                kc = ev.keyCode || ev.which;
//                if ((ev.ctrlKey || ev.metaKey) && kc) {
//                    if (kc == 99 || kc == 67 || kc == 88) {
//                        return false;
//                    }
//                }
//            });
            //$(document).bind("contextmenu",function(e){ e.preventDefault(); });
        </script>
    </body>
</html>
<?php $this->endPage() ?>
