<td valign="top" style="padding:10px; background:#fff;">
    <div style="padding-top:5px;">
        <font style="font-size:12px; font-family:Arial, Helvetica, sans-serif;display:block; color:#333;">
        Dear <?= $user->username ?>
        </font>
    </div>
    <div style="padding-top:10px;">
        <font style="font-size:12px; font-family:Arial, Helvetica, sans-serif;display:block; color:#333;">
        Thank you for booking at vietnamdiscoverytour.com.vn
        </font>
    </div>
    <div style="padding-top:10px; font-size:12px; font-family:Arial, Helvetica, sans-serif; color:#333;">
        <table width="100%" cellspacing="0" cellpadding="0" border="1" style="border-collapse:collapse;text-align:center">
            <tbody>
                <tr style="background:#f1f1f1">
                    <th width="15%" height="30px">Tour code</th>
                    <th width="15%" height="30px">Departure date</th>
                    <th width="15%" height="30px">Adults</th>
                    <th width="20%" height="30px">No of children (4-10 years old)</th>
                    <th width="20%" height="30px">Children (under 4 years old)</th>
                    <th width="15%" height="30px">Total Price</th>
                </tr>
                <tr>
                    <td height="30px"><a style="color:#3e7bc2; font-weight:bold; text-decoration:none;" href="#"><?= $order->tour->code?></a></td>
                    <td height="30px"><?= date('m/d/Y', $order->date_departure) ?></td>
                    <td height="30px"><?= $order->number_adult ?> pax</td>
                    <td height="30px"><?= $order->number_nochild ?> pax</td>
                    <td height="30px"><?= $order->number_child ?> pax</td>
                    <td height="30px">$<?= $order->total_price ?></td>
                </tr>
                <tr>
                    <td height="30px" colspan="4">Promo code: <?= $order->promo_code ?></td>
                    <td height="30px">Your discount:</td>
                    <td height="30px"><font style="color:red;">-$<?= $order->total_price - $order->final_price?></font></td>
                </tr>
                <tr>
                    <td height="30px" colspan="4"></td>
                    <td height="30px">Total (USD):</td>
                    <td height="30px"><font style="font-size:14px; color:red;">$<?= $order->final_price ?></font></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div style="padding-top:10px;">
        <font style="font-size:12px; font-family:Arial, Helvetica, sans-serif;display:block; color:#333;">
        <b>Total (USD):</b> $<?= $order->final_price ?>
        </font>
    </div>
    <div style="padding-top:10px;">
        <font style="font-size:12px; font-family:Arial, Helvetica, sans-serif;display:block; color:#074246;">
        <b>Status:</b> Unpaid <a href="<?= $config = \Yii::$app->params['email']['baseUrl'] ?>checkout-<?= $order->id ?>.html" style="color:#3e7bc2; font-weight:bold; text-decoration:none;">[Checkout Now]</a>
        </font>
    </div>
    <div style="padding-top:10px;">
        <font style="font-size:12px; font-family:Arial, Helvetica, sans-serif;display:block; color:#333;">
        Sincerely!
        </font>
    </div>
    <div style="padding-top:10px;">
        <font style="font-size:12px; font-family:Arial, Helvetica, sans-serif;display:block; color:#333;">
        Customer Support Center vietnamdiscoverytour.com.vn
        </font>
    </div>
</td>