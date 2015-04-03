<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover text-center">
        <thead>
            <tr class="success">
                <th class="text-center" style="vertical-align: middle">STT</th>
                <th class="text-center" style="vertical-align: middle">Tên</th>
                <th class="text-center" style="vertical-align: middle">Mã</th>
                <th class="text-center" style="vertical-align: middle">Ngôn ngữ</th>
                <th class="text-center" style="vertical-align: middle">Mô tả</th>
                <th class="text-center" style="vertical-align: middle;width: 200px"> 
                    <button class="btn btn-success" onclick="country.addCity('<%= data.country_id %>')"><span class="glyphicon glyphicon-save"></span>Thêm</button>
                </th>
            </tr><tr>
            </tr></thead>
        <tbody>
            <% $.each(data, function(index){ %>
            <tr data-key="<%= this.id %>">
                <td class="text-center" style="vertical-align: middle"><p><%= eval(index+1) %></p></td>
                <td><%= this.name %></td>
                <td><%= this.code %></td>
                <td><%= this.language %></td>
                <td><%= this.description %></td>
                <td style="vertical-align: middle; text-align: center">
                    <div class="btn-group">
                        <button class="btn btn-success" onclick="country.editCity('<%= this.id %>')"><span class="glyphicon glyphicon-edit"></span> Sửa</button>
                        <button class="btn btn-danger" onclick="country.removeCity('<%= this.id %>')"><span class="glyphicon glyphicon-trash"></span> Xóa</button>
                    </div>
                </td>
            </tr>
            <% }); %>
        </tbody>
    </table>
</div>