<div class="cms-content">
    <h1 class="func-title">
        <i class="fa fa-edit fa-fw"></i>
        Danh sách Review
    </h1>
    <div class="panel panel-default panel-tabs" style="margin-bottom: 0px;" >
        <div class="panel-heading">
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#review/grid">Danh sách Review</a></li>
            </ul>
        </div>
    </div>
    <div class="func-container">
        <div class="func-yellow">
            <form method="GET" action="#review/grid" id="search" class="form row" >
                <div class="col-sm-4 padding-all-5">
                    <input data-search="id" name="id" type="text" class="form-control" placeholder="ID">
                    <div class="input-group" style="margin-top:5px;">
                        <input type="hidden" name="submit_timeFrom" data-search="submit_timeFrom" class="form-control" placeholder="Submit time">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                </div><!-- /col -->
                <div class="col-sm-4 padding-all-5">
                    <input data-search="rate" name="rate" type="number" min="0" max="5" class="form-control" placeholder="rate">
                    <div class="input-group" style="margin-top:5px;">
                        <input type="hidden" name="submit_timeTo" data-search="submit_timeTo"  class="form-control" placeholder="Submit time">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                </div><!-- /col -->
                <div class="col-sm-4 padding-left-5">
                    <select class="form-control" name="user_id" data-search="user_id"  >
                    </select>
                </div><!-- /col -->
                <div class="col-sm-4" >
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
                        <th class="text-center" style="vertical-align: middle" >Người review</th>
                        <th class="text-center" style="vertical-align: middle;width: 50%;" >Nội dung review</th>
                        <th class="text-center" style="vertical-align: middle;width: 50px;" >Rate</th>
                        <th class="text-center" style="vertical-align: middle" >Ngày tạo</th>
                        <th class="text-center" style="vertical-align: middle;width: 10%;" > 
                            Chức năng<i style="cursor: pointer" onclick="review.add();" class="pull-right glyphicon glyphicon-plus">
                        </th>
                    <tr>
                </thead>
                <tbody>
                    <tr data-key=""></tr>
                    <% if (data.length <= 0 ){ %>
                    <tr>
                        <td colspan="8" class="text-danger" style="text-align: center">Không tồn tại review nào trong cơ sở dữ liệu!</td>
                    </tr>
                    <% }else{ %>
                    <% $.each(data.data, function(index){ %>
                    <tr data-key="<%= this.id%>">
                        <td class="text-center" style="vertical-align: middle">
                            <p><%= this.id %></p>
                            <hr/>
                            <i class="glyphicon glyphicon-trash icon-remove" onclick="review.remove('<%= this.id %>');"></i>
                        </td>
                        <td class="text-center" style="vertical-align: middle">
                            <%= this.user.username %></br>
                            <span>
                                <img src="<%= baseImage.baseUrl %><%= this.user.images.length > 0 ? this.user.images[0].imageId : 'images/no_avatar.png' %>" style="height: auto; max-height: 100px;" alt="No Image" />
                            </span>
                        </td>
                        <td class="text-center" style="vertical-align: middle"><%= this.review_comment %></td>
                        <td class="text-center" style="vertical-align: middle"><%= this.rate %></td>
                        <td class="text-center" style="vertical-align: middle"><%= textUtils.formatTime(this.submit_time,'day') %></td>
                        <td>
                            <div class="btn-group" style="margin-top: 5px">
                                <button onclick="review.edit('<%=this.id%>')" type="button" class="btn btn-success" style="width: 100px;"><span class="glyphicon glyphicon-edit pull-left" style="line-height: 18px"></span> Sửa</button>
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

