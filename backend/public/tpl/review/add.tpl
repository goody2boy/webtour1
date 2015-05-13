<form class="form-horizontal" id="add-review" style="width: 500px; margin-top: 15px;" >
    <input name="id"  value="<%= (typeof data != 'undefined' ?  data.id : '') %>" type="text" class="form-control" placeholder="id" style="display: none;"/>
    <div class="form-group">
        <label class="control-label col-sm-4">Người review</label>
        <div class="col-sm-8">
            <select class="form-control" name="user_id" data-insert="user_id">
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-4">Nội dung review</label>
        <div class="col-sm-8">
            <input name="review_comment" type="text" value="<%= (typeof data != 'undefined' ?  data.review_comment : '') %>" class="form-control" placeholder="Nội dung review"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-4">Rate</label>
        <div class="col-sm-8">
            <select class="form-control" name="rate" data-insert="rate">
                <option value="">----- Chọn -----</option>
                <option value="0" >0 Star</option>
                <option value="1" >1 Star</option>
                <option value="2" >2 Star</option>
                <option value="3" >3 Star</option>
                <option value="4" >4 Star</option>
                <option value="5" >5 Star</option>
            </select>
        </div>
    </div>
</form>