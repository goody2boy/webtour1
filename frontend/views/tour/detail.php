<?php 
use common\util\TextUtils;
use common\util\UrlUtils;
?>
<div class="container">
    <div class="tour-detail">
        <div class="td-title">
            <h1><?= $tour->title ?> <span><?= $tour->duration_time ?> day</span></h1>
            <div class="td-rating">
                <i class="fa fa-star yellow"></i>
                <i class="fa fa-star yellow"></i>
                <i class="fa fa-star yellow"></i>
                <i class="fa fa-star yellow"></i>
                <i class="fa fa-star"></i>
                <a href="#">See reviews</a>
            </div>
        </div><!-- td-title -->
        <div class="td-main">
            <div class="td-label">Summary</div>
            <div class="td-row">
                <label>Tour code:</label>
                <div class="td-text"><?= $tour->code ?></div>
            </div>
            <div class="td-row">
                <label>City hightlight:</label>
                <div class="td-text"><a href="#">Daily Group Tours</a></div>
            </div>
            <div class="td-row">
                <label>Tour type:</label>
                <div class="td-text">
                    <?php for ($i = 0; $i < count($tour->categories); $i ++) { ?>
                        <?php $cate = $tour->categories[$i]; ?>
                        <a href="#"><?= $cate->name ?></a>
                        <?php if ($i < count($tour->categories) - 1) { ?>
                            <?= " - " ?> 
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
            <div class="td-row">
                <label>City:</label>
                <div class="td-text"><a href="#"><?= $tour->city->name ?></a></div>
            </div>
            <div class="maincontent">
                <?= $tour->description ?>
            </div><!-- maincontent -->
            <div class="td-label">
                Tour price
                <select class="form-control td-money" id="money-select" onchange="tour.changeMoney();">
                    <?php foreach ($moneys as $money) { ?>
                        <option value = "<?= $money->id ?>" ><?= $money->code ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="table-responsive" id="table-price">
                <table class="td-table table table-striped">
                    <thead>
                        <tr>
                            <th>Pax</th>
                            <?php foreach ($tour->prices as $price) { ?>
                                <th><?= $price->name ?></th>
                            <?php } ?>
                            <th>More than 6</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($moneys as $money) { ?>
                            <tr id="<?= "price_" . $money->code ?>" <?= $money->code != "USD" ? 'style="display: none;"' : "" ?>  >
                                <td>Price/adult</td>
                                <?php foreach ($tour->prices as $price) { ?>
                                    <td><?= $price->price * $moneyconvert[$money->id] ?></td>
                                <?php } ?>
                                <td><a href="#">Contact Us</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <?php foreach ($moneys as $money) { ?>
                <?php if ($money->code != "USD") { ?>
                    <div class="td-help text-right">Exchange rate: 1 USD = <?= $moneyconvert[$money->id] ?> <?= $money->code ?></div>
                <?php } ?>
            <?php } ?>

            <div class="td-help"><i class="fa fa-map-marker"></i>Children under 5 years old: free of charge</div>
            <div class="td-help"><i class="fa fa-map-marker"></i>Children from 5 to 10 years old: 70% adult's rate</div>
            <div class="td-help"><i class="fa fa-map-marker"></i>Children above 10: full adult's rate.</div>
            <div class="pd-tabs" role="tabpanel">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#full-itinerary" role="tab" data-toggle="tab">Full itinerary</a></li>
                    <li role="presentation"><a href="#inclusion" role="tab" data-toggle="tab">Inclusion</a></li>
                    <li role="presentation"><a href="#exclusion" role="tab" data-toggle="tab">Exclusion</a></li>
                    <li role="presentation"><a href="#tour-notes" role="tab" data-toggle="tab">Tour notes</a></li>
                </ul><!-- nav-tabs -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="full-itinerary">
                        <div class="maincontent">                                            
                            <?= $tour->full_initerary?>
                        </div><!-- maincontent -->
                    </div><!-- tab-pane -->
                    <div role="tabpanel" class="tab-pane" id="inclusion">
                        <div class="maincontent">
                           <?= $tour->inclusion?>
                        </div><!-- maincontent -->
                    </div><!-- tab-pane -->
                    <div role="tabpanel" class="tab-pane" id="exclusion">
                        <div class="maincontent">
                            <?= $tour->exclusion?>
                        </div><!-- maincontent -->
                    </div><!-- tab-pane -->
                    <div role="tabpanel" class="tab-pane" id="tour-notes">
                        <div class="maincontent">
                            <?= $tour->note?>
                        </div><!-- maincontent -->
                    </div><!-- tab-pane -->
                </div><!-- tab-content -->
            </div><!-- pd-tabs -->
            <div class="related-venues">Related venues <span>(5)</span></div>
            <ul class="rv-ul">
                <li>
                    <div class="rv-item">
                        <span class="rv-number">1</span>
                        <div class="rv-name">Bat Trang Pottery Village</div>
                        <div class="rv-desc">
                            Gia Lam Dist. - Hanoi Capital
                        </div>
                        <div class="rv-info">
                            Visiting Bat Trang Village - one of the city's traditional handicraft villages, tourists can take a walk to visit many ceramic stores for purchasing special gifts or try ceramics making to get an unforgettable experience.
                        </div>
                    </div>
                </li>
                <li>
                    <div class="rv-item">
                        <span class="rv-number">2</span>
                        <div class="rv-name">Hanoi Old Quarter</div>
                        <div class="rv-desc">
                            Hoan Kiem District - Hanoi Capital
                        </div>
                        <div class="rv-info">
                            Without Old Quarter, a maze of labyrinthine streets dated back to the 13th century, Hanoi would not be Hanoi. Strolling around Hanoi Old Quarter, one can perceive the beauty as well as typical feature of these streets.
                        </div>
                    </div>
                </li>
                <li>
                    <div class="rv-item">
                        <span class="rv-number">3</span>
                        <div class="rv-name">Long Bien Bridge</div>
                        <div class="rv-desc">
                            Long Bien District, Hanoi, Vietnam - Hanoi Capital
                        </div>
                        <div class="rv-info">
                            Finished in 1902, Long Bien Bridge was the pride and symbol of architecture in Hanoi. This special bridge contains its unique historic, architectural and cultural values. If tourists have chance to visit Hanoi, do not forget to walk on Long Bien Bridge for sightseeing and experiencing the daily life of Hanoians.
                        </div>
                    </div>
                </li>
                <li>
                    <div class="rv-item">
                        <span class="rv-number">4</span>
                        <div class="rv-name">Hanoi Ecopark</div>
                        <div class="rv-desc">
                            Xuan Quan, Van Giang - Hanoi Capital
                        </div>
                        <div class="rv-info">
                            Stretching over 500 hectares near Bat Trang Village, Ecopark is an urban township development in Hanoi. With the vision to create harmony between humans and nature, Ecopark brings together modern facilities of international standards in order to create the most enjoyable living environment for its residents.
                        </div>
                    </div>
                </li>
                <li>
                    <div class="rv-item">
                        <span class="rv-number">5</span>
                        <div class="rv-name">Bai Giua</div>
                        <div class="rv-desc">
                            Red River, Hanoi Capital, Vietnam - Hanoi Capital
                        </div>
                        <div class="rv-info">
                            Bai Giua is a land lying in the middle of the Red River, with five kilometers long and one kilometer across. Whenever cycling to Bat Trang Village from the Hanoi center, you have to pass this land. Bai Giua is worthwhile for boating trip and ideal for the Youths to take photos.
                        </div>
                    </div>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div><!-- td-main -->
        <div class="td-sidebar">
            <div class="td-map">
                <img src="data/staticmap.jpg" alt="map">
            </div><!-- td-map -->
            <div class="td-map-expand"><a href="#">Expand map</a></div>
            <div class="winget">
                <div class="winget-title"><div class="lb-name">Related tour</div></div>
                <div class="winget-content">
                    <div class="td-featured">
                        <?php foreach ($relateTourCity as $tour) { ?>
                        <div class="grid">
                            <div class="img"><a href="<?= $this->context->baseUrl . UrlUtils::tour($tour->title, $tour->id) ?>"><img src="<?= $this->context->baseUrl . $tour->images[0]->imageId ?>" alt="img"></a></div>
                            <div class="g-content">
                                <div class="g-row">
                                    <a class="g-title" href="<?= $this->context->baseUrl . UrlUtils::tour($tour->title, $tour->id) ?>"><?= $tour->title ?></a>
                                </div>
                                <div class="g-row">Duration: <?= $tour->duration_time ?> Day</div>
                                <div class="g-row">Start from <span class="g-price">$<?= $tour->minprice?></span></div>
                                <div class="g-row">
                                    <a class="g-more" href="#"></a>
                                </div>
                            </div>
                            <div class="g-bottom">
                                City hightlight: <a href="#">Daily Group Tours</a> - City: <a href="<?= $this->context->baseUrl . UrlUtils::city($tour->city->name, $tour->city->id) ?>"><?= $tour->city->name ?></a>
                            </div>
                        </div><!-- grid -->
                        <?php }?>
                    </div><!-- td-featured -->
                </div><!-- winget-content -->
            </div><!-- winget -->
        </div><!-- td-sidebar -->
        <div class="clearfix"></div>
    </div><!-- tour-detail -->
</div>