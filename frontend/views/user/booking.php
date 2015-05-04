<?php

use common\util\TextUtils;
use common\util\UrlUtils;
?>
<div class="container">
    <div class="box-user">
        <div class="user-menu">
            <ul>
                <li class="um-home"><span>My Account</span></li>
                <li class="active"><a href="<?= $this->context->baseUrl ?>my-booking.html"><i class="fa fa-file-text-o"></i>My booking</a></li>
                <li><a href="<?= $this->context->baseUrl ?>profile.html"><i class="fa fa-user"></i>Profile</a></li>
                <li ><a href="<?= $this->context->baseUrl ?>changepassword.html"><i class="fa fa-lock"></i>Change Password</a></li>
                <li><a href="<?= $this->context->baseUrl ?>logout.html"><i class="fa fa-sign-out"></i>Logout</a></li>
            </ul>
        </div>
        <div class="user-content">
            <div class="user-title">
                <div class="ut-name">My booking</div>
                <div class="ut-desc">Summary of your previous bookings</div>
            </div>
            <!--            <div class="user-info">          	
                            Client Number: 111111111629 , total finished booking(s): <b>0</b>
                        </div>-->
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th width="15%">Booking number</th>
                            <th width="40%">Tour</th>
                            <th width="10%">Order date</th>
                            <th width="10%">Departure date</th>
                            <th width="10%">Price (USD)</th>
                            <th width="15%">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($order)){ ?>
                        <?php foreach ($order as $o){ ?>
                        <tr>
                            <td><?= $o->invoice_code ?></td>
                            <td><a target="_blank" href="<?= $this->context->baseUrl.UrlUtils::tour($o->tour->title, $o->tour->id) ?>"><?= $o->tour->title ?></a></td>
                            <td><?= TextUtils::convertTime($o->create_time) ?></td>
                            <td><?= TextUtils::convertTime($o->date_departure) ?></td>
                            <td>$<?= TextUtils::sellPrice($o->total_price) ?></td>
                            <td><?= $o->status_payment == "DONE"?"paid":"unpaid" ?><?php if($o->status_payment != "DONE"){ ?><a href="<?= $this->context->baseUrl.UrlUtils::checkout($o->id) ?>">(Click to pay)</a><?php } ?></td>
                        </tr>
                        <?php } ?>
                        <?php }else { ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div><!-- table-responsive -->
        </div><!-- user-content -->
    </div><!-- box-user -->
</div>