<% if(!edit) { %>
<tr rel-data="<%= data.id %>">
    <% } %>
    <td class="text-center" style="vertical-align: middle"><p><%= next+1 %></p></td>
    <td class="text-center" style="vertical-align: middle"><i class="glyphicon glyphicon-trash icon-remove" onclick="country.remove('<%= data.id %>')"></i></td>
    <td class="text-center" style="vertical-align: middle"><%= data.id %></td>
    <td class="text-center" style="vertical-align: middle"><%= data.name %></td>
    <td class="text-center" style="vertical-align: middle"><%= data.code %></td>
    <td class="text-center" style="vertical-align: middle"><%= data.language %></td>
    <td class="text-center" style="vertical-align: middle">
        <div class="btn-group">
            <button type="button" class="btn btn-primary" onclick="country.getCity('<%= data.id %>')" >
                <i class="glyphicon glyphicon-list pull-left" style="line-height: 16px"></i>Thành phố
            </button>
            <button type="button" class="btn btn-warning" onclick="country.edit('<%= data.id %>');" >
                <i class="glyphicon glyphicon-edit pull-left" style="line-height: 16px"></i>Sửa
            </button>
        </div>
    </td>
    <% if(!edit) { %>
</tr>
<% } %>