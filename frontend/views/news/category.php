<?php

use common\util\TextUtils;
use common\util\UrlUtils;
use yii\data\Pagination;
use yii\widgets\LinkPager;
use \Yii;
?>
<div class="container">
    <div class="bground">
        <div class="main">
            <ol class="breadcrumb">
                <li><a href="<?= $this->context->baseUrl ?>"><i class="fa fa-home"></i>Trang chủ</a></li>
                <li class="active"><a href="<?= $this->context->baseUrl . UrlUtils::news() ?>">Tin tức</a></li>
            </ol>
            <div class="news-list">
                <?php if (!empty($dataPage->data)) { ?>
                    <?php foreach ($dataPage->data as $new) { ?>
                        <div class="grid">
                            <div class="img"><a href="<?= $this->context->baseUrl . UrlUtils::news($new->alias) ?>"><img src="<?= (isset($new->images[0]) ? $new->images[0] : $this->context->baseUrl . 'images/no_avatar.png') ?>" alt="<?= $new->name ?>"></a></div>
                            <div class="g-content">
                                <div class="g-row">
                                    <a class="g-title" href="<?= $this->context->baseUrl . UrlUtils::news($new->alias) ?>"><?= $new->name ?></a>
                                </div>
                                <div class="g-row">
                                    <span class="g-time"><?= TextUtils::convertTime($new->createTime) ?></span>
                                </div>
                                <div class="g-row">
                                    <?= $new->description ?>
                                </div>
                                <a class="g-view" href="<?= $this->context->baseUrl . UrlUtils::news($new->alias) ?>">Xem tiếp...</a>
                            </div>
                        </div><!-- grid -->
                    <?php } ?>
                <?php } ?>
            </div><!-- news-list -->
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
        </div><!-- main -->
        <div class="sidebar">
            <div class="box">
                <div class="box-title"><label class="lb-name">Sản phẩm</label></div>
                <div class="box-content">
                    <div class="menuleft">
                        <ul>
                            <?php if (!empty($items->data)) { ?>
                                <?php foreach ($items->data as $item) { ?>
                                    <li><a href="<?= $this->context->baseUrl . UrlUtils::item($item->name, $item->id) ?>"><?= $item->name ?></a></li>
                                <?php } ?>
                            <?php } ?>
                        </ul>
                    </div><!-- menuleft -->
                </div><!-- box-content -->
            </div><!-- box -->
            <div class="box">
                <div class="box-title"><label class="lb-name">Tin tức</label></div>
                <div class="box-content">
                    <div class="menuleft">
                        <ul>
                            <?php if (!empty($categorys)) { ?>
                                <?php foreach ($categorys as $category) { ?>
                                    <?php if ($category->parentId == 0) { ?>
                                        <li class="<?= Yii::$app->request->get('alias') == $category->alias || !empty($subcate) && $subcate[0]->parentId == $category->id ? 'active' : '' ?>"><a href="<?= $this->context->baseUrl . UrlUtils::newsBrowse($category->alias) ?>"><?= $category->name ?></a>

                                            <?php
                                            $a = 0;
                                            if (isset($subcate) && $subcate != null) {
                                                foreach ($subcate as $sub) {
                                                    if ($sub->parentId == $category->id) {
                                                        $a++;
                                                    }
                                                }
                                            }
                                            ?>
                                            <?php if ($a > 0) { ?>
                                                <ul>
                                                    <?php
                                                    if (isset($subcate) && $subcate != null) {
                                                        foreach ($subcate as $sub) {
                                                            if ($sub->parentId == $category->id) {
                                                                ?>
                                                                <li class=" <?= Yii::$app->request->get('alias') == $sub->alias && $sub->parentId == $category->id ? 'active' : '' ?>"><a href="<?= $this->context->baseUrl . UrlUtils::newsBrowse($sub->alias) ?>"><?= $sub->name ?></a></li>
                                                                <?php
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </ul>
                                            <?php } ?>
                                        </li>
                                    <?php } ?>
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