<div class="modal-body" style="margin-top:10px;"><div style="margin :10px;">            
        <table class="table table-bordered">
            <thead>
                <tr>
                    <% console.log(data);%>
                    <% if (data.length <= 0 ){ %>
                        <p class="bg-danger">Tour này không có giá.</p>
                    <% }else{ %>
                    <th>Pax</th>
                    <% $.each(data, function(index){ %>
                    <th><%= this.name%></th>
                    <% }); %>
                    <% } %>
                    <th>More than 6</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Price/adult</th>
                    <% $.each(data, function(index){ %>
                    <th><%= this.price%></th>
                    <% }); %>
                     <th>Contact us</th>
                </tr>
            </tbody>
        </table>
    </div>
</div>