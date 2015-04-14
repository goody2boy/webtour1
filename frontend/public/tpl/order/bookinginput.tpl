<div class="order-title">Booking Form</div>
<div class="order-content">
    <div class="form">
        <div class="form-group">
            <label>Choose your departure date:</label>
            <div class="form-box">
                <input name="dateorder" type="text" class="form-control form-calendar" placeholder="dd/mm/yyyy">
                <i class="fa fa-calendar"></i>
            </div>
        </div><!-- form-group -->
        <div class="form-group">
            <label>No of Adults:</label>
            <div class="form-box">
                <select class="form-control text-inlineblock" id="num-adult">
                    <option value="1">1 Pax</option>
                    <option value="2">2 Pax</option>
                    <option value="3">3 Pax</option>
                    <option value="4">4 Pax</option>
                    <option value="5">5 Pax</option>
                    <option value="6">6 Pax</option>
                </select>
            </div>
        </div><!-- form-group -->
        <div class="form-group">
            <label>No of children<span> (5-10 years old)</span></label>
            <div class="form-box">
                <select class="form-control text-inlineblock" id="num-nochild">
                    <option value="0">0 Pax</option>
                    <option value="1">1 Pax</option>
                    <option value="2">2 Pax</option>
                    <option value="3">3 Pax</option>
                    <option value="4">4 Pax</option>
                    <option value="5">5 Pax</option>

                </select>
            </div>
        </div><!-- form-group -->
        <div class="form-group">
            <label>Children<span> (under 5 years old)</span></label>
            <div class="form-box">
                <select class="form-control text-inlineblock" id="num-child">
                    <option value="0">0 Pax</option>
                    <option value="1">1 Pax</option>
                    <option value="2">2 Pax</option>
                    <option value="3">3 Pax</option>
                    <option value="4">4 Pax</option>
                    <option value="5">5 Pax</option>
                    <option value="6">6 Pax</option>
                </select>
            </div>
        </div><!-- form-group -->
    </div><!-- form -->
    <div class="order-button">
        <a class="btn btn-primary" onclick="tour.calculateMoney( <%= data.tourId %> );">Calculate</a>
    </div>
</div><!-- order-content -->
<div class="order-loading"></div>
