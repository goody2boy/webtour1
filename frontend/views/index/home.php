<?php

use common\util\TextUtils;
use common\util\UrlUtils;
?>
<div class="box-slider">
    <div id="layerslider" style="width:100%;height:620px;max-width: 1600px;">
        <?php if (!empty($heart)) { ?>
            <?php foreach ($heart as $banner) { ?>
                <div class="ls-slide" data-ls="slidedelay: 4000; transition2d: all">
                    <img class="ls-bg" src="<?= (sizeof($banner->images) > 0) ? $banner->images[0] : '' ?>" alt="slider" />
                    <?php
                    if (!empty($banner->description)) {
//                        $des = split(",", $banner->description);
                        $des = preg_split("/,/", $banner->description);
                    }
                    ?>
                    <?php $top = 100;$delay = 500;foreach ($des as $d) {?>
                    <div class="bs-label ls-l" style="top:<?= $top ?>px; left:900px;" data-ls="offsetxin:right; delayin:<?= $delay ?>; easingin:easeOutBack; fadein:false; scalexin:0.1; scaleyin:0.1; offsetxout:right; durationout:750; fadeout:false; scalexout:0.1; scaleyout:0.1;">
                            <div class="bs-text"><?= $d ?></div>
                        </div>
                    <?php $top+=60;$delay+=300;} ?>
                    <?php if (!empty($banner->link)) { ?>
                        <a class="btn btn-primary btn-lg ls-l" style="top:340px; left:900px;" data-ls="offsetxin:right; delayin:1700; easingin:easeOutBack; fadein:false; scalexin:0.1; scaleyin:0.1; offsetxout:right; durationout:750; fadeout:false; scalexout:0.1; scaleyout:0.1;" href="<?= $banner->link ?>">Xem thêm</a>
                    <?php } ?>
                </div><!-- ls-slide -->
            <?php } ?>
        <?php } ?>
    </div><!-- layerslider -->    
</div><!-- box-slider -->
<div class="container">
    <div class="box-about" id="about-id">
        <div class="row md-reset-all">
            <?php if (!empty($news)) { ?>
                <?php
                $k = 0;
                foreach ($news as $new) {
                    ?>
                    <div class="col-md-4 reset-padding-all">
                        <div class="grid">
                            <div class="img">
                                <span class="ba-icon"><i class="<?= $new->icon ?>"></i></span>
                                <span class="ba-line"></span>
                            </div>
                            <div class="g-content">
                                <div class="g-row">
                                    <a class="g-title" href="<?= $this->context->baseUrl . UrlUtils::news($new->alias) ?>"><?= $new->name ?></a>
                                </div>
                                <div class="g-row">
                                    <?= $new->description ?>
                                </div>
                                <div class="g-row">
                                    <a class="btn btn-primary" href="<?= $this->context->baseUrl . UrlUtils::news($new->alias) ?>">Xem thêm</a>
                                </div>
                            </div>
                        </div><!-- grid -->
                    </div><!-- col -->
                    <?php
                    if ($k == 2) {
                        break;
                    }
                    ?>
                    <?php
                    $k++;
                }
                ?>
            <?php } ?>
        </div><!-- row -->
    </div><!-- box-about -->
</div><!-- container -->  
<div class="box-video" id="video-id">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="box">
                    <div class="box-title">
                        <div class="lb-name">Video</div>
                        <div class="lb-desc">Những Video mới nhất của Airocide</div>
                    </div><!-- box-title -->
                    <div class="box-content">
                        <div class="video-ul">
                            <ul>
                                <?php if (!empty($videos)) { ?>
                                    <?php
                                    $i = 0;
                                    foreach ($videos as $video) {
                                        ?>
                                        <li data="listvideo" data-key="<?= $video->id ?>" class="<?= $i == 0 ? 'active' : '' ?>"><a onclick="index.select('<?= $video->id ?>')"><i class="fa fa-play"></i><?= $video->name ?></a></li>
                                        <?php
                                        $i++;
                                    }
                                    ?>
                                <?php } ?>
                            </ul>
                        </div>
                    </div><!-- box-content -->
                </div><!-- box -->
            </div><!-- col -->
            <?php if (isset($videos[0])) { ?>
                <div class="col-sm-6">
                    <div class="video-thumb">
                        <div class="embed-responsive embed-responsive-4by3" id="video">
                            <iframe class="embed-responsive-item" src="//www.youtube.com/embed/<?= $videos[0]->id ?>" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div><!-- col -->
            <?php } ?>
        </div><!-- row -->
    </div><!-- container -->
