<?php

use common\util\TextUtils;
use common\util\UrlUtils;
?>
<div class="container">
    <div class="our-city">
        <ul>
            <?php foreach ($cities as $city) { ?>
                <li>
                    <div class="city-item" style="background-color:<?= $city->bg_color ?>;">
                        <div class="ci-thumb"><a href="<?= $this->context->baseUrl . UrlUtils::tour($city->name, $city->id) ?>"><img src="<?= $this->context->baseUrl . $city->images[0]->imageId ?>" alt="img"></a></div>
                        <div class="ci-content">
                            <div class="ci-row"><a class="ci-title" href="<?= $this->context->baseUrl . UrlUtils::tour($city->name, $city->id) ?>"><?= $city->name ?></a></div>
                            <div class="ci-row ci-desc">
                                <?= $city->description ?>
                            </div>
                        </div>
                        <div class="ci-bottom">
                            <ul>
                                <?php foreach ($maptours[$city->id]->data as $tour) { ?>
                                    <li><a href="<?= $this->context->baseUrl . UrlUtils::tour($tour->title, $tour->id) ?>"><i class="fa fa-long-arrow-right"></i><?= $tour->title?></a><span class="ci-cost"><?= $tour->minprice?></span></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="ci-search"><a href="<?= $this->context->baseUrl . UrlUtils::tour($city->name, $city->id) ?>"><i class="fa fa-search"></i>Find more</a></div>
                    </div><!-- city-item -->
                </li>
            <?php } ?>
        </ul>
        <div class="clearfix"></div>
    </div><!-- our-city -->
</div>