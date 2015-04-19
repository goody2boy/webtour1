<?php

use common\util\TextUtils;
use common\util\UrlUtils;
?>
<div class="container">
    <div class="box-checkout">
        <div class="checkout-title">Review &amp; Payment</div>
        <div class="checkout-content">
            <div class="checkout-label">your tour details</div>
            <div class="checkout-name"><?= $orders->data[0]->tour->title ?></div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th width="15%">Tour code</th>
                            <th width="15%">Departure date</th>
                            <th width="15%">No of Adults</th>
                            <th width="20%">No of children (4-10 years old)</th>
                            <th width="20%">Children (under 4 years old)</th>
                            <th width="15%">Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders->data as $order) { ?>
                            <tr>
                                <td><a href="<?= $this->context->baseUrl . UrlUtils::tour($order->tour->title, $order->tour->id) ?>"><?= $order->tour->code ?></a></td>
                                <td><?= $order->date_departure ?></td>
                                <td><?= $order->number_adult ?></td>
                                <td><?= $order->number_child ?></td>
                                <td><?= $order->number_nochild ?></td>
                                <td>$<?= $order->total_price ?></td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="2">If you have a promo code enter it here:</td>
                            <td colspan="2">
                                <input name="promo_code" type="text" class="form-control text-coupon">
                                <button type="submit" onclick="order.usePromoCode();" class="btn btn-primary btn-sm">Enter</button>
                            </td>
                            <td>Your discount</td>
                            <td><span class="text-danger">-$0</span></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4"></td>
                            <td>Total (USD):</td>
                            <td><span class="text-danger">$<?= $order->total_price ?></span></td>
                        </tr>
                    </tfoot>
                </table>
            </div><!-- table-responsive -->
            <div class="checkout-desc">
                <div class="form form-horizontal">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-sm-4">Email <span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input name="" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4">First name <span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input name="" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4">Last name <span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input name="" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4">Address</label>
                                <div class="col-sm-8">
                                    <input name="" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4">Contact phone <span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input name="" type="text" class="form-control">
                                </div>
                            </div>
                        </div><!-- col -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-sm-4">City</label>
                                <div class="col-sm-4">
                                    <input name="" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4">State</label>
                                <div class="col-sm-4">
                                    <input name="" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4">Zipcode</label>
                                <div class="col-sm-4">
                                    <input name="" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4">Country <span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <select class="form-control">
                                        <option>Vietnam</option>
                                    </select>
                                </div>
                            </div>
                        </div><!-- col -->
                    </div><!-- row -->
                </div><!-- form -->
            </div>
            <div class="checkout-label">Select Your Payment Method</div>
            <div class="checkout-method">
                <div class="row">
                    <div class="col-md-4">
                        <div class="radio">
                            <label><input name="rd_payment" type="radio" value="" checked=""> Paypal</label>
                        </div>
                    </div><!-- col -->
                    <div class="col-md-4">
                        <div class="radio">
                            <label><input name="rd_payment" type="radio" value=""> Visa/Master/American Express/JCB Card</label>
                        </div>
                    </div><!-- col -->
                    <div class="col-md-4">
                        <div class="radio">
                            <label><input name="rd_payment" type="radio" value=""> Pay later</label>
                        </div>
                    </div><!-- col -->
                </div><!-- row -->
            </div><!-- checkout-method -->
            <div class="checkout-bottom">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="checkbox">
                            <input name="check_term" type="checkbox" value="">
                            I have read and agreed to the <a href="#">Terms of Use.</a>
                        </div>
                    </div><!-- col -->
                    <div class="col-sm-6 text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div><!-- col -->
                </div><!-- row -->
            </div><!-- checkout-bottom -->
        </div><!-- checkout-content -->
    </div><!-- box-checkout -->
</div>