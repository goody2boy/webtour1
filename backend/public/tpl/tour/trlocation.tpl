<tr data-key="<%= data.id %>" class="success">
    <%console.log('Test trlocation'); console.log(data);%>
    <td class="text-center" style="vertical-align: middle">
        <p><%= data.id %></p>
        <hr>
        <i class="glyphicon glyphicon-trash icon-remove" onclick="tour.removeLocation('<%= data.id %>');"></i>
    </td>
    <td class="text-center" style="vertical-align: middle"><%= data.location_name %></td>
    <td class="text-center" style="vertical-align: middle"><%= data.location_address %></td>
    <td class="text-center" style="vertical-align: middle"><%= data.location_desc %></td>
    <td class="text-center" style="vertical-align: middle"><%= data.position %></td>
    <td>
        <div style="margin-top: 5px">
            <button onclick="tour.editLocation('<%= data.id %>');" type="button" class="btn btn-info" style="width:100px;">Sửa</button>
        </div>
    </td>
</tr>