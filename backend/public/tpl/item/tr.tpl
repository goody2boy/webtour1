<% if(edit == false) { %>                    
<tr data-key="<%= data.id%>" class="success">
    <% } %>
    <td class="text-center" style="vertical-align: middle"><p><%= data.id %></p><hr/>
                            <i class="glyphicon glyphicon-trash icon-remove" onclick="item.remove('<%= data.id %>');"></i></td>
    <td class="text-center" style="vertical-align: middle">
        <img src="<%= baseUrl %>images/no_avatar.png" style="max-width:60px; margin:auto;"   class="thumbnail" />
    </td>
    <td class="text-center" style="vertical-align: middle"><%= data.name %></td>
    <td class="text-center" style="vertical-align: middle"><%= eval(data.price).toMoney() %> đ</td>
    <td>
        <div data-key="<%= data.id %>">
            <%= '<label class="label label-' + (data.active == 1 ? 'success' : 'danger') + '" >' + (data.active == 1 ? 'Hoạt động' : 'Tạm khóa') + '</label><i onclick="item.changeActive(\'' + data.id + '\')" style="cursor: pointer" class="pull-right glyphicon glyphicon-' + (data.active == 1 ? 'check' : 'unchecked') + '" />' %>
        </div>
    </td>
    <td class="text-center" style="vertical-align: middle"><input type="text" onchange="item.changePosition('<%= data.id %>');" rel-data="<%= data.id %>" class="text-center" value="<%= data.position %>" size="4"></td>
    <td>
        <div class="btn-group" style="margin-top: 5px">
            <button onclick="item.edit('<%=data.id%>')" type="button" class="btn btn-success" style="width: 100px;"><span class="glyphicon glyphicon-edit pull-left" style="line-height: 18px"></span> Sửa</button>
            <button onclick="image.addImage('<%= data.id %>', 'item');" type="button" class="btn btn-info" style="width: 100px;">
                <span class="fa fa-image pull-left" style="line-height: 18px" ></span> Ảnh
            </button>
        </div>
        <div class="btn-group" style="margin-top: 5px">
            <button onclick="item.content('<%=data.id%>')" type="button" class="btn btn-info" style="width: 100px;"><span class="glyphicon glyphicon-list-alt pull-left" style="line-height: 18px"></span> Nội dung</button>
            <button onclick="item.about('<%=data.id%>')" type="button" class="btn btn-success" style="width: 100px;"><span class="glyphicon glyphicon-edit pull-left" style="line-height: 18px"></span> Thông tin</button>
        </div>
        <div class="btn-group" style="margin-top: 5px">
            <button onclick="item.property('<%=data.id%>')" type="button" class="btn btn-success" style="width: 100px;"><span class="glyphicon glyphicon-list pull-left" style="line-height: 18px"></span> Thuộc tính</button>
            <button type="button" class="btn btn-info" onclick="metaitem.config('<%= data.id %>')" style="width: 102px;">
                                    <i class="fa fa-wrench"></i>
                                    Cấu hình
                                </button>
        </div>
    </td>
    <% if(edit == false) { %>
</tr>
<% } %>