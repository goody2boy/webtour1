<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover text-center">
        <thead>
            <tr class="success">
                <th class="text-center" style="vertical-align: middle">STT</th>
                <th class="text-center" style="vertical-align: middle">Tên</th>
                <th class="text-center" style="vertical-align: middle">Mã</th>
                <th class="text-center" style="vertical-align: middle">Ngôn ngữ</th>
                <th class="text-center" style="vertical-align: middle">Ảnh</th>
                <th class="text-center" style="vertical-align: middle;width: 200px"> 
                    <button class="btn btn-success" onclick="country.addCity('<%= data.country_id %>')"><span class="glyphicon glyphicon-save"></span>Thêm</button>
                </th>
            </tr><tr>
            </tr></thead>
        <tbody>
            <% $.each(data, function(index){ %>
            <tr data-key="<%= this.id %>">
                <td class="text-center" style="vertical-align: middle"><p><%= eval(index+1) %></p>  <hr/>
                            <i class="glyphicon glyphicon-trash icon-remove" onclick="country.removeCity('<%= this.id %>');"></i></td>
                <td><%= this.name %></td>
                <td><%= this.code %></td>
                <td><%= this.language %></td>
                <td> <% if(this.images.length > 0){ %>
                    <img src="<%= this.images[0] %>" style="max-width:60px; margin:auto;" class="thumbnail"/>
                    <%}else { %>
                    <img src="<%= baseUrl %>images/no_avatar.png" style="max-width:60px; margin:auto;"  class="thumbnail" />
                    <% } %></td>
                <td style="vertical-align: middle; text-align: center">
                    <div class="btn-group">
                        <button onclick="image.addImage('<%= this.id %>', 'city');" type="button" class="btn btn-primary" style="width: 100px;">
                            <span class="fa fa-image pull-left" style="line-height: 18px" ></span> Ảnh
                        </button>
                        <button class="btn btn-success" onclick="country.editCity('<%= this.id %>')"><span class="glyphicon glyphicon-edit"></span> Sửa</button>
                    </div>
                </td>
            </tr>
            <% }); %>
        </tbody>
    </table>
</div>