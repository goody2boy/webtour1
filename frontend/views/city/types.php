<?php

use common\util\TextUtils;
use common\util\UrlUtils;
?>

<div class="container">
    <div class="city-info">
        <div class="ci-left" style="background-color:<?= $city->bg_color ?>;">
            <div class="ci-title"><?= $city->name ?></div>
            <div class="ci-desc">
                <?= $city->description ?>
            </div><!-- ci-desc -->
        </div><!-- ci-left -->
        <div class="ci-right">
            <div id="infoslider" class="owl-carousel owl-theme owl-loaded">
                <div class="owl-stage-outer">
                    <?php foreach ($city->images as $img) { ?>
                        <div class="info-item">
                            <img src="<?= $this->context->baseUrl . $img->imageId ?>" alt="slider">
                        </div>
                    <?php } ?>
                </div>
                <div class="owl-controls"><div class="owl-nav"><div class="owl-prev" style="display: none;">prev</div><div class="owl-next" style="display: none;">next</div></div><div class="owl-dots" style=""><div class="owl-dot"><span></span></div><div class="owl-dot"><span></span></div><div class="owl-dot active"><span></span></div><div class="owl-dot"><span></span></div></div></div></div><!-- owl-carousel -->	
        </div><!-- ci-right -->
        <div class="clearfix"></div>
    </div><!-- city-info -->
    <div class="city-type">
        <div class="ct-inner">
            <label>Select tour type</label>
            <select class="form-control">
                <option value="0">All</option>
                <?php foreach ($categories as $cate) { ?>
                    <option value="<?= $cate->id ?>"><?= $cate->name ?></option>
                <?php } ?>
            </select>
        </div>
    </div><!-- city-type -->
    <div class="city-folder">
        <ul>
            <?php foreach ($hightlights as $hilight) { ?>
                <li>
                    <div class="folder-item">
                        <a class="fi-thumb" style="background-color:<?= $city->bg_color ?>;" href="<?= $this->context->baseUrl . UrlUtils::citytours($city->name, $city->id, $hilight->name, $hilight->id) ?>"><i class="<?= $hilight->icon ?>"></i></a>
                        <a class="fi-title" style="color:<?= $city->bg_color ?>;" href="<?= $this->context->baseUrl . UrlUtils::citytours($city->name, $city->id, $hilight->name, $hilight->id) ?>"><?= $hilight->name ?></a>
                    </div><!-- folder-item -->
                </li>
            <?php } ?>
        </ul>
        <div class="clearfix"></div>
    </div><!-- city-folder -->
</div>