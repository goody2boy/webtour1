<?php

use common\util\TextUtils;
use common\util\UrlUtils;
?>

<div class="container">
    <div class="city-info">
        <div class="ci-left" style="background-color:<?= $city->bg_color ?>;">
            <div class="ci-title"><?= $city->name ?></div>
            <div class="ci-desc">
                <?= $city->description ?>
            </div><!-- ci-desc -->
        </div><!-- ci-left -->
        <div class="ci-right">
            <div id="infoslider" class="owl-carousel owl-theme owl-loaded">
                <div class="owl-stage-outer">
                    <?php foreach ($city->images as $img) { ?>
                        <div class="info-item">
                            <img src="<?= $this->context->baseUrl . $img->imageId ?>" alt="slider">
                        </div>
                    <?php } ?>
                </div>
                <div class="owl-controls"><div class="owl-nav"><div class="owl-prev" style="display: none;">prev</div><div class="owl-next" style="display: none;">next</div></div><div class="owl-dots" style=""><div class="owl-dot"><span></span></div><div class="owl-dot"><span></span></div><div class="owl-dot active"><span></span></div><div class="owl-dot"><span></span></div></div></div></div><!-- owl-carousel -->	
        </div><!-- ci-right -->
        <div class="clearfix"></div>
    </div><!-- city-info -->
    <div class="city-type">
        <div class="ct-inner">
            <label>Select tour type</label>
            <select class="form-control">
                <option value="0">All</option>
                <?php foreach ($categories as $cate) { ?>
                    <option value="<?= $cate->id ?>"><?= $cate->name ?></option>
                <?php } ?>
            </select>
        </div>
    </div><!-- city-type -->
    <div class="city-tour">
        <ul>
            <?php foreach ($listTours->data as $tour) { ?>
                <li>
                    <div class="tour-item">
                        <div class="tour-title" style="background-color:<?= $city->bg_color ?>;">
                            <a href="<?= $this->context->baseUrl . UrlUtils::tour($tour->title, $tour->id) ?>"><?= $tour->title ?></a>
                        </div>
                        <div class="tour-thumb">
                            <a href="<?= $this->context->baseUrl . UrlUtils::tour($tour->title, $tour->id) ?>"><img src="<?= $this->context->baseUrl . $tour->images[0]->imageId ?>" alt="img"></a>
                        </div>
                        <div class="tour-content">
                            <div class="tour-rating">
                                <i class="fa fa-star yellow"></i>
                                <i class="fa fa-star yellow"></i>
                                <i class="fa fa-star yellow"></i>
                                <i class="fa fa-star yellow"></i>
                                <i class="fa fa-star"></i>
                                <a href="#">See 1 reviews</a>
                            </div>
                            <div class="tour-row">Tour type: 
                                <div class="td-text">
                                    <?php for ($i = 0; $i < count($tour->categories); $i ++) { ?>
                                        <?php $cate = $tour->categories[$i]; ?>
                                        <a href="<?= $this->context->baseUrl . UrlUtils::tourtype($cate->name, $cate->id) ?>"><?= $cate->name ?></a>
                                        <?php if ($i < count($tour->categories) - 1) { ?>
                                            <?= " - " ?> 
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="tour-row">Duration: <?= $tour->duration_time ?> Day</div>
                            <div class="tour-row tour-desc">
                                <?= $tour->description ?>
                            </div>
                        </div>
                        <div class="tour-bottom">
                            <span class="tour-price">Start from: <span>$<?= $tour->minprice ?></span></span>
                            <a class="btn btn-primary btn-sm" href="<?= $this->context->baseUrl . UrlUtils::tour($tour->title, $tour->id) ?>">Let's go</a>
                        </div>
                    </div><!-- tour-item -->
                </li>
            <?php } ?>
        </ul>
        <div class="clearfix"></div>
    </div>
</div>