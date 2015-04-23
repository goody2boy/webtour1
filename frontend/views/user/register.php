<div class="container">
    <div class="page-title">
        <h1>Create an Account</h1>
    </div>
    <div class="box">
        <div class="box-title">
            <div class="lb-name">Register Information</div>
        </div><!-- box-title -->
        <div class="box-content">
            <form id="form-register">
            <div class="form form-horizontal form-account">
                <div class="form-group">
                    <label class="control-label col-sm-2">Email Address <span class="text-danger">*</span></label>
                    <div class="col-sm-5">
                        <input name="email" type="text" class="form-control" />
                    </div>
                </div><!-- form-group -->
                <div class="form-group">
                    <label class="control-label col-sm-2">Username <span class="text-danger">*</span></label>
                    <div class="col-sm-5">
                        <input name="username" type="text" class="form-control" />
                    </div>
                </div><!-- form-group -->
                <div class="form-group">
                    <label class="control-label col-sm-2">Password <span class="text-danger">*</span></label>
                    <div class="col-sm-5">
                        <input name="password" type="password" class="form-control" />
                    </div>
                </div><!-- form-group -->
                <div class="form-group">
                    <label class="control-label col-sm-2">Re Password <span class="text-danger">*</span></label>
                    <div class="col-sm-5">
                        <input name="repassword" type="password" class="form-control" />
                    </div>
                </div><!-- form-group -->
                <div class="form-group">
                    <label class="control-label col-sm-2">Phone <span class="text-danger">*</span></label>
                    <div class="col-sm-5">
                        <input name="phone" type="text" class="form-control" />
                    </div>
                </div><!-- form-group -->
                <div class="form-group">
                    <label class="control-label col-sm-2">First name <span class="text-danger">*</span></label>
                    <div class="col-sm-5">
                        <input name="firstName" type="text" class="form-control" />
                    </div>
                </div><!-- form-group -->
                <div class="form-group">
                    <label class="control-label col-sm-2">Last name <span class="text-danger">*</span></label>
                    <div class="col-sm-5">
                        <input name="lastName" type="text" class="form-control" />
                    </div>
                </div><!-- form-group -->
                <div class="form-group">
                    <label class="control-label col-sm-2">Address <span class="text-danger">*</span></label>
                    <div class="col-sm-5">
                        <input name="address" type="text" class="form-control" />
                    </div>
                </div><!-- form-group -->
                <div class="form-group">
                    <label class="control-label col-sm-2">Country <span class="text-danger">*</span></label>
                    <div class="col-sm-3">
                        <select class="form-control" name="countryId" onchange="user.loadCity($(this).val())">
                            <option value="">Choose</option>
                            <?php if (!empty($countries)) { ?>
                                <?php foreach ($countries as $c) { ?>
                                    <option value="<?= $c->id ?>"><?= $c->name ?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                    </div>
                </div><!-- form-group -->
                <div class="form-group">
                    <label class="control-label col-sm-2">City <span class="text-danger">*</span></label>
                    <div class="col-sm-3">
                        <select class="form-control" name="cityId">
                            <option value="">Choose</option>

                        </select>
                    </div>
                </div><!-- form-group -->
                <!--                <div class="form-group">
                                    <div class="col-sm-10 col-sm-offset-2">
                                        <div class="checkbox">
                                            <label><input name="" type="checkbox" value="" /> I agree to the terms of website</label>
                                            <span class="form-col-line">&nbsp;|&nbsp;</span>
                                            <a href="#">view</a>
                                        </div>
                                    </div>
                                </div> form-group -->
                <div class="form-group has-error">
                    <div class="help-block text-right">* Required Fields</div>
                </div><!-- form-group -->
                <div class="form-group">
                    <div class="form-line"></div>
                    <button type="button" onclick="user.register()" class="btn btn-primary btn-lg">Submit</button>
                    <a class="pull-right btn-site" href="#"><i class="fa fa-long-arrow-left"></i>Back</a>
                </div><!-- form-group -->
            </div><!-- form -->
            </form>
        </div><!-- box-content -->
    </div><!-- box -->
</div><!-- container -->