<?php
use common\util\TextUtils;
use common\util\UrlUtils;
?>
<div class="container">
        <div class="bground">
        	<div class="main">
            	<div class="box-news">
                    <div class="news-title"><h1><?= $detail->name ?></h1></div>
                    <div class="news-time"><?= TextUtils::convertTime($detail->createTime) ?></div>
                    <div class="maincontent">
                       <?= $detail->detail ?>
                    </div><!-- maincontent -->
                    <div class="social-like">
                        <!--<img src="data/social-like.png" alt="fb" />-->
                    </div><!-- social-like -->
                    <div class="box-other">
                        <div class="bo-title">Other Service:</div>
                        <ul>
                             <?php foreach ($news as $new) { ?>
                            <?php if ($new->id != $detail->id) { ?>
                                <li><a href="<?= $this->context->baseUrl . UrlUtils::news($new->alias) ?>"><?= $new->name ?><span> (<?= TextUtils::convertTime($new->createTime) ?>)</span></a></li>
                            <?php } ?>
                        <?php } ?>
                        </ul>
                    </div><!-- box-other -->
                </div><!-- box-news -->
            </div><!-- main -->