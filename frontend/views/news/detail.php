<?php

use common\util\TextUtils;
use common\util\UrlUtils;
?>
<div class="container">
    <div class="bground">
        <div class="main">
            <?php if ($detail->alias != 'gioi-thieu') { ?>
                <ol class="breadcrumb">
                    <li><a href="<?= $this->context->baseUrl ?>"><i class="fa fa-home"></i>Trang chủ</a></li>
                    <li><a href="<?= $this->context->baseUrl . UrlUtils::news() ?>">Tin tức</a></li>
                    <?php foreach ($categorys as $category) { ?>
                        <?php if ($detail->categoryId == $category->id) { ?>
                            <li class="active"><?= $category->name ?></li>
                        <?php } ?>
                    <?php } ?>
                </ol>
            <?php } ?>
            <div class="box-news">
                <div class="news-title"><h1><?= $detail->name ?></h1></div>
                <?php if ($detail->alias != 'gioi-thieu') { ?>
                    <div class="news-time"><?= TextUtils::convertTime($detail->createTime) ?></div>
                <?php } ?>
                <div class="maincontent">
                    <?= $detail->detail ?>
                    <?php if ($detail->alias != 'gioi-thieu') { ?>
                        <div class="social-like">
                            <div class="fb-like" data-href="<?= $this->context->baseUrl . UrlUtils::news($detail->alias) ?>" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
                        </div>
                        <div class="box-other">
                            <div class="bo-title">Các tin tức khác:</div>
                            <ul>
                                <?php foreach ($news as $new) { ?>
                                    <?php if ($new->id != $detail->id) { ?>
                                        <li><a href="<?= $this->context->baseUrl . UrlUtils::news($new->alias) ?>"><?= $new->name ?><span> (<?= TextUtils::convertTime($new->createTime) ?>)</span></a></li>
                                    <?php } ?>
                                <?php } ?>
                            </ul>
                        </div><!-- box-other -->
                    <?php } ?>
                </div><!-- box-other -->
            </div><!-- box-news -->
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
                                        <li class="<?= $category->parentId == 0 && $category->id == $detail->categoryId || !empty($subcate) && $subcate[0]->parentId == $category->id ? 'active' : '' ?>"><a href="<?= $this->context->baseUrl . UrlUtils::newsBrowse($category->alias) ?>"><?= $category->name ?></a>
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
                                                                <li class="subcate <?= $detail->categoryId == $sub->id ? 'active' : '' ?>"><a href="<?= $this->context->baseUrl . UrlUtils::newsBrowse($sub->alias) ?>"><?= $sub->name ?></li>
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
</div>

