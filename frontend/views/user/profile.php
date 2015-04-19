<div class="container">
    <div class="box-user">
        <div class="user-menu">
            <ul>
                <li class="um-home"><span>My Account</span></li>
                <li><a href="<?= $this->context->baseUrl ?>my-booking.html"><i class="fa fa-file-text-o"></i>My booking</a></li>
                <li class="active"><a href="<?= $this->context->baseUrl ?>profile.html"><i class="fa fa-user"></i>Profile</a></li>
                <li><a href="<?= $this->context->baseUrl ?>changepassword.html"><i class="fa fa-lock"></i>Change Password</a></li>
                <li><a href="<?= $this->context->baseUrl ?>logout.html"><i class="fa fa-sign-out"></i>Logout</a></li>
            </ul>
        </div>
        <div class="user-content">
            <div class="user-title">
                <div class="ut-name">Profile</div>
                <div class="ut-desc">View and update your personal information</div>
            </div>
            <div class="form form-horizontal">
                <form id="form-profile">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-sm-4">Username <span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <p class="form-control-static"><?= $user->username ?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4">First name <span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input name="firstName" value="<?= $user->firstName ?>" type="text" class="form-control" />
                                </div>
                            </div>
                            <input name="id" value="<?= $user->id ?>" type="hidden" class="form-control" />
                            <div class="form-group">
                                <label class="control-label col-sm-4">Last name <span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input name="lastName" value="<?= $user->lastName ?>" type="text" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4">Address</label>
                                <div class="col-sm-8">
                                    <input name="address" value="<?= $user->address ?>" type="text" class="form-control" />
                                </div>
                            </div>
                        </div><!-- col -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-sm-4">Phone <span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input name="phone" value="<?= $user->phone ?>" type="text" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-4">Email <span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <input name="email" value="<?= $user->email ?>" type="text" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-4">Country <span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="countryId" onchange="user.loadCity($(this).val())">
                                        <option value="">Choose</option>
                                        <?php if (!empty($countries)) { ?>
                                            <?php foreach ($countries as $c) { ?>
                                                <option <?= $c->id == $user->countryId ? 'selected' : '' ?> value="<?= $c->id ?>"><?= $c->name ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-4">City <span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="cityId">
                                        <option>Choose</option>
                                    </select>
                                </div>
                            </div>
                        </div><!-- col -->
                    </div><!-- row -->
            </div><!-- form -->
            <div class="user-bottom">
                <button type="button" onclick="user.profile()" class="btn btn-primary">Change</button>
            </div>
            </form>
        </div><!-- user-content -->
    </div><!-- box-user -->
</div><!-- container -->