<?php

use common\util\TextUtils;
use common\util\UrlUtils;
?> 
<div class="container">
    <div class="bground">
        <ol class="breadcrumb">
            <li><a href="<?= $this->context->baseUrl ?>"><i class="fa fa-home"></i>Trang chủ</a></li>
            <li><a href="<?= $this->context->baseUrl . UrlUtils::itemlist() ?>">Sản phẩm</a></li>
            <li class="active"><?= $detail->name ?></li>
        </ol>
        <div class="product-detail">
            <div class="row">
                <div class="col-sm-5">
                    <div class="product-image">
                        <img id="myCloudZoom" class="cloudzoom" src="<?= (isset($detail->images[0]) ? $this->context->baseUrl . $detail->images[0] : $this->context->baseUrl . 'images/no_avatar.png') ?>" data-cloudzoom ="zoomSizeMode: 'image', zoomImage: '<?= (isset($detail->images[0]) ? $this->context->baseUrl . $detail->images[0] : $this->context->baseUrl . 'images/no_avatar.png') ?>'" alt="Click to view image!" />
                        <a href="<?= (isset($detail->images[0]) ? $this->context->baseUrl . $detail->images[0] : $this->context->baseUrl . 'images/no_avatar.png') ?>" class="gallery-group zoom-btn-small" rel="gallery-detail">Zoom</a>
                    </div><!-- product-image -->
                    <div class="pi-slider">
                        <div id="imageslider" class="owl-carousel">
                            <?php if (is_array($detail->images)) { ?>
                                <?php
                                $i = 0;
                                foreach ($detail->images as $image) {
                                    ?>
                                    <div class="pi-item <?= $i == 0 ? 'active' : '' ?>"><a class="cloudzoom-gallery" rel="gallery-detail" href="<?= $this->context->baseUrl . $image ?>" data-cloudzoom="useZoom:'.cloudzoom', image:'<?= $this->context->baseUrl . $image ?>' "><img src="<?= $this->context->baseUrl . $image ?>"></a></div>
                                    <?php
                                    $i++;
                                }
                                ?>
                            <?php } else { ?>
                            <?php } ?>
                        </div><!-- owl-carousel -->
                    </div><!-- pi-slider -->
                    <div class="pd-line"></div>
                    <div class="pd-sharebutton">
                        <div class="fb-like" data-href="<?= $this->context->baseUrl . UrlUtils::item($detail->name, $detail->id) ?>" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
                    </div>
                </div><!-- col -->
                <div class="col-sm-7">
                    <div class="pd-center">
                        <div class="pd-title"><h1><?= $detail->name ?></h1></div>
                        <div class="pd-line"></div>
                        <?= $detail->description ?>
                        <div class="pd-row">
                            Giá bán: <span class="pd-price"><?= TextUtils::sellPrice($detail->price)  ?> VNĐ</span>
                        </div>
                        <div class="pd-row">
                            <a href="<?= $this->context->baseUrl . UrlUtils::checkout('{%22id%22:[' . $detail->id) . ']}' ?>" class="btn btn-primary btn-lg">Đặt hàng</a>
                        </div>
                    </div><!-- pd-center -->
                </div><!-- col -->
            </div><!-- row -->
            <div class="clearfix"></div>
        </div><!-- product-detail -->
        <div class="page-detail">
            <div class="row sm-reset-5">
                <div class="col-sm-12 padding-all-5">
                    <div class="pd-tabs" role="tabpanel">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#description" role="tab" data-toggle="tab">Mô tả sản phẩm</a></li>
                            <li role="presentation"><a href="#properties" role="tab" data-toggle="tab">Thông số kỹ thuật</a></li>
                            <li role="presentation"><a href="#video" role="tab" data-toggle="tab">Video giới thiệu</a></li>
                        </ul><!-- nav-tabs -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="description">
                                <div class="maincontent">
                                    <?= $detail->content ?>
                                </div><!-- maincontent -->
                            </div><!-- tab-pane -->
                            <div role="tabpanel" class="tab-pane" id="properties">
                                <div class="maincontent">
                                    <h4><b>THÔNG SỐ KỸ THUẬT</b></h4>
                                    <?= $detail->property ?>
                                </div><!-- maincontent -->
                            </div><!-- tab-pane -->
                            <div role="tabpanel" class="tab-pane" id="video">
                                <div class="maincontent">
                                    <?= $detail->about ?>
                                </div><!-- maincontent -->
                            </div><!-- tab-pane -->
                        </div><!-- tab-content -->
                    </div><!-- tabpanel -->
                </div><!-- col -->
            </div><!-- row -->
            <div class="row sm-reset-5">
                <div class="col-sm-12 padding-all-5">
                    <div class="box">
                        <div class="box-title">
                            <div class="lb-name">Sản phẩm cùng loại</div>
                        </div><!-- box-title -->
                        <div class="box-content">
                            <div class="product-other">
                                <ul>
                                    <?php if (!empty($items)) { ?>
                                        <?php
                                        $j = 0;
                                        foreach ($items as $item) {
                                            ?>
        <?php if ($item->id != $detail->id) { ?>
                                                <li>
                                                    <div class="hp-item">
                                                        <a href="<?= $this->context->baseUrl . UrlUtils::item($item->name, $item->id) ?>">
                                                            <span class="hp-thumb"><img src="<?= (isset($item->images[0]) ? $item->images[0] : $this->context->baseUrl . 'images/no_avatar.png') ?>" alt="<?= $item->name ?>"></span>
                                                            <span class="hp-title"><?= $item->name ?></span>
                                                            <i class="fa fa-search-plus"></i>
                                                        </a>	
                                                    </div><!-- hp-item -->
                                                </li>
                                                <?php
                                                $j++;
                                            }
                                            ?>
                                            <?php
                                            if ($j == 3) {
                                                break;
                                            }
                                            ?>
    <?php } ?>
<?php } ?>
                                </ul>
                                <div class="clearfix"></div>
                            </div><!-- product-other -->  
                        </div><!-- box-content -->
                    </div><!-- box -->
                </div><!-- col -->
            </div><!-- row -->
        </div><!-- page-detail -->
    </div><!-- bground -->
</div><!-- container -->