<?php

use common\util\TextUtils;
use common\util\UrlUtils;
use yii\captcha\Captcha;
use yii\data\Pagination;
use yii\widgets\LinkPager;
?>
<div class="container">
    <div class="bground">
        <div class="main">
            <ol class="breadcrumb">
                <li><a href="<?= $this->context->baseUrl ?>"><i class="fa fa-home"></i>Trang chủ</a></li>
                <li class="active">Chia sẻ của bạn về Airocide</li>
            </ol>
            <div class="review-list">
                <?php if (!empty($dataPage)) { ?>
                    <?php foreach ($dataPage->data as $reviews) { ?>
                        <div class="review-item">
                            <div class="review-title"><?= $reviews->name ?></div>
                            <div class="review-row">
                                <div class="main-content">
                                    <p><?= $reviews->description ?></p>
                                </div>
                            </div>
                            <div class="review-row">
                                <span class="review-time">(<?= TextUtils::convertTime($reviews->createTime) ?>)</span>
                            </div>
                        </div><!-- review-item -->
                    <?php } ?>
                <?php } ?>
            </div><!-- review-list -->
            <div class="box-control">
                <div class="pagination-router">
                    <?php
                    $pagination = new Pagination(['totalCount' => $dataPage->dataCount]);
                    $pagination->setPageSize($dataPage->pageSize);
                    $pagination->setPage($dataPage->page - 1);
                    ?>
                    <?=
                    LinkPager::widget([
                        'pagination' => $pagination,
                        'nextPageLabel' => 'Tiếp',
                        'prevPageLabel' => 'Sau',
                        'maxButtonCount' => 5
                    ]);
                    ?>
                </div><!-- pagination-router -->
            </div><!-- box-control -->
            <div class="review-input">
                <div class="ri-title">Viết cảm nhận của bạn</div>
                <div class="ri-desc">
                    Bạn dánh giá sản phẩm của chúng tôi như thế nào?
                </div>
                <div class="form">
                    <form id="form-add">
                        <div class="form-group">
                            <label>Họ tên <span class="text-danger">*</span></label>
                            <input name="name" type="text" class="form-control w40">
                        </div>
                        <div class="form-group">
                            <label>Email <span class="text-danger">*</span></label>
                            <input name="email" type="text" class="form-control w40">
                        </div>
                        <div class="form-group">
                            <label>Nội dung <span class="text-danger">*</span></label>
                            <textarea name="description" cols="" rows="4" class="form-control w60"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Captcha <span class="text-danger">*</span></label>
                           <?= Captcha::widget(['name'=>'captcha','captchaAction'=>'reviews/captcha','template'=>"{input} \n{image} ",'options'=>['class' => 'form-control w40']]) ?>
                        </div>
                        <div class="form-group">
                            <div class="pd-line"></div>
                            <button type="button" onclick="reviews.add()" class="btn btn-primary btn-lg">Gửi đi</button>
                        </div>
                    </form>
                </div><!-- form -->
            </div><!-- review-input -->
        </div><!-- main -->
        <div class="sidebar">
            <div class="box">
                <div class="box-title"><label class="lb-name">Sản phẩm</label></div>
                <div class="box-content">
                    <div class="menuleft">
                        <ul>
                            <?php if (!empty($items)) { ?>
                                <?php foreach ($items as $item) { ?>
                                    <li><a href="<?= $this->context->baseUrl . UrlUtils::item($item->name, $item->id) ?>"><?= $item->name ?></a></li>
                                <?php } ?>
                            <?php } ?>
                        </ul>
                    </div><!-- menuleft -->
                </div><!-- box-content -->
            </div><!-- box -->
            <div class="box-qc">
                <?php if (!empty($right)) { ?>
                    <?php foreach ($right as $ad) { ?>
                <div class="qc-item"><a href="<?= $ad->link ?>"><img src="<?= (sizeof($ad->images) > 0) ? $ad->images[0] : $this->context->baseUrl.'data/qc2.jpg' ?>" alt="banner"></a></div>
                    <?php } ?>
                <?php } ?>
            </div><!-- box-qc -->
        </div><!-- sidebar -->
        <div class="clearfix"></div>
    </div><!-- bground -->
</div>