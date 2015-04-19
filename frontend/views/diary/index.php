<?php

use common\util\TextUtils;
use common\util\UrlUtils;
use yii\data\Pagination;
use yii\widgets\LinkPager;
?>
<div class="container">
    <div class="big-title">
        <div class="lb-name">Photos</div>
    </div><!-- big-title -->
    <div class="menu-hoz">
        <ul>
            <li><a href="#">View all</a></li>
            <li><a href="#">Charming Vietnam</a></li>
            <li><a href="#">Vietnam portrait</a></li>
            <li><a href="#">Vietnam season</a></li>
            <li><a href="#">Vietnam cuisine</a></li>
            <li><a href="#">Clients memoirs</a></li>
        </ul>	
    </div><!-- menu-hoz -->
    <div class="photo-list">
        <ul>
            <?php foreach ($photos as $img) { ?>
                <li>
                    <div class="photo-item">
                        <div class="photo-thumb">
                            <a href="#"><img src="<?= $this->context->baseUrl . $img->imageId ?>" alt="img"></a>
                        </div>
                        <div class="photo-content">
                            <div class="photo-row"><a class="photo-title" href="#"><?= $img->caption != "" ? $img->caption : 'Photo at: ' . $img->target->title ?></a></div>
                            <div class="photo-row">Photo by: <?= $img->target->author->username ?></div>
                        </div>
                    </div><!-- photo-item -->
                </li>
            <?php } ?>
        </ul>
        <div class="clearfix"></div>
    </div><!-- photo-list -->
    <div class="big-title">
        <div class="lb-name">Our Clients<a class="btn btn-primary pull-right" href="#" data-toggle="modal" data-target="#ModalRating">Rating now!</a></div>
    </div><!-- big-title -->
    <div class="home-comment comment-list">
        <ul>
            <?php foreach ($reviews as $review) { ?>
                <li>
                    <div class="grid">
                        <div class="img"><a><img src="<?= $this->context->baseUrl . $review->tour->images[0]->imageId ?>" alt="img"></a></div>
                        <div class="g-content">
                            <div class="g-row">
                                <span class="g-title" href="#">
                                    <?= $review->review_title ?>
                                    <?php for ($i = 1; $i <= 5; $i++) { ?>
                                        <?php if ($i <= $review->rate) { ?>
                                            <i class="fa fa-star yellow"></i>
                                        <?php } else { ?>
                                            <i class="fa fa-star"></i>
                                        <?php } ?>
                                    <?php } ?>
                                </span>
                            </div>
                            <div class="g-row">
                                <?= $review->review_comment ?>
                            </div>
                            <div class="g-row">
                                <span class="g-from">From: <?= $review->tour->title ?></span>
                            </div>
                        </div>
                    </div><!-- grid -->
                </li>
            <?php } ?>
        </ul>
        <div class="clearfix"></div>
        <div class="comment-more"><a href="#"><i class="fa fa-long-arrow-right"></i>View all comments</a></div>
    </div><!-- home-comment -->
    <div id="tour-popup"/>
</div>
