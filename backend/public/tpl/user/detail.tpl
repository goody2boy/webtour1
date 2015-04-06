  <div class="func-container">
        <p class="clearfix" ></p>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover text-center">
                <tbody>
                    <tr>
                        <td class="text-center" >Tài khoản</td>
                        <td class="text-center" ><%= data.username %></td>
                    </tr>
                    <tr>
                        <td class="text-center" >Họ và tên</td>
                        <td class="text-center" ><%= data.firstName %> <%= data.lastName %></td>
                    </tr>
                    <tr>
                        <td class="text-center" >Số điện thoại</td>
                        <td class="text-center" ><%= data.phone %></td>
                    </tr>
                    <tr>
                        <td class="text-center" >Địa chỉ</td>
                        <td class="text-center" ><%= data.address %> - <%= data.cityName %> - <%= data.countryName %></td>
                    </tr>
                    <tr>
                        <td class="text-center" >Thời gian tạo</td>
                        <td class="text-center" ><%= textUtils.formatTime(data.createTime) %></td>
                    </tr>
                </tbody>
            </table>
            <div class="clearfix"></div>
        </div><!-- /table-responsive -->
    </div><!-- /func-container -->
</div><!-- /cms-content -->

