<form class="form-horizontal" id="edit-menu">
    <div class="form-group">
        <label class="control-label col-sm-3">Tiêu đề:</label>
        <div class="col-sm-8">
            <input name="name" type="text" value="<%=data.name%>" class="form-control" placeholder="Tên menu"/>
        </div>
    </div>
            <input name="id" type="hidden" value="<%=data.id%>" class="form-control"/>
    <div class="form-group">
        <label class="control-label col-sm-3">Menu cha:</label>
        <div class="col-sm-8">
            <select data-detail="parentId" name="parentId" class="form-control" >
                <option value="" >-- Là menu gốc --</option>
            </select>
        </div>
    </div>
    <div class="form-group" for="link">
        <label class="control-label col-sm-3">Link:</label>
        <div class="col-sm-8">
            <input name="link" type="text" value="<%= data.link %>" class="form-control" placeholder="Link"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3">Vị trí hiển thị:</label>
        <div class="col-sm-8">
            <input name="position" value="<%= data.position%>" type="text" class="form-control" placeholder="Vị trí hiển thị"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-3">Trạng thái</label>
        <div class="col-sm-8">
            <select name="active" class="form-control" >
                <option <%= data.active == 1 ? 'selected' : '' %> value="1" >Hiển thị</option>
                <option <%= data.active != 1 ? 'selected' : '' %> value="2" >Tạm khóa</option>
            </select>
        </div>
    </div>
</form>