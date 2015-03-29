<?php

use common\util\TextUtils;
use common\util\UrlUtils;
use yii\captcha\Captcha;
?>
<div class="container">
    <div class="bground">
        <ol class="breadcrumb">
            <li><a href="<?= $this->context->baseUrl ?>"><i class="fa fa-home"></i>Trang chủ</a></li>
            <li class="active">Giỏ hàng</li>
        </ol>
        <div class="row">
            <div class="col-sm-12">
                <div class="checkout-title">Đơn hàng của bạn</div>
            </div><!-- col -->
        </div><!-- row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="form form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-sm-3">Chọn sản phẩm</label>
                        <div class="col-sm-6">
                            <select class="form-control" id="selectitem">
                                <option value="">Chọn sản phẩm</option>
                                <?php if (!empty($items)) { ?>
                                    <?php foreach ($items as $item) { ?>
                                        <option value="<?= $item->id ?>"><?= $item->name ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6 col-sm-offset-3">
                            <button type="button" onclick="order.additem()" class="btn btn-primary">Thêm sản phẩm</button>
                        </div>
                    </div>
                </div>
            </div><!-- col -->
        </div><!-- row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="checkout-table">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="45%">Tên sản phẩm</th>
                                    <th width="15%" class="text-center">Xoá</th>
                                    <th width="20%" class="text-center">Số lượng</th>
                                    <th width="20%" class="text-center">Đơn giá</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($data) && !empty($data->data)) { ?>
                                    <?php foreach ($data->data as $item) { ?>
                                        <tr>
                                            <td>
                                                <div class="grid">
                                                    <div class="img"><a href="<?= $this->context->baseUrl . UrlUtils::item($item->name, $item->id) ?>"><img src="<?= isset($item->images[0]) ? $item->images[0] : $this->context->baseUrl . 'no_avatar.png' ?>" alt="<?= $item->name ?>"></a></div>
                                                    <div class="g-content">
                                                        <div class="g-row">
                                                            <a class="g-title" href="<?= $this->context->baseUrl . UrlUtils::item($item->name, $item->id) ?>"><?= $item->name ?></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <span class="fa fa-remove cursor-pointer" onclick="order.deleteitem('<?= $item->id ?>')"></span>
                                            </td>
                                            <td class="text-center">
                                                <input name="quantity" type="text" class="form-control text-inlineblock quantity" value="1">
                                            </td>
                                            <td class="text-center" data-price="price"><?= TextUtils::sellPrice($item->price) ?> VNĐ/1 sản phẩm</td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div><!-- table-responsive -->
                </div><!-- checkout-table -->
            </div><!-- col -->
        </div><!-- row -->
        <div class="row">
            <div class="col-sm-6">
                <div class="checkout-form form form-horizontal">
                    <form id="checkout">
                    <div class="form-group">
                        <label class="control-label col-sm-4">Họ và tên <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input name="name" type="text" class="form-control">
                        </div>
                    </div><!-- form-group -->
                    <input name="description" type="hidden" class="form-control">
                    <div class="form-group">
                        <label class="control-label col-sm-4">Địa chỉ email <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input name="email" type="text" class="form-control">
                        </div>
                    </div><!-- form-group -->
                    <div class="form-group">
                        <label class="control-label col-sm-4">Điện thoại <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input name="phone" type="text" class="form-control">
                        </div>
                    </div><!-- form-group -->
                    <div class="form-group">
                        <label class="control-label col-sm-4">Địa chỉ <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input name="address" type="text" class="form-control">
                        </div>
                    </div><!-- form-group -->
                    <div class="form-group">
                        <label class="control-label col-sm-4">Ghi chú</label>
                        <div class="col-sm-8">
                            <textarea name="content" cols="" rows="3" class="form-control"></textarea>
                        </div>
                    </div><!-- form-group -->
                    <div class="form-group">
                            <label class="control-label col-sm-4">Captcha <span class="text-danger">*</span></label>
                            <div class="col-sm-4">
                            	<?= Captcha::widget(['name'=>'captcha','captchaAction'=>'order/captcha','template'=>"{input} \n{image} ",]) ?>
                            </div>
                        </div>
                    <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-4">
                            <button type="button" onclick="order.checkout()" class="btn btn-primary btn-lg">Đặt hàng</button>
                        </div>
                    </div><!-- form-group -->
                    </form>
                </div><!-- checkout-form -->
            </div><!-- col -->
            <div class="col-sm-6">
                <div class="checkout-info">
                   <?= $this->context->var['home']->bank ?>
                </div>
            </div><!-- col -->
        </div><!-- row -->
    </div><!-- bground -->
</div>