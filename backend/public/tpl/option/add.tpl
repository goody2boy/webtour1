<form class="form-horizontal" id="add-banner" style="width: 500px; margin-top: 15px;" >
    <input name="id"  value="<%= (typeof data != 'undefined' ?  data.id : '') %>" type="text" class="form-control" placeholder="id" style="display: none;"/>
    <div class="form-group">
        <label class="control-label col-sm-4">Tên:</label>
        <div class="col-sm-8">
            <input name="name" type="text" value="<%= (typeof data != 'undefined' ?  data.name : '') %>" class="form-control" placeholder="Tên"/>
        </div>
    </div>
    <div class="form-group <%= typeof data != 'undefined'?'hide':'' %>">
        <label class="control-label col-sm-4">Key:</label>
        <div class="col-sm-8">
            <input name="key" type="text" value="<%= (typeof data != 'undefined' ?  data.key : '') %>" class="form-control" placeholder="Key"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-4">Value:</label>
        <div class="col-sm-8">
            <input name="value" type="text" value="<%= (typeof data != 'undefined' ?  data.value : '') %>" class="form-control" placeholder="Value"/>
        </div>
    </div>
    
    <div class="form-group">
        <label class="control-label col-sm-4">Trạng thái:</label>
        <div class="col-sm-4">
            <select name="auto_load" class="form-control">
                <option value="1" <%= (typeof data != 'undefined' && data.auto_load == 1 ?  'selected' : '') %>>Hoạt động</option>
                <option value="0" <%= (typeof data != 'undefined' && data.auto_load == 0 ?  'selected' : '') %>>Tạm khóa</option>
            </select>
        </div>
    </div>
</form>