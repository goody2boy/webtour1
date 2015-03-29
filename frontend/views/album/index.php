<?php

use common\util\UrlUtils;
?>
<div class="container">
    <div class="bground">
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i>Trang chủ</a></li>
            <li class="active">Thư viện ảnh</li>
        </ol>
        <div class="gallery-album">
            <ul>
                <?php if (!empty($dataPage)) { ?>
                    <?php foreach ($dataPage->data as $album) { ?>
                        <li class="<?= $album->id == $id ? 'active' : '' ?>"><a href="<?= $this->context->baseUrl . UrlUtils::album($album->id, $album->name) ?>"><?= $album->name ?></a></li>
                    <?php } ?>
                <?php } ?>
            </ul>
        </div><!-- gallery-album -->
        <div class="gallery-list">
            <ul>
                <?php if (!empty($dataPage)) { ?>
                    <?php foreach ($dataPage->data as $album) { ?>
                        <?php if ($album->id == $id) { ?>
                            <?php foreach ($album->images as $image) { ?>
                                <li>
                                    <div class="gl-item">
                                        <a class="gallery-group" href="<?= $image ?>" rel="ga-group">
                                            <span class="gl-thumb"><img src="<?= $image ?>" alt="product"></span>
                                            <i class="fa fa-search-plus"></i>
                                        </a>	
                                    </div><!-- gl-item -->
                                </li>
                            <?php }break; ?>
                        <?php } ?>
                        <?php if (empty($id)) { ?>
                            <?php foreach ($album->images as $image) { ?>
                                <li>
                                    <div class="gl-item">
                                        <a class="gallery-group" href="<?= $image ?>" rel="ga-group">
                                            <span class="gl-thumb"><img src="<?= $image ?>" alt="product"></span>
                                            <i class="fa fa-search-plus"></i>
                                        </a>	
                                    </div><!-- gl-item -->
                                </li>
                            <?php }break; ?>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
            </ul>
            <div class="clearfix"></div>
        </div><!-- gallery-list -->
        <div class="clearfix"></div>
    </div><!-- bground -->
</div>