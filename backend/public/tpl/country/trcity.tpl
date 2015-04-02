<% if(!edit) { %>
<tr data-key="<%= data.id %>">
    <% } %>
    <td class="text-center" style="vertical-align: middle"><p><%= eval(index+1) %></p></td>
    <td><%= data.name %></td>
    <td><%= data.code %></td>
    <td><%= data.language %></td>
    <td><%= data.description %></td>
    <td style="vertical-align: middle; text-align: center">
        <div class="btn-group">
            <button class="btn btn-success" onclick="country.editCity('<%= data.id %>')"><span class="glyphicon glyphicon-edit"></span> Sửa</button>
            <button class="btn btn-danger" onclick="country.removeCity('<%= data.id %>')"><span class="glyphicon glyphicon-trash"></span> Xóa</button>
        </div>
    </td>
    <% if(!edit) { %>
</tr>
<% } %>