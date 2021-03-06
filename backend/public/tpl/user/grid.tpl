<div class="cms-content">
    <h1 class="func-title">
        <i class="fa fa-user-md"></i>
        Danh sách người dùng
    </h1>
    <div class="panel panel-default panel-tabs" style="margin-bottom: 0px;" >
        <div class="panel-heading">
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#user/grid">Danh sách người dùng</a></li>
            </ul>
        </div>
    </div>
    <!-- /panel -->

    <div class="func-container">
        <div class="func-yellow">
            <form method="GET" action="#user/grid" id="search" class="form row" >
                <div class="col-sm-3 padding-right-5">
                    <input data-search="keyword" name="keyword" type="text" class="form-control" placeholder="Từ khóa">
                </div><!-- /col -->
                <div class="col-sm-3 padding-all-5">
                    <div class="input-group">
                        <input type="hidden" name="createTimeTo" data-search="createTimeTo" class="form-control" placeholder="Ngày tạo từ ngày">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                </div><!-- /col -->
                <div class="col-sm-3 padding-all-5">
                    <div class="input-group">
                        <input type="hidden" name="createTimeFrom" data-search="createTimeFrom"  class="form-control" placeholder="Tới ngày">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                </div><!-- /col -->
                <div class="col-sm-3 padding-left-5">
                    <select class="form-control" name="active" data-search="active"  >
                        <option value="0" >Status</option>
                        <option value="1" >Hoạt động</option>
                        <option value="2" >Tam khóa</option>
                    </select>
                </div><!-- /col -->
                <div class="col-sm-12">
                    <button onclick="viewUtils.btnSearch('search')" type="button" class="btn btn-info">
                        <span class="glyphicon glyphicon-search"></span>Search
                    </button>
                    <button onclick="viewUtils.btnReset('search');" type="button" class="btn btn-default">
                        <span class="glyphicon glyphicon-refresh"></span>Redo
                    </button>
                </div><!-- /col -->
            </form><!-- /form -->
        </div>
        <%= viewUtils.dataPage(data, [])  %>
        <p class="clearfix" ></p>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover text-center">
                <thead>
                    <tr class="success" >
                        <th class="text-center" style="vertical-align: middle" >STT</th>
                        <th class="text-center" style="vertical-align: middle" >Ảnh</th>
                        <th class="text-center" style="vertical-align: middle" >Tài khoản</th>
                        <th class="text-center" style="vertical-align: middle" >Email</th>
                        <th class="text-center" style="vertical-align: middle" >Ngày đăng ký</th>
                        <th class="text-center" style="vertical-align: middle;" >Trạng thái</th>
                        <th class="text-center" style="vertical-align: middle;" >Functionality</th>
                    <tr>
                </thead>
                <tbody>
                    <% $.each(data.data, function(index){ %>
                    <tr data-key="<%= this.id %>" >
                        <td class="text-center" ><%= eval(index+1) %></td>
                        <td class="text-center" style="vertical-align: middle;width: 80px" >
                            <% if(this.images.length > 0){ %>
                            <img src="<%= this.images[0] %>" style="max-width:60px; margin:auto;" class="thumbnail"/>
                            <%}else { %>
                            <img src="<%= baseUrl %>images/no_avatar.png" style="max-width:60px; margin:auto;"  class="thumbnail" />
                            <% } %>
                        </td>
                        <td class="text-center" ><%= this.username %></td>
                        <td class="text-center" ><%= this.email %></td>
                        <td class="text-center" ><%= textUtils.formatTime(this.createTime) %></td>
                        <td class="text-center" data-id='<%= this.id %>' >
                            <label class="label label-<%= this.active==1?'success':'danger' %>" >
                                <%= this.active==1?'Hoạt động':'Tạm khóa' %>
                            </label>
                            <i onclick="user.changeActive('<%= this.id %>');" style="cursor: pointer" class="pull-right glyphicon glyphicon-<%= this.active==1?'check':'unchecked' %>" />
                        </td>
                        <td>
                            <button type="button" class="btn btn-success" onclick="user.detail('<%= this.id %>')" >
                                <i class="fa fa-edit"></i>
                                Chi tiết
                            </button>
                            <button onclick="image.addImage('<%= this.id %>', 'user');" type="button" class="btn btn-success" style="width: 80px;"><span class="fa fa-image pull-left" style="line-height: 18px" ></span> Ảnh</button>
                        </td>
                    </tr>
                    <%  }); %>
                </tbody>
            </table>
            <%= viewUtils.dataPage(data, [])  %>
            <div class="clearfix"></div>
        </div><!-- /table-responsive -->
    </div><!-- /func-container -->
</div><!-- /cms-content -->

