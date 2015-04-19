<?php

use common\util\TextUtils;
use common\util\UrlUtils;
use yii\data\Pagination;
use yii\widgets\LinkPager;
use yii\captcha\Captcha;
?>
<div class="container">
    <div class="big-title">
        <div class="lb-name">Our Clients<a class="btn btn-primary pull-right" href="#" data-toggle="modal" data-target="#ModalRating">Rating now!</a></div>
    </div><!-- big-title -->
    <div class="home-comment comment-list">
        <ul>
            <?php foreach ($reviews as $review) { ?>
                <li>
                    <div class="grid">
                        <div class="img"><a>
                                <?php if (!empty($review->user->images)) { ?>
                                    <img src="<?= $this->context->baseUrl . ($review->user->images[0]->imageId != "" ? $review->user->images[0]->imageId : "data/user.jpg") ?>" alt="img">
                                <?php } else { ?>
                                    <img src="data/user.jpg" alt="img">
                                <?php } ?>
                            </a></div>
                        <div class="g-content">
                            <div class="g-row">
                                <span class="g-title" href="#">
                                    <?= $review->user->username ?>
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
                                <span class="g-from">From: <?= $review->user->address ?></span>
                            </div>
                        </div>
                    </div><!-- grid -->
                </li>
            <?php } ?>
        </ul>
        <div class="clearfix"></div>
    </div><!-- home-comment -->
    <div id="tour-popup"/>
</div>
<div class="modal fade in" id="ModalRating" tabindex="-1" role="dialog" aria-hidden="false" style="display: none;">
    <div class="modal-dialog">
        <form id="submit-review">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Your Review</h4>
                </div>
                <div class="modal-body">

                    <div class="rating-total">
                        <b>All rating:</b>
                        <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                        <span>by 45 reviews</span>
                    </div>
                    <div class="rating-count">
                        <i class="fa fa-star star5"></i><i class="fa fa-star star5"></i><i class="fa fa-star star5"></i><i class="fa fa-star star5"></i><i class="fa fa-star star5"></i>
                        <span class="rt-number">35</span>
                        <i class="fa fa-star star4"></i><i class="fa fa-star star4"></i><i class="fa fa-star star4"></i><i class="fa fa-star star4"></i>
                        <span class="rt-number">8</span>
                        <i class="fa fa-star star3"></i><i class="fa fa-star star3"></i><i class="fa fa-star star3"></i>
                        <span class="rt-number">2</span>
                        <i class="fa fa-star star2"></i><i class="fa fa-star star2"></i>
                        <span class="rt-number">0</span>
                        <i class="fa fa-star star1"></i>
                        <span class="rt-number">0</span>
                    </div>
                    <div class="form form-account">
                        <div class="row">
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <input name="name" type="text" class="form-control" placeholder="Your name">
                                </div><!-- form-group -->
                            </div><!-- col -->
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <select name="country" class="form-control">
                                        <option>Nationality</option>
                                        <?php foreach ($countries as $country) { ?>
                                            <option value="<?= $country->id ?>"><?= $country->name ?></option>
                                        <?php } ?>
                                    </select>
                                </div><!-- form-group -->
                            </div><!-- col -->
                        </div><!-- row -->
                        <div class="row">
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <input name="email" type="text" class="form-control" placeholder="Email">
                                </div><!-- form-group -->
                            </div><!-- col -->
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <p class="form-control-static">Rating:</p>
                                </div><!-- form-group -->
                            </div><!-- col -->
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <select name="rate" class="form-control">
                                        <option value="5">5</option>
                                        <option value="4">4</option>
                                        <option value="3">3</option>
                                        <option value="2">2</option>
                                        <option value="1">1</option>
                                    </select>
                                </div><!-- form-group -->
                            </div><!-- col -->
                        </div><!-- row -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <textarea name="review_comment" rows="4" class="form-control" placeholder="Your review..."></textarea>
                                </div><!-- form-group -->
                            </div><!-- col -->
                        </div><!-- row -->
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <p class="form-control-static" >Captcha:</p>
                                </div><!-- form-group -->
                            </div><!-- col -->

                            <?=
                            Captcha::widget(['name' => 'captcha', 'captchaAction' => 'diary/captcha', 'template' =>
                                '<div class="col-sm-5"> 
                            <div class="form-group">
                                <div class="box-captcha">
                                    {image}
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <a class="btnnewimg" href="#" id="refresh-captcha" onclick="tour.changeCaptcha();"></a>
                            </div><!-- form-group -->
                        </div><!-- col -->
                        <div class="col-sm-3">
                            <div class="form-group">
                                {input}
                            </div><!-- form-group -->
                        </div>',]);
                            ?>
                        </div><!-- row -->
                    </div><!-- form -->

                </div><!-- end modal-body -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="tour.submitReview();">Submit</button>
                    <button type="button" class="btn btn-default" data-target="#ModalRating" data-dismiss="#ModalRating">Cancel</button>
                </div>
            </div><!-- end modal-content -->
        </form>
    </div><!-- end modal-dialog -->
</div>
