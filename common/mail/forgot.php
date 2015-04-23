<td valign="top" style="background:#fff;">
    <div style="padding-top:40px; padding-bottom:50px; text-align:center;">
        <h3 style="font-size:16px; font-family:Arial, Helvetica, sans-serif; color:#333;">Customer Support Center vietnamdiscoverytour.com.vn</h3>
        <font style="font-size:12px; font-family:Arial, Helvetica, sans-serif;display:block; color:#333;">
        <b>User login:</b> <?= $user->username ?>
        </font>
        <font style="font-size:12px; font-family:Arial, Helvetica, sans-serif; padding-top:5px; display:block; color:#333;">
        <b>New password:</b> <?= $password ?>
        </font>
        <font style="font-size:12px; font-family:Arial, Helvetica, sans-serif; padding-top:12px; display:block; color:#333;">
        Login <a href="<?= $config = \Yii::$app->params['email']['baseUrl'] ?>login.html" style="color:#3e7bc2; font-weight:bold; text-decoration:none;">homeapge</a> to change the password and start exploring!
        </font>
    </div>
</td>