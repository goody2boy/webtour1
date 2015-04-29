<tr rel-data="<%= data.id %>" class="success">
    <td class="text-center" style="vertical-align: middle"><p><%= data.id %></p>
    </td>
    <td class="text-center" style="vertical-align: middle">
        <img src="<%= baseUrl %>images/no_avatar.png" class="lazy" data-original="<%= baseUrl %>images/no_avatar.png"  style="max-width:60px; margin:auto;"  class="thumbnail" />
    </td>
    <td class="text-center" style="vertical-align: middle;width: 80px" >
        <img src="<%= baseUrl %>images/no_avatar.png"  style="max-width:60px; margin:auto;"  class="thumbnail" />
    </td>
    <td>
        <p class="title-item">
            -- <%=data.name%>
        </p>
    </td>
    <td>
        <p class="title-item">
            <%=data.type%>
        </p>
    </td>
    <td class="text-center" style="vertical-align: middle">
        <a href="<%= data.link%>" title="<%=data.link%>"><%=(data.link!=null&&data.link!=''?'URL':'')%></a>
    </td>
    <td>
        <div data-key="<%= data.id %>">
            <%= '<label class="label label-' + (data.active == 1 ? 'success' : 'danger') + '" >' + (data.active == 1 ? 'Hiển thị' : 'Tạm khóa') + '</label><i onclick="menu.changeActive(\'' + data.id + '\')" style="cursor: pointer" class="pull-right glyphicon glyphicon-' + (data.active == 1 ? 'check' : 'unchecked') + '" />' %>
        </div>
    </td>
    <td class="text-center" style="vertical-align: middle">
        <input type="text" onchange="menu.changePosition('<%= data.id %>');" rel-data="<%= data.id %>" class="text-center" value="<%= data.position %>" size="4">
    </td>
    <td class="text-center" style="vertical-align: middle">
        <div class="btn-group">
            <button type="button" class="btn btn-danger" onclick="menu.remove('<%= data.id %>')" >
                <i class="glyphicon glyphicon-trash pull-left" style="line-height: 16px"></i>Xóa
            </button>
            <button type="button" class="btn btn-success" onclick="menu.edit('<%= data.id %>')" >
                <i class="glyphicon glyphicon-edit pull-left" style="line-height: 16px"></i>Sửa
            </button>
            <button type="button" class="btn btn-info <%= data.parentId == 0 ? 'disabled' :'' %>" onclick="image.addImage('<%= data.id %>', 'menu');" >
                <i class="glyphicon glyphicon-picture pull-left" style="line-height: 16px"></i>Ảnh
            </button>
        </div>
    </td>
</tr>