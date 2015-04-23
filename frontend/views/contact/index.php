<?php
$home = isset($this->context->var["home"]) ? $this->context->var["home"] : '';
?>
<div class="container">
    <div class="big-title">
        <div class="lb-name">Contact Us</div>
    </div><!-- big-title -->
    <div class="box-contact">
        <div class="row">
            <div class="col-md-6">
                <div class="maincontent">
                    <p>Please see our most frequently asked questions, raise your questions or directly contact us at:</p>
                    <br />
                    <p><b>Office Address</b></p>
                    <p><b class="text-primary">Vietnam Discovery Office</b></p>
                    <p><?= !empty($home)&&isset($home['ADDRESS'])?$home['ADDRESS']:'' ?></p>
                    <br />
                    <p><b>Support by Phone</b></p>
                    <p>Please kindly contact Vietnam Discovery Tours’s Customer Support Center at: (International charges will be applied)</p>
                    <p>Hotline: <span class="text-danger"><?= !empty($home)&&isset($home['HOT_LINE'])?$home['HOT_LINE']:'' ?></span></p>
                    <br />
                    <p><b>Customer Service hours</b></p>
                    <p>Monday - Friday: 8:00 am - 5:30 pm (GMT + 7)</p>
                    <p>Saturday: 8:30 am - 11:30 am (GMT +7)</p>
                    <br />
                    <p><b>Support Online</b></p>
                    <p>Customer Support: <a href="mailto:<?= !empty($home)&&isset($home['EMAIL_INFO'])?$home['EMAIL_INFO']:'' ?>"><b><?= !empty($home)&&isset($home['EMAIL_INFO'])?$home['EMAIL_INFO']:'' ?></b></a></p>
                    <p>Feedback: <a href="mailto:<?= !empty($home)&&isset($home['EMAIL_INFO'])?$home['EMAIL_INFO']:'' ?>"><b><?= !empty($home)&&isset($home['EMAIL_INFO'])?$home['EMAIL_INFO']:'' ?></b></a></p>
                    <p>Website: <a href="#">www.vietnamdiscoverytour.com.vn</a></p>
                </div><!-- maincontent -->
            </div><!-- col -->
            <div class="col-md-6">
                <div class="box-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d956.5263454395719!2d107.59403442148643!3d16.470200789866908!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3141a1233639fd85%3A0xef7bba1699cecd75!2zNjQgTMOqIEzhu6NpLCBQaMO6IEjhu5lpLCB0cC4gSHXhur8sIFRo4burYSBUaGnDqm4gSHXhur8sIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1429180998536" width="100%" height="100%" frameborder="0" style="border:0"></iframe>
                </div><!-- box-map -->
            </div><!-- col -->
        </div><!-- row -->
    </div><!-- box-contact -->
</div><!-- container -->