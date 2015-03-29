<form class="form-horizontal" id="form-contact" style="width: 500px; margin-top: 15px;" >
    <div class="form-group">
        <label class="control-label col-sm-4">Email Contact:</label>
        <div class="col-sm-8">
            <input name="emailcontact" type="text" value="<%= (typeof data != 'undefined' ?  data.emailcontact: '') %>" class="form-control" placeholder="Email Contact"/>
        </div>
    </div>
    <input name="id" type="hidden" value="<%= (typeof data != 'undefined' ?  data.id : '') %>" class="form-control" placeholder="ID"/>
    <div class="form-group">
        <label class="control-label col-sm-4">Email Admin:</label>
        <div class="col-sm-8">
            <input name="emailadmin" type="text" value="<%= (typeof data != 'undefined' ?  data.emailadmin: '') %>" class="form-control" placeholder="Email Ceo"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-4">Phone:</label>
        <div class="col-sm-8">
            <input name="phone" type="text" value="<%= (typeof data != 'undefined' ?  data.phone: '') %>" class="form-control" placeholder="Phone"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-4">Hot line:</label>
        <div class="col-sm-8">
            <input name="hotline" type="text" value="<%= (typeof data != 'undefined' ?  data.hotline: '') %>" class="form-control" placeholder="Hot line"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-4">Slogan:</label>
        <div class="col-sm-8">
            <input name="slogan" type="text" value="<%= (typeof data != 'undefined' ?  data.slogan: '') %>" class="form-control" placeholder="Slogan"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-4">Facebook:</label>
        <div class="col-sm-8">
            <input name="facebook" type="text" value="<%= (typeof data != 'undefined' ?  data.facebook: '') %>" class="form-control" placeholder="facebook"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-4">Youtube:</label>
        <div class="col-sm-8">
            <input name="youtube" type="text" value="<%= (typeof data != 'undefined' ?  data.youtube: '') %>" class="form-control" placeholder="youtube"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-4">Twitter:</label>
        <div class="col-sm-8">
            <input name="twitter" type="text" value="<%= (typeof data != 'undefined' ?  data.twitter: '') %>" class="form-control" placeholder="twitter"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-4">Thông điệp:</label>
        <div class="col-sm-8">
            <textarea id="bank" name="bank" type="text"class="form-control" ><%= (typeof data != 'undefined' ?  data.bank: '') %></textarea>
        </div>
    </div>
</form>