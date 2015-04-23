<div class="container">
    <div class="page-title">
        <h1>Login or Create an Account</h1>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="box">
                <div class="box-title">
                    <div class="lb-name">New Customers</div>
                </div><!-- box-title -->
                <div class="box-content">
                    <div class="form form-account">
                        <div class="form-group">
                            <img class="intro-img" src="<?= $this->context->baseUrl ?>images/intro.jpg" alt="intro" />
                        </div><!-- form-group -->
                        <div class="form-group">
                            <p class="form-control-static">
                                By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.
                            </p>
                        </div><!-- form-group -->
                        <div class="form-group">
                            <div class="form-line"></div>
                            <a class="btn btn-primary btn-lg" href="<?= $this->context->baseUrl ?>register.html">Create an Account</a>
                        </div><!-- form-group -->
                    </div><!-- form -->
                </div><!-- box-content -->
            </div><!-- box -->
        </div><!-- col -->
        <div class="col-sm-6">
            <div class="box">
                <div class="box-title">
                    <div class="lb-name">Log In</div>
                </div><!-- box-title -->
                <div class="box-content">
                    <div class="form form-account">
                        <form id="form-login">
                            <div class="row">
                                <div class="col-sm-9 col-md-8 col-lg-7">
                                    <div class="form-group has-error hide" id="error">
                                        <div class="help-block text-center"></div>
                                    </div><!-- form-group -->
                                    <div class="form-group">
                                        <label>Account <span class="text-danger">*</span></label>
                                        <input name="account" type="text" class="form-control" placeholder="username or email" />
                                    </div><!-- form-group -->
                                    <div class="form-group">
                                        <label>Password <span class="text-danger">*</span></label>
                                        <input name="password" type="password" class="form-control" />
                                    </div><!-- form-group -->
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <!--<label><input name="" type="checkbox" value="" /> Remember password</label>-->
                                            <!--<span class="form-col-line">&nbsp;|&nbsp;</span>-->
                                            <a href="<?= $this->context->baseUrl ?>forgot.html">Forgot password</a>
                                        </div>
                                    </div> 
                                </div><!-- col -->
                            </div><!-- row -->
                            <div class="form-group has-error">
                                <div class="help-block text-right">* Required Fields</div>
                            </div><!-- form-group -->
                            <div class="form-group">
                                <div class="form-line"></div>
                                <button type="button" onclick="user.login()" class="btn btn-primary btn-lg">Login</button>
                            </div><!-- form-group -->
                        </form>
                    </div><!-- form -->
                </div><!-- box-content -->
            </div><!-- box -->
        </div><!-- col -->
    </div><!-- row -->
</div><!-- container -->