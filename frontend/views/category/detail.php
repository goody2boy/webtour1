<?php

use common\util\TextUtils;
use common\util\UrlUtils;
use yii\data\Pagination;
use yii\widgets\LinkPager;
?>
<div class="container">
    <div class="city-type highlight-type">
        <div class="ct-name"><?= $category->name ?></div>
        <div class="ct-inner">
            <label>Select city</label>
            <select class="form-control">
                <option value="0">All</option>
                <?php foreach ($cities as $city) { ?>
                    <option value="<?= $city->id ?>"><?= $city->name ?></option>
                <?php } ?>
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
                                <?php for ($i = 1; $i <= 5; $i++) { ?>
                                    <?php if ($i <= $tour->review) { ?>
                                        <i class="fa fa-star yellow"></i>
                                    <?php } else { ?>
                                        <i class="fa fa-star"></i>
                                    <?php } ?>
                                <?php } ?>
                                <a href="#">See 1 reviews</a>
                            </div>
                            <div class="highlight-row"><a class="highlight-title" href="<?= $this->context->baseUrl . UrlUtils::tour($tour->title, $tour->id) ?>"><?= $tour->title ?></a></div>
                            <div class="highlight-row">Duration: <?= $tour->duration_time ?> Day</div>
                            <div class="highlight-row highlight-desc">
                                <?= $tour->description ?>
                            </div>
                        </div>
                        <div class="highlight-bottom">
                            <a href="<?= $this->context->baseUrl . UrlUtils::citytypes($tour->city->name, $tour->city->id) ?>"><?= $tour->city->name ?></a>
                            <span class="highlight-price">Start from: <span>$<?= $tour->minprice ?></span></span>
                        </div>
                    </div><!-- highlight-item -->
                </li>
            <?php } ?>
        </ul>
    </div><!-- highlight-tour -->
    <div class="box-control">
        <div class="pagination-router">
            <?php
            $pagination = new Pagination(['totalCount' => $listTours->dataCount]);
            $pagination->setPageSize($listTours->pageSize);
            $pagination->setPage($listTours->page - 1);
            ?>
            <?=
            LinkPager::widget([
                'pagination' => $pagination,
                'nextPageLabel' => 'Sau &gt;',
                'prevPageLabel' => '&lt; Trước',
                'maxButtonCount' => 5
            ]);
            ?>
        </div><!-- pagination-router -->
    </div><!-- box-control -->
</div>