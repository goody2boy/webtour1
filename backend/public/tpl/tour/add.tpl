<form class="form-horizontal" id="add-tour" style="width: 500px; margin-top: 15px;" >
    <input name="id"  value="<%= (typeof data != 'undefined' ?  data.id : '') %>" type="text" class="form-control" placeholder="id" style="display: none;"/>
    <div class="form-group">
        <label class="control-label col-sm-4">Tiêu đề Tour:</label>
        <div class="col-sm-8">
            <input name="title" type="text" value="<%= (typeof data != 'undefined' ?  data.name : '0') %>" class="form-control" placeholder="Tên loại tiền"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-4">Thời gian dự kiến</label>
        <div class="col-sm-8">
            <input name="durationTime" type="text" value="<%= (typeof data != 'undefined' ?  data.name : '0') %>" class="form-control" placeholder="0.5"/>
        </div>
        <label class="control-label col-sm-4"> Ngày</label>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-4">Tour Code:</label>
        <div class="col-sm-8">
            <input name="code" type="text" value="<%= (typeof data != 'undefined' ?  data.code : '') %>" class="form-control" placeholder="Mã loại tiền"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-4">Tour Type:</label>
        <div class="col-sm-8">
            <select class="form-control" name="categoryTour" >
                <option value="">----- Chọn loại tour -----</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-4">Description</label>
        <div class="col-sm-8">
{*            <textarea rows="5" name="content" type="text"class="form-control" ><%= (typeof data != 'undefined' ?  data.content: '') %></textarea>*}
            <textarea rows="5" name="description" type="text"class="form-control" ><%= (typeof data != 'undefined' ?  data.content: '') %></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-4">Full itinerary</label>
        <div class="col-sm-8">
            <textarea rows="5" name="fullItinerary" type="text"class="form-control" ><%= (typeof data != 'undefined' ?  data.content: '') %></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-4">Inclusion</label>
        <div class="col-sm-8">
            <textarea rows="5" name="inclusion" type="text"class="form-control" ><%= (typeof data != 'undefined' ?  data.content: '') %></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-4">Exclusion</label>
        <div class="col-sm-8">
            <textarea rows="5" name="exclusion" type="text"class="form-control" ><%= (typeof data != 'undefined' ?  data.content: '') %></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-4">Tour note</label>
        <div class="col-sm-8">
            <textarea rows="5" name="notes" type="text"class="form-control" ><%= (typeof data != 'undefined' ?  data.content: '') %></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-4">Map Address</label>
        <div class="col-sm-8">
            <input name="mapAddress" type="text" value="<%= (typeof data != 'undefined' ?  data.code : '') %>" class="form-control" placeholder="Mã loại tiền"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-4">City</label>
        <div class="col-sm-8">
            <select class="form-control" name="city" >
                <option value="">----- Chọn -----</option>
            </select>
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
            <select name="status" class="form-control">
                <option value="1" <%= (typeof data != 'undefined' && data.active == 1 ?  'selected' : '') %>>Hoạt động</option>
                <option value="0" <%= (typeof data != 'undefined' && data.active == 0 ?  'selected' : '') %>>Tạm khóa</option>
            </select>
        </div>
    </div>
</form>