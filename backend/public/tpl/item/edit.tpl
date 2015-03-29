<form class="form-horizontal" id="form-edit" style="margin: 20px;" >
    <div class="form-group">
        <input  name="id" type="hidden" value="<%= data.id %>" class="form-control"  placeholder="Mã item"/>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Tên item</label>
        <div class="col-sm-8">
            <input  name="name" type="text" value="<%= data.name %>" class="form-control"  placeholder="Tên item"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Giá</label>
        <div class="col-sm-8">
            <input  name="price" type="text" value="<%= data.price %>" class="form-control"  placeholder="Giá"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Thứ tự</label>
        <div class="col-sm-8">
            <input name="position" type="text" class="form-control" value="<%= data.position %>"  placeholder="Vị trí hiển thị"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Trạng thái</label>
        <div class="col-sm-8">
            <select class="form-control" name="active"  >
                <option <%= data.active == 1?'selected':'' %> value="1">Hoạt động</option>
                <option <%= data.active != 1?'selected':'' %> value="2">Tạm khóa</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2">Mô tả:</label>
        <div class="col-sm-8">
            <textarea id="description" name="description" cols="20" rows="5" class="form-control"><%= data.description %></textarea>
        </div>
    </div>
</form>