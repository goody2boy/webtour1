<?php

use common\util\UrlUtils;
?>
<div class="container">
    <div class="bground">
        <ol class="breadcrumb">
            <li><a href="<?= $this->context->baseUrl ?>"><i class="fa fa-home"></i>Trang chủ</a></li>
            <li class="active"><a href="#">Video</a></li>
        </ol>
        <h4 class="video-title"><?= $detail->name ?></h4>
        <div class="video-detail">
            <div class="embed-responsive embed-responsive-4by3">
                <iframe class="embed-responsive-item" src="//www.youtube.com/embed/<?= $detail->id ?>" frameborder="0" allowfullscreen=""></iframe>
            </div>
        </div><!-- video-detail -->
        <div class="box">
            <div class="box-title">
                <div class="lb-name">Các video khác</div>
            </div><!-- box-title -->
            <div class="box-content">
                <div class="video-list">
                    <ul>
<?php if (!empty($dataPage)) { ?>
                            <?php foreach ($dataPage->data as $video) { ?>
                                <li>
                                    <div class="vl-item"><a href="<?= $this->context->baseUrl. UrlUtils::video($video->id,$video->name) ?>"><img src="<?= (isset($video->images[0]) ? $video->images[0] : $this->context->baseUrl . 'images/no_avatar.png') ?>" alt="<?= $video->name ?>"></a></div><!-- vl-item -->
                                </li>
    <?php } ?>
                        <?php } ?>
                    </ul>
                    <div class="clearfix"></div>
                </div><!-- video-list -->
            </div><!-- box-content -->
        </div><!-- box -->
        <div class="clearfix"></div>
    </div><!-- bground -->
</div>