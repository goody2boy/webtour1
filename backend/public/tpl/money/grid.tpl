<div class="cms-content">
    <h1 class="func-title">
        <i class="fa fa-edit fa-fw"></i>
        Danh sách loại tiền tệ
    </h1>
    <div class="panel panel-default panel-tabs" style="margin-bottom: 0px;" >
        <div class="panel-heading">
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#money/grid">Danh sách Loại tiền tệ</a></li>
            </ul>
        </div>
    </div>
    <div class="func-container">
        <div class="func-yellow">
            <form method="GET" action="#money/grid" id="search" class="form row" >
                <div class="col-sm-3 padding-all-5">
                    <input data-search="id" name="id" type="text" class="form-control" placeholder="ID">
                    <div class="input-group" style="margin-top:5px;">
                        <input type="hidden" name="createTime" data-search="createTime" class="form-control" placeholder="CreateTime">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                </div><!-- /col -->
                <div class="col-sm-3 padding-all-5">
                    <input data-search="code" name="code" type="text" class="form-control" placeholder="Mã loại tiền">
                    <div class="input-group" style="margin-top:5px;">
                        <input type="hidden" name="createTimeTo" data-search="createTimeTo"  class="form-control" placeholder="CreateTimeTo">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                </div><!-- /col -->
                <div class="col-sm-3 padding-all-5">
                    <input data-search="name" name="name" type="text" class="form-control" placeholder="Tên loại tiền">
                    <div class="input-group" style="margin-top:5px;">
                        <input type="hidden" name="updateTime" data-search="updateTime"  class="form-control" placeholder="UpdateTime">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>

                </div><!-- /col -->
                <div class="col-sm-3 padding-left-5">
                    <select class="form-control" name="language" data-search="language"  >
                        <option value="" >--Chọn ngôn ngữ--</option>
                        <option value="EN" >EN</option>
                        <option value="VI" >VI</option>
                    </select>
                    <div class="input-group" style="margin-top:5px;">
                        <input type="hidden" name="updateTimeTo" data-search="updateTimeTo"  class="form-control" placeholder="UpdateTimeTo">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>

                </div><!-- /col -->
                <div class="col-sm-3" >
                    <button onclick="viewUtils.btnSearch('search')" type="button" class="btn btn-info">
                        <span class="glyphicon glyphicon-search"></span>Tìm kiếm
                    </button>
                    <button onclick="viewUtils.btnReset('search')" type="button" class="btn btn-default">
                        <span class="glyphicon glyphicon-search"></span>Làm mới
                    </button>
                </div><!-- /col -->
            </form><!-- /form -->
        </div>
        <%= viewUtils.dataPage(data, [])  %>
        <div class="clearfix"></div>
        <div class="table-responsive">
            <table id="mytable" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr class="success" >
                        <th class="text-center" style="vertical-align: middle" >ID</th>
                        <th class="text-center" style="vertical-align: middle" >Mã loại tiền tệ</th>
                        <th class="text-center" style="vertical-align: middle" >Tên loại tiền tệ</th>
                        <th class="text-center" style="vertical-align: middle;width: 100px;" >Ngôn ngữ</th>
                        <th class="text-center" style="vertical-align: middle" >Ngày tạo</th>
                        <th class="text-center" style="vertical-align: middle" >Ngày sửa</th>
                        <th class="text-center" style="vertical-align: middle;width: 100px;" >Kích hoạt<i class="glyphicon glyphicon-edit pull-right"></i></th>
                        <th class="text-center" style="vertical-align: middle;width: 215px" > 
                            Chức năng<i style="cursor: pointer" onclick="money.add();" class="pull-right glyphicon glyphicon-plus">
                        </th>
                    <tr>
                </thead>
                <tbody>
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
                            <i class="glyphicon glyphicon-trash icon-remove" onclick="money.remove('<%= this.id %>');"></i>
                        </td>
                        <td class="text-center" style="vertical-align: middle"><%= this.code %></td>
                        <td class="text-center" style="vertical-align: middle"><%= this.name %></td>
                        <td class="text-center" style="vertical-align: middle"><%= this.language %></td>
                        <td class="text-center" style="vertical-align: middle"><%= textUtils.formatTime(this.create_time,'day') %></td>
                        <td class="text-center" style="vertical-align: middle"><%= textUtils.formatTime(this.update_time,'day') %></td>
                        <td>
                            <div data-key-active="<%= this.id %>">
                                <%= '<label class="label label-' + (this.active == 1 ? 'success' : 'danger') + '" >' + (this.active == 1 ? 'Hoạt động' : 'Tạm khóa') + '</label><i onclick="money.changeActive(\'' + this.id + '\')" style="cursor: pointer" class="pull-right glyphicon glyphicon-' + (this.active == 1 ? 'check' : 'unchecked') + '" />' %>
                            </div>
                        </td>
                        <td>
                            <div class="btn-group" style="margin-top: 5px">
                                <button onclick="money.edit('<%=this.id%>')" type="button" class="btn btn-success" style="width: 100px;"><span class="glyphicon glyphicon-edit pull-left" style="line-height: 18px"></span> Sửa</button>
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

