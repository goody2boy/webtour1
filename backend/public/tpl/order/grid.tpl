<div class="cms-content">
    <h1 class="func-title">
        <i class="fa fa-edit fa-fw"></i>
        Danh sách order
    </h1>
    <div class="panel panel-default panel-tabs" style="margin-bottom: 0px;" >
        <div class="panel-heading">
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#order/grid">Danh sách order</a></li>
            </ul>
        </div>
    </div>
    <div class="func-container">
        <div class="func-yellow">
            <form method="GET" action="#order/grid" id="search" class="form row" >
                <!-- title, price , city-->
                <div class="col-sm-3 padding-all-5">
                    <input data-search="invoice_code" name="title" type="text" class="form-control" placeholder="Mã hóa đơn" style="margin-top:5px;"  >
                    <input data-search="promo_code" name="promo_code" type="text" class="form-control" placeholder="Mã giảm giá" style="margin-top:5px;">
                    <select data-search="payment_method" class="form-control" name="payment_method"  style="margin-top:5px;" >
                        <option value="" >--Phương thức thanh toán--</option>
                        <option value="1" >PayPal</option>
                        <option value="2" >Master Card</option>
                        <option value="3" >LATER</option>
                    </select>
                </div><!-- /col -->
                <!-- code, toutype, language, status -->
                <div class="col-sm-3 padding-all-5">
                    <input data-search="tour_code" name="tour_code" type="text" class="form-control" placeholder="Mã tour" style="margin-top:5px;">
                    <select data-search="user" class="form-control" name="user" style="margin-top:5px;"  >
                    </select>
                    <select data-search="status_payment" class="form-control" name="status_payment"  style="margin-top:5px;" >
                        <option value="" >--Trạng thái thanh toán--</option>
                        <option value="1" >Chưa thanh toán</option>
                        <option value="2" >Xác nhận thanh toán</option>
                    </select>

                </div><!-- /col -->
                <!-- create time from,updatetimefrom  -->
                <div class="col-sm-3 padding-all-5">
                    <div class="input-group" style="margin-top:5px;">
                        <input type="hidden" name="createTimeFrom" data-search="createTimeFrom" class="form-control" placeholder="Thời gian tạotừ ">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                    <div class="input-group" style="margin-top:5px;">
                        <input type="hidden" name="date_departureFrom" data-search="date_departureFrom" class="form-control" placeholder="Thời gian bắt đầu tour từ">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                    <div class="input-append spinner" data-trigger="spinner">
                        <input name="total_priceFrom" type="text" value="1" data-rule="currency">
                        <div class="add-on"> <a href="javascript:;" class="spin-up" data-spin="up"><i class="icon-sort-up"></i></a> <a href="javascript:;" class="spin-down" data-spin="down"><i class="icon-sort-down"></i></a> </div>
                    </div>
                </div><!-- /col -->
                <!-- create time to,updatetime to  -->
                <div class="col-sm-3 padding-all-5">
                    <div class="input-group" style="margin-top:5px;">
                        <input type="hidden" name="createTimeTo" data-search="createTimeTo"  class="form-control" placeholder="Thời gian tạo đến">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                    <div class="input-group" style="margin-top:5px;">
                        <input type="hidden" name="date_departureTo" data-search="date_departureTo" class="form-control" placeholder="Thời gian bắt đầu đến">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                    <div class="input-append spinner" data-trigger="spinner">
                        <input name="total_priceTo" type="text" value="1" data-rule="currency">
                        <div class="add-on"> <a href="javascript:;" class="spin-up" data-spin="up"><i class="icon-sort-up"></i></a> <a href="javascript:;" class="spin-down" data-spin="down"><i class="icon-sort-down"></i></a> </div>
                    </div>

                </div><!-- /col -->
                <div class="col-sm-3" >
                    <button onclick="viewUtils.btnSearch('search')" type="button" class="btn btn-info" style="margin-left:20px;">
                        <span class="glyphicon glyphicon-search"></span>Tìm kiếm
                    </button>
                    <button onclick="viewUtils.btnReset('search')" type="button" class="btn btn-default" style="margin-right:20px;" >
                        <span class="glyphicon glyphicon-search"></span>Làm mới
                    </button>
                </div><!-- /col -->
            </form><!-- /form -->
        </div>

        <div class="clearfix"></div>
        <div class="table-responsive">
            <table id="mytable" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr class="success" >
                        <th class="text-center" style="vertical-align: middle" >Mã hóa đơn</th>
                        <th class="text-center" style="vertical-align: middle" >Mã Tour</th>
                        <th class="text-center" style="vertical-align: middle;width: 150px" >User</th>
                        <th class="text-center" style="vertical-align: middle;width: 150px" >Bảng giá</th>
                        <th class="text-center" style="vertical-align: middle;width: 80px" >Số người</th>
                        <th class="text-center" style="vertical-align: middle" >Tổng giá</th>
                        <th class="text-center" style="vertical-align: middle" >Giá thanh toán</th>
                        <th class="text-center" style="vertical-align: middle" >Thời gian tạo</th>
                        <th class="text-center" style="vertical-align: middle" >Phương thức thanh toán</th>
                        <th class="text-center" style="vertical-align: middle" >Trạng thái</th>
                        <th class="text-center" style="vertical-align: middle;width: 100px" >Chức năng</th>
                    <tr>
                </thead>
                <tbody>
                    <%= viewUtils.dataPage(data, [])  %>
                    <tr data-key=""></tr>
                    <% if (data.length <= 0 ){ %>
                    <tr>
                        <td colspan="8" class="text-danger" style="text-align: center">Không tồn tại order nào trong cơ sở dữ liệu!</td>
                    </tr>
                    <% }else{ %>
                    <% $.each(data.data, function(index){ %>
                    <tr data-key="<%= this.id%>">
                        <td class="text-center" style="vertical-align: middle">
                            <p><%= this.invoice_code %></p>
                            <hr/>
                            <i class="glyphicon glyphicon-trash icon-remove" onclick="order.remove('<%= this.id %>');"></i>
                        </td>
                        <td class="text-center" style="vertical-align: middle"><%= this.tour.code %></td>
                        <td class="text-center" style="vertical-align: middle"><%= this.user.name %></td>
                        <td class="text-center" style="vertical-align: middle">
                            <button onclick="tour.showPrice('<%= this.price.id %>');" type="button" class="btn btn-info" style="margin-left:20px;">
                                <span class="glyphicon glyphicon-search"></span>Show Price
                            </button>
                        </td>
                        <td class="text-center" style="vertical-align: middle">
                            Adult : <%= this.number_adult %> </br>
                            Nochild : <%= this.number_nochild %> </br>
                            Child : <%= this.number_child %>
                        </td>
                        <td class="text-center" style="vertical-align: middle"><%= this.total_price %></td>
                        <td class="text-center" style="vertical-align: middle">
                            <% if (this.promo_code != "" && this.promo_code != null ){ %>
                            Use <%= this.promo_code %> = <%= this.final_price %>
                            <% }else {%>
                                <%= this.final_price %>
                            <% }%>
                        </td>
                        <td class="text-center" style="vertical-align: middle"><%= textUtils.formatTime(this.create_time,'day') %></td>
                        <td class="text-center" style="vertical-align: middle"><%= this.payment_method %></td>
                        <td class="text-center" style="vertical-align: middle"><%= this.status_payment %></td>
                        <td>
                            <div class="btn-group" style="margin-top: 5px">
                                <button onclick="order.edit('<%=this.id%>')" type="button" class="btn btn-success" style="width: 100px;"><span class="glyphicon glyphicon-edit pull-left" style="line-height: 18px"></span> Sửa thông tin order</button>
                            </div>
                        </td>
                    </tr>
                    <% }); %>
                    <% } %>
                </tbody>
            </table>
            <%= viewUtils.dataPage(data, [])  %>
            <div class="clearfix"></div>
        </div><!-- /table-responsive -->
    </div><!-- /func-container -->
</div><!-- /cms-content -->

