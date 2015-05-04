<div class="func-container" >
    <div class="padding-all-5" id="location-table">
        <table id="mytable" class="table table-bordered table-striped table-hover">
            <thead>
                <tr class="success" >
                    <th class="text-center" style="vertical-align: middle" >ID</th>
                    <th class="text-center" style="vertical-align: middle;width: 150px" >Địa điểm</th>
                    <th class="text-center" style="vertical-align: middle;width: 150px" >Địa chỉ</th>
                    <th class="text-center" style="vertical-align: middle;width: 80px" >Mô tả</th>
                    <th class="text-center" style="vertical-align: middle" >Thứ tự</th>
                    <th class="text-center" style="vertical-align: middle;width: 100px" > 
                        <button onclick="tour.addLocation();" type="button" class="btn btn-info" style="width:100px;">Thêm mới</button>
                    </th>
                <tr>
            </thead>
            <tbody>
                <tr data-key=""></tr>
                <% if (data.length <= 0 ){ %>
                <tr>
                    <td colspan="8" class="text-danger" style="text-align: center">Không tồn tại địa điểm nào cho Tour này!</td>
                </tr>
                <% }else{ %>
                <% $.each(data.data, function(index){ %>
                <tr data-key="<%= this.id%>">
                    <td class="text-center" style="vertical-align: middle">
                        <p><%= this.id %></p>
                        <hr/>
                        <i class="glyphicon glyphicon-trash icon-remove" onclick="tour.remove('<%= this.id %>');"></i>
                    </td>
                    <td class="text-center" style="vertical-align: middle"><%= this.location_name %></td>
                    <td class="text-center" style="vertical-align: middle"><%= this.location_address %></td>
                    <td class="text-center" style="vertical-align: middle"><%= this.location_desc %></td>
                    <td class="text-center" style="vertical-align: middle"><%= this.position %></td>
                    <td>
                        <div style="margin-top: 5px">
                            <button onclick="tour.editLocation('<%= this.id %>');" type="button" class="btn btn-info" style="width:100px;">Sửa</button>
                        </div>
                    </td>
                </tr>
                <% }); %>
                <% } %>
            </tbody>
        </table>
    </div>
    <div class="padding-all-5" id="location-editPnl"></div>
</div>