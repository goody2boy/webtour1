<div class="container">
    <div class="box-user">
        <div class="user-menu">
            <ul>
                <li class="um-home"><span>My Account</span></li>
                <li><a href="<?= $this->context->baseUrl ?>my-booking.html"><i class="fa fa-file-text-o"></i>My booking</a></li>
                <li><a href="<?= $this->context->baseUrl ?>profile.html"><i class="fa fa-user"></i>Profile</a></li>
                <li class="active"><a href="<?= $this->context->baseUrl ?>changepassword.html"><i class="fa fa-lock"></i>Change Password</a></li>
                <li><a href="<?= $this->context->baseUrl ?>logout.html"><i class="fa fa-sign-out"></i>Logout</a></li>
            </ul>
        </div>
        <div class="user-content">
            <div class="user-title">
                <div class="ut-name">Change password</div>
            </div>
            <div class="form form-horizontal">
                <form id="form-pass">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="form-group">
                                <label class="control-label col-sm-5">Current Password <span class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <input name="password" type="password" class="form-control">
                                </div>
                            </div>
                            <input name="id" type="hidden" value="<?= \Yii::$app->getSession()->get('customer')->id ?>" class="form-control">
                            <div class="form-group">
                                <label class="control-label col-sm-5">New Password <span class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <input name="newpassword" type="password" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-5">Re Password <span class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <input name="repassword" type="password" class="form-control">
                                </div>
                            </div>
                        </div><!-- col -->
                    </div><!-- row -->
            </div><!-- form -->
            <div class="user-bottom">
                <button type="button" onclick="user.changepass()" class="btn btn-primary">Change</button>
            </div>
            </form>
        </div><!-- user-content -->
    </div><!-- box-user -->
</div>