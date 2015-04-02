<form class="form-horizontal" id="add-city" style="width: 500px; margin-top: 15px;" >
    <div class="form-group">
        <label class="control-label col-sm-4">Quốc gia:</label>
        <div class="col-sm-8">
            <input name="name" value="<%= (typeof data != 'undefined' ?  data.name : '') %>" type="text" class="form-control" placeholder="Quốc gia"/>
        </div>
    </div>
    <input name="id"  value="<%= (typeof data != 'undefined' ?  data.id : '') %>" type="text" class="form-control" placeholder="id" style="display: none;"/>
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
</form>