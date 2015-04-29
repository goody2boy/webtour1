<form class="form-horizontal" id="edit-order" style="width: 80%; margin-top: 15px;" >
    <input name="id"  value="<%= (typeof data != 'undefined' ?  data.id : '') %>" type="text" class="form-control" placeholder="id" style="display: none;"/>
    <div class="form-group">
        <label class="control-label col-sm-4">Thời gian dự kiến</label>
        <div class="input-group col-sm-8" style="margin-top:5px;">
            <input type="hidden" name="date_departure" data-search="date_departure" class="form-control" placeholder="Thời gian dự kiến đi" value="<%= (typeof data != 'undefined' ?  data.date_departure : '') %>">
            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-4">Number Adult</label>
        <div class="col-sm-8">
            <input name="number_adult" type="number" max="5" min="1" class="form-control" value="<%= (typeof data != 'undefined' ?  data.number_adult : '') %>"  placeholder=""/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-4">Number No Child</label>
        <div class="col-sm-8">
            <input name="number_nochild" type="number" max="5" min="0" class="form-control" value="<%= (typeof data != 'undefined' ?  data.number_nochild : '') %>"  placeholder=""/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-4">Number Child</label>
        <div class="col-sm-8">
            <input name="number_child" type="number" max="5" min="0" class="form-control" value="<%= (typeof data != 'undefined' ?  data.number_child : '') %>"  placeholder=""/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-4">Trạng thái thanh toán</label>
        <div class="col-sm-4">
            <select data-search="status_payment" class="form-control" name="status_payment"  style="margin-top:5px;" >
                <option value="" >--Trạng thái thanh toán--</option>
                <option value="EVER" <%= (typeof data != 'undefined' && data.status_payment == "EVER" ?  'selected' : '') %>>Chưa thanh toán</option>
                <option value="DONE" <%= (typeof data != 'undefined' && data.status_payment == "DONE" ?  'selected' : '') %>>Xác nhận thanh toán</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-4">Phương thức thanh toán</label>
        <div class="col-sm-4">
            <select data-search="payment_method" class="form-control" name="payment_method"  style="margin-top:5px;" >
                <option value="" >--Phương thức thanh toán--</option>
                <option value="PAYPAL" <%= (typeof data != 'undefined' && data.payment_method == "PAYPAL" ?  'selected' : '') %>>PayPal</option>
                <option value="MASTER_CARD" <%= (typeof data != 'undefined' && data.payment_method == "MASTER_CARD" ?  'selected' : '') %>>Master Card</option>
                <option value="LATER" <%= (typeof data != 'undefined' && data.payment_method == "LATER" ?  'selected' : '') %>>LATER</option>
            </select>
        </div>
    </div>
</form>