<div class="modal-body" style="margin-top:10px;">
    <div style="margin :10px;">            

        <table class="table table-bordered">
            <thead>
            <th>Pax</th>
            <th>1</th>
            <th>2</th>
            <th>3</th>
            <th>4</th>
            <th>5</th>
            <th>6</th>
            <th>More than 6</th>
            </thead>
            <tbody>
                <tr>
                    <th>Price/adult</th>
            <form class="form-horizontal" id="edit-price-tour">
                <input name="id"  value="<%= (typeof data != 'undefined' ?  data.id : '') %>" type="text" class="form-control" placeholder="id" style="display: none;"/>
                <% console.log("Price edit");console.log(data);%>
                <th><input name="price_1" type="number" value="<%= (typeof data != 'undefined' ?  (data[0].price != 'undefined' ? data[0].price : '0') : '0') %>" class="form-control" placeholder="$$" style="width:70px;"/></th>
                <th><input name="price_2" type="number" value="<%= (typeof data != 'undefined' ?  (data[1].price != 'undefined' ? data[1].price : '0'): '0') %>" class="form-control" placeholder="$$" style="width:70px;"/></th>
                <th><input name="price_3" type="number" value="<%= (typeof data != 'undefined' ?  (data[2].price != 'undefined' ? data[2].price : '0') : '0') %>" class="form-control" placeholder="$$" style="width:70px;"/></th>
                <th><input name="price_4" type="number" value="<%= (typeof data != 'undefined' ?  (data[3].price != 'undefined' ? data[3].price : '0') : '0') %>" class="form-control" placeholder="$$" style="width:70px;"/></th>
                <th><input name="price_5" type="number" value="<%= (typeof data != 'undefined' ?  (data[4].price != 'undefined' ? data[4].price : '0') : '0') %>" class="form-control" placeholder="$$" style="width:70px;"/></th>
                <th><input name="price_6" type="number" value="<%= (typeof data != 'undefined' ?  (data[5].price != 'undefined' ? data[5].price : '0') : '0') %>" class="form-control" placeholder="$$" style="width:70px;"/></th>
                <th>Contact us</th>
            </form>
            </tr>
            </tbody>
        </table>


    </div>
</div>