<% if(edit == false) { %>                    
<tr data-key="<%= data.id%>" class="success">
    <% } %>
    <td class="text-center" style="vertical-align: middle">
        <p><%= eval(next) %></p>
        <hr/>
        <i class="glyphicon glyphicon-trash icon-remove" onclick="album.remove('<%= data.id %>');"></i>
    </td>
    <td class="text-center" style="vertical-align: middle">
        <img src="<%= baseUrl %>images/no_avatar.png" class="lazy" data-original="<%= baseUrl %>images/no_avatar.png" style="max-width:60px; margin:auto;"  class="thumbnail" />
    </td>
    <td class="text-center" style="vertical-align: middle"><%= data.name %></td>
    <td>
        <div data-key="<%= data.id %>">
            <%= '<label class="label label-' + (data.active == 1 ? 'success' : 'danger') + '" >' + (data.active == 1 ? 'Hoạt động' : 'Tạm khóa') + '</label><i onclick="album.changeActive(\'' + data.id + '\')" style="cursor: pointer" class="pull-right glyphicon glyphicon-' + (data.active == 1 ? 'check' : 'unchecked') + '" />' %>
        </div>
    </td>
    <td>
        <div data-key-home="<%= data.id %>">
            <%= '<label class="label label-' + (data.home == 1 ? 'success' : 'danger') + '" >' + (data.home == 1 ? 'Hiển thị' : 'Tạm khóa') + '</label><i onclick="album.changeHome(\'' + data.id + '\')" style="cursor: pointer" class="pull-right glyphicon glyphicon-' + (data.home == 1 ? 'check' : 'unchecked') + '" />' %>
        </div>
    </td>
    <td class="text-center" style="vertical-align: middle"><%= textUtils.formatTime(data.createTime,'day') %></td>
    <td class="text-center" style="vertical-align: middle"><%= textUtils.formatTime(data.updateTime,'day') %></td>
    <td>
        <div class="btn-group" style="margin-top: 5px">
            <button onclick="album.edit('<%=data.id%>')" type="button" class="btn btn-success" style="width: 100px;"><span class="glyphicon glyphicon-edit pull-left" style="line-height: 18px"></span> Sửa</button>
            <button onclick="image.addImage('<%= data.id %>', 'album');" type="button" class="btn btn-info" style="width: 100px;">
                <span class="fa fa-image pull-left" style="line-height: 18px" ></span> Ảnh
            </button>
        </div>
    </td>
    <% if(edit == false) { %>
</tr>
<% } %>