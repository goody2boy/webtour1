<?php

use common\util\UrlUtils;
use yii\data\Pagination;
use yii\widgets\LinkPager;
?>
<div class="container">
    <div class="bground">
        <ol class="breadcrumb">
            <li><a href="<?= $this->context->baseUrl ?>"><i class="fa fa-home"></i>Trang chủ</a></li>
            <li class="active">Video</li>
        </ol>
        <div class="video-list">
            <ul>
                <?php if (!empty($dataPage)) { ?>
                    <?php foreach ($dataPage->data as $video) { ?>
                        <li>
                            <div class="vl-item"><a href="<?= UrlUtils::video($video->id,$video->name) ?>"><img src="<?= (isset($video->images[0]) ? $video->images[0] : $this->context->baseUrl . 'images/no_avatar.png') ?>" alt="<?= $video->name ?>"></a></div><!-- vl-item -->
                        </li>
                    <?php } ?>
                <?php } ?>
            </ul>
            <div class="clearfix"></div>
        </div><!-- video-list -->
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
        <div class="clearfix"></div>
    </div><!-- bground -->
</div>