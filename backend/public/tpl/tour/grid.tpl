<div class="cms-content">
    <h1 class="func-title">
        <i class="fa fa-edit fa-fw"></i>
        Danh sách tour
    </h1>
    <div class="panel panel-default panel-tabs" style="margin-bottom: 0px;" >
        <div class="panel-heading">
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#tour/grid">Danh sách các tour</a></li>
            </ul>
        </div>
    </div>
    <div class="func-container">
        <div class="func-yellow">
            <form method="GET" action="#tour/grid" id="search" class="form row" >
                <!-- title, price , city-->
                <div class="col-sm-3 padding-all-5">
                    <input data-search="title" name="title" type="text" class="form-control" placeholder="Tiêu đề" style="margin-top:5px;"  >
                    <input data-search="durationTime" name="durationTime" type="text" class="form-control" placeholder="Thời gian diễn ra" style="margin-top:5px;" >
                    <select data-search="price" class="form-control" name="price" style="margin-top:5px;"  >
                        <option value="" >--Chọn giá--</option>
                        <option value="100" >100</option>
                        <option value="200" >200</option>
                    </select>
                </div><!-- /col -->
                <!-- code, toutype, language, status -->
                <div class="col-sm-3 padding-all-5">
                    <input data-search="code" name="code" type="code" class="form-control" placeholder="Mã tour" style="margin-top:5px;">
                    <select data-search="tourType" class="form-control" name="tourType"  style="margin-top:5px;" >
                        <option value="" >--Chọn Loại Tour--</option>
                        <option value="0" >Hà Nội Tour</option>
                        <option value="1" >Huế Tour</option>
                    </select>
                    <select data-search="city" class="form-control" name="city" style="margin-top:5px;"  >
                        <option value="" >--Chọn thành phố--</option>
                        <option value="EN" >Hà Nội</option>
                        <option value="VI" >Vinh</option>
                    </select>

                </div><!-- /col -->
                <!-- create time from,updatetimefrom  -->
                <div class="col-sm-3 padding-all-5">
                    <div class="input-group" style="margin-top:5px;">
                        <input type="hidden" name="createTime" data-search="createTime" class="form-control" placeholder="Create Time">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                    <div class="input-group" style="margin-top:5px;">
                        <input type="hidden" name="updateTime" data-search="updateTime"  class="form-control" placeholder="Update Time">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                    <select data-search="language" class="form-control" name="language"  style="margin-top:5px;" >
                        <option value="" >--Chọn ngôn ngữ--</option>
                        <option value="EN" >EN</option>
                        <option value="VI" >VI</option>
                    </select>
                </div><!-- /col -->
                <!-- create time to,updatetime to  -->
                <div class="col-sm-3 padding-all-5">
                    <div class="input-group" style="margin-top:5px;">
                        <input type="hidden" name="createTimeTo" data-search="createTimeTo"  class="form-control" placeholder="Create Time To">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                    <div class="input-group" style="margin-top:5px;">
                        <input type="hidden" name="updateTimeTo" data-search="updateTimeTo"  class="form-control" placeholder="Update Time To">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                    <select data-search="status" class="form-control" name="status"  style="margin-top:5px;" >
                        <option value="" >--Trạng thái--</option>
                        <option value="1" >Đang hoạt động</option>
                        <option value="0" >Tạm dừng</option>
                    </select>
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
                        <th class="text-center" style="vertical-align: middle" >ID</th>
                        <th class="text-center" style="vertical-align: middle" >Mã Tour</th>
                        <th class="text-center" style="vertical-align: middle" >Tiêu đề tour</th>
                        <th class="text-center" style="vertical-align: middle" >Tour Type</th>
                        <th class="text-center" style="vertical-align: middle;width: 80px" >Thời gian dự kiến</th>
                        <th class="text-center" style="vertical-align: middle" >Giá min</th>
                        <th class="text-center" style="vertical-align: middle" >Thành phố</th>
                        <th class="text-center" style="vertical-align: middle;width: 100px;" >Ngôn ngữ</th>
                        <th class="text-center" style="vertical-align: middle" >Ngày tạo</th>
                        <th class="text-center" style="vertical-align: middle" >Ngày sửa</th>
                        <th class="text-center" style="vertical-align: middle;width: 100px;" >Kích hoạt<i class="glyphicon glyphicon-edit pull-right"></i></th>
                        <th class="text-center" style="vertical-align: middle;width: 215px" > 
                            Chức năng<i style="cursor: pointer; color: red;" onclick="tour.add();" class="pull-right glyphicon glyphicon-plus">
                        </th>
                    <tr>
                </thead>
                <tbody>
                    <%= viewUtils.dataPage(data, [])  %>
                    <tr data-key=""></tr>
                    <% if (data.length <= 0 ){ %>
                    <tr>
                        <td colspan="8" class="text-danger" style="text-align: center">Không tồn tại loại tiền nào trong cơ sở dữ liệu!</td>
                    </tr>
                    <% }else{ %>
                    <% $.each(data.data, function(index){ %>
                    <tr data-key="<%= this.id%>">
                        <td class="text-center" style="vertical-align: middle">
                            <p><%= this.id %></p>
                            <hr/>
                            <i class="glyphicon glyphicon-trash icon-remove" onclick="tour.remove('<%= this.id %>');"></i>
                        </td>
                        <td class="text-center" style="vertical-align: middle"><%= this.code %></td>
                        <td class="text-center" style="vertical-align: middle"><%= this.title %></td>
                        <td class="text-center" style="vertical-align: middle">
                            <% $.each(this.categories, function(index){ %>
                            <%= this.name + ',' %>
                            <% }); %>
                        </td>
                        <td class="text-center" style="vertical-align: middle"><%= this.duration_time %> (Ngày)</td>
                        <td class="text-center" style="vertical-align: middle"><%= this.price_name %></td>
                        <td class="text-center" style="vertical-align: middle"><%= this.city.name %></td>
                        <td class="text-center" style="vertical-align: middle"><%= this.language %></td>
                        <td class="text-center" style="vertical-align: middle"><%= textUtils.formatTime(this.create_time,'day') %></td>
                        <td class="text-center" style="vertical-align: middle"><%= textUtils.formatTime(this.update_time,'day') %></td>
                        <td>
                            <div data-key-active="<%= this.id %>">
                                <%= '<label class="label label-' + (this.status == 1 ? 'success' : 'danger') + '" >' + (this.status == 1 ? 'Hoạt động' : 'Tạm khóa') + '</label><i onclick="tour.changeActive(\'' + this.id + '\')" style="cursor: pointer" class="pull-right glyphicon glyphicon-' + (this.status == 1 ? 'check' : 'unchecked') + '" />' %>
                            </div>
                        </td>
                        <td>
                            <div class="btn-group" style="margin-top: 5px">
                                <button onclick="tour.edit('<%=this.id%>')" type="button" class="btn btn-success" style="width: 100px;"><span class="glyphicon glyphicon-edit pull-left" style="line-height: 18px"></span> Sửa</button>
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

