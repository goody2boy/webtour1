<div class="cms-content">
    <h1 class="func-title">
        <i class="fa fa-edit fa-fw"></i>
        Thông tin cơ bản
    </h1>
    <div class="panel panel-default panel-tabs" style="margin-bottom: 0px;" >
        <div class="panel-heading">
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#option/grid">Danh sách thông tin</a></li>
                <li style="float: right;"><div class="btn-group">
            </div></li>
            </ul>
        </div>
    </div>
    <!-- /panel -->

    <div class="func-container">
        <div class="func-yellow">
            <form method="GET" action="#option/grid" id="search" class="form row" >
                <div class="col-sm-3 padding-right-5">
                    <div style="margin-top: 5px;">
                        <input data-search="keyword" name="keyword" type="text" class="form-control" placeholder="Tìm kiếm theo từ khóa">
                    </div>
                </div>
                <div class="col-sm-3 padding-right-5">
                    <div style="margin-top: 5px;">
                        <select class="form-control" data-search="auto_load" name="auto_load">
                            <option value="0" >Trạng thái</option>
                            <option value="1" >Hoạt động</option>
                            <option value="2" >Tạm khóa</option>
                        </select>
                    </div><!-- /col -->
                </div>
                <div class="col-sm-3 padding-right-5">
                    <div style="margin-top: 5px;">
                        <button onclick="viewUtils.btnSearch('search')" type="button" class="btn btn-info">
                            <span class="glyphicon glyphicon-search"></span>Tìm kiếm
                        </button>
                        <button onclick="viewUtils.btnReset('search');" type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-refresh"></span>Làm lại
                        </button>
                    </div>
                </div><!-- /col -->
            </form><!-- /form -->
        </div>
        <%= viewUtils.dataPage(data, [])  %>
        <div class="clearfix"></div>
        <div class="table-responsive">
            <table id="mytable" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr class="success" >
                        <th class="text-center" style="vertical-align: middle">STT</th>
                        <th class="text-center" style="vertical-align: middle;width: 50px" >Key</th>
                        <th class="text-center" style="vertical-align: middle; width: 200px ">Value</th>
                        <th class="text-center" style="vertical-align: middle; width: 400px;">Tên</th>
                        <th class="text-center" style="vertical-align: middle;" >Trạng thái</th>
                        <th class="text-center" style="vertical-align: middle;width: 215px" > 
                            Chức năng<i style="cursor: pointer" onclick="option.add();" class="pull-right glyphicon glyphicon-plus">
                        </th>
                    <tr>
                </thead>
                <tbody rel-data="bodydata">
                    <% $.each(data.data, function(index){ %>
                    <tr rel-data="<%= this.id %>">
                        <td class="text-center" style="vertical-align: middle">
                            <%= eval(index+1) %>
                        </td>
                        <td class="text-center" style="vertical-align: middle;width: 80px" ><%= this.key %></td>
                        <td class="text-center" style="vertical-align: middle;width: 80px" ><%= this.value %></td>
                        <td class="text-center" style="vertical-align: middle;width: 80px" ><%= this.name %></td>
                        <td class="text-center" style="vertical-align: middle;" >
                            <div data-key-active="<%= this.id %>">
                                <%= '<label class="label label-' + (this.auto_load == 1 ? 'success' : 'danger') + '" >' + (this.auto_load == 1 ? 'Hiển thị' : 'Tạm khóa') + '</label><i onclick="option.changeActive(\'' + this.id + '\')" style="cursor: pointer; margin-left: 5px;" class="glyphicon glyphicon-' + (this.auto_load == 1 ? 'check' : 'unchecked') + '" />' %>
                            </div>
                        </td>
                        <td>
                            <div class="btn-group" style=" margin-left: 23px;">
                                <button onclick="option.edit('<%=this.id%>')" type="button" class="btn btn-primary" style="width: 80px;"><span class="glyphicon glyphicon-edit pull-left" style="line-height: 18px"></span> Sửa</button>
                                <button onclick="option.remove('<%=this.id%>')" type="button" class="btn btn-danger" style="width: 80px;"><span class="glyphicon glyphicon-trashpull-left" style="line-height: 18px"></span> Xóa</button>
                            </div>
                        </td>
                    <tr>
                        <% }); %>
                </tbody>
            </table>
            <%= viewUtils.dataPage(data, [])  %>
            <div class="clearfix"></div>
        </div><!-- /table-responsive -->
    </div><!-- /func-container -->
</div><!-- /cms-content -->

