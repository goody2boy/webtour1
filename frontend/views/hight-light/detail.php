<?php

use common\util\TextUtils;
use common\util\UrlUtils;
?>
<div class="container">
    <div class="city-type highlight-type">
        <div class="ct-name">Private Tours</div>
        <div class="ct-inner">
            <label>Select city</label>
            <select class="form-control">
                <option>All</option>
                <option>Hanoi Capital</option>
                <option>Ho Chi Minh City</option>
                <option>Nha Trang City</option>
                <option>Hoian City</option>
                <option>Hue City</option>
            </select>
        </div>
    </div><!-- highlight-type -->
    <div class="highlight-tour">
        <ul>
            <?php foreach ($listTours->data as $tour) { ?>
                <li>
                    <div class="highlight-item">
                        <div class="highlight-thumb">
                            <a href="<?= $this->context->baseUrl . UrlUtils::tour($tour->title, $tour->id) ?>"><img src="<?= $this->context->baseUrl . $tour->images[0]->imageId ?>" alt="img"></a>
                        </div>
                        <div class="highlight-content">
                            <div class="highlight-rating">
                                <i class="fa fa-star yellow"></i>
                                <i class="fa fa-star yellow"></i>
                                <i class="fa fa-star yellow"></i>
                                <i class="fa fa-star yellow"></i>
                                <i class="fa fa-star"></i>
                                <a href="#">See 1 reviews</a>
                            </div>
                            <div class="highlight-row"><a class="highlight-title" href="<?= $this->context->baseUrl . UrlUtils::tour($tour->title, $tour->id) ?>"><?= $tour->title ?></a></div>
                            <div class="highlight-row">Duration: <?= $tour->duration_time ?> Day</div>
                            <div class="highlight-row highlight-desc">
                                <?= $tour->description ?>
                            </div>
                        </div>
                        <div class="highlight-bottom">
                            <a href="<?= $this->context->baseUrl . UrlUtils::tourtype($tour->city->name, $tour->city->id) ?>"><?= $tour->city->name ?></a>
                            <span class="highlight-price">Start from: <span>$<?= $tour->minprice ?></span></span>
                        </div>
                    </div><!-- highlight-item -->
                </li>
            <?php } ?>
        </ul>
    </div><!-- highlight-tour -->
    <div class="box-control">
        <div class="pagination-router">
            <ul class="pagination">
                <li class="disabled"><a href="#">&lt;&nbsp;Trước</a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">Sau&nbsp;&gt;</a></li>
            </ul>
        </div><!-- pagination-router -->
    </div><!-- box-control -->
</div>