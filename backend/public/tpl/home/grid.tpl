<div class="cms-content">
    <h1 class="func-title">
        <i class="fa fa-edit fa-fw"></i>
        Thông tin cơ bản
    </h1>
    <div class="panel panel-default panel-tabs" style="margin-bottom: 0px;" >
        <div class="panel-heading">
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#index/grid">Thông tin cơ bản</a></li>
                <li style="float: right;"><div class="btn-group">
                        <button type="button" class="btn btn-success btn-right" onclick="index.edit('1')">
                            <i class="fa fa-edit"></i>
                            Thay đổi
                        </button>
                    </div></li>
            </ul>
        </div>
    </div>
    <div class="func-container">
        <div class="clearfix"></div>
        <div class="table-responsive">
            <table id="mytable" class="table table-bordered table-striped table-hover">
                <% $.each(data, function(i){ %>
                <tr>
                    <td><%= this.name %></td>
                    <td><%= this.value%></td>
                </tr>
                <% }); %>                
            </table>
            <div class="clearfix"></div>
        </div><!-- /table-responsive -->
    </div><!-- /func-container -->
</div><!-- /cms-content -->

