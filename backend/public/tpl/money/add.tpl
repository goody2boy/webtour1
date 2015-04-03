<form class="form-horizontal" id="add-money" style="width: 500px; margin-top: 15px;" >
    <input name="id"  value="<%= (typeof data != 'undefined' ?  data.id : '') %>" type="text" class="form-control" placeholder="id" style="display: none;"/>
    <div class="form-group">
        <label class="control-label col-sm-4">Mã loại tiền:</label>
        <div class="col-sm-8">
            <input name="code" type="text" value="<%= (typeof data != 'undefined' ?  data.code : '') %>" class="form-control" placeholder="Mã loại tiền"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-4">Tên loại tiền:</label>
        <div class="col-sm-8">
            <input name="name" type="text" value="<%= (typeof data != 'undefined' ?  data.name : '0') %>" class="form-control" placeholder="Tên loại tiền"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-4">Ngôn ngữ:</label>
        <div class="col-sm-8">
            <select class="form-control" name="language" >
                <option value="">----- Chọn -----</option>
                <option value="VI" <%= (typeof data != 'undefined' && data.language == 'VI' ?  'selected' : '') %>>VI</option>
                <option value="EN" <%= (typeof data != 'undefined' && data.language == 'EN' ?  'selected' : '') %>>EN</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-4">Trạng thái:</label>
        <div class="col-sm-4">
            <select name="active" class="form-control">
                <option value="1" <%= (typeof data != 'undefined' && data.active == 1 ?  'selected' : '') %>>Hoạt động</option>
                <option value="0" <%= (typeof data != 'undefined' && data.active == 0 ?  'selected' : '') %>>Tạm khóa</option>
            </select>
        </div>
    </div>
</form>