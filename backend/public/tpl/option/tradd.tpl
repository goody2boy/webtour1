<tr rel-data="<%= data.id %>">
    <td class="text-center" style="vertical-align: middle">
        <%= eval(next+1) %>
    </td>
    <td class="text-center" style="vertical-align: middle;width: 80px" ><%= data.key %></td>
    <td class="text-center" style="vertical-align: middle;width: 80px" ><%= data.value %></td>
    <td class="text-center" style="vertical-align: middle;width: 80px" ><%= data.name %></td>
    <td class="text-center" style="vertical-align: middle;" >
        <div data-key-active="<%= data.id %>">
            <%= '<label class="label label-' + (data.auto_load == 1 ? 'success' : 'danger') + '" >' + (data.auto_load == 1 ? 'Hiển thị' : 'Tạm khóa') + '</label><i onclick="option.changeActive(\'' + data.id + '\')" style="cursor: pointer; margin-left: 5px;" class="glyphicon glyphicon-' + (data.auto_load == 1 ? 'check' : 'unchecked') + '" />' %>
        </div>
    </td>
    <td>
        <div class="btn-group" style=" margin-left: 23px;">
            <button onclick="option.edit('<%=data.id%>')" type="button" class="btn btn-primary" style="width: 80px;"><span class="glyphicon glyphicon-edit pull-left" style="line-height: 18px"></span> Sửa</button>
            <button onclick="option.remove('<%=data.id%>')" type="button" class="btn btn-danger" style="width: 80px;"><span class="glyphicon glyphicon-trashpull-left" style="line-height: 18px"></span> Xóa</button>
        </div>
    </td>
<tr>