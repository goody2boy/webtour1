<?php

use yii\helpers\Html;
$config = \Yii::$app->params['email'];
/* @var $this \yii\web\View view component instance */
/* @var $message \yii\mail\MessageInterface the message being composed */
/* @var $content string main view render result */
?>
<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=<?= Yii::$app->charset ?>" />
        <title><?= Html::encode($this->title) ?></title>
<?php $this->head() ?>
    </head>
    <body>
<?php $this->beginBody() ?>
        <table border="0" cellpadding="0" cellspacing="0" align="center" bgcolor="#fff" width="650" style="border:1px solid #eee;">
            <tbody>
                <tr>
                    <td valign="top">
                        <div style="height:80px; background:#fff;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                    <tr>
                                        <td valign="top" style="text-align:center;">
                                            <a href="#" style="border:none;"><img src="images/logo.png" alt="logo" style="border:none;" /></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td valign="top" style="background:#fff;">
                        <table border="0" cellpadding="0" cellspacing="0" align="left" width="100%" bgcolor="#fff">
                            <tbody>
                                <tr>
                                    <td valign="top" style="padding:12px 0; color:#343639; background:#3e7bc2; text-align:center;">
                                        <a href="<?= $config['baseUrl'] ?>" style="font-family:Arial, Helvetica, sans-serif; font-size: 11px; font-weight:bold; color:#fff; text-decoration:none; text-transform:uppercase;">Panorama</a>
                                    </td>
                                    <td valign="top" style="padding:12px 0; color:#343639; background:#3e7bc2; text-align:center;">
                                        <a href="<?= $config['baseUrl'] ?>" style="font-family:Arial, Helvetica, sans-serif; font-size: 11px; font-weight:bold; color:#fff; text-decoration:none; text-transform:uppercase;">Our Cities</a>
                                    </td>
                                    <td valign="top" style="padding:12px 0; color:#343639; background:#3e7bc2; text-align:center;">
                                        <a href="<?= $config['baseUrl'] ?>" style="font-family:Arial, Helvetica, sans-serif; font-size: 11px; font-weight:bold; color:#fff; text-decoration:none; text-transform:uppercase;">City Highlight</a>
                                    </td>
                                    <td valign="top" style="padding:12px 0; color:#343639; background:#3e7bc2; text-align:center;">
                                        <a href="<?= $config['baseUrl'] ?>" style="font-family:Arial, Helvetica, sans-serif; font-size: 11px; font-weight:bold; color:#fff; text-decoration:none; text-transform:uppercase;">Vietnam Discovery</a>
                                    </td>
                                    <td valign="top" style="padding:12px 0; color:#343639; background:#3e7bc2; text-align:center;">
                                        <a href="<?= $config['baseUrl'] ?>" style="font-family:Arial, Helvetica, sans-serif; font-size: 11px; font-weight:bold; color:#fff; text-decoration:none; text-transform:uppercase;">Tour request</a>
                                    </td>
                                    <td valign="top" style="padding:12px 0; color:#343639; background:#3e7bc2; text-align:center;">
                                        <a href="<?= $config['baseUrl'] ?>" style="font-family:Arial, Helvetica, sans-serif; font-size: 11px; font-weight:bold; color:#fff; text-decoration:none; text-transform:uppercase;">Other service</a>
                                    </td>
                                    <td valign="top" style="padding:12px 0; color:#343639; background:#3e7bc2; text-align:center;">
                                        <a href="<?= $config['baseUrl'] ?>" style="font-family:Arial, Helvetica, sans-serif; font-size: 11px; font-weight:bold; color:#fff; text-decoration:none; text-transform:uppercase;">Diary</a>
                                    </td>
                                    <td valign="top" style="padding:12px 0; color:#343639; background:#3e7bc2; text-align:center;">
                                        <a href="<?= $config['baseUrl'] ?>" style="font-family:Arial, Helvetica, sans-serif; font-size: 11px; font-weight:bold; color:#fff; text-decoration:none; text-transform:uppercase;">Contact us</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>	
                    </td>
                </tr>
                <tr>
<?= $content ?>
                </tr>
                <tr>
                    <td valign="top" style="background:#fff;">
                        <table border="0" cellpadding="0" cellspacing="0" align="left" width="100%" bgcolor="#fff">
                            <tbody>
                                <tr>
                                    <td valign="top">
                                        <div style="padding-top:10px; padding-right:10px; padding-bottom:10px; padding-left:25px; line-height:16px; font-weight:normal; background:#4483cc; text-align:center;">
                                            <font style="font-family:Arial, Helvetica, sans-serif; font-size: 11px; color:#fff;">                                  											
                                                Vietnam Discovery Tour
                                                <br />Address: Vietnam Discovery Office - 64 Le Loi Street, Hue City, Vietnam
                                                <br />Number of Licence: 01- 420/2014/TCDL-GPLHQT
                                                <br />Hotline: +84 974 88 11 22 +84 905 351 699 - Email: info@vietnamdiscoverytour.com.vn
                                            </font>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>	
                    </td>
                </tr>
            </tbody>
        </table>
<?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