</div><!-- box-video -->
<div class="container">
    <div class="box" id="product-id">
        <div class="box-title">
            <div class="lb-name">Sản phẩm</div>
            <div class="lb-desc">Những sản phẩm mới nhất của Airocide</div>
        </div><!-- box-title -->
        <div class="box-content">
            <div class="homeproduct-slider">
                <div id="hpslider" class="owl-carousel">
                    <?php if (!empty($items)) { ?>
                        <?php foreach ($items as $item) { ?>
                            <div class="hp-item">
                                <a href="<?= $this->context->baseUrl . UrlUtils::item($item->name, $item->id) ?>">
                                    <span class="hp-thumb"><img src="<?= (isset($item->images[0]) ? $item->images[0] : $this->context->baseUrl . 'images/no_avatar.png') ?>" alt="<?= $item->name ?>" /></span>
                                    <span class="hp-title"><?= $item->name ?></span>
                                    <i class="fa fa-search-plus"></i>
                                </a>	
                            </div><!-- hp-item -->
                        <?php } ?>
                    <?php } ?>
                </div><!-- owl-carousel -->
            </div><!-- homeproduct-slider -->
        </div><!-- box-content -->
    </div><!-- box -->
    <div class="box-banner">
        <?php if (!empty($center)) { ?>
            <a href="<?= $center[0]->link ?>"><img src="<?= isset($center[0]->images[0]) ? $center[0]->images[0] : '' ?>" alt="banner" /></a>
        <?php } ?>
    </div>
    <div class="box" id="app-id">
        <div class="box-title">
            <div class="lb-name">Ứng dụng airocide</div>
            <div class="submenu-ul">
                <ul class="news-tabs">
                    <?php if (!empty($data)) { ?>
                        <?php
                        $count = 0;
                        foreach ($data as $c) {
                            ?>
                            <?php if ($c->tabOne == 1) { ?>
                                <li class="<?= $count == 0 ? 'active' : '' ?>"><a href="#<?= $c->alias ?>"><i class="<?= $c->icon ?>"></i><?= $c->name ?></a></li>
                                <?php
                                $count++;
                            }
                            ?>
                        <?php } ?>
                    <?php } ?>
                </ul>
            </div>
        </div><!-- box-title -->
        <div class="box-content">
            <div class="homenews-slider">
                <?php if (!empty($data)) { ?>
                    <?php
                    $count = 0;
                    foreach ($data as $c) {
                        ?>
                        <?php if ($c->tabOne == 1) { ?>
                            <div class="hs-content <?= $count == 0 ? 'active' : '' ?>" id="<?= $c->alias ?>">
                                <div class="hnslider owl-carousel">
                                    <?php if (!empty($c->app)) { ?>
                                        <?php
                                        $x = 0;
                                        foreach ($c->app as $app) {
                                            ?>
                                            <div class="hn-item">
                                                <div class="hn-thumb"><a href="<?= $this->context->baseUrl . UrlUtils::news($app->alias) ?>"><img src="<?= (isset($app->images[0]) ? $app->images[0] : $this->context->baseUrl . 'images/no_avatar.png') ?>" alt="img" /></a></div> 
                                                <div class="hn-row">
                                                    <a class="hn-title" href="<?= $this->context->baseUrl . UrlUtils::news($app->alias) ?>"><?= $app->name ?></a>
                                                </div> 
                                                <div class="hn-row">
                                                    <span class="hn-time"><span class="fa fa-clock-o"></span><?= TextUtils::convertTime($app->createTime) ?></span>
                                                </div>
                                                <div class="hn-row hn-desc">
                                                    <?= $app->description ?>
                                                </div>
                                                <div class="hn-button">
                                                    <span class="hn-view"><i class="fa fa-eye"></i><?= $app->viewCount ?></span>
                                                    <a class="btn btn-primary" href="<?= $this->context->baseUrl . UrlUtils::news($app->alias) ?>">Xem tiếp</a>
                                                </div>
                                            </div><!-- hn-item -->
                                            <?php
                                            if ($x == 8) {
                                                break;
                                            }
                                            $x++;
                                        }
                                        ?>
                                    <?php
                                    } else {
                                        echo "Không có dữ liệu";
                                    }
                                    ?> 
                                </div><!-- owl-carousel -->
                            </div><!-- hs-content -->
                            <?php
                            $count++;
                        }
                        ?>
    <?php } ?>
<?php } ?>      
            </div><!-- homenews-slider -->
        </div><!-- box-content -->
    </div><!-- box -->
    <div class="box" id="news-id">
        <div class="box-title">
            <div class="submenu-ul su-left">
                <ul class="news-tabs">
                    <?php if (!empty($data)) { ?>
                        <?php
                        $count = 0;
                        foreach ($data as $c) {
                            ?>
                            <?php if ($c->tabTwo == 1) { ?>
                                <li class="<?= $count == 0 ? 'active' : '' ?>"><a href="#<?= $c->alias ?>"><i class="<?= $c->icon ?>"></i><?= $c->name ?></a></li>
                                <?php
                                $count++;
                            }
                            ?>
    <?php } ?>
<?php } ?>
                </ul>
            </div>
        </div><!-- box-title -->
        <div class="box-content">
            <div class="homenews-slider">
                <?php if (!empty($data)) { ?>
                    <?php
                    $count = 0;
                    foreach ($data as $c) {
                        ?>
                                <?php if ($c->tabTwo == 1) { ?>
                            <div class="hs-content <?= $count == 0 ? 'active' : '' ?>" id="<?= $c->alias ?>">
                                <div class="hnslider owl-carousel">
                                    <?php if (!empty($c->new)) { ?>
                                        <?php
                                        $x = 0;
                                        foreach ($c->new as $app) {
                                            ?>
                                            <div class="hn-item">
                                                <div class="hn-thumb"><a href="<?= $this->context->baseUrl . UrlUtils::news($app->alias) ?>"><img src="<?= (isset($app->images[0]) ? $app->images[0] : $this->context->baseUrl . 'images/no_avatar.png') ?>" alt="img" /></a></div> 
                                                <div class="hn-row">
                                                    <a class="hn-title" href="<?= $this->context->baseUrl . UrlUtils::news($app->alias) ?>"><?= $app->name ?></a>
                                                </div> 
                                                <div class="hn-row">
                                                    <span class="hn-time"><span class="fa fa-clock-o"></span><?= TextUtils::convertTime($app->createTime) ?></span>
                                                </div>
                                                <div class="hn-row hn-desc">
                    <?= $app->description ?>
                                                </div>
                                                <div class="hn-button">
                                                    <span class="hn-view"><i class="fa fa-eye"></i><?= $app->viewCount ?></span>
                                                    <a class="btn btn-primary" href="<?= $this->context->baseUrl . UrlUtils::news($app->alias) ?>">Xem tiếp</a>
                                                </div>
                                            </div><!-- hn-item -->
                                            <?php
                                            if ($x == 8) {
                                                break;
                                            }
                                            $x++;
                                        }
                                        ?>
                            <?php
                            } else {
                                echo "Không có dữ liệu";
                            }
                            ?> 
                                </div><!-- owl-carousel -->
                            </div><!-- hs-content -->
            <?php
            $count++;
        }
        ?>
    <?php } ?>
<?php } ?>      
            </div><!-- homenews-slider -->
        </div><!-- box-content -->
    </div><!-- box -->
    <div class="box" id="guest-id">
        <div class="box-title">
            <div class="lb-name">Khách hàng - Đối tác</div>
            <div class="lb-desc">Những khách hàng - đối tác tiêu biểu</div>
        </div><!-- box-title -->
        <div class="box-content">
            <div class="homelogo-slider">
                <div id="logoslider" class="owl-carousel">
                    <?php if (!empty($partners)) { ?>
    <?php foreach ($partners as $partner) { ?>
                            <div class="logo-item">
                                <a target="_blank" href="<?= $partner->website ?>"><img src="<?= (isset($partner->images[0]) ? $partner->images[0] : $this->context->baseUrl . 'images/no_avatar.png') ?>" alt="<?= $partner->name ?>" /></a>	
                            </div><!-- logo-item -->
    <?php } ?>
<?php } ?>
                </div><!-- owl-carousel -->
            </div><!-- homelogo-slider -->
        </div><!-- box-content -->
    </div><!-- box -->
</div><!-- container -->