<div class="order-title">Booking Form</div>
<div class="order-content">
    <div class="form">
        <div class="form-group">
            <label>Choose your departure date:</label>
            <p class="form-control-static"><%= data.dateorder%></p>
        </div><!-- form-group -->
        <div class="form-group">
            <label>No of Adults:</label>
            <div class="form-box">
                <p class="form-control-static"><%=data.adult%> pax x $<%=data.price%><span class="pull-right text-danger">= $<%=data.adult * data.price%></span></p>
            </div>
        </div><!-- form-group -->
        <div class="form-group">
            <label>No of children<span> (5-10 years old)</span></label>
            <div class="form-box">
                <p class="form-control-static"><%=data.nochild%> pax x $<%=data.price * 70/100 %> (70% adult's rate)<span class="pull-right text-danger">= $<%=data.nochild * data.price * 70/100%></span></p>
            </div>
        </div><!-- form-group -->
        <div class="form-group">
            <label>Children<span> (under 5 years old)</span></label>
            <div class="form-box">
                <p class="form-control-static"><%=data.child%> pax (Free of charge)<span class="pull-right text-danger">= $0</span></p>
            </div>
        </div><!-- form-group -->
        <div class="form-group">
            <label>Total fee:<span class="text-danger pull-right">$<%=data.adult * data.price + data.nochild * data.price * 70/100%></span></label>
        </div><!-- form-group -->
    </div><!-- form -->
    <div class="order-button">
        <a class="btn btn-primary" onclick="$('#totalFee').html('$'+<%=data.adult * data.price + data.nochild * data.price * 70/100%>);" data-toggle="modal" data-target="#ModalOrder">Let's go</a>
        <a class="btn btn-default" onclick="tour.ShowBookingInput(<%= data.tourId%>);"><i class="fa fa-long-arrow-left"></i>Return...</a>
    </div>
</div><!-- order-content -->
<div class="order-loading"></div>
