<% if(!edit) { %>
<tr data-key="<%= data.id %>">
    <% } %>
    <td class="text-center" style="vertical-align: middle"><p><%= eval(index+1) %></p><hr/>
        <i class="glyphicon glyphicon-trash icon-remove" onclick="country.removeCity('<%= data.id %>');"></i></td>
    <td><%= data.name %></td>
    <td><%= data.code %></td>
    <td><%= data.language %></td>
    <td><img src="<%= baseUrl %>images/no_avatar.png" style="max-width:60px; margin:auto;"  class="thumbnail" /></td>
    <td style="vertical-align: middle; text-align: center">
        <div class="btn-group">
            <button onclick="image.addImage('<%= data.id %>', 'city');" type="button" class="btn btn-primary" style="width: 100px;">
                <span class="fa fa-image pull-left" style="line-height: 18px" ></span> Ảnh
            </button>
            <button class="btn btn-success" onclick="country.editCity('<%= data.id %>')"><span class="glyphicon glyphicon-edit"></span> Sửa</button>
        </div>
    </td>
    <% if(!edit) { %>
</tr>
<% } %>