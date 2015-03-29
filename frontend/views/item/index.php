<?php

use common\util\UrlUtils;
?>
<div class="container">
    <div class="bground">
        <div class="main">
            <ol class="breadcrumb">
                <li><a href="<?= $this->context->baseUrl ?>"><i class="fa fa-home"></i>Trang chủ</a></li>
                <li class="active">Sản phẩm</li>
            </ol>
            <div class="product-list">
                <ul>
                    <?php if (!empty($dataPage)) { ?>
                        <?php foreach ($dataPage as $item) { ?>
                            <li>
                                <div class="hp-item">
                                    <a href="<?= $this->context->baseUrl . UrlUtils::item($item->name, $item->id) ?>">
                                        <span class="hp-thumb"><img src="<?= (isset($item->images[0]) ? $item->images[0] : $this->context->baseUrl . 'images/no_avatar.png') ?>" alt="<?= $item->name ?>"></span>
                                        <span class="hp-title"><?= $item->name ?></span>
                                        <i class="fa fa-search-plus"></i>
                                    </a>	
                                </div><!-- hp-item -->
                            </li>
                        <?php } ?>
                    <?php } ?>
                </ul>
                <div class="clearfix"></div>
            </div><!-- product-list -->
        </div><!-- main -->
        <div class="sidebar">
            <div class="box">
                <div class="box-title"><label class="lb-name">Sản phẩm</label></div>
                <div class="box-content">
                    <div class="menuleft">
                        <ul>
                            <?php if (!empty($dataPage)) { ?>
                                <?php foreach ($dataPage as $item) { ?>
                            <li><a href="<?= $this->context->baseUrl . UrlUtils::item($item->name, $item->id) ?>"><?= $item->name ?></a></li>
                                <?php } ?>
                            <?php } ?>
                        </ul>
                    </div><!-- menuleft -->
                </div><!-- box-content -->
            </div><!-- box -->
            <div class="box-qc">
                <div class="qc-item"><a href="#"><img src="<?= $this->context->baseUrl ?>data/qc1.jpg" alt="banner"></a></div>
                <div class="qc-item"><a href="#"><img src="<?= $this->context->baseUrl ?>data/qc2.jpg" alt="banner"></a></div>
            </div><!-- box-qc -->
        </div><!-- sidebar -->
        <div class="clearfix"></div>
    </div><!-- bground -->
</div>