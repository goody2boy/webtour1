<div class="cms-content">
    <h1 class="func-title">
        <i class="fa fa-edit fa-fw"></i>
        Menu trang chủ
    </h1>
    <div class="panel panel-default panel-tabs" style="margin-bottom: 0px;" >
        <div class="panel-heading">
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#menu/grid">Danh sách menu</a></li>
            </ul>
        </div>
    </div>
    <!-- /panel -->

    <div class="func-container">
        <div class="table-responsive">
            <table id="mytable" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr class="success" >
                        <th class="text-center" style="vertical-align: middle;width: 65px;" >ID</th>
                        <th class="text-center" style="vertical-align: middle" >Tên menu</th>
                        <th class="text-center" style="vertical-align: middle;" >Liên kết</th>
                        <th class="text-center" style="vertical-align: middle;width: 90px" >Trạng thái</th>
                        <th class="text-center" style="vertical-align: middle;width: 90px" >Thứ tự</th>
                        <th class="text-center" style="vertical-align: middle;width: 225px" > 
                            Chức năng<i style="cursor: pointer" onclick="menu.add();" class="pull-right glyphicon glyphicon-plus">
                        </th>
                    <tr>
                </thead>
                <tbody rel-data="bodydata">
                    <% if (data.length <= 0 ){ %>
                    <tr>
                        <td colspan="6" class="text-danger" style="text-align: center">Can not find that Menu!</td>
                    </tr>
                    <% }else{ %>
                    <% $.each(data, function(index,menu){ %>
                    <% if(menu.parentId == 0){ %>
                    <tr rel-data="<%= menu.id %>">
                        <td class="text-center" style="vertical-align: middle"><p><%= menu.id %></p></td>
                        <td>
                            <p class="title-item">
                                -- <%=menu.name%>
                            </p>
                        </td>
                        <td class="text-center" style="vertical-align: middle">
                            <a href="<%= menu.link%>" title="<%=menu.link%>"><%=(menu.link!=null && menu.link!=''?'URL':'')%></a>
                        </td>
                        <td class="text-center" >
                            <div data-key="<%= menu.id %>">
                                <%= '<label class="label label-' + (menu.active == 1 ? 'success' : 'danger') + '" >' + (menu.active == 1 ? 'Hiển thị' : 'Tạm khóa') + '</label>' %>
                            </div>
                        </td>
                        <td class="text-center" style="vertical-align: middle">
                            <%= menu.position %>
                        </td>
                        <td class="text-center" style="vertical-align: middle">
                            <div class="btn-group">
                                <button type="button" class="btn btn-success" onclick="menu.edit('<%= menu.id %>')" >
                                    <i class="glyphicon glyphicon-edit pull-left" style="line-height: 16px"></i>Sửa
                                </button>
                                <button type="button" class="btn btn-danger" onclick="menu.remove('<%= menu.id %>')" >
                                    <i class="glyphicon glyphicon-trash pull-left" style="line-height: 16px"></i>Xóa
                                </button>
                            </div>
                        </td>
                    </tr>
                    <% $.each(data, function(index,menulv2){ %>
                    <% if(menulv2.parentId == menu.id){ %>
                    <tr rel-data="<%= menulv2.id %>">
                        <td class="text-center" style="vertical-align: middle"><p><%= menulv2.id %></p>
                        </td>
                        <td>
                            <p class="title-item">
                                -- -- <%=menulv2.name%>
                            </p>
                        </td>
                        <td class="text-center" style="vertical-align: middle">
                            <a href="<%= menulv2.link%>" title="<%=menulv2.link%>"><%=(menulv2.link!=null&&menulv2.link!=''?'URL':'')%></a>
                        </td>
                        <td class="text-center" >
                            <div data-key="<%= menulv2.id %>">
                                <%= '<label class="label label-' + (menulv2.active == 1 ? 'success' : 'danger') + '" >' + (menulv2.active == 1 ? 'Hiển thị' : 'Tạm khóa') + '</label>' %>
                            </div>
                        </td>
                        <td class="text-center" style="vertical-align: middle">
                            <%= menulv2.position %>
                        </td>
                        <td class="text-center" style="vertical-align: middle">
                            <div class="btn-group">
                                <button type="button" class="btn btn-success" onclick="menu.edit('<%= menulv2.id %>')" >
                                    <i class="glyphicon glyphicon-edit pull-left" style="line-height: 16px"></i>Sửa
                                </button>
                                <button type="button" class="btn btn-danger" onclick="menu.remove('<%= menulv2.id %>')" >
                                    <i class="glyphicon glyphicon-trash pull-left" style="line-height: 16px"></i>Xóa
                                </button>
                            </div>
                        </td>
                    </tr>
                    <% } %>
                    <%  }); %>
                    <% } %>
                    <%  }); %>
                    <% } %>
                </tbody>
            </table>
            <div class="clearfix"></div>
        </div><!-- /table-responsive -->
    </div><!-- /func-container -->
</div><!-- /cms-content -->

