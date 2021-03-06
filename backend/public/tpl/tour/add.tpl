<form class="form-horizontal" id="add-tour" style="width: 80%; margin-top: 15px;max-height: 500px;overflow-y: scroll;" >
    <input name="id"  value="<%= (typeof data != 'undefined' ?  data.id : '') %>" type="text" class="form-control" placeholder="id" style="display: none;"/>

    <div class="form-group">
        <label class="control-label col-sm-4">Tiêu đề Tour:</label>
        <div class="col-sm-8">
            <input name="title" type="text" value="<%= (typeof data != 'undefined' ?  data.title : '') %>" class="form-control" placeholder="Tiêu đề tour"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-4">Thời gian dự kiến</label>
        <div class="col-sm-8">
            <input name="duration_time" type="text" value="<%= (typeof data != 'undefined' ?  data.duration_time : '1') %>" class="form-control" placeholder="Ngày"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-4">Tour Code:</label>
        <div class="col-sm-8">
            <input name="code" type="text" value="<%= (typeof data != 'undefined' ?  data.code : '') %>" class="form-control" placeholder="Mã Tour"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-4">Tour Type:</label>
        <div class="col-sm-8">
            <select  name="tourType" multiple data-update="tourType"  class="form-control"  >
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-4">Description</label>
        <div class="col-sm-8">
            <textarea id="description" rows="5" name="description" type="text"class="form-control" ><%= (typeof data != 'undefined' ?  data.description: '') %></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-4">Full itinerary</label>
        <div class="col-sm-8">
            <textarea rows="5" name="full_initerary" type="text"class="form-control" ><%= (typeof data != 'undefined' ?  data.full_initerary: '') %></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-4">Inclusion</label>
        <div class="col-sm-8">
            <textarea rows="5" name="inclusion" type="text"class="form-control" ><%= (typeof data != 'undefined' ?  data.inclusion: '') %></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-4">Exclusion</label>
        <div class="col-sm-8">
            <textarea rows="5" name="exclusion" type="text"class="form-control" ><%= (typeof data != 'undefined' ?  data.exclusion: '') %></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-4">Tour note</label>
        <div class="col-sm-8">
            <textarea rows="5" name="notes" type="text"class="form-control" ><%= (typeof data != 'undefined' ?  data.note: '') %></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-4">Map Address</label>
        <div class="col-sm-8">
            <input name="mapp_address" type="text" value="<%=  (typeof data != 'undefined' ?  data.mapp_address : '') %>" class="form-control" placeholder="Địa chỉ map"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-4">City</label>
        <div class="col-sm-8">
            <select name="city_id" data-update="city_id" class="form-control"  >
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-4">Ngôn ngữ:</label>
        <div class="col-sm-8">
            <select name="language" class="form-control" >
                <option value="">----- Chọn -----</option>
                <option value="VI" <%= (typeof data != 'undefined' && data.language == 'VI' ?  'selected' : '') %>>VI</option>
                <option value="EN" <%= (typeof data != 'undefined' && data.language == 'EN' ?  'selected' : '') %>>EN</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-4">Trạng thái:</label>
        <div class="col-sm-4">
            <select name="status" class="form-control">
                <option value="1" <%= (typeof data != 'undefined' && data.active == 1 ?  'selected' : '') %>>Hoạt động</option>
                <option value="0" <%= (typeof data != 'undefined' && data.active == 0 ?  'selected' : '') %>>Tạm khóa</option>
            </select>
        </div>
    </div>
</form>