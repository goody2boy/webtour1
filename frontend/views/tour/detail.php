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
                <div class="td-text"><a href="<?= $this->context->baseUrl . UrlUtils::hightlight($tour->hightlight->name, $tour->hightlight->id) ?>"><?= $tour->hightlight->name ?></a></div>
            </div>
            <div class="td-row">
                <label>Tour type:</label>
                <div class="td-text">
                    <?php for ($i = 0; $i < count($tour->categories); $i ++) { ?>
                        <?php $cate = $tour->categories[$i]; ?>
                        <a href="<?= $this->context->baseUrl . UrlUtils::tourtype($cate->name, $cate->id) ?>"><?= $cate->name ?></a>
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
                                <td><a href="<?= $this->context->baseUrl . UrlUtils::contact() ?>">Contact Us</a></td>
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
                            <?= $tour->full_initerary ?>
                        </div><!-- maincontent -->
                    </div><!-- tab-pane -->
                    <div role="tabpanel" class="tab-pane" id="inclusion">
                        <div class="maincontent">
                            <?= $tour->inclusion ?>
                        </div><!-- maincontent -->
                    </div><!-- tab-pane -->
                    <div role="tabpanel" class="tab-pane" id="exclusion">
                        <div class="maincontent">
                            <?= $tour->exclusion ?>
                        </div><!-- maincontent -->
                    </div><!-- tab-pane -->
                    <div role="tabpanel" class="tab-pane" id="tour-notes">
                        <div class="maincontent">
                            <?= $tour->note ?>
                        </div><!-- maincontent -->
                    </div><!-- tab-pane -->
                </div><!-- tab-content -->
            </div><!-- pd-tabs -->
            <div class="related-venues">Related venues <span>(<?= sizeof($venuesTour) ?>)</span></div>
            <ul class="rv-ul">
                <?php $index = 1; ?>
                <?php foreach ($venuesTour as $vtour) { ?>
                    <li>
                        <div class="rv-item">
                            <span class="rv-number"><?= $index ?></span>
                            <div class="rv-name"><?= $vtour->title ?></div>
                            <div class="rv-desc">
                                <?= $vtour->mapp_address ?>
                            </div>
                            <div class="rv-info">
                                <?= $vtour->description ?>
                            </div>
                        </div>
                    </li>
                    <?php $index++; ?>   
                <?php } ?>
            </ul>
            <div class="clearfix"></div>
        </div><!-- td-main -->
        <div class="td-sidebar">
            <div class="td-map" id="map-canvas">
                <!--<img src="data/staticmap.jpg" alt="map">-->
            </div><!-- td-map -->
            <div class="td-map-expand"><a href="#">Expand map</a></div>
            <div class="box-order" id="order-form">
                <div class="order-title">Booking Form</div>
                <div class="order-content">
                    <div class="form">
                        <div class="form-group">
                            <label>Choose your departure date:</label>
                            <div class="form-box">
                                <input name="dateorder" type="text" class="form-control form-calendar" placeholder="dd/mm/yyyy">
                                <i class="fa fa-calendar"></i>
                            </div>
                        </div><!-- form-group -->
                        <div class="form-group">
                            <label>No of Adults:</label>
                            <div class="form-box">
                                <select class="form-control text-inlineblock" id="num-adult">
                                    <option value="1">1 Pax</option>
                                    <option value="2">2 Pax</option>
                                    <option value="3">3 Pax</option>
                                    <option value="4">4 Pax</option>
                                    <option value="5">5 Pax</option>
                                    <option value="6">6 Pax</option>
                                </select>
                            </div>
                        </div><!-- form-group -->
                        <div class="form-group">
                            <label>No of children<span> (5-10 years old)</span></label>
                            <div class="form-box">
                                <select class="form-control text-inlineblock" id="num-nochild">
                                    <option value="0">0 Pax</option>
                                    <option value="1">1 Pax</option>
                                    <option value="2">2 Pax</option>
                                    <option value="3">3 Pax</option>
                                    <option value="4">4 Pax</option>
                                    <option value="5">5 Pax</option>

                                </select>
                            </div>
                        </div><!-- form-group -->
                        <div class="form-group">
                            <label>Children<span> (under 5 years old)</span></label>
                            <div class="form-box">
                                <select class="form-control text-inlineblock" id="num-child">
                                    <option value="0">0 Pax</option>
                                    <option value="1">1 Pax</option>
                                    <option value="2">2 Pax</option>
                                    <option value="3">3 Pax</option>
                                    <option value="4">4 Pax</option>
                                    <option value="5">5 Pax</option>
                                    <option value="6">6 Pax</option>
                                </select>
                            </div>
                        </div><!-- form-group -->
                    </div><!-- form -->
                    <div class="order-button">
                        <a class="btn btn-primary" onclick="tour.calculateMoney(<?= $tour->id ?>);">Calculate</a>
                    </div>
                </div><!-- order-content -->
                <div class="order-loading"></div>
            </div>
            <div class="winget">
                <div class="winget-title"><div class="lb-name">Related tour</div></div>
                <div class="winget-content">
                    <div class="td-featured">
                        <?php foreach ($relateTourCity as $rtour) { ?>
                            <div class="grid">
                                <div class="img"><a href="<?= $this->context->baseUrl . UrlUtils::tour($rtour->title, $rtour->id) ?>"><img src="<?= $this->context->baseUrl . $rtour->images[0]->imageId ?>" alt="img"></a></div>
                                <div class="g-content">
                                    <div class="g-row">
                                        <a class="g-title" href="<?= $this->context->baseUrl . UrlUtils::tour($rtour->title, $rtour->id) ?>"><?= $rtour->title ?></a>
                                    </div>
                                    <div class="g-row">Duration: <?= $rtour->duration_time ?> Day</div>
                                    <div class="g-row">Start from <span class="g-price">$<?= $rtour->minprice ?></span></div>
                                    <div class="g-row">
                                        <a class="g-more" href="#"></a>
                                    </div>
                                </div>
                                <div class="g-bottom">
                                    City hightlight: <a href="<?= $this->context->baseUrl . UrlUtils::hightlight($rtour->hightlight->name, $rtour->hightlight->id) ?>"><?= $rtour->hightlight->name ?></a> - City: <a href="<?= $this->context->baseUrl . UrlUtils::citytypes($rtour->city->name, $rtour->city->id) ?>"><?= $rtour->city->name ?></a>
                                </div>
                            </div><!-- grid -->
                        <?php } ?>
                    </div><!-- td-featured -->
                </div><!-- winget-content -->
            </div><!-- winget -->
        </div><!-- td-sidebar -->
        <div class="clearfix"></div>
    </div><!-- tour-detail -->
</div>
<div class="modal fade in" id="ModalOrder" tabindex="-1" role="dialog" aria-hidden="false" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Contact information</h4>
            </div>
            <div class="modal-body">
                <div class="td-featured">
                    <div class="grid">
                        <div class="img"><a href="<?= $this->context->baseUrl . UrlUtils::tour($tour->title, $tour->id) ?>"><img src="<?= $this->context->baseUrl . $tour->images[0]->imageId ?>" alt="img"></a></div>
                        <div class="g-content">
                            <div class="g-row">
                                <a class="g-title" href="<?= $this->context->baseUrl . UrlUtils::tour($tour->title, $tour->id) ?>"><?= $tour->title ?></a>
                            </div>
                            <div class="g-row">Duration: <?= $tour->duration_time ?> day</div>
                            <div class="g-row">Total fee: <span class="g-price" id="totalFee"></span></div>
                        </div>
                    </div><!-- grid -->
                </div>
                <div class="form form-horizontal form-account">
                    <div class="form-group">
                        <label class="control-label col-sm-3">Email Address <span class="text-danger">*</span></label>
                        <div class="col-sm-6">
                            <input name="" type="text" class="form-control">
                        </div>
                    </div><!-- form-group -->
                    <div class="form-group">
                        <label class="control-label col-sm-3">Telephone <span class="text-danger">*</span></label>
                        <div class="col-sm-6">
                            <input name="" type="text" class="form-control">
                        </div>
                    </div><!-- form-group -->
                    <div class="form-group">
                        <label class="control-label col-sm-3">Full name <span class="text-danger">*</span></label>
                        <div class="col-sm-6">
                            <input name="" type="text" class="form-control">
                        </div>
                    </div><!-- form-group -->
                    <div class="form-group">
                        <label class="control-label col-sm-3">Address <span class="text-danger">*</span></label>
                        <div class="col-sm-6">
                            <input name="" type="text" class="form-control">
                        </div>
                    </div><!-- form-group -->
                    <div class="form-group">
                        <label class="control-label col-sm-3">Nationality <span class="text-danger">*</span></label>
                        <div class="col-sm-6">
                            <select class="form-control">
                                <option>Choose</option>
                            </select>
                        </div>
                    </div><!-- form-group -->
                </div><!-- form -->
            </div><!-- end modal-body -->
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Sent</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- end modal-content -->
    </div><!-- end modal-dialog -->
</div>
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script>
                            var geocoder;
                            var map;
                            function initialize() {
                                geocoder = new google.maps.Geocoder();
                                var mapCanvas = document.getElementById('map-canvas');
                                var mapOptions = {
                                    center: new google.maps.LatLng(44.5403, -78.5463),
                                    zoom: 8,
                                    mapTypeId: google.maps.MapTypeId.ROADMAP
                                }
                                map = new google.maps.Map(mapCanvas, mapOptions)
                            }
                            google.maps.event.addDomListener(window, 'load', initialize);
//                    function codeAddress() {
//                        var address = "Long Bien District, Hanoi, Vietnam - Hanoi Capital";
//                        geocoder.geocode({'address': address}, function (results, status) {
//                            if (status == google.maps.GeocoderStatus.OK) {
//                                map.setCenter(results[0].geometry.location);
//                                var marker = new google.maps.Marker({
//                                    map: map,
//                                    position: results[0].geometry.location
//                                });
//                            } else {
//                                alert("Geocode was not successful for the following reason: " + status);
//                            }
//                        });
//                    }
//                    codeAddress();
</script>