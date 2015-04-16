<?php

use common\util\UrlUtils;
use yii\data\Pagination;
use yii\widgets\LinkPager;
?>
<div class="container">
    <div class="big-title">
        <div class="lb-name">OTHER SERVICE</div>
    </div><!-- big-title -->
    <div class="service-list">
        <ul>
            <?php if (!empty($dataPage->data)) { ?>
    <?php foreach ($dataPage->data as $new) { ?>
                    <li>
                        <div class="grid">
                            <div class="img"><a href="<?= $this->context->baseUrl . UrlUtils::news($new->alias) ?>"><img src="<?= (isset($new->images[0]) ? $new->images[0] : $this->context->baseUrl . 'images/no_avatar.png') ?>" alt="<?= $new->name ?>"></a></div>
                            <div class="g-content">
                                <div class="g-row">
                                    <a class="g-title" href="<?= $this->context->baseUrl . UrlUtils::news($new->alias) ?>"><h2 class="g-title"><?= $new->name ?></h2></a>
                                </div>
                                <div class="g-row g-desc">
        <?= $new->description ?>
                                </div>
                            </div>
                        </div><!-- grid -->
                    </li>
                <?php } ?>
<?php } ?>
        </ul>
        <div class="clearfix"></div>
    </div><!-- service-list -->
    <div class="box-control">
        <div class="pagination-router">
            <?php
            $pagination = new Pagination(['totalCount' => $dataPage->dataCount]);
            $pagination->setPageSize($dataPage->pageSize);
            $pagination->setPage($dataPage->page - 1);
            ?>
            <?=
            LinkPager::widget([
                'pagination' => $pagination,
                'nextPageLabel' => 'Tiếp',
                'prevPageLabel' => 'Sau',
                'maxButtonCount' => 5
            ]);
            ?>
        </div><!-- pagination-router -->
    </div><!-- box-control -->
</div><!-- container -->