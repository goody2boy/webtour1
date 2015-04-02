<div class="cms-content">
    <div class="func-container">
        <div class="table-responsive">
            <table id="mytable" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr class="success" >
                        <th class="text-center" style="vertical-align: middle" >STT</th>
                        <th class="text-center" style="vertical-align: middle" ></th>
                        <th class="text-center" style="vertical-align: middle" >ID</th>
                        <th class="text-center" style="vertical-align: middle" >Quốc gia</th>
                        <th class="text-center" style="vertical-align: middle;width: 80px" >Mã</th>
                        <th class="text-center" style="vertical-align: middle;width: 80px" >Ngôn ngữ</th>
                        <th class="text-center" style="vertical-align: middle;width: 280px" >
                            Chức năng<i style="cursor: pointer" onclick="country.add()" class="pull-right glyphicon glyphicon-plus">
                        </th>
                    <tr>
                </thead>
                <tbody>
                    <% if (data.length <= 0 ){ %>
                    <tr>
                        <td colspan="7" class="text-danger" style="text-align: center">Không tồn tại quốc gia nào trong cơ sở dữ liệu!</td>
                    </tr>
                    <% }else{ %>
                    <% $.each(data, function(index){ %>
                    <tr rel-data="<%= this.id %>">
                        <td class="text-center" style="vertical-align: middle"><p><%= eval(index+1) %></p></td>
                        <td class="text-center" style="vertical-align: middle"><i class="glyphicon glyphicon-trash icon-remove" onclick="country.remove('<%= this.id %>')"></i></td>
                        <td class="text-center" style="vertical-align: middle"><%= this.id %></td>
                        <td class="text-center" style="vertical-align: middle"><%= this.name %></td>
                        <td class="text-center" style="vertical-align: middle"><%= this.code %></td>
                        <td class="text-center" style="vertical-align: middle"><%= this.language %></td>
                        <td class="text-center" style="vertical-align: middle">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary" onclick="country.getCity('<%= this.id %>')" >
                                    <i class="glyphicon glyphicon-list pull-left" style="line-height: 16px"></i>Thành phố
                                </button>
                                <button type="button" class="btn btn-warning" onclick="country.edit('<%= this.id %>');" >
                                    <i class="glyphicon glyphicon-edit pull-left" style="line-height: 16px"></i>Sửa
                                </button>
                            </div>
                        </td>
                    </tr>
                    <% }); %>
                    <% } %>
                </tbody>
            </table>
            <div class="clearfix"></div>
        </div><!-- /table-responsive -->
    </div><!-- /func-container -->
</div><!-- /cms-content -->