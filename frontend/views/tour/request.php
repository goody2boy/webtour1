<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="container">
    <div class="big-title">
        <div class="lb-name">Tour request</div>
    </div><!-- big-title -->
    <div class="tour-request">
        <div class="tr-desc">In case you do not find your desired itinerary/ tour programs on the website, please fill in the form below and send to us. We will work out some recommendations that meet your expectations and get back to you within 24 hours.</div>
        <div class="tr-title">Personal Information</div>
        <div class="form tr-form">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Your Full name <span class="text-danger">*</span>:</label>
                        <input name="" type="text" class="form-control">
                    </div>
                </div><!-- col -->
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Phone:</label>
                        <input name="" type="text" class="form-control">
                    </div>
                </div><!-- col -->
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Country <span class="text-danger">*</span>:</label>
                        <select class="form-control">
                            <option value="0">Select Country</option>
                            <?php foreach ($countries as $country) { ?>
                                <option value="<?= $country->id ?>"><?= $country->name ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div><!-- col -->
            </div><!-- row -->
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Your email address <span class="text-danger">*</span>:</label>
                        <input name="" type="text" class="form-control">
                    </div>
                </div><!-- col -->
                <div class="col-sm-2">
                    <div class="form-group">
                        <label>Number of adults:</label>
                        <input name="" type="text" class="form-control">
                    </div>
                </div><!-- col -->
                <div class="col-sm-2">
                    <div class="form-group">
                        <label>Children:</label>
                        <input name="" type="text" class="form-control">
                    </div>
                </div><!-- col -->
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Your budget/person/day <span class="text-danger">*</span>:</label>
                        <div class="input-group">
                            <input type="text" class="form-control">
                            <span class="input-group-addon">USD</span>
                        </div>
                    </div>
                </div><!-- col -->
            </div><!-- row -->
        </div><!-- form -->
        <div class="tr-title">Travel Period</div>
        <div class="form tr-form">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Travel date <span class="text-danger">*</span>:</label>
                        <input name="" type="text" class="form-control">
                    </div>
                </div><!-- col -->
                <div class="col-sm-1">
                    <div class="form-group">
                        <label>OR</label>
                    </div>
                </div><!-- col -->
                <div class="col-sm-7">
                    <div class="form-group">
                        <label>Estimated time <span class="text-danger">*</span>:</label>
                        <textarea name="" rows="4" class="form-control"></textarea>
                    </div>
                </div><!-- col -->
            </div><!-- row -->
        </div><!-- form -->
        <div class="tr-title">Travel Arrangements <span>(Optional, please click on each item to see full details.)</span></div>
        <div class="tr-option">
            <div class="option-item">
                <div class="option-title">
                    <i class="fa fa-plus"></i>
                    1. Please choose your Tour Style(s) 
                </div>
                <div class="form tr-form">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="checkbox">
                                    <label><input name="" type="checkbox" value=""> Art &amp; Architecture</label>
                                </div>
                            </div>
                        </div><!-- col -->
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="checkbox">
                                    <label><input name="" type="checkbox" value=""> Culture</label>
                                </div>
                            </div>
                        </div><!-- col -->
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="checkbox">
                                    <label><input name="" type="checkbox" value=""> Nature Beauty</label>
                                </div>
                            </div>
                        </div><!-- col -->
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="checkbox">
                                    <label><input name="" type="checkbox" value=""> Cuisine</label>
                                </div>
                            </div>
                        </div><!-- col -->
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="checkbox">
                                    <label><input name="" type="checkbox" value=""> History</label>
                                </div>
                            </div>
                        </div><!-- col -->
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="checkbox">
                                    <label><input name="" type="checkbox" value=""> Traditional handicraft village</label>
                                </div>
                            </div>
                        </div><!-- col -->
                    </div><!-- row -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Special request:</label>
                                <textarea name="" rows="4" class="form-control"></textarea>
                            </div>
                        </div><!-- col -->
                    </div><!-- row -->
                </div><!-- form -->
            </div><!-- option-item -->
            <div class="option-item">
                <div class="option-title">
                    <i class="fa fa-plus"></i>
                    2. What about your desired destination(s) 
                </div>
                <div class="form tr-form">
                    <div class="row">
                        <div class="col-sm-3 col-xs-6 col-md-2">
                            <div class="form-group">
                                <div class="checkbox">
                                    <label><input name="" type="checkbox" value=""> Hanoi</label>
                                </div>
                            </div>
                        </div><!-- col -->
                        <div class="col-sm-3 col-xs-6 col-md-2">
                            <div class="form-group">
                                <div class="checkbox">
                                    <label><input name="" type="checkbox" value=""> Ninh Binh</label>
                                </div>
                            </div>
                        </div><!-- col -->
                        <div class="col-sm-3 col-xs-6 col-md-2">
                            <div class="form-group">
                                <div class="checkbox">
                                    <label><input name="" type="checkbox" value=""> Ba Be</label>
                                </div>
                            </div>
                        </div><!-- col -->
                        <div class="col-sm-3 col-xs-6 col-md-2">
                            <div class="form-group">
                                <div class="checkbox">
                                    <label><input name="" type="checkbox" value=""> North West</label>
                                </div>
                            </div>
                        </div><!-- col -->
                        <div class="col-sm-3 col-xs-6 col-md-2">
                            <div class="form-group">
                                <div class="checkbox">
                                    <label><input name="" type="checkbox" value=""> Ha Long</label>
                                </div>
                            </div>
                        </div><!-- col -->
                        <div class="col-sm-3 col-xs-6 col-md-2">
                            <div class="form-group">
                                <div class="checkbox">
                                    <label><input name="" type="checkbox" value=""> DMZ</label>
                                </div>
                            </div>
                        </div><!-- col -->
                        <div class="col-sm-3 col-xs-6 col-md-2">
                            <div class="form-group">
                                <div class="checkbox">
                                    <label><input name="" type="checkbox" value=""> Sapa</label>
                                </div>
                            </div>
                        </div><!-- col -->
                        <div class="col-sm-3 col-xs-6 col-md-2">
                            <div class="form-group">
                                <div class="checkbox">
                                    <label><input name="" type="checkbox" value=""> Ha Giang</label>
                                </div>
                            </div>
                        </div><!-- col -->
                        <div class="col-sm-3 col-xs-6 col-md-2">
                            <div class="form-group">
                                <div class="checkbox">
                                    <label><input name="" type="checkbox" value=""> Pu Luong</label>
                                </div>
                            </div>
                        </div><!-- col -->
                        <div class="col-sm-3 col-xs-6 col-md-2">
                            <div class="form-group">
                                <div class="checkbox">
                                    <label><input name="" type="checkbox" value=""> Mai Chau</label>
                                </div>
                            </div>
                        </div><!-- col -->
                        <div class="col-sm-3 col-xs-6 col-md-2">
                            <div class="form-group">
                                <div class="checkbox">
                                    <label><input name="" type="checkbox" value=""> Hue</label>
                                </div>
                            </div>
                        </div><!-- col -->
                        <div class="col-sm-3 col-xs-6 col-md-2">
                            <div class="form-group">
                                <div class="checkbox">
                                    <label><input name="" type="checkbox" value=""> Da lat</label>
                                </div>
                            </div>
                        </div><!-- col -->
                        <div class="col-sm-3 col-xs-6 col-md-2">
                            <div class="form-group">
                                <div class="checkbox">
                                    <label><input name="" type="checkbox" value=""> Nha Trang</label>
                                </div>
                            </div>
                        </div><!-- col -->
                        <div class="col-sm-3 col-xs-6 col-md-2">
                            <div class="form-group">
                                <div class="checkbox">
                                    <label><input name="" type="checkbox" value=""> Ho Chi Minh City</label>
                                </div>
                            </div>
                        </div><!-- col -->
                        <div class="col-sm-3 col-xs-6 col-md-2">
                            <div class="form-group">
                                <div class="checkbox">
                                    <label><input name="" type="checkbox" value=""> Vung Tau</label>
                                </div>
                            </div>
                        </div><!-- col -->
                        <div class="col-sm-3 col-xs-6 col-md-2">
                            <div class="form-group">
                                <div class="checkbox">
                                    <label><input name="" type="checkbox" value=""> Phu Quoc Island</label>
                                </div>
                            </div>
                        </div><!-- col -->
                        <div class="col-sm-3 col-xs-6 col-md-2">
                            <div class="form-group">
                                <div class="checkbox">
                                    <label><input name="" type="checkbox" value=""> Cu Chi Tunnels</label>
                                </div>
                            </div>
                        </div><!-- col -->
                        <div class="col-sm-3 col-xs-6 col-md-2">
                            <div class="form-group">
                                <div class="checkbox">
                                    <label><input name="" type="checkbox" value=""> Mekong Delta</label>
                                </div>
                            </div>
                        </div><!-- col -->
                        <div class="col-sm-3 col-xs-6 col-md-2">
                            <div class="form-group">
                                <div class="checkbox">
                                    <label><input name="" type="checkbox" value=""> Con Dao Island</label>
                                </div>
                            </div>
                        </div><!-- col -->
                    </div><!-- row -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Other destination:</label>
                                <input name="" type="text" class="form-control">
                            </div>
                        </div><!-- col -->
                    </div><!-- row -->
                </div><!-- form -->
            </div><!-- option-item -->
            <div class="option-item">
                <div class="option-title">
                    <i class="fa fa-plus"></i>
                    3. Tell us your preferred type of accommodation  
                </div>
                <div class="form tr-form">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="checkbox">
                                    <label><input name="" type="checkbox" value=""> Hotel</label>
                                </div>
                            </div>
                        </div><!-- col -->
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="checkbox">
                                    <label><input name="" type="checkbox" value=""> Resort</label>
                                </div>
                            </div>
                        </div><!-- col -->
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="checkbox">
                                    <label><input name="" type="checkbox" value=""> Homestay</label>
                                </div>
                            </div>
                        </div><!-- col -->
                    </div><!-- row -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Other request:</label>
                                <input name="" type="text" class="form-control">
                            </div>
                        </div><!-- col -->
                    </div><!-- row -->
                </div><!-- form -->
            </div><!-- option-item -->
            <div class="option-item">
                <div class="option-title">
                    <i class="fa fa-plus"></i>
                    4. Transportation 
                </div>
                <div class="form tr-form">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="checkbox">
                                    <label><input name="" type="checkbox" value=""> Airplane</label>
                                </div>
                            </div>
                        </div><!-- col -->
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="checkbox">
                                    <label><input name="" type="checkbox" value=""> Car/Bus</label>
                                </div>
                            </div>
                        </div><!-- col -->
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="checkbox">
                                    <label><input name="" type="checkbox" value=""> Train</label>
                                </div>
                            </div>
                        </div><!-- col -->
                    </div><!-- row -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Other request:</label>
                                <input name="" type="text" class="form-control">
                            </div>
                        </div><!-- col -->
                    </div><!-- row -->
                </div><!-- form -->
            </div><!-- option-item -->
            <div class="option-item">
                <div class="option-title">
                    <i class="fa fa-plus"></i>
                    5. Require for other service  
                </div>
                <div class="form tr-form">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="checkbox">
                                    <label><input name="" type="checkbox" value=""> Vietnam Visa on Arrival service</label>
                                </div>
                            </div>
                        </div><!-- col -->
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="checkbox">
                                    <label><input name="" type="checkbox" value=""> Airport transfer service</label>
                                </div>
                            </div>
                        </div><!-- col -->
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="checkbox">
                                    <label><input name="" type="checkbox" value=""> Flight ticket service</label>
                                </div>
                            </div>
                        </div><!-- col -->
                    </div><!-- row -->
                </div><!-- form -->
            </div><!-- option-item -->
        </div><!-- tr-option -->
        <div class="tr-bottom">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div><!-- tr-bottom -->
    </div><!-- tour-reques -->
</div>
