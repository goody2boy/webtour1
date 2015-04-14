<?php 

use common\util\TextUtils;
use common\util\UrlUtils;
?>
<div class="container">
    <div class="city-highlight">
        <ul>
            <?php foreach ($hightlights as $hilight) { ?>
            <li>
                <div class="highlight-group">
                    <div class="hg-thumb">
                        <a href="<?= $this->context->baseUrl . UrlUtils::hightlight($hilight->name, $hilight->id) ?>"><img src="<?= $this->context->baseUrl . $hilight->images[0]->imageId ?>" alt="img"></a>
                    </div>
                    <div class="hg-content">
                        <div class="grid">
                            <div class="img"><img src="images/favicon.png" alt="logo"></div>
                            <div class="g-content">
                                <div class="g-row"><a class="g-title" href="<?= $this->context->baseUrl . UrlUtils::hightlight($hilight->name, $hilight->id) ?>"><?= $hilight->name ?></a></div>
                                <div class="g-row"><?= $hilight->slogan ?></div>
                            </div>
                        </div>
                        <div class="hg-desc">
                            <?= $hilight->description ?>
                        </div>
                        <?php foreach ($maptours[$hilight->id]->data as $tour) { ?>
                        <div class="hg-row"><a href="<?= $this->context->baseUrl . UrlUtils::tour($tour->title, $tour->id) ?>"><?= $tour->title?></a><span class="hg-cost">$<?= $tour->minprice?></span></div>
                        <?php } ?>
                        <div class="hg-search"><a href="<?= $this->context->baseUrl . UrlUtils::hightlight($hilight->name, $hilight->id) ?>"><i class="fa fa-search"></i>Find more</a></div>
                    </div>
                </div><!-- highlight-group -->
            </li>
            <?php } ?>
        </ul>
        <div class="clearfix"></div>
    </div><!-- city-highlight -->
</div>