<div class="container">
    <div class="bground">
        <ol class="breadcrumb">
            <li><a href="<?= $this->context->baseUrl ?>"><i class="fa fa-home"></i>Trang chủ</a></li>
            <li class="active">Liên hệ</li>
        </ol>
    </div><!-- bground -->
</div>
<div class="box-map">
    <div class="bm-content">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3723.9518929641454!2d105.79354060000001!3d21.034610800000003!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab480cc7809f%3A0x45f49cc9a1a316cd!2zVMOyYSBuaMOgIENUTSwgMjk5IEPhuqd1IEdp4bqleSwgROG7i2NoIFbhu41uZywgQ-G6p3UgR2nhuqV5LCBIw6AgTuG7mWksIFZpZXRuYW0!5e0!3m2!1sen!2s!4v1423212741249" width="100%" height="100%" frameborder="0" style="border:0"></iframe>
    </div><!-- bm-content -->
    <div class="bm-ovelay">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-5 pull-right">
                    <div class="contact-form form form-horizontal">
                        <form id="form-contact">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <h4>Hãy liên hệ với chúng tôi</h4>
                            </div>
                        </div>
                            <div class="form-group sm-reset-5">
                            <div class="col-sm-6 padding-all-5">
                                <input name="name" type="text" class="form-control" placeholder="Họ tên *">
                            </div>
                            <div class="col-sm-6 padding-all-5">
                                <input name="email" type="text" class="form-control" placeholder="Email *">
                            </div>	
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <textarea name="content" cols="" rows="4" class="form-control" placeholder="Thông điệp *"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 text-right">
                                <button type="button" onclick="contact.add()" class="btn btn-primary">Gửi đi</button>
                            </div>
                        </div>
                        </form>
                    </div><!-- contact-form -->
                </div><!-- col -->
            </div><!-- row -->
        </div><!-- box-map -->
    </div><!-- bm-ovelay -->
</div>