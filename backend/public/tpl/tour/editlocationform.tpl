<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Địa điểm</h3>
    </div>
    <div class="panel-body">
        <form method="GET" action="#tour/edit-location" id="add-location-form" class="form row" >
            <div class="padding-all-5">
                <input name="tour_id" value="<%= (typeof data != 'undefined' ?  data.tour_id : '') %>" type="text" class="form-control" placeholder="tour_id" style="display: none;"/>
                <input name="id"  value="<%= (typeof data != 'undefined' ?  data.id : '') %>" type="text" class="form-control" placeholder="id" style="display: none;"/>
                <input data-search="location_name" name="location_name" type="text" value="<%= (typeof data != 'undefined' ?  data.location_name : '') %>" class="form-control" placeholder="Tên địa điểm" style="margin-top:5px;"  >
                <input data-search="location_address" name="location_address" type="text"  value="<%= (typeof data != 'undefined' ?  data.location_address : '') %>" class="form-control" placeholder="Địa chỉ" style="margin-top:5px;"  >
                <input data-search="location_desc" name="location_desc" type="text" value="<%= (typeof data != 'undefined' ?  data.location_desc : '') %>" class="form-control" placeholder="Mô tả" style="margin-top:5px;"  >
                <input data-search="position" name="position" min="0" type="number" value="<%= (typeof data != 'undefined' ?  data.position : '') %>" class="form-control" placeholder="Thứ tự" style="margin-top:5px;" >
            </div>
        </form><!-- /form -->
    </div>
</div>