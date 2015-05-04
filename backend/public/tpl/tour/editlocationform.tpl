<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Địa điểm</h3>
    </div>
    <div class="panel-body">
        <div class="func-yellow">
            <form method="GET" action="#tour/edit-location" id="search" class="form row" >
                <div class="padding-all-5">
                    <input name="id"  value="<%= (typeof data != 'undefined' ?  data.id : '') %>" type="text" class="form-control" placeholder="id" style="display: none;"/>
                    <input data-search="location_name" name="location_name" type="text" value="<%= (typeof data != 'undefined' ?  data.location_name : '') %>" class="form-control" placeholder="Tên địa điểm" style="margin-top:5px;"  >
                    <input data-search="location_address" name="location_address" type="text"  value="<%= (typeof data != 'undefined' ?  data.location_address : '') %>" class="form-control" placeholder="Địa chỉ" style="margin-top:5px;"  >
                    <input data-search="location_desc" name="location_desc" type="text" value="<%= (typeof data != 'undefined' ?  data.location_desc : '') %>" class="form-control" placeholder="Mô tả" style="margin-top:5px;"  >
                    <input data-search="position" name="position" type="number" value="<%= (typeof data != 'undefined' ?  data.position : '') %>" class="form-control" placeholder="Thứ tự" style="margin-top:5px;" >
                    <button type="button" class="btn btn-default btn-lg" onclick="tour.submitEditLocation( < %= (typeof data != 'undefined' ?  data.id : '') % > );">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Submit
                    </button>
                </div>
            </form><!-- /form -->
        </div>
    </div>
</div>