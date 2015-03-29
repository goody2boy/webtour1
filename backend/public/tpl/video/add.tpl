<form class="form-horizontal" id="form-add" style="margin: 20px;" >
    <div class="form-group">
        <label class="control-label col-sm-5">Mã video</label>
        <div class="col-sm-5">
            <input  name="id" type="text" class="form-control"  placeholder="Mã video"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-5">Tên video</label>
        <div class="col-sm-5">
            <input  name="name" type="text" class="form-control"  placeholder="Tên video"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-5">Thứ tự</label>
        <div class="col-sm-5">
            <input name="position" type="text" class="form-control"  placeholder="Vị trí hiển thị"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-5">Trạng thái</label>
        <div class="col-sm-5">
            <select class="form-control" name="active"  >
                <option value="1">Hoạt động</option>
                <option value="2">Tạm khóa</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-5">Trạng chủ</label>
        <div class="col-sm-5">
            <select class="form-control" name="home"  >
                <option value="1">Hiển thị</option>
                <option value="2">Tạm khóa</option>
            </select>
        </div>
    </div>
</form>