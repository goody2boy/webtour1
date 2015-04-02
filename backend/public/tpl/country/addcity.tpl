<form class="form-horizontal" id="add-district" style="width: 500px; margin-top: 15px;" >
    <div class="form-group">
        <label class="control-label col-sm-4">Thành phố</label>
        <div class="col-sm-8">
            <input name="name" value="<%= (typeof data != 'undefined' ?  data.name : '') %>" type="text" class="form-control" placeholder="Thành phố"/>
        </div>
    </div>
            <input name="id"  value="<%= (typeof data != 'undefined' ?  data.id : '') %>" type="text" class="form-control" placeholder="id" style="display: none;"/>
            <input name="country_id"  value="<%= (typeof data != 'undefined' ?  data.country_id : '') %>" type="text" class="form-control" placeholder="cityid" style="display: none;"/>
    <div class="form-group">
        <label class="control-label col-sm-4">Mã</label>
        <div class="col-sm-8">
            <input name="code" value="<%= (typeof data != 'undefined' ?  data.code : '') %>" type="text" class="form-control" placeholder="Mã"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-4">Ngôn ngữ</label>
        <div class="col-sm-8">
            <input name="language" value="<%= (typeof data != 'undefined' ?  data.language : '') %>" type="text" class="form-control" placeholder="Ngôn ngữ"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-4">Mô tả</label>
        <div class="col-sm-8">
            <textarea class="form-control" name="description"><%= (typeof data != 'undefined' ?  data.description : '') %></textarea>
        </div>
    </div>
</form>